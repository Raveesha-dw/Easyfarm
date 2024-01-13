<?php
class M_calendar{
    private $db;

    public function __construct()
    {
        $this->db=new Database();
    }

     public function add_anavailble_Dates($data){

        $this->db->query('INSERT INTO vehicle_calendar(title, start, end) VALUES (:title, :start, :end '); 
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':start', $data['start']);
        $this->db->bind(':end', $data['end']);
        
        $this->db->execute();
        return true;
    

        
     }


     public function edit_anavailble_Dates($data){

        $this->db->query('UPDATE INTO vehicle_calendar(title, start, end) VALUES (:title, :start, :end ) WHERE (calendar_Id= :id)') ; 
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':start', $data['start']);
        $this->db->bind(':end', $data['end']);
        $this->db->bind(':id', $data['id']);
        
        $this->db->execute();
        return true;
    

        
     }

     public function delete_anavailble_Dates($data){

        $this->db->query('DELETE from vehicle_calendar WHERE (calendar_Id= :id)') ; 
        $this->db->bind(':id', $data['id']);
        
        $this->db->execute();
        return true;
    

        
     }


}