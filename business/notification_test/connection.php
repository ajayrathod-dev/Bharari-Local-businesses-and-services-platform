<?php

date_default_timezone_set("Asia/Kolkata");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$DB_SERVER = getenv('DB_HOST') ?: "localhost";
$DB_NAME   = getenv('DB_NAME') ?: "bharari";
$username  = getenv('DB_USER') ?: "root";
$password  = getenv('DB_PASS') !== false ? getenv('DB_PASS') : "";

try {
    $link = mysqli_connect($DB_SERVER, $username, $password, $DB_NAME);
    mysqli_set_charset($link, 'utf8mb4');
} catch (mysqli_sql_exception $e) {
    error_log($e->getMessage());
    http_response_code(500);
    die("ERROR: Could not connect. " . $e->getMessage());
}

?>
