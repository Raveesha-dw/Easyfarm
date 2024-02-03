<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php';?>

<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/components/fullcalendar.min.css">

<div class="wrapper_v_product_details">

                <div class="column4" >
<?php print_r($data);?>

                <div class="box">
                    <div class="wrapper_v_product_details_sub">
                            <p><b> <?php echo $data['V_category']; ?> for Renting : <?php echo $data['V_number']; ?></b></p><br>
                            <?php //TODO:Add the colomn for the database -->> post created time ?>
                            <p> Posted on 02 Jan 10:04 am, <?php echo $data['Address']; ?></p>
                            <!-- <img src="<?php echo URLROOT ?>/public/images/products/vegi2.jpg" width="100%" id="MainImg" alt="">  -->

                        <!-- </div> -->

                 <!-- </div> -->








                    <!-- <div class="wrapper_v_product_details_sub"> -->
                        <!-- <p><b> <?php echo $data['Item_name']; ?></b></p> -->
                        <section id="vehicleDetails" class="section-p1">
                            <!-- <div class="row"> -->
                                <!-- <div class="column1" > -->
                                    <div class="single-pro-image">
                                        <img src="<?php echo URLROOT ?>/public/images/vehicleRenter/1704697213_images.jpeg" width="100%" id="MainImg" alt="">
                                        <!-- <img src="<?php echo URLROOT ?>/public/images/vehicleRenter/<?php echo $product->Image; ?> " alt="" class="poost1"> -->
                                    <!-- </div> -->
                                </div>
                            <!-- </div> -->

                        </section>
                        </div>







                   <div class="wrapper_v_product_details_sub">
                            <p><b>Description</b>
                            <a class="open-button" onclick="openForm()" > Change </a></p><br>
                             <p> Type : <?php echo $data['V_category']; ?></p><br>
                            <p> <?php echo $data['Description']; ?> </p>
                            <!-- <img src="<?php echo URLROOT ?>/public/images/products/vegi2.jpg" width="100%" id="MainImg" alt="">  -->

                        <!-- </div> -->

                 <!-- </div> -->











                    <!-- <div class="wrapper_v_product_details_sub"> -->
                        <!-- <p><b> <?php echo $data['Item_name']; ?></b></p> -->
                        <!-- <section id="vehicleDetails" class="section-p1"> -->
                            <!-- <div class="row"> -->
                                <!-- <div class="column1" > -->
                                    <!-- <div class="single-pro-image"> -->
                                        <!-- <img src="<?php echo URLROOT ?>/public/images/products/vegi2.jpg" width="100%" id="MainImg" alt="">  -->
                                    <!-- </div> -->
                                <!-- </div> -->
                            <!-- </div>

                        </section>        -->
                        </div>








                        </div>

                    <div class="wrapper_v_product_details_sub">
                        <p><b>Calendar</b></p><br>
                                <div class="wrapperCalendar">
            <p><I>Unavailable dates for renting</p></I>
                <div class="cal" >
                    <div class="response"></div>
                    <div id='calendar'>
                        <!-- <input type="hidden" id="hidden_V_Id" value="<?php echo $data['uId']; ?>"> -->
                    </div>
                </div>
                    </div>



                    </div>





                </div>
                <div class="column5">
                    <div class="wrapper_v_product_details_sub">
                        <p><b>Charge</b></p><br>
                        <div class="row">
                            <div class="column1" >
                                <p> <?php echo $data['V_category']; ?></p>
                            </div>
                            <div class="column2" >
                                <p>Per day</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="column1" >
                                <p>Contact number</p>
                            </div>
                            <div class="column2" >
                                <p><?php echo $data['Contact_Number']; ?></p>
                            </div>
                        </div>


                        <div class="row">
                            <div class="column1" >
                                <p>For rent by </p>
                            </div>
                            <div class="column2" >
                                <p><?php echo $data['V_name']; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="column1" >
                                <p>Location :</p>
                            </div>
                            <div class="column2" >
                                <p><?php echo $data['Address']; ?></p>
                            </div>
                        </div>




                           <!-- <br><button type="submit" id="btn" class="btn" onclick="paymentGateway();">Place Order</button> -->


                           <!-- <input type="hidden" id="hiddenuId" value="<?php echo $data['uId']; ?>">
                           <input type="hidden" id="hiddenTotalpayment" value="<?php echo $orderPayment; ?>">
                            -->
                                <?php if (!empty($orderItems)): ?>
                                    <?php foreach ($orderItems as $data): ?>
                                        <?php if (is_array($data)): ?>


                                            <input type="hidden" id="hiddenSubTotalpayment[]" value="<?php echo number_format($data['totalPayment'], 2); ?>">
                                            <input type="hidden" id="hiddenItem_Id[]" value="<?php echo $data['Item_Id']; ?>">

                                            <input type="hidden" id="hiddenquantity[]" value="<?php echo $data['quantity']; ?>">



                                        <?php endif;?>
                                    <?php endforeach;?>
                                <?php endif;?>




                    </div>


































                </div>





                <!-- <div class="editAddress"> -->
                    <div class="form-popup" id="myForm">
                    <!-- <form action="/action_page.php" class="form-container"> -->
                    <form action="<?php echo URLROOT ?>/V_post/updateDescription" method="POST" class="form-container">

                    <p><b>Change the Description</b><br></p>

                        <p class="type">Description </p>
                        <div class="input-box">
                            <input type="text" name="Description" placeholder="Enter Description" required value="<?php echo $data['Description']; ?>">
                          
                            <!-- <span class="invalid"><?php echo $data['address_err']; ?></span> -->
                        </div>


                    <input type="hidden" name="uId" value=<?php echo $_SESSION['user_ID'] ?>>

                    <?php if (!empty($orderItems)): ?>
                            <?php foreach ($orderItems as $data): ?>
                                <?php if (is_array($data)): ?>

                                <!-- <input type="hidden" name="user_type" value="Buyer"> -->

                                <input type="hidden" name="quantitiesTo[]" value=<?php echo $data['quantity']; ?>>
                                <input type="hidden" name="itemIds[]" value=<?php echo $data['Item_Id']; ?>>
                                <input type="hidden" name="selectedDeliveryMethods[]" value=<?php echo $data['selectedDeliveryMethod']; ?>>
                                <input type="hidden" name="totals[]" value=<?php echo $data['total']; ?>>
                                <input type="hidden" name="deliveryFees[]" value=<?php echo $data['deliveryFee']; ?>>
                                <input type="hidden" name="totalPayments[]" value=<?php echo $data['totalPayment']; ?>>



                            <?php endif;?>
                            <?php endforeach;?>
                        <?php endif;?>









                        <br><button type="submit" class="btn" onclick="closeForm()">Save Changes</button>


                    </form>
                    </div>
                <!-- </div> -->


</div>








<?php require APPROOT . '/views/inc/footer.php';?>



<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

<script src="<?php echo URLROOT ?>\public\js\payment.js"></script>



<script src="<?php echo URLROOT ?>\public\js\jquery.min.js"></script>
<script src="<?php echo URLROOT ?>\public\js\moment.min.js"></script>
<script src="<?php echo URLROOT ?>\public\js\fullcalendar.min.js"></script>
<script src="<?php echo URLROOT ?>\public\js\Vpost_calender.js"></script>


