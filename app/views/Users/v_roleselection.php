<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapperRoleSelection">

    <!-- <form action="" > -->
        <h1>Register</h1>
        <p class="startText"><strong> Register as a ...</strong></p>
        <div class="btnList">
            <a href="<?php echo URLROOT ?>/Users/assignUser/Buyer" class="btn">Buyer</a><br>
            <a href="<?php echo URLROOT ?>/Users/assignUser/Seller" class="btn">Seller</a><br>
<<<<<<< HEAD
            <a href="<?php echo URLROOT ?>/Users/assignUser/AgricultureExpert" class="btn">Agricultural Expert</a><br>
            <a href="<?php echo URLROOT ?>/Pages/registerVehicleRenter" class="btn">Vehicle Renter</a><br>
=======
            <a href="<?php echo URLROOT ?>/Users/assignUser/AgriExpert" class="btn">Agricultural Expert</a><br>
            <a href="<?php echo URLROOT ?>/Users/assignUser/VehicleRenter" class="btn">Vehicle Renter</a><br>
>>>>>>> d915dae3e3fbf8c706cade15917a6d2dffe2fde2
    
        </div>
        


        <div class="login-link">
            <p>Already a member? <a href="<?php echo URLROOT ?>/Users/v_login"> Login</a></p>
            
        </div>

    <!-- </form> -->
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>    