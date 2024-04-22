<div>
    <?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
</div>

<div class="container">
<?php require APPROOT . '/views/Vechile/v_renter_side_bar.php' ?>
<section class="home">
<!-- <?php print_r($data)?> -->




<?php require APPROOT .'/views/inc/components/navbars/renter_nav.php'?>

       <div class ="shero5">
                            <?php $products=$data; ?>
                            <?php foreach ($products as $product) : ?>

                            <div class ="msg-box">
                                   <div class ="m-header">
                                          <div class ="msg-ID">
                                                 <div class="m-img">
                                                     <i class="fa-solid fa-user"></i>
                                                        <!-- <img src="<?php echo URLROOT?>/public/images/seller/user.png" alt=""> -->
                                                 </div>
                                          
                                          </div>
                                          <div class="msg-date"> <p><?php echo $product->Name ?></p>
                                                 <p><?php echo $product->placed_Date ?><p>
                                          </div>
                                          
                                          
                                   </div> 

                                   <div class="msg-f"> 
                                          
                                                 <!-- <div class="msg-f-detail">
                                                        <h3><?php echo $product->Name ?> wants <?php echo $product->V_name ?> number in  <?php echo $product->V_number ?> vechile</h3>
                                                        <br>
                                                 </div> -->
                                                       <!-- <div class="msg-product">


                                                               <h3>Vechile&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->V_name ?></h3>
                                                               <h3>Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->order_dates?></h3>
                                                               <h3>Pickup Location&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->location?></h3>
                                                               <h3>Contact Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->number?></h3>
                                                                                                                              <h3>Order ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->Order_ID?></h3>

                                                               <h3>Notice&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->Message?></h3>



                                                        </div> -->

                                                        <style>
    .msg-pdroduct {
        display: flex;
        width: 700px;
    }

    .product-info,
    .product-values {
        flex: 1; /* Each section takes equal space */
        display: flex; /* Use flexbox within each section */
        flex-direction: column; /* Stack items vertically */
        padding: 10px; /* Add padding for separation */
    }

    .product-info h3,
    .product-values h3 {
        margin: 0; /* Remove default margin */
    }
</style>

<div class="msg-pdroduct">
    <div class="product-info">
        <h3>Vechile</h3>
        <h3>Date</h3>
        <br>
        <h3>Pickup Location</h3>
        <h3>Contact Number</h3>
        <h3>Order ID</h3>
        <h3>Notice</h3>
        
    </div>
    <div class="product-values">
        <h3><?php echo $product->V_name ?></h3>
        <h3><?php echo $product->order_dates?>
        <br>
        <h3><?php echo $product->location ?></h3>
        <h3><?php echo $product->number ?></h3>
        <h3><?php echo $product->Order_ID ?></h3>
        <h3><?php echo $product->Message ?></h3>
       
    </div>
</div>










                                                        <div class="button-msg">
                                                               <div class="aa">
                                                                      <!-- <button class="dd"> <a href="http://localhost/Easyfarm/Seller_home/update_status2?id=<?php echo $product->Order_ID; ?>" onclick="changeText(this)" >DECLINE </a> </button> -->
                                                                      <button class="dd" onclick="showModal(<?php echo $product->Order_ID; ?>)">DECLINE</button>
                                                                      <button class="dd2"> <a href="http://localhost/Easyfarm/V_renter_home/update_status1?id=<?php echo $product->Order_ID; ?>" onclick="changeText(this)" ><?php echo $product->Status; ?> </a> </button>

                                                               </div>
                                                        </div>
      
                                   </div>
                            </div>
                            
                            
                             
    <?php  endforeach;?> 

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
        const url = `http://localhost/Easyfarm/V_renter_home/update_status2?id=${currentOrderId}&reason=${reason}`;

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


    function okaction(){
       const reason = encodeURIComponent(document.getElementById('additionalReason').value);
       const url = `http://localhost/Easyfarm/V_renter_home/update_status2?id=${currentOrderId}&reason=${reason}`;

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


<?php require APPROOT . '/views/inc/footer.php';?>  
</section>
<style>
    /* Style for the container of the message box */
    .msg-box {
        border: 1px solid #ccc;
        /* padding: 10px; */
        margin-bottom: 200px;
    }

    

    /* Style for the message ID */
    .msg-ID {
        display: flex;
        align-items: center;
    }

   

    /* Style for the message content */
    

    /* Style for the product details */
    .msg-f-detail h3 {
        margin-bottom: 5px;
    }

    /* Style for the product information */
    .msg-product h3 {
        margin: 5px 0;
    }

   
</style>

</div
                            
        
        
        

