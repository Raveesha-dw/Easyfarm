<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapper_forgotPassword">
    <form action="<?php echo URLROOT ?>/Users/forgotPassword" method="POST">
        <h1>Forgot passward ?</h1>
        
        <p class="start">* Enter your email address to reset passward </p>
        <div class="input-box">
            <input type="text" name="email" placeholder="Enter your email" required value="<?php echo $data['email']; ?>">
            <i class='bx bx-mail-send' ></i>
            <span class="invalid"><?php echo $data['email_err']; ?></span>
        </div>

        <button type="submit" class="btn" >Send</button>


        <div class="end">
            <p>You will receive a verification codeyour email.<br>
            Enter your verification code to reset passward. </p>
            
        </div>
    </form>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>   