<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<!-- <script>function paymentGateway(){console.log("kk")}</script> -->

<script>

        
    function paymentGateway() {
        console.log("kk");

                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = ()=>{
                        if(xhttp.readyState == 4 && xhttp.status == 200){
                        alert(xhttp.responseText);
                        var obj = JSON.parse(xhttp.responseText);

                                // Payment completed. It can be a successful failure.
                                payhere.onCompleted = function onCompleted(orderId) {
                                console.log("Payment completed. OrderID:" + orderId);
                                // window.location.href = "<?php echo isset($_SESSION['return_url']) ? $_SESSION['return_url'] : ''; ?>";
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

                        

                                var payment = {
                                
                                "sandbox": true,
                                "merchant_id": "1225296",    // Replace your Merchant ID
                                "return_url":"http://localhost/Easyfarm",     // Important   
                                "cancel_url": "",     // Important
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
                                "custom_2": "",
                                };
                                payhere.startPayment(payment);
                        }
                }
                xhttp.open("GET","<?php echo URLROOT ?>/Plan/payment",true);
                xhttp.send();
        }
        
</script>
</script>  <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>











<div class ="shero4">
    <div class="re_p">
                <div class="wrapperreplan1">
                        <div class="premium-plan">
                                <div class="header">
                                        <h1>🌟 PREMIUM Exclusive 6-Month Plan 🌟</h1>
                                </div>
                                <div class="content">
                                        <p>Unlock unparalleled benefits with our PREMIUM plan – your gateway to extraordinary possibilities! 🚀</p>
                                        <p><strong>Unlimited Access for 6 Months!</strong> Immerse yourself in a world of endless opportunities. Enjoy unrestricted access to our premium features for a full six months! 📈</p>
                                        <p><strong>List Up Unlimited Items!</strong> Showcase your entire collection without limits. List as many items as your heart desires, and watch your business thrive. 💸</p>
                                        <p><strong>All for just ₹5000!</strong> Elevate your experience for an unbeatable price of ₹5000. Experience the pinnacle of service without compromise! 🎁</p>
                                        <p class="limited-offer"><strong>Limited Time Offer!</strong> Act Fast! This  offer is available for a limited time only. Seize the opportunity – grab your PREMIUM plan now and elevate your journey! <a href="#" class="cta-button" onclick="paymentGateway();">Get PREMIUM 🌐</a></p>
                                </div>
                        </div>
                
                </div>


                <div class="wrapperreplan2">
                        
                        <div class="normal-plan">
                                <div class="header">
                                        <h1>🌟 Normal Exclusive 6-Month Plan 🌟</h1>
                                </div>
                                <div class="content">
                                        <p>Discover the extraordinary with our Normal plan – your key to an enhanced digital presence!</p>
                                        <p><strong>Unlimited Access for 6 Months!</strong> Immerse yourself in endless opportunities. Enjoy unrestricted access to premium features for a full six months! 🚀</p>
                                        <p><strong>List Up to 50 Items!</strong> Boost your visibility. List up to 50 items on our platform and make your mark in the digital landscape. 📈</p>
                                        <p><strong>All for just ₹1500!</strong> Elevate your journey for an incredible ₹1500. Experience the best of Normal without breaking the bank! 💸</p>
                                        <p class="limited-offer"><strong>Limited Time Offer!</strong> Act Fast! This exclusive offer is available for a limited time only. Seize the opportunity – grab your Normal plan now and transform your digital experience! <a href="#" class="cta-button" onclick="paymentGateway();">Get Normal 🌐</a></p>
                                </div>
                        </div>

                </div>

                <div class="wrapperreplan3">
                
                        <div class="standard-plan">
                                <div class="header">
                                        <h2>🌟 STANDARD Exclusive 6-Month Plan 🌟</h2>
                                </div>
                                <div class="content">
                                        <p>Experience excellence with our STANDARD plan – crafted for those who seek greatness!</p>
                                        <p><strong>Unlimited Access for 6 Months!</strong> Explore a realm of possibilities. Enjoy unrestricted access to premium features for a complete six months! 🚀</p>
                                        <p><strong>List Up to 150 Items!</strong> Elevate your visibility. List up to 150 items on our platform and maximize your impact in the digital marketplace. 📈</p>
                                        <p><strong>All for just ₹2500!</strong> Elevate your journey for a mere ₹2500. Unleash the power of STANDARD without compromising your budget! 💸</p>
                                        <p class="limited-offer"><strong>Limited Time Offer!</strong> Act Fast! This exclusive offer is available for a limited time only. Seize the opportunity – grab your STANDARD plan now and level up your experience! <a href="#" class="cta-button" onclick="paymentGateway();">Get STANDARD 🌐</a></p>
                                </div>
                        </div>

                </div>
        </div>






</div>






<?php require APPROOT . '/views/inc/footer.php'; ?>  