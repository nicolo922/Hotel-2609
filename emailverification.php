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
        $mail->Body    = "Hello". $fullname."
        <br> Greetings: ".$otp;

        $mail->send();
        ?>
            <script>
                alert("Email Successfully Send!!")
            </script>
        <?php
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
} ?>