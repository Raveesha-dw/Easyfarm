<?php
class M_product{
    private $db;

    public function __construct()
    {
        $this->db=new Database();
    }

    public function getAllCategories(){
        $this->db->query('SELECT * FROM category');
        $result = $this->db->resultSet();

        return $result;
    }

//   public function getAllFromCategory($category){
//     $this->db->query('SELECT * FROM item  
//         INNER JOIN reg_seller ON item.seller_ID = reg_seller.U_Id  
//         WHERE reg_seller.Register_date >= DATE_SUB(NOW(), INTERVAL 6 MONTH) AND item.Category = :category');
//     $this->db->bind(':category', $category);

//     return $this->db->resultSet();
// }
public function getAllFromCategory($category){
    $this->db->query('SELECT * FROM item  
        INNER JOIN reg_seller ON item.seller_ID = reg_seller.U_Id  
        WHERE 
            reg_seller.Register_date >= DATE_SUB(NOW(), INTERVAL 6 MONTH) 
            AND (item.Category = :category) 
            AND (item.Expiry_date >= NOW() OR item.Expiry_date = "0000-00-00")');
    $this->db->bind(':category', $category);

    return $this->db->resultSet();
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

    public function getSellerInfo($sellerID){
        $this->db->query('SELECT * from reg_seller WHERE U_Id= :sellerID');
        $this->db->bind(':sellerID', $sellerID);
        $sellerInfo = $this->db->single();

        return $sellerInfo;
    }


public function getAllProducts(){
    $this->db->query('
        SELECT * 
        FROM item 
        INNER JOIN reg_seller ON item.seller_ID = reg_seller.U_Id  
        WHERE 
            reg_seller.Register_date >= DATE_SUB(NOW(), INTERVAL 6 MONTH) 
            AND (item.Expiry_date >= NOW() OR item.Expiry_date = "0000-00-00")
        ORDER BY Item_Id DESC
    ');
   
    $all = $this->db->resultSet();
    return $all;
}



    public function searchForProduct($string){
        if (empty($string)) {
            return []; 
        }
        $this->db->query("SELECT * from item INNER JOIN reg_seller ON item.Seller_ID = reg_seller.U_Id WHERE reg_seller.Register_date >= DATE_SUB(NOW(), INTERVAL 6 MONTH) AND  Item_name LIKE '%$string%'");
        $searchResults = $this->db->resultSet();

        return $searchResults;
    }

    public function getTypeOfProduct($itemID){
        $this->db->query('SELECT Unit_type from item WHERE Item_Id = :itemID');
        $this->db->bind(':itemID', $itemID);
        $type = $this->db->single();

        return $type->Unit_type;

    }

}