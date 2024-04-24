<?php
class M_plan{
private $db;
public function __construct(){
    $this->db=new Database();
}

public function user_details($seller_ID){
    $this->db->query("SELECT * FROM reg_seller WHERE U_Id = :seller_ID");
    $this->db->bind(':seller_ID', $seller_ID);
    $result=$this->db->resultSet();
    // print_r($result);
    return $result;
}

public function getlisting_count(){
    $this->db->query("SELECT list_count FROM reg_seller WHERE reg_seller.U_Id=:user_ID");
    $this->db->bind(':user_ID', $_SESSION['user_ID']);
    $result=$this->db->resultSet();
    // print_r($result);
    return $result;
}

public function get_dataplan1(){
    $this->db->query("SELECT * FROM plandetails WHERE plandetails.plan_id=:plan_Id ");
    // $this->db->bind(':plan_id', 1);
    $this->db->bind(':plan_Id',$_GET['id']);
    // print_r($_GET['id']);
    $result=$this->db->resultSet();
    // $this->db->execute();
    // print_r($result);
    return $result;
    
    // exit();


}
public function get_dataplan2(){
    $this->db->query("SELECT * FROM plandetails WHERE plandetails.plan_id=:plan_Id ");
    // $this->db->bind(':plan_id', 1);
    $this->db->bind(':plan_Id',$_GET['id']+1);
    // print_r($_GET['id']);
    $result=$this->db->resultSet();
    $this->db->execute();
    // print_r($result);
    return $result;
    
    // exit();


}
public function get_dataplan3(){
    $this->db->query("SELECT * FROM plandetails  ");
  
    $result=$this->db->resultSet();
    // $this->db->execute();
    // print_r($result);
    return $result;
    
    // exit();


}
// table -parameter
public function get_dataplan( $U_Id) {
    $this->db->query("SELECT * FROM reg_seller WHERE  U_Id = :U_Id");
    // $this->db->bind(':plan_id', $plan_id);
    $this->db->bind(':U_Id', $U_Id);
    $result = $this->db->resultSet();
    
    return $result;
}


public function get_income($U_Id){
    $this->db->query("SELECT * FROM order_charging_details WHERE seller_ID = :U_Id AND order_charging_details.PaymentStatus = 'Unsettled'");
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
   
    $this->db->query("UPDATE reg_seller SET list_count = (SELECT listing_limit FROM plandetails WHERE plan_id = :plan_id), plan_id = :plan_id, Register_date = NOW() WHERE U_Id = (SELECT U_Id FROM user WHERE email = :email)");
    $this->db->bind(':plan_id', $_GET['id']);
    $this->db->bind(':email', $_SESSION['user_email1']);
    // print_r($_SESSION['user_email1']);
    $this->db->execute();
    // print_r("xjx");
    return true;

}
public function update_user_plan1(){
   
    $this->db->query("UPDATE reg_seller SET list_count = (SELECT listing_limit FROM plandetails WHERE plan_id = :plan_id), plan_id = :plan_id, Register_date = NOW() WHERE reg_seller.U_Id = :user_ID");
    $this->db->bind(':plan_id', $_GET['id']);
    $this->db->bind(':user_ID', $_SESSION['user_ID']);
    // print_r($_SESSION['user_ID']);
    $this->db->execute();
    // print_r("xjx");
    return true;

}

public function update_user_plan2(){
   
    $this->db->query("UPDATE reg_seller SET list_count = (SELECT listing_limit FROM plandetails WHERE plan_id = :plan_id), plan_id = :plan_id, Register_date = NOW() WHERE reg_seller.U_Id = :user_ID");
    $this->db->bind(':plan_id', $_GET['id']);
    $this->db->bind(':user_ID', $_SESSION['user_ID']);
    // print_r($_SESSION['user_ID']);
    $this->db->execute();
    // print_r("xjx");
    return true;

}

public function get_planid1(){
    $this->db->query("SELECT * FROM reg_seller WHERE reg_seller.U_Id=:user_ID");
    $this->db->bind(':user_ID', $_SESSION['user_ID']);
    $result=$this->db->resultSet();
    return $result;
}


// AFTER CHOSSE A PLAN 
public function update_plan($newlisting_count, $newplan_id){
    $this ->db->query("UPDATE reg_seller SET list_count = :newlisting_count, plan_id = :newplan_id, Register_date = NOW() WHERE reg_seller.U_Id = :user_ID");

    $this->db->bind(':user_ID', $_SESSION['user_ID']);
    $this->db->bind(':newlisting_count', $newlisting_count);
    $this->db->bind(':newplan_id', $newplan_id);

    $result=$this->db->resultSet();
    return $result;
}

public function getcurrent_plan_details($id){

    $this->db->query("SELECT * FROM plandetails WHERE plandetails.plan_id=:id");
    $this->db->bind(':id', $id);
    $result=$this->db->resultSet();
    return $result;
}
public function getcurrent_listing_details($id){
    $this->db->query("SELECT * FROM reg_seller WHERE reg_seller.U_Id=:id");
    $this->db->bind(':id', $id);
    $result=$this->db->resultSet();
    return $result;
}

public function  getnew_listing_details(){

    $this->db->query("SELECT * FROM plandetails WHERE plandetails.plan_id=:plan_id");
    $this->db->bind(':plan_id', $_GET['id']);
    $result=$this->db->resultSet();
    return $result;

}

public function get_update_plan_details(){

     $this->db->query("SELECT * FROM reg_seller WHERE reg_seller.U_Id=:user_ID");
    $this->db->bind(':user_ID', $_SESSION['user_ID']);
    
    $result=$this->db->resultSet();
    return $result;
}

public function update_premium_plan($newplan_id) {
    $this->db->query("UPDATE reg_seller SET list_count = 'Unlimited', plan_id = :newplan_id, Register_date = NOW() WHERE U_Id = :user_ID");

    $this->db->bind(':user_ID', $_SESSION['user_ID']);
    $this->db->bind(':newplan_id', $newplan_id);

    $this->db->execute();

    return $this->db->rowCount();
}



} 