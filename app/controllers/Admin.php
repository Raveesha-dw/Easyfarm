<?php

class Admin extends Controller{
    private $adminModel;

    public function __construct(){
        $this->adminModel = $this->model('M_admin');
    }

    public function index(){
        header('Location: ' . URLROOT . '/Admin/agriInstructor');
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
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['id'])){
            $data = $this->adminModel->getAgriInstructorById($_GET['id']);
            $this->view('Admin/v_adminReviewAgriInstructor', $data);
        }

        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='POST'){
            if($this->adminModel->setAgriInstructorAccStatus(trim($_POST['id']), trim($_POST['accStatus']))){
                header('Location: ' . URLROOT . '/Admin/agriInstructor');
            }else{
                die('Something went wrong :(');
            }
        }
    }
}