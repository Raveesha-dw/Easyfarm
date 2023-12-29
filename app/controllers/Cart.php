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
            $viewItem['selectedDeliveryMethod'] = $item['selectedDeliveryMethod'];
            $viewItem['Unit_type'] = $item['Unit_type'];

            array_push($data, $viewItem);

        }
        $this->view('pages/cart', $data);

    }


    public function addToCart() {

        
        if (($_SERVER['REQUEST_METHOD'] == 'POST') && (!empty($_SESSION['user_ID'])  && ($_SESSION['user_type'] == 'Buyer'))) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            if((!empty($_POST['quantity'])) && (!empty($_POST['delivery'])) ){

                $data = [
                    'quantity' => $_POST['quantity'], 
                    'itemId' => $_POST['itemId'], 
                    'uId' => $_POST['uId'],
                    'selectedDeliveryMethod' => $_POST['delivery'],
   
    
                    
                ];
    
                
                // error_log(print_r($data, TRUE)); 
    
                // Check if the cart item already exists for this combination of itemId and uId
                if ($existingCartItem = $this->cartModel->getCartItem($data)) {            
                    // If the cart item already exists, update the quantity
                    // $data['quantity'] += $existingCartItem->Quantity;
                    // $data['quantity'] += intval($existingCartItem->Quantity);
                    $data['quantity'] = intval($data['quantity']) + intval($existingCartItem->Quantity);
    
    
                    if ($this->cartModel->updateCartItem(['uId'=>$existingCartItem->U_Id,'quantity' => $data['quantity'] , 'itemId' => $data['itemId'] , 'selectedDeliveryMethod' => $data['selectedDeliveryMethod']])) {
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
                    $viewItem['selectedDeliveryMethod'] = $item['selectedDeliveryMethod'];
                    $viewItem['Unit_type'] = $item['Unit_type'];
                    $viewItem['Unit_size'] = $item['Unit_size'];
                    array_push($data, $viewItem);
    
    
                }
                // $mergedArray = array_merge($data1, $data);
                // $data = array_unique($mergedArray);
                $this->view('pages/cart', $data);
                // redirect('Cart/checkout');
            }


            
        }elseif(!empty($_SESSION['user_ID']) && ($_SESSION['user_type'] != 'Buyer')  ){

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
                $viewItem['selectedDeliveryMethod'] = $item['selectedDeliveryMethod'];
                $viewItem['Unit_type'] = $item['Unit_type'];
                $viewItem['Unit_size'] = $item['Unit_size'];

                array_push($data, $viewItem);
            }


            $this->view('pages/cart', $data);


        } else {
            
            die('Failed to delete the item from the cart.');
        }

    }



        



   
}







?>

