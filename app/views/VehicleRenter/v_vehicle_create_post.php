<div class="headebr">

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

        <form class ="ddd" action="<?php echo URLROOT ?>/V_post/create_post" enctype="multipart/form-data" method="POST">

            <?php $v_Categories = $data['v_Categories']; ?>   
            <br>
            <div class ="sitem">
                <label for="Category"  class = "scdropdown1" name="V_category"><b>   Vehicle Category:</b></label>
                <span class="invalid"><?php if ($data) {echo $data['V_category_err'];}?></span>
                <br>

                <select name="V_category" id="vCategory" class="vCategory" >
                    <option disabled selected>Select Category</option>

                    <?php foreach ($v_Categories as $v_Category): ?>
                        <option value="<?php echo htmlspecialchars($v_Category->Category_name); ?>"><?php echo htmlspecialchars($v_Category->Category_name); ?></option>
                    <?php endforeach; ?>


                    
                </select>
            </div>
        


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
                <b>Address</b><br>
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
                            <option disabled selected>Per Day </option>
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
                <b>Calendar</b>

                <div class="wrapperCalendar">
                    <p><I>Mark unavailable dates for renting</p></I>
                        <div class="cal" >
                            <div class="response"></div>
                            <!-- <?php echo $data['last_date_of_plan']; ?> -->
                            <div id='calendar' data-last_date_of_plan= '<?php echo $data['last_date_of_plan']; ?>'>

                                <!-- <input type="hidden" id="hidden_V_Id" value="<?php echo $data['uId']; ?>"> -->

                                <input type="hidden" id="hiddenInputDates" name="markedDates" data-last_date_of_plan= "<?php echo $data['last_date_of_plan']; ?>">




                            </div>
                        </div>
                </div>
            </div>
             <style>
       #calendar {
    z-index: 9999 !important; /* Adjust the z-index value as needed */
    position: relative; /* Ensure that z-index works */
   
}
    </style>



            <br>


            <br>
            <br>
            <br>
            <br>
            <br>

            <div class="sDescription">
                <b>Descripition</b><br>
                <br>
                <textarea id="sdes" name="Description" type="text" placeholder="Enter Descripitiion" required value="<?php if ($data) {echo $data['Description'];}?>" ></textarea>
                <span class="invalid"><?php if ($data) {echo $data['Description_err'];}?></span>
            </div>


            <br>
            <br>

            <!-- <div class="imgdelivery"> -->
            <div class ="sitem">
                <div class="image">
                    <b>Upload image</b>
                    <br>
                    <br>
                    <input id="inside_image" name="Image" type="file" placeholder="Upload the Images" required >
                    <span class="invalid"><?php if ($data) {echo $data['Image_err'];}?></span>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="s1">
                <button type="submit" id ="create"><b>create</b> </button>
            </div>

        </form>
    </div>
</div>
   <!-- </section> -->

    </div>
</div>






   <!-- </section> -->

    </div>



<?php require APPROOT . '/views/inc/footer.php';?>



<!-- Your other head elements -->
<scipt src="https://code.jquery.com/jquery-3.6.4.min.js"></scipt>



<!-- <script src="<?php echo URLROOT ?>\public\js\Vpost_update_calendar.js"></script> -->
<script src="<?php echo URLROOT ?>\public\js\Vpost_calender.js"></script>
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