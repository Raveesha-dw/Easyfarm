<?php
 class Orders extends Controller{

    private $itemModel;
    private $orderModel;

    public function __construct(){
        $this->orderModel=$this->model('M_orders');
        $this->itemModel=$this->model('M_item');
    }

    public function placedOrders(){
        $allOrders = $this->orderModel->getAllOrders();

    
        $categorizedItems = [];

// Iterate through the records
//Made the categorizedArray
    foreach ($allOrders as $record) {
        // print_r($record);
        $orderID = $record->Order_ID;
        $itemID = $record->Item_ID;
        $status = $record->Status;

        // Create an array key using orderID and store itemIDs accordingly
        if (!array_key_exists($orderID, $categorizedItems)) {
            $categorizedItems[$orderID] = []; // Create an empty array for the orderID if it doesn't exist
            $categorizedItems[$orderID][] = $orderID;
            $categorizedItems[$orderID][] = $status;
        }

        $categorizedItems[$orderID][] = $itemID; // Append the itemID to the respective orderID array
    }

    $itemNames = [];

    $indexes = array_keys($categorizedItems);
    $j = 0;

    foreach($categorizedItems as $seperateArray){   
        $temp = $indexes[$j++];
        $itemNames[] = $temp;
        for($i=2; $i<count($seperateArray); $i++){
            $name = $this->itemModel->getItemName($seperateArray[$i]);
            $data = json_decode($name, true); //convert to string
            $itemName = $data['Item_name'];  //extract item name
            // echo $itemName;

            $itemNames[$temp][] = $itemName;
            // $seperateArray[$i] = $itemName;
        }

        // print_r($seperateArray);
    }

    // print_r($itemNames);

    $data = [
        'items' => $categorizedItems,
        'itemNames' => $itemNames
    ];
        

       $this->view('Buyer/v_dashboardOrders', $data);
    }

    public function pendingOrdersOfUser(){
        $orders = $this->orderModel->getPendingOrders();
        $orderItems = [];

        foreach($orders as $order){
            $itemNames = $this->orderModel->getItemsOfOrder($order->Order_ID);
            $items = [];

            foreach($itemNames as $item){
                $items[] = $item->Item_name;
            }

            $orderItems[$order->Order_ID] = $items;

            // print_r($itemNames);
        }
        
        $data = [
            'orders' => $orders,
            'orderItems' => $orderItems
        ];

        // print_r($data);

        $this->view('Buyer/v_buyerOrders', $data);

    }

    public function completedOrdersOfUser(){
        $orders = $this->orderModel->getCompletedOrders();

        $orderItems = [];
        foreach($orders as $order){
            $orderID = $order->Order_ID;
            $items = $this->orderModel->getItemDetailsOfOrder($orderID);

            $orderItems[$orderID]['order'] = $order;
            $orderItems[$orderID]['items'] = $items;

        }

        $data = [
            'orderItems' => $orderItems
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

}