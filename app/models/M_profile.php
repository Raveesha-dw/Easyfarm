<?php
class M_profile{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }



    public function getCommonUserDetails(){
        
        $this->db->query('SELECT * FROM user WHERE user.Email = :email') ;
        $this->db->bind(':email', $_GET['email']); // Assuming $data1['email'] contains the user's email address
        $this->db->execute();
            
        $row=$this->db->single();


        return $row;


    }

    public function getUserByEmail($data){

        $this->db->query('SELECT * FROM user WHERE user.Email = :email') ;
        $this->db->bind(':email', $data['email']); // Assuming $data1['email'] contains the user's email address
        $this->db->execute();
            
        $row=$this->db->single();


        return $row;


    }

    public function getBuyerDetails($U_Id){
        $this->db->query('SELECT * FROM reg_buyer WHERE reg_buyer.U_Id = :U_Id') ;
        $this->db->bind(':U_Id', $U_Id); // Assuming $data1['email'] contains the user's email address
        $this->db->execute();
        $row=$this->db->single();
        return $row;


    }
    public function getSellerDetails($U_Id){
        $this->db->query('SELECT * FROM reg_seller WHERE reg_seller.U_Id = :U_Id') ;
        $this->db->bind(':U_Id', $U_Id); // Assuming $data1['email'] contains the user's email address
        $this->db->execute();
        $row=$this->db->single();
        return $row;

    }
    public function getAgricultureExpertDetails($U_Id){
        $this->db->query('SELECT * FROM reg_agriexpert WHERE reg_agriexpert.U_Id = :U_Id') ;
        $this->db->bind(':U_Id', $U_Id); // Assuming $data1['email'] contains the user's email address
        $this->db->execute();
        $row=$this->db->single();
        return $row;

    }
    public function getVehicleRenterDetails($U_Id){
        $this->db->query('SELECT * FROM reg_vehicleowner WHERE reg_vehicleowner.U_Id = :U_Id') ;
        $this->db->bind(':U_Id', $U_Id); // Assuming $data1['email'] contains the user's email address
        $this->db->execute();
        $row=$this->db->single();
        return $row;

    }

    public function updateProfile($data){

        $this->db->query('UPDATE user SET Password= :password WHERE Email= :email');
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':email', $data['email']);
        $this->db->execute();

    }


}


?>