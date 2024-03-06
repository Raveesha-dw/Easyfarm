
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
    
<div class="wrapperCart">
    <!-- <div class="column1">
        <div class ="sidebar">
            <h3 >DASHBOARD</h3>
            <hr>
            <ul>
                <button id ="Cart" class="active">Shopping Cart </button><br>
                <button id ="Order">My orders</button><br>
                <button id ="rate">My Ratings</button>

            </ul>
            
        </div>
    </div> -->

    <section id="cart" class="section-c1">
        <div class="small-container cart-page">
            
            <table>
                <form action="<?php echo URLROOT ?>/BuyNow/checkout" method="post">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    // print_r($data);
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
                                            
                                            <img src="<?php echo URLROOT?>/public/images/seller/<?php echo $item['Image']?> " alt="<?php echo $item['itemName']; ?>">
                                            <div>
                                                
                                                <h4><?php echo $item['itemName']; ?></h4>
                                                <small>Price: LKR <?php echo number_format($item['unitPrice'], 2); ?> / <?php echo $item['Unit_size']?> <?php echo $item['Unit_type']?> </small><br>
                                                <!-- Add a "Remove" link with an onclick event to trigger the popup message -->
                                                    <a  onclick="showRemoveConfirmation('<?php echo $item['itemId']; ?>' )" href="<?php echo URLROOT ?>/Cart/deleteItem?itemId=<?php echo $item['itemId']; ?>&uId=<?php echo $item['uId']; ?>">Remove</a>                                         
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <!-- <input type="number" min=1 class="quantity-input" name="quantitiesTo[]" data-item-id="<?php echo $item['itemId']; ?>" data-item-uprice="<?php echo $item['unitPrice']; ?>"  value="<?php echo $item['quantity']; ?>">   -->
                                        <input type="number" class="quantity-input" name="quantitiesTo[]" min="<?php echo $item['Unit_size']?>" step="<?php echo $item['Unit_size']?>" data-item-id="<?php echo $item['itemId']; ?>" data-item-uprice="<?php echo $item['unitPrice']; ?>" data-item-usize="<?php echo $item['Unit_size']; ?>" value="<?php echo $item['quantity']; ?>">
    
                                        <input type="hidden" name="itemIds[]" value="<?php echo $item['itemId']; ?>"> 
                                        <input type="hidden" name="selectedDeliveryMethods[]" value="<?php echo $item['selectedDeliveryMethod']; ?>">                                   
                                    </td>
                                    <td class="subtotal"  data-item-id="<?php echo $item['itemId']; ?>">LKR <span class="subtotal-value"><?php echo number_format($item['unitPrice'] * ($item['quantity']/$item['Unit_size']), 2); ?></span></td>                                
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
    let subtotalElements = document.querySelectorAll('.subtotal .subtotal-value');
    let cartTotalElement = document.querySelector('.cart-total-value');

    // Function to update subtotal and total
    function updateSubtotalAndTotal(itemId, newQuantity, unitPrice, usize) {
        let subtotalElement = document.querySelector(`.subtotal[data-item-id="${itemId}"] .subtotal-value`);
        let newSubtotal = newQuantity * unitPrice / usize;
        subtotalElement.textContent = newSubtotal.toFixed(2);

        recalculateTotal();
    }

    // Add event listeners to quantity input fields
    quantityInputs.forEach(input => {
        input.addEventListener('input', function () {
            let itemId = this.getAttribute('data-item-id');
            let uprice = this.getAttribute('data-item-uprice');
            let usize = this.getAttribute('data-item-usize');
            let newQuantity = parseInt(this.value);
            // Update the subtotal and total
            updateSubtotalAndTotal(itemId, newQuantity, uprice, usize);
        });
    });

    // Call recalculateTotal initially to ensure correct total on page load
    recalculateTotal();

    // Function to show the remove confirmation popup
    function showRemoveConfirmation(itemId) {
        if (confirm('Are you sure you want to remove this item from your cart?')) {
            window.location.href = '<?php echo URLROOT ?>/Cart/deleteItem?itemId=' + itemId;

            // Handle item removal here, e.g., by making an AJAX request
            let itemRow = document.querySelector(`tr[data-item-id="${itemId}"]`);
            if (itemRow) {
                quantityInputs = document.querySelectorAll('.quantity-input');
                subtotalElements = document.querySelectorAll('.subtotal .subtotal-value');
                recalculateTotal();
            }
        } else {
            // If cancel is clicked, prevent the default action (navigating to the delete URL)
            event.preventDefault();
        }
    }

    // Function to recalculate the total
    function recalculateTotal() {
        let cartTotal = 0;

        for (var i = 0; i < subtotalElements.length; i++) {
            var currentElement = subtotalElements[i];
            cartTotal += parseFloat(currentElement.textContent.replace(',', ''));
        }

        cartTotalElement.textContent = cartTotal.toFixed(2);
    }



</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>