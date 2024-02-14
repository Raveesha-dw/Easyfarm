<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php';?>

<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/components/fullcalendar.min.css">

        <div class="wrapper_v_product_details">

            <div class="column4" >
                <?php $product = $data;?>
                <!-- <?php print_r($product['unavailableDates']);?> -->

                <div class="box">
                    <div class="wrapper_v_product_details_sub">

                        <p><b> <?php echo $product['V_category']; ?> for Renting : <?php echo $data['V_number']; ?></b></p><br>
                        <?php //TODO:Add the colomn for the database -->> post created time ?>
                        <p> Posted on 02 Jan 10:04 am, <?php echo $product['Address']; ?></p>

                        <section id="vehicleDetails" class="section-p1">
                            <div class="single-pro-image">
                                <img src="<?php echo URLROOT ?>/public/images/vehicleRenter/<?php echo $product['Image']; ?> " width="100%" id="MainImg" alt="">
                            </div>
                        </section>
                    </div>


                    <div class="change_popup">
                        <div class="wrapper_v_product_details_sub">
                            <p><b>Description</b>
                            <a class="open-button" onclick="openForm()"> Change </a></p><br>
                            <p> Type : <?php echo $product['V_category']; ?></p><br>
                            <p> <?php echo $product['Description']; ?> </p>
                        </div>


                        <div class="popup-form" id="popupForm">
                            <form action="<?php echo URLROOT ?>/V_post/update_description" method="post" class="form-container" id="formData">
                                <h4 id="popupTitle">Change Description</h4><br>
                                <textarea id="Description" name="Description" rows="10" cols="500" required><?php echo $data['Description']; ?></textarea><br><br>

                                <input type="hidden" name="V_Id" value=<?php echo $product['V_Id']; ?>>





                                <button type="button" class="btn ok" onclick="handleOk()">OK</button>
                                <button type="button" class="btn cancel" onclick="closeForm()">Cancel</button>
                            </form>
                        </div>

                    </div>

                </div>

                <div class="wrapper_v_product_details_sub">
                    <p><b>Calendar</b></p><br>
                    <div class="wrapperCalendar">
                        <p><I>Update the unavailable dates for renting</p></I>
                        <div class="cal" >

                            <?php
                                // Encode $dates array as JSON
                                $datesJson = json_encode($product['unavailableDates']);?>
                            <div id='calendar' data-dates='<?php echo $datesJson; ?>'>
                            </div><br><br>
                            <form action="<?php echo URLROOT ?>/V_post/update_calendar" method="post" class="form-container" id="formData">
                            <input type="hidden" id="hiddenInputDates" name="markedDates">
                            <input type="hidden"  name="V_Id" value="<?php echo $data['V_Id']; ?>">
                            <button id="saveChangesButton">Save Changes</button>
                            </form>
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
        </div>

<?php require APPROOT . '/views/inc/footer.php';?>

<script src="<?php echo URLROOT ?>\public\js\jquery.min.js"></script>
<script src="<?php echo URLROOT ?>\public\js\moment.min.js"></script>
<script src="<?php echo URLROOT ?>\public\js\fullcalendar.min.js"></script>
<script src="<?php echo URLROOT ?>\public\js\Vpost_update_calendar.js"></script>


<script>
    function openForm() {
        document.getElementById("popupForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("popupForm").style.display = "none";
    }
    function handleOk() {
        // Get the form element
        var form = document.getElementById('formData');
        
        // Submit the form
        form.submit();
        
        // Close the pop-up
        closeForm();
}

</script>