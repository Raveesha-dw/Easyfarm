<?php

class M_agriInstructor{
    private $db;
    
    public function __construct(){
        $this->db = new Database();
        //$this->getAllPosts();
    }

    public function getAllPosts(){
        $this->db->query("SELECT * FROM blog_post");
        $this->db->execute();
        $result = $this->db->resultSet();
        //print_r($result);
        return $result;
    }

    public function getPostById($id){
        $this->db->query("SELECT * FROM blog_post WHERE post_id = :id");
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }

    public function getPostsByAuthor($author_id){
        $this->db->query("SELECT * FROM blog_post WHERE author_id = :author_id");
        $this->db->bind(':author_id', $author_id);
        $result = $this->db->resultSet();
        return $result;
    }

    public function getCategories(){
        $this->db->query("SELECT * FROM blog_category");
        $categories = $this->db->resultSet();
        return $categories;
    }

    public function insertPost($data){
        $this->db->query("INSERT INTO blog_post(title, content, category, image, author_id, date_published) VALUES (:title, :content, :category, :image, :author, :date_published)");
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':author', $data['author']);
        $this->db->bind(':date_published', $data['date_published']);
        $this->db->execute();
        return true;
    }

    public function updatePost($data){
        $this->db->query("UPDATE blog_post SET title = :title, content = :content, date_updated = :date_updated WHERE post_id = :post_id");
        $this->db->bind(':post_id', $data['post_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);
        //$this->db->bind(':image', $data['image']);
        $this->db->bind(':date_updated', $data['date_updated']);
        $this->db->execute();
        return true;
    }

    public function deletePost($id){
        $this->db->query("DELETE FROM blog_post WHERE post_id = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
        return true;
    }
}