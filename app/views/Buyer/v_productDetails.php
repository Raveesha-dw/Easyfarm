<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<br>

<?php
$productDetails = $data['productInfo'];
// print_r($productDetails);

$sellerDetails = $data['sellerInfo'];
// print_r($sellerDetails);

$productReviews = $data['itemReviews'];
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

                    <form action="<?php echo URLROOT; ?>/BuyNow/buyNow" method="POST">



                        <?php if (!empty($_SESSION['user_ID'])) : ?>
                            
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="itemId" value=<?php echo $productDetails->Item_Id?>>

                            <input type="hidden" name="uId" value=<?php echo$_SESSION['user_ID']?>>
                            <button type="submit" >BUY NOW</button>
                                                    
                        <?php else : ?>                       
                        <!-- <button type="submit" onclick="showRegisterConfirmation()">ADD TO CART</button> -->
                            <button type="submit">BUY NOW</button>


                        <?php endif; ?>   
                    </form>





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

<?php require APPROOT . '/views/inc/footer.php'; ?>  