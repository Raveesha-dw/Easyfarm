<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<!-- <script>function paymentGateway(){console.log("kk")}</script> -->
<?php print_r($data)?>
<script>

        
    function paymentGateway(id) {
        

                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = ()=>{
                        if(xhttp.readyState == 4 && xhttp.status == 200){
                        alert(xhttp.responseText);
                        var obj = JSON.parse(xhttp.responseText);

                        var payment = {
                                
                                "sandbox": true,
                                "merchant_id": "1225296",    // Replace your Merchant ID
                                "return_url":"http://localhost/Easyfarm/Users/login",     // Important   
                                "cancel_url": "",     // Important
                                "notify_url": "http://sample.com/notify",
                                "order_id": obj["order_id"],
                                "items": obj["items"],
                                "amount":  obj["amount"],
                                "plan_id":obj["plan_id"],
                                "currency":  obj["currency"],
                                "hash":  obj["hash"], // *Replace with generated hash retrieved from backend
                                "first_name": obj["first_name"],
                                "last_name": obj["last_name"],
                                "email": obj["email"],
                                "phone": obj["phone"],
                                "address": obj["address"],
                                "city": obj["city"],
                                "country": "Sri Lanka",
                                "delivery_address": "",
                                "delivery_city": "",
                                "delivery_country": "Sri Lanka",
                                "custom_1": "",
                                "custom_2": "",
                                };

                                // Payment completed. It can be a successful failure.
                                payhere.onCompleted = function onCompleted(orderId) {
                                console.log("Payment completed. OrderID:" + orderId);
                                var paymentQueryString = Object.keys(payment).map(key => key + '=' + encodeURIComponent(payment[key])).join('&');
                                window.location.href = "http://localhost/Easyfarm/V_plan/update_details2?id=" + payment['plan_id'];


                                
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

                        

                               
                                payhere.startPayment(payment);
                        }
                }
                xhttp.open("GET","<?php echo URLROOT ?>/V_plan/payment2?id=" + id,true);
                xhttp.send();
        }
        
</script>
<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>






<div class="box-container">
        <div class="box-item">
                <div class="flip-box">
                        <div class="flip-box-front text-center" style="background-image: url('https://s25.postimg.cc/frbd9towf/cta-2.png');">
                                <div class="inner color-white">
                                        <h3 class="flip-box-header"><?php print($data[0]->name); ?></h3>
                                        <p>Exclusive <?php print($data[0]->duration); ?>-Month Plan 🌟</p>
                                        <img src="https://s25.postimg.cc/65hsttv9b/cta-arrow.png" alt="" class="flip-box-img">
                                </div>
                        </div>
                        <div class="flip-box-back text-center" style="background-image: url('https://s25.postimg.cc/frbd9towf/cta-2.png');">
                                <div class="inner color-white">
                                        <h3 class="flip-box-header"><?php print($data[0]->name); ?></h3>
                                        <br>
                                        <br>
                                        <p>Unlock unparalleled benefits with our <?php print($data[0]->name); ?> plan – your gateway to extraordinary possibilities! 🚀</p>
                                        <p><strong>All for just Rs.<?php print($data[0]->price); ?>!</strong> Elevate your experience for an unbeatable price of Rs.<?php print($data[0]->price); ?>. Experience the pinnacle of service without compromise! 🎁</p>

                                        <a href="#" class="flip-box-button" onclick="paymentGateway(1);">SUBCRBIE🌐</a></p>
                                </div>
                        </div>
                </div>
        </div>
        <div class="box-item">
                <div class="flip-box">
                        <div class="flip-box-front text-center" style="background-image: url('https://s25.postimg.cc/hj4c4qnov/cta-3.png');">
                                <div class="inner color-white">
                                        <h3 class="flip-box-header"><?php print($data[1]->name); ?></h3>
                                        <p>Exclusive <?php print($data[1]->duration); ?>-Month Plan 🌟</p>
                                        <img src="https://s25.postimg.cc/65hsttv9b/cta-arrow.png" alt="" class="flip-box-img">
                                </div>
                        </div>
                        <div class="flip-box-back text-center" style="background-image: url('https://s25.postimg.cc/hj4c4qnov/cta-3.png');">
                                <div class="inner color-white">
                                        <h3 class="flip-box-header"><?php print($data[1]->name); ?></h3>
                                        <p>Discover the extraordinary with our <?php print($data[1]->name); ?> plan – your key to an enhanced digital presence!</p>
                                                                                <p><strong>All for just Rs.<?php print($data[1]->price); ?>!</strong> Elevate your journey for an incredible Rs.<?php print($data[1]->price); ?>. Experience the best of Normal without breaking the bank! 💸</p>

<a href="#" class="flip-box-button" onclick="paymentGateway(2);">SUBCRBIE 🌐</a></p>                                </div>
                        </div>
                </div>
        </div>
        <div class="box-item">
                <div class="flip-box">
                        <div class="flip-box-front text-center filter-" style="background-image: url('https://s25.postimg.cc/l2q9ujy4f/cta-4.png');">
                                <div class="inner color-white">
                                        <h3 class="flip-box-header"><?php print($data[2]->name); ?></h3>
                                        <p> Exclusive <?php print($data[2]->duration); ?>-Month Plan 🌟</p>
                                        <img src="https://s25.postimg.cc/65hsttv9b/cta-arrow.png" alt="" class="flip-box-img">
                                </div>
                        </div>
                        <div class="flip-box-back text-center" style="background-image: url('https://s25.postimg.cc/l2q9ujy4f/cta-4.png');">
                                <div class="inner color-white">
                                        <h3 class="flip-box-header"><?php print($data[2]->name); ?></h3>
                                        <p>Experience excellence with our <?php print($data[1]->name); ?> plan – crafted for those who seek greatness!</p>
                                                                                <p><strong>All for just Rs.<?php print($data[2]->price); ?>!</strong> Elevate your journey for a mere Rs.<?php print($data[2]->price); ?>. Unleash the power of <?php print($data[2]->name); ?> without compromising your budget! 💸</p>

<a href="#" class="flip-box-button" onclick="paymentGateway(3);">SUBCRBIE 🌐</a></p>                                </div>
                        </div>
                </div>
        </div>
</div>











<?php require APPROOT . '/views/inc/footer.php'; ?>  