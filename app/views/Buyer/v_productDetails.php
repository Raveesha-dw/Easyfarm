<div class="header">
<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php';?>
<br>
</div>
<?php
$productDetails = $data['productInfo'];

$sellerDetails = $data['sellerInfo'];
$productReviews = $data['itemReviews'];
$inquiries = $data['inquiries'];

?>
<div class="container_v_productDetails">
<div class="column_01">


<section id="productDetails" class="section-p1">
        <div class="single-pro-image">
            <img src="<?php echo URLROOT ?>/public/images/seller/<?php echo $productDetails->Image ?> " width="100%" id="MainImg" alt="">
        </div>

        <!-- <form action="<?php echo URLROOT; ?>/BuyNow/buyNow" method="POST"> -->

        <div class="single-pro-details">
            <!-- <h6>Home / Plants and Seeds </h6> -->
            <h2><?php echo $productDetails->Item_name ?></h2>
            <br><br>
            <hr><br><br>
            <div class="flex-seller-name">
            <span>Seller: <?php echo $sellerDetails->Store_Name ?> </span><br>
            <span>Store Address :   <?php echo $sellerDetails->Store_Adress ?></span>
            <br><br>
            <span><?php echo $productDetails->Description; ?></span>
                
            </div>





</section>













<!-- Product Description -->
<!-- <section id="productDescription" class="section-p2">

    <h3>Product Details</h3>
    <hr>
        <p> <?php echo $productDetails->Description; ?>
        </p>

        <ul class="custom-list2">
            <li>Lorem ipsum dolor sit amet</li>
            <li>Lorem ipsum dolor sit amet</li>
            <li>Lorem ipsum dolor sit amet</li>
            <li>Lorem ipsum dolor sit amet</li>
            <li>Lorem ipsum dolor sit amet</li>
        </ul>
</section> -->

<!-- Product Reviews -->
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

<!-- Product Inquries -->
<section id ="questionSection" class="section-p4">
    <div class="comment-section bg-light p-4 mt-5">
        <h3>Questions About This Product</h3>
        <hr>

        <!-- Editor -->
        <?php
if (isset($_SESSION['user_ID']) && $sellerDetails->U_Id != $_SESSION['user_ID']) {
    ?>

                <div class="question-card">
                    <form action="<?php echo URLROOT . '/Inquiry/askQuestion' ?>" method='POST'>
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_ID']; ?>">
                        <input type="hidden" name="product_id" value="<?php echo $productDetails->Item_Id; ?>">
                        <input type="hidden" name="datetime_posted" value="<?php echo date('Y-m-d H:i:s'); ?>">
                        <textarea name="question" id="question" cols="100" rows="4" placeholder="Ask Seller a question"></textarea>
                        <br>
                        <button type="submit">Ask Question</button>
                    </form>
                </div>

        <?php
} else {
    echo "<br><span>Please login as a buyer to ask questions.</span><br><br><br>";
}
?>

        <!-- Display Questions -->
        <?php
foreach ($inquiries as $inquiry):
?>

            <!-- Question card -->
            <div class="comment-card">
                <p>
                    <b><?php echo $inquiry->userName; ?></b> asks, <br><br>
                    <?php echo $inquiry->question; ?> <br><br>
                    <i><?php echo $inquiry->datetime_last_edited; ?></i><br>
                </p>

                <!-- Answer -->
                <?php
if ($inquiry->answer) {
    ?>
                    <div class="comment-card">
                        <b><?php echo $sellerDetails->Name; ?></b> replies, <br><br>
                        <?php echo $inquiry->answer; ?> <br><br>
                        <i><?php echo $inquiry->answer_datetime_edited; ?></i>
                        <?php
if (isset($_SESSION['user_ID']) && $sellerDetails->U_Id == $_SESSION['user_ID']) {
        ?>
                                <!-- Edit Answer -->
                                <button class="comment-edit-btn display-0 display-1">Edit</button>
                                <div class="edit-form display-0" style="display:none;">
                                    <form action="<?php echo URLROOT . '/Inquiry/editAnswer' ?>" method="POST">
                                        <input type="hidden" name="question_id" value="<?php echo $inquiry->question_id; ?>">
                                        <input type="hidden" name="product_id" value="<?php echo $productDetails->Item_Id; ?>">
                                        <input type="hidden" name="datetime" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                        <textarea name="edited_answer" cols="100" rows="4"><?php echo $inquiry->answer; ?></textarea><br><br><br>
                                        <button class="btn btn-save" type="submit">Save</button>
                                    </form>
                                    <button class="btn btn-cancel display-1">Cancel</button>
                                </div>

                                <!-- Delete Answer -->
                                <form class="delete-form" action="<?php echo URLROOT . '/Inquiry/deleteAnswer' ?>" onclick='confirmDeleteAnswer()' method="POST">
                                    <input type="hidden" name="question_id" value="<?php echo $inquiry->question_id; ?>">
                                    <input type="hidden" name="product_id" value="<?php echo $productDetails->Item_Id; ?>">
                                    <input type="submit" name="answerDelete" value="Delete">
                                </form>
                <?php
}
    ?>
                    </div>
                <?php
}

