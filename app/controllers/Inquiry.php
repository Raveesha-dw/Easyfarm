<?php

class Inquiry extends Controller{
    private $inquiryModel;

    public function __construct(){
        $this->inquiryModel = $this->model('M_inquiry');
    }

    public function askQuestion(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $data = [
                'user_id' => trim($_POST['user_id']),
                'product_id' => trim($_POST['product_id']),
                'question' => trim($_POST['question']),
                'datetime_posted' => trim($_POST['datetime_posted']),

                'question_err' => ''
            ];

            if(empty($data['question'])){
                $data['question_err'] = 'Question should not be empty.';
            }

            if(empty($data['question_err'])){
                if($this->inquiryModel->addQuestion($data)){
                    flash('question_publish_success', 'Your question has been published successfully!');
                    header('Location: ' . URLROOT . '/Product/ProductPage/' . $_POST['product_id']);
                }else{
                    die('Something went wrong :(');
                }
            }else{
                header('Location: ' . URLROOT . '/Product/ProductPage/' . $_POST['product_id']);
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
                if($this->inquiryModel->editQuestion($data)){
                    flash('question_update_success', 'Your question has been updated successfully!');
                    header('Location: ' . URLROOT . '/Product/ProductPage/' . $_POST['product_id']);
                }else{
                    die('Something went wrong :(');
                }
            }else{
                header('Location: ' . URLROOT . '/Product/ProductPage/' . $_POST['product_id']);
            }
        }
    }

    public function deleteQuestion(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if($this->inquiryModel->deleteQuestion($_POST['question_id'])){
                header('Location: ' . URLROOT . '/Product/ProductPage/' . $_POST['product_id']);
            }else{
                die('Something went wrong :( Question is not deleted.');
            }
        }
    }
}