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
            $post = $this->blogModel->getPostById($_GET['id']);;
            $author = $this->blogModel->getAuthor($post->author_id);
            $comments = $this->blogModel->getQuestions($_GET['id']);

            foreach ($comments as $comment):
                $user_id = $comment->user_id;
                $userType = $this->blogModel->getUserType($user_id);
                $userName = $this->blogModel->getUserName($user_id, $userType);
                $comment->userName = $userName;
            endforeach;

            $data['post'] = $post;
            $data['author'] = $author;
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

        public function askQuestion(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

                $data = [
                    'user_id' => trim($_POST['user_id']),
                    'post_id' => trim($_POST['post_id']),
                    'question' => trim($_POST['question']),
                    'datetime_posted' => trim($_POST['datetime_posted']),

                    'question_err' => ''
                ];

                if(empty($data['question'])){
                    $data['question_err'] = 'Question should not be empty.';
                }

                if(empty($data['question_err'])){
                    if($this->blogModel->addQuestion($data)){
                        flash('question_publish_success', 'Your question has been published successfully!');
                        header('Location: ' . URLROOT . '/Blog/post?id=' . $_POST['product_id']);
                    }else{
                        die('Something went wrong :(');
                    }
                }else{
                    header('Location: ' . URLROOT . '/Blog/post?id=' . $_POST['product_id']);
                }
            }
        }

    public function editQuestion(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $data = [
                'question_id' => trim($_POST['question_id']),
                'question' => trim($_POST['edited_question']),
                'datetime_last_edited' => trim($_POST['datetime']),

                'question_err' => ''
            ];

            if(empty($data['question'])){
                $data['question_err'] = 'Question should not be empty.';
            }

            if(empty($data['question_err'])){
                if($this->blogModel->editQuestion($data)){
                    flash('question_update_success', 'Your question has been updated successfully!');
                    header('Location: ' . URLROOT . '/Blog/post?id=' . $_POST['product_id']);
                }else{
                    die('Something went wrong :(');
                }
            }else{
                header('Location: ' . URLROOT . '/Blog/post?id=' . $_POST['product_id']);
            }
        }
    }

    public function deleteQuestion(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if($this->blogModel->deleteQuestion($_POST['question_id'])){
                header('Location: ' . URLROOT . '/Blog/post?id=' . $_POST['product_id']);
            }else{
                die('Something went wrong :( Question is not deleted.');
            }
        }
    }



    public function answerQuestion(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $data = [
                'question_id' => trim($_POST['question_id']),
                'answer' => trim($_POST['answer']),
                'answer_datetime' => trim($_POST['answer_datetime']),

                'answer_err' => ''
            ];

            if(empty($data['answer'])){
                $data['answer_err'] = 'Answer should not be empty.';
            }

            if(empty($data['answer_err'])){
                if($this->blogModel->addAnswer($data)){
                    flash('answer_publish_success', 'Your answer has been published successfully!');
                    // header('Location: ' . URLROOT . '/Blog/post?id=' . $_POST['product_id']);  //this is the line 233
                     
                     // Build the redirection URL without newlines
                        $id = trim($_POST['product_id']);
                        $redirectUrl = URLROOT . '/Blog' ;
                        
                        // Send the header with the constructed URL as a single string
                        header('Location: ' . $redirectUrl);
                        // header('Location: ' . URLROOT . '/Blog/post?id=' . $_POST['product_id']);
                }else{
                    die('Something went wrong :(');
                }
            }else{
                header('Location: ' . URLROOT . '/Blog/post?id=' . $_POST['product_id']);
            }
        }
    }

    public function editAnswer(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $data = [
                'question_id' => trim($_POST['question_id']),
                'answer' => trim($_POST['edited_answer']),
                'answer_datetime_edited' => trim($_POST['datetime']),

                'answer_err' => ''
            ];

            if(empty($data['answer'])){
                $data['answer_err'] = 'Answer should not be empty.';
            }

            if(empty($data['answer_err'])){
                if($this->blogModel->editAnswer($data)){
                    flash('answer_update_success', 'Your answer has been updated successfully!');
                    header('Location: ' .  URLROOT . '/Blog');
                    // header('Location: ' . URLROOT . '/Blog/post?id=' . $_POST['product_id']);
                }else{
                    die('Something went wrong :(');
                }
            }else{
                header('Location: ' . URLROOT . '/Blog/post?id=' . $_POST['product_id']);
            }
        }
    }

    public function deleteAnswer(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if($this->blogModel->deleteAnswer($_POST['question_id'])){
                header('Location: ' .  URLROOT . '/Blog');
                // header('Location: ' . URLROOT . '/Blog/post?id=' . $_POST['product_id']);
            }else{
                die('Something went wrong :( Answer is not deleted.');
            }
        }
    }
}