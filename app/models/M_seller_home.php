<?php
class M_seller_home{
private $db;
public function __construct(){
    $this->db=new Database();
}
// AND  orders.Status='Pending'
public function get_itemids($seller_ID){
    // colum name=variable
    $this->db->query("SELECT * FROM orders  INNER JOIN item ON orders.Item_ID =item.Item_Id 
                    INNER JOIN reg_buyer ON  orders.User_ID=reg_buyer.U_Id WHERE orders.seller_ID = :seller_ID ");
    $this->db->bind(':seller_ID', $seller_ID);
    $this->db->execute();
    //varibale= parameter
    $result=$this->db->resultSet();
    // print_r($result);
    return $result;
}
public function updateiteamdeatils(){
    
    $this->db->query("UPDATE orders SET Status ='Completed' WHERE Order_ID = :Order_ID");
    $this->db->bind(':Order_ID',$_GET['id']);
    $this->db->execute();
    $result=$this->db->resultSet();
    return $result;
    
    // print_r($_GET['id']);
    
}
// public function getorders($itemid){
//     $this->db->query("SELECT * FROM item WHERE Item_Id = :item_ID");
//     $this->db->bind(':item_ID', $itemid);
//     $this->db->execute();
//     $result=$this->db->resultSet();
//     return $result;
// }






}


