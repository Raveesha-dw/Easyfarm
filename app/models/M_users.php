<?php
class M_users{
    private $db;

    public function __construct()
    {
        $this->db=new Database();
    }

    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM user WHERE Email= :email');
        $this->db->bind(':email',$email);

        $row=$this->db->single();

        if ($this->db->rowCount()>0) {
            return true;
        }
        else{
            return false;
        }
    }

    // public function findUserByUsername($username){
    //     $this->db->query('SELECT * FROM user WHERE Username= :username');
    //     $this->db->bind(':username', $username);

    //     $row=$this->db->single();

    //     if ($this->db->rowCount()>0) {
    //         return true;
    //     }
    //     else{
    //         return false;
    //     }
    // }

    public function register($data){
        
        if($data['user_type'] == 'Buyer'){
            $this->db->query('INSERT INTO user(Email, Password, User_type) VALUES (:email, :password, :user_type)');
            $this->db->bind(':email', $data['email']);  
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':user_type', $data['user_type']);
            $this->db->execute();

            $this->db->query('SELECT * FROM user WHERE Email= :email');
            $this->db->bind(':email',$data['email']);

            $row=$this->db->single();
            $id = $row->U_Id;

            $this->db->query('INSERT INTO reg_buyer(U_Id, Name, Contact_num, Address) VALUES(:id, :fullname, :contactno, :address)');
            $this->db->bind(':id', $id);
            $this->db->bind(':fullname', $data['fullname']);
            $this->db->bind(':contactno', $data['contactno']);
            $this->db->bind(':address', $data['address'].','.$data['city'].','.$data['postalcode']);
            $this->db->execute();

        }

    }
}