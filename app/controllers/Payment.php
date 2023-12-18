<?php 
require_once APPROOT . '/config/config.php';

class Payment extends Controller{
    private $paymentModel;

    public function __construct()
    {
        $this->paymentModel = $this->model('M_payment');
        
    }


    public function payment() {
        $amount =3000;
        $merchant_id =  "1225296";
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

    }
}

?>