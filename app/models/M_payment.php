<?php
class M_payment{
    private $db;

    public function __construct()
    {
        $this->db=new Database();
    }

    public function getUserDetails($data){

        $this->db->query('SELECT user.Email,reg_buyer.Name, reg_buyer.Contact_num , reg_buyer.Address FROM user JOIN reg_buyer ON user.U_Id = reg_buyer.U_Id WHERE user.U_Id = :U_Id') ;
        $this->db->bind(':U_Id', $data['uId']);
        $this->db->execute();
            
        $row=$this->db->single();


        return $row;


    }
    public function getItemDetais($data){

        $this->db->query('SELECT Item_name,DeliveryMethod,Unit_price,seller_ID  FROM item WHERE item.Item_Id = :Item_Id') ;
        $this->db->bind(':Item_Id', $data['Item_Id']);
        $this->db->execute();
            
        $row=$this->db->single();


        return $row;


    }

    public function saveOrder($data){
print_r( $data);
print_r( $data['orderId']);
        // $this->db->query('INSERT INTO orders(Order_ID ,Item_ID, User_ID,placed_Date, quantity,seller_ID) VALUES (:orderId ,:itemId, :uId, :placed_Date, :quantity , :seller_ID)'); 
        // $this->db->bind(':orderId', $data['orderId']);
        // $this->db->bind(':itemId', $data['Item_Id']);
        // $this->db->bind(':uId', $data['uId']);
        // $this->db->bind(':placed_Date', $data['placed_Date']);
        // $this->db->bind(':quantity', $data['quantity']);
        // $this->db->bind(':seller_ID', $data['seller_ID']);
        // $this->db->execute();
        // return true;

        $this->db->query('INSERT INTO orders(Item_ID, User_ID,placed_Date, quantity,seller_ID) VALUES (:itemId, :uId, :placed_Date, :quantity , :seller_ID)'); 
        // $this->db->bind(':orderId', $data['orderId']);
        $this->db->bind(':itemId', $data['Item_Id']);
        $this->db->bind(':uId', $data['uId']);
        $this->db->bind(':placed_Date', $data['placed_Date']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':seller_ID', $data['seller_ID']);
        $this->db->execute();
        return true;

    }

}
?>