<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapperRoleSelection">

    <!-- <form action="" > -->
        <h1>Register</h1>
        <p class="startText"><strong> Register as a ...</strong></p>
        <div class="btnList">
            <a href="<?php echo URLROOT ?>/Users/assignUser/Buyer" class="btn">Buyer</a><br>
            <a href="<?php echo URLROOT ?>/Users/assignUser/Seller" class="btn">Seller</a><br>
            <a href="<?php echo URLROOT ?>/Users/assignUser/VehicleRenter" class="btn">Vehicle Renter</a><br>
            <a href="<?php echo URLROOT ?>/Users/assignUser/AgriExpert" class="btn">Agriculture Instructor</a><br>
        </div>
        


        <div class="login-link">
            <p>Already a member? <a href="<?php echo URLROOT ?>/Users/login"> Login</a></p>
            
        </div>

    <!-- </form> -->
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>    