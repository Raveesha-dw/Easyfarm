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

        $this->db->query('SELECT *  FROM item WHERE item.Item_Id = :Item_Id') ;
        $this->db->bind(':Item_Id', $data['Item_Id']);
        $this->db->execute();
            
        $row=$this->db->single();


        return $row;


    }

    public function saveOrder($data){
print_r( $data);
        $this->db->query('INSERT INTO orders(Payment_Id ,Item_ID, User_ID,placed_Date,seller_ID) VALUES (:Payment_Id ,:itemId, :uId, :placed_Date, :seller_ID)'); 

        $this->db->bind(':Payment_Id', $data['Payment_Id']);
        $this->db->bind(':itemId', $data['Item_Id']);
        $this->db->bind(':uId', $data['uId']);
        $this->db->bind(':placed_Date', $data['placed_Date']);
        $this->db->bind(':seller_ID', $data['seller_ID']); 
        $this->db->execute();

        $order_id = $this->db->query('SELECT Order_ID  FROM orders WHERE orders.Item_Id = :itemId') ;
        $this->db->bind(':itemId', $data['Item_Id']);




        
        $this->db->query('INSERT INTO order_details(quantity, Unit_price,Unit_size,Unit_type,DeliveryMethod) VALUES (:quantity, :Unit_price, :Unit_size, :Unit_type, :DeliveryMethod)  WHERE Order_ID = :Order_ID '); 
        
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':Unit_price', $data['Unit_price']);
        $this->db->bind(':Unit_size', $data['Unit_size']);
        $this->db->bind(':Unit_type', $data['Unit_type']);
        $this->db->bind(':DeliveryMethod', $data['selectedDeliveryMethod']);
        $this->db->bind(':Order_ID', $order_id);
        $this->db->execute();



        $this->db->query('INSERT INTO order_charging_details(product_charge,delivery_charge) VALUES (:product_charge, :delivery_charge)  WHERE (Payment_Id = :Payment_Id AND seller_ID = :seller_ID) '); 
        
        $this->db->bind(':product_charge', $data['Item_Id']);
        $this->db->bind(':delivery_charge', $data['uId']);
        $this->db->bind(':Payment_Id', $data['placed_Date']);
        $this->db->bind(':seller_ID', $data['seller_ID']);
     
        $this->db->execute();




        return true;

   

    }

}
?>