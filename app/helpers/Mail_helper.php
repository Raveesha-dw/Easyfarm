<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require APPROOT . '\vendor\autoload.php';

    function sendOTPByEmail($email, $otp){
        $mail = new PHPMailer;      
        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.elasticemail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'easyfarm123@mail.com'; // Your Elastic Email username
            $mail->Password   = '2B780F58D47E2A5866CC1DC9DECA11454EE0';     // Your Elastic Email API key
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 2525;

            // Recipients
            $mail->setFrom('easyfarm123@mail.com', 'EasyFarm'); // Sender's email address and name
            $mail->addAddress($email, 'Customer'); // Recipient's email address and name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Easyfarm - Verifying the Email for reset password';
            $mail->Body = 'Your OTP: ' . $otp;


            $mail->send();
            // echo 'Message has been sent';
        } 
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }

?>