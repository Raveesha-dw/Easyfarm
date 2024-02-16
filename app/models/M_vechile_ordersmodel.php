<?php
class M_vechile_ordersmodel{
private $db;
public function __construct(){
    $this->db=new Database();
}

public function update_data($data) {
    // Ensure $_SESSION['user_ID'] is properly set
    if (isset($_SESSION['user_ID'])) {
        // Validate data here if needed

        // Insert query
        $this->db->query('INSERT INTO v_orders( Vechile_ID, Owner_ID, placed_Date, Buyer_ID, Status, name, location, number, Message) 
                         VALUES ( :Vechile_ID, :Owner_ID, :placed_Date, :Buyer_ID, :Status, :name, :location, :number, :Message)');

        // Bind parameters
        $this->db->bind(':Vechile_ID', $data['V_Id']);
        $this->db->bind(':Owner_ID', $data['Owner_Id']); 
        $this->db->bind(':placed_Date', date('Y-m-d')); // Set current date
        $this->db->bind(':Buyer_ID', $_SESSION['user_ID']); 
        $this->db->bind(':Status', 'PENDING'); // Set status to 'ACCEPT'
        $this->db->bind(':name', $data['name']); 
        $this->db->bind(':location', $data['location']); 
        $this->db->bind(':number', $data['number']);
        $this->db->bind(':Message', $data['Message']); 

        // Execute the query
        $this->db->execute();
    } else {
        // Handle the case where $_SESSION['user_ID'] is not set
        // You may want to log an error or handle it based on your application's logic
        echo "Error: Session user_ID is not set";
    }
}


public function getdata($V_Id){
    $this->db->query('SELECT * FROM vehicle_item WHERE vehicle_item.V_Id = :V_Id');
    $this->db->bind(':V_Id', $V_Id); 
    return $this->db->resultSet(); // Assuming resultSet() fetches multiple rows
}

public function getdate($V_Id){
    $this->db->query('SELECT date FROM vehicle_calendar WHERE vehicle_calendar.V_Id = :V_Id');
    $this->db->bind(':V_Id', $V_Id); 
    return $this->db->resultSet(); // Assuming resultSet() fetches multiple rows
    
}



}

