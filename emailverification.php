<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function send_otp($fullname, $email, $otp){

    $mail = new PHPMailer(true);                              // Passing true enables exceptions
    try {
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'laurenznicolo.briones.cics@ust.edu.ph';              // SMTP username
        $mail->Password = 'swsarqfxbsygcqry';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, ssl also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom( 'laurenznicolo.briones.cics@ust.edu.ph', 'LL Hotel Account System');
        $mail->addAddress( $email);     // Add a recipient
        //Content
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = "Your OTP Verification";
        $mail->Body    = "
            Dear " . $fullname . ",<br><br>
            Welcome to LL Hotel!<br><br>
            To complete your account registration, please use the following One-Time Password (OTP):<br><br>
            <strong>" . $otp . "</strong><br><br>
            This OTP is valid for the next 10 minutes. Please enter it on the registration page to verify your account.<br><br>
            Thank you for choosing [Hotel Name]. We look forward to providing you with an exceptional experience.<br><br>
            Best regards,<br>
            Laurenz Briones and Lorenz Bonifacio<br>
            LL Accounts Management Team<br>
            llhotel@gmail.com<br><br>
            ---
            <br>If you did not request this OTP, please ignore this email or contact our support team immediately.
        ";
        

        $mail->send();
        ?>
            <script>
                Swal.fire("Check Email for OTP");
            </script>
        <?php
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
} ?>