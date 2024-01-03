<!-- use EasyFarm\controllers\Controller; -->

<?php
include_once APPROOT . '/helpers/image_helper.php';


class Seller_post extends Controller{
    private $sellerModel;
    // private static $this;
    public function __construct()
    {
        // self::$this = $this;
        $this->sellerModel = $this->model('M_seller_post');
        
    }
    // public function Index() {
    //     print_r('hello');
    // }

public function cretesession3(){
    $data=$this->sellerModel->get_planid();
    // print_r($data);
    $_SESSION['plan_id']=$data[0]->plan_id;
    header("Location:http://localhost/Easyfarm/Seller_post/creating");

}

public function creating(){
    // print_r($_SESSION['user_ID']);
    // print_r($_SESSION['plan_id']);
    if ($_SESSION['plan_id']==''){
        // print_r("so");
        $this->view('seller/v_register_plan1');

    }else{
    $data=[
        
        'Item_name' => '',
        'Category' => '',
        'Expiry_date' => '',
        'Invalid_date'=> '',
        'Unit_price' => '',
        'Stock_size' => '',
        'DeliveryMethod' => '',
        'Description' => '',
        'Unit_type' => '',
        'Image' => '',
        'Unit_size'=>'',

        
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
        'Unit_size_err'=>'',

    ];
    $this->view('seller/v_create_post',$data);}

}
public  function create_post(){
    // $this = self::$this;
    
   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
        // $data = $this->initData();
        $deliveryMethods = [];

        if (isset($_POST['Home_Delivery'])) {
                $deliveryMethods[] = 'Home Delivery';
            }

            if (isset($_POST['Insto_Pickup'])) {
                $deliveryMethods[] = 'Insto Pickup';
            }
            $data['DeliveryMethod'] = implode(', ', $deliveryMethods);


        $data = [
            // 'Item_Id'=> trim($_POST['Item_Id']),
            // 'seller_ID'=> 59,
            // 'Item_name'=> trim($_POST['Item_name']),
            // 'Unit_size'=> trim($_POST['Unit_size']),
            // 'Category'=> trim($_POST['Category']),
            // 'Expiry_date'=> trim($_POST['Expiry_date']),
            // 'Unit_price'=> trim($_POST['Unit_price']),
            // 'Stock_size'=> trim($_POST['Stock_size']),
            // 'Description'=> trim($_POST['Description']),
            // 'Unit_type'=> trim($_POST['Unit_type']),
            // 'DeliveryMethod'=>$data['DeliveryMethod'],
            // 'Image'=> ($_FILES['Image']),
            // 'Image_name'=>time().'_'.$_FILES['Image']['name'],
            
             

            
            
            // 'Unit_size_err'=>'',
            // 'Item_name_err' => '',
            // 'Category_err' => '',
            // 'Expiry_date_err' => '',
            // 'Invalid_date_err'=> '',
            // 'Unit_price_err' => '',
            // 'Stock_size_err' => '',
            // 'DeliveryMethod_err' => '',
            // 'Description_err' => '',
            // 'Unit_type_err' => '',
            // 'Image_err' => '',
            // 'stock_err'=>'',


                'seller_ID' => 59,
                'Item_name' => isset($_POST['Item_name']) ? trim($_POST['Item_name']) : '',
                'Unit_size' => isset($_POST['Unit_size']) ? trim($_POST['Unit_size']) : '',
                'Category' => isset($_POST['Category']) ? trim($_POST['Category']) : '',
                'Expiry_date' => isset($_POST['Expiry_date']) ? trim($_POST['Expiry_date']) : '',
                'Unit_price' => isset($_POST['Unit_price']) ? trim($_POST['Unit_price']) : '',
                'Stock_size' => isset($_POST['Stock_size']) ? trim($_POST['Stock_size']) : '',
                'Description' => isset($_POST['Description']) ? trim($_POST['Description']) : '',
                'Unit_type' => isset($_POST['Unit_type']) ? trim($_POST['Unit_type']) : '',
                'DeliveryMethod' => $data['DeliveryMethod'],
                'Image' => isset($_FILES['Image']) ? $_FILES['Image'] : [],
                'Image_name' => time() . '_' . (isset($_FILES['Image']['name']) ? $_FILES['Image']['name'] : ''),
                'Unit_size_err' => '',
                'Item_name_err' => '',
                'Category_err' => '',
                'Expiry_date_err' => '',
                'Invalid_date_err' => '',
                'Unit_price_err' => '',
                'Stock_size_err' => '',
                'DeliveryMethod_err' => '',
                'Description_err' => '',
                'Unit_type_err' => '',
                'Image_err' => '',
                'stock_err' => '',
            
        ];
       
            if (empty($data['Unit_size'])){
               $data['Unit_size_err'] = 'Please enter the name';
            
             }
        
           
            if (empty($data['Item_name'])){
                $data['Item_name_err'] = 'Please enter the name';
                
            }
            if ($data['Unit_size']>$data['Stock_size']){
                $data['stock_err'] = 'Please enter valid stock size';

            }
            if(empty($data['Category'])){
                $data['Category_err'] = 'please choose a category';
            }
            
            if ($data['Category'] == "Vegatable" || $data['Category'] == "Fruits" || $data['Category'] == "Seeds" || $data['Category'] == "Grains" || $data['Category'] == "Insecticides" ){
                if(empty($data['Expiry_date'])){
                
                $data['Expiry_date_err'] = 'Please enter the Expiry date';
            }}


            if ($data['Category'] == "Plants" || $data['Category'] == "Farming Tools" ){
                if(!empty($data['Expiry_date'])){
                $data['Invalid_date_err'] = 'Not Valid';
            }}
           
            
            
            
            if (empty($data['Unit_price']) || $data['Unit_price'] <= 0) {
                $data['Unit_price_err'] = 'Please enter a valid unit price';
            }
            
            
           
            // if (empty($data['Expiry_date'])){
            //     $data['Expiry_date_err'] = 'Please enter the date';
            // }
            
            
            if (empty($data['DeliveryMethod'])){
                $data['DeliveryMethod_err'] = 'Please enter Deliery method';
            }
            
            if (empty($data['Description'])){
                $data['Description_err'] = 'Please enter the Descriptiion';
            }
            
            
            if (empty($data['Stock_size']) || $data['Stock_size'] <= 0) {
                $data['Stock_size_err'] = 'Please enter a valid stock size';
            }
            
        
            
            
            // print_r("dd");
            // print_r($data);
            
            // if (){
            //     $data['Image_err'] = 'Please attach images';

            // }
            // $result = $this->sellerModel->create_post($data);

            if(empty($data['Item_name_err']) && empty($data['DeliveryMethod_err']) && empty($data['Category_err'])&& empty( $data['stock_err']) && empty($data['Expiry_date_err']) && empty( $data['Invalid_date_err']) && empty($data['Unit_type_err']) &&empty($data['Unit_price_err']) && empty($data['Stock_size_err']) && empty($data['Description_err']) &&empty($data['Unit_size_err']) &&empty($data['Image_err'])){
                
                if(uploadImage($data['Image']['tmp_name'], $data['Image_name'],'/images/seller/'));
            // if (($result == 1  )){
            //     $products = $this->sellerModel->get_data("0");
            //     // print($products);
            //     // var_dump($products);
            //     header('Location: '.URLROOT.'/Pages/created_post');
            //     // exit;
            //      $this->view('seller/v_createdpost',$products);
            // print_r($data);
            // }
            if ($this->sellerModel->create_post($data)){
                // print_r($data);
               
                $data = $this->sellerModel->get_data($data['seller_ID']);
              
                
            //    print_r($data);
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
    
    public function update_Product(){
        // variable=columnname
       
        $item1 =$this->sellerModel->getiteamdeatils();
        $items  = get_object_vars($item1[0]);
        // $data=Array();
        // Print_r($items);
        $data['Item_Id'] =$items['Item_Id'];
        $data['Item_name']=$items['Item_name'];
        $data['Category']=$items['Category'];
        $data['Expiry_date']=$items['Expiry_date'];
        $data['Unit_price']=$items['Unit_price'];
        $data['Stock_size']=$items['Stock_size'];
        $data['DeliveryMethod']=$items['DeliveryMethod'];
        $data['Description']=$items['Description'];
        $data['Image']=$items['Image'];
        $data['Unit_size']=$items['Unit_size'];


        // $data['item_id']=$items['Item_Id'];

        $data['Item_name_err'] = '';
        $data['Unit_size_err']='';
        $data['Category_err'] = '';
        $data['Expiry_date_err'] = '';
        $data['Unit_price_err'] = '';
        $data['Stock_size_err'] = '';
        $data['DeliveryMethod_err'] = '';
        $data['Description_err'] = '';
        $data['Unit_type_err'] = '';
        $data['Image_err'] = '';
        $data['Invalid_date_err'] = '';

        // foreach($data as &$data) {
            // print_r($data);
        // $data   = get_object_vars($data[0]);
        
        // $id       = $data['Item_name'];
        // $title    = $data['Category'];
        // $content  = $data['Unit_price'];
        // print_r($data);
        // print_r("f");
        // }
        $this->view('seller/v_update_post',$data);
        // print_r("f");
        
      

    }

    public  function updatepost(){
        // print_r("Hi");
        // print_r($_GET('id'));
        // $this = self::$this;
        // $data[]=$this->sellerModel-> getposts();
       
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW)
            // print_r($_POST['Item_Id']);
            
            $deliveryMethods = [];

        if (isset($_POST['Home_Delivery'])) {
                $deliveryMethods[] = 'Home Delivery';
            }

            if (isset($_POST['Insto_Pickup'])) {
                $deliveryMethods[] = 'Insto Pickup';
            }
            $data['DeliveryMethod'] = implode(', ', $deliveryMethods);
        
            $data = [
                'Item_Id'=> trim($_POST['Item_Id']),
                'Item_name'=> trim($_POST['Item_name']),
                'Category' => isset($_POST['Category']) ? trim($_POST['Category']) : '',
                'Unit_size'=>trim($_POST['Unit_size']),
                'Expiry_date'=> trim($_POST['Expiry_date']),
                'Unit_price'=> trim($_POST['Unit_price']),
                'Stock_size'=> trim($_POST['Stock_size']),
                'DeliveryMethod' => $data['DeliveryMethod'],
                'Description'=> trim($_POST['Description']),
                'Unit_type' => isset($_POST['Unit_type']) ? trim($_POST['Unit_type']) : '',
                'Image'=> ($_FILES['Image']),
                'Image_name'=>time().'_'.$_FILES['Image']['name'],
                
                // 'old'=>  ($_FILES['Image']),
                // $data['old'] = isset($oldImageData['Image']) ? $oldImageData['Image'] : [];
                // 'old'=>'',
                
            
                // 'Image'=> trim($_POST['Image']),
               

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
                'Unit_size_err'=>'',
                
                
            ];
            
            if (empty($data['Unit_size'])){
                $data['Unit_size_err'] = 'Please enter the name';
             
              }
         
            
             if (empty($data['Item_name'])){
                 $data['Item_name_err'] = 'Please enter the name';
                 
             }
             if ($data['Unit_size']>$data['Stock_size']){
                 $data['stock_err'] = 'Please enter valid stock size';
 
             }
             if(empty($data['Category'])){
                 $data['Category_err'] = 'please choose a category';
             }
             
             if ($data['Category'] == "Vegatable" || $data['Category'] == "Fruits" || $data['Category'] == "Seeds" || $data['Category'] == "Grains" || $data['Category'] == "Insecticides" ){
                 if(empty($data['Expiry_date'])){
                 
                 $data['Expiry_date_err'] = 'Please enter the Expiry date';
             }}
 
 
             if ($data['Category'] == "Plants" || $data['Category'] == "Farming Tools" ){
                 if(!empty($data['Expiry_date'])){
                 $data['Invalid_date_err'] = 'Not Valid';
             }}
            
             
             
             
             if (empty($data['Unit_price']) || $data['Unit_price'] <= 0) {
                 $data['Unit_price_err'] = 'Please enter a valid unit price';
             }
             
             
            
            //  if (empty($data['Expiry_date'])){
            //      $data['Expiry_date_err'] = 'Please enter the date';
            //  }
             
             
             if (empty($data['DeliveryMethod'])){
                 $data['DeliveryMethod_err'] = 'Please enter Deliery method';
             }
             
             if (empty($data['Description'])){
                 $data['Description_err'] = 'Please enter the Descriptiion';
             }
            
            
            if (empty($data['Stock_size']) || $data['Stock_size'] <= 0) {
                $data['Stock_size_err'] = 'Please enter a valid stock size';
            }
            
           
            
            
            


            if(empty($data['Item_name_err']) && empty($data['DeliveryMethod_err']) && empty($data['Category_err'])&& empty( $data['stock_err']) && empty($data['Expiry_date_err']) && empty( $data['Invalid_date_err']) && empty($data['Unit_type_err']) &&empty($data['Unit_price_err']) && empty($data['Stock_size_err']) && empty($data['Description_err']) &&empty($data['Unit_size_err']) &&empty($data['Image_err'])){
                
                uploadImage( $data['Image']['tmp_name'], $data['Image_name'],'/images/seller/');
                // $data['old']['tmp_name'],
              
                // if(uploadImage($data['Image']['tmp_name'], $data['Image_name'],'/images/seller/'));
                if ($this->sellerModel->update_data($data)){
                    
                // $result= $this->sellerModel->update_data($data);
                    // ($this->sellerModel->create_post($data)
                    // $result= $this->sellerModel->update_data($data);
                   
                
                    $products = $this->sellerModel->get_data("59");
                   
                    // redirect("Seller_post/created_post");
                     $this->view('seller/v_createdpost',$products);
    
                }}
               
                else{
                    //$data     = get_object_vars($data[0]);
                 return $this->view('seller/v_update_post',$data);
                }
    
                
                
                
            }

       

                
        }
        public function delete_product()
        {
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $itemId = $_POST['Item_Id'];
                $this->sellerModel->delete_data($itemId);
                $products = $this->sellerModel->get_data("59");
                    
                     $this->view('seller/v_createdpost',$products);

                
            }
        }
}


            
