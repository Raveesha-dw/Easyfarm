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

    function sendDocumentsToCheckLegitamacy($data, $imgData){

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
            $mail->addAddress('anjanatharusha13@gmail.com', 'Department of Agriculture'); // Recipient's email address and name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'EasyFarm: Verification Needed for New Agri Instructor Registration';

            $mail->Body = 'This individual wishes to register as an <b>Agriculture Instructor</b> on our platform <b>EasyFarm</b>. 
                            Kindly review the information and documents we have sent to you and <b>VERIFY</b> if the applicant is currently employed at your institute. <br><br>
                            Full Name: <b>' . $data['fullname'] . '</b><br>
                            Address: <b>' . $data['address'] . '</b><br>
                            City: <b>' . $data['city'] . '</b><br>
                            Workplace: <b>' . $data['workplace'] . '</b><br>
                            Contact No: <b>' . $data['contactno'] . '</b><br>
                            Email: <b>' . $data['email'] . '</b>
                            <br><br>Thank you. <br><br>EasyFarm';

            $mail->AddAttachment($imgData['nicPath'], "NIC_" . $data['contactno'] . "." . $imgData['nicExtension']);
            $mail->AddAttachment($imgData['pidPath'], "PID_" . $data['contactno'] . "." . $imgData['pidExtension']);


            $mail->send();
            // echo 'Message has been sent';
        } 
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

?>