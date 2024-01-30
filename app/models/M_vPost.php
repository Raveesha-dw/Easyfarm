<?php
class M_vPost{
private $db;
public function __construct(){
    $this->db=new Database();
}


public function create_post($data){
    print_r($data);
    $this->db->query('INSERT INTO vehicle_item(V_category,V_name,V_number,Contact_Number,Rental_Fee,Charging_Unit,Address,Description,Image,Owner_Id) VALUES(:V_category,:V_name,:V_number, :Contact_Number, :Rental_Fee, :Charging_Unit, :Address, :Description,:Image, :Owner_Id)');
    
    $this->db->bind(':V_category', $data['V_category']); 
    $this->db->bind(':V_name', $data['V_name']); 
    $this->db->bind(':V_number', $data['V_number']); 
    $this->db->bind(':Contact_Number', $data['Contact_Number']); 
    $this->db->bind(':Rental_Fee', $data['Rental_Fee']); 
    $this->db->bind(':Charging_Unit', $data['Charging_Unit']); 
    // $this->db->bind(':Calender', $data['Calender']); 
    $this->db->bind(':Address', $data['Address']); 
    $this->db->bind(':Description', $data['Description']); 
    $this->db->bind(':Image', $data['Image_name']); 
    $this->db->bind(':Owner_Id', $data['Owner_Id']); 
    $this->db->execute();

    $this->db->query('SELECT * FROM vehicle_item WHERE V_number= :V_number');
    $this->db->bind(':V_number',$data['V_number']);  

    $row=$this->db->single();
            
    $V_Id = $row->V_Id;;

    $this->db->query('INSERT INTO vehicle_calendar(title, start, end, V_Id) VALUES (:title, :start, :end ,:V_Id)'); 
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':start', $data['start']);
    $this->db->bind(':end', $data['end']);
    $this->db->bind(':V_Id', $V_Id);    
    $this->db->execute();

    return true;

}

public function get_data($Owner_Id){
    $this->db->query("SELECT * FROM vehicle_item WHERE Owner_Id = :Owner_Id");
    $this->db->bind(':Owner_Id', $Owner_Id);
    $result=$this->db->resultSet();
    // print_r($result);
    return $result;
    
    // exit();


}

public function getiteamdeatils(){
    
    $this->db->query("SELECT * FROM vehicle_item WHERE V_Id = :V_Id");
    $this->db->bind(':V_Id',$_GET['V_Id']);
    $result=$this->db->resultSet();
    return $result;
    // return $this->db->single();
    
}

// assign the variable mean bind

public function update_data($data){
    // print_r($data);
    // print_r("kkd");
    $this->db->query('UPDATE vehicle_item
    SET V_name = :V_name,
        V_category = :V_category,
        V_number = :V_number,
        Contact_Number = :Contact_Number,
        -- column name= variable
        Rental_Fee = :Rental_Fee,
        Charging_Unit = :Charging_Unit,
        Calender = :Calender,
        Address = :Address,
        Description = :Description,
        Image = :Image_name,
       

    WHERE 	
        V_Id = :V_Id');
    //   $this->db->bind(':item_id', $data['id']);
    //   $this->db->bind(':seller_ID', '59');
     $this->db->bind(':V_name', $data['V_name']); 
    //  variable,data(otherside)
     $this->db->bind(':V_category', $data['V_category']); 
     $this->db->bind(':V_number', $data['V_number']); 
     $this->db->bind(':Contact_Number', $data['Contact_Number']); 
     $this->db->bind(':Rental_Fee', $data['Rental_Fee']); 
     $this->db->bind(':Charging_Unit', $data['Charging_Unit']); 
     $this->db->bind(':Calender', $data['Calender']); 
     $this->db->bind(':Address', $data['Address']);
     $this->db->bind(':Description', $data['Description']);
     $this->db->bind(':Image_name', $data['Image_name']);
     
     $this->db->execute();
     return true;
    //  $this->db->bind(':Unit_type', $data['Unit_type']); 
    
    //  if (isset($data['Image']['name']) && !empty($data['Image']['name'])) {
    //     $this->db->bind(':Image_name', $data['Image_name']);
    // } else {
    //     $this->db->bind(':Image_name', '');  // or provide a default value
    // }
   
    
    //
    //  $this->db->bind(':Image', $data['Image_name']);  
    // $this->db->bind(':Item_Id', $data); 
    // $this->db->execute();
    // print_r($data);
    // exit;
    // print_r($result);
    // exit();


}
public function delete_data($data){
    $this->db->query("DELETE FROM vehicle_item WHERE V_Id = :V_Id");
    $this->db->bind(':V_Id', $data);
    $this->db->execute();
}




public function get_category(){
    $this->db->query("SELECT * FROM vehicle_item_category");
    $result=$this->db->resultSet();
    return $result;
}




}