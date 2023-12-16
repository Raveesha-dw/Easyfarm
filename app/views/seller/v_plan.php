<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<?php require APPROOT . '/views/inc/components/sidebars/seller_sidebar.php'?>
<?php print_r($data)?>
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
                <h2 class="list__value"><?php echo $data['listing'] ?></h2>
            </div>
        <div class="ee">
            <div class="wrapperseller1">
            <h2>Normal</h2>
    
                <div class="plan-details">
                    <p class="highlight">Exclusive 6-Month Plan</p>
                    <ul>
                        <li>Unlimited access for 6 months!</li>
                        <li>List up to 50 items!</li>
                        <li>All for just ₹5000!</li>
                    </ul>
                </div>
    
            <p class="cta">🎁 **Limited Time Offer!** Grab Yours Now!</p>
            </div>
            <div class="wrapperseller2">
            <h2>STANDARD</h2>
            <div class="plan-details">
                    <p class="highlight">Exclusive 6-Month Plan</p>
                    <ul>
                        <li>Unlimited access for 6 months!</li>
                        <li>List up to 250 items!</li>
                        <li>All for just ₹15000!</li>
                    </ul>
                </div>
    
            <p class="cta">🎁 **Limited Time Offer!** Grab Yours Now!</p>
            </div>
            <div class="wrapperseller3">
            <h2>PREMIUM</h2>
            <div class="plan-details">
                    <p class="highlight">Exclusive 6-Month Plan</p>
                    <ul>
                        <li>Unlimited access for 6 months!</li>
                        <li>List up unlimated items!</li>
                        <li>All for just ₹25000!</li>
                    </ul>
                </div>
    
            <p class="cta">🎁 **Limited Time Offer!** Grab Yours Now!</p>
            </div>

        </div>
        <div class="plan_button">
                <button class="c">Purchase Now</button>
                <button class="c">Purchase Now</button>
                <button class="c">Purchase Now</button>
        </div>
       <!-- <?php $myVariable = "2024-8-4";?> -->
</div>

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











<?php require APPROOT . '/views/inc/footer.php'; ?>  