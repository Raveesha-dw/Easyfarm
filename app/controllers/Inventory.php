

<?php
include_once APPROOT . '/helpers/image_helper.php';


class Inventory extends Controller{
    private $inventoryModel;
    // private static $this;
    public function __construct()
    {
        // self::$this = $this;
        $this->inventoryModel = $this->model('M_inventoryModel');
        
    }

    public function get_inventory_details(){
        // $data=Array();
        $data=$this->inventoryModel->get_data('59');
        // print_r($data);
        // $data=get_object_vars($data[0]);
       
        
        $this->view('seller/v_inventory',$data);
    }
}