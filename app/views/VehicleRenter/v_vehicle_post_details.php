<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php';?>

<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/components/fullcalendar.min.css">

        <div class="wrapper_v_product_details">

            <div class="column4" >
                <?php $vehicle_data = $data['vehicle_data'];?>
                <?php $unconfirmed_booking_dates = $data['unconfirmed_booking_dates'];?>
                <?php $confirmed_booking_dates = $data['confirmed_booking_dates'];?>
                <?php $unavailableDates = $data['unavailableDates'];?>
                <div class="box">
                    <div class="wrapper_v_product_details_sub">

                        <p><b> <?php echo $vehicle_data['V_category']; ?> for Renting : <?php echo $vehicle_data['V_number']; ?></b></p><br>
                        <p> Posted on <?php echo $vehicle_data['post_create_date']; ?>, <?php echo $vehicle_data['Address']; ?></p>

                        <section id="vehicleDetails" class="section-p1">
                            <div class="single-pro-image">
                                <img src="<?php echo URLROOT ?>/public/images/vehicleRenter/<?php echo $vehicle_data['Image']; ?> " width="100%" id="MainImg" alt="">
                            </div>
                        </section>
                    </div>


                    <div class="change_popup">
                        <div class="wrapper_v_product_details_sub">
                            <p><b>Description</b>
                            <p> Type : <?php echo $vehicle_data['V_category']; ?></p><br>
                            <p> <?php echo $vehicle_data['Description']; ?> </p>
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
                                $datesJson = json_encode($unavailableDates);
                                $post_create_dateJson = json_encode($vehicle_data['post_create_date']);?>

                            <div id='calendar' data-dates='<?php echo $datesJson; ?>' data-create-date = '<?php echo $post_create_dateJson; ?>'>
                            </div><br><br>
                            <form action="<?php echo URLROOT ?>/V_post/update_calendar" method="post" class="form-container" id="formData">
                            <input type="hidden" id="hiddenInputDates" name="markedDates">
                            <input type="hidden"  name="V_Id" value="<?php echo $vehicle_data['V_Id']; ?>">
                            <button id="saveChangesButton">Save Changes</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="column5">
                <div class="wrapper_v_product_details_sub">
                    <p><b>Charge</b>
                    <br>
                    <div class="row">
                        <div class="column1" >
                            <p> <?php echo $vehicle_data['V_category']; ?></p>
                        </div>
                        <div class="column2" >
                            <p><?php echo $vehicle_data['Rental_Fee']; ?>  <?php echo $vehicle_data['Charging_Unit']; ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="column1" >
                            <p>Contact number</p>
                        </div>
                        <div class="column2" >
                            <p><?php echo $vehicle_data['Contact_Number']; ?></p>
                        </div>
                    </div>


                    <div class="row">
                        <div class="column1" >
                            <p>For rent by </p>
                        </div>
                        <div class="column2" >
                            <p><?php echo $vehicle_data['V_name']; ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="column1" >
                            <p>Location :</p>
                        </div>
                        <div class="column2" >
                            <p><?php echo $vehicle_data['Address']; ?></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

</div>







<?php require APPROOT . '/views/inc/footer.php';?>

<script src="<?php echo URLROOT ?>\public\js\jquery.min.js"></script>
<script src="<?php echo URLROOT ?>\public\js\moment.min.js"></script>
<script src="<?php echo URLROOT ?>\public\js\fullcalendar.min.js"></script>
<script src="<?php echo URLROOT ?>\public\js\Vpost_update_calendar.js"></script>

