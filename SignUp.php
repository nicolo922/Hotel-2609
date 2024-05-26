<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
        <h1>Sign Up</h1>
        <form method="POST" action="signup_process.php">
            <input type="text" name="firstname" placeholder="Firstname" required>
            <input type="text" name="lastname" placeholder="Lastname" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="role" required>
                <option value="" disabled selected>Choose</option>
                <option value="admin">Admin</option>
                <option value="customer">Customer</option>
                <option value="employee">Employee</option>
            </select>
            <div class="terms">
                <input type="checkbox" id="checkbox" required>
                <label for="checkbox">I agree to these <a href="#">Terms & Conditions</a></label>
            </div>
            <button type="submit">Sign Up</button>
        </form>
        <div class="member">Have an account? <a href="Login.php">Login Here</a></div>
    </div>
</body>
</html>


<?php
require_once "dbconnect.php";
include "emailverification.php";

// button function
if (isset($_POST['submit'])) {
    // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $fullname = $firstname .' '. $lastname;
    $otp = rand(100000, 999999);

    // User Type
    $role = $_POST['role']; // get the selected user type from the form

    // Insert query
    $insertsql = "INSERT INTO user_table (full_name, role, username, password, email, otp, verification)
    VALUES ('$fullname', '$role', '$username', '$password', '$email', '$otp', 'Not Active')";

    // Execute insert query
    $result = $conn->query($insertsql);

    // Check if data is inserted successfully
    if ($result === TRUE) { 
        send_otp($fullname, $email, $otp); // Assuming you have a function to send OTP
?>
        <script>
            window.location.href = "verifyotp.php"; // Redirect to OTP verification page
        </script>
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Successfully added",
                showConfirmButton: false,
                timer: 1500
            });
        </script>

<?php
    } else {
        // If not inserted
        echo $conn->error; // Display table error
    }
}
?>