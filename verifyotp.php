<?php

require_once "dbconnect.php";

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
    body {
    background: #f2f2f2;
    font-family: Arial, sans-serif;
}

.section-padding-100 {
    padding: 100px 0;
}

.roberto-contact-area .container {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.contact-form-area {
    padding: 50px;
}

.contact-form-area h2 {
    font-size: 2rem;
    color: #333;
    margin-bottom: 20px;
}

.contact-form-area .form-group {
    margin-bottom: 1.5rem;
}

.contact-form-area .form-group label {
    font-size: 1rem;
    color: #333;
    margin-bottom: 0.5rem;
    display: block;
}

.contact-form-area .form-group input {
    width: 100%;
    padding: 10px;
    font-size: 1rem;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.contact-form-area .btn {
    background: #007bff;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
}

.contact-form-area .btn:hover {
    background: #0056b3;
}

    </style>
<body>
    <section class="roberto-contact-area section-padding-100">
        <div class="container">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>