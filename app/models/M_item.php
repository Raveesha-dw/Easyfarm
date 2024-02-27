<?php
class M_item{
    private $db;

    public function __construct()
    {
        $this->db=new Database();
    }

    public function getSingleItem($item_ID){
        $this->db->query('SELECT * FROM item WHERE Item_ID = :item_ID');
        $this->db->bind(':item_ID', $item_ID);
        $item = $this->db->single();

        return $item;
    }

    public function getItemByName($itemName){
        // echo $itemName;
        $name = preg_replace('/(?<!^)([A-Z])/', ' $1', $itemName);
        // echo $name;
        $this->db->query('SELECT Item_Id FROM item WHERE Item_name = :itemName');
        $this->db->bind(':itemName', $name);
        $item = $this->db->single();

        // echo $item->Item_Id;
        return $item->Item_Id;
    }

    public function getItemName($item_ID){
        $this->db->query('SELECT Item_name FROM item WHERE Item_Id = :item_ID');
        $this->db->bind(':item_ID', $item_ID);
        $itemName = $this->db->single();

        // print_r($itemName);
        $jsonString = json_encode($itemName);

        return $jsonString;
    }

    public function sendItemName($item_ID){
        $this->db->query('SELECT Item_name FROM item WHERE Item_Id = :item_ID');
        $this->db->bind(':item_ID', $item_ID);
        $this->db->execute();

        $itemName = $this->db->single();
        return $itemName;
    }

    public function sendItemIDName($item_ID){
        $this->db->query('SELECT Item_Id, Item_name FROM item WHERE Item_Id = :item_ID');
        $this->db->bind(':item_ID', $item_ID);
        $itemName = $this->db->single();

        return $itemName;
    }

    public function getItemDetails($item_ID){
        $this->db->query('SELECT * FROM item WHERE Item_Id = :item_ID');
        $this->db->bind(':item_ID', $item_ID);

        return $this->db->single();
    }
}