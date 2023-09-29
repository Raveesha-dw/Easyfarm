<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapper">
    <!--Menu-->
    <section class="menu">
        <div class="container">
            <h2 class="title">Featured Categories</h2>
            <div class="menu-container">
                <div class="card">
                    <i class="fas fa-carrot"></i>
                    <h3>Vegetables</h3>
                </div>
                <div class="card">
                    <i class="fas fa-apple-alt"></i>
                    <h3>Fruits</h3>
                </div>
                <div class="card">
                    <i class="fa-solid fa-wheat-awn"></i>
                    <h3>Grains</h3>
                </div>
                <div class="card">
                    <i class="fas fas fa-seedling"></i>
                    <h3>Plants & Seeds</h3>
                </div>
                <div class="card">
                    <i class="fa-solid fa-sun-plant-wilt"></i>
                    <h3>Fertilizers</h3>
                </div>
                <div class="card">
                    <i class="fa-solid fa-bug-slash"></i>
                    <h3>Insecticides</h3>
                </div>
                <div class="card">
                    <i class="fa-solid fa-tractor"></i>
                    <h3>Farming Vehicles</h3>
                </div>
                <div class="card">
                    <i class="fa-solid fa-trowel"></i>
                    <h3>Tools & Machinery</h3>
                </div>
            </div>  
        </div>
    </section>

    <!--Product List-->
    <section class="product-section container">
        <!-- <h2 class="title">Featured Products</h2> -->
            <div class="product-container">
                <?php 
                for ($i = 1; $i <= 9; $i++) {
                ?>           
                
                <div class="product">
                    <img src="<?php echo URLROOT?>/public/images/products/vegi2.jpg" alt="">
                    <div class="product-description">
                        <h3>Vegetables For Sale!</h3>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>450 LKR</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
                </div>

                <?php
                }
                ?>
            </div>
    </section>
</div>
    

<?php require APPROOT . '/views/inc/footer.php'; ?>