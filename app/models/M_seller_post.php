<?php
class M_seller_post{
private $db;
public function __construct(){
    $this->db=new Database();
}

public function get_dataplan3(){
    
    $this->db->query("SELECT * FROM plandetails  ");
  
    $result=$this->db->resultSet();
    // $this->db->execute();
    // print_r($result);
    return $result;
    
    // exit();


}

public function get_category(){
    $this->db->query("SELECT * FROM category  ");
  
    $result=$this->db->resultSet();
    // $this->db->execute();
    // print_r($result);
    return $result;
}

public function user_details($seller_ID){
    $this->db->query("SELECT * FROM reg_seller WHERE U_Id = :seller_ID");
    $this->db->bind(':seller_ID', $seller_ID);
    $result=$this->db->resultSet();
    // print_r($result);
    return $result;
}

public function create_post($data){
    $this->db->query('INSERT INTO item (Item_name, Category, Expiry_date, Unit_price, Stock_size, DeliveryMethod, Description, Unit_type, Unit_size, Image, seller_ID) VALUES (:Item_name, :Category, :Expiry_date, :Unit_price, :Stock_size, :DeliveryMethod, :Description, :Unit_type, :Unit_size, :Image, :seller_ID)');
    
    $this->db->bind(':Item_name', $data['Item_name']); 
    $this->db->bind(':Category', $data['Category']); 
    $this->db->bind(':Expiry_date', $data['Expiry_date']); 
    $this->db->bind(':Unit_price', $data['Unit_price']); 
    $this->db->bind(':Stock_size', $data['Stock_size']); 
    $this->db->bind(':DeliveryMethod', $data['DeliveryMethod']); 
    $this->db->bind(':Description', $data['Description']); 
    $this->db->bind(':Unit_type', $data['Unit_type']); 
    $this->db->bind(':Unit_size', $data['Unit_size']); 
    $this->db->bind(':Image', $data['Image_name']); 
    $this->db->bind(':seller_ID', $_SESSION['user_ID']);

    $this->db->execute();
    return true;
}


// public function get_data($seller_ID){
//     $this->db->query("SELECT * FROM item WHERE seller_ID = :seller_ID");
//     $this->db->bind(':seller_ID', $seller_ID);
//     $result=$this->db->resultSet();
//     // print_r($result);
//     return $result;
    
//     // exit();


// }

public function get_data($seller_ID){
    $this->db->query("SELECT i.* FROM item i LEFT JOIN orders o ON i.Item_Id = o.Item_ID AND o.seller_ID = :seller_ID WHERE o.Item_ID IS NULL AND i.seller_ID = :seller_ID");
    $this->db->bind(':seller_ID', $seller_ID);
    $result = $this->db->resultSet();
    return $result;
}





public function getiteamdeatils(){
    
    $this->db->query("SELECT * FROM item WHERE Item_Id = :Item_Id");
    $this->db->bind(':Item_Id',$_GET['id']);
    $result=$this->db->resultSet();
    return $result;
    // return $this->db->single();
    
}

// assign the variable mean bind

public function update_data($data){
    // print_r($data);
    // print_r("kkd");
    $this->db->query('UPDATE item
    SET Item_name = :Item_name,
        Category = :Category,
        Expiry_date = :Expiry_date,
        Unit_price = :Unit_price,
        -- column name= variable
        Stock_size = :Stock_size,
        DeliveryMethod = :DeliveryMethod,
        Image = :Image_name,
        Description = :Description
        -- Unit_type = :Unit_type
        -- 
       

    WHERE 	
        Item_Id = :item_id');
    //   $this->db->bind(':item_id', $data['id']);
    //   $this->db->bind(':seller_ID', '59');
     $this->db->bind(':Item_name', $data['Item_name']); 
    //  variable,data(otherside)
     $this->db->bind(':Category', $data['Category']); 
     $this->db->bind(':Expiry_date', $data['Expiry_date']); 
     $this->db->bind(':Unit_price', $data['Unit_price']); 
     $this->db->bind(':Stock_size', $data['Stock_size']); 
     $this->db->bind(':DeliveryMethod', $data['DeliveryMethod']); 
     $this->db->bind(':Description', $data['Description']); 
     $this->db->bind(':item_id', $data['Item_Id']);
     $this->db->bind(':Image_name', $data['Image_name']);
     
     $this->db->execute();
     return true;
    //  print_r("xxxx");
    //  $this->db->bind(':Unit_type', $data['Unit_type']); 
    
    //  if (isset($data['Image']['name']) && !empty($data['Image']['name'])) {
    //     $this->db->bind(':Image_name', $data['Image_name']);
    // } else {
    //     $this->db->bind(':Image_name', '');  // or provide a default value
    // }
   
    
    //
    //  $this->db->bind(':Image', $data['Image_name']);  
    // $this->db->bind(':Item_Id', $data); 
    // $this->db->execute();
    // print_r($data);
    // exit;
    // print_r($result);
    // exit();


}
public function delete_data($data){
    $this->db->query("DELETE FROM item WHERE Item_Id = :Item_Id");
    $this->db->bind(':Item_Id', $data);
    $this->db->execute();
}

public function get_planid(){
    $this->db->query("SELECT * FROM reg_seller WHERE reg_seller.U_Id=:user_ID");
    $this->db->bind(':user_ID', $_SESSION['user_ID']);
    $result=$this->db->resultSet();
    return $result;
}

public function update_listing(){
    $this->db->query("UPDATE reg_seller SET list_count = list_count - 1 WHERE U_Id = :user_ID");
    $this->db->bind(':user_ID', $_SESSION['user_ID']);
    $this->db->execute();
    return true;
}

public function getlisting_count(){
    $this->db->query("SELECT list_count FROM reg_seller WHERE reg_seller.U_Id=:user_ID");
    $this->db->bind(':user_ID', $_SESSION['user_ID']);
    $result=$this->db->resultSet();
    return $result;
}

}