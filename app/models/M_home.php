<?php
class M_home{
private $db;
public function __construct(){
    $this->db=new Database();
}

// public function get_data($seller_ID){
//     $this->db->query("SELECT * FROM item WHERE seller_ID = :seller_ID");
//     $this->db->bind(':seller_ID', $seller_ID);
//     $result=$this->db->resultSet();
//     // print_r($result);
//     return $result;
// }
}

