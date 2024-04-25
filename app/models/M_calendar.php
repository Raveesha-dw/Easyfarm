<?php
class M_calendar{
    private $db;

    public function __construct()
    {
        $this->db=new Database();
    }

     public function add_anavailble_Dates($data){
//  var_dump($data['start']);
        $this->db->query('INSERT INTO vehicle_calendar(title, start, end, V_Id) VALUES (:title, :start, :end ,:V_Id)'); 
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':start', $data['start']);
        $this->db->bind(':end', $data['end']);



        // $this->db->bind(':title', "jahsud");
        // $this->db->bind(':start',"2024-05-10 00:07:00");
        // $this->db->bind(':end', "2024-05-20 00:07:00");
        $this->db->bind(':V_Id', 22);
      //   print_r($data['title']);
      //    print_r($data['start']);
      //    print_r($data['end']);
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
      //   print_r("oooooo");
        $this->db->execute();
      //   print_r("pppp");
        return true;
    

        
     }

     public function fetch_anavailble_Dates($data){

        $this->db->query('SELECT * from vehicle_calendar WHERE (calendar_Id= :id)') ; 
        $this->db->bind(':id', $data['id']);
        
        $this->db->execute();
        $rows=$this->db->resultSet();     
        return $rows;
    

        
     }


}