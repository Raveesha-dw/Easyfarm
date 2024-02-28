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

    public function getUserName($user_id, $userType){
        switch($userType){
            case 'Buyer':
                $query = "SELECT Name FROM reg_buyer WHERE U_Id = :user_id";
                break;
            case 'AgriExpert':
                $query = "SELECT Name FROM reg_agriexpert WHERE U_Id = :user_id";
                break;
            default:
                die('This user is not allowed for commenting');
                break;
        }

        $this->db->query($query);
        $this->db->bind(':user_id', $user_id);
        $userName = $this->db->single()->Name;
        return $userName;
    }
    
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
}