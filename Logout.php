<?php
session_start();
include "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = ($_POST['username']);
    $password = md5($_POST['password']);
    $action = "Logged Out";
}

    if (empty($username) || empty($password)) {
        header("Location: Login.php?error=Username and password are required!");
        exit();
    }

// Redirect back to the page or to a login page
header("Location: Login.php"); // Replace with your desired redirect page
exit();

?>