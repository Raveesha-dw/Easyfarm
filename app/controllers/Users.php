<?php
require_once APPROOT . '/helpers/Mail_helper.php';
require_once APPROOT . '/helpers/OTP_helper.php';

class Users extends Controller
{
    private $userModel;
    public function __construct(){
        $this->userModel = $this->model('M_users');

    }

    public function assignUser($usertype){
        if ($usertype == 'Buyer') {
            $data = [
                'user_type' => '',
                'fullname' => '',
                'contactno' => '',
                'email' => '',
                'address' => '',
                'city' => '',
                'postalcode' => '',
                'password' => '',
                'confirm-password' => '',

                'name_err' => '',
                'contactno_err' => '',
                'email_err' => '',
                'address_err' => '',
                'password_err' => '',
                'confirm-password_err' => '',

            ];
            $this->view('Users/v_registerBuyer', $data);
        }

        if ($usertype == 'Seller') {
            $data = [
                'user_type' => '',
                'fullname' => '',
                'contactno' => '',
                'password' => '',
                'confirm-password' => '',
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
                'password_err' => '',
                'confirm-password_err' => '',

            ];
            $this->view('Users/v_registerSeller', $data);
        }
        if ($usertype == 'AgriExpert') {
            $data = [
                'user_type' => '',
                'fullname' => '',
                'contactno' => '',
                'password' => '',
                'confirm-password' => '',
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

        if ($usertype == 'VehicleRenter') {
            $data = [
                'user_type' => '',
                'fullname' => '',
                'contactno' => '',
                'email' => '',
                'address' => '',
                'city' => '',
                // 'postalcode' => '',
                // 'postalcode' => '',
                'password' => '',
                'confirm-password' => '',

                'name_err' => '',
                'contactno_err' => '',
                'email_err' => '',
                'address_err' => '',
                'password_err' => '',
                'confirm-password_err' => '',

            ];
            $this->view('Users/v_registerVehicleRenter', $data);
        }

    }

    public function register(){

        if ($_POST['user_type'] == 'Buyer') {
            //Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

                $data = [
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
                    'password_err' => '',
                    'confirm-password_err' => '',

                ];

                if (empty($data['fullname'])) {
                    $data['name_err'] = 'Please enter a name';
                }
                if (empty($data['contactno'])) {
                    $data['contactno_err'] = 'Please enter contact number';
                }
                if (strlen($data['contactno']) < 10) {
                    $data['contactno_err'] = 'Not enough digits in contact number';
                }

                if (empty($data['email'])) {
                    $data['email_err'] = 'Please enter an email';
                } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_err'] = "Invalid email format";
                } else {
                    if ($this->userModel->findUserByEmail($data['email'])) {
                        // echo("check1");
                        $data['email_err'] = 'Email is already registered';
                    }
                }

                if (empty($data['address'])) {
                    $data['address_err'] = 'Please enter your address';
                }
                if (empty($data['city'])) {
                    $data['address_err'] = 'Please enter your address';
                }
                if (empty($data['postalcode'])) {
                    $data['address_err'] = 'Please enter your address';
                }

                if (empty($data['password'])) {
                    $data['password_err'] = 'Please enter a password';
                } else if (strlen($data['password']) < 8) {
                    $data['password_err'] = 'Password should not contain more than 8 characters';
                } else if (ctype_lower($data['password']) || ctype_upper($data['password'])) {
                    $data['password_err'] = 'Password should contain both uppercase and lowercase characters';
                }
                // else if(ctype_alnum($data['password'])){
                //     $data['password_err'] = 'Password should contain one or more non-alphabetic characters';
                // }
                else if (empty($data['confirm-password'])) {
                    $data['confirm-password_err'] = 'Please re-enter your password';
                } else {
                    if ($data['password'] != $data['confirm-password']) {
                        $data['confirm-password_err'] = 'Does not match with the password';
                    }
                }

                if (empty($data['name_err']) && empty($data['contactno_err']) && empty($data['email_err']) && empty($data['address_err']) && empty($data['password_err']) && empty($data['confirm-password_err'])) {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    // $this->userModel->register($data);

                    if ($this->userModel->register($data)) {
                        flash('register_success', 'You have successfully registered with EasyFarm');
                        redirect('Users/login');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    $this->view('Users/v_registerBuyer', $data);
                }

            } else {
                $data = [
                    'user_type' => '',
                    'fullname' => '',
                    'contactno' => '',
                    'email' => '',
                    'address' => '',
                    'city' => '',
                    'postalcode' => '',
                    'password' => '',
                    'confirm-password' => '',

                    'name_err' => '',
                    'contactno_err' => '',
                    'email_err' => '',
                    'address_err' => '',
                    'password_err' => '',
                    'confirm-password_err' => '',

                ];
                $this->view('Users/v_registerBuyer', $data);

            }
        }

        if ($_POST['user_type'] == 'Seller') {
            //Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

                $data = [

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
                if (empty($data['contactno'])) {
                    $data['contactno_err'] = 'Please enter contact number';
                }
                if (strlen($data['contactno']) < 10) {
                    $data['contactno_err'] = 'Not enough digits in contact number';
                }

                if (empty($data['email'])) {
                    $data['email_err'] = 'Please enter an email';
                } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_err'] = "Invalid email format";
                } else {
                    if ($this->userModel->findUserByEmail($data['email'])) {
                        // echo("check1");
                        $data['email_err'] = 'Email is already registered';
                    }
                }

                // if(empty($data['address'])){
                //     $data['address_err'] = 'Please enter your address';
                // }
                // if(empty($data['city'])){
                //     $data['address_err'] = 'Please enter your address';
                // }

                if (empty($data['password'])) {
                    $data['password_err'] = 'Please enter a password';
                }

                else if(strlen($data['password'])<8){
                    $data['password_err'] = 'Password must be at least 8 charactors long';

                }
                else if(ctype_lower($data['password']) || ctype_upper($data['password'])){
                    $data['password_err'] = 'Password should contain both uppercase and lowercase characters';
                }
                // else if(ctype_alnum($data['password'])){
                //     $data['password_err'] = 'Password should contain one or more non-alphabetic characters';
                // }
                else if (empty($data['confirm-password'])) {
                    $data['confirm-password_err'] = 'Please re-enter your password';
                } else {
                    if ($data['password'] != $data['confirm-password']) {
                        $data['confirm-password_err'] = 'Does not match with the password';
                    }
                }

                if (empty($data['name_err']) && empty($data['contactno_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm-password_err'])) {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    if ($this->userModel->register($data)) {
                        flash('register_success', 'You have successfully registered with EasyFarm');
                         redirect('Users/login');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    $this->view('Users/v_registerSeller', $data);
                }

            } else {
                $data = [
                    'user_type' => '',
                    'fullname' => '',
                    'contactno' => '',
                    'password' => '',
                    'confirm-password' => '',
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
                    'password_err' => '',
                    'confirm-password_err' => '',

                ];
                $this->view('Users/v_registerSeller', $data);

            }
        }

        if ($_POST['user_type'] == 'AgricultureExpert') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

                // Get image data
                $nicPath = $_FILES['nic_img']['tmp_name'];
                $pidPath = $_FILES['pid_img']['tmp_name'];

                // Extract extensions from original file names
                $nicExtension = pathinfo($_FILES['nic_img']['name'], PATHINFO_EXTENSION);
                $pidExtension = pathinfo($_FILES['pid_img']['name'], PATHINFO_EXTENSION);

                // Validate extensions (considering case-sensitivity)
                $allowedExtensions = array('jpg', 'jpeg', 'png');
                if (!in_array(strtolower($nicExtension), $allowedExtensions)) {
                    die("Invalid file type uploaded for NIC: Only JPG, JPEG, and PNG files are allowed.");
                }
                if (!in_array(strtolower($pidExtension), $allowedExtensions)) {
                    die("Invalid file type uploaded for PID: Only JPG, JPEG, and PNG files are allowed.");
                }

                // print_r($nicExtension);
                // print_r($pidExtension);


                $nic_img = file_get_contents($nicPath);
                $nic_img = base64_encode($nic_img); // Convert binary data to base64 for database storage

                $pid_img = file_get_contents($pidPath);
                $pid_img = base64_encode($pid_img);

                $imgData = [
                    'nicPath' => $nicPath,
                    'pidPath' => $pidPath,
                    'nicExtension' => $nicExtension,
                    'pidExtension' => $pidExtension
                ];


                $data=[
                    'user_type' => $_POST['user_type'],
                    'fullname' => trim($_POST['fullname']),
                    'contactno' => trim($_POST['contactno']),
                    'password' => trim($_POST['password']),
                    'confirm-password' => trim($_POST['confirm-password']),
                    'email' => trim($_POST['email']),
                    'address' => trim($_POST['address']),
                    'city' => trim($_POST['city']),
                    'workplace'=> trim($_POST['workplace']),
                    'nic_img' => $nic_img,
                    'pid_img' => $pid_img,   
    
                    'name_err' => '',
                    'contactno_err' => '',
                    'email_err' => '',
                    'address_err' => '',
                    'nic_err' => '',
                    'pid_err' => '',
                    'password_err'=>'',
                    'confirm-password_err'=>''
                ];

                if (empty($data['fullname'])) {
                    $data['name_err'] = 'Please enter a name';
                }
                if (empty($data['contactno'])) {
                    $data['contactno_err'] = 'Please enter contact number';
                }
                if (strlen($data['contactno']) < 10) {
                    $data['contactno_err'] = 'Not enough digits in contact number';
                }

                if (empty($data['email'])) {
                    $data['email_err'] = 'Please enter an email';
                } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_err'] = "Invalid email format";
                }
                else{
                    if($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err']='Email is already registered';
                    }
                }

                if (empty($data['address'])) {
                    $data['address_err'] = 'Please enter your address';
                }
                if (empty($data['city'])) {
                    $data['address_err'] = 'Please enter your address';
                }

                if (empty($data['password'])) {
                    $data['password_err'] = 'Please enter a password';
                } else if (strlen($data['password']) < 8) {
                    $data['password_err'] = 'Password must be at least 8 charactors long';
                } else if (ctype_lower($data['password']) || ctype_upper($data['password'])) {
                    $data['password_err'] = 'Password should contain both uppercase and lowercase characters';
                }
                // else if(ctype_alnum($data['password'])){
                //     $data['password_err'] = 'Password should contain one or more non-alphabetic characters';
                // }
                else if (empty($data['confirm-password'])) {
                    $data['confirm-password_err'] = 'Please re-enter your password';
                } else {
                    if ($data['password'] != $data['confirm-password']) {
                        $data['confirm-password_err'] = 'Does not match with the password';
                    }
                }

                if(empty($data['nic_img'])){
                    $data['nic_err'] = 'Please upload your NIC';
                }

                if (empty($data['pid_img'])) {
                    $data['pid_err'] = 'Please upload your workplace ID';
                }

                if (empty($data['name_err']) && empty($data['contactno_err']) && empty($data['email_err']) && empty($data['address_err']) && empty($data['password_err']) && empty($data['confirm-password_err']) && empty($data['nic_err']) && empty($data['pid_err'])) {

                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                                 
                    if($this->userModel->register($data)){
                        sendDocumentsToCheckLegitamacy($data, $imgData);
                        // sendRegistrationSuccessEmail($data);
                        flash('register_success', 'You have successfully registered with EasyFarm');
                        redirect('Users/login');
                    }
                    else{
                        die('Something went wrong');
                    }
                } else {
                    $this->view('Users/v_registerAgriExpert', $data);
                }

            } else {

                $data = [
                    'user_type' => '',
                    'fullname' => '',
                    'contactno' => '',
                    'password' => '',
                    'confirm-password' => '',
                    'email' => '',
                    'address' => '',
                    'city' => '',
                    'workplace'=> '',
                    'nic_im'=>'',
                    'pid_img'=> '',
    
                    'name_err' => '',
                    'contactno_err' => '',
                    'email_err' => '',
                    'address_err' => '',
                    'password_err'=>'',
                    'confirm-password_err'=>'',
                    'nic_err' => '',
                    'pid_err' => ''
                ];

                 $this->view('Users/v_registerAgriExpert',$data);
            }
        }

        if ($_POST['user_type'] == 'VehicleRenter') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
                    'password_err' => '',
                    'confirm-password_err' => '',
                ];
                // print_r($data);
                if (empty($data['fullname'])) {
                    $data['name_err'] = 'Please enter a name';
                }
                if (empty($data['contactno'])) {
                    $data['contactno_err'] = 'Please enter contact number';
                }
                if (strlen($data['contactno']) < 10) {
                    $data['contactno_err'] = 'Not enough digits in contact number';
                }

                if (empty($data['email'])) {
                    $data['email_err'] = 'Please enter an email';
                } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_err'] = "Invalid email format";
                } else {
                    if ($this->userModel->findUserByEmail($data['email'])) {
                        // echo("check1");
                        $data['email_err'] = 'Email is already registered';
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
            else if(strlen($data['password'])<8){
                $data['password_err'] = 'Password must be at least 8 charactors long';
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


            if (empty($data['name_err']) && empty($data['contactno_err']) && empty($data['email_err']) && empty($data['address_err']) && empty($data['city_err']) && empty($data['password_err']) && empty($data['confirm-password_err'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if ($this->userModel->register($data)) {
                    redirect('Users/login');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('Users/v_registerVehicleRenter', $data);
            }

            } else {
                $data = [
                    'fullname' => '',
                    'contactno' => '',
                    'email' => '',
                    'address' => '',
                    'city' => '',
                    'password' => '',
                    'confirm-password' => '',
                    'values' => '',

                    'name_err' => '',
                    'contactno_err' => '',
                    'email_err' => '',
                    'address_err' => '',
                    'city_err' => '',
                    'password_err' => '',
                    'confirm-password_err' => '',

                ];
                $this->view('Users/v_registerVehicleRenter', $data);
            }
        }

    }

    public function login(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),

                'email_err' => '',
                'password_err' => '',

            ];

            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter an email';
            } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = 'Invalid email format';
            } else {
                if (!$this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'User account does not exist';
                }
            }

            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter your password';
            }
            


            if(empty($data['email_err']) && empty($data['password_err'])){
            
                $loggedInUser = $this->userModel->authenticateUser($data);

                if($loggedInUser){
                    $this->createUserSession($loggedInUser);                    
                }else{
                    $data['password_err'] = 'Password is incorrect';;
                    $this->view('Users/v_login', $data);
                }

            }else{
                $this->view('Users/v_login', $data);
            }




        } else {
            $data = [
                'email' => '',
                'password' => '',

                'email_err' => '',
                'password_err' => '',
            ];
            $this->view('Users/v_login', $data);
        }
    }

    public function createUserSession($user){

        $_SESSION['user_ID'] = $user->U_Id;
        $_SESSION['user_email'] = $user->Email;
        $_SESSION['user_type'] = $user->User_type;    

        if($_SESSION['user_type'] == 'Buyer'){
 
            $buyerData = $this->userModel->getBuyerInfo($_SESSION['user_ID']);
           
            $_SESSION['user_name'] = $buyerData->Name;

            header("Location:http://localhost/Easyfarm/Pages/index");

        }else if($_SESSION['user_type']  == 'Seller'){

            $sellerData = $this->userModel->getSellerInfo($_SESSION['user_ID']);
           
            $_SESSION['user_name'] = $sellerData->Name;
            $_SESSION['plan_id'] = $sellerData->plan_id;
            
            header("Location:http://localhost/Easyfarm/Seller_home/get_product_details1");

        }
        else if($_SESSION['user_type'] == 'VehicleRenter'){

            $vehicleOwnerData = $this->userModel->getVehicleOwnerInfo($_SESSION['user_ID']);

            $_SESSION['user_name'] = $vehicleOwnerData->Name;
            $_SESSION['plan_id'] = $vehicleOwnerData->plan_id;

            header("Location:http://localhost/Easyfarm/V_renter_home/get_details1");

        }else if($_SESSION['user_type'] == 'AgriExpert'){

            $agriInstructorData = $this->userModel->getAgriInstructorInfo($_SESSION['user_ID']);

            $_SESSION['user_name'] = $agriInstructorData->Name;
            $_SESSION['accStatus'] = $agriInstructorData->AccStatus;
            
            header("Location:http://localhost/Easyfarm/Blog");
        }
    }

    public function forgotPassword(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            if (empty($_POST['otp'])) {

                $data = [
                    'email' => trim($_POST['email']),
                    'otp' => '',

                    'email_err' => '',
                    'otp_err' => '',
                ];

                if (empty($data['email'])) {
                    $data['email_err'] = 'Please enter an email';
                } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_err'] = 'Invalid email format';
                } else {
                    if (!$this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'User account does not exist';
                    }
                }

                if (empty($data['email_err'])) {

                    $data['otp'] = generate_Otp();

                    // Save OTP, email, and expiration time in the database
                    $expirationTime = time() + (5 * 60); // OTP will expire in 5 minutes
                    $this->userModel->createToken($data, $expirationTime);
                 
                    // Send OTP to the user's email 
                    sendOTPByEmail($data['email'], $data['otp']); 

                }else{
                    $this->view('Users/v_forgotPassword', $data);
                }

                $this->view('Users/v_verifyEmail', $data);

            } else {

                $data = [
                    'email' => trim($_POST['email']),
                    'otp' => trim($_POST['otp']),

                    'email_err' => '',
                    'otp_err' => '',
                    'password_err' => '',
                    'confirm-password_err' => '',
                ];

                $tokenData = $this->userModel->verifyToken($data);

                if ($tokenData && $tokenData->User_OTP == $data['otp'] && time() <= $tokenData->ExpirationTime) {
                    // Token is valid and not expired
                    $this->view('Users/v_resetPassword', $data);

                } else if (empty($tokenData)) {

                    $data['otp_err'] = 'Your OTP is invalid';
                    $this->view('Users/v_verifyEmail', $data);

                } else {
                    // Token is invalid or expired
                    $data['otp_err'] = 'Your OTP is expired';
                    $this->view('Users/v_verifyEmail', $data);
                }

            }

        } else {
            $data = [
                'email' => '',
                'otp' => '',

                'email_err' => '',
                'otp_err' => '',
            ];

            if (!empty($_GET['email'])) {
                $data['email'] = $_GET['email'];

                $data['otp'] = generate_Otp();

                print_r($data['otp']);
                // Save OTP, email, and expiration time in the database
                $expirationTime = time() + (1 * 60); // OTP will expire in 1 minutes
                $this->userModel->createToken($data, $expirationTime);

             
                // Send OTP to the user's email 
                sendOTPByEmail($data['email'], $data['otp']); // Implement this function to send OTP via email

                $this->view('Users/v_verifyEmail', $data);

            } else {
                $this->view('Users/v_forgotPassword', $data);

            }

        }

    }

    public function resetPassword(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $data = [
                'email' => trim($_POST['email']),
                'otp' => $_POST['otp'],
                'password' => trim($_POST['password']),
                'confirm-password' => trim($_POST['confirm-password']),

                'otp_err' => '',
                'password_err' => '',
                'confirm-password_err' => '',

            ];

            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter a password';

            } else if (empty($data['confirm-password'])) {
                $data['confirm-password_err'] = 'Please confirm your password';

            } elseif ($data['password'] != $data['confirm-password']) {
                $data['confirm-password_err'] = 'Does not match with the password';

            } else if (strlen($data['password']) > 8) {
                $data['password_err'] = 'Password should not contain more than 8 characters';

            } else if (ctype_lower($data['password']) || ctype_upper($data['password'])) {
                $data['password_err'] = 'Password should contain both uppercase and lowercase characters';
            }
            
            if (empty($data['password_err']) && (empty($data['confirm-password_err']))) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
      
                // Reset the user's password
                $this->userModel->PasswordReset($data);

                // Clear the password reset token from the database
                $this->userModel->clearToken($data);

                header("Location:http://localhost/Easyfarm/Users/login");

            } else {
                $this->view('Users/v_resetPassword', $data);
            }

        }
    }
      
    public function logOut(){
        unset($_SESSION['user_ID']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_type']);
        unset($_SESSION['plan_id']);

        session_destroy();
        redirect('Pages/index');
    }

    public function isLoggedIn(){
        if (isset($_SESSION['user_ID'])) {
            return true;
        }else{
            false;
        }
    }

}
