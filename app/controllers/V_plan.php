<?php class V_plan extends Controller{
    private $vplanModel;
    // private static $this;
    public function __construct()
    {
        // self::$this = $this;
        $this->vplanModel = $this->model('M_vplan');
        
    }

    public function choosepkg(){
        
        // print_r("ss");
        $data= $this->vplanModel->get_plan_details1();
        // print_r($data);
        $this->view('Vechile/v_vechile_register_plan',$data);

    }

    public function payment() {
        // $user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : 'User Email Not Available';
    $data = $this->vplanModel->get_dataplan1();
//    print_r("s");
   ;
    $mail=$_SESSION['user_email1'];
    // print_r($mail);
    $data2=$this->vplanModel->get_userdetails($mail);
    // print_r($data2);

// print_r($data2);


// 4916217501611292
    
    $amount =$data[0]->price;
    $merchant_id =  "1225296";
    $order_id = uniqid();
    $merchant_secret = "NTc0MDU0NjMxMjA1NjI3NTI2ODMzMjQwMjAxNTYzMzE0MjI0NDQ4";
    $currency = "LKR";
    $name= $data[0]->name;
    $f_name= $data2[0]->Name;
    $address= $data2[0]->Address;
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

// regiter withplan and goto loginpage

public function update_details($id = null){
    if ($id === null) {
        // If $id is not provided as a parameter, try to get it from $_GET['id']
        $id = isset($_GET['id']) ? $_GET['id'] : null;
    }

    // Now you can use $id in your function
     if($this->vplanModel->update_user_plan()){
        unset($_SESSION['user_email']);
        echo '<script>window.location.href = "http://localhost/Easyfarm/Users/login";</script>';

        // redirect('Users/v_login');
     }

    
}







































}