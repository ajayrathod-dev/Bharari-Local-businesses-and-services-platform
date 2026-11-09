<?php
require_once('connection.php');

// Inputs
$user_id = intval($_GET['user_id'] ?? 0);
$title = $_GET['title'] ?? 'Hello';
$body  = $_GET['body'] ?? 'Default body';

// Load service account JSON
$sa_file = __DIR__ . '/ordor-8449f-firebase-adminsdk-fbsvc-bc7bcdc94d.json'; // rename if needed
$service_account = json_decode(file_get_contents($sa_file), true);

// Create JWT manually
function create_jwt($sa) {
    $header = ['alg' => 'RS256', 'typ' => 'JWT'];
    $iat = time();
    $exp = $iat + 3600;

    $payload = [
        'iss' => $sa['client_email'],
        'scope' => 'https://www.googleapis.com/auth/firebase.messaging',
        'aud' => 'https://oauth2.googleapis.com/token',
        'iat' => $iat,
        'exp' => $exp,
    ];

    $base64UrlHeader = rtrim(strtr(base64_encode(json_encode($header)), '+/', '-_'), '=');
    $base64UrlPayload = rtrim(strtr(base64_encode(json_encode($payload)), '+/', '-_'), '=');
    $data = $base64UrlHeader . "." . $base64UrlPayload;

    // Sign with private key
    $private_key = openssl_pkey_get_private($sa['private_key']);
    openssl_sign($data, $signature, $private_key, 'sha256WithRSAEncryption');
    $base64UrlSignature = rtrim(strtr(base64_encode($signature), '+/', '-_'), '=');

    return $data . "." . $base64UrlSignature;
}

// Step 1: Create JWT and get Access Token
$jwt = create_jwt($service_account);
$token_request = [
    'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
    'assertion' => $jwt
];

$ch = curl_init("https://oauth2.googleapis.com/token");
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded'],
    CURLOPT_POSTFIELDS => http_build_query($token_request)
]);

$response = json_decode(curl_exec($ch), true);
curl_close($ch);

if (!isset($response['access_token'])) {
    http_response_code(500);
    die("Failed to get access token.\n" . json_encode($response));
}

$access_token = $response['access_token'];

// Step 2: Get FCM token from DB
$sql = "SELECT token FROM user_tokens WHERE user_id = $user_id";
$res = $link->query($sql);
$row = $res->fetch_assoc();
$fcm_token = $row['token'] ?? '';
if (!$fcm_token) die("No token found.");

// Step 3: Send push via HTTP v1
$payload = [
    "message" => [
        "token" => $fcm_token,
        "notification" => [
            "title" => $title,
            "body" => $body
        ]
    ]
];

$project_id = $service_account['project_id'];
$ch = curl_init("https://fcm.googleapis.com/v1/projects/$project_id/messages:send");
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer $access_token",
        "Content-Type: application/json"
    ],
    CURLOPT_POSTFIELDS => json_encode($payload)
]);

$result = curl_exec($ch);
$error = curl_error($ch);
curl_close($ch);

if ($error) {
    echo "CURL Error: $error";
} else {
    echo $result;
}
