<!-- use EasyFarm\controllers\Controller; -->

<?php
include_once APPROOT . '/helpers/image_helper.php';

// namespace MyNamespace;
// namespace EasyFarm\Controllers;
// namespace xampp\htdocs\Easyfarm\app\controllers;
// use EasyFarm\libraries\Controller;
//$fileExtension = strtolower(pathinfo($_FILES["Image"]["name"], PATHINFO_EXTENSION));
// $foldername ="$URLROOT ./public/images/seller/";
class Seller_post extends Controller{
    private $sellerModel;
    // private static $this;
    public function __construct()
    {
        // self::$this = $this;
        $this->sellerModel = $this->model('M_seller_post');
        
    }
   
public  function create_post(){
    // $this = self::$this;
    
   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
       
        $data = [
            // 'Item_Id'=> trim($_POST['Item_Id']),
            'seller_ID'=> 59,
            'Item_name'=> trim($_POST['Item_name']),
            'Category'=> trim($_POST['Category']),
            'Expiry_date'=> trim($_POST['Expiry_date']),
            'Unit_price'=> trim($_POST['Unit_price']),
            'Stock_size'=> trim($_POST['Stock_size']),
            // 'U_Id'=> trim($_POST['U_Id']),
            'DeliveryMethod'=>trim($_POST['DeliveryMethod']),
            'Description'=> trim($_POST['Description']),
            'Unit_type'=> trim($_POST['Unit_type']),
            'Image'=> ($_FILES['Image']),
            'Image_name'=>time().'_'.$_FILES['Image']['name'],
            
             

            
            

            'Item_name_err' => '',
            'Category_err' => '',
            'Expiry_date_err' => '',
            'Invalid_date_err'=> '',
            'Unit_price_err' => '',
            'Stock_size_err' => '',
            'DeliveryMethod_err' => '',
            'Description_err' => '',
            'Unit_type_err' => '',
            'Image_err' => '',
            
        ];
        
        // echo("ksks");
        

            if (empty($data['Item_name'])){
                $data['Item_name_err'] = 'Please enter the name';
                
            }
            if(empty($data['Category'])){
                $data['Category_err'] = 'please choose a category';
            }
            
            if ($data['Category'] == 1 || $data['Category'] == 3 || $data['Category'] == 4 || $data['Category'] == 5 || $data['Category'] == 6 ){
                if(empty($data['Expiry_date'])){
                
                $data['Expiry_date_err'] = 'Please enter the Expiry date';
            }}
            if ($data['Category'] == 2 || $data['Category'] == 7 ){
                if(!empty($data['Expiry_date'])){
                $data['Invalid_date_err'] = 'Not Valid';
            }}
            // if (empty($data['Expiry_date']) || !strtotime($data['Expiry_date'])) {
            //     $data['Expiry_date_err'] = 'Please enter a valid Expiry date';
            // }
            
            
            
            if (empty($data['Unit_price']) || $data['Unit_price'] <= 0) {
                $data['Unit_price_err'] = 'Please enter a valid unit price';
            }
            
            
            // if (empty($data['Stock_size']) && $data['Stock_size']>0){
            //     $data['Stock_size_err'] = 'Please enter the valid stock size';
            // }
            if (empty($data['Stock_size']) || $data['Stock_size'] <= 0) {
                $data['Stock_size_err'] = 'Please enter a valid stock size';
            }
            
            
            
            if (empty($data['DeliveryMethod'])){
                $data['DeliveryMethod_err'] = 'Please enter Deliery method';
            }
            
            if (empty($data['Description'])){
                $data['Description_err'] = 'Please enter the Descriptiion';
            }
            
            // if (empty($data['Unit_type'])){
            //     $data['Unit_type_err'] = 'Please choose the unit type';
            // }
            if ( ($data['Category'] == 1) && ($data['Unit_type'] == 4)  ) {
                $data['Unit_type_err'] = 'Please choose the Valid unit type';
                // print_r($data['Unit_type']);
                // print_r($data['Category']);
                // print_r($data['Unit_type_err']);
            }
            if(($data['Category'] == 1) && ($data['Unit_type'] == 3)){
                $data['Unit_type_err'] = 'Please choose the Valid unit type';
            }
            if(($data['Category'] == 2) && ($data['Unit_type'] == 1)){
                $data['Unit_type_err'] = 'Please choose the Valid unit type';
            }
            if(($data['Category'] == 2) && ($data['Unit_type'] == 4)){
                $data['Unit_type_err'] = 'Please choose the Valid unit type';
            }
            if(($data['Category'] == 3) && ($data['Unit_type'] == 3)){
                $data['Unit_type_err'] = 'Please choose the Valid unit type';
            }
            if(($data['Category'] == 4) && ($data['Unit_type'] == 3)){
                $data['Unit_type_err'] = 'Please choose the Valid unit type';
            }
            if(($data['Category'] == 4) && ($data['Unit_type'] == 4)){
                $data['Unit_type_err'] = 'Please choose the Valid unit type';
            }
            if(($data['Category'] == 5) && ($data['Unit_type'] == 3)){
                $data['Unit_type_err'] = 'Please choose the Valid unit type';
            }
            if(($data['Category'] == 5) && ($data['Unit_type'] == 4)){
                $data['Unit_type_err'] = 'Please choose the Valid unit type';
            }
            if(($data['Category'] == 6) && ($data['Unit_type'] == 1)){
                $data['Unit_type_err'] = 'Please choose the Valid unit type';
            }
            if(($data['Category'] == 6) && ($data['Unit_type'] == 3)){
                $data['Unit_type_err'] = 'Please choose the Valid unit type';
            }
            if(($data['Category'] == 7) && ($data['Unit_type'] == 1)){
                $data['Unit_type_err'] = 'Please choose the Valid unit type';
            }
            if(($data['Category'] == 7) && ($data['Unit_type'] == 2)){
                $data['Unit_type_err'] = 'Please choose the Valid unit type';
            }
            if(($data['Category'] == 7) && ($data['Unit_type'] == 3)){
                $data['Unit_type_err'] = 'Please choose the Valid unit type';
            }
            
            // print_r($data['Unit_type']);
            
            
            
            
            // if (){
            //     $data['Image_err'] = 'Please attach images';

            // }
            // $result = $this->sellerModel->create_post($data);

            if(empty($data['Item_name_err'])&&empty($data['Unit_price_err']) && empty($data['Stock_size_err']) && empty($data['Description_err']) && empty($data['Image_err'])){
                
                uploadImage($data['Image']['tmp_name'], $data['Image_name'],'/images/seller/');
            // if (($result == 1  )){
            //     $products = $this->sellerModel->get_data("0");
            //     // print($products);
            //     // var_dump($products);
            //     header('Location: '.URLROOT.'/Pages/created_post');
            //     // exit;
            //      $this->view('seller/v_createdpost',$products);

            // }
            if ($this->sellerModel->create_post($data)){
                
                $data = $this->sellerModel->get_data($data['seller_ID']);
                // print_r($data);
                
                // move_uploaded_file($_FILES[$data["image"]]["tmp_name"],$foldername);

                
                // header("Location:http://localhost/Easyfarm/Seller_post/created_post");
                // $this->view('seller/v_createdpost',$data);
               
            //   $this-> created_post($data);
            // $this->view('seller/v_createdpost', $data);
            redirect("Seller_post/created_post");
           
            // print_r("ddf");
                
            }
            else{die('something went wrong');}
            }
            else ($this->view('seller/v_create_post',$data));
            
           
            
            
            
        }
            
    }


     
    

    public  function created_post(){
        
        
        $data = $this->sellerModel->get_data(('59'));
        $this->view('seller/v_createdpost', $data);
       
    }

    // public  function getposts(){
    //     // $this = self::$this;
    //     $data = $this->sellerModel->get_data('59');
    //     // print_r($data);
    //     return $data;

    // }

    public  function updatepost(){
        // print_r("Hi");
        // print_r($_GET('id'));
        // $this = self::$this;
       
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
        
            $data = [
                // 'Item_Id'=> trim($_POST['Item_Id']),
                'Item_name'=> trim($_POST['Item_name']),
                'Category'=> trim($_POST['Category']),
                'Expiry_date'=> trim($_POST['Expiry_date']),
                'Unit_price'=> trim($_POST['Unit_price']),
                'Stock_size'=> trim($_POST['Stock_size']),
                // 'U_Id'=> trim($_POST['U_Id']),
                'DeliveryMethod'=> trim($_POST['DeliveryMethod']),
                'Description'=> trim($_POST['Description']),
                'Unit_type'=> trim($_POST['Unit_type']),
                'Image'=> trim($_POST['Image']),
                'id' => $_POST['id'],
                'Item_name_err' => '',
                'Category_err' => '',
                'Expiry_date_err' => '',
                'Unit_price_err' => '',
                'Stock_size_err' => '',
                'DeliveryMethod_err' => '',
                'Description_err' => '',
                'Unit_type_err' => '',
                'Image_err' => '',
                'Invalid_date_err' => '',
            ];
            
            // print_r($data);
    
                if (empty($data['Item_name'])){
                    $data['Item_name_err'] = 'Please enter the name';
                    
                }
                if(empty($data['Category'])){
                    $data['Category_err'] = 'please choose a category';
                }
                
                if ($data['Expiry_date'] == 1 || $data['Expiry_date'] == 3 || $data['Category'] == 4 || $data['Category'] == 5 || $data['Category'] == 6 ){
                    $data['Expiry_date_err'] = 'Please enter the Expiry date';
                }
                
                if (empty($data['Unit_price'])){
                    $data['Unit_price_err'] = 'Please enter the unit price';
                }
                
                if (empty($data['Stock_size'])){
                    $data['Stock_size_err'] = 'Please enter the stock size';
                }
                
                
                if (empty($data['DeliveryMethod'])){
                    $data['DeliveryMethod_err'] = 'Please enter Deliery method';
                }
                
                if (empty($data['Description'])){
                    $data['Description_err'] = 'Please enter the Descriptiion';
                }
                
                if (empty($data['Unit_type'])){
                    $data['Unit_type_err'] = 'Please choose the unit type';
                }
                
                if (empty($data['Image'])){
                    $data['Image_err'] = 'Please attach images';
                }
                $result = $this->sellerModel->update_data($data);
                // var_dump($result);
    
                if(empty($data['Item_name_err'])&&empty($data['Unit_price_err']) && empty($data['Stock_size_err']) && empty($data['Description_err']) && empty($data['Image_err'])){
              
                if($result == null){
                    $products = $this->sellerModel->get_data("59");
                    // print($products);
                    // var_dump($products);
                    // header('Location: '.URLROOT.'/Pages/created_post');
                    // exit;
                     $this->view('seller/v_createdpost',$products);
    
                }}
                else return $this->view('seller/v_create_post',$data);
    
                
                // $errors = [
                //     'Item_name_err' => $data['Item_name_err'],
                //     'Category_err' => $data['Category_err'],
                //     'Expiry_date_err' => $data['Expiry_date_err'],
                //     'Unit_price_err' => $data['Unit_price_err'],
                //     'Stock_size_err' => $data['Stock_size_err'],
                //     'DeliveryMethod_err' => $data['DeliveryMethod_err'],
                //     'Description_err' => $data['Description_err'],
                //     'Unit_type_err' => $data['Unit_type_err'],
                //     'Image_err' => $data['Image_err'],
                // ];
                // if($errors){
                //     print_r($errors);
                   
                // }
                
                
            }

       

                
        }
        public function delete_product()
        {
            // print_r("djd");
            // $this = self::$this;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $itemId = $_POST['Item_Id'];
                $this->sellerModel->delete_data($itemId);
                $products = $this->sellerModel->get_data("59");
                    // print($products);
                    // var_dump($products);
                    // header('Location: '.URLROOT.'/Pages/created_post');
                    // exit;
                     $this->view('seller/v_createdpost',$products);

                // print_r($itemId);
                // header('Location: ' . URLROOT . '/Pages/created_post');
                // exit;
            }
        }
}


            