if (isset($_SESSION['user_ID'])) {
    if ($inquiry->user_id == $_SESSION['user_ID']) {
        ?>
                            <!-- Edit Question -->
                            <button class="comment-edit-btn display-0 display-1">Edit</button>
                            <div class="edit-form display-0" style="display:none;">
                                <form action="<?php echo URLROOT . '/Inquiry/editQuestion' ?>" method="POST">
                                    <input type="hidden" name="question_id" value="<?php echo $inquiry->question_id; ?>">
                                    <input type="hidden" name="product_id" value="<?php echo $productDetails->Item_Id; ?>">
                                    <input type="hidden" name="datetime" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                    <textarea name="edited_question" cols="100" rows="4"><?php echo $inquiry->question; ?></textarea><br><br><br>
                                    <button class="btn btn-save" type="submit">Save</button>
                                </form>
                                <button class="btn btn-cancel display-1">Cancel</button>
                            </div>

                            <!-- Delete Question -->
                            <form class="delete-form" action="<?php echo URLROOT . '/Inquiry/deleteQuestion' ?>" onclick='confirmDeleteQestion()' method="POST">
                                <input type="hidden" name="question_id" value="<?php echo $inquiry->question_id; ?>">
                                <input type="hidden" name="product_id" value="<?php echo $productDetails->Item_Id; ?>">
                                <input type="submit" name="questionDelete" value="Delete">
                            </form>
                <?php
}

    // If the logged in user is the seller who posted the ad, he/she can reply
    if ($sellerDetails->U_Id == $_SESSION['user_ID'] && empty($inquiry->answer)) {
        ?>
                            <!-- Answer Question -->
                            <button class="btn btn-answer display-0 display-1">Answer</button>
                            <div class="edit-form display-0" style="display:none;">
                                <form action="<?php echo URLROOT . '/Inquiry/answerQuestion' ?>" method="POST">
                                    <input type="hidden" name="question_id" value="<?php echo $inquiry->question_id; ?>">
                                    <input type="hidden" name="product_id" value="<?php echo $productDetails->Item_Id; ?>">
                                    <input type="hidden" name="answer_datetime" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                    <textarea name="answer" cols="100" rows="4"></textarea><br><br><br>
                                    <button class="btn btn-save" type="submit">Answer</button>
                                </form>
                                <button class="btn btn-cancel display-1">Cancel</button>
                            </div>
                <?php
}
}
?>
            </div>

        <?php
endforeach;
?>
    </div>
</section>


</div>

<div class="column_02" id ="buynow_cart">

<div class="section-p9" id="section-p9">



<!-- buynow and addto cart part -->
<div id="productDetails" >
<form>
<div class="single-pro-details">

        <form>
            <div class="price-tag">
                <h3 id="unit-price" >Unit Price :<?php echo $productDetails->Unit_price ?> LKR / <?php echo $productDetails->Unit_size ?> <?php echo $productDetails->Unit_type ?> </h3>
                <br>
                <label for="quantity">Amount:</label>
                <input type="number" id="quantity" name="quantity" min="<?php echo $productDetails->Unit_size ?>" step="<?php echo $productDetails->Unit_size ?>" oninput="updateHiddenField()"> <?php echo $productDetails->Unit_type ?>




            </div>
        </form>
        <br><br>
        <hr>
        <form>
            <br>
        <h4>Delivery Method:</h4><br>
<div class="deliverymethod">

        <?php if ($productDetails->DeliveryMethod == "Home Delivery"): ?>

                <div>
                <input type="radio" id="homedelivery" name="delivery" value="Home Delivery" oninput="updateHiddenDelivery()"  />
                <label for="homedelivery">Home Delivery</label>
            </div>

        <?php elseif ($productDetails->DeliveryMethod == "Insto Pickup"): ?>

                <div>
                <input type="radio" id="instorepick" name="delivery" value="In-Store-Pickup" oninput="updateHiddenDelivery()"/>
                <label for="instorepick">In-Store-Pickup</label>
                </div>

        <?php elseif ($productDetails->DeliveryMethod == "Home Delivery, Insto Pickup"): ?>
            <div>
                <input type="radio" id="homedelivery" name="delivery" value="Home Delivery" oninput="updateHiddenDelivery()"  />
                <label for="homedelivery">Home Delivery</label>
            </div>
            <div>
                <input type="radio" id="instorepick" name="delivery" value="In-Store-Pickup" oninput="updateHiddenDelivery()"/>
                <label for="instorepick">In-Store-Pickup</label>
            </div>
        <?php endif;?>
