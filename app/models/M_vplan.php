<?php
class M_vplan{
private $db;
public function __construct(){
    $this->db=new Database();

}



public function get_plan_details1(){
        $this->db->query("SELECT * FROM v_plandetails");
      
        $result=$this->db->resultSet();
        // $this->db->execute();
        // print_r($result);
        return $result;
        
        // exit();
    
    
 }


 public function get_dataplan1(){
    $this->db->query("SELECT * FROM v_plandetails WHERE v_plandetails.plan_id=:plan_Id ");
    // $this->db->bind(':plan_id', 1);
    $this->db->bind(':plan_Id',$_GET['id']);
    // print_r($_GET['id']);
    $result=$this->db->resultSet();
    // $this->db->execute();
    // print_r($result);
    return $result;
    
    // exit();


}

public function get_userdetails($user_email){
    $this->db->query("SELECT * FROM reg_vehicleowner INNER JOIN user on reg_vehicleowner.U_Id = user.U_Id WHERE user.Email=:user_email");
    $this->db->bind(':user_email', $user_email);
    $result = $this->db->resultSet();
    // print_r($user_email);
    return $result;

}

// register with plan
public function update_user_plan(){
   
    $this->db->query("UPDATE reg_vehicleowner SET list_count = (SELECT listing_limit FROM v_plandetails WHERE plan_id = :plan_id), plan_id = :plan_id, Register_date = NOW() WHERE U_Id = (SELECT U_Id FROM user WHERE email = :email)");
    $this->db->bind(':plan_id', $_GET['id']);
    $this->db->bind(':email', $_SESSION['user_email1']);
    // print_r($_SESSION['user_email1']);
    $this->db->execute();
    // print_r("xjx");
    return true;

}






}