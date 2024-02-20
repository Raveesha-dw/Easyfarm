<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>


<div class="wrapper">
    <!--Menu-->
    <section class="menu">
        <div class="container">
            <h2 class="title">Featured Categories</h2>
            <div class="menu-container">




                <?php foreach ($data['v_Categories'] as $category) : ?>
                    <div class="card">
                        <i class="fa-solid fa-truck-fast"></i>
                        <h3><a href="<?php echo URLROOT?>/Vehicle_item/<?php echo $category->Category_name; ?>"><?php echo $category->Category_name; ?>  </a></h3>
                    </div>

                <?php endforeach; ?>



                
                
                
                
                
            </div>  
        </div>
        
    </section>

    <!--Product List-->
    <section class="product-section container">
        <!-- <h2 class="title">Featured Products</h2> -->
        <a href="<?php echo URLROOT?>/Vechile_orders/details">
            <div class="product-container">
                <!-- Hardcode this part -->
                
                
                <div class="product">
                    <img src="<?php echo URLROOT?>/public/images/products/vegi2.jpg"/>
                    <div class="product-description">
                        <h3>For Rent!</h3>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4> LKR100</h4>
                        <h4> 1 Hour</h4>
                    </div>
                </div>
            </div>
    </section>
</div>
    

<?php require APPROOT . '/views/inc/footer.php'; ?>







