<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<?php require APPROOT . '/views/inc/components/sidebars/seller_sidebar.php'?>
<!-- <?php print_r($data)?> -->
<div class ="shero3">
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

        <div class="untill__event">Unit 31 Desember 2026</div>
            </div>


            <div class="listing">
                <h2 class="list__label">REMAING LISTING :</h2>
                <h2 class="list__value"><?php echo $data['list_count'] ?></h2>
            </div>
        <div class="ee">
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
            <div class="wrapperseller2">
            <h2><?php echo $data[1]['name'] ?></h2>
            <div class="plan-details">
                    <p class="highlight">Exclusive <?php echo $data[0]['duration'] ?>-Month Plan</p>
                    <ul>
                        <li>Unlimited access for <?php echo $data[0]['duration'] ?> months!</li>
                        <li>List up to <?php echo $data[1]['listing_limit'] ?>  items!</li>
                        <li>All for just ₹<?php echo $data[1]['price'] ?> !</li>
                    </ul>
                </div>
    
            <p class="cta">🎁 **Limited Time Offer!** Grab Yours Now!</p>
            </div>
            <div class="wrapperseller3">
            <h2><?php echo $data[2]['name'] ?></h2>
            <div class="plan-details">
                    <p class="highlight">Exclusive <?php echo $data[0]['duration'] ?>-Month Plan</p>
                    <ul>
                        <li>Unlimited access for <?php echo $data[0]['duration'] ?> months!</li>
                        <li>List up <?php echo $data[2]['listing_limit'] ?>  items!</li>
                        <li>All for just ₹<?php echo $data[2]['price'] ?>!</li>
                    </ul>
                </div>
    
            <p class="cta">🎁 **Limited Time Offer!** Grab Yours Now!</p>
            </div>

        </div>
        <div class="plan_button">
            <button class="c1" onclick="showPopup(0)">Purchase Now</button>           
            <button class="c2" onclick="showPopup(1)">Purchase Now</button>
            <button class="c3" onclick="showPopup(2)">Purchase Now</button>
        </div>
            <div id="myModal" class="modal-overlay1">

            <!-- Modal content -->
                <div class="modal-content">
                    <span class="close" onclick="closePopup()"></span>
                    <p id="popupMessage"></p>
                </div>






    </div>
       <!-- <?php $myVariable = "2024-8-4";?> -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.10.4/dayjs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.10.4/plugin/duration.min.js"></script>
<script>
   dayjs.extend(dayjs_plugin_duration);

function activateCountdown(element, dateString) {
    const targetDate = dayjs(dateString);
    element.querySelector(".untill__event").textContent = `Until ${targetDate.format("D MMMM YYYY")}`;
    
    setInterval(() => {
        const now = dayjs();
        const duration = dayjs.duration(targetDate.diff(now));
        element.querySelector(".until__numeric--months").textContent = duration.months().toString().padStart(2, '0');
        element.querySelector(".until__numeric--days").textContent = duration.days().toString().padStart(2, '0');
        element.querySelector(".until__numeric--hours").textContent = duration.hours().toString().padStart(2, '0');
        element.querySelector(".until__numeric--minutes").textContent = duration.minutes().toString().padStart(2, '0');
    }, 250);
}

activateCountdown(document.getElementById("myCountdown"),"<?php echo $data['Date'] ?>");
// "2025-11-4");


</script>



<script>
    
    function showPopup(a) {
        // console.log(a)
        var pkg = <?php echo json_encode($data); ?>;

        console.log(pkg[a])

        var popupContent = `
        <h2>${pkg[a].name}</h2>
        <p><strong>Listing Count:</strong> ${pkg[a].listing_limit}</p>

        <p><strong>Duration:</strong> ${pkg[a].duration} months</p>
        <p><strong>Price:</strong> ₹${pkg[a].price}</p>
            <div class="button-container">
                <button class="cancel-button" onclick="closePopup()">Cancel</button>
                <button class="ok-button" onclick="handleOkButtonClick()">OK</button>
            </div>
    `;

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




</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>  