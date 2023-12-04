<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require APPROOT . '\vendor\autoload.php';




class Users extends Controller{
    private $userModel;
    public function __construct()
    {
        $this->userModel = $this->model('M_users');
        
    }

    public function assignUser($usertype){
        if($usertype == 'Buyer'){
            $data=[
                'user_type'=> '',
                'fullname'=>'',
                'contactno'=>'',
                'email' => '',
                'address' => '',
                'city' => '',
                'postalcode' => '',
                'password'=>'',
                'confirm-password'=>'',

                'name_err' => '',
                'contactno_err' => '',
                'email_err' => '',
                'address_err' => '',
                'password_err'=>'',
                'confirm-password_err'=>'',

            ];
            $this->view('Users/v_registerBuyer',$data);
        }

        if($usertype == 'Seller'){
            $data=[
                'user_type'=> '',
                'fullname'=>'',
                'contactno'=>'',
                'password'=>'',
                'confirm-password'=>'',
                'email' => '',
                'nic' => '',
                'store_name' => '',
                'store_address' => '',
                'ac_Holder_name' => '',
                'bank_name' => '',
                'branch_name' => '',
                'ac_number' => '',
                
                

                'name_err' => '',
                'contactno_err' => '',
                'email_err' => '',
                'address_err' => '',
                'password_err'=>'',
                'confirm-password_err'=>'',

            ];
            $this->view('Users/v_registerSeller',$data);
        }
        if($usertype == 'AgriExpert'){
            $data=[
                'user_type'=> '',
                'fullname'=>'',
                'contactno'=>'',
                'password'=>'',
                'confirm-password'=>'',
                'email' => '',
                'address' => '',
                'city' => '',
                'occupation'=>'',
                'workplace'=> '',
                'nic'=>'',
                'pId'=> '',

                'name_err' => '',
                'contactno_err' => '',
                'email_err' => '',
                'address_err' => '',
                'password_err'=>'',
                'confirm-password_err'=>'',

            ];
            $this->view('Users/v_registerAgriExpert',$data);
        }

        if($usertype == 'VehicleRenter'){
            $data=[
                'user_type'=> '',
                'fullname'=>'',
                'contactno'=>'',
                'email' => '',
                'address' => '',
                'city' => '',
                // 'postalcode' => '',
                'password'=>'',
                'confirm-password'=>'',

                'name_err' => '',
                'contactno_err' => '',
                'email_err' => '',
                'address_err' => '',
                'password_err'=>'',
                'confirm-password_err'=>'',

            ];
            $this->view('Users/v_registerVehicleRenter',$data);
        }

    }

    public function register(){        

        if($_POST['user_type'] == 'Buyer'){
            //Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

                $data=[
                    'fullname' => trim($_POST['fullname']),
                    'contactno' => trim($_POST['contactno']),
                    'email' => trim($_POST['email']),
                    // 'address' => trim($_POST['address'] . ',' . trim($_POST['city']) . ',' . trim($_POST['postalcode'])),
                    'address' => trim($_POST['address']),
                    'city' => trim($_POST['city']),
                    'postalcode' => trim($_POST['postalcode']),
                    'password' => trim($_POST['password']),
                    'confirm-password' => trim($_POST['confirm-password']),
                    'user_type' => $_POST['user_type'],

                    'name_err' => '',
                    'contactno_err' => '',
                    'email_err' => '',
                    'address_err' => '',
                    'password_err'=>'',
                    'confirm-password_err'=>'',

                ];

                if(empty($data['fullname'])){
                    $data['name_err'] = 'Please enter a name';
                }
                if(empty($data['contactno'])){
                    $data['contactno_err'] = 'Please enter contact number';
                }
                if(strlen($data['contactno'])<10){
                    $data['contactno_err'] = 'Not enough digits in contact number';
                }

                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter an email';
                }
                else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_err'] = "Invalid email format";
                }
                else{
                    if($this->userModel->findUserByEmail($data['email'])) {
                        // echo("check1");
                        $data['email_err']='Email is already registered';
                    }
                }

