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

    public function product(){
        $data = [
            'title' => 'Product'
        ];
        $this->view('pages/product', $data);
    }
    
    public function cart(){
        $data = [
            'title' => 'Cart'
        ];
        $this->view('pages/cart', $data);
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

    // public function loginPage(){
    //     $this->view('Users/v_login');
    // }

    public function forgotPassword(){
        $this->view('Users/v_forgotPassword');
    }
    public function resetPassword(){
        $this->view('Users/v_resetPassword');
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

    public function loginPage(){
        $this->view('Users/v_login');
    }

    public function privacyPolicy(){

    }

    public function termsOfUse(){
        
    }

    public function profile(){
        //
    }

    public function dashboard(){
        if($_SESSION['user_type'] == 'Buyer'){
            $this->view('Buyer/v_dashboardCart');
        }
        if($_SESSION['user_type'] == 'Seller'){
            $this->view('seller/v_seller_home');
        }
    }

    public function dashOrders(){
        $this->view('Buyer/v_dashboardOrders');
    }

    public function dashReviews(){
        $this->view('Buyer/v_dashboardReviews');
    }

    // Seller functions
    public function seller_home(){
        $data = [
            'title' => 'Seller Dashboard'
        ];
        $this->view('seller/v_seller_home');
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