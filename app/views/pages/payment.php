<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapperPayment">

    <h1>Payment</h1>
    <div class="wrapperPayment-sub">
        <br>
        <hr>
        <br><br><br>
        <img src="<?php echo URLROOT?>/public\images\pay\card_img.png" alt="">
        <br><br><br><br>
        <hr>

        <!-- <form action="<?php echo URLROOT ?>/Payment/payment" method="POST">   -->

            <p class="type">Card number *</p>
            <div class="input-box">
                <input type="text" placeholder="Enter Account number"  name="ac_number" id="ac_number"  required value="">
                <i class='bx bxs-edit-location'></i>
            </div>

            <p class="type">Name on card *</p>
            <div class="input-box">
                <input type="text" placeholder="Enter Account number"  name="ac_number" id="ac_number"  required value="">
                <i class='bx bxs-edit-location'></i>
            </div>

            <p class="type">Expiration date *</p>
            <div class="input-box">
                <input type="text" placeholder="Enter Account number"  name="ac_number" id="ac_number"  required value="">
                <i class='bx bxs-edit-location'></i>
            </div>

            <p class="type">CVV *</p>
            <div class="input-box">
                <input type="text" placeholder="Enter Account number"  name="ac_number" id="ac_number"  required value="">
                <i class='bx bxs-edit-location'></i>
            </div>

            <br><br><p><b>Save Card</b></p>
            <p>We will save this card for your convenience. If required, you can remove the card in the "Payment Options" section in the "Account" menu</p>


            <button type="button" class="btn" onclick="paymentGateway();" name="pay" id="pay">Pay Now</button>

        <!-- </form> -->

    </div>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>  




<script>
    function a(){
        console.log("adscszgvz");
        alert("asnfhgfy");
    }




</script>





<script>
    function paymentGateway() {

      
    var xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = ()=>{
        if(xhttp.readyState == 4 && xhttp.status == 200){
            alert(xhttp.responseText);
            var obj = JSON.parse(xhttp.responseText);

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


                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1225296",    // Replace your Merchant ID
                    "return_url": "http://localhost/Easyfarm/",     // Important
                    "cancel_url": "http://localhost/Easyfarm/",     // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj["order_id"],
                    "items": obj["items"],
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
    xhttp.open("GET","<?php echo URLROOT ?>/Payment/payment",true);
    xhttp.send();


    event.preventDefault();
}
</script>

<!-- <script src="C:\xampp\htdocs\Easyfarm\public\js\payment.js" ></script> -->
<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>