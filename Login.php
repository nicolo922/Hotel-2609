<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/hotel_icon.png" type="image/x-icon">

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
        background: #fbf6ee;
    }

    .wrapper{
        width: 450px;
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
        border-radius: 5px;
        background: #e4e4e4;
    }

    button{
        font-size: 1rem;
        margin-top: 1.8rem;
        padding: 10px 0;
        border-radius: 10px;
        outline: none;
        border: none;
        width: 90%;
        color: #fff;
        cursor: pointer;
        background: #3c6930;
    }

    button:hover{
        background: #628759;;
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
        margin: 0.3rem 1.4rem 0 0;
    }

    .recover a{
        text-decoration: none;
        color: #464647;
    }

    .logo {
    text-align: center;
}

.logo img {
    max-width: 300px; 
    height: auto;
    padding-top: 50px;
    padding-bottom: 0;
}

</style>

<p class="logo"><img src="images/logohotel.png"></p>

<body>

<div class="wrapper">
    <h1>Login</h1>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <div class="recover">
            <a href="#">Forgot Password?</a>
        </div>
        <button type="submit">Login</button>
    </form>
    <div class="member">Don't have an account? <a href="SignUp.php">Signup Here</a></div>
</div>

<?php
session_start();
include "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $action = "Logged In";

    if (empty($username) || empty($password)) {
        header("Location: Login.php?error=Username and password are required!");
        exit();
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT user_id, username, password, full_name, role FROM user_table WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($user_id, $db_username, $hashed_password, $full_name, $role);
        $stmt->fetch();

        // Insert log entry into logs table
        $insert_log_sql = "INSERT INTO logs_table (user_id, action, DateTime) VALUES (?, ?, NOW())";
        $log_stmt = $conn->prepare($insert_log_sql);
        $log_stmt->bind_param("is", $user_id, $action);
        $log_stmt->execute();

        // Set session variables
        $_SESSION['username'] = $db_username;
        $_SESSION['name'] = $full_name;
        $_SESSION['id'] = $user_id;
        $_SESSION['role'] = $role;

        // Redirect to the respective dashboard based on user type
        if ($role == 'admin') {
            header("Location: UserTable.php");
        } elseif ($role == 'employee') {
            header("Location: Emp_RoomTable.php");
        } else {
            header("Location: Costumer_HotelHome.php");
        }
        exit();
    } else {
        header("Location: Login.php?error=Incorrect username or password");
        exit();
    }
}
?>

</body>
</html>
