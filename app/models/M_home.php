<?php
class M_home{
private $db;
public function __construct(){
    $this->db=new Database();
}

// public function get_data(){
//     $this->db->query("SELECT * FROM item ");
//     $result=$this->db->resultSet();
//     print_r($result);
//     return $result;
// }
}

