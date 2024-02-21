<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<br>

<?php
$productDetails = $data['productInfo'];
print_r($productDetails);

$sellerDetails = $data['sellerInfo'];
// print_r($sellerDetails);

$productReviews = $data['itemReviews'];
?>

<section id="productDetails" class="section-p1">
        <div class="single-pro-image">
            <img src="<?php echo URLROOT?>/public/images/products/vegi2.jpg" width="100%" id="MainImg" alt=""> 
        </div>

        <!-- <form action="<?php echo URLROOT; ?>/BuyNow/buyNow" method="POST"> -->

        <div class="single-pro-details">
            <h6>Home / Plants and Seeds </h6>
            <h2><?php echo $productDetails->Item_name?></h2>
            <div class="flex-seller-name">
            <span>Seller: <?php echo $sellerDetails->Store_Name?> , <?php echo $sellerDetails->Store_Adress?></span>
            </div> 
        <hr>
        <form>
            <div class="price-tag">
                <h3 id="unit-price" >Unit Price:<?php echo $productDetails->Unit_price?> LKR / <?php echo $productDetails->Unit_size?> <?php echo $productDetails->Unit_type?> </h3>
                <label for="quantity">Amount:</label>
                <input type="number" id="quantity" name="quantity" min="<?php echo $productDetails->Unit_size?>" step="<?php echo $productDetails->Unit_size?>" oninput="updateHiddenField()">
                 
                <!-- <br><br> -->
                <!-- <label for="total-price">Total Price:</label>
                <span id="total-price"><?php echo number_format($item['unitPrice'] * $item['quantity'], 2); ?></span> -->

                <!-- <h4 id="total-price">Total Price : <?php echo $productDetails->Unit_price?>*<?php echo $productDetails->Unit_price?></h4>  -->
<!-- 
                <h4  label for="total-price">Total Price : </label>
                <h4 id="total-price"><?php echo number_format($productDetails->Unit_price * $item['quantity'], 2); ?></h4> 

                <h4>Number of units : <?php echo $productDetails->Unit_price?></h4>
                <h4>Size of the product : </h4> -->


            </div>
        </form>
        <hr>
        <form>
        <h4>Delivery Method:</h4>

        <?php if ($productDetails->DeliveryMethod == "Home Delivery") : ?>
            <div>
                <input type="radio" id="homedelivery" name="delivery" value="homedelivery" oninput="updateHiddenDelivery()"  />
                <label for="homedelivery">Home Delivery</label>
            </div>

        <?php elseif ($productDetails->DeliveryMethod == "In-store Pickup") : ?>
            <div>
                <input type="radio" id="instorepick" name="delivery" value="In-Store-Pickup" oninput="updateHiddenDelivery()"/>
                <label for="instorepick">In-Store-Pickup</label>
            </div>
        <?php elseif ($productDetails->DeliveryMethod == "Home Delivery, In-store Pickup") : ?>
            <div>
                <input type="radio" id="homedelivery" name="delivery" value="Home Delivery" oninput="updateHiddenDelivery()"  />
                <label for="homedelivery">Home Delivery</label>
            </div>
            <div>
                <input type="radio" id="instorepick" name="delivery" value="In-Store-Pickup" oninput="updateHiddenDelivery()"/>
                <label for="instorepick">In-Store-Pickup</label>
            </div>
        <?php endif; ?>   

        </form>
        <!-- <?php
            $delivery = $sellerDetails->DeliveryMethod; 

            if($delivery == 'In-store Pickup'){
                ?>
                <div>
                <input type="radio" id="instorepick" name="delivery" value="instorepick" />
                <label for="instorepick">In-Store-Pickup</label>
                </div>
                <?php
            }
            elseif($delivery == 'Home Delivery'){
                ?>
                <div>
            <input type="radio" id="homedelivery" name="delivery" value="homedelivery" checked />
            <label for="homedelivery">Home Delivery </label>
            </div>
            <?php
            }
            else{
                ?>
                 <div>
            <input type="radio" id="homedelivery" name="delivery" value="homedelivery" checked />
            <label for="homedelivery">Home Delivery</label>
            </div>

            <div>
            <input type="radio" id="instorepick" name="delivery" value="instorepick" />
            <label for="instorepick">In-Store-Pickup</label>
            </div>
            <?php
            }
            ?> -->
            
                <div class="button-area">

                    <form action="<?php echo URLROOT; ?>/BuyNow/buyNow" method="POST">



                        <?php if (!empty($_SESSION['user_ID'])) : ?>
                            
                            <input type="hidden" id="hiddenDelivery1" name="delivery">
                            <input type="hidden" id="hiddenQuantity1" name="quantity">
                            <input type="hidden" name="itemId" value=<?php echo $productDetails->Item_Id?>>

                            <input type="hidden" name="uId" value=<?php echo$_SESSION['user_ID']?>>
                            <button type="submit" >BUY NOW</button>
                                                    
                        <?php else : ?>                       
                        <!-- <button type="submit" onclick="showRegisterConfirmation()">ADD TO CART</button> -->
                            <button type="submit">BUY NOW</button>


                        <?php endif; ?>   
                    </form>





                    <form action="<?php echo URLROOT; ?>/Cart/addToCart" method="POST">

                            <!-- <input type="hidden" id="hiddenQuantity" name="quantity"> -->


                        <?php if (!empty($_SESSION['user_ID'])) : ?>

                            <input type="hidden" id="hiddenDelivery2" name="delivery">
                            <input type="hidden" id="hiddenQuantity2" name="quantity">
                            <input type="hidden" name="itemId" value=<?php echo $productDetails->Item_Id?>>
                            
                            <input type="hidden" name="uId" value=<?php echo$_SESSION['user_ID']?>>
                            <button type="submit" >ADD TO CART</button>
                                                        
                        <?php else : ?>                       
                            <!-- <button type="submit" onclick="showRegisterConfirmation()">ADD TO CART</button> -->
                            <button type="submit">ADD TO CART</button>
                            
                           
                        <?php endif; ?>   
                    </form>
            


           

            </div>
            </div>
