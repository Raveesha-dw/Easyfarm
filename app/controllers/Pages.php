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

    

}

// Pages is the default controller
// Index is the default method
// That's what runs when we r in the home page