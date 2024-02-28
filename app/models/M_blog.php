<?php

class M_blog{
    private $db;
    
    public function __construct(){
        $this->db = new Database();
    }

    public function getAllPosts(){
        $this->db->query("SELECT * FROM blog_post");
        $posts = $this->db->resultSet();
        return $posts;
    }

    public function getPostById($id){
        $this->db->query("SELECT * FROM blog_post WHERE post_id = :id");
        $this->db->bind(':id', $id);
        $post = $this->db->single();
        return $post;
    }

    public function getPostsByCategory($category){
        $this->db->query("SELECT * FROM blog_post WHERE category = :category");
        $this->db->bind(':category', $category);
        $posts = $this->db->resultSet();
        return $posts;
    }

    public function getCategories(){
        $this->db->query("SELECT * FROM blog_category");
        $categories = $this->db->resultSet();
        return $categories;
    }

    public function getUserType($user_id){
        $this->db->query("SELECT User_type FROM user WHERE U_Id = :user_id");
        $this->db->bind(':user_id', $user_id);
        $userType = $this->db->single()->User_type;
        return $userType;
    }

    // public function getUserName($user_id, $userType){
    //     switch($userType){
    //         case 'Buyer':
    //             $query = "SELECT Name FROM reg_buyer WHERE U_Id = :user_id";
    //             break;
    //         case 'AgriExpert':
    //             $query = "SELECT Name FROM reg_agriexpert WHERE U_Id = :user_id";
    //             break;
    //         default:
    //             die('This user is not allowed for commenting');
    //             break;
    //     }

    //     $this->db->query($query);
    //     $this->db->bind(':user_id', $user_id);
    //     $userName = $this->db->single()->Name;
    //     return $userName;
    // }
    
    public function addComment($data){
        $this->db->query("INSERT INTO blog_comment(user_id, post_id, datetime_posted, comment) VALUES (:user_id, :post_id, :datetime_posted, :comment)");
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':post_id', $data['post_id']);
        $this->db->bind(':datetime_posted', $data['datetime_posted']);
        $this->db->bind(':comment', $data['comment']);
        $this->db->execute();
        return true;
    }
    
    public function getComments($post_id){
        $this->db->query("SELECT * FROM blog_comment WHERE post_id = :post_id");
        $this->db->bind(':post_id', $post_id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function editComment($data){
        $this->db->query("UPDATE blog_comment SET comment = :comment, datetime_last_edited = :datetime_last_edited WHERE comment_id = :comment_id");
        $this->db->bind(':comment_id', $data['comment_id']);
        $this->db->bind(':datetime_last_edited', $data['datetime_last_edited']);
        $this->db->bind(':comment', $data['comment']);
        $this->db->execute();
        return true;
    }

    public function deleteComment($comment_id){
        $this->db->query("DELETE FROM blog_comment WHERE comment_id = :comment_id");
        $this->db->bind(':comment_id', $comment_id);
        $this->db->execute();
        return true;
    }

    // public function getUserType($user_id){ 
    //     $this->db->query("SELECT User_type FROM user WHERE U_Id = :user_id");
    //     $this->db->bind(':user_id', $user_id);
    //     $userType = $this->db->single()->User_type;
    //     return $userType;
    // }

    public function getUserName($user_id, $userType){
        switch($userType){
            case 'Buyer':
                $query = "SELECT Name FROM reg_buyer WHERE U_Id = :user_id";
                break;
            default:
                die('This user is not allowed to ask questions');
                break;
        }

        $this->db->query($query);
        $this->db->bind(':user_id', $user_id);
        $userName = $this->db->single()->Name;
        return $userName;
    }

    public function getQuestions($product_id){
        $this->db->query("SELECT * FROM blog_comments WHERE product_id = :product_id");
        $this->db->bind(':product_id', $product_id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function addQuestion($data){
        $this->db->query("INSERT INTO blog_comments(user_id, product_id, datetime_posted, question) VALUES (:user_id, :product_id, :datetime_posted, :question)");
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':product_id', $data['product_id']);
        $this->db->bind(':datetime_posted', $data['datetime_posted']);
        $this->db->bind(':question', $data['question']);
        $this->db->execute();
        return true;
    }

    public function editQuestion($data){
        $this->db->query("UPDATE blog_comments SET question = :question, datetime_last_edited = :datetime_last_edited WHERE question_id = :question_id");
        $this->db->bind(':question_id', $data['question_id']);
        $this->db->bind(':datetime_last_edited', $data['datetime_last_edited']);
        $this->db->bind(':question', $data['question']);
        $this->db->execute();
        return true;
    }

    public function deleteQuestion($question_id){
        $this->db->query("DELETE FROM blog_comments WHERE question_id = :question_id");
        $this->db->bind(':question_id', $question_id);
        $this->db->execute();
        return true;
    }

    public function getAnswer($question_id){
        $this->db->query("SELECT * FROM blog_comments_answer WHERE question_id = :question_id");
        $this->db->bind(':question_id', $question_id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function addAnswer($data){
        $this->db->query("UPDATE blog_comments SET answer = :answer, answer_datetime = :answer_datetime WHERE question_id = :question_id");
        $this->db->bind(':question_id', $data['question_id']);
        $this->db->bind(':answer_datetime', $data['answer_datetime']);
        $this->db->bind(':answer', $data['answer']);
        $this->db->execute();
        return true;
    }

    public function editAnswer($data){
        $this->db->query("UPDATE blog_comments SET answer = :answer, answer_datetime_edited = :answer_datetime_edited WHERE question_id = :question_id");
        $this->db->bind(':question_id', $data['question_id']);
        $this->db->bind(':answer_datetime_edited', $data['answer_datetime_edited']);
        $this->db->bind(':answer', $data['answer']);
        $this->db->execute();
        return true;
    }

    public function deleteAnswer($question_id){
        $this->db->query("UPDATE blog_comments SET answer = :answer, answer_datetime = :answer_datetime, answer_datetime_edited = :answer_datetime_edited WHERE question_id = :question_id");
        $this->db->bind(':question_id', $question_id);
        $this->db->bind(':answer_datetime', NULL);
        $this->db->bind(':answer_datetime_edited', NULL);
        $this->db->bind(':answer', NULL);
        $this->db->execute();
        return true;
    }
}
