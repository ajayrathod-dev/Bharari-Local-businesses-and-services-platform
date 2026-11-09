<?php
require_once('connection.php');

$user_id = intval($_GET['user_id'] ?? 0);
$token = $link->real_escape_string($_GET['token'] ?? '');

if ($token && $user_id > 0) {
  $link->query("INSERT INTO user_tokens (user_id, token) VALUES ($user_id, '$token')
    ON DUPLICATE KEY UPDATE token = '$token'");
  echo "Token saved for user $user_id";
} else {
  echo "Invalid input";
}
?>
