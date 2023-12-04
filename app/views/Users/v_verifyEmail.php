<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>



<div class="wrapper_Verify_Email">
    <form action="<?php echo URLROOT ?>/Users/forgotPassword" method="post" >
        <h1>Forgot passward ?</h1>
        <p class="start">* Enter verification code </p>
           
        <div class="input-box">
        <input type="text" name="otp" placeholder="Enter verification code send to the email " required>
            <i class='bx bxs-lock-open-alt'></i>
            <span class="invalid"><?php echo $data['otp_err']; ?></span>
        </div>

        <input type="hidden" name="email" value="<?php echo $data['email']; ?>">
                                              
        <div class="resendOtp">
             <a href="#">Resend OTP</a>
        </div>
        
        <button type="submit" class="btn" >Send</button>

    </form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>    