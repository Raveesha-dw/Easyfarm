<?php
class Pages extends Controller{
    private $productModel;
    public function __construct(){
        $this->productModel=$this->model('M_Product');
    }

    public function index(){
        
        $products = $this->productModel->getAllProducts();
        $categories = $this->productModel->getAllCategories();

        $data = [
            'title' => 'Easyfarm',
            'product_all' => $products,
            'categories' => $categories
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

    public function ve_home(){
        $this->view('Vechile/vecile_home');
    }
    public function myplan(){
        $this->view('seller/v_plan');
    
    }
    public function inventory(){
        $this->view('seller/v_inventory');
    
    }
    // public function createdpost($data){
    //     $data =[
    //         'title' =>'createdpost'
    //     ];
    //     $this->view('seller/v_createdpost',$data);
    // }

    public function product(){
        $data = [
            'title' => 'Product'
        ];
        $this->view('pages/product', $data);
    }
    
    // public function cart(){
    //     $data = [
    //         'title' => 'Cart'
    //     ];
    //     $this->view('pages/cart', $data);
    // }

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

    public function re_home(){
        $this->view('seller/a');
    }

    public function privacyPolicy(){

    }

    public function termsOfUse(){
        
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



    public function dashboard(){
        if($_SESSION['user_type'] == 'Buyer'){
            $this->view('Buyer/v_dashboardCart');
        }
        elseif($_SESSION['user_type'] == 'Seller'){
            $this->view('seller/v_seller_home');
        }
           elseif($_SESSION['user_type'] == 'VehicleRenter'){
            $this->view('V_renter_home/get_details1');
        }
    }

    // public function dashOrders(){
    //     $this->view('Buyer/v_dashboardOrders');
    // }

    public function dashReviews(){
        $this->view('Buyer/v_dashboardReviews');
    }

    public function choosepkg(){
        $this->view('seller/v_register_plan');
    }


    public function v_choosepkg(){
        $this->view('Vechile/v_vechile_register_plan');
    }




    // Seller functions
    // public function seller_home(){
    //     $data = [
    //         'title' => 'Seller Dashboard'
    //     ];
    //     $this->view('seller/v_seller_home');
    // }
    // public function create_post(){
    //     $this->view('seller/v_create_post');
    // }
    // public function myplan(){
    //     $this->view('seller/v_myplan');
    
    // }
    // public function created_post(){
    //     $this->view('seller/v_createdpost');
    // }

    // public function registedSeller(){
    //     $this->view('Users/v_registerSeller');
    // }

    // public function updateProduct(){
    //     $this->view('seller/v_update_post');
    // }
    public function new_navbar(){
        $this->view('inc/components/navbars/new_nav');
    }
    public function payment(){
        $this->view('pages/payment');
    }
    public function vehicleRenterCreatePost(){
        $this->view('VehicleRenter/v_vehicle_create_post');
    }
    

}

// Pages is the default controller                                               
// Index is the default method
// That's what runs when we r in the home page