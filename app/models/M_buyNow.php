<?php
class M_buyNow{
    private $db;

    public function __construct()
    {
        $this->db=new Database();
    }

    public function getUserDetails($data){

        $this->db->query('SELECT user.Email,reg_buyer.Name, reg_buyer.Contact_num , reg_buyer.Address FROM user JOIN reg_buyer ON user.U_Id = reg_buyer.U_Id WHERE user.U_Id = :U_Id') ;
        $this->db->bind(':U_Id', $data['U_Id']);
        $this->db->execute();
            
        $row=$this->db->single();


        return $row;


    }

    public function getItemDetais($data){

        $this->db->query('SELECT Item_name,DeliveryMethod,Unit_price  FROM item WHERE item.Item_Id = :Item_Id') ;
        $this->db->bind(':Item_Id', $data['Item_Id']);
        $this->db->execute();
            
        $row=$this->db->single();


        return $row;


    }






   

}
?>