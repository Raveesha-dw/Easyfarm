<?php
class M_orders{
    private $db;

    public function __construct()
    {
        $this->db=new Database();
    }

    public function getAllOrders(){
        $this->db->query("SELECT * FROM orders WHERE User_ID = '{$_SESSION['user_ID']}'");
        $orders = $this->db->resultSet();

        return $orders;
    }

    public function getOrderID(){
        $this->db->query('SELECT DISTINCT Order_ID FROM orders');
        $order_ID = $this->db->resultSet();

        return $order_ID;
    }

    public function postReview($data){
        $this->db->query('SELECT * FROM item WHERE Item_Id= :item_ID');
        $this->db->bind(':item_ID',$data['item_ID']);

        $row=$this->db->single();
        $name = $row->Item_name;

        $this->db->query('INSERT INTO review(Review, Rating, item_ID, Item_name, U_ID, posted_date, posted_time) VALUES(:review, :rating, :item_ID, :Item_name, :user_ID, :date, :time)');
        $this->db->bind(':review', $data['review']);
        $this->db->bind(':rating', $data['rating']);
        $this->db->bind(':item_ID', $data['item_ID']);
        $this->db->bind(':Item_name', $name);
        $this->db->bind(':user_ID', $data['user_ID']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':time', $data['time']);
        $this->db->execute();

        return true;
        // echo $id;
        // $this->db->query('INSERT INTO review(Item_name) VALUES(:id)');
        // $this->db->bind(':id', $id);
        // $this->db->execute();

    }

    public function updateReview($data){
        $this->db->query('SELECT * FROM review WHERE review_ID= :review_ID');
        $this->db->bind(':review_ID',$data['review_ID']);

    }

}