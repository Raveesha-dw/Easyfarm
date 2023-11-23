<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php';?>

<div class="wrapperAgriExpert">
    <h1>Register as a Agricultural expert</h1>
<<<<<<< HEAD
    <p class="startText"> Regeister to <b>EasyFarm</b></p>
=======
    <p class="startText"> Register to <b>EasyFarm</b></p>
>>>>>>> d915dae3e3fbf8c706cade15917a6d2dffe2fde2
    <form action="<?php echo URLROOT ?>/Users/register" method="POST">
    
        <p class="type">Full name *</p>
        <div class="input-box" >
            <input type="text" placeholder="Enter first name & last name" name="fullname" id="fullname" required value="<?php echo $data['fullname']; ?>">
            <i class='bx bxs-user-circle' ></i>
            <span class="invalid"><?php echo $data['name_err']; ?></span>
        </div>

        <p class="type">Contact number *</p>
        <div class="input-box">
            <input type="text" placeholder="Enter contact number" name="contactno" id="contactno" required value="<?php echo $data['contactno']; ?>">
            <i class='bx bxs-phone-call' ></i>
            <span class="invalid"><?php echo $data['name_err']; ?></span>
        </div>

        <p class="type">Password *</p>
        <div class="input-box">
            <input type="password" placeholder="Enter Password" name="password" id="password"  required value="<?php echo $data['password']; ?>">
            <i class='bx bxs-lock-open-alt'></i>
            <span class="invalid"><?php echo $data['password_err']; ?></span>
        </div>

        <p class="type">Confirm Password *</p>
        <div class="input-box">
            <input type="password" name="confirm-password" placeholder="Re-enter Password" required value="<?php echo $data['confirm-password']; ?>">
            <i class='bx bxs-lock-open-alt'></i>
            <span class="invalid"><?php echo $data['confirm-password_err']; ?></span>
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
            <i class='bx bxs-edit-location'></i>
        </div>

        <p class="type">City *</p>
        <div class="input-box">
            <input type="text" name="city" placeholder="Enter City" required value="<?php echo $data['city']; ?>">
            <i class='fa fa-address-book' ></i>
            <span class="invalid"><?php echo $data['address_err']; ?></span>
        </div>

        <p class="type">Occupation *</p>
        <div class="input-box">
            <input type="text" placeholder="Enter occupation" name="occupation" id="occupation"  required value="<?php echo $data['occupation']; ?>">
            <i class='bx bx-user-pin' ></i>
        </div>
<<<<<<< HEAD
        <p class="type">Worlplace *</p>
=======
        <p class="type">Workplace *</p>
>>>>>>> d915dae3e3fbf8c706cade15917a6d2dffe2fde2
        <div class="input-box">
            <input type="text" placeholder="Enter workplace" name="workplace" id="workplace"  required value="<?php echo $data['workplace']; ?>">
            <i class='bx bx-current-location' ></i>
        </div>
        <p class="type">Upload NIC front/back images *</p>
        <div class="input-box">
            <input class="file-upload-input" type="file" onchange="readURL(this)" accept="=Image/*"  name="nic" id="nic" required value="<?php echo $data['nic']; ?>" >
            
        </div>
        <p class="type">Upload Workplace ID front/back images *</p>
        <div class="input-box">
            <input class="file-upload-input" type="file" onchange="readURL(this)" accept="=Image/*"  name="pId" id="pId" required value="<?php echo $data['pId']; ?>">
            
        </div>

        <div>
            <input type="hidden" name="user_type" value="AgricultureExpert">
        </div>

        <button type="submit" class="btn" name="agriExpert_reg" id="agriExpert_reg" >Register</button>


        <div class="login-link">
            <p>By clicking <b>Register</b>, you agree to easyfarms<br> <a href="#"> Terms of use</a> and <a href="#">Privacy Policy</a></p>     
        </div>
    </form>
</div>



<?php require APPROOT . '/views/inc/footer.php'; ?>  