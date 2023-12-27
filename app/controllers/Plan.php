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
        
        $data = $this->planModel->get_dataplan('1','135');
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
        print_r($data1);
        $data2= $this->get_plan_details2();
        print_r($data2);
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
        // print_r($data);
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
        // $user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : 'User Email Not Available';
    $data = $this->planModel->get_dataplan1();
   
    // $data1=$this->planModel->get_userdetails($user_email);
    // $a =$data[0]['price'];
    // echo $data;
    // print_r($data);
    $mail=$_SESSION['user_email1'];
    $data2=$this->planModel->get_userdetails($mail);
    // print_r($data2);

// Start or resume the session
// session_start();
// print_r($data);
// Access the user_email from the session
// echo "User Email: $user_email";


// Now you can use $user_email as needed in your code
// echo "User Email: $user_email";


// 4916217501611292
    
    $amount =$data[0]->price;
    $merchant_id =  "1225296";
    $order_id = uniqid();
    $merchant_secret = "NTc0MDU0NjMxMjA1NjI3NTI2ODMzMjQwMjAxNTYzMzE0MjI0NDQ4";
    $currency = "LKR";
    $name= $data[0]->name;
    $f_name= $data2[0]->Name;
    $address= $data2[0]->Store_Adress;
    $email= $data2[0]->Email;
    $plan_id=$data[0]->plan_id;



    $hash = strtoupper(
        md5(
            $merchant_id . 
            $order_id . 
            number_format($amount, 2, '.', '') . 
            $currency .  
            strtoupper(md5($merchant_secret)) 
        ) 
    );

    $array =[$data2];
    // $array["return_url"]= "http://localhost/Easyfarm/Users/login";
    $array["items"] = $name;
    $array["full_name"] = $f_name;
    // $array["last_name"] = "dhananja";
    $array["email"] = $email;
    // $array["phone"] = "0715797461";
    $array["address"] = $address;
    $array["plan_id"] = $plan_id;
    // $array["city"] = "Hambanthota";

    


    $array["amount"] = $amount;
    $array["merchant_id"] = $merchant_id;
    $array["order_id"] = $order_id;
    $array["merchant_secret"] = $merchant_secret;
    $array["currency"] = $currency;
    $array["hash"] = $hash;

    $jsonObj = json_encode($array);
    print_r($jsonObj);


}

public function update_details($id = null){
    if ($id === null) {
        // If $id is not provided as a parameter, try to get it from $_GET['id']
        $id = isset($_GET['id']) ? $_GET['id'] : null;
    }

    // Now you can use $id in your function
     if($this->planModel->update_user_plan()){
        unset($_SESSION['user_email']);
        echo '<script>window.location.href = "http://localhost/Easyfarm/Users/login";</script>';

        // redirect('Users/v_login');
     }

    // print_r($id);
    // print_r( $_SESSION['user_email1']);
}



      
}