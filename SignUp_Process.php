<?php

require_once "dbconnect.php";
include "emailverification.php";

if (isset($_POST['submit'])) {
    // Sanitize user input
    $firstname = $conn->real_escape_string(trim($_POST['firstname']));
    $lastname = $conn->real_escape_string(trim($_POST['lastname']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $username = $conn->real_escape_string(trim($_POST['username']));
    $password = md5(trim($_POST['password']));
    $role = $conn->real_escape_string(trim($_POST['role']));
    $fullname = $firstname . ' ' . $lastname;
    $otp = rand(100000, 999999);

    // Insert query
    $insertQuery = "INSERT INTO user_table (full_name, role, username, password, email, otp, verification) 
                    VALUES ('$fullname', '$role', '$username', '$password', '$email', '$otp', 'Not Active')";

    // Execute insert query
    if ($conn->query($insertQuery) === TRUE) {
        send_otp($fullname, $email, $otp);
?>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Successfully added',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = 'verifyotp.php';
            });
        </script>
<?php
    } else {
        echo "<script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Error: " . $conn->error . "',
                showConfirmButton: true
            });
        </script>";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
    padding-top: 20px;
    padding-bottom: 0;
}
</style>

<body>
    <section class="roberto-contact-area section-padding-100">
        <div class="wrapper">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="contact-form-area contact-page">
                        <h2 class="text-center mb-4">OTP Verification</h2>
                        <div class="text-center fw-bold">
                            <p class="text-warning h6 mb-4">One time password (OTP) was sent to your email</p>
                        </div>
                        <form action="verifyotp.php" method="post">
                            <!-- OTP input -->
                            <div class="form-group mb-4">
                                <label for="enterotp">Enter the OTP Number to verify</label>
                                <input type="text" name="enterotp" id="enterotp" class="form-control" required>
                            </div>
                            <!-- Verify button -->
                            <button type="submit" name="ver" class="btn roberto-btn btn-block w-100 mb-4">Verify</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

<?php
if (isset($_POST['ver'])) {
    $enterotp = $_POST['enterotp'];

    // Escape user input to prevent SQL injection
    $check_otp_query = "SELECT * FROM user_table WHERE otp='$enterotp'";
    $check_otp_result = $conn->query($check_otp_query);

    if ($check_otp_result->num_rows > 0) {
        // OTP exists in the database
        $update_status_query = "UPDATE user_table SET verification='Active' WHERE otp='$enterotp'";
        $conn->query($update_status_query);

        // Redirect to login.php
        header("Location: Login.php");
        exit();
    } else {
        echo '<script>
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Invalid OTP number",
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = "verifyotp.php"; 
                });
              </script>';
    }
}
?>