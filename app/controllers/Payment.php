<?php 
require_once APPROOT . '/config/config.php';

class Payment extends Controller{
    private $paymentModel;

    public function __construct()
    {
        $this->paymentModel = $this->model('M_payment');
        
    }


    public function payment() {

// Assuming the data is sent as JSON
$inputJSON = file_get_contents('php://input');
$inputData = json_decode($inputJSON, true);
// print_r("aaaaaaaaaa");
// print_r($inputJSON);
// print_r($inputData);
// Now you can access the data using $inputData array
$hiddenTotalpayment = $inputData['hiddenTotalpayment'];
$hiddenuId = $inputData['hiddenuId'];
$itemIds = $inputData['itemIds'];
$quantities = $inputData['quantities'];
$subTotalPayments = $inputData['subTotalPayments'];


for ($i = 0; $i < count($itemIds); $i++) {


    
            $data = [
                'quantity' => $quantities[$i], 
                'Item_Id' => $itemIds[$i], 
                'uId' => $hiddenuId,
                'selectedDeliveryMethod' => '',
                'total' => $subTotalPayments[$i], 
                'deliveryFee' => '',
                'totalPayment' => 0,


                
            ];
            // print_r($data);
            $orderdDetails = $this->paymentModel->getItemDetais($data);
            $buyerDetails =  $this->paymentModel->getUserDetails($data);

            // Convert objects to arrays
            $orderdDetails = get_object_vars($orderdDetails);
            $buyerDetails = get_object_vars($buyerDetails);

            // Merge arrays and remove duplicates
            $mergedArray = array_merge($orderdDetails, $buyerDetails);
            $data1 = array_unique($mergedArray);
            $data = array_merge($data1, $data);







        $array =[];

        $array["items"] = $data['Item_name'];
        $array["name"] = $data['Name'];
        $array["email"] = $data['Email'];
        $array["phone"] = $data['Contact_num'];
        $array["address"] = $data['Address'];
        $array["city"] = $data['Address'];

   




$array1[$i] = $array;





}
        $amount = floatval($hiddenTotalpayment);
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

                $array1["amount"] = $amount;
        $array1["merchant_id"] = $merchant_id;
        $array1["order_id"] = $order_id;
        $array1["merchant_secret"] = $merchant_secret;
        $array1["currency"] = $currency;
        $array1["hash"] = $hash;
      



      $jsonObj = json_encode($array1);  
        




        print_r($jsonObj);










// 






        // $hiddenTotalpayment = isset($_POST['hiddenTotalpayment']) ? $_POST['hiddenTotalpayment'] : '';
        // $hiddenItem_Id = isset($_POST['hiddenItem_Id']) ? $_POST['hiddenItem_Id'] : '';
        // $hiddenuId = isset($_POST['hiddenuId']) ? $_POST['hiddenuId'] : '';


//         $hiddenTotalpayment = isset($_GET['hiddenTotalpayment']) ? $_GET['hiddenTotalpayment'] : '';



// print_r($_GET['Item_Id']);







        // if (($_SERVER['REQUEST_METHOD'] == 'GET') && (!empty($_SESSION['user_ID'])  && ($_SESSION['user_type'] == 'Buyer'))) {
        //     $_GET = filter_input_array(INPUT_GET, FILTER_UNSAFE_RAW);





            // // $data['total'] = $data['quantity']*$data['Unit_price'] ;
            // $data['total'] = floatval($data['quantity']) * $data['Unit_price'];
            // $data['totalPayment'] = $data['total']+$data['deliveryFee'] ;

            // print_r( $data['total']);



        // }



        


    }

    public function saveOrder() {

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $d = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tz);
            $date = $d->format("Y-m-d H:i:s");

            $data = [
                'quantity' => $_POST["quantity"], 
                'Item_Id' => $_POST["Item_Id"], 
                'uId' => $_POST["uId"], 
                'placed_Date' => $date,
                'selectedDeliveryMethod' => '',
                'orderId' => $_POST["orderId"], 
                
                'totalPayment' => 0,
                
            ];

            $orderdDetails = $this->paymentModel->getItemDetais($data);
            $buyerDetails =  $this->paymentModel->getUserDetails($data);

            // Convert objects to arrays
            $orderdDetails = get_object_vars($orderdDetails);
            $buyerDetails = get_object_vars($buyerDetails);

            // Merge arrays and remove duplicates
            $mergedArray = array_merge($orderdDetails, $buyerDetails);
            $data1 = array_unique($mergedArray);
            $data = array_merge($data1, $data);


            // // $data['total'] = $data['quantity']*$data['Unit_price'] ;
            // $data['total'] = floatval($data['quantity']) * $data['Unit_price'];
            // $data['totalPayment'] = $data['total']+$data['deliveryFee'] ;

            // print_r( $data['total']);

            $this->paymentModel->saveOrder($data);
            echo("1");

        }
    }

    



}

?>





