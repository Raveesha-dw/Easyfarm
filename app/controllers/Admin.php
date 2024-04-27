<?php

require_once APPROOT . '/helpers/Mail_helper.php';

class Admin extends Controller{
    private $adminModel;

    public function __construct(){
         if(isset($_SESSION['user_ID']) && $_SESSION['user_type'] == 'Admin'){
            $this->adminModel = $this->model('M_admin');
         }else{
            redirect("index");
         }    
    }

    public function index(){
        redirect("Admin/agriInstructor");
    }



    // Manage Blog

    public function blog(){
        $data['blogCategories'] = $this->adminModel->getBlogCategories();

        $newCategory = [
            'category' => '',
            'permalink' => '',

            'category_err' => '',
            'permalink_err' => ''
        ];

        $data['newCategory'] = $newCategory;
        
        $this->view('Admin/v_adminBlog', $data);
    }

    public function addBlogCategory(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $newcategory = [
                'category' => trim($_POST['category']),
                'permalink' => trim($_POST['permalink']),

                'category_err' => '',
                'permalink_err' => ''
            ];

            if(empty($newcategory['category'])){
                $newcategory['category_err'] = 'Enter category name';
            }

            if(empty($newcategory['permalink'])){
                $newcategory['permalink_err'] = 'Permalink should not be empty';
            }
            else if($this->adminModel->findBlogCategory($newcategory['permalink'])){
                $newcategory['permalink_err'] = 'This permalink is already used';
            }
            
            if(empty($newcategory['category_err']) && empty($newcategory['permalink_err'])){
                if($this->adminModel->insertBlogCategory($newcategory)){
                    flash('add_category_success', 'Category has been added successfully!');
                    redirect('Admin/blog');
                }else{
                    die('Something went wrong :(');
                }
            }else{
                $data['newCategory'] = $newcategory;
                $this->view('Admin/v_adminBlog', $data);
            }
        }
    }

    public function editBlogCategory(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $category = [
                'category' => trim($_POST['category']),
                'permalink' => trim($_POST['permalink']),

                'category_err' => ''
            ];

            if(empty($category['category'])){
                $category['category_err'] = 'Enter category name';
            }
            
            if(empty($category['category_err'])){
                if($this->adminModel->updateBlogCategory($category)){
                    flash('add_category_success', 'Category has been added successfully!');
                    redirect('Admin/blog');
                }else{
                    die('Something went wrong :(');
                }
            }else{
                redirect('Admin/blog');
                // $data['category'] = $category;
                // $this->view('Admin/v_adminBlog', $data);
            }
        }
    }

    public function deleteBlogCategory(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if($this->adminModel->deleteBlogCategory(trim($_POST['permalink']))){
                redirect('Admin/blog');
            }else{
                die('Something went wrong :(');
            }
        }
    }



    // Manage Agri Instructor

    public function agriInstructor(){
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['AccStatus'])){ 
            $AccStatus = $_GET['AccStatus']; 
        }else{
            $AccStatus = 'Under Review';
        }

        $data = $this->adminModel->getAgriInstructorsByAccStatus($AccStatus);

        $this->view('Admin/v_adminAgriInstructor', $data);
    }

    public function reviewAgriInstructor(){

        //View agri instructor's acc details
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['id'])){
            $data = $this->adminModel->getAgriInstructorById($_GET['id']);
            $this->view('Admin/v_adminReviewAgriInstructor', $data);
        }

        //Verify or Reject account
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='POST'){

            $id = trim($_POST['id']);
            $accStatus = trim($_POST['accStatus']);

            $name = $this->adminModel->getAgriInstructorById($id)->Name;
            $email = $this->adminModel->getEmailByUserId($id)->Email;

            if($this->adminModel->setAgriInstructorAccStatus($id, $accStatus)){
                switch($accStatus){
                    case 'Verified':
                        sendAccVerifiedEmail($email, $name);
                        break;
                    case 'Rejected':
                        sendAccRejectedEmail($email, $name);
                        break;
                    default:
                        echo 'Email has not been sent.';
                }
                header('Location: ' . URLROOT . '/Admin/agriInstructor');
            }else{
                die('Something went wrong :(');
            }
        }
    }



    // Manage Payments

    // 1) Manage Sellers' Payments

    public function seller(){
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['status'])){
            $status = trim($_GET['status']);
            $data['sellerPayments'] = $this->adminModel->getSellerPaymentData($status);
            $this->view('Admin/v_adminSellerPayments', $data);
        }

        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='POST'){
            $paymentID = trim($_POST['paymentID']);
            $sellerID = trim($_POST['sellerID']);
            $status = trim($_POST['status']);

            $this->adminModel->setSellerPayment($paymentID, $sellerID, $status);

            $status = ($status == 'Unsettled') ? ('Settled') : ('Unsettled');
            redirect('Admin/seller?status=' .  $status);
        }
        
        else{
            redirect('Admin/seller?status=Unsettled');
        }
    }

    public function settleSellerPayment(){
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='POST'){
            $sellerID = trim($_POST['sellerID']);
            $data['sellerData'] = $this->adminModel->getSellerBankInfo($sellerID);
            $this->view('Admin/v_settleSellerPayment', $data);
        }
    }

    // 2) Manage Delivery Agent's Payments

    public function delivery(){
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['status'])){
            $status = trim($_GET['status']);
            $data['deliveryPayments'] = $this->adminModel->getDeliveryPaymentData($status);
            $this->view('Admin/v_adminDeliveryPayments', $data);
        }

        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='POST'){
            $paymentID = trim($_POST['paymentID']);
            $sellerID = trim($_POST['sellerID']);
            $status = trim($_POST['status']);

            $this->adminModel->setDeliveryPayment($paymentID, $sellerID, $status);

            $status = ($status == 'Unsettled') ? ('Settled') : ('Unsettled');
            redirect('Admin/delivery?status=' .  $status);
        }
        
        else{
            redirect('Admin/delivery?status=Unsettled');
        }
    }



    // Manage Marketplace Categories

    public function marketplace(){
        $data['marketplaceCategories'] = $this->adminModel->getMarketplaceCategories();

        $newCategory = [
            'category' => '',
            'units' => '',
            'deliveryMethod' => '',
            'isExpDate' => '',
            'fontAwsome' => '',

            'category_err' => '',
            'units_err' => '',
            'deliveryMethod_err' => ''
        ];

        $data['newCategory'] = $newCategory;
        
        $this->view('Admin/v_adminMarketplaceCategories', $data);
    }

    public function addMarketplaceCategory(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $newcategory = [
                'category' => trim($_POST['category']),
                'units' => trim($_POST['units']),
                'deliveryMethod' => trim($_POST['deliveryMethod']),
                'isExpDate' => trim($_POST['isExpDate']),
                'fontAwsome' => trim($_POST['fontAwsome']),


                'category_err' => '',
                'units_err' => '',
                'deliveryMethod_err' => ''
            ];

            if(empty($newcategory['category'])){
                $newcategory['category_err'] = 'Enter category name';
            }

            if(empty($newcategory['units'])){
                $newcategory['units_err'] = 'Units should not be empty';
            }

            if(empty($newcategory['deliveryMethod'])){
                $newcategory['deliveryMethod_err'] = 'Delivery Method should not be empty';
            }

            $newcategory['isExpDate'] = ($newcategory['isExpDate']) == 'yes' ? 'yes' : 'no';
            
            if(empty($newcategory['category_err']) && empty($newcategory['units_err']) && empty($newcategory['deliveryMethod_err'])){
                if($this->adminModel->insertMarketplaceCategory($newcategory)){
                    flash('add_category_success', 'Category has been added successfully!');
                    redirect('Admin/marketplace');
                }else{
                    die('Something went wrong :(');
                    redirect('Admin/marketplace');
                }
            }else{
                $data['newCategory'] = $newcategory;
                // $this->view('Admin/v_adminMarketplaceCategories', $data);
                redirect('Admin/marketplace');
            }
        }
    }

    public function editMarketplaceCategory(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $newcategory = [
                'category_id' => trim($_POST['category_id']),
                'category' => trim($_POST['category']),
                'units' => trim($_POST['units']),
                'deliveryMethod' => trim($_POST['deliveryMethod']),
                'isExpDate' => trim($_POST['isExpDate']),
                'fontAwsome' => trim($_POST['fontAwsome']),

                'category_err' => '',
                'units_err' => '',
                'deliveryMethod_err' => ''
            ];

            if(empty($newcategory['category'])){
                $newcategory['category_err'] = 'Enter category name';
            }

            if(empty($newcategory['units'])){
                $newcategory['units_err'] = 'Units should not be empty';
            }

            if(empty($newcategory['deliveryMethod'])){
                $newcategory['deliveryMethod_err'] = 'Delivery Method should not be empty';
            }

            $newcategory['isExpDate'] = ($newcategory['isExpDate']) == 'yes' ? 'yes' : 'no';

            if(empty($newcategory['category_err']) && empty($newcategory['units_err']) && empty($newcategory['deliveryMethod_err'])){
                if($this->adminModel->updateMarketplaceCategory($newcategory)){
                    flash('add_category_success', 'Category has been added successfully!');
                    // print('done');
                    redirect('Admin/marketplace');
                }else{
                    die('Something went wrong :(');
                    redirect('Admin/marketplace');
                }
            }else{
                $data['newCategory'] = $newcategory;
                // $this->view('Admin/v_adminBlog', $data);
                redirect('Admin/marketplace');
            }
        }
    }

    public function deleteMarketplaceCategory(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if($this->adminModel->deleteMarketplaceCategory(trim($_POST['category_id']))){
                redirect('Admin/marketplace');
            }else{
                die('Something went wrong :(');
                redirect('Admin/marketplace');
            }
        }
    }



    // Manage Vehicle Categories

    public function vehicle(){
        $data['vehicleCategories'] = $this->adminModel->getVehicleCategories();

        $newCategory = [
            'category' => '',

            'category_err' => ''
        ];

        $data['newCategory'] = $newCategory;
        
        $this->view('Admin/v_adminVehicleCategories', $data);
    }

    public function addVehicleCategory(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $newcategory = [
                'category' => trim($_POST['category']),

                'category_err' => ''
            ];

            if(empty($newcategory['category'])){
                $newcategory['category_err'] = 'Enter category name';
            }
            
            if(empty($newcategory['category_err'])){
                if($this->adminModel->insertVehicleCategory($newcategory)){
                    flash('add_category_success', 'Category has been added successfully!');
                    redirect('Admin/vehicle');
                }else{
                    die('Something went wrong :(');
                    redirect('Admin/vehicle');
                }
            }else{
                $data['newCategory'] = $newcategory;
                $this->view('Admin/v_adminVehicleCategories', $data);
            }
        }
    }

    public function editVehicleCategory(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $newcategory = [
                'category_id' => trim($_POST['category_id']),
                'category' => trim($_POST['category']),

                'category_err' => ''
            ];

            if(empty($newcategory['category'])){
                $newcategory['category_err'] = 'Enter category name';
            }

            if(empty($newcategory['category_err'])){
                if($this->adminModel->updateVehicleCategory($newcategory)){
                    flash('add_category_success', 'Category has been added successfully!');
                    redirect('Admin/vehicle');
                }else{
                    die('Something went wrong :(');
                    redirect('Admin/vehicle');
                }
            }else{
                $data['newCategory'] = $newcategory;
                $this->view('Admin/v_adminBlog', $data);
            }
        }
    }

    public function deleteVehicleCategory(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if($this->adminModel->deleteVehicleCategory(trim($_POST['category_id']))){
                redirect('Admin/vehicle');
            }else{
                die('Something went wrong :(');
                redirect('Admin/vehicle');
            }
        }
    }



    // Manage Delivery Fee Rates

    public function deliveryFees(){
        $data['deliveryZones'] = $this->adminModel->getDeliveryZones();
        $this->view('Admin/v_adminDeliveryFeeRates', $data);
    }

    public function editDeliveryFeeRates(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $deliveryZone = [
                'baseFee' => trim($_POST['baseFee']),
                'weightFee' => trim($_POST['weightFee']),
                'zoneID' => trim($_POST['zoneID']),

                'baseFee_err' => '',
                'weightFee_err' => ''
            ];

            if(empty($deliveryZone['baseFee'])){
                $deliveryZone['baseFee_err'] = 'Base fee cannot be empty';
            }

            if(empty($deliveryZone['weightFee'])){
                $deliveryZone['weightFee_err'] = 'Weight fee cannot be empty';
            }

            // if($deliveryZone['baseFee'] < 0){
            //     $deliveryZone['baseFee_err'] = 'Base fee must be a positive value';
            // }

            // if($deliveryZone['weightFee'] < 0){
            //     $deliveryZone['baseFee_err'] = 'Weight fee must be a positive value';
            // }

            if(empty($deliveryZone['baseFee_err']) && empty($deliveryZone['weightFee_err']) && $deliveryZone['baseFee'] >= 0 && $deliveryZone['weightFee'] >= 0){
                if($this->adminModel->updateDeliveryZone($deliveryZone)){
                    flash('add_category_success', 'Category has been added successfully!');
                    redirect('Admin/deliveryFees');
                }else{
                    die('Something went wrong :(');
                    redirect('Admin/deliveryFees');
                }
            }else{
                $data['deliveryZone'] = $deliveryZone;
                // $this->view('Admin/v_adminBlog', $data);
                redirect('Admin/deliveryFees');
            }
        }
    }

}