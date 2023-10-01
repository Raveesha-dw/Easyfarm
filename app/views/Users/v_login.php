<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapperLogin">
        <form action="<?php echo URLROOT; ?>/Users/login" method="POST" >
            <h1>Login</h1>
            <div class="input-box-log">
                <input type="text" placeholder="Enter Email" required>
                <i class='bx bxs-user-circle' ></i>
            </div>
            <div class="input-box-log">
                <input type="password" placeholder="Password" required>
                <i class='bx bxs-lock-open-alt'></i>
            </div>

            <div class="remember-forgot">
                <label>
                    <input type="checkbox"> Remember me 
                </label>
                <a href="#"> Forgot password? </a>     
            </div>

            <button type="submit" class="btn" >Login</button>


            <div class="register-link">
                <p>Don't have an account?<a href="<?php echo URLROOT ?>/Pages/registerPage"> Register</a></p>
                
            </div>
        </form>
    </div>

    <?php require APPROOT . '/views/inc/footer.php'; ?>    