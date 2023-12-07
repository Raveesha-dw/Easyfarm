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
        // print_r($items);
        // print_r ($items);

        // for ($i=0;$i<count($items); $i++){
            // $item  = get_object_vars($items[0]);
            // print_r($item);}
            // print_r($item);
            $this->view('seller/v_seller_home',$items);

        // }
        
        
            // $data1 = [];
            
            //     $data = [
            //     'Order_ID'         => $item['Order_ID'],
            //     'Item_ID'       => $item['Item_ID'],
            //     'User_ID'       => $item['User_ID'],
            //     'placed_Date'  => $item['placed_Date'],
            //      'quantity'         => $item['quantity'],
            //     'seller_ID'       => $item['seller_ID'],
            //     'Status'       => $item['Status']
            //         ];

            //         $data1[] = $data;
            //         // print_r($item);
                   
        // $items2=$this->sellerhomeModel->getorders($data['Item_ID']);
        // print_r("djd");
        // print_r($items2);
        // print_r()
        // print_r("aa");
        
        // print_r($item['Item_ID']);
    
    
   
    
    // for($i=0;$i<=count($items); $i++){
    //         // print_r("kkd");
    //         // print_r($item['Item_ID']);
    //  }
    }
    
    // public function get_user_details(){
    //     $data=$this->sellerhomeModel->get_data_m('59');
    //     $this->view('seller/v_seller_home',$data);
    // }

}