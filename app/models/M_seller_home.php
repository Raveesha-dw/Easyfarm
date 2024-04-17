<?php
class M_seller_home{
private $db;
public function __construct(){
    $this->db=new Database();
}
// AND  orders.Status='Pending'
public function get_itemids1($seller_ID){
    $this->db->query("SELECT * FROM orders  
                    INNER JOIN item ON orders.Item_ID = item.Item_Id 
                    INNER JOIN order_charging_details ON orders.Payment_Id = order_charging_details.Payment_Id
                    INNER JOIN reg_buyer ON orders.User_ID = reg_buyer.U_Id 
                    INNER JOIN order_details ON orders.Order_ID = order_details.Order_ID  
                    WHERE orders.seller_ID = :seller_ID 
                    AND order_details.Status = 'ACCEPT'");
    $this->db->bind(':seller_ID', $seller_ID);
    $this->db->execute();
    $results = $this->db->resultSet();
    
    // Group results by Payment_Id
    $grouped_results = array_reduce($results, function ($carry, $item) {
        $payment_id = $item->Payment_Id;
        if (!isset($carry[$payment_id])) {
            $carry[$payment_id] = (object) $item;
        } else {
            foreach ($item as $key => $value) {
                if (!empty($value) && is_string($value)) {
                    $carry[$payment_id]->{$key} .= ", " . $value;
                }
            }
        }
        return $carry;
    }, []);
    
    // Convert the grouped results to a simple array of objects
    $final_results = array_values($grouped_results);
    
    // Remove duplicate values from each field in the object
    $final_results = array_map([$this, 'remove_duplicate_values'], $final_results);
    
    return $final_results;
}

public function remove_duplicate_values($object) {
    $result = new stdClass();

    foreach ($object as $key => $value) {
        // Split the value by comma and remove duplicates
        $unique_values = array_unique(explode(', ', $value));
        // Join the unique values back together
        $result->{$key} = implode(', ', $unique_values);
    }

    return $result;
}



public function get_itemids2($seller_ID){
    $this->db->query("SELECT * FROM orders  
                    INNER JOIN item ON orders.Item_ID = item.Item_Id 
                    INNER JOIN order_charging_details ON orders.Payment_Id = order_charging_details.Payment_Id
                    INNER JOIN reg_buyer ON orders.User_ID = reg_buyer.U_Id 
                    INNER JOIN order_details ON orders.Order_ID = order_details.Order_ID  
                    WHERE orders.seller_ID = :seller_ID 
                    AND order_details.Status = 'PENDING'");
    $this->db->bind(':seller_ID', $seller_ID);
    $this->db->execute();
    $results = $this->db->resultSet();
    
    // Group results by Payment_Id
    $grouped_results = array_reduce($results, function ($carry, $item) {
        $payment_id = $item->Payment_Id;
        if (!isset($carry[$payment_id])) {
            $carry[$payment_id] = (object) $item;
        } else {
            foreach ($item as $key => $value) {
                if (!empty($value) && is_string($value)) {
                    $carry[$payment_id]->{$key} .= ", " . $value;
                }
            }
        }
        return $carry;
    }, []);
    
    // Convert the grouped results to a simple array of objects
    $final_results = array_values($grouped_results);
    
    // Remove duplicate values from each field in the object
    $final_results = array_map([$this, 'remove_duplicate_values'], $final_results);
    
    return $final_results;
}

// public function get_itemids2($seller_ID){
   
//     $this->db->query("SELECT * FROM orders  INNER JOIN item ON orders.Item_ID =item.Item_Id 
//                     INNER JOIN reg_buyer ON  orders.User_ID=reg_buyer.U_Id WHERE orders.seller_ID = :seller_ID AND orders.Status='PENDING' ");
//     $this->db->bind(':seller_ID', $seller_ID);
//     $this->db->execute();
   
//     $result=$this->db->resultSet();
    
//     return $result;
// }
public function get_itemids3($seller_ID){
   
    $this->db->query("SELECT * FROM orders  INNER JOIN item ON orders.Item_ID =item.Item_Id 
                    INNER JOIN reg_buyer ON  orders.User_ID=reg_buyer.U_Id WHERE orders.seller_ID = :seller_ID AND orders.Status='COMPLETED'");
    $this->db->bind(':seller_ID', $seller_ID);
    $this->db->execute();
    
    $result=$this->db->resultSet();
   ;
    return $result;
}


public function get_itemids4($seller_ID){
   
    $this->db->query("SELECT * FROM orders  
                    INNER JOIN item ON orders.Item_ID = item.Item_Id 
                    INNER JOIN order_charging_details ON orders.Payment_Id = order_charging_details.Payment_Id
                    INNER JOIN reg_buyer ON orders.User_ID = reg_buyer.U_Id 
                    INNER JOIN order_details ON orders.Order_ID = order_details.Order_ID  
                    WHERE orders.seller_ID = :seller_ID 
                    AND order_details.Status IN ('Cancelled', 'COMPLETED')");
    $this->db->bind(':seller_ID', $seller_ID);
   
    $this->db->execute();
    
    $results = $this->db->resultSet();
    
    // Group results by Payment_Id
    $grouped_results = array_reduce($results, function ($carry, $item) {
        $payment_id = $item->Payment_Id;
        if (!isset($carry[$payment_id])) {
            $carry[$payment_id] = (object) $item;
        } else {
            foreach ($item as $key => $value) {
                if (!empty($value) && is_string($value)) {
                    $carry[$payment_id]->{$key} .= ", " . $value;
                }
            }
        }
        return $carry;
    }, []);
    
    // Convert the grouped results to a simple array of objects
    $final_results = array_values($grouped_results);
    
    // Remove duplicate values from each field in the object
    $final_results = array_map([$this, 'remove_duplicate_values'], $final_results);
   
    return $final_results;
    
}




// public function get_itemids4($seller_ID){
   
//     $this->db->query("SELECT * FROM orders  INNER JOIN item ON orders.Item_ID =item.Item_Id 
//                     INNER JOIN reg_buyer ON  orders.User_ID=reg_buyer.U_Id WHERE orders.seller_ID = :seller_ID AND orders.Status IN ('Cancelled', 'COMPLETED')");
//     $this->db->bind(':seller_ID', $seller_ID);
//     $this->db->execute();
   
//     $result=$this->db->resultSet();
   
//     return $result;
// }

// done





public function updateiteamdeatils2(){
    
    $this->db->query("UPDATE order_details SET Status ='Cancelled' WHERE Order_ID = :Order_ID");
    $this->db->bind(':Order_ID',$_GET['id']);
    $this->db->execute();
    $result=$this->db->resultSet();
    return $result;
    
}


public function updateiteamdeatils1(){
    
    $this->db->query("UPDATE order_details SET Status ='PENDING' WHERE Order_ID = :Order_ID");
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


