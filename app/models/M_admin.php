<?php

class M_admin{
    private $db; 

    public function __construct(){
        $this->db = new Database();
    }

    // Manage Blog Categories

    public function getBlogCategories(){
        $this->db->query("SELECT * FROM blog_category");
        $categories = $this->db->resultSet();
        return $categories;
    }

    public function findBlogCategory($permalink){
        $this->db->query("SELECT permalink FROM blog_category WHERE permalink = :permalink");
        $this->db->bind(':permalink', $permalink);
        $result = $this->db->single();
        return $result;
    }

    public function insertBlogCategory($data){
        $this->db->query("INSERT INTO blog_category(category, permalink) VALUES (:category, :permalink)");
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':permalink', $data['permalink']);
        $this->db->execute();
        return true;
    }

    public function updateBlogCategory($data){
        $this->db->query("UPDATE blog_category SET category = :category  WHERE permalink = :permalink");
        $this->db->bind(':permalink', $data['permalink']);
        $this->db->bind(':category', $data['category']);
        $this->db->execute();
        return true;
    }

    public function deleteBlogCategory($permalink){
        $this->db->query("DELETE FROM blog_category WHERE permalink = :permalink");
        $this->db->bind(':permalink', $permalink);
        $this->db->execute();
        return true;
    }


    // Manage Marketplace Categories

    public function getMarketplaceCategories(){
        $this->db->query("SELECT * FROM category");
        $categories = $this->db->resultSet();
        return $categories;
    }

    public function insertMarketplaceCategory($data){
        $this->db->query("INSERT INTO category(category, type, delivery, icon, date) VALUES (:category, :units, :deliveryMethod, :fontAwsome, :isExpDate)");
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':units', $data['units']);
        $this->db->bind(':deliveryMethod', $data['deliveryMethod']);
        $this->db->bind(':isExpDate', $data['isExpDate']);
        $this->db->bind(':fontAwsome', $data['fontAwsome']);
        $this->db->execute();
        return true;
    }

    public function updateMarketplaceCategory($data){
        $this->db->query("UPDATE category SET category = :category, type = :units, delivery = :deliveryMethod, icon = :fontAwsome, date = :isExpDate  WHERE category_id = :category_id");
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':units', $data['units']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':deliveryMethod', $data['deliveryMethod']);
        $this->db->bind(':isExpDate', $data['isExpDate']);
        $this->db->bind(':fontAwsome', $data['fontAwsome']);
        $this->db->execute();
        return true;
    }

    public function deleteMarketplaceCategory($category_id){
        $this->db->query("DELETE FROM category WHERE category_id = :category_id");
        $this->db->bind(':category_id', $category_id);
        $this->db->execute();
        return true;
    }



    // Manage Vehicle Categories

    public function getVehicleCategories(){
        $this->db->query("SELECT * FROM vehicle_item_category");
        $categories = $this->db->resultSet();
        return $categories;
    }

    public function insertVehicleCategory($data){
        $this->db->query("INSERT INTO vehicle_item_category(Category_name) VALUES (:category)");
        $this->db->bind(':category', $data['category']);
        $this->db->execute();
        return true;
    }

    public function updateVehicleCategory($data){
        $this->db->query("UPDATE vehicle_item_category SET Category_name = :category  WHERE Category_Id = :category_id");
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':category', $data['category']);
        $this->db->execute();
        return true;
    }

    public function deleteVehicleCategory($category_id){
        $this->db->query("DELETE FROM vehicle_item_category WHERE Category_Id = :category_id");
        $this->db->bind(':category_id', $category_id);
        $this->db->execute();
        return true;
    }



    // Manage Delivery Fee Rates

    public function getDeliveryZones(){
        $this->db->query("SELECT * FROM deliveryzones z INNER JOIN deliveryfees f ON z.zone_ID = f.zone_ID");
        $deliveryZones = $this->db->resultSet();
        return $deliveryZones;
    }

    public function updateDeliveryZone($data){
        $this->db->query("UPDATE deliveryfees SET base_fee = :baseFee, weight_fee = :weightFee WHERE zone_ID = :zoneID");
        $this->db->bind(':baseFee', $data['baseFee']);
        $this->db->bind(':weightFee', $data['weightFee']);
        $this->db->bind(':zoneID', $data['zoneID']);
        $this->db->execute();
        return true;
    }


    // Manage Agri Instructors

    public function getAgriInstructorsByAccStatus($accStatus){
        $this->db->query("SELECT * FROM reg_agriinstructor WHERE AccStatus = :accStatus");
        $this->db->bind(':accStatus', $accStatus);
        $result = $this->db->resultSet();
        return $result;
    }

    public function getAgriInstructorById($id){
        $this->db->query("SELECT a.*, u.Email FROM reg_agriinstructor a INNER JOIN user u ON a.U_Id = u.U_Id WHERE a.U_Id = :id");
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }

    public function setAgriInstructorAccStatus($id, $accStatus){
        $this->db->query("UPDATE reg_agriinstructor SET AccStatus = :accStatus WHERE U_Id = :id");
        $this->db->bind(':id', $id);
        $this->db->bind(':accStatus', $accStatus);
        $this->db->execute();
        return true;
    }

    public function getEmailByUserId($id){
        $this->db->query("SELECT Email FROM user WHERE U_Id = :id");
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }


    // Settle Payments

    public function getSellerPaymentData($status){
        $this->db->query("SELECT Payment_Id, seller_ID, product_charge, PaymentStatus FROM order_charging_details WHERE PaymentStatus = :status ORDER BY seller_ID");
        $this->db->bind(':status', $status);
        $result = $this->db->resultSet();
        return $result;
    }

    public function setSellerPayment($paymentID, $sellerID, $status){
        $this->db->query("UPDATE order_charging_details SET PaymentStatus = :status WHERE Payment_Id = :paymentID AND seller_ID = :sellerID");
        $this->db->bind(':paymentID', $paymentID);
        $this->db->bind(':sellerID', $sellerID);
        $this->db->bind(':status', $status);
        $this->db->execute();
        return true;
    }

    public function getDeliveryPaymentData($status){
        $this->db->query("SELECT Payment_Id, seller_ID, delivery_charge, DeliveryPaymentStatus FROM order_charging_details WHERE DeliveryPaymentStatus = :status ORDER BY seller_ID");
        $this->db->bind(':status', $status);
        $result = $this->db->resultSet();
        return $result;
    }

    public function setDeliveryPayment($paymentID, $sellerID, $status){
        $this->db->query("UPDATE order_charging_details SET DeliveryPaymentStatus = :status WHERE Payment_Id = :paymentID AND seller_ID = :sellerID");
        $this->db->bind(':paymentID', $paymentID);
        $this->db->bind(':sellerID', $sellerID);
        $this->db->bind(':status', $status);
        $this->db->execute();
        return true;
    }

    public function getSellerBankInfo($sellerID){
        $this->db->query("SELECT U_Id, Name, Store_Name, Account_Holder, Bank_Name, Branch_Name, Account_Number FROM reg_seller WHERE U_Id = :sellerID");
        $this->db->bind(':sellerID', $sellerID);
        $result = $this->db->single();
        return $result;
    }
}