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

    public function getPendingOrders(){
        // $this->db->query('SELECT * FROM orders WHERE User_ID=:user_ID AND Status ="PENDING"'); 
        // $this->db->query('SELECT orders.*, order_details.*, item.Item_name FROM orders O INNER JOIN order_details D on O.Order_ID = D.Order_ID INNER JOIN item I on O.Item_ID = I.Item_Id WHERE O.User_ID=:user_ID AND D.Status ="PENDING"');
        $this->db->query('SELECT * FROM orders INNER JOIN order_details on orders.Order_ID = Order_details.Order_ID WHERE Orders.User_ID=:user_ID AND order_details.Status ="PENDING"');
        $this->db->bind(':user_ID', $_SESSION['user_ID']);
        $result = $this->db->resultSet();
        // print_r($result);

        return $result;   
    }

    public function getCompletedOrders(){
        // $this->db->query('SELECT * FROM orders WHERE User_ID=:user_ID AND Status ="COMPLETED"'); 
        // $this->db->query('SELECT orders.*, order_details.*, item.Item_name FROM orders O INNER JOIN order_details D on O.Order_ID = D.Order_ID INNER JOIN item I on O.Item_ID = I.Item_Id WHERE O.User_ID=:user_ID AND D.Status ="COMPLETED"');
        $this->db->query('SELECT * FROM orders INNER JOIN order_details on orders.Order_ID = Order_details.Order_ID WHERE Orders.User_ID=:user_ID AND order_details.Status ="COMPLETED"');
        $this->db->bind(':user_ID', $_SESSION['user_ID']);

        return $this->db->resultSet();   
    }

    public function getItemsOfOrder($order_ID){
        $this->db->query("SELECT Item_name FROM item INNER JOIN orders ON item.Item_Id = orders.Item_ID WHERE orders.User_ID = :userID AND orders.Order_ID=:orderID");
        $this->db->bind(':userID', $_SESSION['user_ID']);
        $this->db->bind(':orderID', $order_ID);

        // print_r($this->db->resultSet());

        return $this->db->resultSet();
    }

    public function changeOrderStatus($order_ID){
        $this->db->query('UPDATE order_details SET status = "COMPLETED" WHERE Order_ID=:orderID');
        $this->db->bind(':orderID', $order_ID);

        return $this->db->execute();
    }

    public function getItemDetailsOfOrder($orderID){
        $this->db->query("SELECT * FROM item INNER JOIN orders ON item.Item_Id = orders.Item_ID WHERE orders.User_ID = :userID AND orders.Order_ID=:orderID");   
        $this->db->bind(':userID', $_SESSION['user_ID']);
        $this->db->bind(':orderID', $orderID);

        return $this->db->resultSet();
        
    }

    public function getPendingBookings(){
        // $this->db->query('SELECT * FROM v_orders WHERE Buyer_ID=:user_ID AND Status ="PENDING"'); 
        $this->db->query('SELECT DISTINCT v_orders.Order_ID, v_orders.name, v_orders.location, v_orders.Vechile_ID FROM v_orders INNER JOIN order_calander on order_calander.0rder_ID = v_orders.Order_ID WHERE v_orders.Buyer_ID = :user_ID AND order_calander.status = "Pending"');
        $this->db->bind(':user_ID', $_SESSION['user_ID']);
        $result = $this->db->resultSet();
        // print_r($result);

        return $result;   
    }

    public function getAcceptBookings(){
        $this->db->query('SELECT * FROM v_orders WHERE Buyer_ID=:user_ID AND Status ="success"'); 
        $this->db->bind(':user_ID', $_SESSION['user_ID']);
        $result = $this->db->resultSet();
        // print_r($result);

        return $result;   
    }

    

    public function getVehicleDetailsOfBooking($vehicle_ID){
        $this->db->query('SELECT * FROM vehicle_item WHERE V_Id=:vehicle_ID');
        $this->db->bind(':vehicle_ID', $vehicle_ID);
        $result = $this->db->resultSet();

        return $result;   
    }

    public function getDatesOfBooking($ID){
        $this->db->query('SELECT date FROM order_calander WHERE 0rder_ID=:orderID');
        $this->db->bind(':orderID', $ID);
        $result = $this->db->resultSet();

        return $result;
    }

    public function getAcceptOrders(){
        $this->db->query('SELECT * FROM orders INNER JOIN order_details on orders.Order_ID = Order_details.Order_ID WHERE Orders.User_ID=:user_ID AND order_details.Status ="ACCEPT"');
        $this->db->bind(':user_ID', $_SESSION['user_ID']);

        return $this->db->resultSet();
    }

}