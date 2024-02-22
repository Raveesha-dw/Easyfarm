<?php

class Blog extends Controller{
    private $blogModel;

    public function __construct(){
        $this->blogModel = $this->model('M_blog');
    }

    public function index(){
        $posts = $this->blogModel->getAllPosts();
        $categories = $this->blogModel->getCategories();

        $data['posts'] = $posts;
        $data['categories'] = $categories;

        //print_r($posts);
        $this->view('Blog/v_blogHomePage', $data);
    }

    public function post(){
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='GET'){
            $post = $this->blogModel->getPostById($_GET['id']);
            $comments = $this->blogModel->getComments($_GET['id']);

            foreach ($comments as $comment):
                $user_id = $comment->user_id;
                $userType = $this->blogModel->getUserType($user_id);
                $userName = $this->blogModel->getUserName($user_id, $userType);
                $comment->userName = $userName;
            endforeach;

            $data['post'] = $post;
            $data['comments'] = $comments;

            $this->view('Blog/v_blogPost', $data);
        }
        else{
            echo '404 Not Found';
        }
    }

    public function category(){
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='GET'){

            $posts = $this->blogModel->getPostsByCategory($_GET['ctg']);
            $categories = $this->blogModel->getCategories();

            $data['posts'] = $posts;
            $data['categories'] = $categories;

            // print_r($data);

            $this->view('Blog/v_blogHomePage', $data);
        }
    }

    public function writeComment(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $data = [
                'user_id' => trim($_POST['user_id']),
                'post_id' => trim($_POST['post_id']),
                'comment' => trim($_POST['comment']),
                'datetime_posted' => trim($_POST['datetime_posted']),

                'comment_err' => ''
            ];

            if(empty($data['comment'])){
                $data['comment_err'] = 'Comment should not be empty.';
            }

            if(empty($data['comment_err'])){
                if($this->blogModel->addComment($data)){
                    flash('comment_publish_success', 'Your comment has been published successfully!');
                    header('Location: ' . URLROOT . '/Blog/post?id=' . $_POST['post_id']);
                }else{
                    die('Something went wrong :(');
                }
            }else{
                $this->view('Blog/v_blogPost', $data);
            }
        }
    }

    public function editComment(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $data = [
                'comment_id' => trim($_POST['comment_id']),
                'comment' => trim($_POST['edited_comment']),
                'datetime_last_edited' => trim($_POST['datetime']),

                'comment_err' => ''
            ];

            if(empty($data['comment'])){
                $data['comment_err'] = 'Comment should not be empty.';
            }

            if(empty($data['comment_err'])){
                if($this->blogModel->editComment($data)){
                    flash('comment_update_success', 'Your comment has been updated successfully!');
                    header('Location: ' . URLROOT . '/Blog/post?id=' . $_POST['post_id']);
                }else{
                    die('Something went wrong :(');
                }
            }else{
                $this->view('Blog/v_blogPost', $data);
            }
        }
    }

    public function deleteComment(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if($this->blogModel->deleteComment($_POST['comment_id'])){
                header('Location: ' . URLROOT . '/Blog/post?id=' . $_POST['post_id']);
            }else{
                die('Something went wrong :( Comment is not deleted.');
            }
        }
    }

    // public function posts(){
    //     if($_SERVER['REQUEST_METHOD']=='POST'){
    //         $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

    //         $data = [
    //             'id' => trim($_POST['id']),
    //             'title' => trim($_POST['title']),
    //             'content' => trim($_POST['content']),
    //             'date_published' => trim($_POST['date_published']),
    //             'image' => trim($_POST['image'])
    //         ];
            
    //         $this->view('Blog/v_blogPost', $data);
    //     }
    // }
}