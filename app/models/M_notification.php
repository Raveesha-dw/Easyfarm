<?php class M_notification{
        private $db;

        public function __construct(){
       $this->db=new Database();
}



public function get_notification(){
    $this->db->query("SELECT * FROM inquiry WHERE  user_id = :user_ID");

    $this->db->bind(':user_ID', $_SESSION['user_ID']);
}


}