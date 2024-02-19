<div class="headebr">


    <div>
        <?php require APPROOT . '/views/inc/header.php'; ?>
        <?php require APPROOT . '/views/inc/components/navbars/seller_nav.php'; ?>
    </div>


    <div class="container">
        <?php require APPROOT . '/views/seller/a.php' ?>

        <section class="home">

            <?php $products = json_decode(json_encode($data), true); ?>
























            <!-- if(isset($_POST['delete_item'])) {
    $this->db=new Database();
    

} -->


            <div class="hero">
                <!-- <nav>
            <img src="<?php echo URLROOT ?>/public/images/seller/logo.png" alt=""  class="logo">
            <img src="<?php echo URLROOT ?>/public/images/seller/user.png" alt="" class="user-pic" onclick="toggleMenu()">


                <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                            <img src="<?php echo URLROOT ?>/public/images/seller/user.png" alt="">
                            <h3>imalka Dhananja </h2>
                        </div>
                        <hr>
                        
                        <a href="#" class="sub-menu-link">
                            <img src="<?php echo URLROOT ?>/public/images/seller/profile.png" alt="">
                            <p>Edit Profile</p>
                            <span></span>
                        </a>

                        <a href="#" class="sub-menu-link">
                            <img src="<?php echo URLROOT ?>/public/images/seller/logout.png" alt="">
                            <p>Log Out</p>
                            <span></span>
                        </a>

                    </div>
                </div>
            </nav> -->







                <!--Posts-->
                <div class="product-container" id="product-seller-container">
                    <?php $products = $data; ?>
                    

                    <?php foreach ($products as $product) : ?>

                        <div class="productt" id="product-seller">


                            <img src="<?php echo URLROOT ?>/public/images/seller/<?php echo $product->Image; ?> " alt="" class="poost1">
                            <!-- <?php echo $product->Image; ?> -->



                            <div class="name">

                                <b id="namee1"> <?php echo $product->Item_name; ?> </b>

                                <b id="price1"> Rs. <?php echo $product->Unit_price; ?> </b>



                            </div>


                            <!--<div class="buttonn">
                            <a href="http://localhost/Easyfarm/Pages/updateProduct?id=<?php echo $product->Item_Id; ?>">
                            <button id="btn2" >Update</button>
                            </a>-->

                            <div class="button-n">
                                <input type="hidden" name="Item_Id" value="<?php echo $product->Item_Id; ?>">

                                <button class="btn2"><a href="http://localhost/Easyfarm/Seller_post/update_Product?id=<?php echo $product->Item_Id; ?>">update</a></button>
                                <!-- <p>Update  </p>
                                    </a> -->
                                <form onsubmit="showRemoveConfirmation( );" method="post" action="<?php echo URLROOT ?>/Seller_post/delete_product">
                                    <input type="hidden" name="Item_Id" value="<?php echo $product->Item_Id; ?>">
                                    <button type="submit" class="buttonn" id="btnv3" name="delete_item">Delete</button>
                                </form>
                            </div>

                        </div>
                    <?php endforeach ?>
                </div>

            </div>





            <?php require APPROOT . '/views/inc/footer.php'; ?>

        </section>
    </div>
</div>









<script>
    // Function to show the remove confirmation popup
    function showRemoveConfirmation() {
        return confirm('Are you sure you want to delete this item?');
        // Handle item removal here, e.g., by making an AJAX request

    }
</script>


</div>