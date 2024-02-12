<?php require APPROOT . '/views/inc/components/navbars/home_nav.php';?>
<?php require APPROOT . '/views/inc/components/sidebars/vehicleRenter_sidebar.php'?>

<?php require APPROOT . '/views/inc/header.php';?>
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/components/fullcalendar.min.css">
<script src="<?php echo URLROOT ?>\public\js\jquery.min.js"></script>
<script src="<?php echo URLROOT ?>\public\js\moment.min.js"></script>
<script src="<?php echo URLROOT ?>\public\js\fullcalendar.min.js"></script>



<!-- <?php print_r($data);?> -->
<div class ="ss">
    <div class="Wrapper_Vehicle_Create_Post">

        <form class ="ddd" action="<?php echo URLROOT ?>/V_post/create_post" enctype="multipart/form-data" method="POST">

            <?php $v_Categories = $data['v_Categories']; ?>   

            <label for="Category"  class = "scdropdown1" name="V_category"><b>Vehicle Category:</b></label>
            <span class="invalid"><?php if ($data) {echo $data['V_category_err'];}?></span>
            <br>

            <select name="V_category" id="vCategory" class="vCategory" >
                <option disabled selected>Select Category</option>

                <?php foreach ($v_Categories as $v_Category): ?>
                    <option value="<?php echo htmlspecialchars($v_Category->Category_name); ?>"><?php echo htmlspecialchars($v_Category->Category_name); ?></option>
                <?php endforeach; ?>
                
            </select>

        


            <div class ="sitem">
                <label for="Item"><b>Vehicle number</b></label>
            <br>
                <input id="sitem_name" name="V_number" type="textbox" placeholder="Enter the Vehicle number" required value="" ><br/>
                <span class="invalid"><?php if ($data) {echo $data['V_number_err'];}?></span>
            </div>

            

            <div class ="sitem">
                <label for="Item"><b>Owner Name</b></label>
            <br>
                <input id="sitem_name" name="V_name" type="textbox" placeholder="Enter the Vehicle Name" required value="" ><br/>
                <span class="invalid"><?php if ($data) {echo $data['V_name_err'];}?></span>

            </div>

            <div class ="sitem">
                <label for="Item"><b>Contact number</b></label>
            <br>
                <input id="sitem_name" name="Contact_Number" type="textbox" placeholder="Enter the Contact number" required value="" ><br/>
                <span class="invalid"><?php if ($data) {echo $data['Contact_Number_err'];}?></span>
            </div>

            <div class="saddress">
                <b>Address</b>
                <br>
                <input id="sAddress" name ="address" type="textbox" placeholder="Enter the Address Line1" >
                <input id="sAddress" name ="address" type="textbox" placeholder="Enter the Address Line2" >
                <input id="sAddress" name ="address" type="textbox" placeholder="Enter the Address Line3" >
                <input id="sAddress" name ="address" type="textbox" placeholder="Enter the Address Line4" >


            </div>

            <div class="sstock_size">
                <div class="iii">
                <label for ="stock"> <b>Rental Fee</b></label>
                <br>
                <input id="size" name="Rental_Fee" type="number" step="1" min = 0 placeholder="Rental Fee"  required value="">
                <span class="invalid"><?php if ($data) {echo $data['Rental_Fee_err'];}?></span>
                </div>
                <div class="sdropdown2">
                    <label for="Category2"><b>Charging Unit:</b></label>
                    <br>

                        <select name="Charging_Unit" id="stype">
                            <option disabled selected> </option>
                            <!-- <option value="Per Hour">Per Hour</option> -->
                            <option value="Per Day">Per Day</option>
                            <option value="Per Week">Per Week</option>
                            <option value="Per month">Per month</option>

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
                            <div id='calendar'>
                                <!-- <input type="hidden" id="hidden_V_Id" value="<?php echo $data['uId']; ?>"> -->

                                <input type="hidden" id="hiddenInputDates" name="markedDates">




                            </div>
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
                <input id="sdes" name="Description" type="text" placeholder="Enter Descripitiion" required value="">
                <span class="invalid"><?php if ($data) {echo $data['Description_err'];}?></span>
            </div>


            <br>
            <br>

            <!-- <div class="imgdelivery"> -->

            <div class="image">
                <b>Upload image</b>
                <br>
                <br>
                <!-- <input id="inside_imageq" name="Image" type="file" placeholder="Upload the Images">
                <input id="inside_imageq" name="Image" type="file" placeholder="Upload the Images">
                <input id="inside_imageq" name="Image" type="file" placeholder="Upload the Images"> -->
                <input id="inside_imageq" name="Image" type="file" placeholder="Upload the Images">
                <span class="invalid"><?php if ($data) {echo $data['Image_err'];}?></span>
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



<?php require APPROOT . '/views/inc/footer.php';?>

<!-- Your other head elements -->
<scipt src="https://code.jquery.com/jquery-3.6.4.min.js"></scipt>




<script src="<?php echo URLROOT ?>\public\js\Vpost_calender.js"></script>