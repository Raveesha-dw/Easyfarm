<?php

class M_agriInstructor{
    private $db;
    
    public function __construct(){
        $this->db = new Database();
        //$this->getAllPosts();
    }

    public function getAllPosts(){
        $this->db->query("SELECT * FROM blog_posts");
        $this->db->execute();
        $result = $this->db->resultSet();
        //print_r($result);
        return $result;
    }

    public function getPostById($id){
        $this->db->query("SELECT * FROM blog_posts WHERE post_id = :id");
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }

    public function getPostsByAuthor($author_id){
        $this->db->query("SELECT * FROM blog_posts WHERE author_id = :author_id");
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
        $this->db->query("INSERT INTO blog_posts(title, content, category, image, author_id, slug, date_published) VALUES (:title, :content, :category, :image, :author, :slug, :date_published)");
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':author', $data['author']);
        $this->db->bind(':slug', $data['slug']);
        $this->db->bind(':date_published', $data['date_published']);
        $this->db->execute();
        return true;
    }

    public function updatePost($data){
        $this->db->query("UPDATE blog_posts SET title = :title, content = :content, slug = :slug, date_updated = :date_updated WHERE post_id = :post_id");
        $this->db->bind(':post_id', $data['post_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);
        //$this->db->bind(':image', $data['image']);
        $this->db->bind(':slug', $data['slug']);
        $this->db->bind(':date_updated', $data['date_updated']);
        $this->db->execute();
        return true;
    }

    public function deletePost($id){
        $this->db->query("DELETE FROM blog_posts WHERE post_id = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
        return true;
    }
}