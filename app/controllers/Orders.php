<?php
 class Orders extends Controller{
    public function __construct(){
        $this->orderModel=$this->model('M_orders');
        $this->itemModel=$this->model('M_item');
    }

    public function placedOrders(){
        $allOrders = $this->orderModel->getAllOrders();

        // $order_IDs = $this->orderModel->getOrderID();

        // $IDs = [
        //     'allIDs' => $order_IDs
        // ];
        // $itemArray = [];

        // foreach($order_IDs as $ID){
        //     foreach($data['allorders'] as $order){
        //         if($ID == $order->Order_ID){
        //             array_push($itemArray, $order->Item_ID);
        //         }
        //     }
        // }

        // return $itemArray;

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

}