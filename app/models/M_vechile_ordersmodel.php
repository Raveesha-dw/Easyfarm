<?php
class M_vechile_ordersmodel{
private $db;
public function __construct(){
    $this->db=new Database();
}

public function update_data($data){
    $this->db->query('INSERT INTO v_orders(Order_ID, Vechile_ID, Owner_ID, placed_Date, Buyer_ID, Status, name, location, number, Message) 
                     VALUES (:Order_ID, :Vechile_ID, :Owner_ID, :placed_Date, :Buyer_ID, :Status, :name, :location, :number, :Message)');
    
    $this->db->bind(':Order_ID', $data['Order_ID']); // Assuming you have an Order_ID field
    $this->db->bind(':Vechile_ID', $data['Vechile_ID']); 
    $this->db->bind(':Owner_ID', $data['Owner_ID']); 
    $this->db->bind(':placed_Date', date('Y-m-d')); // Set current date
    $this->db->bind(':Buyer_ID', $data['Buyer_ID']); 
    $this->db->bind(':Status', 'ACCEPT'); // Set status to 'ACCEPT'
    $this->db->bind(':name', $data['name']); 
    $this->db->bind(':location', $data['location']); 
    $this->db->bind(':number', $data['number']);
    $this->db->bind(':Message', $data['Message']); 

    // Execute the query
    $this->db->execute();
}




}

