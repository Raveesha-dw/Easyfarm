<?php 


class BuyNow extends Controller{
    private $orderModel;  
    // private $buyerModel;
 
    private $buyerModel;

    public function __construct()
    {
        $this->orderModel = $this->model('M_buyNow');
        $this->buyerModel = $this->model('M_buyNow');


        
    }
    // public function index(){
        
    //     $data = [
    //         'title' => 'Easyfarm',

    //     ];
        
    //     $this->view('pages/home', $data);

    // // }

    public function buyNow() {
     

        if (($_SERVER['REQUEST_METHOD'] == 'POST') && (!empty($_SESSION['user_ID'])  && ($_SESSION['user_type'] == 'Buyer'))) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            





            if((!empty($_POST['quantity'])) && (!empty($_POST['delivery'])) ){
                $data = [
                    'quantity' => $_POST['quantity'], 
                    'Item_Id' => $_POST['itemId'], 
                    'uId' => $_POST['uId'],
                    'selectedDeliveryMethod' => $_POST['delivery'],
                    'total' => 0, 
                    'deliveryFee' => '',
                    'totalPayment' => 0,
    
    
                    
                ];
               

                // print_r($_POST['delivery']);
                // print_r($data); 

                if($data['selectedDeliveryMethod'] == 'Home Delivery'){
                    $data['deliveryFee'] = 500;

                }else{
                    $data['deliveryFee'] = 0;
                }


    
                $orderdDetails = $this->orderModel->getItemDetais($data);
                $buyerDetails =  $this->orderModel->getUserDetails($data);
    
                // Convert objects to arrays
                $orderdDetails = get_object_vars($orderdDetails);
                $buyerDetails = get_object_vars($buyerDetails);

    
                // Merge arrays and remove duplicates
                $mergedArray = array_merge($orderdDetails, $buyerDetails);
                $data1 = array_unique($mergedArray);
                $data = array_merge($data1, $data);
    print_r("dd");
                // $data['total'] = $data['quantity']*$data['Unit_price'] ;
                // $data['total'] = floatval($data['quantity']) * $data['Unit_price'];
                $data['total'] = (floatval($data['quantity'])/$data['Unit_size'] * $data['Unit_price']);

                $data['totalPayment'] = $data['total']+$data['deliveryFee'] ;
                $data2[0] = $data;
                $data = $data2;
                print_r($data);
    
                $this->view('pages/buyNow',$data);

            }





      
            
        } 
        
        elseif(!empty($_SESSION['user_ID']) && ($_SESSION['user_type'] != 'Buyer')  ){

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
        elseif(empty($_SESSION['user_ID'])  ){  
            $data=[
                'email' => '',
                'password' => '',

                'email_err' => '',
                'password_err' => ''
            ];

            $this->view('Users/v_login', $data);

            // redirect('Users/v_login');

        }
     
    
    }




    public function checkout() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
          
            $itemIds = $_POST['itemIds'];
            $quantities =$_POST['quantitiesTo'];
            $selectedDeliveryMethods =  $_POST['selectedDeliveryMethods'];   
            $uId = $_POST['uId'];

            // Loop through each item to update the quantity
            for ($i = 0; $i < count($itemIds); $i++) {
                $data = [
                    'quantity' => $quantities[$i], 
                    'Item_Id' => $itemIds[$i],
                    'selectedDeliveryMethod' => $selectedDeliveryMethods[$i],
                    'uId' => $uId,
                    'total' => 0, 
                    'deliveryFee' => '',
                    'totalPayment' => 0,

                ];

                if($data['selectedDeliveryMethod'] == 'Home Delivery'){
                    $data['deliveryFee'] = 500;

                }else{
                    $data['deliveryFee'] = 0;
                }


                $orderdDetails = $this->orderModel->getItemDetais($data);
                $buyerDetails =  $this->orderModel->getUserDetails($data);

                // Convert objects to arrays
                $orderdDetails = get_object_vars($orderdDetails);
                $buyerDetails = get_object_vars($buyerDetails);

                // Merge arrays and remove duplicates
                $mergedArray = array_merge($orderdDetails, $buyerDetails);
                $data1 = array_unique($mergedArray);
                $data = array_merge($data1, $data);

                // $data['total'] = $data['quantity']*$data['Unit_price'] ;
                $data['total'] = (floatval($data['quantity'])/$data['Unit_size'] * $data['Unit_price']);
                $data['totalPayment'] = $data['total']+$data['deliveryFee'] ;

                $data2[$i] = $data;






               
            }
            $data = $data2;
         
    
            $this->view('pages/buyNow',$data);
        }
    }   





















    public function updateAddress() {
        if (($_SERVER['REQUEST_METHOD'] == 'POST') && (!empty($_SESSION['user_ID'])  && ($_SESSION['user_type'] == 'Buyer'))) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);




            
            $itemIds = $_POST['itemIds'];
            $quantities =$_POST['quantitiesTo'];
            $selectedDeliveryMethods =  $_POST['selectedDeliveryMethods'];   
            $uId = $_POST['uId'];

            // Loop through each item to update the quantity
            for ($i = 0; $i < count($itemIds); $i++) {
                $data = [
                    'quantity' => $quantities[$i], 
                    'Item_Id' => $itemIds[$i],
                    'selectedDeliveryMethod' => $selectedDeliveryMethods[$i],
                    'uId' => $uId,
                    'total' => 0, 
                    'deliveryFee' => '',
                    'totalPayment' => 0,
                    'address' => trim($_POST['address']),
                    'city' => trim($_POST['city']),
                    // 'Province' => trim($_POST['Province']),


                ];
                
                $this->buyerModel->updateBuyerAddress($data);


                if($data['selectedDeliveryMethod'] == 'Home Delivery'){
                    $data['deliveryFee'] = 500;

                }else{
                    $data['deliveryFee'] = 0;
                }


                $orderdDetails = $this->orderModel->getItemDetais($data);
                $buyerDetails =  $this->orderModel->getUserDetails($data);

                // Convert objects to arrays
                $orderdDetails = get_object_vars($orderdDetails);
                $buyerDetails = get_object_vars($buyerDetails);

                // Merge arrays and remove duplicates
                $mergedArray = array_merge($orderdDetails, $buyerDetails);
                $data1 = array_unique($mergedArray);
                $data = array_merge($data1, $data);

                // $data['total'] = $data['quantity']*$data['Unit_price'] ;
                $data['total'] = (floatval($data['quantity'])/$data['Unit_size'] * $data['Unit_price']);
                $data['totalPayment'] = $data['total']+$data['deliveryFee'] ;

                $data2[$i] = $data;






               
            }
            $data = $data2;
         
    
            $this->view('pages/buyNow',$data);








        }
    }



}

?>