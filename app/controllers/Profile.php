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
            $data = array_unique($mergedArray);

           
            $this->view('pages/profile', $data);
    
        }else{
            print_r("...................");
        }







    }



    // $item=get_object_vars($item[0]);






































}





?>