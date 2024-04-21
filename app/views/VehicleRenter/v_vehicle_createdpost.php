<div class="headebr">


    <div>
        <?php require APPROOT . '/views/inc/header.php'; ?>
        <?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
    </div>



    <div class="container">
       <?php require APPROOT . '/views/Vechile/v_renter_side_bar.php' ?>

        <section class="home">

        <?php $products = json_decode(json_encode($data), true);?>

        <div class="wrapperVcreatedPost">

            <!--Posts-->
            <div class="product-container" id="product-vehicle-container">

                <?php $products = $data;?>
                
                <?php foreach ($products as $product): ?>

                    <div class="productt" id="product-vehicle">

                    <a   href="http://localhost/Easyfarm/V_post/view_more_booking_details?V_Id=<?php echo $product->V_Id; ?>">
                        <img src="<?php echo URLROOT ?>/public/images/vehicleRenter/<?php echo $product->Image; ?> " alt="" class="poost1">

                            <br><br><br>
                            <p><?php echo $product->V_category; ?> For Rent - <?php echo $product->V_number; ?></p><br>
                            <p>LKR <?php echo $product->Rental_Fee; ?> - <?php echo $product->Charging_Unit; ?></p>
   
                    </a>

                        <div class="button-n">
                            <input  type="hidden" name="V_Id" value="<?php echo $product->V_Id; ?>">
                            
                            <a   href="http://localhost/Easyfarm/V_post/update_Product?V_Id=<?php echo $product->V_Id; ?>">

                            <button class ="btn2">update</button></a>
                

                                <form onsubmit="return showRemoveConfirmation();" method="post" action="<?php echo URLROOT ?>/V_post/delete_product">
                                    
                                    <input type="hidden" name="V_Id" value="<?php echo $product->V_Id; ?>">
                                    <button type="submit" class="buttonn" id="btnv3" name="delete_item">Delete</button>
                                </form>
                        </div>
                    </div>
                <?php endforeach?>
            </div>
        </div>





            <script>

                // Function to show the remove confirmation popup
                function showRemoveConfirmation() {

                    return confirm('Are you sure you want to delete this item?');
                        // Handle item removal here, e.g., by making an AJAX request

                }


            </script>


            <?php require APPROOT . '/views/inc/footer.php';?>

        </section>
    </div>
</div>
