<?php require APPROOT . '/views/inc/components/navbars/home_nav.php';?>
<?php require APPROOT . '/views/inc/components/sidebars/vehicleRenter_sidebar.php'?>

<?php require APPROOT . '/views/inc/header.php';?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        


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
                            <option value="Per Hour">Per Hour</option>
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
                    <p><I>Unavailable dates for renting</p></I>
                        <div class="cal" >
                            <div class="response"></div>
                            <div id='calendar'>
                                <!-- <script async src="//jsfiddle.net/atn8upt5/1/embed/js,result/"></script> -->
                                 <!-- <script async src="//jsfiddle.net/a7zzz4fo/1/embed/js,result/"></script> -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />


                                <!-- <input type="hidden" id="hidden_V_Id" value="<?php echo $data['uId']; ?>"> -->
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





<script src="<?php echo URLROOT ?>\public\js\Vpost_calender.js"></script>

<style>
    td.clicked-date {
    background-color: red; /* Change this to your desired color */
    color: white; /* Change this to the text color you prefer */
}
</style>