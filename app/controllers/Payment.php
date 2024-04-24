<?php
require_once APPROOT . '/config/config.php';

class Payment extends Controller
{
    private $paymentModel;

    public function __construct()
    {
        $this->paymentModel = $this->model('M_payment');

    }

    public function payment()
    {

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
        // $sellerIds = $inputData['sellerIds'];
        // $product_chargings = $inputData['product_chargings'];
        // $delivery_chargings = $inputData['delivery_chargings'];

        $selectedDeliveryMethods = $inputData['selectedDeliveryMethods'];
        $subTotalPayments = $inputData['subTotalPayments'];

        for ($i = 0; $i < count($itemIds); $i++) {

            $data = [
                'quantity' => $quantities[$i],
                'Item_Id' => $itemIds[$i],
                'uId' => $hiddenuId,
                'selectedDeliveryMethod' => $selectedDeliveryMethods[$i],
                'total' => $subTotalPayments[$i],
                'deliveryFee' => '',
                'totalPayment' => 0,

            ];
            // print_r($data);
            $orderdDetails = $this->paymentModel->getItemDetais($data);
            $buyerDetails = $this->paymentModel->getUserDetails($data);

            // Convert objects to arrays
            $orderdDetails = get_object_vars($orderdDetails);
            $buyerDetails = get_object_vars($buyerDetails);

            // Merge arrays and remove duplicates
            $mergedArray = array_merge($orderdDetails, $buyerDetails);
            $data1 = array_unique($mergedArray);
            $data = array_merge($data1, $data);

            $array = [];

            $array["items"] = $data['Item_name'];
            $array["name"] = $data['Name'];
            $array["email"] = $data['Email'];
            $array["phone"] = $data['Contact_num'];
            $array["address"] = $data['Address'];
            $array["city"] = $data['Address'];

            $array1[$i] = $array;

        }

        $amount = floatval($hiddenTotalpayment);
        $merchant_id = 1225296;
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



    }

    public function saveOrder()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
                'selectedDeliveryMethod' => $_POST["selectedDeliveryMethod"],
                'Payment_Id' => $_POST["orderId"],

                'totalPayment' => 0,

            ];

            $data_carging_details = [
                'sellerIds' => $_POST["sellerIds"],
                'product_chargings' => $_POST["product_chargings"],
                'delivery_chargings' => $_POST["delivery_chargings"],

            ];

            // seperate arrays from commas
            $data_carging_details['sellerIds'] = explode(',', $data_carging_details['sellerIds']);
            $data_carging_details['product_chargings'] = explode(',', $data_carging_details['product_chargings']);
            $data_carging_details['delivery_chargings'] = explode(',', $data_carging_details['delivery_chargings']);


           

            $orderdDetails = $this->paymentModel->getItemDetais($data);
            $buyerDetails = $this->paymentModel->getUserDetails($data);

            // Convert objects to arrays
            $orderdDetails = get_object_vars($orderdDetails);
            $buyerDetails = get_object_vars($buyerDetails);

            // Merge arrays and remove duplicates
            $mergedArray = array_merge($orderdDetails, $buyerDetails);
            $data1 = array_unique($mergedArray);
            $data = array_merge($data1, $data);


            $this->paymentModel->saveOrder($data);

            // Assuming count of any of the arrays can represent the total number of iterations needed
            $count = count($data_carging_details['sellerIds']);
            $_SESSION['c'] = $count;

            $data10['Payment_Id'] = $_POST["orderId"];

            for ($i = 0; $i < $count; $i++) {
                $data10['sellerId'] = $data_carging_details['sellerIds'][$i];
                $data10['product_charging'] = $data_carging_details['product_chargings'][$i];
                $data10['delivery_charging'] = $data_carging_details['delivery_chargings'][$i];
                $_SESSION['b'] = $data10;

                $this->paymentModel->saveOrder_Charging_details($data10);
            }

            echo ("1");

        }
    }










    

    // public function saveOrder_Charging_details()
    // {

    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

    //         $data = [
    //             'Payment_Id' => $_POST["orderId"],
    //             'sellerId' => $_POST["sellerId"],
    //             'product_charging' => $_POST["product_charging"],
    //             'delivery_charging' => $_POST["delivery_charging"],

    //         ];

    //         $this->paymentModel->saveOrder_Charging_details($data);
    //         print_r("ppppppppppppppppppppppppp");
    //         print_r("gggggggGGGGGGGGGGGGGGGGGGGGG");
    //         echo ("1");

    //     }
    // }

}