</section>

<section id="productDescription" class="section-p2">
        <h3>Product Details</h3>
        <hr>
            <p> <?php echo $productDetails->Description ?>
            </p>

            <ul class="custom-list2">
                <li>Lorem ipsum dolor sit amet</li>
                <li>Lorem ipsum dolor sit amet</li>
                <li>Lorem ipsum dolor sit amet</li>
                <li>Lorem ipsum dolor sit amet</li>
                <li>Lorem ipsum dolor sit amet</li>
            </ul>
    </section>

    <!-- Change from here onwards -->
    <section id="reviewSection" class="section-p3">
        <div class="no-container">
            <h3>Product Ratings</h3>
            <hr>
            <div class="rating">
                <div class="rating-title">Overall Rating</div>
                <div class="stars"> 
                    <span class="star">&#9733;</span>
                    <span class="star">&#9733;</span>
                    <span class="star">&#9733;</span>
                    <span class="star">&#9733;</span>
                    <span class="star">&#9733;</span>
                </div>
                <div class="rating-bar">
                    <div class="bar">
                        <div class="bar-fill" style="width: 80%;"></div>
                    </div>
                    <div class="bar-label">5 Stars (80%)</div>
                </div>
                <div class="rating-bar">
                    <div class="bar">
                        <div class="bar-fill" style="width: 15%;"></div>
                    </div>
                    <div class="bar-label">4 Stars (15%)</div>
                </div>
                <div class="rating-bar">
                    <div class="bar">
                        <div class="bar-fill" style="width: 5%;"></div>
                    </div>
                    <div class="bar-label">3 Stars (5%)</div>
                </div>
                <div class="rating-bar">
                    <div class="bar">
                        <div class="bar-fill" style="width: 0%;"></div>
                    </div>
                    <div class="bar-label">2 Stars (0%)</div>
                </div>
                <div class="rating-bar">
                    <div class="bar">
                        <div class="bar-fill" style="width: 0%;"></div>
                    </div>
                    <div class="bar-label">1 Star (0%)</div>
                </div>
            </div>
        </div>
    </section>

    <section id ="questionSection" class="section-p4">
        <div class="no-container">
            <h3>Questions About This Product</h3>
            <hr>


            <div class="question-card">
                <div class="question"><i class="fas fa-question-circle"></i>
                    <h3>Q: Is this product available to buy wholesale?</h3>
                </div>
                <div class="answer"><i class="fas fa-check-circle"></i>
                    <p>A: Yes, this product can be purchased any amount upto 50kg</p>
                </div>
            </div>

            <div class="question-card">
                <div class="question">
                    <i class="fas fa-question-circle"></i>
                    <h3>Q: Can I get this delivered?</h3>
                </div>
                <div class="answer">
                    <i class="fas fa-check-circle"></i>
                    <p>A: Sorry, We do not offer delivery for this product</p>
                </div>
            </div>

            <div class="ask-question-card">
            <!-- <h2>Ask a Question</h2> -->
                <form>
                    <!-- <label for="question">Your Question:</label> -->
                    <textarea id="question" name="question" rows="4" cols="50" placeholder="Enter your question here..."></textarea><br>
                    <input type="submit" value="Ask Question">
                </form>
                <small>Your question should not contain contact information such as email, phone or external web links. 
                    Visit <a href=""> "My Orders"</a> if you have questions about your previous order.</small>
            </div>
        </div>

        <div class="pagination">
            <span class="page-number">1</span>
            <span class="page-number">2</span>
            <span class="page-number">3</span>
        </div>
    </section>

    <script>
        
        function showRegisterConfirmation() {

             var result = window.confirm("You have to login to the easyFarm .");
            //  if (result){
            //     redirect();
            //     window.location.href = "<?php echo URLROOT; ?>/Users/login";
            //  }
            //  else{
            //     return false;
            //  }
        }
        
    </script>

<script>
        function calculateTotal() {
            // Get quantity and unit price elements
            var quantityInput = document.getElementById('quantity');
            var unitPriceSpan = document.getElementById('unit-price');
            var totalPriceSpan = document.getElementById('total-price');

            // Parse quantity as an integer
            var quantity = parseInt(quantityInput.value, 10);

            // Parse unit price (assuming it's a fixed value for this example)
            var unitPrice = parseFloat(unitPriceSpan.innerText.replace('$', ''));

            // Calculate total price
            var totalPrice = quantity * unitPrice;

            // Update the total price span with the calculated value
            totalPriceSpan.innerText = 'LKR' + totalPrice.toFixed(2);

            console.log("Updated Hidden Quantity:", totalPriceSpan.innerText );
        
        }

        function updateHiddenField() {
        var quantity = document.getElementById('quantity').value;
        document.getElementById('hiddenQuantity1').value = quantity;
        document.getElementById('hiddenQuantity2').value = quantity;
        }

        function updateHiddenDelivery() {
            
            deliveryMethod = document.querySelector('input[name="delivery"]:checked').value;
            document.getElementById('hiddenDelivery1').value = deliveryMethod;
            document.getElementById('hiddenDelivery2').value = deliveryMethod;
    }


    </script>





<?php require APPROOT . '/views/inc/footer.php'; ?>  