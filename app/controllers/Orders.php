<?php
 class Orders extends Controller{

    private $itemModel;
    private $orderModel;

    public function __construct(){
        $this->orderModel=$this->model('M_orders');
        $this->itemModel=$this->model('M_item');
    }

    public function index(){
        
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
        $acceptOrders = $this->orderModel->getAcceptOrders();
        // print_r($orders);
        $orderDetails = [];
        $acceptOrderDetails = [];

         foreach($orders as $order){
            $order_Data = [
                'order' => $order,
                'item' => $this->itemModel->sendItemName($order->Item_ID),
                'seller' => $this->itemModel->getItemSellerInfo($order->seller_ID)
            ];

            $orderDetails[] = $order_Data;

         }

         foreach($acceptOrders as $order){
            $order_Data = [
                'order' => $order,
                'item' => $this->itemModel->sendItemName($order->Item_ID),
                'seller' => $this->itemModel->getItemSellerInfo($order->seller_ID)
            ];

            $acceptOrderDetails[] = $order_Data;

         }

        //  print_r($orderDetails);

         $data = [
            'orders' => $orderDetails,
            'acceptOrders' => $acceptOrderDetails
        ];
        

        $this->view('Buyer/v_buyerOrders', $data);

    }

    public function completedOrdersOfUser(){
        $orders = $this->orderModel->getCompletedOrders();

        $orderDetails = [];

         foreach($orders as $order){
            $order_Data = [
                'order' => $order,
                'item' => $this->itemModel->sendItemName($order->Item_ID),
                'seller' => $this->itemModel->getItemSellerInfo($order->seller_ID)
            ];

            $orderDetails[] = $order_Data;

         }

        //  print_r($orderDetails);

         $data = [
            'orders' => $orderDetails
        ];
        // $data = [
        //     'orders' =>$orders
        // ];
        
        $this->view('Buyer/v_completed_orders', $data);

    }

    public function changeOrderStatus($orderID){
        //  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // $orderID = $_POST['orderId'];

            if($this->orderModel->changeOrderStatus($orderID)){
                $this->pendingOrdersOfUser();
              
            }else{
                echo 'Something went wrong';
            }
        //  }
    }

    public function pendingBookings(){
        $booking = $this->orderModel->getPendingBookings();

            $bookingData = [];
          foreach($booking as $book){
            $bookData = [
                'details' => $book,
                'vehicle' => $this->orderModel->getVehicleDetailsOfBooking($book->Vechile_ID),
                'dates' => $this->orderModel->getDatesOfBooking($book->Order_ID)
            ];

            $bookingData[] = $bookData;
        }

        // print_r($bookingData);
       

    // foreach($booking as $book){
    //     $bookingDetails = [
    //         'booking' => $book,
    //         'vehicle' => $this->orderModel->getVehicleDetailsOfBooking($book->Vechile_ID)
    //     ];

    //     $bookingData[] = $bookingDetails;
    // }
    
    $data = [
        'bookings' => $bookingData
    ];

    $this->view('Buyer/v_confirmedBookings', $data);
    }

    // public function toBeAcceptedBookings(){
    //     $booking = $this->orderModel->getAcceptBookings();
    //     $bookingData = [];

    //     foreach($booking as $request){
    //         $bookingDetails = [
    //             'request' => $request,
    //             'vehicle' => $this->orderModel->getVehicleDetailsOfBooking($request->Vechile_ID)
    //         ];

    //          $bookingData[] = $bookingDetails;
    //     }

    //     $data = [
    //         'requests' => $bookingData
    //     ];

       

    //      $this->view('Buyer/v_bookingsPage', $data);
    // }

    public function completedBookings(){

    }



    public function toBeAcceptedBookings(){
        $booking = $this->orderModel->getAcceptBookings();
        $bookingData = [];

        foreach($booking as $request){
            $bookingDetails = [
                'request' => $request,
                'vehicle' => $this->orderModel->getVehicleDetailsOfBooking($request->Vechile_ID),
                'dates' => $this->orderModel->getDatesOfBooking($request->Order_ID)
            ];

             $bookingData[] = $bookingDetails;
        }

        $data = [
            'requests' => $bookingData
        ];

       

         $this->view('Buyer/v_bookingsPage', $data);
    }








}