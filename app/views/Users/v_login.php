<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapperLogin">
        <form action="<?php echo URLROOT; ?>/Users/login" method="POST" >
            <h1>Login</h1>

            <p class="type-log">Email<sup>*</sup></p>
            <div class="input-box-log">
                <input type="text" name="email" placeholder="Enter Your Email" required value="<?php echo $data['email']; ?>">
                <i class='bx bxs-user-circle' ></i>
                <span class="invalid"><?php echo $data['email_err']; ?></span>
            </div>

            <p class="type-log">Password<sup>*</sup></p>
            <div class="input-box-log">
                <input type="password" name="password" placeholder="Password" required value="<?php echo $data['password']; ?>">
                <i class='bx bxs-lock-open-alt'></i>
                <span class="invalid"><?php echo $data['password_err']; ?></span>
            </div>

            <div class="remember-forgot">
                <label>
                    <input type="checkbox"> Remember me 
                </label>
                <a href="#"> Forgot password? </a>     
            </div>

            <button type="submit" class="btn" >Login</button>


            <div class="register-link">
                <p style="align-content: center;">Don't have an account?<a href="<?php echo URLROOT ?>/Pages/registerPage"> Register</a></p>
                
            </div>

            <div class="register-link">
                <h3>Log in a Service Provider<a href="<?php echo URLROOT ?>/Pages/"> Here</a></h3>
                
            </div>
        </form>
    </div>

    <?php require APPROOT . '/views/inc/footer.php'; ?>    