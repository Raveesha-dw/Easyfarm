<!-- <?php print_r($data) ?> -->
<div>
    <?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
</div>

<?php print_r($data) ?>
<div class="container">
    <?php require APPROOT . '/views/seller/a.php' ?>

    <section class="home">
        <!-- <?php print_r($data) ?>  -->

        <?php require APPROOT . '/views/inc/components/navbars/sellerhome_nav.php' ?>

        <div class="shero5">
            <?php $products = $data; ?>
            <?php foreach ($products as $product) : ?>

                <br><br>

                <div class="msg-box">
                    <div class="m-header">
                        <div class="msg-ID">
                            <div class="m-img">
                                <i class="fa-solid fa-user"></i>
                                <!-- <img src="<?php echo URLROOT ?>/public/images/seller/user.png" alt=""> -->
                            </div>

                        </div>
                        <div class="msg-date">
                            <p><?php echo $product->Name ?></p>
                            <p><?php echo $product->placed_Date ?>
                            <p>
                        </div>


                    </div>

                    <div class="msg-f">

                        <div class="msg-f-detail">
                            <!-- <h3><?php echo $product->Name ?> wants <?php echo $product->Item_name ?> in <?php echo $product->quantity ?> <?php echo $product->Unit_type ?></h3> -->
                            <br>
                        </div>
                        <style>
                            .msg-pdroduct {
                                display: flex;
                                justify-content: space-between;
                            }

                            .product-info,
                            .product-values {
                                flex: 8;
                                margin-left: 10px;
                            }

                            .product-info h3,
                            .product-values h3 {
                                margin: 0;
                                /* Remove default margin */

                            }
                        </style>

                        <div class="msg-pdroduct">
                            <div class="product-info">
                                <h3>Item</h3>
                                <h3>Quantity</h3>
                                <h3>TO</h3>
                                <h3>Method</h3>
                                <h3>Order ID</h3>
                                <h3>Unit Price</h3>
                                <h3>Contact Number</h3>
                            </div>
                            <div class="product-values">
                                <h3><?php echo $product->Item_name ?></h3>
                                <h3><?php echo $product->quantity ?><?php echo $product->Unit_type ?></h3>
                                <h3><?php echo $product->Address ?></h3>
                                <h3><?php echo $product->DeliveryMethod ?></h3>
                                <h3><?php echo $product->Order_ID ?></h3>
                                <h3><?php echo $product->Unit_price ?></h3>
                                <h3><?php echo $product->Contact_num ?></h3>
                            </div>
                        </div>

                        <div class="button-msg">
                            <div class="aa">
                                <!-- <button class="dd"> <a href="http://localhost/Easyfarm/Seller_home/update_status2?id=<?php echo $product->Order_ID; ?>" onclick="changeText(this)" >DECLINE </a> </button> -->
                                <button class="dd" onclick="showModal(<?php echo $product->Order_ID; ?>)">DECLINE</button>
                                <button class="dd2"> <a href="http://localhost/Easyfarm/Seller_home/update_status1?id=<?php echo $product->Order_ID; ?>" onclick="changeText(this)"><?php echo $product->Status; ?> </a> </button>

                            </div>
                        </div>
                    </div>
                </div>



            <?php endforeach; ?>

            <div id="myModal" class="modal-overlay">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <p><b>Provide a reason for declining this order:</b></p>
                    <div class="reason-container">
                        <!-- Dropdown box -->
                        <label for="reasonDropdown"><b>Reason:</b></label>
                        <select id="reasonDropdown" name="reasonDropdown">
                            <option disabled selected>The reason for decline</option>
                            <option value="item_not_available">Item Not Available</option>
                            <option value="pricing_issue">Pricing Issue</option>
                            <option value="other">Other</option>
                        </select>

                        <!-- Space for typing -->
                        <label for="additionalReason"><b>Additional Comments:</b></label>
                        <textarea id="additionalReason" name="additionalReason" rows="4"></textarea>
                    </div>
                    <div class="modal-buttons">
                        <button id="skipButton" onclick="declineAction(<?php echo $product->Order_ID; ?>)">SKIP</button>
                        <button id="okButton" onclick="okaction(<?php echo $product->Order_ID; ?>)">OK</button>
                    </div>
                </div>
            </div>




            <script>
                // Define a variable to store the current order ID
                let currentOrderId;

                function showModal(orderId) {
                    // Store the current order ID
                    currentOrderId = orderId;

                    // Display the modal
                    var modal = document.getElementById("myModal");
                    modal.style.display = "block";
                }

                function closeModal() {
                    var modal = document.getElementById("myModal");
                    modal.style.display = "none";
                }

                // Handle actions when the "Decline" button is clicked
                function declineAction() {
                    // Get the reason and encode it
                    const reason = encodeURIComponent(document.getElementById('additionalReason').value);

                    // Build the URL with the current order ID and reason
                    const url = `http://localhost/Easyfarm/Seller_home/update_status2?id=${currentOrderId}&reason=${reason}`;

                    // Fetch the URL using GET method
                    fetch(url, {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(response => {
                            // Check if the response is successful
                            if (response.status === 200) {
                                // Redirect to the specified URL after processing
                                window.location.href = url;
                            } else {
                                console.error('Failed to update status.'); // Log an error if the update fails
                            }
                        })
                        .catch(error => {
                            console.error('Error during fetch:', error);
                        });

                    // Close the modal after handling the action
                    closeModal();
                }


                function okaction() {
                    const reason = encodeURIComponent(document.getElementById('additionalReason').value);
                    const url = `http://localhost/Easyfarm/Seller_home/update_status2?id=${currentOrderId}&reason=${reason}`;

                    fetch(url, {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(response => {
                            // Check if the response is successful
                            if (response.status === 200) {
                                // Redirect to the specified URL after processing
                                window.location.href = url;
                            } else {
                                console.error('Failed to update status.'); // Log an error if the update fails
                            }
                        })
                        .catch(error => {
                            console.error('Error during fetch:', error);
                        });

                    // Close the modal after handling the action
                    closeModal();
                }
            </script>

            <!-- ... (your remaining HTML code) ... -->

            <!-- ... (head section) ... -->





            <br></br>
            <br></br>
        </div>


        <?php require APPROOT . '/views/inc/footer.php'; ?>

    </section>
</div>