<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<!-- <?php print_r($data) ?> -->

<div class="wrapper">
    <!--Menu-->
    <section class="menu">
        <div class="container">
            <h2 class="title">Featured Categories</h2>
            <div class="menu-container">

                <?php foreach ($data['v_Categories'] as $category) : ?>
                    <div class="card">
                        <i class="fa-solid fa-truck-fast"></i>
                        <h3><a href="<?php echo URLROOT ?>/Vehicle_item/getcatergorized_items?Category_name=<?php echo $category->Category_name; ?>"><?php echo $category->Category_name; ?> </a></h3>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>

    </section>
    <!--  -->



 <!-- <form action="<?php echo URLROOT ?>/product/productSearch" method="POST">
        <div class="search-container">
            <input type="text" id="search" name="search" class="search-bar" placeholder="Search for product...">
            <button type="submit">Search</button>
            <a href="<?php echo URLROOT ?>/product/productSearch">Search </a>  -->
        <!-- </div> -->
    <!-- </form> -->
 
        <!--  -->


        <!--Product List-->
        <section class="product-section container">

    

            <!-- <h2 class="title">Featured Products</h2> -->
            <div class="product-container">
                              <?php

    // print_r($data);
    foreach ($data['items'] as $item) :
    ?>
                    <!-- Hardcode this part -->


                    <div class="product">
                         <a href="<?php echo URLROOT ?>/Vechile_orders/details?V_Id=<?php echo $item->V_Id; ?>">

                        <img src="<?php echo URLROOT ?>/public/images/vehicleRenter/<?php echo $item->Image; ?>" />
                        <div class="product-description">
                            <h3>For Rent! <?php echo $item->V_category; ?></h3>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4> LKR <?php echo $item->Rental_Fee; ?></h4>
                            <h4> <?php echo $item->Charging_Unit; ?></h4>
                        </div>
                        <!-- </div> -->
                        <!-- </div> -->
                        <input type="hidden" name="V_Id" value="<?php echo $item->V_Id; ?>">
                        </a>
                    </div>
                     <?php endforeach; ?>
                
            </div>

           


        </section>


</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>