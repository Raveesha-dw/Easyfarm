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
            return $row;
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
            return true;
        }

        if($data['user_type'] == 'Seller'){
            // print_r($data);
            // echo "User Table Values:";
            // echo "Email: " . $data['email'] . "<br>";
            // echo "Password: " . $data['password'] . "<br>";
            // echo "User Type: " . $data['user_type'] . "<br>";
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


        if($data['user_type'] == 'AgricultureExpert'){
            $this->db->query('INSERT INTO user(Email, Password, User_type) VALUES (:email, :password, :user_type)');
            $this->db->bind(':email', $data['email']);  
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':user_type', $data['user_type']);
            $this->db->execute();

            $this->db->query('SELECT * FROM user WHERE Email= :email');
            $this->db->bind(':email',$data['email']);

            $row=$this->db->single();
            $id = $row->U_Id;

            $this->db->query('INSERT INTO reg_agriinstructor(U_Id, Name, Address, City, Workplace, NIC, PID) VALUES(:id, :name, :address, :city, :workplace, :NIC, :PID)');
            $this->db->bind(':id', $id);
            $this->db->bind(':name', $data['fullname']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':workplace', $data['workplace']);
            $this->db->bind(':NIC', $data['nic_img']);  
            $this->db->bind(':PID', $data['pid_img']);

            $this->db->execute();
            return true;
        }else{
            return false;
        }
        
         if($data['user_type'] == 'VehicleRenter'){
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
         }

         else{
            return false;
         }

    }


    public function login($data){

        $this->db->query('SELECT * FROM user WHERE Email= :email');
        $this->db->bind(':email', $data['email']);
        $row=$this->db->single();

        // print_r($row);
        if($row->User_type=="Seller"){
            // print_r("s");
            if($row){
                print_r($data['email']);
                $this->db->query("SELECT * FROM reg_seller INNER JOIN user on reg_seller.U_Id = user.U_Id WHERE user.Email=:email");
                $this->db->bind(':email', $data['email']);
                $row1 = $this->db->single();
                // print_r($row);
                // print_r($row1);
                // echo 'row is here';
                $hashed_password = $row1->Password;
    
               // echo $hashed_password;
                if(password_verify($data['password'], $hashed_password)){
                  //  echo "yo";
                    return $row1;
                }else{
                    return false;
                }
            }
        }
// vechile renter part
        elseif($row->User_type=="VehicleRenter"){
            if($row){
                // print_r($data['email']);
                $this->db->query("SELECT * FROM reg_vehicleowner INNER JOIN user on reg_vehicleowner.U_Id = user.U_Id WHERE user.Email=:email");
                $this->db->bind(':email', $data['email']);
                $row1 = $this->db->single();
                // print_r($row);
                // print_r($row1);
                // echo 'row is here';
                $hashed_password = $row1->Password;
    
               // echo $hashed_password;
                if(password_verify($data['password'], $hashed_password)){
                  //  echo "yo";
                    return $row1;
                }else{
                    return false;
                }
            }
        }
        elseif($row){
            // echo '<br>';
            // echo 'row is here';

            $hashed_password = $row->Password;

            if(password_verify($data['password'], $hashed_password)){
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

    public function createToken($data, $expirationTime){

        $this->db->query('UPDATE user SET User_OTP= :otp, expirationTime=:expirationTime  WHERE Email= :email');
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':otp', $data['otp']);
        $this->db->bind(':expirationTime', $expirationTime);

        $this->db->execute();
    
    }

    public function verifyToken($data){
        $this->db->query('SELECT * FROM user WHERE (Email= :email) && (User_OTP= :otp)');
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':otp', $data['otp']);

        

        if($row=$this->db->single()){
            return $row;
        }else{
            return false;
        }

    }


    public function clearToken($data){

        $this->db->query('UPDATE user SET User_OTP= NULL WHERE Email= :email');
        $this->db->bind(':email', $data['email']);
        $this->db->execute();
    
    }

    public function getAgriInstructorAccStatus($id){
        $this->db->query("SELECT AccStatus FROM reg_agriinstructor WHERE U_Id = :id");
        $this->db->bind(':id', $id);
        $accStatus = $this->db->single();
        return $accStatus;
    }



}