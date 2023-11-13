<?php 


class Cart extends Controller{
    private $cartModel;
    public function __construct()
    {
        $this->cartModel = $this->model('M_cart');
        
    }





    public function addToCart() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $data = [
                'unitPrice' => $_POST['unitPrice'], 
                'quantity' => $_POST['quantity'], 
                'itemId' => $_POST['itemId'], 
                'uId' => $_POST['uId'], 
            ];

            // error_log(print_r($data, TRUE)); 

            // Check if the cart item already exists for this combination of itemId and uId
            if ($existingCartItem = $this->cartModel->getCartItem($data)) {            
                // If the cart item already exists, update the quantity
                $data['quantity'] += $existingCartItem['quantity'];

                if ($this->cartModel->updateCartItem(['uId'=>$existingCartItem['uId'],'quantity' => $data['quantity']])) {
                    $this->view('pages/cart', $data);                  
                } else {
                    die('Something went wrong while updating the cart item.');
                }
            } 
            else {
                if ($this->cartModel->addToCart($data)) {
                    
                    $Mitems =$this->cartModel->getAllcartItems($data);
                    $items = (array) $Mitems;
                    $data = array();
                    foreach ($items as $Mitem) {
                        $viewItem = array();
                        $item = (array) $Mitem;
                        $viewItem['quantity'] = $item ['Quantity'];
                        $viewItem['itemId'] = $item['Item_Id'];
                        $viewItem['uId'] = $item['U_Id'];
                        $viewItem['unitPrice'] = $item['Unit_price'];
                        $viewItem['itemName'] = $item['Item_name'];
                        array_push($data, $viewItem);

                    }
                    $this->view('pages/cart', $data);
                } else {
                    die('Something went wrong while adding the cart item.');
                }
            }
        } else {
            $data = [
                'unitPrice' => '',
                'quantity' => '',
                'itemId' => '',
                'uId' => '',
            ];
            $this->view('pages/cart', $data);
        }
    
    }





    public function deleteItem() {

        // $data = $this->cartModel->getCartItem($_GET);

        if ($this->cartModel->deleteCartItem($_GET)) {

            $Mitems =$this->cartModel->getAllcartItems($_GET);
            $items = (array) $Mitems;
            $data = array();
            foreach ($items as $Mitem) {
                $viewItem = array();
                $item = (array) $Mitem;
                $viewItem['quantity'] = $item ['Quantity'];
                $viewItem['itemId'] = $item['Item_Id'];
                $viewItem['uId'] = $item['U_Id'];
                $viewItem['unitPrice'] = $item['Unit_price'];
                $viewItem['itemName'] = $item['Item_name'];
                array_push($data, $viewItem);
            }


            $this->view('pages/cart', $data);


        } else {
            
            die('Failed to delete the item from the cart.');
        }

    }



        



    public function checkout() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
          
            $itemIds = $_POST['itemIds'];
            $quantities =$_POST['quantitiesTo'];    
            $uId = $_POST['uId'];
    
            // Loop through each item to update the quantity
            for ($i = 0; $i < count($itemIds); $i++) {
                $data = [
                    'quantity' => $quantities[$i], 
                    'itemId' => $itemIds[$i], 
                    'uId' => $uId, 
                ];

                if (!$this->cartModel->updateCartItem($data)) {
                    die('Failed to update the item from the cart.');
                }
               
            }
    
            // After updating all items, retrieve the updated cart items and render the view
            $Mitems = $this->cartModel->getAllcartItems($data);
            $items = (array) $Mitems;
            $data = array();
            foreach ($items as $Mitem) {
                $viewItem = array();
                $item = (array) $Mitem;
                $viewItem['quantity'] = $item['Quantity'];
                $viewItem['itemId'] = $item['Item_Id'];
                $viewItem['uId'] = $item['U_Id'];
                $viewItem['unitPrice'] = $item['Unit_price'];
                $viewItem['itemName'] = $item['Item_name'];
                array_push($data, $viewItem);
            }
    
            $this->view('pages/cart', $data);
        }
    }   
}

?>

