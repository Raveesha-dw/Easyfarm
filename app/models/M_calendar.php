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

}