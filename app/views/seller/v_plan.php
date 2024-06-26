<?php
//  require APPROOT . '/views/inc/components/sidebars/seller_sidebar.php'
?>


<div class="headebr">
    <div>
        <?php require APPROOT . '/views/inc/header.php'; ?>
        <?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
    </div>


    <div class="container">
        <?php require APPROOT . '/views/seller/a.php' ?>

        <section class="home">

<!-- <?php print_r($data)?> -->




            <div class="shero3">


          <div class="current-wrapper">
    <div class="current"> <b>Current Package : &nbsp;&nbsp;&nbsp;<?php echo $data[$data['plan_id'] - 1]['name'] ?> </b></div>
    <div class="current"> <b>Income  Rs.&nbsp;&nbsp;<?php echo $data['income'] ?></b></div>
</div>


                <div class="untill" id="myCountdown">
                    <div class="unitl__component">
                        <div class="untill__numeric until__numeric--months">00</div>
                        <div class="untill__unit">Months</div>
                    </div>
                    <div class="unitl__component">
                        <div class="untill__numeric until__numeric--days">00</div>
                        <div class="untill__unit ">Days</div>
                    </div>
                    <div class="unitl__component">
                        <div class="untill__numeric until__numeric--hours">00</div>
                        <div class="untill__unit">Hours</div>
                    </div>
                    <div class="unitl__component">
                        <div class="untill__numeric until__numeric--minutes">00</div>
                        <div class="untill__unit">Minutes</div>
                    </div>

                    <!-- <div class="untill__event">Unit 31 Desember 2026</div> -->
                </div>


                <div class="listing">
                    <h2 class="list__label">REMAINING LISTING :</h2>
                    <h2 class="list__value"><?php echo $data['list_count'] ?></h2>
                </div>
                <!-- <div class="ee"> -->
                <!-- <?php if ($data['plan_id'] != $data[0]['plan_id']) : ?>
                        <div class="wrapperseller1">
                            <h2><?php echo $data[0]['name'] ?></h2>

                            <div class="plan-details">
                                <p class="highlight">Exclusive <?php echo $data[0]['duration'] ?>-Month Plan</p>
                                <ul>
                                    <li>Unlimited access for <?php echo $data[0]['duration'] ?> months!</li>
                                    <li>List up to <?php echo $data[0]['listing_limit'] ?> items!</li>
                                    <li>All for just ₹<?php echo $data[0]['price'] ?>!</li>
                                </ul>
                            </div>

                            <p class="cta">🎁 **Limited Time Offer!** Grab Yours Now!</p>
                        </div>
                    <?php endif; ?> -->

                <!-- <?php if ($data['plan_id'] != $data[1]['plan_id']) : ?>
                        <div class="wrapperseller2">
                            <h2><?php echo $data[1]['name'] ?></h2>
                            <div class="plan-details">
                                <p class="highlight">Exclusive <?php echo $data[0]['duration'] ?>-Month Plan</p>
                                <ul>
                                    <li>Unlimited access for <?php echo $data[0]['duration'] ?> months!</li>
                                    <li>List up to <?php echo $data[1]['listing_limit'] ?> items!</li>
                                    <li>All for just ₹<?php echo $data[1]['price'] ?> !</li>
                                </ul>
                            </div>

                            <p class="cta">🎁 **Limited Time Offer!** Grab Yours Now!</p>
                        </div>
                    <?php endif; ?> -->


                <!-- <?php if ($data['plan_id'] != $data[2]['plan_id']) : ?>
                        <div class="wrapperseller3">
                            <h2><?php echo $data[2]['name'] ?></h2>
                            <div class="plan-details">
                                <p class="highlight">Exclusive <?php echo $data[0]['duration'] ?>-Month Plan</p>
                                <ul>
                                    <li>Unlimited access for <?php echo $data[0]['duration'] ?> months!</li>
                                    <li>List up <?php echo $data[2]['listing_limit'] ?> items!</li>
                                    <li>All for just ₹<?php echo $data[2]['price'] ?>!</li>
                                </ul>
                            </div>

                            <p class="cta">🎁 **Limited Time Offer!** Grab Yours Now!</p>
                        </div>
                    <?php endif; ?> -->

                <!-- </div> -->

                <div id="myModal" class="modal-overlay1">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close" onclick="closePopup()"></span>
                        <p id="popupMessage"></p>
                    </div>



                    <!-- <?php $myVariable = "2024-8-4"; ?> -->


                      <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.10.4/dayjs.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.10.4/plugin/duration.min.js"></script>
                   <script>
    dayjs.extend(dayjs_plugin_duration);
    console.log(dayjs_plugin_duration)

    function activateCountdown(element, dateString) {
        const targetDate = dayjs(dateString);
        setInterval(() => {
            const now = dayjs();
            const duration = dayjs.duration(targetDate.diff(now));
            element.querySelector(".until__numeric--months").textContent = duration.months().toString().padStart(2, '0');
            element.querySelector(".until__numeric--days").textContent = duration.days().toString().padStart(2, '0');
            element.querySelector(".until__numeric--hours").textContent = duration.hours().toString().padStart(2, '0');
            element.querySelector(".until__numeric--minutes").textContent = duration.minutes().toString().padStart(2, '0');
        }, 1000); // Update every second
    }

    activateCountdown(document.getElementById("myCountdown"), "<?php echo $data['Date']; ?>");
