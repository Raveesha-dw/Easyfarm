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
    $mail=$_SESSION['user_email'];
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



 public function get_plan_details(){

            $data = $this->vplanModel->get_userdetails($_SESSION['user_email']);
            // print_r($data);
            $registerDate = $data[0]->Register_date;
             $currentDate = date('Y-m-d');
              $plan_id = $data[0]->plan_id;
             $data1=$this->vplanModel->getplandetails($plan_id);
            //  print_r($data1);
             $duration = $data1->duration;
$futureDate = date('Y-m-d', strtotime("$registerDate +$duration months"));        $currentDate = date('Y-m-d');



        // check the user have or have not plan id


        if ($_SESSION['plan_id']==''){
            
            // if not have plan id
            $data= $this->vplanModel->get_plan_details1();
            // print_r("s");
            $this->view('Vechile/v_renter_register_plan2',$data);
    
        }

       elseif ($currentDate > $futureDate) {
            // $this->view('Vechile/v_update_plan');
             $data = $this->vplanModel->get_dataplan3();
            //  WORKCODE 1
            $this->view('Vechile/v_renter_register_plan2', $data);}
        
        
        else{
        

            // assign user_id

        
        $data = $this->vplanModel->get_dataplan( $_SESSION['user_ID']);
        // print_r($data);
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
        // print_r($data1);
// call the get_plan detail funcron controller function
        $data2= $this->get_plan_details2();       
        // print_r($data2);

        $concatenatedData = array_merge($data1, $data2);
       
        if ($concatenatedData['plan_id'] == 1) {

                $concatenatedData['list_count'] = $concatenatedData['list_count'];
            } elseif ($concatenatedData['plan_id'] == 2) {
                $concatenatedData['list_count'] = $concatenatedData['list_count'];
            } else {
                // Assuming 'Unlimited' means a large number, you can use PHP_INT_MAX or any other large number
                $concatenatedData['list_count'] = "Unlimited";
            }
        

        // print_r( $concatenatedData);
        $this->view('Vechile/v_renterplan',$concatenatedData );

    }
}

    public function get_plan_details2(){
        
        
        $data = $this->vplanModel->get_dataplan3();
        // print_r($data);
        $result = [];

        foreach ($data as $row) {
                 $result[] = get_object_vars($row);
        }
        // $data2  = get_object_vars($data[1]);
        return $result;
       


       
       

  
        
    }


