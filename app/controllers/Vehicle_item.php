<?php
 class Vehicle_item extends Controller{
    private $V_itemModel;


    public function __construct(){
        $this->V_itemModel=$this->model('M_vehicle_item');
    }



    public function gethomepage(){

        $v_Categories =  $this->V_itemModel->get_category();
        $data['v_Categories'] = $v_Categories;


        $items = $this->V_itemModel->get_all_items();
        
        $data ['items'] = $items ;

        $this->view('Vechile/vecile_home',$data);

        
   
    }


    public function getcatergorized_items(){

        $Categorized_items = $this->V_itemModel->get_Categorized_items();
        
        $data = [
            'Categorized_items' => $Categorized_items
        ]  ;
        $this->view('renter/v_viewItems', $data);

        
   
    }



 }

    