<?php
class M_vechile_ordersmodel{
private $db;
public function __construct(){
    $this->db=new Database();
}

public function update_data($data) {

    if (isset($_SESSION['user_ID'])) {

        $this->db->query('INSERT INTO v_orders( Vechile_ID, Owner_ID, placed_Date, Buyer_ID,Total_Rental_Fee, Status, name, location, number, Message) 
                         VALUES ( :Vechile_ID, :Owner_ID, :placed_Date, :Buyer_ID,:Total_Rental_Fee, :Status, :name, :location, :number, :Message)');

        // Bind parameters
        $this->db->bind(':Vechile_ID', $data['V_Id']);
        $this->db->bind(':Owner_ID', $data['Owner_Id']); 
        $this->db->bind(':placed_Date', date('Y-m-d')); // Set current date
        $this->db->bind(':Buyer_ID', $_SESSION['user_ID']); 
        $this ->db->bind(':Total_Rental_Fee',$data['Total_Rental_Fee']);
        $this->db->bind(':Status', 'ACCEPT'); // Set status to 'ACCEPT'
        $this->db->bind(':name', $data['name']); 
        $this->db->bind(':location', $data['location']); 
        $this->db->bind(':number', $data['number']);
        $this->db->bind(':Message', $data['Message']); 
        $this->db->execute();

        
        // print_r("kk");
        $Order_ID = $this->db->lastInsertId();
        // $this->db->query('SELECT * FROM v_orders WHERE Vechile_ID = :Vechile_ID');
        // $this->db->bind(':Vechile_ID', $data['V_Id']);
        // $row=$this->db->single();
        // $Order_ID = $row->Order_ID;
        // // $this->db->execute();
        // print_r( $Order_ID);
        

        // Decode the JSON string into an array
$dates = json_decode($data['selectedDates'], true);
// $row = $this->db->single();
// $orderID = $row->Order_ID;
// print_r($row);
// Loop through the array of dates and insert each one into the database
foreach ($dates as $date) {
    // Assuming $Order_ID is defined somewhere in your code
    $this->db->query('INSERT INTO order_calander(v_id, status, date, 0rder_ID) 
                      VALUES (:Vechile_ID, :Status, :date, :Order_ID)');
    
    $this->db->bind(':Vechile_ID', $data['V_Id']);
    $this->db->bind(':date', $date);
    $this->db->bind(':Order_ID', $Order_ID);
    $this->db->bind(':Status', 'Pending');
    
    $this->db->execute();
}

            
            return true;

    } else {
        // Handle the case where $_SESSION['user_ID'] is not set
        // You may want to log an error or handle it based on your application's logic
        echo "Error: Session user_ID is not set";
    }
}



public function getunavalibale_date($V_Id){
    $this->db->query('SELECT * FROM vehicle_calendar WHERE vehicle_calendar.V_Id = :V_Id');
    $this->db->bind(':V_Id', $V_Id); 
    return $this->db->resultSet(); // Assuming resultSet() fetches multiple rows
}





public function getdata($V_Id){
    $this->db->query('SELECT * FROM vehicle_item WHERE vehicle_item.V_Id = :V_Id');
    $this->db->bind(':V_Id', $V_Id); 
    return $this->db->resultSet(); // Assuming resultSet() fetches multiple rows
}

public function getdate($V_Id){
    $this->db->query('SELECT date,Status FROM order_calander WHERE order_calander.V_Id = :V_Id AND Status = "success"');

    $this->db->bind(':V_Id', $V_Id); 
    return $this->db->resultSet(); // Assuming resultSet() fetches multiple rows
    
}


public function getdatepending($V_Id){
    $this->db->query('SELECT date,Status FROM order_calander WHERE order_calander.V_Id = :V_Id AND Status = "Pending"');

    $this->db->bind(':V_Id', $V_Id); 
    return $this->db->resultSet(); // Assuming resultSet() fetches multiple rows
    
}





 public function getplandata($owner_id){
    $this->db->query('SELECT * FROM reg_vehicleowner WHERE reg_vehicleowner.U_Id = :U_Id');
    $this->db->bind(':U_Id',$owner_id); 
    return $this->db->resultSet();
 }
 public function getplandmonth($plan_id){
    $this->db->query('SELECT * FROM v_plandetails WHERE v_plandetails.plan_id = :plan_id');
    $this->db->bind(':plan_id',$plan_id); 
   
    return $this->db->resultSet();
    
 }


 public function getbuyerdetails(){
    $this->db->query('SELECT * FROM reg_buyer WHERE reg_buyer.U_Id = :U_Id');

    $this->db->bind(':U_Id',$_SESSION['user_ID']); 
    return $this->db->resultSet();
 }


}

