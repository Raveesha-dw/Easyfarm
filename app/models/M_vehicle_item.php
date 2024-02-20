<?php
class M_vehicle_item{
    private $db;

    public function __construct()
    {
        $this->db=new Database();
    }


    public function get_category(){
        $this->db->query("SELECT * FROM vehicle_item_category");
        $result=$this->db->resultSet();
        return $result;
    }
    public function get_Categorized_items(){
        $this->db->query('SELECT * FROM vehicle_item WHERE V_category=:V_category');
        $this->db->bind(':V_category', $_GET['Category_name']);
        $Categorized_items = $this->db->resultSet();
        return $Categorized_items;
    }










}