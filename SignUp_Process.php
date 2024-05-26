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
        send_otp($fullname, $email, $otp); // Assuming you have a function to send OTP
?>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Successfully added',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = 'verifyotp.php'; // Redirect to OTP verification page
            });
        </script>
<?php
    } else {
        // Handle insertion error
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
