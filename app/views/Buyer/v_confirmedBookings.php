<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="completeButton">
        <a href="<?php echo URLROOT?>/Orders/toBeAcceptedBookings"><button>View Pending Bookings</button></a>      
</div>

<section id="productDetails" class="section-p1">
<?php
// print_r($data['bookings']);
?>

<?php
if ($data['bookings'] == null){
        echo 'You currently have no pending bookings';
}
else{
?>

<div class="right-content">
<?php
$booking = $data['bookings'];

foreach($booking as $bookData):
        $book = $bookData['details'];
        $vehicle = $bookData['vehicle'][0];
        $dates = $bookData['dates'];
?>

<div class="order-container" style="margin: 10px;">
        <?php
        // print_r($book);
        // print_r($vehicle);
        // print_r($dates);
        ?>

        <h3>Booking ID : <?php echo $book->Order_ID ?></h3><br>

        <h3>Vehicle Details</h3><br>
        <p>Requested Vehicle number:<b> <?php echo $vehicle->V_number ?></b> </p><br>
        <p>Vehicle Name :<b> <?php echo $vehicle->V_name; ?></p> </b><br>
        <p>Category  : <b><?php echo $vehicle->V_category; ?></b></p><br>
        <p>Rental Fee :<b> LKR <?php echo $vehicle->Rental_Fee; ?>  <?php echo $vehicle->Charging_Unit;?> </b></p><br>

        
        <h3>Booked Dates</h3>
        <div style="align-items:center;">
        <?php for($i=0; $i<count($dates); $i++){ ?>
                <ul>
                 <li><?php echo $dates[$i]->date; ?> </li>
                </ul>
        <?php }
        ?>
        </div>
        <p><b><br>Owner Information </b> : <?php echo $book->name ?>, <?php echo $book->location ?></p><br>
        <p>Contact Number:<span style="color: darkblue;"> <?php echo $vehicle->Contact_Number ?></span></p>

</div>


<?php endforeach; ?>

</div>


<?php } ?>
</section>


<?php require APPROOT . '/views/inc/footer.php';?>