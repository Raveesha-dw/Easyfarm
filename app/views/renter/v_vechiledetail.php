<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/components/fullcalendar.min.css">
<script src="<?php echo URLROOT ?>\public\js\jquery.min.js"></script>
<script src="<?php echo URLROOT ?>\public\js\moment.min.js"></script>
<script src="<?php echo URLROOT ?>\public\js\fullcalendar.min.js"></script>
<!-- <?php print_r($data)?> -->
<?php 
$pending_dates = array();
// $pending_dates = array(); // Initialize an empty array to store pending dates

foreach ($data as $item) {
    // Check if the current item is an object and has a property "Status" equal to "Pending"
    if (is_object($item) && property_exists($item, 'Status') && $item->Status === 'Pending') {
        // If the condition is met, add the corresponding date to the pending_dates array
        $pending_dates[] = $item->date;
    }
}

$jsonData1 = json_encode( $pending_dates);


         ?>

                <script>
                    // Pass JSON data to JavaScript
                    var jsonData1 = <?php echo $jsonData1; ?>;
                </script>

<section id="vproductDetails" class="section-v1">
    <div class="single-pro-image1">
                    <img src="<?php echo URLROOT ?>/public/images/vehicleRenter/<?php echo $data[0]->Image ?> " width="100%" id="MainImg" alt="">


        <table>
            <style>
                .popup button {
                    margin: 10px;
                    padding: 5px 10px;
                    cursor: pointer;
                    border: none;
                    /* Remove default button border */
                    border-radius: 5px;
                    /* Add border radius for rounded corners */
                }

                .popup button.yes {
                    background-color: green;
                    /* Change background color for "Yes" button */
                    color: white;
                    /* Change text color for "Yes" button */
                }

                .popup button.no {
                    background-color: red;
                    /* Change background color for "No" button */
                    color: white;
                    /* Change text color for "No" button */
                }




                table {
                    width: 140%;
                    border-collapse: collapse;

                }

                .popup {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    position: fixed;
                    top: 50%;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.5);
                    z-index: 9999;
                }

                .popup-content {
                    background-color: #fefefe;
                    margin: 20% auto;
                    padding: 20px;
                    border: 1px solid #888;
                    width: 50%;
                    text-align: center;
                }

                .popup button {
                    margin: 10px;
                    padding: 5px 10px;
                    cursor: pointer;
                }
            </style>
            <tr>
                <th>Vechile</th>
                <th>Value</th>
            </tr>


            <tr>
                <td>Owner name</td>
                <td><b><?php print($data[0]->V_name);?></b></td>

            </tr>
            <tr>
                <td>Vechile number</td>
                <td><b><?php print($data[0]->V_number);?></b></td>
            </tr>
            <tr>
                <td>Contact Number</td>
                <td><b><?php print($data[0]->Contact_Number);?></b></td>
            </tr>
            <tr>
                <td>Rental Fee</td>
                <td><b><?php print($data[0]->Rental_Fee);?></b></td>
            </tr>
            <tr>
                <td>Charging Unit</td>
                <td><b><?php print($data[0]->Charging_Unit);?></b></td>
            </tr>

            <tr>
                <td>Address</td>
                <td><b><?php print($data[0]->Address);?></b></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><b><?php print($data[0]->Description);?></b></td>
            </tr>
        </table>


        <?php $lastday = $data['lastday'];?>

<script>
    var lastday = <?php echo json_encode($lastday); ?>;
</script>



    </div>

    <form id="submitForm" action="<?php echo URLROOT ?>/Vechile_orders/orders" method="POST">
        <div class="sdate2">
            <!-- <b>Calendar</b> -->

            <div class="wrapperCalendar2">
                <p><i>Select the Date</i></p>
                <br>
                <br>




<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <p id="modal-content">This date is unavailable for booking.</p>
    <button id="modal-ok-btn">OK</button>
  </div>
