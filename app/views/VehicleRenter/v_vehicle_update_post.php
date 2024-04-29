<div class="headebr">

<div>
        <?php require APPROOT . '/views/inc/header.php'; ?>
        <?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
</div>
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/components/fullcalendar.min.css">
<script src="<?php echo URLROOT ?>\public\js\jquery.min.js"></script>
<script src="<?php echo URLROOT ?>\public\js\moment.min.js"></script>
<script src="<?php echo URLROOT ?>\public\js\fullcalendar.min.js"></script>


 <div class="container">
    <?php require APPROOT . '/views/Vechile/v_renter_side_bar.php' ?>

    <!-- <section class="home"> -->







<!-- <?php print_r($data);?> -->
<div class ="ss">
    <div class="Wrapper_Vehicle_Create_Post">

        <form class ="ddd" action="<?php echo URLROOT ?>/V_post/update_vehicle_post_details" enctype="multipart/form-data" method="POST">

            <?php $v_Categories = $data['v_Categories']; ?>   

            <label for="Category"  class = "scdropdown1" name="V_category"><b>Vehicle Category:</b></label>
            <span class="invalid"><?php if ($data) {echo $data['V_category_err'];}?></span>
            <br>

            <select name="V_category" id="vCategory" class="vCategory" >
                <option disabled selected><?php if ($data) {echo $data['V_category'];}?></option>

                <?php foreach ($v_Categories as $v_Category): ?>
                    <option value="<?php echo htmlspecialchars($v_Category->Category_name); ?>"><?php echo htmlspecialchars($v_Category->Category_name); ?></option>
                <?php endforeach; ?>

                            <?php if (!isset($_POST['V_category']) || empty($_POST['V_category'])) : ?>
                                <option selected><?php echo $data['V_category']; ?></option>
                            <?php else : ?>
                                <option selected><?php echo $_POST['V_category']; ?></option>
                            <?php endif; ?>
                
            </select>

        


            <div class ="sitem">
                <label for="Item"><b>Vehicle number</b></label>
            <br>
                <input id="sitem_name" name="V_number" type="textbox" placeholder="Enter the Vehicle number" required value="<?php if ($data) {echo $data['V_number'];}?>" ><br/>
                <span class="invalid"><?php if ($data) {echo $data['V_number_err'];}?></span>
            </div>

            

            <div class ="sitem">
                <label for="Item"><b>Owner Name</b></label>
            <br>
                <input id="sitem_name" name="V_name" type="textbox" placeholder="Enter the Vehicle Name" required value="<?php if ($data) {echo $data['V_name'];}?>" ><br/>
                <span class="invalid"><?php if ($data) {echo $data['V_name_err'];}?></span>

            </div>

            <div class ="sitem">
                <label for="Item"><b>Contact number</b></label>
            <br>
                <input id="sitem_name" name="Contact_Number" type="textbox" placeholder="Enter the Contact number" required value="<?php if ($data) {echo $data['Contact_Number'];}?>" ><br/>
                <span class="invalid"><?php if ($data) {echo $data['Contact_Number_err'];}?></span>
            </div>

            <div class="saddress">
                <b>Address</b>
                <br>
                <input id="sAddress" name ="address" type="textbox" placeholder="Enter the Address Line1" value="<?php if ($data) {echo $data['Address'];}?>" >
                <input id="sAddress" name ="address" type="textbox" placeholder="Enter the Address Line2" value="<?php if ($data) {echo $data['Address'];}?>" >
                <input id="sAddress" name ="address" type="textbox" placeholder="Enter the Address Line3" value="<?php if ($data) {echo $data['Address'];}?>" >
                <input id="sAddress" name ="address" type="textbox" placeholder="Enter the Address Line4" value="<?php if ($data) {echo $data['Address'];}?>" >


            </div>

            <div class="sstock_size">
                <div class="iii">
                <label for ="stock"> <b>Rental Fee</b></label>
                <br>
                <input id="size" name="Rental_Fee" type="number" step="1" min = 0 placeholder="Rental Fee"  required value="<?php if ($data) {echo $data['Rental_Fee'];}?>">
                <span class="invalid"><?php if ($data) {echo $data['Rental_Fee_err'];}?></span>
                </div>
                <div class="sdropdown2">
                    <label for="Category2"><b>Charging Unit:</b></label>
                    <br>

                        <select name="Charging_Unit" id="stype">
                            <option disabled selected> Per Day</option>
                            <!-- <option value="Per Hour">Per Hour</option> -->
                            <option value="Per Day">Per Day</option>
                            <!-- <option value="Per Week">Per Week</option>
                            <option value="Per month">Per month</option> -->

                            <?php if (!isset($_POST['Charging_Unit']) || empty($_POST['Charging_Unit'])) : ?>
                                <option selected><?php echo $data['Charging_Unit']; ?></option>
                            <?php else : ?>
                                <option selected><?php echo $_POST['Charging_Unit']; ?></option>
                            <?php endif; ?>
                            
                        </select>
                    <span class="invalid"><?php if ($data) {echo $data['Charging_Unit_err'];}?></span>


                </div>
            </div>

            <br>
            
            <div class="sdate">
                

                    <p><b>Calendar</b></p><br>
                    <div class="wrapperCalendar">
                        <p><I>Update the unavailable dates for renting</p></I>
                        <div class="cal" >

                            <?php
                                // Encode $dates array as JSON
                                $datesJson = json_encode($data['unavailableDates']);
                                // $post_create_dateJson = json_encode($data['post_create_date']);
                                
                                
                                
                                
                                
                                $post_create_dateJson = null;

                                // Check if the 'post_create_date' is set and is not empty
                                if (isset($data['post_create_date']) && !empty($data['post_create_date'])) {
                                    $post_create_dateJson = json_encode($data['post_create_date']);
                                }
                                
                                
                      
                                      
                                
                                
                                ?>


                                

                            <div id='calendar' 
                                data-dates='<?php echo $datesJson; ?>' 
                                data-create-date = '<?php echo $post_create_dateJson; ?>' 
                                data-last_date_of_plan= '<?php echo $data['last_date_of_plan']; ?>'>
                            </div><br><br>
                            <!-- <form action="<?php echo URLROOT ?>/V_post/update_calendar" method="post" class="form-container" id="formData"> -->
                            <input type="hidden" id="hiddenInputDates" name="markedDates">
                            <input type="hidden"  name="V_Id" value="<?php echo $data['V_Id']; ?>">
                            <!-- <button id="saveChangesButton">Save Changes</button> -->
                            <!-- </form> -->
                        </div>

                    </div>
            </div>



            <br>


            <br>
            <br>
            <br>
            <br>
            <br>

            <div class="sDescription">
                <b>Descripition</b>
                <br>
                <input id="sdes" name="Description" type="text" placeholder="Enter Descripitiion" required value="<?php if ($data) {echo $data['Description'];}?>" >
                <span class="invalid"><?php if ($data) {echo $data['Description_err'];}?></span>
            </div>


            <br>
            <br>

            <!-- <div class="imgdelivery"> -->

            <div class="image">
                <b>Upload image</b>
                <br>
                <br>
                <input id="inside_imageq" name="Image" type="file" placeholder="Upload the Images" required value="<?php echo URLROOT ?>/public/images/vehicleRenter/<?php echo $data['Image']; ?>" >
                <span class="invalid"><?php if ($data) {echo $data['Image_err'];}?></span>
            </div>
            <br>
            <br>
            <br>
            <div class="s1">
                
                <input type="hidden"  name="V_Id" value="<?php echo $data['V_Id']; ?>">
                <button type="submit" id ="create"><b>update</b> </button>
            </div>

        </form>
    </div>
</div>

   <!-- </section> -->

    </div>
</div>



<?php require APPROOT . '/views/inc/footer.php';?>



<script src="<?php echo URLROOT ?>\public\js\jquery.min.js"></script>
<script src="<?php echo URLROOT ?>\public\js\moment.min.js"></script>
<script src="<?php echo URLROOT ?>\public\js\fullcalendar.min.js"></script>
<script src="<?php echo URLROOT ?>\public\js\Vpost_update_calendar.js"></script>


<script>
    document.getElementById('size').addEventListener('input', function() {
        var rentalFeeInput = document.getElementById('size');
        if (rentalFeeInput.value < 0) {
            rentalFeeInput.value = 0;
            // Alternatively, you can display a message to the user
            alert('Rental fee cannot be negative');
        }
    });
</script>