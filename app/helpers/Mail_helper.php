<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require ROOT . '\vendor\autoload.php';


    function sendOTPByEmail($email, $otp){
        $mail = new PHPMailer;      
        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.elasticemail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'easyfarm123@mail.com'; //  Elastic Email username
            $mail->Password   = '2B780F58D47E2A5866CC1DC9DECA11454EE0';     //  Elastic Email API key
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

    function sendAccVerifiedEmail($email, $name){
        $mail = new PHPMailer;      
        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.elasticemail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'easyfarm123@mail.com'; //  Elastic Email username
            $mail->Password   = '2B780F58D47E2A5866CC1DC9DECA11454EE0';     //  Elastic Email API key
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 2525;

            // Recipients
            $mail->setFrom('easyfarm123@mail.com', 'EasyFarm'); // Sender's email address and name
            $mail->addAddress($email, $name); // Recipient's email address and name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Easyfarm - Account Verified!';
            $mail->Body = 'Dear ' . $name . ',<br><br> Your account has been successfully verified. You can log into <b>EasyFarm</b> now: <br>http://localhost/Easyfarm/Users/login<br><br>EasyFarm';


            $mail->send();
            // echo 'Message has been sent';
        } 
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    function sendAccRejectedEmail($email, $name){
        $mail = new PHPMailer;      
        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.elasticemail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'easyfarm123@mail.com'; //  Elastic Email username
            $mail->Password   = '2B780F58D47E2A5866CC1DC9DECA11454EE0';     //  Elastic Email API key
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 2525;

            // Recipients
            $mail->setFrom('easyfarm123@mail.com', 'EasyFarm'); // Sender's email address and name
            $mail->addAddress($email, $name); // Recipient's email address and name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Easyfarm - Account Rejected!';
            $mail->Body = 'Dear ' . $name . ',<br><br> Your registration at EasyFarm has been rejected due to missing required documents. You can register using a new email address and resubmit your information. If you have any problems, please contact our customer service representative: <email>info@easyfarm.lk</email> <br><br>EasyFarm';


            $mail->send();
            // echo 'Message has been sent';
        } 
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

?>