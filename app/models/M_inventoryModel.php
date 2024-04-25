<?php
class M_inventoryModel{
private $db;
public function __construct(){
    $this->db=new Database();
}

public function get_data($seller_ID){
    $this->db->query("SELECT Item_name,Expiry_date,Stock_size,Image,Item_Id FROM item WHERE seller_ID = :seller_ID");
    $this->db->bind(':seller_ID', $seller_ID);
    $result=$this->db->resultSet();
    // print_r($result);
    return $result;
}

public function get_oderdardata($seller_ID){

    $this->db->query("SELECT order_details.quantity , order_details.Unit_type, orders.Item_ID FROM order_details INNER JOIN orders ON order_details.Order_ID = orders.Order_ID WHERE seller_ID = :seller_ID");
    $this->db->bind(':seller_ID', $seller_ID);
    $result=$this->db->resultSet();
    // print_r($result);
    return $result;
}
}

