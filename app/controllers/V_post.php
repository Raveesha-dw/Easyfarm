<?php
include_once APPROOT . '/helpers/image_helper.php';


class V_post extends Controller{
    private $v_postModel;
    
    public function __construct()
    {
       
        $this->v_postModel = $this->model('M_vPost');

    }
  
  
  

public function creating(){
    
    $data=[
        'Owner_Id' => '',
        'V_category' => '',
        'V_name' => '',
        'V_number' => '',
        'Contact_Number'=> '',
        'Rental_Fee' => '',
        'Charging_Unit' => '',
        'Calender' => '',
        'Address' => '',
        'Description' => '',
        'Image' => '',
        
    

        
        'V_category_err' => '',
        'V_name_err' => '',
        'V_number_err' => '',
        'Contact_Number_err'=> '',
        'Rental_Fee_err' => '',
        'Charging_Unit_err' => '',
        'Calender_err' => '',
        'Address_err' => '',
        'Description_err' => '',
        'Image_err' => '',
        

    ];
    $this->view('VehicleRenter\v_vehicle_create_post',$data);

}
public  function create_post(){
    

   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
       







        $data = [

                'Owner_Id' =>  $_SESSION['user_ID'],

                'V_category' => isset($_POST['V_category']) ? trim($_POST['V_category']) : '',
                'V_name' => isset($_POST['V_name']) ? trim($_POST['V_name']) : '',
                'V_number' => isset($_POST['V_number']) ? trim($_POST['V_number']) : '',
                'Contact_Number' => isset($_POST['Contact_Number']) ? trim($_POST['Contact_Number']) : '',
                'Rental_Fee' => isset($_POST['Rental_Fee']) ? trim($_POST['Rental_Fee']) : '',
                'Charging_Unit' => isset($_POST['Charging_Unit']) ? trim($_POST['Charging_Unit']) : '',
                'Calender' => isset($_POST['Calender']) ? trim($_POST['Calender']) : '',
                'Address' => isset($_POST['address']) ? trim($_POST['address']) : '',
                'Description' => isset($_POST['Description']) ? trim($_POST['Description']) : '',
                'Image' => isset($_FILES['Image']) ? $_FILES['Image'] : [],
                'Image_name' => time() . '_' . (isset($_FILES['Image']['name']) ? $_FILES['Image']['name'] : ''),


                'V_category_err' => '',
                'V_name_err' => '',
                'V_number_err' => '',
                'Contact_Number_err'=> '',
                'Rental_Fee_err' => '',
                'Charging_Unit_err' => '',
                'Calender_err' => '',
                'Address_err' => '',
                'Description_err' => '',
                'Image_err' => '',




                
            
        ];
       
        if (empty($data['V_category'])){
            $data['V_category_err'] = 'please choose a category';
        
            }
        
        
        if (empty($data['V_name'])){
            $data['V_name_err'] = 'Please enter the vehicle name';
            
        }
        
            
        if (empty($data['V_number'])){
            $data['V_number_err'] = 'Please enter the vehicle number';
        
        }

        if (empty($data['Contact_Number'])){
            $data['Contact_Number'] = 'Please enter the Contact_Number';
        
        }       

        if (empty($data['Rental_Fee'])){
            $data['Rental_Fee_err'] = 'Please enter the Rental_Fee';
        
        }       
        if (empty($data['Charging_Unit'])){
            $data['Charging_Unit'] = 'Please enter the Charging_Unit';
        
        }               
        if (empty($data['Calender'])){
            $data['Calender'] = 'Please enter the Calender';
        
        }                   
        if (empty($data['Address'])){
            $data['Address_err'] = 'Please enter the Address';
        
        }                   
        if (empty($data['Contact_Number'])){
            $data['Contact_Number'] = 'Please enter the Contact_Number';
        
        }       

            if(empty($data['V_category_err']) && empty($data['V_name_err']) && empty($data['V_number_err'])&& empty( $data['Contact_Number_err']) && empty($data['Rental_Fee_err']) && empty( $data['Charging_Unit_err']) && empty($data['Calender_err']) &&empty($data['Address_err']) && empty($data['Description_err']) && empty($data['Image_err']) ){
                
                if(uploadImage($data['Image']['tmp_name'], $data['Image_name'],'/images/vehicleRentor/'));
            
            if ($this->v_postModel->create_post($data)){
                $data = $this->v_postModel->get_data($_SESSION['user_ID']);
                redirect("V_post/created_post");
  
            }
            else{die('something went wrong');}
            }
            else ($this->view('VehicleRenter/v_vehicle_create_post',$data));
            
           
            
            
            
        }
            
    }


     
    

    public  function created_post(){
        
        
        $data = $this->v_postModel->get_data($_SESSION['user_ID']);
        $this->view('VehicleRenter/v_createdpost', $data);
       
    }


    
    public function update_Product(){
        // variable=columnname
       
        $item1 =$this->v_postModel->getiteamdeatils();
        $items  = get_object_vars($item1[0]);
        // $data=Array();
        // Print_r($items);
        $data['V_Id'] =$items['V_Id'];
        $data['V_name']=$items['V_name'];
        $data['V_category']=$items['V_category'];
        $data['Contact_Number']=$items['Contact_Number'];
        $data['Rental_Fee']=$items['Rental_Fee'];
        $data['Charging_Unit']=$items['Charging_Unit'];
        $data['Calender']=$items['Calender'];
        $data['Address']=$items['Address'];
        $data['Description']=$items['Description'];
        $data['Image']=$items['Image'];


        // $data['item_id']=$items['Item_Id'];

        $data['V_category_err'] = '';
        $data['V_name_err']='';
        $data['V_number_err'] = '';
        $data['Contact_Number_err'] = '';
        $data['Rental_Fee_err'] = '';
        $data['Charging_Unit_err'] = '';
        $data['Calender_err'] = '';
        $data['Address_err'] = '';
        $data['Description_err'] = '';
        $data['Image_err'] = '';
      

        // foreach($data as &$data) {
            // print_r($data);
        // $data   = get_object_vars($data[0]);
        
        // $id       = $data['Item_name'];
        // $title    = $data['Category'];
        // $content  = $data['Unit_price'];
        // print_r($data);
        // print_r("f");
        // }
        $this->view('VehicleRenter/v_update_post',$data);
        // print_r("f");
        
      

    }

    public  function updatepost(){
        // print_r("Hi");
        // print_r($_GET('id'));
        // $this = self::$this;
        // $data[]=$this->v_postModel-> getposts();
       
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW)
            // print_r($_POST['Item_Id']);
            
        
        
            $data = [
                'V_Id'=> trim($_POST['V_Id']),
                'V_name'=> trim($_POST['V_name']),
                'V_category' => isset($_POST['V_category']) ? trim($_POST['V_category']) : '',
                'Contact_Number'=>trim($_POST['Contact_Number']),
                'Rental_Fee'=> trim($_POST['Rental_Fee']),
                'Charging_Unit' => isset($_POST['Charging_Unit']) ? trim($_POST['Charging_Unit']) : '',
                'Stock_size'=> trim($_POST['Stock_size']),
                'Calender'=> trim($_POST['Calender']),
                'Address'=> trim($_POST['Address']),
                'Description'=> trim($_POST['Description']),
                
                'Image'=> ($_FILES['Image']),
                'Image_name'=>time().'_'.$_FILES['Image']['name'],

                'V_category_err' => '',
                'V_name_err' => '',
                'V_number_err' => '',
                'Contact_Number_err'=> '',
                'Rental_Fee_err' => '',
                'Charging_Unit_err' => '',
                'Calender_err' => '',
                'Address_err' => '',
                'Description_err' => '',
                'Image_err' => '',
                
            ];
            
        if (empty($data['V_category'])){
            $data['V_category_err'] = 'please choose a category';
        
            }
        
        
        if (empty($data['V_name'])){
            $data['V_name_err'] = 'Please enter the vehicle name';
            
        }
        
            
        if (empty($data['V_number'])){
            $data['V_number_err'] = 'Please enter the vehicle number';
        
        }

        if (empty($data['Contact_Number'])){
            $data['Contact_Number'] = 'Please enter the Contact_Number';
        
        }       

        if (empty($data['Rental_Fee'])){
            $data['Rental_Fee_err'] = 'Please enter the Rental_Fee';
        
        }       
        if (empty($data['Charging_Unit'])){
            $data['Charging_Unit'] = 'Please enter the Charging_Unit';
        
        }               
        if (empty($data['Calender'])){
            $data['Calender'] = 'Please enter the Calender';
        
        }                   
        if (empty($data['Address'])){
            $data['Address_err'] = 'Please enter the Address';
        
        }                   
        if (empty($data['Contact_Number'])){
            $data['Contact_Number'] = 'Please enter the Contact_Number';
        
        }       

          if(empty($data['V_category_err']) && empty($data['V_name_err']) && empty($data['V_number_err'])&& empty( $data['Contact_Number_err']) && empty($data['Rental_Fee_err']) && empty( $data['Charging_Unit_err']) && empty($data['Calender_err']) &&empty($data['Address_err']) && empty($data['Description_err']) && empty($data['Image_err']) ){
              
              if(uploadImage($data['Image']['tmp_name'], $data['Image_name'],'/images/vehicleRentor/'));
          
                // $data['old']['tmp_name'],
              
                // if(uploadImage($data['Image']['tmp_name'], $data['Image_name'],'/images/seller/'));
                if ($this->v_postModel->update_data($data)){
                    
                // $result= $this->v_postModel->update_data($data);
                    // ($this->v_postModel->create_post($data)
                    // $result= $this->v_postModel->update_data($data);
                   
                
                    $products = $this->v_postModel->get_data($_SESSION['user_ID']);
                   
                    // redirect("Seller_post/created_post");
                     $this->view('VehicleRentor/v_createdpost',$products);
    
                }}
               
                else{
                    //$data     = get_object_vars($data[0]);
                 return $this->view('VehicleRentor/v_update_post',$data);
                }
    
                
                
                
            }

       

                
        }
        public function delete_product()
        {
            // print_r("djd");
            // $this = self::$this;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $itemId = $_POST['Item_Id'];
                $this->v_postModel->delete_data($itemId);
                $products = $this->v_postModel->get_data($_SESSION['user_ID']);
                    // print($products);
                    // var_dump($products);
                    // header('Location: '.URLROOT.'/Pages/created_post');
                    // exit;
                     $this->view('VehicleRentor/v_createdpost',$products);

                // print_r($itemId);
                // header('Location: ' . URLROOT . '/Pages/created_post');
                // exit;
            }
        }
}


            
