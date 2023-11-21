<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapper_Reset_Password">
    <form action="<?php echo URLROOT ?>/Users/resetPassword" method="post" >
            <h1>Reset passward ?</h1>

            <p class="type">New passward *</p>
            <div class="input-box">
                <input type="password" placeholder="Enter Password"  name="password" id="password" required value="<?php echo $data['password']; ?>">
                <i class='bx bxs-lock-open-alt'></i>
                <span class="invalid"><?php echo $data['password_err']; ?></span>
            </div>



            <p class="type">Confirm passward *</p>
            <div class="input-box">
                <input type="password" placeholder="Again enter Password"  name="confirm-password" id="confirm-password" required value="<?php echo $data['confirm-password']; ?>">
                <i class='bx bxs-lock-open-alt'></i>
                <span class="invalid"><?php echo $data['confirm-password_err']; ?></span>
            </div>

           

            <input type="hidden" name="otp" value="<?php echo $data['otp']; ?>">

            <button type="submit" class="btn" >Submit</button>

        </form>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>   