<?php
class M_buyNow{
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

        // $this->db->query('SELECT Item_name,DeliveryMethod,Unit_price,Unit_type,Unit_size  FROM item WHERE item.Item_Id = :Item_Id') ;
        $this->db->query('SELECT I.Item_name, I.DeliveryMethod, I.Unit_price, I.Unit_type, I.Unit_size, I.Image, S.U_Id as Store_seller, S.Store_Name FROM item I INNER JOIN reg_seller S ON I.seller_ID=S.U_Id WHERE I.Item_Id = :Item_Id');
        $this->db->bind(':Item_Id', $data['Item_Id']);
        $this->db->execute();
            
        $row=$this->db->single();


        return $row;


    }


    public function updateBuyerAddress($data){

            $this->db->query('UPDATE reg_buyer SET Address= :address , Province=:province WHERE U_Id= :id');
            // $this->db->query('UPDATE reg_buyer SET  WHERE U_Id=: id');
            $this->db->bind(':address', $data['address'].','.$data['city']);
            $this->db->bind(':province', $data['Province']);
            $this->db->bind(':id', $data['uId']);
            $this->db->execute();

        return true;

    }

}
?>