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
                        <h3><a href="<?php echo URLROOT?>/Vehicle_item/getcatergorized_items?Category_name=<?php echo $category->Category_name; ?>"><?php echo $category->Category_name; ?>  </a></h3>
                    </div>

                <?php endforeach; ?>



                
                
                
                
                
            </div>  
        </div>
        
    </section>
<!--  -->
    



<?php

// print_r($data);
foreach($data['items'] as $item):
?>

<!--  -->


    <!--Product List-->
    <section class="product-section container">
        <!-- <h2 class="title">Featured Products</h2> -->
        <a href="<?php echo URLROOT?>/Vechile_orders/details?V_Id=<?php echo $item->V_Id;?>">
            <div class="product-container">
                <!-- Hardcode this part -->
                
                
                <div class="product">
                    <img src="<?php echo URLROOT?>/public/images/vehicleRenter/<?php echo $item->Image;?>"/>
                    <div class="product-description">
                        <h3>For Rent!</h3>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4> LKR <?php echo $item->Rental_Fee;?></h4>
                        <h4> <?php echo $item->Charging_Unit;?></h4>
                    </div>
                </div>
            </div>
            <input type="hidden" name="V_Id" value="<?php echo $item->V_Id;?>">
        </a>
    </section>



<?php endforeach;?>

<?php require APPROOT . '/views/inc/footer.php'; ?>







