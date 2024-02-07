<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/components/fullcalendar.min.css">
<script src="<?php echo URLROOT ?>\public\js\jquery.min.js"></script>
<script src="<?php echo URLROOT ?>\public\js\moment.min.js"></script>
<script src="<?php echo URLROOT ?>\public\js\fullcalendar.min.js"></script>






<section id="vproductDetails" class="section-v1">
    <div class="single-pro-image">
        <img src="<?php echo URLROOT ?>/public/images/products/vegi2.jpg" width="100%" id="MainImg" alt="">


        <table>
            <style>
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
                <th>Field</th>
                <th>Value</th>
            </tr>


            <tr>
                <td>Owner name</td>
                <td></td>
            </tr>
            <tr>
                <td>Vechile number</td>
                <td></td>
            </tr>
            <tr>
                <td>Contact Number</td>
                <td></td>
            </tr>
            <tr>
                <td>Rental Fee</td>
                <td></td>
            </tr>
            <tr>
                <td>Charging Unit</td>
                <td></td>
            </tr>

            <tr>
                <td>Address</td>
                <td></td>
            </tr>
            <tr>
                <td>Description</td>
                <td></td>
            </tr>
        </table>



    </div>

    <form id="submitForm" action="<?php echo URLROOT ?>/your-action-endpoint" method="POST">
        <div class="sdate2">
            <!-- <b>Calendar</b> -->

            <div class="wrapperCalendar2">
                <p><I>Select the Date</p></I>
                <div class="cal">
                    <div class="response"></div>
                    <div id='calendar'>

                    </div>
                </div>
                <br>

                <div class="flex-container1">
                    <table>
                        <tr>
                            <td><label for="sitem_name"><b>Enter your Name</b></label></td>
                            <td><input id="sitem_name" name="name" type="textbox" placeholder="Enter Name" required value=""></td>
                        </tr>
                        <tr>
                            <td><label for="Pickup_location"><b>Pickup Location</b></label></td>
                            <td><input id="Pickup_location" name="location" type="textbox" placeholder="Pickup Location" required value=""></td>
                        </tr>
                        <tr>
                            <td><label for="number"><b>Your Contact Number</b></label></td>
                            <td><input id="number" name="number" type="textbox" placeholder="Your Contact Number" required value=""></td>
                        </tr>
                        <tr>
                            <td><label for="Message"><b>Message</b></label></td>
                            <td><input id="Message" name="Message" type="textbox" placeholder="Message" required value=""></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Submit" onclick="showConfirmationPopup()"></td> <!-- Submit button -->
                        </tr>
                    </table>




                    <div id="confirmationPopup" class="popup">
                        <div class="popup-content">
                            <p>Are you sure you want to submit?</p>
                            <button onclick="submitForm()">Yes</button>
                            <button onclick="hidePopup()">No</button>
                        </div>
                    </div>



    </form>

    </div>



    </div>





</section>

<script>
    function showConfirmationPopup() {
        document.getElementById('confirmationPopup').style.display = 'block';
    }

    function hidePopup() {
        document.getElementById('confirmationPopup').style.display = 'none';
    }

    function submitForm() {
        // Add your form submission code here
        // For example, document.getElementById('submitForm').submit();
    }
    window.onload = function() {
        hidePopup();
    };
</script>







<?php require APPROOT . '/views/inc/footer.php'; ?>
<scipt src="https://code.jquery.com/jquery-3.6.4.min.js"></scipt>
<script src="<?php echo URLROOT ?>\public\js\Vpost_calender1.js"></script>