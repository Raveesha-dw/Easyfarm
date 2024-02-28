<div class="headebr">


    <div>
        <?php require APPROOT . '/views/inc/header.php'; ?>
        <?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
    </div>


    <div class="container">
        <?php require APPROOT . '/views/seller/a.php' ?>

        <section class="home">

            <?php $products = json_decode(json_encode($data), true); ?>
















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

     <form id="deleteForm" method="post" action="<?php echo URLROOT ?>/Seller_post/delete_product">
    <input type="hidden" name="Item_Id" id="Item_Id" value="">
    <button type="button" class="buttonn" id="btnv3" onclick="showRemoveConfirmation(<?php echo $product->Item_Id; ?>)">Delete</button>
</form>


                            </div>

                        </div>
                    <?php endforeach ?>
                </div>

            </div>









<div id="removeConfirmationModal" class="modal1">
    <div class="modal-content1">
        <p>Are you sure you want to delete this item?</p>
        <button id="modal-ok-btn" onclick="submitDeleteForm()">OK</button>
        <button onclick="hideRemoveConfirmation()">Cancel</button>
    </div>
</div>








            <?php require APPROOT . '/views/inc/footer.php'; ?>

        </section>
    </div>
</div>









<script>
    // Function to show the remove confirmation popup

    // function showRemoveConfirmation() {
    //     return confirm('Are you sure you want to delete this item?');
    //     // Handle item removal here, e.g., by making an AJAX request
    // }
function showRemoveConfirmation(itemId) {
    // Set the value of the hidden input field
    document.getElementById('Item_Id').value = itemId;
    // Show the confirmation modal
    var modal = document.getElementById("removeConfirmationModal");
    modal.style.display = "block";
}


function hideRemoveConfirmation() {
    var modal = document.getElementById("removeConfirmationModal");
    modal.style.display = "none";
}

function submitDeleteForm() {
    // Submit the form
    document.getElementById("deleteForm").submit();
    // Close the modal after submission
    hideRemoveConfirmation();
}



    
</script>
<style>
    .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: 1% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 20%;
    text-align: center;
}

.modal-content button {
    margin: 5px;
}

/* Modal OK button */
#modal-ok-btn {
    background-color: green;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

/* Modal Cancel button */
.modal-content button {
    background-color: red;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

/* Optional: Add hover effect */
#modal-ok-btn:hover,
.modal-content button:hover {
    opacity: 0.8;
}


</style>


</div>