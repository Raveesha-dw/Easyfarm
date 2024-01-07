<?php
include_once APPROOT . '/helpers/image_helper.php';


class Seller_home extends Controller{
    private $sellerhomeModel;
   
    public function __construct()
    {
     
        $this->sellerhomeModel = $this->model('M_seller_home');
        
    }

    public function get_product_details1(){

        
        $items=$this->sellerhomeModel->get_itemids1('59');
       
            $this->view('seller/v_seller_home',$items);

      
    }
    public function get_product_details2(){
        
        $items=$this->sellerhomeModel->get_itemids2('59');
       
            $this->view('seller/v_seller_home_pending',$items);

      
    }
    public function get_product_details3(){
       
        $items=$this->sellerhomeModel->get_itemids4('59');
       
            $this->view('seller/v_seller_home_completed',$items);

      
    }



    public function update_status1(){
        $item1 =$this->sellerhomeModel->updateiteamdeatils1();
        $items=$this->sellerhomeModel->get_itemids2('59');
        $this->view('seller/v_seller_home_pending',$items);

    }

    public function update_status2(){
        $item1 =$this->sellerhomeModel->updateiteamdeatils2();
        $items=$this->sellerhomeModel->get_itemids4('59');
        $this->view('seller/v_seller_home_completed',$items);

    }

  
    
    
}