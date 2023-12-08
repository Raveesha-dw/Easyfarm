<?php 


class Cart extends Controller{
    private $cartModel;
    private $productModel;
    private $reviewModel;

    public function __construct()
    {
        $this->cartModel = $this->model('M_cart');
        
    }


    public function showCart() {

        $data = [
            'quantity' => '', 
            'itemId' => '', 
            'uId' => $_SESSION['user_ID'], 
            
        ];


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

    }


    public function addToCart() {

        

        if (($_SERVER['REQUEST_METHOD'] == 'POST') && (!empty($_SESSION['user_ID'])  && ($_SESSION['user_type'] == 'Buyer'))) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $data = [
                'quantity' => $_POST['quantity'], 
                'itemId' => $_POST['itemId'], 
                'uId' => $_POST['uId'], 
                
            ];

            // error_log(print_r($data, TRUE)); 

            // Check if the cart item already exists for this combination of itemId and uId
            if ($existingCartItem = $this->cartModel->getCartItem($data)) {            
                // If the cart item already exists, update the quantity
                $data['quantity'] += $existingCartItem->Quantity;

                if ($this->cartModel->updateCartItem(['uId'=>$existingCartItem->U_Id,'quantity' => $data['quantity'] , 'itemId' => $data['itemId']])) {
                    // $this->view('pages/cart', $data);                  
                } else {
                    die('Something went wrong while updating the cart item.');
                }
            } 
            else 
            {
                $this->cartModel->addToCart($data);
      
            }

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
            // redirect('Cart/checkout');
            
        }elseif(($_SESSION['user_type'] != 'Buyer')){

            $data=[
                'user_type'=> '',
                'fullname'=>'',
                'contactno'=>'',
                'email' => '',
                'address' => '',
                'city' => '',
                'postalcode' => '',
                'password'=>'',
                'confirm-password'=>'',

                'name_err' => '',
                'contactno_err' => '',
                'email_err' => '',
                'address_err' => '',
                'password_err'=>'',
                'confirm-password_err'=>'',

            ];
            $this->view('Users/v_registerBuyer',$data);

        }
        elseif(empty($_SESSION['user_ID'])  ){  
            $data=[
                'email' => '',
                'password' => '',

                'email_err' => '',
                'password_err' => ''
            ];
            $this->view('Users/v_login', $data);

            // redirect('Users/v_login');

        }else {
            // redirect('pages/cart');
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

