<?php
class M_product{
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











}