</div>


                

                <div style="background-color: red; width: 20px; height: 20px; display: inline-block; margin-right: 10px;"></div>
    <span>Unavailable Day</span>
    <br>
    <div style="background-color: blue; width: 20px; height: 20px; display: inline-block; margin-right: 10px;"></div>
    <span>Pending Day</span>
                <span class="invalid"><?php if ($data) {echo $data['selectedDates_err'];}?></span>

                <?php foreach ($data as $item): ?>
                <!-- <?php if (is_object($item) && property_exists($item, 'date')): ?> -->
                <!-- <span><?php echo $item->date; ?></span> -->
                <!-- <?php endif;?> -->
                <!-- <?php endforeach;?> -->





                <?php
// Assuming $data is your array obtained from the PHP loop
$dataArray = array();

foreach ($data as $item) {
    if (is_object($item) && property_exists($item, 'date')) {
        $dataArray[] = $item->date;
    }
}

// Encode the PHP array into JSON format
$jsonData = json_encode($dataArray);

?>

                <script>
                    // Pass JSON data to JavaScript
                    var jsonData = <?php echo $jsonData; ?>;
                </script>

                <div class="cal">
                    <div class="response"></div>

                    <div id='calendar' data-date='<?php echo $jsonData; ?>' data-id='<?php echo $data['V_Id']; ?>'>
                        <input type="hidden" id="hiddenInputDates" name="selectedDates" required value="<?php echo $data['selectedDates']; ?>" >

                    </div>
                </div>
                <br>

                <div class="flex-container1">
                    <table>
                        <tr>
                            <td><label for="sitem_name"><b>Enter your Name</b></label></td>
                            <td><span class="invalid"><?php if ($data) {

                                                             echo $data['name_err'];
                                                        }  ?></span><input id="sitem_name" name="name" type="textbox" placeholder="Enterthe Name" value=" <?php echo isset(end($data)->Name) ? end($data)->Name : ''; ?>" size="40" style="height: 40px" ;></td>



                        </tr>
                        <tr>
                            <td><label for="Pickup_location"><b>Pickup Location</b></label></td>
                            <td><span class="invalid"><?php if ($data) {

                                                            echo $data['location_err'];
                                                        }  ?></span><input id="Pickup_location" name="location" type="textbox" placeholder="Pickup Location" required value="<?php echo isset(end($data)->Address) ? end($data)->Address : ''; ?>" size="40" style="height: 40px" ;></td>



                        </tr>
                        <tr>
                            <td><label for="number"><b>Your Contact Number</b></label></td>
                            <td><span class="invalid"><?php if ($data) {

                                                            echo $data['number_err'];

                                                        }  ?></span><input id="number" name="number" type="number" placeholder="Your Contact Number" required value="<?php echo isset(end($data)->Contact_num) ? end($data)->Contact_num : ''; ?>" min="0" size="40" style="height: 40px; width: 300px" ;></td>



                        </tr>
                        <tr>
                            <td><label for="Message"><b>Message</b></label></td>
                            <td><input id="Message" name="Message" type="textbox" placeholder="Message" size="40" style="height: 40px" ;></td>
                        </tr>
                        <tr>
                            <input type="hidden" name="V_Id" value="<?php echo $data[0]->V_Id; ?>">
                            <td colspan="2"><input type="submit" value="Submit" onclick="return showConfirmationPopup()"></td> <!-- Submit button -->
                        </tr>

                    </table>




                    <div id="confirmationPopup" class="popup">
                        <div class="popup-content">
                            <p>Are you sure you want to submit?</p>
                            <button class="yes" onclick="submitForm()">Yes</button>
                            <button class="no" onclick="return hidePopup()">No</button>

                        </div>
                    </div>

  </form>
    </div>
    </div>

</section>
<script>
    function showConfirmationPopup() {
        document.getElementById('confirmationPopup').style.display = 'block';
        return false; // Prevent default form submission
    }

    function submitForm() {
        // Submit the form
        document.getElementById('submitForm').submit();
    }

    function hidePopup() {
        document.getElementById('confirmationPopup').style.display = 'none';
        return false; // Prevent form submission
    }


    window.onload = function() {
        hidePopup();
    };
</script>

<?php require APPROOT . '/views/inc/footer.php';?>
<scipt src="https://code.jquery.com/jquery-3.6.4.min.js"></scipt>
<script src="<?php echo URLROOT ?>\public\js\Vpost_calender1.js"></script>