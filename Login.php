<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body{
        background: #dfe9f5;
    }

    .wrapper{
        width: 320px;
        padding: 2rem 1rem;
        margin: 50px auto;
        background-color: #fff;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
    }

    h1{
        font-size: 2rem;
        color: #07001f;
        margin-bottom: 1.2rem;
    }

    form input{
        width: 92%;
        outline: none;
        border: 1px solid #fff;
        padding: 12px 20px;
        margin-bottom: 10px;
        border-radius: 20px;
        background: #e4e4e4;
    }

    button{
        font-size: 1rem;
        margin-top: 1.8rem;
        padding: 10px 0;
        border-radius: 20px;
        outline: none;
        border: none;
        width: 90%;
        color: #fff;
        cursor: pointer;
        background: rgb(17, 107, 143);
    }

    button:hover{
        background: rgba(17, 107, 143, 0.877);
    }

    input:focus{
        border: 1px solid rgb(192, 192, 192);
    }

    .terms{
        margin-top: 0.2rem;
    }

    .terms input{
        height: 1em;
        width: 1em;
        vertical-align: middle;
        cursor: pointer;
    }

    .terms label{
        font-size:0.7rem;
    }

    .terms a{
        color: rgb(17, 107, 143);
        text-decoration: none;
    }

    .member a{
        font-size: 0.8rem;
        margin-top: 1.4rem;
        color: #636363;
        text-align: center;
    }

    .member a{
        color: rgb(17, 107, 143);
        text-decoration: none;
    }

    .recover{
        text-align: right;
        font-size: 0.7rem;
        margin: 0.3rem 1.4rem 0 0.;
    }

    .recover a{
        text-decoration: none;
        color: #464647;
    }

    </style>

<body>
<div class="wrapper">
        <h1>Login</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <div class="recover">
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit">Login</button>
        </form>
        <div class="member">Create an account <a href="SignUp.php">Sign-up Here</a></div>
    </div>

    <?php
require_once "dbconnect.php";

// Define variables to hold error messages
$usernameErr = $passwordErr = $loginErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username and password
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Check if username is empty
    if (empty($username)) {
        $usernameErr = "Username is required";
    }

    // Check if password is empty
    if (empty($password)) {
        $passwordErr = "Password is required";
    }

    // Proceed with login if no validation errors
    if (empty($usernameErr) && empty($passwordErr)) {
        // Check if the username exists in the database
        $sql = "SELECT * FROM user_table WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Error fetching data: " . mysqli_error($conn));
        }

        // If the username exists, check the password
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row['password'];

            if (password_verify($password, $hashed_password)) {
                // Successful login, redirect to HotelHome.php
                header("Location: HotelHome.php");
                exit();
            } else {
                // Invalid password
                $loginErr = "Invalid password. Please try again.";
            }
        } else {
            // Username doesn't exist
            $loginErr = "No account found for username: $username";
        }
    }
}

mysqli_close($conn);
?>

</body>
</html>
