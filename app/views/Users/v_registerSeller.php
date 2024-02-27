<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapperSeller">
    <h1>Register as a Seller</h1>
    <p class="startText"> Regeister to <b>EasyFarm</b></p>
    <form action="<?php echo URLROOT ?>/Users/register" method="POST">

    <p class="type">Full name<sup>*</sup></p>
        <div class="input-box" >
            <input type="text" name="fullname" placeholder="Enter first name & last name" required value="<?php echo $data['fullname']; ?>">
            <i class='bx bxs-user-circle' ></i>
            <span class="invalid"><?php echo $data['name_err']; ?></span>
        </div>

        <p class="type">Contact number *</p>
        <div class="input-box">
            <input type="text" placeholder="Enter contact number" name="contactno" id="contactno"  required value="<?php echo $data['contactno']; ?>">
            <i class='bx bxs-phone-call' ></i>
            <span class="invalid"><?php echo $data['contactno_err']; ?></span>
        </div>
        
        <p class="type">Email<sup>*</sup></p>
        <div class="input-box">
            <input type="text" name="email" placeholder="Enter your email" required value="<?php echo $data['email']; ?>">
            <i class='bx bx-mail-send' ></i>
            <span class="invalid"><?php echo $data['email_err']; ?></span>
        </div>

        <p class="type">Password *</p>
        <div class="input-box">
            <input type="password" placeholder="Enter Password"  name="password" id="password" required value="<?php echo $data['password']; ?>">
            <i class='bx bxs-lock-open-alt'></i>
            <span class="invalid"><?php echo $data['password_err']; ?></span>
        </div>

        <p class="type">Confirm password *</p>
        <div class="input-box">
            <input type="password" placeholder="Again enter Password"  name="confirm-password" id="confirm-password" required value="<?php echo $data['confirm-password']; ?>">
            <i class='bx bxs-lock-open-alt'></i>
            <span class="invalid"><?php echo $data['confirm-password_err']; ?></span>
        </div>

        <p class="type">Upload NIC front/back images *</p>
        <div class="input-box">
            <input class="file-upload-input" type="file" onchange="readURL(this)"   name="nic" id="nic"  value="<?php echo $data['nic']; ?>">
            
        </div>
        <p class="startText"><b>Store Details</b></p>

        <p class="type">Store Name *</p>
        <div class="input-box" >
            <input type="text" placeholder="Enter store name"  name="store_name" id="store_name" required value="<?php echo $data['store_name']; ?>">
            <i class='bx bxs-user-circle' ></i>
        </div>
        <p class="type">Store Address *</p>
        <div class="input-box">
            <input type="text" placeholder="Enter your address"  name="store_address" id="store_address" required value="<?php echo $data['store_address']; ?>">
            <i class='bx bxs-edit-location'></i>
        </div>

        <p class="type">Province (Store Location) *</p>  
        <div>

        <select name="store_province" id="store_province" required>
            <option value="" disabled selected>Select a district</option>
            <option value="Western" <?php echo ($data['store_province'] == 'Western') ? 'selected' : ''; ?>>Western</option>
            <option value="Southern" <?php echo ($data['store_province'] == 'Southern') ? 'selected' : ''; ?>>Southern</option>
            <option value="Central" <?php echo ($data['store_province'] == 'Central') ? 'selected' : ''; ?>>Central</option>
            <option value="Eastern" <?php echo ($data['store_province'] == 'Eastern') ? 'selected' : ''; ?>>Eastern</option>
            <option value="Northern" <?php echo ($data['store_province'] == 'Northern') ? 'selected' : ''; ?>>Northern</option>
            <option value="Sabaragamuwa" <?php echo ($data['store_province'] == 'Sabaragamuwa') ? 'selected' : ''; ?>>Sabaragamuwa</option>
            <option value="North Central" <?php echo ($data['store_province'] == 'North Central') ? 'selected' : ''; ?>>North Central</option>
        
        </select><i class='bx bxs-edit-location'></i>
        </div>

        <p class="startText"><b>Bank Details</b></p>

        <p class="type">Account holder name *</p>
        <div class="input-box" >
            <input type="text" placeholder="Enter Account holder name"  name="ac_Holder_name" id="ac_Holder_name"  required value="<?php echo $data['ac_Holder_name']; ?>">
            <i class='bx bxs-user-circle' ></i>
        </div>
        <p class="type">Bank name *</p>
        <div class="input-box">
            <input type="text" placeholder="Enter bank name"  name="bank_name" id="bank_name"  required value="<?php echo $data['bank_name']; ?>">
            <i class='bx bxs-edit-location'></i>
        </div>
        <p class="type">Branch name *</p>
        <div class="input-box">
            <input type="text" placeholder="Enter branch name"  name="branch_name" id="branch_name"  required value="<?php echo $data['branch_name']; ?>">
            <i class='bx bxs-edit-location'></i>
        </div>
        <p class="type">Account number *</p>
        <div class="input-box">
            <input type="text" placeholder="Enter Account number"  name="ac_number" id="ac_number"  required value="<?php echo $data['ac_number']; ?>">
            <i class='bx bxs-edit-location'></i>
        </div>

        <button type="submit" class="btn" name="seller_reg" id="seller_reg"><a href="#"></a>Register</button>
        
        <div>
            <input type="hidden" name="user_type" value="Seller">
        </div>

        
        <div class="login-link">
        <p>By clicking <b>Register</b>, you agree to easyfarms<br> <a href="#"> Terms of use</a> and <a href="#">Privacy Policy</a></p>     
        </div>
    </form>
</div>



<?php require APPROOT . '/views/inc/footer.php'; ?>   