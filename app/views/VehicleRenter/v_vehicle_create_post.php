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










                     <!-- <div class="sdropdown1"> -->
                        <label for="Category"  class = "scdropdown1" name="Category"><b>Vehicle Category:</b></label>
                        <!-- <span class="invalid"><?php if ($data) {echo $data['Category_err'];}?></span> -->
                        <br>
                        <select name="V_category" id="sCategory" class="sCategory" >

                            <option disabled selected>Select Category</option>

                            <option value= "Vegatable" >Lorries $Trucks</option>
                            <option value= "Fruits" >Heavy Duty</option>
                            <option value= "Plants">Tractors</option>
                            <option value= "Seeds">Three Wheelers</option>
                        </select>

                    <!-- </div> -->



                    <div class ="sitem">
                        <label for="Item"><b>Owner Name</b></label>
                    <br>
                        <input id="sitem_name" name="V_name" type="textbox" placeholder="Enter the Vehicle Name" required value="" ><br/>
                        <!-- <span class="invalid"><?php if ($data) {echo $data['Item_name_err'];}?></span> -->

                    </div>

                    <div class ="sitem">
                        <label for="Item"><b>Vehicle number</b></label>
                    <br>
                        <input id="sitem_name" name="V_number" type="textbox" placeholder="Enter the Vehicle number" required value="" ><br/>
                        <!-- <span class="invalid"><?php if ($data) {echo $data['Item_name_err'];}?></span> -->
                    </div>

                    <div class ="sitem">
                        <label for="Item"><b>Contact number</b></label>
                    <br>
                        <input id="sitem_name" name="Contact_Number" type="textbox" placeholder="Enter the Contact number" required value="" ><br/>
                        <!-- <span class="invalid"><?php if ($data) {echo $data['Item_name_err'];}?></span> -->
                    </div>


                    <div class="sstock_size">
                        <div class="iii">
                        <label for ="stock"> <b>Rental Fee</b></label>
                        <br>
                        <input id="size" name="Rental_Fee" type="number" step="1" min = 0 placeholder="Rental Fee"  required value="">
                        <!-- <span class="invalid"><?php if ($data) {echo $data['Unit_size_err'];}?></span> -->
                        </div>
                        <div class="sdropdown2">
                                <label for="Category2"><b>Charging Unit:</b></label>
                                <br>

                                    <select name="Charging_Unit" id="stype">
                                        <option disabled selected> </option>
                                        <option value="Kg">Per Hour</option>
                                        <option value="g">Per Day</option>
                                        <option value="plant">Per Week</option>
                                        <option value="ml">Per month</option>

                                    </select>
                                <!-- <span class="invalid"><?php if ($data) {echo $data['Unit_type_err'];}?></span> -->


                        </div>
                     </div>

                <br>
         <div class="sdate">
            <b>Calendar</b>





        <div class="wrapperCalendar">
            <p><I>Unavailable dates for renting</p></I>
                <div class="cal" >
                    <div class="response"></div>
                    <div id='calendar'></div>
                </div>
        </div>

        








        </div>



                <br>
                <div class="saddress">
                    <b>Address</b>
                    <br>
                    <input id="sAddress" name ="address" type="textbox" placeholder="Enter the Address Line1" >
                    <input id="sAddress" name ="address" type="textbox" placeholder="Enter the Address Line2" >
                    <input id="sAddress" name ="address" type="textbox" placeholder="Enter the Address Line3" >
                    <input id="sAddress" name ="address" type="textbox" placeholder="Enter the Address Line4" >


                </div>

                <br>
                <div>




                </div>

                <br>
                <br>

                <br>

                <br>
                <div class="sDescription">
                    <b>Descripition</b>
                    <br>
                    <input id="sdes" name="Description" type="text" placeholder="Enter Descripitiion" required value="">
                    <!-- <span class="invalid"><?php if ($data) {echo $data['Description_err'];}?></span> -->
                </div>


              <br><br>

            <div class="imgdelivery">

            <div class="image">
                <b>Upload image</b>
                    <br>
                    <br>
                    <!-- <input id="inside_imageq" name="Image" type="file" placeholder="Upload the Images">
                    <input id="inside_imageq" name="Image" type="file" placeholder="Upload the Images">
                    <input id="inside_imageq" name="Image" type="file" placeholder="Upload the Images"> -->
                    <input id="inside_imageq" name="Image" type="file" placeholder="Upload the Images">
                    <!-- <span class="invalid"><?php if ($data) {echo $data['Image_err'];}?></span> -->
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


<script>
    document.querySelector("button").addEventListener("click", function() {
  const sel = document.querySelector("select");
  const d = document.querySelector("#date").value;

  if (d === null || d === undefined)
  {
    alert("Select a date first.");
  }
  else
  {
    sel.innerHTML += `<option value="${d}">${d}</option>`;
  }
});

// Later on, post the option values from the select list to your backend:

document.querySelector("#finish").addEventListener("click", function() {
  var dates = [];
  for (let o of document.querySelectorAll("#dates option"))
  {
    dates.push(o.value);
  }
});
</script>

<script src="<?php echo URLROOT ?>\public\js\Vpost_calender.js"></script>