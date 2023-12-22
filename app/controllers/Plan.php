<?php class Plan extends Controller{
    private $planModel;
    // private static $this;
    public function __construct()
    {
        // self::$this = $this;
        $this->planModel = $this->model('M_plan');
        
    }


    public function get_plan_details(){
        // print_r("d");
        
        $data = $this->planModel->get_dataplan('1','59');
        $data1  = get_object_vars($data[0]);
        $originalDate = $data1['Register_date'];

// Create a DateTime object from the original date
        $dateTime = new DateTime($originalDate);

// Add 180 days to the date
        $dateTime->add(new DateInterval('P180D'));

// Get the new date
        $newDate = $dateTime->format('Y-m-d');

// Update the array with the new date
        $data1['Date'] = $newDate;
        $data2= $this->get_plan_details2();
        $concatenatedData = array_merge($data1, $data2);
        if ($concatenatedData['plan_id'] == 1) {
                $concatenatedData['list_count'] = $concatenatedData[0]['listing_limit'] - $concatenatedData['list_count'];
            } elseif ($concatenatedData['plan_id'] == 2) {
                $concatenatedData['list_count'] = $concatenatedData[1]['listing_limit'] - $concatenatedData['list_count'];
            } else {
                // Assuming 'Unlimited' means a large number, you can use PHP_INT_MAX or any other large number
                $concatenatedData['list_count'] = "Unlimited";
            }
        

        // print_r( $concatenatedData);
        $this->view('seller/v_plan',$concatenatedData );

    }

    public function get_plan_details2(){
        // print_r("d");
        
        $data = $this->planModel->get_dataplan1();
        $result = [];

        foreach ($data as $row) {
                 $result[] = get_object_vars($row);
        }
        // $data2  = get_object_vars($data[1]);
        return $result;
       

// Create a DateTime object from the original date
       
       


        // $this->view('seller/v_plan', $data2);
    }




    public function payment() {
    $data = $this->planModel->get_dataplan1();
    // print_r(var_dump($data));
    // print_r($data['price']);
    
    $amount =100;
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
    // $array["return_url"]= "http://localhost/Easyfarm/Users/login";
    $array["items"] = "Door bell wireles";
    $array["first_name"] = "imalja";
    $array["last_name"] = "dhananja";
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