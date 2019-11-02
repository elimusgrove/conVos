<?php
/**
 * Handle user registration to confirm the username isn't already in use.
 */

// Begin session
session_start();

// Invalid request to register
if (!isset($_POST['username']) || !isset($_POST['password'])){
    header("Location: ../index.php");
    exit(1);
}

// Connect to database
$conn = mysqli_connect('hsn.kwa.mybluehost.me', 'hsnkwamy', '8Rd23K*%', 'hsnkwamy_conVo');

// Escape given email and password
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Hash password
$hash = hash('sha256', $password);

// Determine if the given email already exists
$dup_query = mysqli_query($conn, "SELECT user_id FROM hsnkwamy_conVo.Users WHERE username='" . $username . "'");

// If query returned results, exit script
if (mysqli_num_rows($dup_query) > 0) {
    session_unset();
    header("Location: ../index.php?error=register");
    exit(1);
}
// Insert confirmed valid user
mysqli_query($conn, "INSERT INTO hsnkwamy.Users SET username='" . $username . "', hash='" . $hash . "'");

// Set username session var
session_unset();
$_SESSION['username'] = $username;
$_SESSION['login_time'] = time();

// Close connection
mysqli_close($conn);

// Redirect to index
header("Location: ../index.php");
