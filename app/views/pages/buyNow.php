<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapperBuyNow">

                <div class="column4" >


                <div class="box">
                    <div class="wrapperBuyNow_sub">
                            <p><b> Delivered to :</b></p>
                            <p> <?php echo $data['Name']; ?></p>
                            <p> <?php echo $data['Contact_num']; ?> </p>
                            <p> <?php echo $data['Address']; ?>
                                <a class="open-button" onclick="openForm()" > Change </a>
                            </p>
                            <p> Email to <?php echo $data['Email']; ?></p>
                        </div>


                    <!-- <a class="open-button" onclick="openForm()" action="<?php echo URLROOT?>/pages/BuyNow" >
                        <div class="wrapperBuyNow_sub">
                            <p> + Add new delivery address</p>
                        </div>
                    </a>    -->
                 </div>
       
                    
    

                    <div class="wrapperBuyNow_sub">
                        <section id="productDetails" class="section-p1">
                            <div class="row">
                                <!-- <div class="column1" > -->
                                    <div class="single-pro-image">
                                        <img src="<?php echo URLROOT?>/public/images/products/vegi2.jpg" width="100%" id="MainImg" alt=""> 
                                    <!-- </div> -->
                                </div>
                            </div>

                                <div class="row">
                                    <div class="column1" >
                                        <p>Name:</p>
                                    </div>
                                    <div class="column2" >
                                        <p><?php echo $data['Item_name']; ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="column1" >
                                        <p>Delivery Method:</p>
                                    </div>
                                    <div class="column2" >
                                        <p><?php echo $data['selectedDeliveryMethod']; ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="column1" >
                                        <p>Quantity:</p>
                                    </div>
                                    <div class="column2" >
                                        <p><?php echo $data['quantity']; ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="column1" >
                                        <p>Total :</p>
                                    </div>
                                    <div class="column2" >
                                        <p><?php echo $data['total']; ?></p>
                                    </div>
                                </div>
                        </section>       
                        </div>

                    



                </div>
                <div class="column5" >
                    <div class="wrapperBuyNow_sub">
                        <p><b>Order Summary</b></p>
                        <div class="row">
                            <div class="column1" >
                                <p>Item Total </p>
                            </div>
                            <div class="column2" >
                                <p><?php echo $data['total']; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="column1" >
                                <p>Delivery Fee</p>
                            </div>
                            <div class="column2" >
                                <p><?php echo $data['deliveryFee']; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="column1" >
                                <p>Total Payment</p>
                            </div>
                            <div class="column2" >
                                <p><?php echo $data['totalPayment']; ?></p>
                            </div>
                        </div>
<!-- <?php print_r($data)  ?> -->
                        <!-- <form id="myForm" action="https://sandbox.payhere.lk/pay/checkout"  method="post" > -->
                            <!-- <form id="myForm" action="<?php echo URLROOT; ?>/BuyNow/payment"  method="post" > -->
                            
                            <!-- <input type="hidden" name="seller_ID" value=<?php echo $data['seller_ID']; ?>>
                            <input type="hidden" name="items" value=<?php echo $data['Item_name']; ?>>
                            <input type="hidden" name="first_name" value=<?php echo $data['total']; ?>>
                            <input type="hidden" name="last_name" value=<?php echo $data['total']; ?>>
                            <input type="hidden" name="email" value=<?php echo $data['total']; ?>>
                            <input type="hidden" name="phone" value=<?php echo $data['total']; ?>>
                            <input type="hidden" name="address" value=<?php echo $data['total']; ?>>
                            <input type="hidden" name="city" value=<?php echo $data['total']; ?>>
                            <input type="hidden" name="total" value=<?php echo $data['total']; ?>> -->
                           
                            


                            <form method="post" action="https://sandbox.payhere.lk/pay/authorize">   
                                <!-- <form method="post" action="<?php echo URLROOT; ?>/BuyNow/payment"> -->

