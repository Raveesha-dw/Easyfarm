<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapperRoleSelection">

    <!-- <form action="" > -->
        <h1>Register</h1>
        <p class="startText"><strong> Register as a ...</strong></p>
        <div class="btnList">
            <a href="<?php echo URLROOT ?>/Users/register" class="btn">Buyer</a><br>
            <a href="<?php echo URLROOT ?>/Pages/registerSeller" class="btn">Seller</a><br>
            <a href="<?php echo URLROOT ?>/Pages/index" class="btn">Agricultural Expert</a><br>
            <a href="<?php echo URLROOT ?>/Pages/registerVehicleRenter" class="btn">Vehicle Renter</a><br>
    
        </div>
        


        <div class="login-link">
            <p>Already a member? <a href="#"> Login</a></p>
            
        </div>
    <!-- </form> -->
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>    