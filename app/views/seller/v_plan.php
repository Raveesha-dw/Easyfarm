<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<?php require APPROOT . '/views/inc/components/sidebars/seller_sidebar.php'?>

<div class ="shero3">
    <div class="untill" id="myCountdown">
        <div class="unitl__component">
            <div class="untill__numeric until__numeric--days">00</div>
            <div class="untill__unit">Days</div>
        </div>
        <div class="unitl__component">
            <div class="untill__numeric until__numeric--hours">00</div>
            <div class="untill__unit ">Hours</div>
        </div>
        <div class="unitl__component">
            <div class="untill__numeric until__numeric--minutes">00</div>
            <div class="untill__unit">Minutes</div>
        </div>
        <div class="unitl__component">
            <div class="untill__numeric until__numeric--seconds">00</div>
            <div class="untill__unit">Seconds</div>
        </div>

        <div class="untill__event">Unit 31 Desember 2024</div>
            </div>


            <div class="listing">
                <h2 class="list__label">REMAING LISTING :</h2>
                <h2 class="list__value">45</h2>
            </div>
        <div class="ee">
            <div class="wrapperseller1">
            </div>
            <div class="wrapperseller2">
            </div>
            <div class="wrapperseller3"></div>

        </div>
        <div class="plan_button">
                <button class="c">Purchase Now</button>
                <button class="c">Purchase Now</button>
                <button class="c">Purchase Now</button>
        </div>
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
        element.querySelector(".until__numeric--seconds").textContent = duration.seconds().toString();
        element.querySelector(".until__numeric--minutes").textContent = duration.minutes().toString();
        element.querySelector(".until__numeric--hours").textContent = duration.hours().toString();
        element.querySelector(".until__numeric--days").textContent = duration.days().toString();
    }, 250);
}

activateCountdown(document.getElementById("myCountdown"), "2023-12-31");


</script>











<?php require APPROOT . '/views/inc/footer.php'; ?>  