<?php
class M_plan{
private $db;
public function __construct(){
    $this->db=new Database();
}

public function get_dataplan($seller_ID){
    $this->db->query("SELECT * FROM plan WHERE seller_ID = :seller_ID");
    $this->db->bind(':seller_ID', $seller_ID);
    $result=$this->db->resultSet();
    // print_r($result);
    return $result;
    
    // exit();


}

}