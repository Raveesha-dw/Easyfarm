<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapper-vehicle">
        <form action="<?php echo URLROOT ?>/Users/register" method="post">
                    <h1>Register as a Vehicle owner</h1>
                    <p class="startText"> Register to <b>EasyFarm</b></p>

                    <p class="type">Full name *</p>
                    <div class="input-box-v" >
                <input type="text" name="fullname" placeholder="Enter first name & last name" required value="<?php echo $data['fullname'] ?>">
                <i class='bx bxs-user-circle' ></i>
            </div>

            <p class="type">Contact number *</p>
            <div class="input-box-v">
                <input type="text" name="contactno" placeholder="Enter contact number" required value="<?php echo $data['contactno'] ?>">
                <i class='bx bxs-phone-call' ></i>
            </div>

            <p class="type">Email<sup>*</sup></p>
            <div class="input-box-v">
                <input type="text" name="email" placeholder="Enter your email" value="<?php echo $data['email'] ?>">
                <i class='bx bx-mail-send' ></i>
            </div>

            <p class="type">Address *</p>
            <div class="input-box-v">
                <input type="text" name="address" placeholder="Enter your address" required value="<?php echo $data['address'] ?>">
                <i class='bx bxs-edit-location'></i>
            </div>

            <p class="type">City *</p>
            <div class="input-box-v">
                <input type="text" name="city" placeholder="Enter nearest city" required value="<?php echo $data['city'] ?>"> 
                <i class='bx bx-location-plus' ></i>
            </div>

            <p class="type">Password *</p>
            <div class="input-box-v">
                <input type="password" name="password" placeholder="Enter Password" required value="<?php echo $data['password'] ?>">
                <i class='bx bxs-lock-open-alt'></i>
            </div>

            <p class="type">Confirm Password *</p>
            <div class="input-box-v">
                <input type="password" name="confirm-password" placeholder="Re-enter Password" required value="<?php echo $data['confirm-password'] ?>">
                <i class='bx bxs-lock-open-alt'></i>
            </div>
  
            <div>
            <input type="hidden" name="user_type" value="VehicleRenter">
            </div>

            
            


        <div>
            <input type="hidden" name="user_type" value="VehicleRenter">
        </div>
     



            <button type="submit" class="btn" >Register</button>


            <div class="login-link">
                <p>By clicking <b>Register</b>, you agree to easyfarms<br> <a href="<?php echo URLROOT?>/Pages/termsOfUse"> Terms of use</a> and <a href="<?php echo URLROOT?>/Pages/privacyPolicy">Privacy Policy</a></p>     
            </div>
        </form>
    </div>


<?php require APPROOT . '/views/inc/footer.php'; ?>   