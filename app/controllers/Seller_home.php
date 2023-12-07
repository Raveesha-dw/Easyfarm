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

    public function get_product_details(){
        // $data=Array();
        $items=$this->sellerhomeModel->get_itemids('59');
       
            $this->view('seller/v_seller_home',$items);

      
    }

    public function update_status(){
        $item1 =$this->sellerhomeModel->updateiteamdeatils();
        $items=$this->sellerhomeModel->get_itemids('59');
        $this->view('seller/v_seller_home',$items);

    }
    
    
}