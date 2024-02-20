<?php
 class Vehicle_item extends Controller{
    private $V_itemModel;


    public function __construct(){
        $this->V_itemModel=$this->model('M_vehicle_item');
    }



    public function gethomepage(){

        $v_Categories =  $this->V_itemModel->get_category();
        $data['v_Categories'] = $v_Categories;

        $this->view('Vechile/vecile_home',$data);
   
    }















    

 }

    