<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapperBuyer">
    <h1>Register as a Buyer</h1>
    <p class="startText"> Register to <b>EasyFarm</b></p>
    <form action="<?php echo URLROOT ?>/Users/register" method="POST">   
        
        <p class="type">Full name<sup>*</sup></p>
        <div class="input-box" >
            <input type="text" name="fullname" placeholder="Enter first name & last name" required value="<?php echo $data['fullname']; ?>">
            <i class='bx bxs-user-circle' ></i>
            <span class="invalid"><?php echo $data['name_err']; ?></span>
        </div>

        <p class="type">Contact number<sup>*</sup></p>
        <div class="input-box">
            <input type="text" name="contactno" placeholder="Enter contact number" required value="<?php echo $data['contactno']; ?>">
            <i class='bx bxs-phone-call' ></i>
            <span class="invalid"><?php echo $data['contactno_err']; ?></span>
        </div>

        <p class="type">Email<sup>*</sup></p>
        <div class="input-box">
            <input type="text" name="email" placeholder="Enter your email" required value="<?php echo $data['email']; ?>">
            <i class='bx bx-mail-send' ></i>
            <span class="invalid"><?php echo $data['email_err']; ?></span>
        </div>

        <p class="type">Address *</p>
        <div class="input-box">
            <input type="text" name="address" placeholder="Enter address" required value="<?php echo $data['address']; ?>">
            <i class='fa fa-address-book' ></i>
            <span class="invalid"><?php echo $data['address_err']; ?></span>
        </div>
        <p class="type">City *</p>
        <div class="input-box">
            <input type="text" name="city" placeholder="Enter City" required value="<?php echo $data['city']; ?>">
            <i class='fa fa-address-book' ></i>
            <span class="invalid"><?php echo $data['address_err']; ?></span>
        </div>
        <p class="type">Postal Code *</p>
        <div class="input-box">
            <input type="text" name="postalcode" placeholder="Enter postal code" required value="<?php echo $data['postalcode']; ?>">
            <i class='fa fa-envelope' ></i>
            <span class="invalid"><?php echo $data['address_err']; ?></span>
        </div>

        <p class="type">Province (Of Residence) *</p>
        <div class="input-box">
            <input type="text" name="province" placeholder="Enter province " required value="<?php echo $data['province']; ?>">
            <i class='fa-solid fa-map-location-dot' ></i>
            <span class="invalid"><?php echo $data['province_err']; ?></span>
        </div>

        <p class="type">Password *</p>
        <div class="input-box">
            <input type="password" name="password" placeholder="Enter Password" required value="<?php echo $data['password']; ?>">
            <i class='bx bxs-lock-open-alt'></i>
            <span class="invalid"><?php echo $data['password_err']; ?></span>
        </div>
        <p class="type">Confirm Password *</p>
        <div class="input-box">
            <input type="password" name="confirm-password" placeholder="Re-enter Password" required value="<?php echo $data['confirm-password']; ?>">
            <i class='bx bxs-lock-open-alt'></i>
            <span class="invalid"><?php echo $data['confirm-password_err']; ?></span>
        </div>
        
        <div>
            <input type="hidden" name="user_type" value="Buyer">
        </div>


        <button type="submit" class="btn" >Register</button>


        <div class="login-link">
            <p>By clicking <b>Register</b>, you agree to easyfarms<br> <a href="#"> Terms of use</a> and <a href="#">Privacy Policy</a></p>     
        </div>
    </form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>        