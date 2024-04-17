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

    public function blog(){
        $data['blogCategories'] = $this->adminModel->getCategories();

        $newCategory = [
            'category' => '',
            'permalink' => '',

            'category_err' => '',
            'permalink_err' => ''
        ];

        $data['newCategory'] = $newCategory;
        
        $this->view('Admin/v_adminBlog', $data);
    }

    public function addcategory(){
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
            else if($this->adminModel->findCategory($newcategory['permalink'])){
                $newcategory['permalink_err'] = 'This permalink is already used';
            }
            
            if(empty($newcategory['category_err']) && empty($newcategory['permalink_err'])){
                if($this->adminModel->insertCategory($newcategory)){
                    flash('add_category_success', 'Category has been added successfully!');
                    header('Location: ' . URLROOT . '/Admin');
                }else{
                    die('Something went wrong :(');
                }
            }else{
                $data['newCategory'] = $newcategory;
                $this->view('Admin/v_adminBlog', $data);
            }
        }
    }

    public function editcategory(){
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
            else if($this->adminModel->findCategory($newcategory['permalink'])){
                $newcategory['permalink_err'] = 'This permalink is already used';
            }
            
            if(empty($newcategory['category_err']) && empty($newcategory['permalink_err'])){
                if($this->adminModel->insertCategory($newcategory)){
                    flash('add_category_success', 'Category has been added successfully!');
                    header('Location: ' . URLROOT . '/Admin');
                }else{
                    die('Something went wrong :(');
                }
            }else{
                $data['newCategory'] = $newcategory;
                $this->view('Admin/v_adminBlog', $data);
            }
        }
    }

    public function deletecategory(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if($this->adminModel->deleteCategory(trim($_POST['permalink']))){
                header('Location: ' . URLROOT . '/Admin');
            }else{
                die('Something went wrong :(');
            }
        }
    }

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

    public function settleSellerPayment(){
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='POST'){
            $sellerID = trim($_POST['sellerID']);
            $data['sellerData'] = $this->adminModel->getSellerBankInfo($sellerID);
            $this->view('Admin/v_settleSellerPayment', $data);
        }
    }
}