<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<br>

<?php
$productDetails = $data['productInfo'];
$sellerDetails = $data['sellerInfo'];
$productReviews = $data['itemReviews'];
$inquiries = $data['inquiries'];
?>

<section id="productDetails" class="section-p1">
        <div class="single-pro-image">
            <img src="<?php echo URLROOT?>/public/images/products/vegi2.jpg" width="100%" id="MainImg" alt=""> 
        </div>

        <div class="single-pro-details">
            <h6>Home / Plants and Seeds </h6>
            <h2><?php echo $productDetails->Item_name?></h2>
            <div class="flex-seller-name">
            <span>Seller: <?php echo $sellerDetails->Store_Name?> , <?php echo $sellerDetails->Store_Adress?></span>
            </div> 
        <hr>
            <div class="price-tag">
                <h3>Unit Price:<?php echo $productDetails->Unit_price?> LKR / <?php echo $productDetails->Unit_type?> </h3>
                <!-- <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1"> -->
            </div>
        <hr>

        <h4>Delivery Method:</h4>

        <div>
            <input type="radio" id="homedelivery" name="delivery" value="homedelivery" checked />
            <label for="homedelivery">Home Delivery</label>
            </div>

            <div>
            <input type="radio" id="instorepick" name="delivery" value="instorepick" />
            <label for="instorepick">In-Store-Pickup</label>
            </div>

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
                <a href=""> <Button >BUY NOW</Button> </a>

                    <form action="<?php echo URLROOT; ?>/Cart/addToCart" method="POST">

                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="itemId" value=<?php echo $productDetails->Item_Id?>>

                        <?php if (!empty($_SESSION['user_ID'])) : ?>

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

<!-- Product Description -->
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
            if(isset($_SESSION['user_ID'])){ 
        ?>

                <div class="question-card">
                    <form action="<?php echo URLROOT . '/Inquiry/askQuestion'?>" method='POST'>
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_ID'];?>">
                        <input type="hidden" name="product_id" value="<?php echo $productDetails->Item_Id;?>">
                        <input type="hidden" name="datetime_posted" value="<?php echo date('Y-m-d H:i:s');?>">
                        <textarea name="question" id="question" cols="100" rows="4" placeholder="Ask Seller a question"></textarea>
                        <br>
                        <button type="submit">Ask Question</button>
                    </form>
                </div>

        <?php            
            }else{
                echo "<br><span>Please login to ask questions.</span><br><br><br>";
            }
        ?>

        <!-- Display Questions -->
        <?php 
            foreach ($inquiries as $inquiry):
        ?>

            <!-- Question card -->
            <div class="comment-card">
                <p>
                    <b><?php echo $inquiry->userName;?></b> asks, <br><br>
                    <?php echo $inquiry->question;?> <br><br>
                    <i><?php echo $inquiry->datetime_last_edited;?></i><br>
                </p>

                <?php
                    if(isset($_SESSION['user_ID'])){
                        if($inquiry->user_id == $_SESSION['user_ID']){
                ?>
                            <!-- Edit Question -->
                            <button class="comment-edit-btn display-0 display-1">Edit</button>
                            <div class="edit-form display-0" style="display:none;">
                                <form action="<?php echo URLROOT . '/Inquiry/editQuestion'?>" method="POST">
                                    <input type="hidden" name="question_id" value="<?php echo $inquiry->question_id;?>">
                                    <input type="hidden" name="product_id" value="<?php echo $productDetails->Item_Id;?>">
                                    <input type="hidden" name="datetime" value="<?php echo date('Y-m-d H:i:s');?>">
                                    <textarea name="edited_question" cols="100" rows="4"><?php echo $inquiry->question;?></textarea><br><br><br>
                                    <button class="btn btn-save" type="submit">Save</button>
                                </form>
                                <button class="btn btn-cancel display-1">Cancel</button>
                            </div>

                            <!-- Delete Question -->
                            <form class="delete-form" action="<?php echo URLROOT . '/Inquiry/deleteQuestion'?>" onclick='confirmDelete()' method="POST">
                                <input type="hidden" name="question_id" value="<?php echo $inquiry->question_id;?>">
                                <input type="hidden" name="product_id" value="<?php echo $productDetails->Item_Id;?>">
                                <input type="submit" name="questionDelete" value="Delete">
                            </form>
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



<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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

    $(document).ready(function () {
        $(".display-1").on("click", function () {
            var commentDiv = $(this).closest(".comment-card");
            commentDiv.find(".display-0").toggle();
        });
    });

    function confirmDelete(){
    var result = confirm('Are you sure you want to delete this question?');
    if (result == false){
    event.preventDefault();
        }
    }
    
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>  