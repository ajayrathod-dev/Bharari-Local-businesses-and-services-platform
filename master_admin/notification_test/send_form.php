<!DOCTYPE html>
<html>
<head><title>Send Notification</title></head>
<body>
  <h2>Send Notification</h2>
  <form method="get" action="send_notification.php">
    <label>User ID:</label><br>
    <input type="number" name="user_id" value="1"><br><br>

    <label>Title:</label><br>
    <input type="text" name="title" value="Hello!"><br><br>

    <label>Body:</label><br>
    <input type="text" name="body" value="This is a test message"><br><br>

    <button type="submit">Send</button>
  </form>
</body>
</html>
