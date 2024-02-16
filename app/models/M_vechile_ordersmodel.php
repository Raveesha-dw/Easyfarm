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
        // print_r($data);
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
        $this->db->execute();

        
        print_r("kk");
        $this->db->query('SELECT * FROM v_orders WHERE Vechile_ID = :Vechile_ID');
        $this->db->bind(':Vechile_ID', $data['V_Id']);
        $row=$this->db->single();
        $Order_ID = $row->Order_ID;
        // $this->db->execute();
        print_r($data);
        

        // Decode the JSON string into an array
$dates = json_decode($data['selectedDates'], true);

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






        
        // Execute the query
       


        $this->db->bind(':selectedDates', $data['selectedDates']);




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

