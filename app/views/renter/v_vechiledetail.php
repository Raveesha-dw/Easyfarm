<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/components/fullcalendar.min.css"> 
<script src="<?php echo URLROOT ?>\public\js\jquery.min.js"></script>
<script src="<?php echo URLROOT ?>\public\js\moment.min.js"></script>
<script src="<?php echo URLROOT ?>\public\js\fullcalendar.min.js"></script>






<section id="vproductDetails" class="section-v1">
        <div class="single-pro-image">
            <img src="<?php echo URLROOT?>/public/images/products/vegi2.jpg" width="100%" id="MainImg" alt=""> 
        </div>
        <div class="sdate2">
                <!-- <b>Calendar</b> -->

                <div class="wrapperCalendar2">
                    <p><I>Select the Date</p></I>
                        <div class="cal" >
                            <div class="response"></div>
                            <div id='calendar'>
                                
                            </div>
                        </div>
                </div>
 </div>

</section>








 <?php require APPROOT . '/views/inc/footer.php'; ?>  
 <scipt src="https://code.jquery.com/jquery-3.6.4.min.js"></scipt>
<script src="<?php echo URLROOT ?>\public\js\Vpost_calender1.js"></script>