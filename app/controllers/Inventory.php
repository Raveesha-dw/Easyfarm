

<?php
include_once APPROOT . '/helpers/image_helper.php';


class Inventory extends Controller{
    private $inventoryModel;
    // private static $this;
    public function __construct()
    {
        // self::$this = $this;
        $this->inventoryModel = $this->model('M_inventoryModel');
        
    }

  public function get_inventory_details(){
    $data = $this->inventoryModel->get_data($_SESSION['user_ID']);
    $data1 = $this->inventoryModel->get_oderdardata($_SESSION['user_ID']);

// print_r($data1);
    // Merge the two arrays into one
    $combinedData = array_merge($data, $data1);

  


// Assuming $itemsArray contains the first array and $salesArray contains the second array



// Assuming $itemsArray contains the first array and $salesArray contains the second array

// Create an associative array to store remaining stock for each item
$remainingStock = array();

// Iterate over the first array to initialize remaining stock
foreach ($data as $item) {
    // Check if the necessary properties exist in the object
    if (isset($item->Item_Id) && isset($item->Stock_size)) {
        $itemId = $item->Item_Id;
        $remainingStock[$itemId] = $item->Stock_size;
    } else {
        // Handle case where necessary properties are not defined
        continue; // Skip this item and proceed to the next one
    }
}

// Iterate over the second array to subtract sold quantities from remaining stock
foreach ($data1 as $sale) {
    if (isset($sale->Item_ID) && isset($sale->quantity)) {
        $itemId = $sale->Item_ID;
        if (isset($remainingStock[$itemId])) {
            
            $remainingStock[$itemId] -= $sale->quantity;
        }
    } else {
        // Handle case where necessary properties are not defined
        continue; // Skip this sale and proceed to the next one
    }
}

foreach ($data as $item) {
    $itemId = $item->Item_Id;
    // Check if the item's ID exists in the remaining stock array
    if (isset($remainingStock[$itemId])) {
        // Add the remaining stock data to the item object
        $item->remainingStock = $remainingStock[$itemId];
    } else {
        // If the item's ID doesn't exist in the remaining stock array, set remaining stock to 0 or any other default value
        $item->remainingStock = 0;
    }
}


// print_r($data);

   $this->view('seller/v_inventory',$data);


// Output remaining stock for each item
// foreach ($remainingStock as $itemId => $stock) {
//     echo "Item ID: $itemId, Remaining Stock: $stock\n";
// }
  }


}