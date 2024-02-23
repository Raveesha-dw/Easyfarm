<?php
class M_renter_home{
private $db;


public function __construct(){
    $this->db=new Database();
}




// AND  orders.Status='Pending'
// public function get_itemids1($renter_ID){
//     // colum name=variable
//     $this->db->query("SELECT * FROM v_orders  INNER JOIN vehicle_item ON v_orders.Vechile_ID =vehicle_item.V_Id 
//                     INNER JOIN reg_buyer ON  v_orders.Buyer_ID=reg_buyer.U_Id WHERE v_orders.Owner_ID = :renter_ID AND v_orders.Status='ACCEPT'");
//     $this->db->bind(':renter_ID', $renter_ID);
//     $this->db->execute();
//     //varibale= parameter
//     $result=$this->db->resultSet();
//     // print_r($result);
//     return $result;
// }

public function get_itemids1($renter_ID){
    $this->db->query("SELECT v_orders.*, 
                            vehicle_item.*, 
                            reg_buyer.*, 
                            GROUP_CONCAT(order_calander.date) AS order_dates
                    FROM v_orders  
                    INNER JOIN vehicle_item ON v_orders.Vechile_ID = vehicle_item.V_Id 
                    INNER JOIN reg_buyer ON v_orders.Buyer_ID = reg_buyer.U_Id 
                    INNER JOIN order_calander ON v_orders.Order_ID = order_calander.0rder_ID
                    WHERE v_orders.Owner_ID = :renter_ID AND v_orders.Status='ACCEPT'
                    GROUP BY v_orders.Order_ID");
    $this->db->bind(':renter_ID', $renter_ID);
    $this->db->execute();
    $result = $this->db->resultSet();
    return $result;
}




// public function get_itemids1($renter_ID){
//     $this->db->query("SELECT DISTINCT calander_id, v_id, status, date, 0rder_ID 
//                     FROM order_calander
//                     WHERE v_id IN (
//                         SELECT Vechile_ID
//                         FROM v_orders
//                         WHERE Owner_ID = :renter_ID AND Status = 'ACCEPT'
//                     )");
//     $this->db->bind(':renter_ID', $renter_ID);
//     $this->db->execute();
//     $result = $this->db->resultSet();
//     return $result;
// }














public function get_itemids2($renter_ID){
    // colum name=variable
    $this->db->query("SELECT * FROM v_orders  INNER JOIN vehicle_item ON v_orders.Vechile_ID =vehicle_item.V_Id 
                    INNER JOIN reg_buyer ON  v_orders.Buyer_ID=reg_buyer.U_Id WHERE v_orders.Owner_ID = :renter_ID AND v_orders.Status='PENDING' ");
    $this->db->bind(':renter_ID', $renter_ID);
    $this->db->execute();
    //varibale= parameter
    $result=$this->db->resultSet();
    // print_r($result);
    return $result;
}

  
public function get_itemids3($renter_ID){
    // colum name=variable
    $this->db->query("SELECT * FROM v_orders  INNER JOIN vehicle_item ON v_orders.Vechile_ID =vehicle_item.V_Id 
                    INNER JOIN reg_buyer ON  v_orders.Buyer_ID=reg_buyer.U_Id WHERE v_orders.Owner_ID = :renter_ID AND v_orders.Status='COMPLETED' ");
    $this->db->bind(':renter_ID', $renter_ID);
    $this->db->execute();
    //varibale= parameter
    $result=$this->db->resultSet();
    // print_r($result);
    return $result;
}


public function get_itemids4($renter_ID){
    // colum name=variable
    $this->db->query("SELECT * FROM v_orders  INNER JOIN vehicle_item ON v_orders.Vechile_ID =vehicle_item.V_Id 
                    INNER JOIN reg_buyer ON  v_orders.Buyer_ID=reg_buyer.U_Id WHERE v_orders.Owner_ID = :renter_ID AND v_orders.Status IN ('Cancelled', 'COMPLETED')");
    $this->db->bind(':renter_ID', $renter_ID);
    $this->db->execute();
    //varibale= parameter
    $result=$this->db->resultSet();
    // print_r($result);
    return $result;
}

// done




public function updateiteamdeatils2(){
    
    $this->db->query("UPDATE v_orders SET Status ='Cancelled' WHERE Order_ID = :Order_ID");
    $this->db->bind(':Order_ID',$_GET['id']);
    $this->db->execute();
    $result=$this->db->resultSet();
    return $result;
    
}


public function updateiteamdeatils1(){
    
    $this->db->query("UPDATE v_orders SET Status ='PENDING' WHERE Order_ID = :Order_ID");
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