public function payment1() {
    
        $data = $this->vplanModel->get_dataplan2();
        
        
        $mail=$_SESSION['user_email'];
        $data2=$this->vplanModel->get_userdetails($mail);
        
        // print_r($mail);
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


    public function payment6() {
    
        $data = $this->vplanModel->get_dataplan2();
        
        
        $mail=$_SESSION['user_email'];
        $data2=$this->vplanModel->get_userdetails($mail);
        
        // print_r($mail);
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



        public function update_plan(){
            // print_r($_SESSION['plan_id']);
            // print_r("nn");
            if ($_SESSION['plan_id']==3){
                $data3=$this->vplanModel->getnew_listing_details();
                $newplan_id = $data3[0]->plan_id;
                $this->vplanModel->update_premium_plan($newplan_id);
                $data4=$this->vplanModel->get_update_plan_details();
                // $data5=$this->planModel->get_dataplan3();
        
                $data6  = get_object_vars($data4[0]);
                $originalDate = $data6['Register_date'];
        
                $dateTime = new DateTime($originalDate);
                $dateTime->add(new DateInterval('P180D'));
                $newDate = $dateTime->format('Y-m-d');
                $data6['Date'] = $newDate;
                $data5= $this->get_plan_details2();
                $concatenatedData = array_merge($data6, $data5);
        
        
                if ($concatenatedData['plan_id'] == 1) {
                    $concatenatedData['list_count'] = $concatenatedData[0]['listing_limit'];
                } elseif ($concatenatedData['plan_id'] == 2) {
                    $concatenatedData['list_count'] = $concatenatedData[1]['listing_limit'];
                } else {
                    // Assuming 'Unlimited' means a large number, you can use PHP_INT_MAX or any other large number
                    $concatenatedData['list_count'] = "Unlimited";
                }
            
        
            // print_r( $concatenatedData);
            // $this->view('seller/v_update_plan',$concatenatedData );
            redirect("V_plan/update_planview");
    
            }
            
           else {
            $data1=$this->vplanModel->getcurrent_plan_details($_SESSION['plan_id']);
            $data2=$this->vplanModel->getcurrent_listing_details($_SESSION['user_ID']);
            $data3=$this->vplanModel->getnew_listing_details();
            $listingLimitFirstPlan = $data1[0]->listing_limit;
            $listCountUser = $data2[0]->list_count;
            $listingLimitnewPlan = $data3[0]->listing_limit;
            $newplan_id = $data3[0]->plan_id;
    
            // print_r($listingLimitFirstPlan);
            // print_r($listCountUser);
            // print_r($listingLimitnewPlan);
            // print_r($newplan_id);
    
            if($newplan_id==3){
                $data3=$this->vplanModel->getnew_listing_details();
                $newplan_id = $data3[0]->plan_id;
                $this->vplanModel->update_premium_plan($newplan_id);
                $data4=$this->vplanModel->get_update_plan_details();
                // $data5=$this->planModel->get_dataplan3();
        
                $data6  = get_object_vars($data4[0]);
                $originalDate = $data6['Register_date'];
        
                $dateTime = new DateTime($originalDate);
                $dateTime->add(new DateInterval('P180D'));
                $newDate = $dateTime->format('Y-m-d');
                $data6['Date'] = $newDate;
                $data5= $this->get_plan_details2();
                $concatenatedData = array_merge($data6, $data5);
        
        
                if ($concatenatedData['plan_id'] == 1) {
                    $concatenatedData['list_count'] = $concatenatedData['list_count'];
                } elseif ($concatenatedData['plan_id'] == 2) {
                    $concatenatedData['list_count'] = $concatenatedData['list_count'];
                } else {
                    // Assuming 'Unlimited' means a large number, you can use PHP_INT_MAX or any other large number
                    $concatenatedData['list_count'] = "Unlimited";
                }
            
        
            // print_r( $concatenatedData);
            redirect("V_plan/update_planview");
    
            }
    
            else{$newlisting_count =   $listCountUser+$listingLimitnewPlan;
            $this->vplanModel->update_plan($newlisting_count, $newplan_id);
            $data4=$this->vplanModel->get_update_plan_details();
            // $data5=$this->planModel->get_dataplan3();
    
            $data6  = get_object_vars($data4[0]);
            $originalDate = $data6['Register_date'];
    
            $dateTime = new DateTime($originalDate);
            $dateTime->add(new DateInterval('P180D'));
            $newDate = $dateTime->format('Y-m-d');
            $data6['Date'] = $newDate;
            $data5= $this->get_plan_details2();
            $concatenatedData = array_merge($data6, $data5);
                // print_r( $concatenatedData);
    
            if ($concatenatedData['plan_id'] == 1) {
                $concatenatedData['list_count'] = $concatenatedData['list_count'];
            } elseif ($concatenatedData['plan_id'] == 2) {
                $concatenatedData['list_count'] = $concatenatedData['list_count'];
            } else {
                // Assuming 'Unlimited' means a large number, you can use PHP_INT_MAX or any other large number
                $concatenatedData['list_count'] = "Unlimited";
            }
        
    
        // print_r( $concatenatedData);
        redirect("V_plan/update_planview");}
    
    
    
    
    
        }
    
            // $data=$this->planModel->update_plan();
        }








        public function update_planview (){

            $data4=$this->vplanModel->get_update_plan_details();
            // $data5=$this->planModel->get_dataplan3();
    
            $data6  = get_object_vars($data4[0]);
            $originalDate = $data6['Register_date'];
    
            $dateTime = new DateTime($originalDate);
            $dateTime->add(new DateInterval('P180D'));
            $newDate = $dateTime->format('Y-m-d');
            $data6['Date'] = $newDate;
            $data5= $this->get_plan_details2();
            $concatenatedData = array_merge($data6, $data5);
                // print_r( $concatenatedData);
    
            if ($concatenatedData['plan_id'] == 1) {
                $concatenatedData['list_count'] = $concatenatedData['list_count'];
            } elseif ($concatenatedData['plan_id'] == 2) {
                $concatenatedData['list_count'] = $concatenatedData['list_count'];
            } else {
                // Assuming 'Unlimited' means a large number, you can use PHP_INT_MAX or any other large number
                $concatenatedData['list_count'] = "Unlimited";
            }
            $this->view('Vechile/v_renter_update_plan',$concatenatedData );
    
    
        }

        public function payment2() {
    
            $data = $this->vplanModel->get_dataplan1();
            
            
            $mail=$_SESSION['user_email'];
            
            
            $data2=$this->vplanModel->get_userdetails($mail);
            
            
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
            


            public function update_details2($id = null){
                if ($id === null) {
                    // If $id is not provided as a parameter, try to get it from $_GET['id']
                    $id = isset($_GET['id']) ? $_GET['id'] : null;
                }
            
                // Now you can use $id in your function
                 if($this->vplanModel->update_user_plan2()){
                    // unset($_SESSION['user_email']);
                    echo '<script>window.location.href = "http://localhost/Easyfarm/V_plan/cretesession4";</script>';
            
                    
                 }
            
                
            }


            public function cretesession4(){
                $data=$this->vplanModel->get_planid1();
                // print_r($data);
                $_SESSION['plan_id']=$data[0]->plan_id;
                header("Location:http://localhost/Easyfarm/V_plan/get_plan_details");
            
            }


            public function update_details1($id = null){
    if ($id === null) {
        // If $id is not provided as a parameter, try to get it from $_GET['id']
        $id = isset($_GET['id']) ? $_GET['id'] : null;
    }

    // Now you can use $id in your function
     if($this->vplanModel->update_user_plan1()){
        // unset($_SESSION['user_email']);
        echo '<script>window.location.href = "http://localhost/Easyfarm/V_post/cretesession3";</script>';

        // redirect('Users/v_login');
     }

    
}
            




}