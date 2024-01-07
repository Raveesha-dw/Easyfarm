<?php
class M_renter_home{
private $db;


public function __construct(){
    $this->db=new Database();
}




// AND  orders.Status='Pending'
public function get_itemids1($seller_ID){
    // colum name=variable
    $this->db->query("SELECT * FROM orders  INNER JOIN item ON orders.Item_ID =item.Item_Id 
                    INNER JOIN reg_buyer ON  orders.User_ID=reg_buyer.U_Id WHERE orders.seller_ID = :seller_ID AND orders.Status='ACCEPT'");
    $this->db->bind(':seller_ID', $seller_ID);
    $this->db->execute();
    //varibale= parameter
    $result=$this->db->resultSet();
    // print_r($result);
    return $result;
}
public function get_itemids2($seller_ID){
    // colum name=variable
    $this->db->query("SELECT * FROM orders  INNER JOIN item ON orders.Item_ID =item.Item_Id 
                    INNER JOIN reg_buyer ON  orders.User_ID=reg_buyer.U_Id WHERE orders.seller_ID = :seller_ID AND orders.Status='PENDING' ");
    $this->db->bind(':seller_ID', $seller_ID);
    $this->db->execute();
    //varibale= parameter
    $result=$this->db->resultSet();
    // print_r($result);
    return $result;
}
public function get_itemids3($seller_ID){
    // colum name=variable
    $this->db->query("SELECT * FROM orders  INNER JOIN item ON orders.Item_ID =item.Item_Id 
                    INNER JOIN reg_buyer ON  orders.User_ID=reg_buyer.U_Id WHERE orders.seller_ID = :seller_ID AND orders.Status='COMPLETED'");
    $this->db->bind(':seller_ID', $seller_ID);
    $this->db->execute();
    //varibale= parameter
    $result=$this->db->resultSet();
    // print_r($result);
    return $result;
}



public function get_itemids4($seller_ID){
    // colum name=variable
    $this->db->query("SELECT * FROM orders  INNER JOIN item ON orders.Item_ID =item.Item_Id 
                    INNER JOIN reg_buyer ON  orders.User_ID=reg_buyer.U_Id WHERE orders.seller_ID = :seller_ID AND orders.Status IN ('Cancelled', 'COMPLETED')");
    $this->db->bind(':seller_ID', $seller_ID);
    $this->db->execute();
    //varibale= parameter
    $result=$this->db->resultSet();
    // print_r($result);
    return $result;
}

// done




public function updateiteamdeatils2(){
    
    $this->db->query("UPDATE orders SET Status ='Cancelled' WHERE Order_ID = :Order_ID");
    $this->db->bind(':Order_ID',$_GET['id']);
    $this->db->execute();
    $result=$this->db->resultSet();
    return $result;
    
}


public function updateiteamdeatils1(){
    
    $this->db->query("UPDATE orders SET Status ='PENDING' WHERE Order_ID = :Order_ID");
    $this->db->bind(':Order_ID',$_GET['id']);
    $this->db->execute();
    $result=$this->db->resultSet();
    return $result;
    
}

// public function updateiteamdeatils(){
    
//     $this->db->query("UPDATE orders SET Status ='Completed' WHERE Order_ID = :Order_ID");
//     $this->db->bind(':Order_ID',$_GET['id']);
//     $this->db->execute();
//     $result=$this->db->resultSet();
//     return $result;
    
// }












// public function getorders($itemid){
//     $this->db->query("SELECT * FROM item WHERE Item_Id = :item_ID");
//     $this->db->bind(':item_ID', $itemid);
//     $this->db->execute();
//     $result=$this->db->resultSet();
//     return $result;
// }






}


