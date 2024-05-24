<?php
error_reporting(0);
session_start();
if ($_SESSION['position'] == "President" || $_SESSION['position'] == "Developer") {
    require '../Controller/ControllerSuperAdmin.php';
} else {
    require '../Controller/ControllerAdmin.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>

<div class="container container-fluid p-5 m-5 text-center d-block ">
    <h5>Change Password</h5>
    <form action="AdminChangePassword.php" method="POST" onsubmit="return validatePassword()">
        <input type="password" name="newPassword" id="newPassword" placeholder="New Password"/>
        <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password"/>
        <button type="submit" name="changePass" class="btn btn-primary">Change Password</button>
    </form>
</div>

<script>
function validatePassword() {
    var newPassword = document.getElementById("newPassword").value;
    var confirmPassword = document.getElementById("confirmPassword").value;

    if (newPassword !== confirmPassword) {
        alert("Passwords do not match. Please try again.");
        return false; // Prevent form submission
    }

    return true; // Allow form submission
}
</script>

    
</body>
</html>