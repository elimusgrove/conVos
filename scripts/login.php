<?php
/**
 * Handle user login to confirm the username and hash combo.
 */

// Begin session
session_start();

// Invalid request to login
if (!isset($_POST['username']) || !isset($_POST['password'])){
    exit(1);
}

// Connect to database
$conn = mysqli_connect('hsn.kwa.mybluehost.me', 'hsnkwamy', '8Rd23K*%', 'hsnkwamy_conVo');

// Escape given email and password
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Hash password
$hash = hash('sha256', $password);

// Query users for email and hash combination
$validation_query = mysqli_query($conn, "SELECT user_id FROM hsnkwamy_conVo.Users WHERE username='" . $username . "' AND hash='" . $hash . "'");

// If account is invalid, stop script
if (mysqli_num_rows($validation_query) < 1) {
    exit(1);
}

// Set username session var
session_unset();
$_SESSION['username'] = $username;
$_SESSION['login_time'] = time();

// Close connection
mysqli_close($conn);

// Redirect to index
header("Location: ../index.php");
