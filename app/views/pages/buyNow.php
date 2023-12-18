<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapperBuyNow">

                <div class="column4" >


                <div class="box">
                    <div class="wrapperBuyNow_sub">
                            <p><b> Delivered to :</b></p>
                            <p> <?php echo $data['Name']; ?></p>
                            <p> <?php echo $data['Contact_num']; ?> </p>
                            <p> <?php echo $data['Address']; ?>
                                <a class="open-button" onclick="openForm()" > Change </a>
                            </p>
                            <p> Email to <?php echo $data['Email']; ?></p>
                        </div>


                    <!-- <a class="open-button" onclick="openForm()" action="<?php echo URLROOT?>/pages/BuyNow" >
                        <div class="wrapperBuyNow_sub">
                            <p> + Add new delivery address</p>
                        </div>
                    </a>    -->
                 </div>
       
                    
    

                    <div class="wrapperBuyNow_sub">
                        <section id="productDetails" class="section-p1">
                            <div class="row">
                                <!-- <div class="column1" > -->
                                    <div class="single-pro-image">
                                        <img src="<?php echo URLROOT?>/public/images/products/vegi2.jpg" width="100%" id="MainImg" alt=""> 
                                    <!-- </div> -->
                                </div>
                            </div>

                                <div class="row">
                                    <div class="column1" >
                                        <p>Name:</p>
                                    </div>
                                    <div class="column2" >
                                        <p><?php echo $data['Item_name']; ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="column1" >
                                        <p>Delivery Method:</p>
                                    </div>
                                    <div class="column2" >
                                        <p><?php echo $data['DeliveryMethod']; ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="column1" >
                                        <p>Quantity:</p>
                                    </div>
                                    <div class="column2" >
                                        <p><?php echo $data['quantity']; ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="column1" >
                                        <p>Total :</p>
                                    </div>
                                    <div class="column2" >
                                        <p><?php echo $data['total']; ?></p>
                                    </div>
                                </div>
                        </section>       
                        </div>

                    



                </div>
                <div class="column5" >
                    <div class="wrapperBuyNow_sub">
                        <p><b>Order Summary</b></p>
                        <div class="row">
                            <div class="column1" >
                                <p>Item Total </p>
                            </div>
                            <div class="column2" >
                                <p><?php echo $data['total']; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="column1" >
                                <p>Delivery Fee</p>
                            </div>
                            <div class="column2" >
                                <p><?php echo $data['deliveryFee']; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="column1" >
                                <p>Total Payment</p>
                            </div>
                            <div class="column2" >
                                <p><?php echo $data['totalPayment']; ?></p>
                            </div>
                        </div>

                        <form action="?php echo URLROOT; ?>Pages/payment">
                            <br><button type="submit" class="btn" >Place Order</button>
                        </form>

         
                    </div>
                </div>





                <!-- <div class="editAddress"> -->
                    <div class="form-popup" id="myForm">
                    <!-- <form action="/action_page.php" class="form-container"> -->
                    <form action="<?php echo URLROOT ?>/Users/register" method="POST" class="form-container"> 
             
                    <p><b>Change the Address</b><br></p>

                        <p class="type">Address </p>
                        <div class="input-box">
                            <input type="text" name="address" placeholder="Enter address" required value="">
                            <i class='bx bxs-edit-location'></i>
                            <!-- <span class="invalid"><?php echo $data['address_err']; ?></span> -->
                        </div>

                        <p class="type">City </p>
                        <div class="input-box">
                            <input type="text" name="city" placeholder="Enter the City" required value="">
                            <i class='bx bxs-edit-location'></i>
                            <!-- <span class="invalid"><?php echo $data['address_err']; ?></span> -->
                        </div>
                        
                        <p class="type">District </p>
                        <div class="input-box">
                            <input type="text" name="district" placeholder="Enter the District" required value="">
                            <i class='bx bxs-edit-location'></i>
                            <!-- <span class="invalid"><?php echo $data['address_err']; ?></span> -->
                        </div>

                        <br><button type="submit" class="btn" onclick="closeForm()">Save Changes</button>
                    
                    
                    </form>
                    </div>
                <!-- </div> -->


</div>






 

<?php require APPROOT . '/views/inc/footer.php'; ?>       



<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>