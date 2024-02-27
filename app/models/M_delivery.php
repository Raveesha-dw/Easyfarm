<?php

class M_delivery{
        private $db;

        public function __construct()
    {
        $this->db=new Database();
    }

    public function getDeliveryFeeForSingleProduct($itemID){
        $this->db->query('SELECT Store_province FROM item INNER JOIN reg_seller ON item.seller_ID = reg_seller.U_Id');
        $result= $this->db->single();
        $sellerProvince = $result->Store_province;

        $buyerProvince = $_SESSION['buyer_province'];
        $this->db->query('SELECT zone_ID FROM deliveryzones WHERE from_province=:fromProv AND to_province=:toProv');
        $this->db->bind(':fromProv', $sellerProvince);
        $this->db->bind(':toProv', $buyerProvince);
        $zone = $this->db->single();
        $zone_ID = $zone->zone_ID;

        $this->db->query('SELECT base_fee, weight_fee FROM deliveryfees WHERE zone_ID=:zone_ID');
        $this->db->bind(':zone_ID', $zone_ID);

        $deliveryFee = $this->db->single();
        return $deliveryFee;

    }

    // methods to calculate weight of the order

    public function getSellerIDForItem($itemID){
        $this->db->query('SELECT seller_ID FROM item WHERE Item_Id=:itemID');
        $this->db->bind(':itemID', $itemID);
        $result = $this->db->single();
        $ID = $result->seller_ID;
        return $ID;
    }

    public function getDeliveryFeeForSeller($sellerID){
        $this->db->query('SELECT Store_province FROM reg_seller WHERE U_Id=:sellerID');
        $this->db->bind(':sellerID', $sellerID);
        $province = $this->db->single();
        // print_r($province);

        $buyerProv = $_SESSION['buyer_province'];
        $this->db->query('SELECT base_fee, weight_fee FROM deliveryfees F INNER JOIN deliveryzones Z ON Z.zone_ID=F.zone_ID WHERE Z.from_province=:province AND Z.to_province=:buyerProv');
        $this->db->bind(':province', $province->Store_province);
        $this->db->bind(':buyerProv', $buyerProv);
        $result = $this->db->single();
        // print_r($result);
        $base_fee = $result->base_fee;
        
        return $base_fee;
    }


    public function getProvinceOfBuyer(){
        $this->db->query('SELECT Province FROM reg_buyer WHERE U_Id = :U_ID');
        $this->db->bind(':U_ID', $_SESSION['user_ID']);
        $result = $this->db->single();

        return $result->Province;
    }
}