</div>
        </form>


                <div class="button-area">

                    <form action="<?php echo URLROOT; ?>/BuyNow/buyNow" method="POST" onsubmit="return validateForm('buyNow')">



                        <?php if (!empty($_SESSION['user_ID'])): ?>

                            <input type="hidden" id="hiddenDelivery1" name="delivery">
                            <input type="hidden" id="hiddenQuantity1" name="quantity">
                            <input type="hidden" name="itemId" value=<?php echo $productDetails->Item_Id ?>>

                            <input type="hidden" name="uId" value=<?php echo $_SESSION['user_ID'] ?>>
                            <button type="submit" >BUY NOW</button>

                        <?php else: ?>
                            <button type="submit">BUY NOW</button>


                        <?php endif;?>
                    </form>





                    <form action="<?php echo URLROOT; ?>/Cart/addToCart" method="POST" onsubmit="return validateForm('addToCart')">


                        <?php if (!empty($_SESSION['user_ID'])): ?>

                            <input type="hidden" id="hiddenDelivery2" name="delivery">
                            <input type="hidden" id="hiddenQuantity2" name="quantity">
                            <input type="hidden" name="itemId" value=<?php echo $productDetails->Item_Id ?>>

                            <input type="hidden" name="uId" value=<?php echo $_SESSION['user_ID'] ?>>
                            <button type="submit" >ADD TO CART</button>

                        <?php else: ?>
                            <button type="submit">ADD TO CART</button>


                        <?php endif;?>
                    </form>





            </div>
            </div>
</div>

</div>
</div>


<div id="myModal" class="modalcart_buynow">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <p id="modalMessage"></p><br><br>
        <button onclick="closeModal()">Ok</button>
    </div>
</div>



</div>






<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>

    function showRegisterConfirmation() {

            var result = window.confirm("You have to login to the easyFarm .");
    
    }

    $(document).ready(function () {
        $(".display-1").on("click", function () {
            var commentDiv = $(this).closest(".comment-card");
            commentDiv.find(".display-0").toggle();
        });
    });

    function confirmDeleteQuestion(){
    var result = confirm('Are you sure you want to delete this question?');
    if (result == false){
    event.preventDefault();
        }
    }

    function confirmDeleteAnswer(){
    var result = confirm('Are you sure you want to delete this answer?');
    if (result == false){
    event.preventDefault();
        }
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






    // function validateForm(formType) {
    //     var quantity = document.getElementById('quantity').value;
    //     var delivery = document.querySelector('input[name="delivery"]:checked');

    //     if (!quantity || !delivery) {
    //         alert('Please enter quantity and select delivery method.');
    //         return false;
    //     }

    //     if (formType === 'buyNow') {
    //         document.getElementById('hiddenQuantity1').value = quantity;
    //         document.getElementById('hiddenDelivery1').value = delivery.value;
    //     } else if (formType === 'addToCart') {
    //         document.getElementById('hiddenQuantity2').value = quantity;
    //         document.getElementById('hiddenDelivery2').value = delivery.value;
    //     }

    //     return true;
    // }

 function openModal(message) {
        var modal = document.getElementById("myModal");
        var modalMessage = document.getElementById("modalMessage");
        modal.style.display = "block";
        modalMessage.innerText = message;
    }

    function closeModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    }

    function validateForm(formType) {
        var quantity = document.getElementById('quantity').value;
        var delivery = document.querySelector('input[name="delivery"]:checked');

        if (!quantity || !delivery) {
            openModal('Please enter quantity and select delivery method correctly.');
            return false;
        }

        if (formType === 'buyNow') {
            document.getElementById('hiddenQuantity1').value = quantity;
            document.getElementById('hiddenDelivery1').value = delivery.value;
        } else if (formType === 'addToCart') {
            document.getElementById('hiddenQuantity2').value = quantity;
            document.getElementById('hiddenDelivery2').value = delivery.value;
        }

        return true;
    }
































  window.onscroll = function() {scrollFunction()};

  function scrollFunction() {
    var element = document.getElementById("section-p9");
    var footer = document.getElementById("footer");

    // Distance from the top of the viewport when the element should become sticky
    var stickyThreshold = 100;

    // Distance from the top of the viewport to the footer
    var footerOffset = footer.getBoundingClientRect().top;

    if (window.pageYOffset >= stickyThreshold && window.innerHeight - footerOffset > element.clientHeight) {
      element.style.position = "sticky";
      element.style.top = "1";
    } else {
      element.style.position = "static";
    }
  }





    </script>


<div class="footer">
<?php require APPROOT . '/views/inc/footer.php';?>
</div>




