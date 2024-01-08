<?php
include_once APPROOT . '/helpers/image_helper.php';


class V_renter_home extends Controller{
    private $renterhomeModel;
   
    public function __construct()
    {
     
        $this->renterhomeModel = $this->model('M_renter_home');
        
    }

    public function get_details1(){

        
        $items=$this->renterhomeModel->get_itemids1($_SESSION['user_ID']);
       
            $this->view('Vechile/v_renterhome',$items);

      
    }
    public function get_product_details2(){
        
        $items=$this->renterhomeModel->get_itemids2('59');
       
            $this->view('seller/v_seller_home_pending',$items);

      
    }
    public function get_product_details3(){
       
        $items=$this->renterhomeModel->get_itemids4('59');
       
            $this->view('seller/v_seller_home_completed',$items);

      
    }



    public function update_status1(){
        $item1 =$this->renterhomeModel->updateiteamdeatils1();
        $items=$this->renterhomeModel->get_itemids2('59');
        $this->view('seller/v_seller_home_pending',$items);

    }

    public function update_status2(){
        $item1 =$this->renterhomeModel->updateiteamdeatils2();
        $items=$this->renterhomeModel->get_itemids4('59');
        $this->view('seller/v_seller_home_completed',$items);

    }

  
    
    
}