                if(empty($data['address'])){
                    $data['address_err'] = 'Please enter your address';
                }
                if(empty($data['city'])){
                    $data['address_err'] = 'Please enter your address';
                }
                if(empty($data['postalcode'])){
                    $data['address_err'] = 'Please enter your address';
                }

                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter a password';
                }
                else if(strlen($data['password'])>8){
                    $data['password_err'] = 'Password should not contain more than 8 characters';
                }
                else if(ctype_lower($data['password']) || ctype_upper($data['password'])){
                    $data['password_err'] = 'Password should contain both uppercase and lowercase characters';
                }
                // else if(ctype_alnum($data['password'])){
                //     $data['password_err'] = 'Password should contain one or more non-alphabetic characters';
                // }
                else if(empty($data['confirm-password'])){
                    $data['confirm-password_err'] = 'Please re-enter your password';
                }else{
                    if($data['password'] != $data['confirm-password']){
                        $data['confirm-password_err'] = 'Does not match with the password';
                    }
                }

                if(empty($data['name_err']) && empty($data['contactno_err']) && empty($data['email_err']) && empty($data['address_err']) && empty($data['password_err']) && empty($data['confirm-password_err'])){
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    // $this->userModel->register($data);

                    if($this->userModel->register($data)){
                        header("Location:http://localhost/Easyfarm/Users/login");
                        flash('register_success', 'You have successfully registered with EasyFarm');
                        // $this->login();
                        // redirect('Users/v_login');
                    }   
                    else{
                        die('Something went wrong');
                    }
                }
                else{
                    $this->view('Users/v_registerBuyer', $data);
                }



            } else {
            $data=[
                'user_type'=> '',
                'fullname'=>'',
                'contactno'=>'',
                'email' => '',
                'address' => '',
                'city' => '',
                'postalcode' => '',
                'password'=>'',
                'confirm-password'=>'',

                'name_err' => '',
                'contactno_err' => '',
                'email_err' => '',
                'address_err' => '',
                'password_err'=>'',
                'confirm-password_err'=>'',

            ];
            $this->view('Users/v_registerBuyer',$data);
        
        }
        }

        if($_POST['user_type'] == 'Seller'){
            //Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

                

                $data=[

                    'user_type' => $_POST['user_type'],
                    'fullname' => trim($_POST['fullname']),
                    'contactno' => trim($_POST['contactno']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm-password' => trim($_POST['confirm-password']),
                    'nic' => $_POST['nic'],
                    'store_name' => trim($_POST['store_name']),
                    'store_address' => trim($_POST['store_address']),
                    'ac_Holder_name' => trim($_POST['ac_Holder_name']),
                    'bank_name' => trim($_POST['bank_name']),
                    'branch_name' => trim($_POST['branch_name']),
                    'ac_number' => trim($_POST['ac_number']),
                    
                    
    
                    'name_err' => '',
                    'contactno_err' => '',
                    'email_err' => '',
                    // 'address_err' => '',
                    'password_err'=>'',
                    'confirm-password_err'=>'',

                ];


                if(empty($data['fullname'])){
                    $data['name_err'] = 'Please enter a name';
                }
                if(empty($data['contactno'])){
                    $data['contactno_err'] = 'Please enter contact number';
                }
                if(strlen($data['contactno'])<10){
                    $data['contactno_err'] = 'Not enough digits in contact number';
                }

                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter an email';
                }
                else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_err'] = "Invalid email format";
                }
                else{
                    if($this->userModel->findUserByEmail($data['email'])) {
                        // echo("check1");
                        $data['email_err']='Email is already registered';
                    }
                }

                // if(empty($data['address'])){
                //     $data['address_err'] = 'Please enter your address';
                // }
                // if(empty($data['city'])){
                //     $data['address_err'] = 'Please enter your address';
                // }


                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter a password';
                }
                else if(strlen($data['password'])>8){
                    $data['password_err'] = 'Password should not contain more than 8 characters';
                }
                else if(ctype_lower($data['password']) || ctype_upper($data['password'])){
                    $data['password_err'] = 'Password should contain both uppercase and lowercase characters';
                }
                // else if(ctype_alnum($data['password'])){
                //     $data['password_err'] = 'Password should contain one or more non-alphabetic characters';
                // }
                else if(empty($data['confirm-password'])){
                    $data['confirm-password_err'] = 'Please re-enter your password';
                }else{
                    if($data['password'] != $data['confirm-password']){
                        $data['confirm-password_err'] = 'Does not match with the password';
                    }
                }


                if(empty($data['name_err']) && empty($data['contactno_err']) && empty($data['email_err'])   && empty($data['password_err']) && empty($data['confirm-password_err'])){
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    // $this->userModel->register($data);
                    
                    // print_r($data);
                    if($this->userModel->register($data)){
                        header("Location:http://localhost/Easyfarm/Users/login");
                        // print_r('Succefully Registered');
                        // $this->login();
                        // print_r($data);
                        // redirect('Users/v_login');
                        // flash('register_success', 'You have successfully registered with EasyFarm');
                        // $this->view('Pages/loginPage');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else{
                    $this->view('Users/v_registerSeller', $data);
                }



            } else {
            $data=[
                'user_type'=> '',
                'fullname'=>'',
                'contactno'=>'',
                'password'=>'',
                'confirm-password'=>'',
                'email' => '',
                'nic' => '',
                'store_name' => '',
                'store_address' => '',
                'ac_Holder_name' => '',
                'bank_name' => '',
                'branch_name' => '',
                'ac_number' => '',
                
                

                'name_err' => '',
                'contactno_err' => '',
                'email_err' => '',
                'address_err' => '',
                'password_err'=>'',
                'confirm-password_err'=>'',

            ];
            $this->view('Users/v_registerSeller',$data);
        
        }
        }

        if($_POST['user_type'] == 'AgricultureExpert'){
            //Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

               

                $data=[
                    'user_type' => $_POST['user_type'],
                    'fullname' => trim($_POST['fullname']),
                    'contactno' => trim($_POST['contactno']),
                    'password' => trim($_POST['password']),
                    'confirm-password' => trim($_POST['confirm-password']),
                    'email' => trim($_POST['email']),
                    'address' => trim($_POST['address']),
                    'city' => trim($_POST['city']),
                    'occupation'=>trim($_POST['occupation']),
                    'workplace'=> trim($_POST['workplace']),
                    'nic'=> $_POST['nic'],
                    'pId'=> $_POST['pId'],
    
                    'name_err' => '',
                    'contactno_err' => '',
                    'email_err' => '',
                    'address_err' => '',
                    'password_err'=>'',
                    'confirm-password_err'=>'',
    
                
                ];

                if(empty($data['fullname'])){
                    $data['name_err'] = 'Please enter a name';
                }
                if(empty($data['contactno'])){
                    $data['contactno_err'] = 'Please enter contact number';
                }
                if(strlen($data['contactno'])<10){
                    $data['contactno_err'] = 'Not enough digits in contact number';
                }

                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter an email';
                }
                else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_err'] = "Invalid email format";
                }
                else{
                    if($this->userModel->findUserByEmail($data['email'])) {
                        // echo("check1");
                        $data['email_err']='Email is already registered';
                    }
                }

                if(empty($data['address'])){
                    $data['address_err'] = 'Please enter your address';
                }
                if(empty($data['city'])){
                    $data['address_err'] = 'Please enter your address';
                }


                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter a password';
                }
                else if(strlen($data['password'])>8){
                    $data['password_err'] = 'Password should not contain more than 8 characters';
                }
                else if(ctype_lower($data['password']) || ctype_upper($data['password'])){
                    $data['password_err'] = 'Password should contain both uppercase and lowercase characters';
                }
                // else if(ctype_alnum($data['password'])){
                //     $data['password_err'] = 'Password should contain one or more non-alphabetic characters';
                // }
                else if(empty($data['confirm-password'])){
                    $data['confirm-password_err'] = 'Please re-enter your password';
                }else{
                    if($data['password'] != $data['confirm-password']){
                        $data['confirm-password_err'] = 'Does not match with the password';
                    }
                }

                if(empty($data['name_err']) && empty($data['contactno_err']) && empty($data['email_err']) && empty($data['address_err']) && empty($data['password_err']) && empty($data['confirm-password_err'])){
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    // $this->userModel->register($data);
                    
                    
                    if($this->userModel->register($data)){
                        // $this->login();
                        header("Location:http://localhost/Easyfarm/Users/login");
                        // redirect('Users/v_login');
                        flash('register_success', 'You have successfully registered with EasyFarm');
                        // $this->view('Pages/loginPage');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else{
                    $this->view('Users/v_registerAgriExpert', $data);
                }



            } else {
          
                $data=[
                    'user_type'=> '',
                    'fullname'=>'',
                    'contactno'=>'',
                    'password'=>'',
                    'confirm-password'=>'',
                    'email' => '',
                    'address' => '',
                    'city' => '',
                    'occupation'=>'',
                    'workplace'=> '',
                    'nic'=>'',
                    'pId'=> '',
    
                    'name_err' => '',
                    'contactno_err' => '',
                    'email_err' => '',
                    'address_err' => '',
                    'password_err'=>'',
                    'confirm-password_err'=>'',
    

            ];
            $this->view('Users/v_registerAgriExpert',$data);
        
        }
        }

    if($_POST['user_type'] == 'VehicleRenter'){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $data = [
                'fullname' => trim($_POST['fullname']),
                'contactno' => trim($_POST['contactno']),
                'email' => trim($_POST['email']),
                'address' => trim($_POST['address']),
                'city' => trim($_POST['city']),
                'password' => trim($_POST['password']),
                'confirm-password' => trim($_POST['confirm-password']),
                // 'values' => trim($_POST['values[]']),
                'user_type' => $_POST['user_type'],

                'name_err' => '',
                'contactno_err' => '',
                'email_err' => '',
                'address_err' => '',
                'city_err' => '',
                // 'values_err' => '',
                'password_err'=>'',
                'confirm-password_err'=>''
            ];

            if(empty($data['fullname'])){
                $data['name_err'] = 'Please enter a name';
            }
            if(empty($data['contactno'])){
                $data['contactno_err'] = 'Please enter contact number';
            }
            if(strlen($data['contactno'])<10){
                $data['contactno_err'] = 'Not enough digits in contact number';
            }

            if(empty($data['email'])){
                $data['email_err'] = 'Please enter an email';
            }
            else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = "Invalid email format";
            }
            else{
                if($this->userModel->findUserByEmail($data['email'])) {
                    // echo("check1");
                    $data['email_err']='Email is already registered';
                }
            }

            if(empty($data['address'])){
                $data['address_err'] = 'Please enter your address';
            }
            if(empty($data['city'])){
                $data['city_err'] = 'Please enter nearest City';
            }
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter a password';
            }
            else if(strlen($data['password'])>8){
                $data['password_err'] = 'Password should not contain more than 8 characters';
            }
            else if(ctype_lower($data['password']) || ctype_upper($data['password'])){
                $data['password_err'] = 'Password should contain both uppercase and lowercase characters';
            }
            
            else if(empty($data['confirm-password'])){
                $data['confirm-password_err'] = 'Please re-enter your password';
            }else{
                if($data['password'] != $data['confirm-password']){
                    $data['confirm-password_err'] = 'Does not match with the password';
                }
            }

            // if(empty($data['values'])){
            //     $data['values_err'] = 'Please enter your Vehicle Numbers(s)';
            // }

            if(empty($data['name_err']) && empty($data['contactno_err']) && empty($data['email_err']) && empty($data['address_err']) && empty($data['city_err']) && empty($data['password_err']) && empty($data['confirm-password_err'])){
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                // $this->userModel->register($data);
                
                
                if($this->userModel->register($data)){
                    header("Location:http://localhost/Easyfarm/Users/login");
                    flash('register_success', 'You have successfully registered with EasyFarm');
                    // $this->login();
                    // redirect('Users/v_login');
                }   
                else{
                    die('Something went wrong');
                }
            }
            else{
                $this->view('Users/v_registerVehicleRenter', $data);
            }


        }else {
            $data=[
                'fullname'=>'',
                'contactno'=>'',
                'email' => '',
                'address' => '',
                'city' => '',
                'password'=>'',
                'confirm-password'=>'',
                'values' => '',

                'name_err' => '',
                'contactno_err' => '',
                'email_err' => '',
                'address_err' => '',
                'city_err' => '',
                'password_err'=>'',
                'confirm-password_err'=>'',

            ];
            $this->view('Users/v_registerVehicleRenter',$data);
        }
    }
    
}

    public function login(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),

                'email_err' => '',
                'password_err' => '',

            ];

            if(empty($data['email'])){
                $data['email_err'] = 'Please enter an email';
            }else if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $data['email_err'] = 'Invalid email format';
            }else{
                if(!$this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'User account does not exist';
                }
            }

            if(empty($data['password'])){
                $data['password_err'] = 'Please enter your password';
            }
            


            




            if(empty($data['email_err']) && empty($data['password_err'])){
                
                $logged_user = $this->userModel->login($data);
                
                if($logged_user){
                    $this->createUserSession($logged_user);                    
                } // Logging in user
                else{
                    $data['password_err'] = 'Password is incorrect';
                    $this->view('Users/v_login', $data);
                }
            }else{
                $this->view('Users/v_login', $data);
            }

        }else{
            $data=[
                'email' => '',
                'password' => '',

                'email_err' => '',
                'password_err' => ''
            ];
            $this->view('Users/v_login', $data);
        }
    }




    public function forgotPassword(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            
            if(empty($_POST['otp'])){

                $data = [
                    'email' => trim($_POST['email']),
                    'otp' =>'',
    
                    'email_err' => '',
                    'otp_err'=> '',
                ];
    
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter an email';
                }else if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                    $data['email_err'] = 'Invalid email format';
                }else{
                    if(!$this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'User account does not exist';
                    }
                }
    
               
                if ( empty($data['email_err'])) {
                    
                    // generate otp
                    $characters = '0123456789';
                    $length = 6;
                    $otp = '';
    
                    for ($i = 0; $i < $length; $i++) {
                        $otp .= $characters[rand(0, strlen($characters) - 1)];
                    }
                    $data['otp'] = $otp;
    
                    // print_r($data['otp']);
    
                    // Save OTP, email, and expiration time in the database
                    $expirationTime = time() + (1*60); // OTP will expire in 1 minutes
                    $this->userModel->createToken($data, $expirationTime);
    
                    // TODO:
                    // Send OTP to the user's email (you can use a library like PHPMailer for this)
                    $this->sendOTPByEmail($data['email'], $data['otp']); // Implement this function to send OTP via email
                    
                    // $mail = new PHPMailer;      
                    // // Create a new PHPMailer instance
                    // $mail = new PHPMailer(true);
    
                    // try {
                    //     // Server settings
                    //     $mail->isSMTP();
                    //     $mail->Host       = 'smtp.elasticemail.com';
                    //     $mail->SMTPAuth   = true;
                    //     $mail->Username   = 'easyfarm123@mail.com'; // Your Elastic Email username
                    //     $mail->Password   = '2B780F58D47E2A5866CC1DC9DECA11454EE0';     // Your Elastic Email API key
                    //     $mail->SMTPSecure = 'tls';
                    //     $mail->Port       = 2525;
    
                    //     // Recipients
                    //     $mail->setFrom('easyfarm123@mail.com', 'EasyFarm'); // Sender's email address and name
                    //     $mail->addAddress($data['email'], 'Customer'); // Recipient's email address and name
    
                    //     // Content
                    //     $mail->isHTML(true);                                  // Set email format to HTML
                    //     $mail->Subject = 'Easyfarm - Verifying the Email for reset password';
                    //     $mail->Body = 'Your OTP: ' . $data['otp'];
    
    
                    //     $mail->send();
                    //     // echo 'Message has been sent';
                    // } 
                    // catch (Exception $e) {
                    //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    //  }
    
                }else{
                    $this->view('Users/v_forgotPassword', $data);
                }
    
    
                $this->view('Users/v_verifyEmail', $data);
              
    
            }else{

                $data = [
                    'email' => trim($_POST['email']),
                    'otp' =>trim($_POST['otp']),

    
                    'email_err' => '',
                    'otp_err'=> '',
                    'password_err'=>'',
                    'confirm-password_err'=>'',
                ];


                // print_r($this->userModel->verifyToken($data));

                // $Mitems =$this->userModel->verifyToken($data);
                // $items = (array) $Mitems;
                // $data = array();
                // foreach ($items as $Mitem) {
                //     $viewItem = array();
                //     $item = (array) $Mitem;
                //     $viewItem['quantity'] = $item ['Quantity'];
                //     $viewItem['itemId'] = $item['Item_Id'];
                //     $viewItem['uId'] = $item['U_Id'];
                //     $viewItem['unitPrice'] = $item['Unit_price'];
                //     $viewItem['itemName'] = $item['Item_name'];
                //     array_push($data, $viewItem);




                $tokenData = $this->userModel->verifyToken($data);
                print_r($tokenData );

                if ($tokenData && $tokenData->User_OTP == $data['otp'] && time() <= $tokenData->ExpirationTime) {
                    // Token is valid and not expired
                    $this->view('Users/v_resetPassword', $data);
                } else {
                    // Token is invalid or expired
                    $data['otp_err'] = 'Your OTP is invalid or expired';
                    $this->view('Users/v_verifyEmail', $data);
                }




                // $sendOtp = array() ;
                // if(($sendOtp =$this->userModel->verifyToken($data)) ){
                //     print_r($sendOtp);

                //     if(($sendOtp->User_OTP == $data['otp'] )){

                //         $this->view('Users/v_resetPassword', $data);

                //     }

                   


                // }else{
                //     $data['otp_err'] = 'Your OTP is invalid';

                //     $this->view('Users/v_verifyEmail', $data);

                // }
            }


        }else{
            $data = [
                'email' => '',
                'otp' => '',

                'email_err' => '',
                'otp_err'=> '',
            ];
            $this->view('Users/v_forgotPassword', $data);
    
    
            }

        }
     private function sendOTPByEmail($email, $otp){
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







    public function resetPassword(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);


            $data = [
                'email'=> trim($_POST['email']),
                'otp' => $_POST['otp'],
                'password' => trim($_POST['password']),
                'confirm-password' => trim($_POST['confirm-password']),

                'otp_err'=> '',
                'password_err'=>'',
                'confirm-password_err'=>'',

            ];


            if(empty($data['password'])){
                $data['password_err'] = 'Please enter a password';
            }
            else if(strlen($data['password'])>8){
                $data['password_err'] = 'Password should not contain more than 8 characters';
            }
            else if(ctype_lower($data['password']) || ctype_upper($data['password'])){
                $data['password_err'] = 'Password should contain both uppercase and lowercase characters';
            }
            // else if(ctype_alnum($data['password'])){
            //     $data['password_err'] = 'Password should contain one or more non-alphabetic characters';
            // }
            else if(empty($data['confirm-password'])){
                $data['confirm-password_err'] = 'Please re-enter your password';
            }else{
                if($data['password'] != $data['confirm-password']){
                    $data['confirm-password_err'] = 'Does not match with the password';
                }
            }

            
            
            
            
            if(empty($data['password_err']) && (empty($data['confirm-password_err'])) ){
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            print_r("kjbaux");
                print_r($data);
                // Reset the user's password
                $this->userModel->PasswordReset($data);

                 // Clear the password reset token from the database
                 $this->userModel->clearToken($data);
                 print_r($data);

                 $this->view('pages/home', $data);

            

        }else{
            $data = [
                'email'=> '',
                'otp' => '',
                'password' => '',
                'confirm-password' => '',

                'otp_err'=> '',
                'password_err'=>'',
                'confirm-password_err'=>'',
            ];
            $this->view('Uses/v_resetPassword', $data);

        }

    }}

    public function createUserSession($user){
        $_SESSION['user_ID'] = $user->U_Id;
        $_SESSION['user_email'] = $user->Email;
        // $_SESSION['user_name'] = $user->Name;
        $_SESSION['user_type'] = $user->User_type;

        if($_SESSION['user_type'] == 'Buyer'){
            // redirect('Pages/index');
            // $this->view('pages/home');
            header("Location:http://localhost/Easyfarm/Pages/index");
            
        }else if($_SESSION['user_type'] == 'Seller'){
            // redirect('Pages/Profile');
            header("Location:http://localhost/Easyfarm/Pages/seller_home");

        }else if($_SESSION['user_type'] == 'AgriExpert'){
            // redirect('Pages/Profile');
            $this->view('Pages/index');

        }else if($_SESSION['user_type'] == 'VehicleRenter'){
            // redirect('Pages/Profile');
            $this->view('Pages/index');

        }    
        // else  if($_SESSION['user_type'] == 'Admin'){

        // }
    }

    public function logOut(){
        unset($_SESSION['user_ID']); 
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_type']);

        session_destroy();
        redirect('Pages/index');
    }

    public function isLoggedIn(){
        if(isset($_SESSION['user_ID'])){
            return true;
        }
        else{
            false;
        }
    }


}