<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account Deletion Request</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 30px;
      background: #f9f9f9;
    }
    h2 {
      color: #333;
    }
    form {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0px 2px 8px rgba(0,0,0,0.1);
      max-width: 400px;
    }
    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }
    input[type="text"], input[type="number"] {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    input[type="checkbox"] {
      margin-top: 15px;
    }
    button {
      margin-top: 15px;
      padding: 10px 15px;
      background: #007BFF;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background: #0056b3;
    }

    /* Popup styling */
    .popup {
      display: none;
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.6);
      justify-content: center;
      align-items: center;
    }
    .popup-content {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      text-align: center;
      max-width: 300px;
    }
    .popup button {
      margin-top: 15px;
      background: #28a745;
    }
  </style>
</head>
<body>

  <h2>Request Account & Data Deletion</h2>
  <form id="deleteForm">
    <label for="phone">Phone Number:</label>
    <input type="text" id="phone" name="phone" required>

    <button type="button" onclick="sendOTP()">Send OTP</button>

    <label for="otp">Enter OTP:</label>
    <input type="number" id="otp" name="otp" required>

    <label>
      <input type="checkbox" id="confirm" required>
      I confirm that my account and associated data will be permanently deleted within 24 hours.
    </label>

    <button type="submit">Submit Request</button>
  </form>

  <!-- Popup -->
  <div class="popup" id="popup">
    <div class="popup-content">
      <h3>Request Received</h3>
      <p>Your request will be processed and your data will be deleted within 24 hours.</p>
      <button onclick="closePopup()">OK</button>
    </div>
  </div>

  <script>
    function sendOTP() {
      // Just simulate OTP sending, no alert or validation
      console.log("OTP sent to user."); 
    }

    const form = document.getElementById("deleteForm");
    const popup = document.getElementById("popup");

    form.addEventListener("submit", function(event) {
      event.preventDefault();
      // Directly show popup without OTP validation
      popup.style.display = "flex";
    });

    function closePopup() {
      popup.style.display = "none";
      form.reset();
    }
  </script>

</body>
</html>
