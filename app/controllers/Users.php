<?php
class Users extends Controller{
    
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
        if($usertype == 'VehicleRenter'){
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
                        $this->login();
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
                'values' => trim($_POST['values[]']),
                'user_type' => $_POST['user_type'],

                'name_err' => '',
                'contactno_err' => '',
                'email_err' => '',
                'address_err' => '',
                'password_err'=>'',
                'confirm-password_err'=>''
            ];

            if(empty($data['fullname'])){
                $data['name_err'] = 'Please enter a name';
            }
            if(empty($data['contactno'])){
                $data['contactno_err'] = 'Please enter contact number';
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

    public function resetPassword(){

    }

    public function createUserSession($user){
        $_SESSION['user_ID'] = $user->U_ID;
        $_SESSION['user_email'] = $user->Email;
        $_SESSION['user_type'] = $user->User_type;

        if($_SESSION['user_type'] == 'Buyer'){
            echo "Buyer";
            
        }else if($_SESSION['user_type'] == 'Seller'){

        }else if($_SESSION['user_type'] == 'AgriExpert'){

        }else if($_SESSION['user_type'] == 'VehicleRenter'){

        }    
        // else  if($_SESSION['user_type'] == 'Admin'){

        // }
    }

    public function logOut(){
        unset($_SESSION['user_ID']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_type']);

        session_destroy();
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