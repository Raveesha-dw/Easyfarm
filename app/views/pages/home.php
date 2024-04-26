<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
 

<!-- <?php print_r($data ) ?> -->
<div class="wrapper">
    <!--Menu-->
    <section class="menu">
        <div class="container">
            <h2 class="title">Featured Categories</h2>

            <div class="menu-container">
            <?php 
            foreach ($data['categories'] as $category){ ?>

                <div class="card">
                    <i class="<?php echo $category->icon ?>"></i>
                    <h3><a href="<?php echo URLROOT ?>/Product/productCategory/<?php echo $category->category ?>"><?php echo $category->category ?></a></h3>
                </div>

           <?php }
            ?>
            </div>

          
        </div>
    </section>

    <!-- <form action="<?php echo URLROOT ?>/product/productSearch" method="POST">
        <div class="search-container">
            <input type="text" id="search" name="search" class="search-bar" placeholder="Search for product...">
            <button type="submit">Search</button>
            
        </div>
    </form> -->

    

   


      
        <!-- <?php
        if (isset($data['search']) && is_array($data['search'])) { ?> -->
            <!-- <h2><strong>Search Results...</strong></h2> -->
            <!-- <?php
            foreach ($data['search'] as $result) :
            ?> -->


                <!-- <a href="<?php echo URLROOT ?>/Product/ProductPage/<?php echo $result->Item_Id ?>">
                    <div class="product-container">
                        <div class="product">
                            <img src="<?php echo URLROOT ?>/public/images/seller/<?php echo $result->Image ?>" alt=""> -->
                            <!-- <?php echo $result->Image ?> -->
                            <!-- <div class="product-description">
                                <h3><?php echo $result->Item_name ?></h3>
                                <p>Rs. <?php echo $result->Unit_price ?></p>
                            </div>
                        </div>
                    </div>

                    

                </a> -->

        <!-- <?php
            endforeach;
        }   
       
        ?> -->
        <hr>
    </section>


    <!--Product List-->
    <section class="product-section container">

       
 <section class="product-section container">

        <div class = "filters">

            <select class="form-control" name="sort" id ="sort">
                <option selected="" disabled="" >Sort by Default </option>
                <option value="l2h">Price low to high</option>
                <option value="h2l">Price high to low</option>
            </select>


 </div>    




          
        <!-- <h2 class="title">Featured Products</h2> -->
        <div class="product-container">

            <?php

            // $products =$data['product_all'];
            if (isset($data['product_all']) && is_array($data['product_all'])) {
                foreach ($data['product_all'] as $product) :
            ?>

                    <div class="product">
                        <a href="<?php echo URLROOT ?>/Product/ProductPage/<?php echo $product->Item_Id ?>">
                            <img src="<?php echo URLROOT ?>/public/images/seller/<?php echo $product->Image; ?>" />

                            <div class="product-description">
                                <h3><?php echo $product->Item_name ?>...</h3>
                                <!-- <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div> -->
                                <h4><?php echo $product->Unit_price ?> LKR / <?php echo $product->Unit_size ?> <?php echo $product->Unit_type ?></h4><br>
                            </div>
                            <!-- <a href="<?php echo URLROOT?>/Cart/showCart"><i class="fas fa-shopping-cart cart"></i></a> -->
                        </a>
                    </div>

            <?php
                endforeach;
            }
            ?>


        </div>
    </section>
</div>

<!-- Add this script at the end of your HTML body or in a separate JavaScript file -->
<script>
    document.getElementById('sort').addEventListener('change', function() {
        var productsContainer = document.querySelector('.product-container');
        var products = Array.from(productsContainer.querySelectorAll('.product'));

        var sortValue = this.value;

        products.sort(function(a, b) {
            var priceA = parseFloat(a.querySelector('.product-description h4').textContent);
            var priceB = parseFloat(b.querySelector('.product-description h4').textContent);

            if (sortValue === 'l2h') {
                return priceA - priceB;
            } else if (sortValue === 'h2l') {
                return priceB - priceA;
            }
        });

        // Clear the products container
        productsContainer.innerHTML = '';

        // Append sorted products to the container
        products.forEach(function(product) {
            productsContainer.appendChild(product);
        });
    });
</script>



<?php require APPROOT . '/views/inc/footer.php'; ?>