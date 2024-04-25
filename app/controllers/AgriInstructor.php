<?php

class AgriInstructor extends Controller{
    private $agriInstructorModel;

    public function __construct(){
        if(isset($_SESSION['user_ID']) && $_SESSION['user_type'] == 'AgricultureExpert'){
            switch($_SESSION['accStatus']){
                case 'Under Review':
                    print("Your account is under review. You will receive an email when your accout has been verified.");
                    redirect('Profile/viewProfile?email=' . $_SESSION['user_email']);
                    break;
                case 'Rejected':
                    print("Your registration at EasyFarm has been rejected due to missing required documents. You can register using a new email address and resubmit your information. If you have any problems, please contact our customer service representative: <email>info@easyfarm.lk</email>");
                    redirect('Profile/viewProfile?email=' . $_SESSION['user_email']);
                    break;
                case 'Verified':
                    $this->agriInstructorModel = $this->model('M_agriInstructor');
                    break;
            }    
        }else{
            redirect('Users/login');
        }
    }

    public function index(){
        redirect('/AgriInstructor/notifications');
    }

    public function createpost(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            // Get image data
            $imageData = file_get_contents($_FILES['image']['tmp_name']);
            $imageData = base64_encode($imageData); // Convert binary data to base64 for database storage

            $post = [
                'title' => trim($_POST['title']),
                'content' => trim($_POST['content']),
                'category' => trim($_POST['category']),
                'date_published' => trim($_POST['date_published']),
                'author' => trim($_POST['author']),
                'image' => $imageData,

                'title_err' => '',
                'content_err' => '',
                'category_err' => ''
            ];

            if(empty($post['title'])){
                $post['title_err'] = 'Enter a title';
            }
            if(empty($post['content'])){
                $post['content_err'] = 'Content should not be empty.';
            }

            if(empty($post['category'])){
                $post['category_err'] = 'Select a category';
            }

            if(empty($post['title_err']) && empty($post['content_err']) && empty($post['category_err'])){
                if($this->agriInstructorModel->insertPost($post)){
                    flash('post_publish_success', 'Your post has been published successfully!');
                    header('Location: ' . URLROOT . '/Blog/AgriInstructor/manageposts');
                }else{
                    die('Something went wrong :(');
                }
            }else{
                $data['post'] = $post;
                $data['categories'] = $this->agriInstructorModel->getCategories();

                $this->view('AgriInstructor/v_agriInstructorCreatePost2', $data);
            }

        }else{

            $post = [
                'title' => '',
                'content' => '',
                'category' => '',
                'date_published' => '',
                'author' => '',

                'title_err' => '',
                'content_err' => '',
                'category_err' => ''
            ];

            $data['post'] = $post;
            $data['categories'] = $this->agriInstructorModel->getCategories();

            $this->view('AgriInstructor/v_agriInstructorCreatePost2', $data);
        }
    }

    public function manageposts(){
        $posts = $this->agriInstructorModel->getPostsByAuthor($_SESSION['user_ID']);
        $this->view('AgriInstructor/v_agriInstructorManagePosts2', $posts);
    }

    public function editpost(){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $data['post'] = $this->agriInstructorModel->getPostById($_GET['id']);
            $data['categories'] = $this->agriInstructorModel->getCategories();
            
            $this->view('AgriInstructor/v_agriInstructorEditPost', $data);
        }
        
        // if($_SERVER['REQUEST_METHOD']=='POST'){
        //     $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

        //     $post_id = trim($_POST['id']);
        //     $post = $this->agriInstructorModel->getPostById($post_id);
        //     //print_r($post);

        //     $data = [
        //         'title' => trim($post['title']),
        //         'content' => trim($post['content']),
        //         'slug' => trim($post['slug']),
        //         'date_published' => trim($post['title']),
        //         'author' => trim($post['title']),
        //     ];

        //     $this->view('AgriInstructor/v_agriInstructorEditPost', $data);
    }

    public function updatepost(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            // Get image data
            // $imageData = file_get_contents($_FILES['image']['tmp_name']);
            // $imageData = base64_encode($imageData); // Convert binary data to base64 for database storage

            $data = [
                'post_id' => trim($_POST['post_id']),
                'title' => trim($_POST['title']),         
                'content' => trim($_POST['content']),
                'slug' => trim($_POST['slug']),
                'date_updated' => trim($_POST['date_updated']),
                //'image' => $imageData,

                'title_err' => '',
                'content_err' => ''
            ];

            if(empty($data['title'])){
                $data['title_err'] = 'Enter a title';
            }
            if(empty($data['content'])){
                $data['content_err'] = 'Content should not be empty.';
            }

            if(empty($data['title_err']) && empty($data['content_err'])){
                if($this->agriInstructorModel->updatePost($data)){
                    flash('post_update_success', 'Your post has been updated successfully!');
                    header('Location: ' . URLROOT . '/Blog/post?id=' . $data['post_id']);
                }else{
                    die('Something went wrong :(');
                }
            }else{
                $this->view('AgriInstructor/v_agriInstructorEditePost', $data);
            }
        }
    }

    public function deletepost(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $post = $this->agriInstructorModel->deletePost($_POST['id']);
            header('Location: ' . URLROOT . '/AgriInstructor/manageposts');
        }
    }

    public function notifications(){
        $questions = $this->agriInstructorModel->getUnansweredQuestionsByAuthor($_SESSION['user_ID']);
        $this->view('AgriInstructor/v_agriInstructorBlogNotifications', $questions);
    }
}