<?php 
            $amount = 4000;
            $merchant_id =  1225296;
            $order_id = uniqid();
            $merchant_secret = "NTc0MDU0NjMxMjA1NjI3NTI2ODMzMjQwMjAxNTYzMzE0MjI0NDQ4";
            $currency = "LKR";
    ?>


                                <input type="hidden" name="merchant_id" value="1225296">    <!-- Replace your Merchant ID -->
                                <input type="hidden" name="return_url" value="http://sample.com/return">
                                <input type="hidden" name="cancel_url" value="http://sample.com/cancel">
                                <input type="hidden" name="notify_url" value="http://sample.com/notify">  
                                <input type="hidden" name="order_id" value="Order12345">
                                <input type="hidden" name="items" value="Toy car"><br>
                                <input type="hidden" name="currency" value="LKR">
                                <input type="hidden" name="amount" value="<?php echo $data['total']; ?>">  
                                <!-- <br><br>Customer Details<br> -->
                                <input type="hidden" name="first_name" value="Saman">
                                <input type="hidden" name="last_name" value="Perera"><br>
                                <input type="hidden" name="email" value="samanp@gmail.com">
                                <input type="hidden" name="phone" value="0771234567"><br>
                                <input type="hidden" name="address" value="No.1, Galle Road">
                                <input type="hidden" name="city" value="Colombo">
                                <input type="hidden" name="country" value="Sri Lanka">
                                <input type="hidden" name="hash" value=<?php strtoupper(
    md5(
        $merchant_id . 
        $order_id . 
        number_format($amount, 2, '.', '') . 
        $currency .  
        strtoupper(md5($merchant_secret)) 
    ) 
);?>>
                                <!-- <input type="hidden" name="hash" value="098F6BCD4621D373CADE4E832627B4F6">    Replace with generated hash -->
                                <!-- <input type="submit" value="Authorize">   
                            </form> -->
                            
                        

                            <br><button type="submit" id="btn" class="btn" onclick="paymentGateway();">Place Order</button>
                        
                            </form>


         
                    </div>
                </div>





                <!-- <div class="editAddress"> -->
                    <div class="form-popup" id="myForm">
                    <!-- <form action="/action_page.php" class="form-container"> -->
                    <form action="<?php echo URLROOT ?>/BuyNow/updateAddress" method="POST" class="form-container"> 
             
                    <p><b>Change the Address</b><br></p>

                        <p class="type">Address </p>
                        <div class="input-box">
                            <input type="text" name="address" placeholder="Enter address" required value="<?php echo $data['Address']; ?>">
                            <i class='bx bxs-edit-location'></i>
                            <!-- <span class="invalid"><?php echo $data['address_err']; ?></span> -->
                        </div>

                        <p class="type">City </p>
                        <div class="input-box">
                            <input type="text" name="city" placeholder="Enter the City" required value="">
                            <i class='bx bxs-edit-location'></i>
                            <!-- <span class="invalid"><?php echo $data['address_err']; ?></span> -->
                        </div>
                        
                        <p class="type">District </p>
                        <div class="input-box">
                            <input type="text" name="district" placeholder="Enter the District" required value="">
                            <i class='bx bxs-edit-location'></i>
                            <!-- <span class="invalid"><?php echo $data['address_err']; ?></span> -->
                        </div>
                        <!-- <input type="hidden" name="user_type" value="Buyer"> -->
                        <input type="hidden" name="uId" value=<?php echo$_SESSION['user_ID']?>>
                        <input type="hidden" name="quantity" value=<?php echo $data['quantity']; ?>>
                        <input type="hidden" name="itemId" value=<?php echo $data['Item_Id']; ?>>
                        <input type="hidden" name="selectedDeliveryMethod" value=<?php echo $data['selectedDeliveryMethod']; ?>>
                        <input type="hidden" name="total" value=<?php echo $data['total']; ?>>
                        <input type="hidden" name="deliveryFee" value=<?php echo $data['deliveryFee']; ?>>
                        <input type="hidden" name="totalPayment" value=<?php echo $data['totalPayment']; ?>>
                



                        <br><button type="submit" class="btn" onclick="closeForm()">Save Changes</button>
                    
                    
                    </form>
                    </div>
                <!-- </div> -->


</div>






 

<?php require APPROOT . '/views/inc/footer.php'; ?>       



<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>


<script>
    function paymentGateway() {
       


    var xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = ()=>{
        if(xhttp.readyState == 4 && xhttp.status == 200){
            alert(xhttp.responsehidden);
            var obj = JSON.parse(xhttp.responsehidden);
            console.log(<?php echo $data['total']; ?>);
                // Payment completed. It can be a successful failure.
                payhere.onCompleted = function onCompleted(orderId) {
                    console.log("Payment completed. OrderID:" + orderId);
                    // Note: validate the payment and show success or failure page to the customer
                };

                // Payment window closed
                payhere.onDismissed = function onDismissed() {
                    // Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");
                };

                // Error occurred
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:"  + error);
                };
                // var totalAmount = <?php echo $data['total']; ?>;


                // var amount = <?php echo $data['total']; ?>;
                // var merchant_id =  1225296;
                // var order_id = uniqid();
                // var merchant_secret = "NTc0MDU0NjMxMjA1NjI3NTI2ODMzMjQwMjAxNTYzMzE0MjI0NDQ4";
                // var currency = "LKR";



                // var hash = strtoupper(
                //     md5(
                //         merchant_id . 
                //         order_id . 
                //         number_format(amount, 2, '.', '') . 
                //         currency .  
                //         strtoupper(md5(merchant_secret)) 
                //     ) 
                // );
















                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1225296",    // Replace your Merchant ID
                    "return_url": "http://localhost/Easyfarm/",     // Important
                    "cancel_url": "http://localhost/Easyfarm/",     // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj["order_id"],
                    "items": obj["items"],
                    "amount":  <?php echo $data['total']; ?>,
                    "amount":  obj["amount"],
                    "currency":  obj["currency"],
                    "hash":  obj["hash"], // *Replace with generated hash retrieved from backend
                    "first_name": obj["first_name"],
                    "last_name": obj["last_name"],
                    "email": obj["email"],
                    "phone": obj["phone"],
                    "address": obj["address"],
                    "city": obj["city"],
                    "country": "Sri Lanka",
                    "delivery_address": "No. 46, Galle road, Kalutara South",
                    "delivery_city": "Kalutara",
                    "delivery_country": "Sri Lanka",
                    "custom_1": "",
                    "custom_2": ""
                };
      


                payhere.startPayment(payment);



        }
    }
    xhttp.open("GET","<?php echo URLROOT ?>/BuyNow/payment",true);
    xhttp.send();
    console.log("kjsidv...................................");
}
</script>
<script type="hidden/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>



<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
  // Use jQuery to send data to the controller
  $(document).ready(function () {
    $("btn").click(function () {
      var dataToSend = {
        // items: "<?php echo $data['Item_name']; ?>",
        total: "<?php echo $data['total']; ?>",
        // key1: "value1",
        // key2: "value2",
        // Add other data as needed
      };

      $.ajax({
        type: "POST",
        url: "<?php echo URLROOT; ?>/BuyNow/payment",
        data: dataToSend,
        success: function (response) {
          // Handle the response from the server
          console.log(response);
        },
      });
    });
  });
</script>

