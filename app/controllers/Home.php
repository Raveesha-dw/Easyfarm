<?php
include_once APPROOT . '/helpers/image_helper.php';


class Home extends Controller{
    private $HomeModel;
    // private static $this;
    public function __construct()
    {
        // self::$this = $this;
        $this->HomeModel = $this->model('M_home');
        
    }

// public function get_product_details(){

//     $data=$this->HomeModel->get_data('59');
    
//     $this->view('pages/home',$data);
    

// }





}