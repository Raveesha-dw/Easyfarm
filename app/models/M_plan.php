<?php
class M_plan{
private $db;
public function __construct(){
    $this->db=new Database();
}

public function get_dataplan($plan_id,){
    $this->db->query("SELECT * FROM reg_seller WHERE plan_id = :plan_id");
    $this->db->bind(':plan_id', $plan_id);
    $result=$this->db->resultSet();
    // print_r($result);
    return $result;
    
    // exit();


}

public function get_dataplan1(){
    $this->db->query("SELECT * FROM plandetails");
    // $this->db->bind(':seller_ID', $seller_ID);
    $result=$this->db->resultSet();
    // print_r($result);
    return $result;
    
    // exit();


}

}