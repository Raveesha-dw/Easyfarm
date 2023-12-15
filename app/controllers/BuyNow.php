<?php 


class BuyNow extends Controller{
    private $orderModel;
    // private $buyerModel;
 

    public function __construct()
    {
        $this->orderModel = $this->model('M_buyNow');
        // $this->buyerModel = $this->model('M_buyNow');

        
    }

    public function buyNow() {
     

        if (($_SERVER['REQUEST_METHOD'] == 'POST') && (!empty($_SESSION['user_ID'])  && ($_SESSION['user_type'] == 'Buyer'))) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $data = [
                'quantity' => $_POST['quantity'], 
                'Item_Id' => $_POST['itemId'], 
                'U_Id' => $_POST['uId'],
                'total' => 0, 
                'deliveryFee' => 500, 
                'totalPayment' => 0, 

                
            ];

            $orderdDetails = $this->orderModel->getItemDetais($data);
            $buyerDetails =  $this->orderModel->getUserDetails($data);

            // Convert objects to arrays
            $orderdDetails = get_object_vars($orderdDetails);
            $buyerDetails = get_object_vars($buyerDetails);

            // Merge arrays and remove duplicates
            $mergedArray = array_merge($orderdDetails, $buyerDetails);
            $data1 = array_unique($mergedArray);
            $data = array_merge($data1, $data);

            $data['total'] = $data['quantity']*$data['Unit_price'] ;
            $data['totalPayment'] = $data['total']+$data['deliveryFee'] ;

            $this->view('pages/buyNow',$data);

      
            
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
            $this->view('pages/cart', $data);
        }
    
    }

}

?>