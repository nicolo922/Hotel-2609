<?php
require_once "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $fullname = $firstname . " " . $lastname;

    // Hash the password before saving it to the database for security
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $sql_insert = "INSERT INTO user_table (full_name, role, username, email, password) 
                   VALUES ('$fullname', '$role', '$username', '$email', '$hashed_password')";

    if (mysqli_query($conn, $sql_insert)) {
        echo "New User Created Successfully!";
        // Redirect to the login page after successful signup
        header("Location: Login.php");
        exit();
    } else {
        echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
