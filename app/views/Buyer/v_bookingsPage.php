<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<!-- <section id="productDetails" class="section-p1"> -->

<?php

// print_r($data['requests']);
?>
<div class="completeButton">
        <a href="<?php echo URLROOT?>/Orders/pendingBookings"><button>View Confirmed Bookings</button></a>
         
        
</div>
<section id="productDetails" class="section-p1">


<!-- <div class="flex-container"> -->
<?php 
if ($data['requests'] == null){
        echo 'You currently have no pending bookings';
}
else{
?>


<div class="right-content">
<?php
$requests = $data['requests'];

$currentDate = date("Y-m-d");

foreach ($requests as $request): 
 $booking = $request['request'];
if($booking->placed_Date < $currentDate){

?>


<div class="order-container" style="margin: 10px;">
        <?php
        // print_r($request); 
       
        // print_r($booking);
        // echo $booking->Order_ID;
        $vehicle = $request['vehicle'][0];

        // print_r($vehicle);
        // foreach ($vehicle as $vehi):
        // echo $vehi->V_number;
        // endforeach;
        ?>

        <h3>Requested Vehicle Details on <medium style="color: darkblue;"><?php echo $booking->placed_Date?></medium> </h3>
        <p><b>Vehicle Number</b> : <?php echo $vehicle->V_number; ?></p>
        <p><b>Vehicle Name</b> : <?php echo $vehicle->V_name; ?></p>
        <p><b>Category </b> : <?php echo $vehicle->V_category; ?></p>
        <p><b>Rental Fee </b> : <?php echo $vehicle->Rental_Fee; ?>  <?php echo $vehicle->Charging_Unit;?> </p>
        <p><b>Owner Info </b> : <?php echo $booking->name ?>, <?php echo $booking->location ?></p>
      
</div>


<?php 
}
endforeach; ?>
<span style="margin: 10px; color:dark gray" ><i class="fa-solid fa-circle-info" style="color: var(--dark-green);"></i> After your request is accepted by the owner it will be listed as a confirmed booking</span>
</div>

<?php } ?>

<!-- </div> -->
</section>




<?php require APPROOT . '/views/inc/footer.php';?>


