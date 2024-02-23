<?php
include_once APPROOT . '/helpers/image_helper.php';


class V_renter_home extends Controller{
    private $renterhomeModel;
   
    public function __construct()
    {
     
        $this->renterhomeModel = $this->model('M_renter_home');
        
    }


    // renter navbar new arrival
    public function get_details1(){
print_r($_SESSION['user_ID']);
        
        $items=$this->renterhomeModel->get_itemids1($_SESSION['user_ID']);
        //  $dates=$this->renterhomeModel->get_itemidsdays1($_SESSION['user_ID']);
        
       
            $this->view('Vechile/v_renterhome',$items);

      
    }



     // renter navbar pending
    public function get_details2(){
        
        $items=$this->renterhomeModel->get_itemids2($_SESSION['user_ID']);
       
            $this->view('Vechile/v_renter_home_pending',$items);

      
    }

    // renter navbar 
    public function get_details3(){
       
        $items=$this->renterhomeModel->get_itemids4($_SESSION['user_ID']);
       
            $this->view('Vechile/v_renter_home_completed',$items);

      
    }



    public function update_status1(){
        $item1 =$this->renterhomeModel->updateiteamdeatils1();
        $items=$this->renterhomeModel->get_itemids2($_SESSION['user_ID']);
        $this->view('Vechile/v_renter_home_pending',$items);

    }

    public function update_status2(){
        $item1 =$this->renterhomeModel->updateiteamdeatils2();
        $items=$this->renterhomeModel->get_itemids4($_SESSION['user_ID']);
        $this->view('Vechile/v_renter_home_completed',$items);
    }

  
        public function calendar(){
        $data = [
            'title' => 'calendar'
        ];
        
        $this->view('VehicleRenter\v_calendar', $data);
 
        }


        public function get_post_details(){
        $data = [
            'title' => 'post'
        ];
        
        $this->view('VehicleRenter\v_vehicle_post_details', $data);
 
        }

    
}