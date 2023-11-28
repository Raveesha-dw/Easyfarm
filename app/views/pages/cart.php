<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/logged_nav.php'; ?>

    
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
                <form action="<?php echo URLROOT ?>/Cart/checkout" method="post">
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
                        
                        $cartTotal = 0.00;
                        
                        if (!empty($cartItems)) {
                           
                            foreach ($cartItems as $cartItem) {
                                
                                if (is_array($cartItem)) {
                                    $cartTotal += ($cartItem['quantity'] * $cartItem['unitPrice']);
                                }
                                
                                // $cartTotal += ($cartItem['quantity'] * $cartItem['unitPrice']);
                            }
                        }
                    ?>
              
                    <?php if (!empty($cartItems)) : ?>
                        <?php foreach ($cartItems as $item) : ?>
                            <?php if (is_array($cartItem)) : ?>
                            
                                <tr class="cartItm" data-item-id="<?php echo $item['itemId']; ?>">
                                    <td>
                                        <div class="cart-info">
                                            
                                            <img src="<?php echo URLROOT?>/public/images/products/Coconut-APM-D-1.png" alt="<?php echo $item['itemName']; ?>">
                                            <div>
                                                <h4><?php echo $item['itemName']; ?></h4>
                                                <small>Price: LKR <?php echo number_format($item['unitPrice'], 2); ?></small><br>
                                                <!-- Add a "Remove" link with an onclick event to trigger the popup message -->
                                                    <a  onclick="showRemoveConfirmation('<?php echo $item['itemId']; ?>' )" href="<?php echo URLROOT ?>/Cart/deleteItem?itemId=<?php echo $item['itemId']; ?>&uId=<?php echo $item['uId']; ?>">Remove</a>                                         
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" min=1 class="quantity-input" name="quantitiesTo[]" data-item-id="<?php echo $item['itemId']; ?>" data-item-uprice="<?php echo $item['unitPrice']; ?>"  value="<?php echo $item['quantity']; ?>">      
                                        <input type="hidden" name="itemIds[]" value="<?php echo $item['itemId']; ?>">                                   
                                    </td>
                                    <td class="subtotal" data-item-id="<?php echo $item['itemId']; ?>">LKR <span class="subtotal-value"><?php echo number_format($item['unitPrice'] * $item['quantity'], 2); ?></span></td>                                
                                </tr>   
                            <?php endif; ?>                        
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
                                <input type="hidden" name="uId" value=<?php echo$_SESSION['user_ID']?>>
                                <button type="submit" class="btn">Checkout</button>
                            </div>                        
                        </div>
                        </td>
                        </tr>
                        <?php endif; ?>

                    </div>
                </tbody>
                </form>
            </table>
    </section>
</div> 
                    


<script>

    let quantityInputs = document.querySelectorAll('.quantity-input');
    let subtotalsubtotalElements = document.querySelectorAll('.subtotal .subtotal-value');
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
                subtotalsubtotalElements = document.querySelectorAll('.subtotal .subtotal-value')
                recalculateTotal();                
            }
        }
    }

    // Function to recalculate the total
    function recalculateTotal() {

        let cartTotal = 0;

        for (var i = 0; i < subtotalsubtotalElements.length; i++) {
            var currentElement = subtotalsubtotalElements[i];
            cartTotal += parseFloat(currentElement.textContent.replace(',',''));     
        }

        cartTotalElement.textContent =  cartTotal.toFixed(2);
    }
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>


