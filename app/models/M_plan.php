<?php
class M_plan{
private $db;
public function __construct(){
    $this->db=new Database();
}

// public function get_dataplan($plan_id,){
//     $this->db->query("SELECT * FROM reg_seller WHERE plan_id = :plan_id");
//     $this->db->bind(':plan_id', $plan_id);
//     $result=$this->db->resultSet();
//     // print_r($result);
//     return $result;
    
//     // exit();


// }

public function get_dataplan1(){
    $this->db->query("SELECT * FROM plandetails ");
    // $this->db->bind(':plan_id', 1);
    // $this->db->bind(':Item_Id',$_GET['id']);
    // print_r($_GET['id']);
    $result=$this->db->resultSet();
    // $this->db->execute();
    // print_r($result);
    return $result;
    
    // exit();


}
// table -parameter
public function get_dataplan($plan_id, $U_Id) {
    $this->db->query("SELECT * FROM reg_seller WHERE plan_id = :plan_id AND U_Id = :U_Id");
    $this->db->bind(':plan_id', $plan_id);
    $this->db->bind(':U_Id', $U_Id);
    $result = $this->db->resultSet();
    
    return $result;
}

public function get_userdetails($user_email){
    $this->db->query("SELECT * FROM reg_seller INNER JOIN user on reg_seller.U_Id = user.U_Id WHERE user.Email=:user_email");
    $this->db->bind(':user_email', $user_email);
    $result = $this->db->resultSet();
    return $result;

}

public function update_user_plan(){
   
    $this->db->query("UPDATE reg_seller SET list_count = 0, plan_id = :plan_id, Register_date = NOW() WHERE U_Id = (SELECT U_Id FROM user WHERE email = :email)");
    $this->db->bind(':plan_id', $_GET['id']);
    $this->db->bind(':email', $_SESSION['user_email1']);
    $this->db->execute();
    // print_r("xjx");
    return true;

}



} 