</script>



                    <script>
                        function showPopup(a) {
                            console.log(a)
                            var pkg = <?php echo json_encode($data); ?>;
                            // var id = pkg[a].id
                            // console.log("jj")
                            // console.log(${pkg[a]})
                            // console.log($data)
                            var ex_date = <?php echo json_encode($data['Date']); ?>;
                            var currentDate = new Date();
                            var formattedCurrentDate = currentDate.toLocaleDateString('en-US');
                            console.log(pkg)
                            var dataPlanId = <?php echo json_encode($data['plan_id']); ?>;
console.log(dataPlanId)
                            if (dataPlanId <= a) {
                                var popupContent = `
                    <div style="text-align: center;">
                <i class="fas fa-exclamation-triangle fa-3x" style="color: #ffc107;"></i>
                <br></br>
                <p><strong>Your Current Package: <?php echo $data[$data['plan_id'] - 1]['name'] ?></strong></p>
                <p></strong> Are you sure you want to proceed with purchasing this package?</p>
            
            <h2>${pkg[a].name}</h2>
                    <p><strong>Listing Count:</strong> ${pkg[a].listing_limit}</p>

                    <p><strong>Duration:</strong> ${pkg[a].duration} months</p>
                    <p><strong>Price:</strong> ₹${pkg[a].price}</p>
                        <div class="button-container">
                            <button class="cancel-button" onclick="closePopup()">Cancel</button>
                            <button class="ok-button" onclick="paymentGateway(${a})">OK</button>
                        </div>
                     `;
                            }
                            // undifinr   formattedCurrentDate<=ex_date
                            
                             else if (1) {
                                var popupContent = ` <div style="text-align: center;">
                <i class="fas fa-exclamation-triangle fa-3x" style="color: #ffc107;"></i>
                <br></br>
                <h2><strong>Your Current Package: <?php echo $data[$data['plan_id'] - 1]['name'] ?></strong></h2>
                <h3></strong> You can not subcribe this
            </div>
            <h2>${pkg[a].name} </h3> <h3>package</h3> </h3>
            <br>
                    <h2 style="color: #007bff;"> Untill <?php echo $data['Date'] ?> </h2>
                        <div class="button-container">
                            <button class="cancel-button" onclick="closePopup()">ok</button>
                            
                        </div>`;
                            }

                            document.getElementById("popupMessage").innerHTML = popupContent;
                            document.querySelector(".modal-content").classList.add("custom-popup-content");
                            document.getElementById("myModal").style.display = "flex";

                            document.getElementById("popupMessage").innerHTML = popupContent;
                            document.querySelector(".modal-content").classList.add("custom-popup-content");
                            document.getElementById("myModal").style.display = "flex";
                        }

                        function closePopup() {
                            document.getElementById("myModal").style.display = "none";
                        }

                      
                    </script>


                    <script>
                        function paymentGateway(id) {


                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = () => {
                                if (xhttp.readyState == 4 && xhttp.status == 200) {
                                    closePopup();

                                    // alert on krnna
                                    // alert(xhttp.responseText);
                                    var obj = JSON.parse(xhttp.responseText);
                                    // console.log("ss")

                                    var payment = {

                                        "sandbox": true,
                                        "merchant_id": "1225296", // Replace your Merchant ID
                                        "return_url": "http://localhost/Easyfarm/Users/login", // Important   
                                        "cancel_url": "", // Important
                                        "notify_url": "http://sample.com/notify",
                                        "order_id": obj["order_id"],
                                        "items": obj["items"],
                                        "amount": obj["amount"],
                                        "plan_id": obj["plan_id"],
                                        "currency": obj["currency"],
                                        "hash": obj["hash"], // *Replace with generated hash retrieved from backend
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
                                        window.location.href = "http://localhost/Easyfarm/Plan/update_plan?id=" + payment['plan_id'];



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
                                        console.log("Error:" + error);
                                    };




                                    payhere.startPayment(payment);

                                }
                            }
                            xhttp.open("GET", "<?php echo URLROOT ?>/Plan/payment6?id=" + id, true);
                            xhttp.send();
                        }
                    </script>
                    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>



                </div>







                <!-- <link rel="stylesheet" href="style.css"> -->
                <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" /> -->


                <div class="zx">
                    <?php if ($data['plan_id'] != $data[0]['plan_id']) : ?>
                        <div class="center1">
                            <div class="front-face">
                                <div class="contents front">
                                    <p>
                                        <?php echo $data[0]['name'] ?>
                                    </p>
                                    <span>Easy Farm</span>
                                </div>
                            </div>
                            <div class="back-face">
                                <div class="contents back">


                                    <div class="wrapperseller1">
                                        <h2><?php echo $data[0]['name'] ?></h2>

                                        <div class="plan-details">
                                            <p class="highlight">Exclusive <?php echo $data[0]['duration'] ?>-Month Plan</p>
                                            <ul>
                                                <li>Unlimited access for <?php echo $data[0]['duration'] ?> months!</li>
                                                <li>List up to <?php echo $data[0]['listing_limit'] ?> items!</li>
                                                <li>All for just ₹<?php echo $data[0]['price'] ?>!</li>
                                            </ul>
                                        </div>

                                        <p class="cta">🎁 **Limited Time Offer!** Grab Yours Now!</p>
                                    </div>


                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($data['plan_id'] != $data[1]['plan_id']) : ?>
                        <div class="center2">
                            <div class="front-face">
                                <div class="contents front">
                                    <p>
                                        <?php echo $data[1]['name'] ?>
                                    </p>
                                    <span>Easy Farm</span>
                                </div>
                            </div>
                            <div class="back-face">
                                <div class="contents back">



                                    <div class="wrapperseller1">
                                        <h2><?php echo $data[1]['name'] ?></h2>

                                        <div class="plan-details">
                                            <p class="highlight">Exclusive <?php echo $data[1]['duration'] ?>-Month Plan</p>
                                            <ul>
                                                <li>Unlimited access for <?php echo $data[1]['duration'] ?> months!</li>
                                                <li>List up to <?php echo $data[1]['listing_limit'] ?> items!</li>
                                                <li>All for just ₹<?php echo $data[1]['price'] ?>!</li>
                                            </ul>
                                        </div>

                                        <p class="cta">🎁 **Limited Time Offer!** Grab Yours Now!</p>
                                    </div>


                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($data['plan_id'] != $data[2]['plan_id']) : ?>
                        <div class="center3">
                            <div class="front-face">
                                <div class="contents front">
                                    <p>
                                        <?php echo $data[2]['name'] ?>
                                    </p>
                                    <span>Easy Farm</span>
                                </div>
                            </div>
                            <div class="back-face">
                                <div class="contents back">


                                    <div class="wrapperseller1">
                                        <h2><?php echo $data[2]['name'] ?></h2>

                                        <div class="plan-details">
                                            <p class="highlight">Exclusive <?php echo $data[2]['duration'] ?>-Month Plan</p>
                                            <ul>
                                                <li>Unlimited access for <?php echo $data[2]['duration'] ?> months!</li>
                                                <li>List up to <?php echo $data[2]['listing_limit'] ?> items!</li>
                                                <li>All for just ₹<?php echo $data[2]['price'] ?>!</li>
                                            </ul>
                                        </div>

                                        <p class="cta">🎁 **Limited Time Offer!** Grab Yours Now!</p>
                                    </div>


                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>


                <div class="plan_button">

                    <?php if ($data['plan_id'] != $data[0]['plan_id']) : ?> <button class="c1" onclick="showPopup(0)">Purchase Now</button> <?php endif; ?>
                    <?php if ($data['plan_id'] != $data[1]['plan_id']) : ?> <button class="c2" onclick="showPopup(1)">Purchase Now</button> <?php endif; ?>
                    <?php if ($data['plan_id'] != $data[2]['plan_id']) : ?> <button class="c3" onclick="showPopup(2)">Purchase Now</button> <?php endif; ?>
                </div>
            </div>

            <?php require APPROOT . '/views/inc/footer.php'; ?>

        </section>
    </div>
</div>