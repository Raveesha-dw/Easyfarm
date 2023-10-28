<?php
class M_product{
    private $db;

    public function __construct()
    {
        $this->db=new Database();
    }

    public function getAllVegetables(){
        $this->db->query('SELECT * FROM item WHERE Item_type="Veg"');
        $vegetables = $this->db->resultSet();

        return $vegetables;
    }

    public function getAllFruits(){
        $this->db->query('SELECT * FROM item WHERE Item_type="Fruit"');
        $fruits = $this->db->resultSet();

        return $fruits;
    }

    public function getAllGrains(){
        $this->db->query('SELECT * FROM item WHERE Item_type="Grain"');
        $grains = $this->db->resultSet();

        return $grains;
    }

    public function getAllPlantsSeeds(){
        $this->db->query('SELECT * FROM item WHERE Item_type="Plant" OR Item_type="Seed"');
        $plantseed = $this->db->resultSet();

        return $plantseed;
    }

    // public function getAllSeeds(){
    //     $this->db->query('SELECT * FROM item WHERE Item_type=Seeds');
    //     $Seeds = $this->db->resultSet();

    //     return $Seeds;
    // }

    public function getAllFertilizer(){
        $this->db->query('SELECT * FROM item WHERE Item_type="Fert"');
        $fertilizer = $this->db->resultSet();

        return $fertilizer;
    }

    public function getAllInsecticides(){
        $this->db->query('SELECT * FROM item WHERE Item_type="Insec"');
        $insecticides = $this->db->resultSet();

        return $insecticides;
    }

    public function getAllTools(){
        $this->db->query('SELECT * FROM item WHERE Item_type="Tools"');
        $tools = $this->db->resultSet();

        return $tools;
    }

    public function getProductInfo($itemID){
        $this->db->query('SELECT * FROM item WHERE Item_Id= :itemID');
        $this->db->bind(':itemID', $itemID);
        $productInfo = $this->db->single();

        return $productInfo;
    }
}