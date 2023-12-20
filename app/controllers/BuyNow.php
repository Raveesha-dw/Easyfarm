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
    
                // $data['total'] = $data['quantity']*$data['Unit_price'] ;
                $data['total'] = floatval($data['quantity']) * $data['Unit_price'];
                $data['totalPayment'] = $data['total']+$data['deliveryFee'] ;
                print_r($data);
    
                $this->view('pages/buyNow',$data);

            }





      
            
        }elseif(!empty($_SESSION['user_ID']) && ($_SESSION['user_type'] != 'Buyer')  ){

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
        else {
            // redirect('pages/cart');
            $data = [
                'unitPrice' => '',
                'quantity' => '',
                'itemId' => '',
                'uId' => '',
            ];
            $this->view('pages/payment', $data);
        }
    
    }

    public function updateAddress() {
        if (($_SERVER['REQUEST_METHOD'] == 'POST') && (!empty($_SESSION['user_ID'])  && ($_SESSION['user_type'] == 'Buyer'))) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $data=[
                'uId' => $_POST['uId'], 
                'address' => trim($_POST['address']),
                'city' => trim($_POST['city']),
                'district' => trim($_POST['district']),
                'quantity' => $_POST['city'], 
                'Item_Id' => $_POST['city'], 
                'selectedDeliveryMethod' => $_POST['selectedDeliveryMethod'], 
                'total' => $_POST['total'], 
                'deliveryFee' => $_POST['deliveryFee'], 
                'totalPayment' =>$_POST['totalPayment'], 
    
             
            ];

            $this->buyerModel->updateBuyerAddress($data);

        
                // // print_r($_POST['delivery']);
                // // print_r($data);



    
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
                $data['total'] = floatval($data['quantity']) * $data['Unit_price'];
                $data['totalPayment'] = $data['total']+$data['deliveryFee'] ;
                // print_r($data);
    
                $this->view('pages/buyNow',$data);

        }

    }



    public function payment() {

        // $amount =0;




        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     // Retrieve data from the POST request
        //     $amount = isset($_POST['total']) ? $_POST['total'] : null;
        //     // $key2 = isset($_POST['key2']) ? $_POST['key2'] : null;
        
        //     // Perform some processing with the data (e.g., store it in a database)
        //     // ...
        
        //     // Return a response (for demonstration purposes)
        //     $response = "Data received: key1 = $amount";
        //     echo $response;
        // } else {
        //     // Handle other types of requests or provide an error message
        //     echo "Invalid request method.";
        // }






print_r($_POST['amount']);




        $amount = 4000;
        $merchant_id =  1225296;
        $order_id = uniqid();
        $merchant_secret = "NTc0MDU0NjMxMjA1NjI3NTI2ODMzMjQwMjAxNTYzMzE0MjI0NDQ4";
        $currency = "LKR";

        $hash = strtoupper(
            md5(
                $merchant_id . 
                $order_id . 
                number_format($amount, 2, '.', '') . 
                $currency .  
                strtoupper(md5($merchant_secret)) 
            ) 
        );

        $array =[];

        $array["items"] = "Door bell wireles";
        $array["first_name"] = "Hasintha";
        $array["last_name"] = "Nirmanie";
        $array["email"] = "easyfarm123@mail.com";
        $array["phone"] = "0715797461";
        $array["address"] = "No 20, Headaketiya, Angunukolapalassa";
        $array["city"] = "Hambanthota";

        
   

        $array["amount"] = $amount;
        $array["merchant_id"] = $merchant_id;
        $array["order_id"] = $order_id;
        $array["merchant_secret"] = $merchant_secret;
        $array["currency"] = $currency;
        $array["hash"] = $hash;

        $jsonObj = json_encode($array);




        print_r($jsonObj);

        $this->view('pages/buyNow',$jsonObj);

    }


}

?>