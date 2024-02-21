<?php
class M_cart{
    private $db;

    public function __construct()
    {
        $this->db=new Database();
    }


    public function addToCart($data){
        
        $this->db->query('INSERT INTO cart(Item_Id, U_Id, Quantity) VALUES (:itemId, :uId, :quantity)'); 
        $this->db->bind(':itemId', $data['itemId']);
        $this->db->bind(':uId', $data['uId']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->execute();
        return true;
    
    }


    public function getCartItem($data){

        $this->db->query('SELECT * FROM cart WHERE (Item_Id= :itemId) AND (U_Id = :uId) ') ;
        $this->db->bind(':itemId', $data['itemId']);
        $this->db->bind(':uId', $data['uId']);
        
        $this->db->execute();
        $row=$this->db->single();
        return $row;
    }




    public function getAllcartItems($data){

        $this->db->query('SELECT * FROM cart, item WHERE (U_Id = :uId) and cart.Item_Id = item.Item_Id') ;
        $this->db->bind(':uId', $data['uId']);
            
        $this->db->execute();
        $rows=$this->db->resultSet();     
        return $rows;
    }
    



    public function updateCartItem($data){

        $this->db->query('UPDATE cart SET  Quantity = :quantity WHERE U_Id = :uId AND Item_Id = :itemId');
        $this->db->bind(':itemId', $data['itemId']);   
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':uId', $data['uId']);

        if ($this->db->execute()) {  
            return true; 
        } else {
            return false;
        }
    }





    public function deleteCartItem($data) {
       
        $this->db->query('DELETE FROM cart WHERE U_Id = :uId AND Item_Id = :itmId');
        $this->db->bind(':uId', $data['uId']);
        $this->db->bind(':itmId', $data['itemId']);
    
        // Execute the SQL statement
        if ($this->db->execute()) {
            return true;
        } else {
            return false; 
        }
    }
}

?>