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

 

    public function register($data){
        // print_r($data);
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
            return true;
        }

        elseif($data['user_type'] == 'Seller'){
            
            $this->db->query('INSERT INTO user(Email, Password, User_type) VALUES (:email, :password, :user_type)');
            $this->db->bind(':email', $data['email']);  
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':user_type', $data['user_type']);

            $this->db->execute();

            $this->db->query('SELECT * FROM user WHERE Email= :email');
            $this->db->bind(':email',$data['email']);

            $row=$this->db->single();
            $id = $row->U_Id;

            $this->db->query('INSERT INTO reg_seller(U_Id, Name, NIC, Store_Name, Store_Adress, Account_Holder, Bank_Name, Branch_Name, Account_Number) 
            VALUES(:id, :fullname, :nic, :store_name, :store_address, :ac_Holder_name, :bank_name, :branch_name, :ac_number)');
            $this->db->bind(':id', $id);
            $this->db->bind(':fullname', $data['fullname']);
            $this->db->bind(':nic', $data['nic']);
            $this->db->bind(':store_name', $data['store_name']);
            $this->db->bind(':store_address', $data['store_address']);
            $this->db->bind(':ac_Holder_name', $data['ac_Holder_name']);
            $this->db->bind(':bank_name', $data['bank_name']);
            $this->db->bind(':branch_name', $data['branch_name']);
            $this->db->bind(':ac_number', $data['ac_number']);
           
                   
            $this->db->execute();
            return true;
        }


        elseif($data['user_type'] == 'AgricultureExpert'){
            $this->db->query('INSERT INTO user(Email, Password, User_type) VALUES (:email, :password, :user_type)');
            $this->db->bind(':email', $data['email']);  
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':user_type', $data['user_type']);
            $this->db->execute();

            $this->db->query('SELECT * FROM user WHERE Email= :email');
            $this->db->bind(':email',$data['email']);

            $row=$this->db->single();
            $id = $row->U_Id;

            $this->db->query('INSERT INTO reg_agriexpert(U_Id, Email, Address, City, Occupation, Workplace, NIC, Prof_id) VALUES(:id, :email, :address, :city,:occupation,:workplace,:nic,:pId)');
            $this->db->bind(':id', $id);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':occupation', $data['occupation']);
            $this->db->bind(':workplace', $data['workplace']);
            $this->db->bind(':nic', $data['nic']);  
            $this->db->bind(':pId', $data['pId']);

            $this->db->execute();
            return true;
        }
        
         elseif($data['user_type'] == 'VehicleRenter'){
            // print_r("dd");
            $this->db->query('INSERT INTO user(Email, Password, User_type) VALUES (:email, :password, :user_type)');
            $this->db->bind(':email', $data['email']);  
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':user_type', $data['user_type']);
            $this->db->execute();

            $this->db->query('SELECT * FROM user WHERE Email= :email');
            $this->db->bind(':email',$data['email']);

            $row=$this->db->single();
            $id = $row->U_Id;

            $this->db->query('INSERT INTO reg_vehicleOwner(U_Id, Name, Contact_num, Address, City) VALUES (:id, :fullname,:contactno, :address, :city)');
            $this->db->bind(':id', $id);
            $this->db->bind(':fullname', $data['fullname']);
            $this->db->bind(':contactno', $data['contactno']);
            $this->db->bind('address', $data['address']);
            $this->db->bind('city', $data['city']);
            $this->db->execute();
            return true;
         }

         else{
            return false;
         }

    }
// this was change because buyer can not login
    // public function login($data){
        
    //     $this->db->query('SELECT * FROM user INNER JOIN reg_seller ON user.U_Id=reg_seller.U_Id  WHERE Email= :email');
    //     $this->db->bind(':email', $data['email']);

    //     $row=$this->db->single();
        
    //     if($row){
           
    //         $hashed_password = $row->Password;

           
    //         if(password_verify($data['password'], $hashed_password)){
           
    //             return $row;
    //         }else{
    //             return false;
    //         }
    //     }
        
    // }

    public function login($data){
        // echo 'data to login model';
        $this->db->query('SELECT * FROM user WHERE Email= :email');
        $this->db->bind(':email', $data['email']);

        $row=$this->db->single();
        
        if($row){
            // echo '<br>';
            // echo 'row is here';
            $hashed_password = $row->Password;

           // echo $hashed_password;
            if(password_verify($data['password'], $hashed_password)){
              //  echo "yo";
                return $row;
            }else{
                return false;
            }
        }
        
    }





    public function PasswordReset($data){
        $this->db->query('UPDATE user SET Password= :password WHERE Email= :email');
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':email', $data['email']);
        $this->db->execute();

    }

    public function createToken($data){

        $this->db->query('UPDATE user SET User_OTP= :otp WHERE Email= :email');
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':otp', $data['otp']);
        $this->db->execute();
    
    }

    public function verifyToken($data){
        $this->db->query('SELECT * FROM user WHERE (Email= :email) && (User_OTP= :otp)');
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':otp', $data['otp']);

        $row=$this->db->single();

        if($row){
            return true;
        }else{
            return false;
        }

    }


    public function clearToken($data){

        $this->db->query('UPDATE user SET User_OTP= NULL WHERE Email= :email');
        $this->db->bind(':email', $data['email']);
        $this->db->execute();
    
    }


}