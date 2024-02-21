<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<br>

<?php

print_r($data);
foreach($data['Categorized_items'] as $Categorized_item):
?>

<!--  -->


    <!--Product List-->
    <section class="product-section container">
        <!-- <h2 class="title">Featured Products</h2> -->
        <a href="<?php echo URLROOT?>/Vechile_orders/details?V_Id=<?php echo $Categorized_item->V_Id;?>">
            <div class="product-container">
                <!-- Hardcode this part -->
                
                
                <div class="product">
                    <img src="<?php echo URLROOT?>/public/images/vehicleRenter/<?php echo $Categorized_item->Image;?>"/>
                    <div class="product-description">
                        <h3>For Rent!</h3>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4> LKR <?php echo $Categorized_item->Rental_Fee;?></h4>
                        <h4> <?php echo $Categorized_item->Charging_Unit;?></h4>
                    </div>
                </div>
            </div>
            <input type="hidden" name="V_Id" value="<?php echo $Categorized_item->V_Id;?>">
        </a>
    </section>



<?php endforeach;?>

<?php require APPROOT . '/views/inc/footer.php'; ?>  