<?php require APPROOT . '/views/inc/header.php'; ?>
<?php //include URLROOT . '/public/css/components/product_view.css';?>
<?php require APPROOT . '/views/inc/components/navbars/logged_nav.php'; ?>


<section id="productDetails" class="section-p1">
        <div class="single-pro-image">
            <img src="<?php echo URLROOT?>/public/images/products/Coconut-APM-D-1.png" width="100%" id="MainImg" alt=""> 
        </div>

        <div class="single-pro-details">
            <h6>Home / Fertilizer / Coconut Fertilizer</h6>
            <h2>Hayleys's Coconut APM(D) Fertilizer</h2>
            <div class="flex-seller-name">
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <span>Wijitha Fertilizer, Elpitiya, Matara</span>
            </div>
            <hr>
            <div class="price-tag">
                <h3> 430.00 LKR / 1KG </h3>
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
            </div>
            <hr>

            <h4>Delivery Method:</h4>
           
                <div>
                  <input type="radio" id="homedelivery" name="delivery" value="homedelivery" checked />
                  <label for="homedelivery">Home-Delivery (+500LKR delivery charges may apply)</label>
                </div>
              
                <div>
                  <input type="radio" id="instorepick" name="delivery" value="instorepick" />
                  <label for="instorepick">In-Store-Pickup</label>
                </div>
       

            <div class="button-area">
                <Button >BUY NOW</Button>
                <form action="<?php echo URLROOT; ?>/Cart/addToCart" method="POST">
                    <input type="hidden" name="unitPrice" value="430.00">
                    <input type="hidden" name="quantity" value="2">
                    <input type="hidden" name="itemId" value="12">
                    <input type="hidden" name="uId" value=<?php echo$_SESSION['user_ID']?>>
                    <button type="submit">ADD TO CART</button>
                </form>


            </div>
            

        </div>
    </section>

    <section id="productDescription" class="section-p2">
        <h3>Product Details</h3>
        <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            </p>

            <ul class="custom-list2">
                <li>Lorem ipsum dolor sit amet</li>
                <li>Lorem ipsum dolor sit amet</li>
                <li>Lorem ipsum dolor sit amet</li>
                <li>Lorem ipsum dolor sit amet</li>
                <li>Lorem ipsum dolor sit amet</li>
            </ul>
    </section>

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

<?php require APPROOT . '/views/inc/footer.php'; ?>  