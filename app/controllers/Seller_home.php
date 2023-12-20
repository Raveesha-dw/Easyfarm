<?php
include_once APPROOT . '/helpers/image_helper.php';


class Seller_home extends Controller{
    private $sellerhomeModel;
    // private static $this;
    public function __construct()
    {
        // self::$this = $this;
        $this->sellerhomeModel = $this->model('M_seller_home');
        
    }

    public function get_product_details1(){
        // $data=Array();
        $items=$this->sellerhomeModel->get_itemids1('59');
       
            $this->view('seller/v_seller_home',$items);

      
    }
    public function get_product_details2(){
        // $data=Array();
        $items=$this->sellerhomeModel->get_itemids2('59');
       
            $this->view('seller/v_seller_home_pending',$items);

      
    }
    public function get_product_details3(){
        // $data=Array();
        $items=$this->sellerhomeModel->get_itemids3('59');
       
            $this->view('seller/v_seller_home_completed',$items);

      
    }

    public function update_status1(){
        $item1 =$this->sellerhomeModel->updateiteamdeatils1();
        $items=$this->sellerhomeModel->get_itemids2('59');
        $this->view('seller/v_seller_home_pending',$items);

    }

    // public function update_status2(){
    //     $item1 =$this->sellerhomeModel->updateiteamdeatils2();
    //     $items=$this->sellerhomeModel->get_itemids('59');
    //     $this->view('seller/v_seller_home_completed',$items);

    // }
    
    
}