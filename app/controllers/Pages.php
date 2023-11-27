<?php
class Pages extends Controller{
    public function __construct(){
     
    }

    public function index(){
        
        $data = [
            'title' => 'Easyfarm',

        ];
        
        $this->view('pages/home', $data);

    }

    public function seller_home(){
        $data = [
            'title' => 'Seller Dashboard'
        ];
        $this->view('seller/v_seller_home', $data);
    }
    public function create_post(){
        $this->view('seller/v_create_post');
    }
    public function myplan(){
        $this->view('seller/v_myplan');
    
    }
    public function created_post(){
        $this->view('seller/v_createdpost');
    }

    public function about(){
        $data = [
            'title' => 'About'
        ];
        $this->view('pages/about', $data);
    }

    public function registerPage(){
        $this->view('Users/v_roleselection');
    }

    public function registerBuyer(){
        $this->view('Users/v_registerBuyer');
    }

    public function registerVehicleOwner(){
        $this->view('Users/v_registerVehicleRenter');
    }

    public function registerSeller(){
        $this->view('Users/v_registerSeller');
    }

    public function profile(){
        //
    }
    public function registedSeller(){
        $this->view('Users/v_registerSeller');
    }

    public function updateProduct(){
        $this->view('seller/v_update_post');
    }



    

}

// Pages is the default controller
// Index is the default method
// That's what runs when we r in the home page