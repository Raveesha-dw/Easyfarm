<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<!-- <?php print_r($data)?> -->
<div class="wrapper">
    <!--Menu-->
    <section class="menu">
        <div class="container">
            <h2 class="title">Featured Categories</h2>
            <div class="menu-container">
                <div class="card">
                    <i class="fas fa-carrot"></i>
                    <h3><a href="<?php echo URLROOT?>/Product/productVeg">Vegetables</a></h3>
                </div>
                <div class="card">
                    <i class="fas fa-apple-alt"></i>
                    <h3><a href="<?php echo URLROOT?>/Product/productFruit">Fruits</a></h3>
                </div>
                <div class="card">
                    <i class="fa-solid fa-wheat-awn"></i>
                    <h3><a href="<?php echo URLROOT?>/Product/productGrains">Grains</a></h3>
                </div>
                <div class="card">
                    <i class="fas fas fa-seedling"></i>
                    <h3><a href="<?php echo URLROOT?>/Product/productPlantsSeeds">Plants & Seeds</a></h3>
                </div>
                <div class="card">
                    <i class="fa-solid fa-sun-plant-wilt"></i>
                    <h3><a href="<?php echo URLROOT?>/Product/productFertilizer"> Fertilizers </a></h3>
                </div>
                <div class="card">
                    <i class="fa-solid fa-bug-slash"></i>
                    <h3><a href="<?php echo URLROOT?>/Product/productInsecticides">Insecticides</a></h3>
                </div>
                <!-- <div class="card">
                    <i class="fa-solid fa-tractor"></i>
                    <h3>Farming Vehicles</h3>
                </div> -->
                <div class="card">
                    <i class="fa-solid fa-trowel"></i>
                    <h3>Tools & Machinery</h3>
                </div>
            </div>  
        </div>
    </section>

    <form action="<?php echo URLROOT ?>/product/productSearch" method="POST">
        <div class="search-container">
            <input type="text" id="search" name="search" class="search-bar" placeholder="Search for product...">
            <button type="submit">Search</button>
            <!-- <a href="<?php echo URLROOT?>/product/productSearch">Search </a>  -->
        </div>
    </form>

    <section class="product-section container"> 
    <?php
    if (isset($data['search']) && is_array($data['search'])) { ?>
        <h2><strong>Search Results...</strong></h2>
        <?php    
        foreach($data['search'] as $result):
        ?>
        
        
        <a href="<?php echo URLROOT?>/Product/ProductPage/<?php echo $result->Item_Id?>">
        <div class="product-container">
            <div class="product">
            <img src="<?php echo URLROOT?>/public/images/seller/<?php echo $result->Image?>" alt="">
            <?php echo $result->Image?>
            <div class="product-description">
                <h3><?php echo $result->Item_name ?></h3>
                <p>Rs. <?php echo $result->Unit_price ?></p>
            </div>
            </div>
        </div>
        </a>

    <?php
    endforeach;
    }
    // else{
    //     echo 'No search results available.';
    // }
    ?>
    <hr>
    </section>


<!--Product List-->
<section class="product-section container">
        <!-- <h2 class="title">Featured Products</h2> -->
            <div class="product-container">
                    
                <?php 

                // $products =$data['product_all'];
                if (isset($data['product_all']) && is_array($data['product_all'])) {
                foreach($data['product_all'] as $product): 
                ?>           
                
                <div class="product">
                <a href="<?php echo URLROOT?>/Product/ProductPage/<?php echo $product->Item_Id?>">
                    <img src="<?php echo URLROOT?>/public/images/seller/<?php echo $product->Image;?>"/>

                    <div class="product-description">
                        <h3><?php echo $product->Item_name ?> For Sale!</h3>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4><?php echo $product->Unit_price ?> LKR</h4>
                    </div>
                    <a href="<?php echo URLROOT?>/Cart/showCart"><i class="fas fa-shopping-cart cart"></i></a>
                </a>
                </div>

            <?php 
        endforeach; }
        ?>
            

            </div>
    </section>
</div>
    

<?php require APPROOT . '/views/inc/footer.php'; ?>