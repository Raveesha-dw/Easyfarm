<?php

class Profile extends Controller{
    private $profileModel;


    public function __construct()
    {
        $this->profileModel = $this->model('M_profile');
        
    }

    public function viewProfile() {

        if (($_SERVER['REQUEST_METHOD'] == 'GET')) {
            $_GET = filter_input_array(INPUT_GET, FILTER_UNSAFE_RAW);
    
            $data = [
    
                'password_err'=>'',
                'confirm-password_err'=>'',
    
            ];

            $result1 = $this->profileModel->getCommonUserDetails();
            
            if($result1->User_type == 'Buyer'){
                $result2 = $this->profileModel->getBuyerDetails($result1->U_Id);

            }else if($result1->User_type == 'Seller'){
                $result2 = $this->profileModel->getSellerDetails($result1->U_Id);
                
            }else if($result1->User_type == 'AgricultureExpert'){
                $result2 = $this->profileModel->getAgricultureExpertDetails($result1->U_Id);
                
            }else if($result1->User_type == 'VehicleRenter'){
                $result2 = $this->profileModel->getVehicleRenterDetails($result1->U_Id);
                
            }

            // Convert objects to arrays
            $array1 = get_object_vars($result1);
            $array2 = get_object_vars($result2);

            // Merge arrays and remove duplicates
            $mergedArray = array_merge($array1, $array2);
            $data1 = array_unique($mergedArray);
            $data = array_merge($data1, $data);
           
            $this->view('pages/profile', $data);
    
        }else{
            print_r("...................");
        }







    }

public function updateProfile() {
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
// print_r($_POST['email']);

        $data = [
            'email'=> trim($_POST['email']),
            'current-password' =>  trim($_POST['current-password']),
            'password' => trim($_POST['password']),
            'confirm-password' => trim($_POST['confirm-password']),

            'password_err'=>'',
            'confirm-password_err'=>'',

        ];

        if(strlen($data['password'])>8){
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

            $this->profileModel->updateProfile($data);


            $result1 = $this->profileModel->getUserByEmail($data);
            
            if($result1->User_type == 'Buyer'){
                $result2 = $this->profileModel->getBuyerDetails($result1->U_Id);

            }else if($result1->User_type == 'Seller'){
                $result2 = $this->profileModel->getSellerDetails($result1->U_Id);
                
            }else if($result1->User_type == 'AgricultureExpert'){
                $result2 = $this->profileModel->getAgricultureExpertDetails($result1->U_Id);
                
            }else if($result1->User_type == 'VehicleRenter'){
                $result2 = $this->profileModel->getVehicleRenterDetails($result1->U_Id);
                
            }


            // Convert objects to arrays
            $array1 = get_object_vars($result1);
            $array2 = get_object_vars($result2);

            // Merge arrays and remove duplicates
            $mergedArray = array_merge($array1, $array2);
            $data1 = array_unique($mergedArray);
            $data = array_merge($data1, $data);

           
            $this->view('pages/profile', $data);
        }

}


}
}





?>