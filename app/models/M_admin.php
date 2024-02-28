<?php

class M_admin{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getCategories(){
        $this->db->query("SELECT * FROM blog_category");
        $categories = $this->db->resultSet();
        return $categories;
    }

    public function findCategory($permalink){
        $this->db->query("SELECT * FROM blog_category WHERE permalink = :permalink");
        $this->db->bind(':permalink', $permalink);
        $result = $this->db->single();
        return $result;
    }

    public function insertCategory($data){
        $this->db->query("INSERT INTO blog_category(category, permalink) VALUES (:category, :permalink)");
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':permalink', $data['permalink']);
        $this->db->execute();
        return true;
    }

    public function deleteCategory($permalink){
        $this->db->query("DELETE FROM blog_category WHERE permalink = :permalink");
        $this->db->bind(':permalink', $permalink);
        $this->db->execute();
        return true;
    }
}