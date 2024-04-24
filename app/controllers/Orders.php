<?php
 class Orders extends Controller{

    private $itemModel;
    private $orderModel;

    public function __construct(){
        $this->orderModel=$this->model('M_orders');
        $this->itemModel=$this->model('M_item');
    }

    // public function placedOrders(){
    //     $allOrders = $this->orderModel->getAllOrders();


    //     $categorizedItems = [];

    // foreach ($allOrders as $record) {
    //      print_r($record);
    //     $orderID = $record->Order_ID;
    //     $itemID = $record->Item_ID;
    //     $status = $record->Status;

        
    //     if (!array_key_exists($orderID, $categorizedItems)) {
    //         $categorizedItems[$orderID] = []; 
    //         $categorizedItems[$orderID][] = $orderID;
    //         $categorizedItems[$orderID][] = $status;
    //     }

    //     $categorizedItems[$orderID][] = $itemID; 
    // }

    // $itemNames = [];

    // $indexes = array_keys($categorizedItems);
    // $j = 0;

    // foreach($categorizedItems as $seperateArray){   
    //     $temp = $indexes[$j++];
    //     $itemNames[] = $temp;
    //     for($i=2; $i<count($seperateArray); $i++){
    //         $name = $this->itemModel->getItemName($seperateArray[$i]);
    //         $data = json_decode($name, true); 
    //         $itemName = $data['Item_name']; 
            

    //         $itemNames[$temp][] = $itemName;
            
    //     }

        
    // }

    

    // $data = [
    //     'items' => $categorizedItems,
    //     'itemNames' => $itemNames
    // ];
        

    //    $this->view('Buyer/v_dashboardOrders', $data);
    // }

    public function pendingOrdersOfUser(){
        $orders = $this->orderModel->getPendingOrders();
        // print_r($orders);
       // $orderItems = [];

        // foreach($orders as $order){
        //     $itemNames = $this->orderModel->getItemsOfOrder($order->Order_ID);
        //     $items = [];

        //     foreach($itemNames as $item){
        //         $items[] = $item->Item_name;
        //     }

        //     $orderItems[$order->Order_ID] = $items;

        //      print_r($itemNames);
        // }
        
        // $data = [
        //     'orders' => $orders,
        //     'orderItems' => $orderItems
        // ];


        // print_r($data);
        $data = [
            'orders' => $orders
        ];

        $this->view('Buyer/v_buyerOrders', $data);

    }

    public function completedOrdersOfUser(){
        $orders = $this->orderModel->getCompletedOrders();

        // $orderItems = [];
        // foreach($orders as $order){
        //     $orderID = $order->Order_ID;
        //     $items = $this->orderModel->getItemDetailsOfOrder($orderID);

        //     $orderItems[$orderID]['order'] = $order;
        //     $orderItems[$orderID]['items'] = $items;

        // }

        // $data = [
        //     'orderItems' => $orderItems
        // ];
        $data = [
            'orders' =>$orders
        ];
        
        $this->view('Buyer/v_completed_orders', $data);

    }

    public function changeOrderStatus($orderID){
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // $orderID = $_POST['orderId'];

            if($this->orderModel->changeOrderStatus($orderID)){
                $this->view('Buyer/v_buyerOrders');
              
            }else{
                echo 'Something went wrong';
            }
         }
    }

    public function pendingBookings(){
        $booking = $this->orderModel->getPendingBookings();

        $bookingData = [];

    foreach($booking as $book){
        $bookingDetails = [
            'booking' => $book,
            'vehicle' => $this->orderModel->getVehicleDetailsOfBooking($book->Vechile_ID)
        ];

        $bookingData[] = $bookingDetails;
    }
    
    $data = [
        'bookings' => $bookingData
    ];

    $this->view('Buyer/v_bookingsPage', $data);
    }

}