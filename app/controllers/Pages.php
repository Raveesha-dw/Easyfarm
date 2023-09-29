<?php
class Pages extends Controller{
    public function __construct(){
     
    }

    public function index(){
        
        $data = [
            'title' => 'Easyfarm',

        ];
        
        $this->view('pages/index', $data);
    }

    public function about(){
        $data = [
            'title' => 'About'
        ];
        $this->view('pages/about', $data);
    }
}

// Pages is the default controller
// Index is the default method
// That's what runs when we r in the home page