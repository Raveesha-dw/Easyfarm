

<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

    
<div class="wrapperCart">
    <div class="column1">
        <div class ="sidebar">
            <h3 >DASHBOARD</h3>
            <hr>
            <ul>
                <button id ="Cart" class="active">Shopping Cart </button><br>
                <button id ="Order">My orders</button><br>
                <button id ="rate">My Ratings</button>

            </ul>
            
        </div>
    </div>

            <section id="cart" class="section-c1">
            <div class="small-container cart-page">
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $cartItems =$data;
                        // $cartItems = array(
                        //     array(
                        //         'itemId' => 12,
                        //         'itemName' => 'Product 1',
                        //         'image' =>   'vegi2.jpg',
                        //         'unitPrice' => 168.00,
                        //         'quantity' => 5,
                        //     ),
                        //     array(
                        //         'itemId' => 34,
                        //         'itemName' => 'Product 2',
                        //         'image' => 'vegi2.jpg',
                        //         'unitPrice' => 15.00,
                        //         'quantity' => 4,
                        //     ),
                        //     array(
                        //         'itemId' => 32,
                        //         'itemName' => 'Product 3',
                        //         'image' => 'product3.jpg',
                        //         'unitPrice' => 5.00,
                        //         'quantity' => 10,
                        //     ), $data
                            
                        // );
                        
                        $cartTotal = 0.00;
                        
                        if (!empty($cartItems)) {
                            foreach ($cartItems as $cartItem) {
                                $cartTotal += ($cartItem['quantity'] * $cartItem['unitPrice']);
                            }
                        }
 
                    
                    ?>


                
                    <?php if (!empty($cartItems)) : ?>
                        <?php foreach ($cartItems as $item) : ?>
                            
                            <tr class="cartItm" data-item-id="<?php echo $item['itemId']; ?>">
                                <td>
                                    <div class="cart-info">
                                        
                                        <img src="<?php echo URLROOT?>/public/images/products/vegi2.jpg" alt="<?php echo $item['itemName']; ?>">
                                        <div>
                                            <h4><?php echo $item['itemName']; ?></h4>
                                            <small>Price: LKR <?php echo number_format($item['unitPrice'], 2); ?></small><br>
                                            <!-- Add a "Remove" link with an onclick event to trigger the popup message -->
                                            
                                                <a  onclick="showRemoveConfirmation('<?php echo $item['itemId']; ?>' )" href="<?php echo URLROOT ?>/Cart/deleteItem?itemId=<?php echo $item['itemId']; ?>&uId=<?php echo $item['uId']; ?>">Remove</a>
                                         
                                            
                    
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    <form action="<?php echo URLROOT ?>/Cart/addToCart" method="post">
                                    <input type="number" class="quantity-input" name="quantity" id="quantity" data-item-id="<?php echo $item['itemId']; ?>" data-item-uprice="<?php echo $item['unitPrice']; ?>"  value="<?php echo $item['quantity']; ?>">      
                                    <input type="hidden" name="uId" value="71">
                                    <input type="hidden" name="itemId" value="34">
                                    </form>
                                </td>

                                <td class="subtotal" id="subtotal" data-item-id="<?php echo $item['itemId']; ?>">LKR <span class="subtotal-value"><?php echo number_format($item['unitPrice'] * $item['quantity'], 2); ?></span></td>
                                
                            </tr>
                            
                        <?php endforeach; ?>
                    <?php else : ?>
                    <tr>
                        <td colspan="3">Your cart is empty.</td>
                    </tr>
                    <?php endif; ?>

                    <?php if (!empty($cartItems)) : ?>
                        <tr>
                        <td colspan="3">
                        <div class="total_checkout">
                            <div class="cart-total">
                                <p>Total: LKR <span class="cart-total-value"><?php echo number_format($cartTotal, 2); ?></span></p>
                            </div>

                            <div class="checkout-button">
                            <a href="<?php echo URLROOT; ?>/Cart/checkout?itemId=<?php echo $item['itemId']; ?>">Checkout</a>
                            </div>
                        </div>
                        </td>
                        </tr>
                        <?php endif; ?>
                    </div>

                </tbody>
            </table>
        


    </section>
</div> 

<script>
    let quantityInputs = document.querySelectorAll('.quantity-input');
    let subtotalElements = document.querySelectorAll('.subtotal .subtotal-value');
    let cartTotalElement = document.querySelector('.cart-total-value');

    // Function to update subtotal and total
    function updateSubtotalAndTotal(itemId, newQuantity, unitPrice) {
        let subtotalElement = document.querySelector(`.subtotal[data-item-id="${itemId}"] .subtotal-value`);
        let newSubtotal = newQuantity * unitPrice;
        subtotalElement.textContent =  newSubtotal.toFixed(2);

        recalculateTotal();

    }

    
    // Add event listeners to quantity input fields
    quantityInputs.forEach(input => {

        input.addEventListener('input', function () {
            let itemId = this.getAttribute('data-item-id');
            let uprice = this.getAttribute('data-item-uprice');
            let newQuantity = parseInt(this.value);
           
            // Update the subtotal and total
            updateSubtotalAndTotal(itemId, newQuantity, uprice);
        });
    });

    // Function to show the remove confirmation popup
    function showRemoveConfirmation(itemId) {
        if (confirm('Are you sure you want to remove this item from your cart?')) {
            // Handle item removal here, e.g., by making an AJAX request
            let itemRow = document.querySelector(`tr[data-item-id="${itemId}"]`);
            if (itemRow) {
     
                quantityInputs = document.querySelectorAll('.quantity-input');
                subtotalElements = document.querySelectorAll('.subtotal .subtotal-value')
                recalculateTotal();

                // let remainRows = document.querySelectorAll('cartItm');

                // remainRows.forEach(input => {
                //     input.addEventListener('laod', function () {
                //         recalculateTotal();
                //     });
                // });

                
            }
        }
    }

    // Function to recalculate the total
    function recalculateTotal() {

        let cartTotal = Array.from(subtotalElements).reduce((sum, subtotalElement) => {
            return sum + parseFloat(subtotalElement.textContent.replace('LKR ', ''));
        }, 0);
        cartTotalElement.textContent =  cartTotal.toFixed(2);
    }
</script>



<?php require APPROOT . '/views/inc/footer.php'; ?>


