<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapper">
        <form action="" >
            <h1>Register as a Vehicle owner</h1>
            <p class="startText"> Register to <b>EasyFarm</b></p>
            <p class="type">Full name *</p>
            <div class="input-box" >
                <input type="text" placeholder="Enter first name & last name" required>
                <i class='bx bxs-user-circle' ></i>
            </div>
            <p class="type">Contact number *</p>
            <div class="input-box">
                <input type="text" placeholder="Enter contact number" required>
                <i class='bx bxs-phone-call' ></i>
            </div>
            <p class="type">Password *</p>
            <div class="input-box">
                <input type="password" placeholder="Enter Password" required>
                <i class='bx bxs-lock-open-alt'></i>
            </div>
            <p class="type">Email</p>
            <div class="input-box">
                <input type="text" placeholder="Enter your email" >
                <i class='bx bx-mail-send' ></i>
            </div>
            <p class="type">Address *</p>
            <div class="input-box">
                <input type="text" placeholder="Enter your address" required>
                <i class='bx bxs-edit-location'></i>
            </div>
            <p class="type">City *</p>
            <div class="input-box">
                <input type="text" placeholder="Enter nearest city" required>
                <i class='bx bx-location-plus' ></i>
            </div>


            <button type="submit" class="btn" >Register</button>


            <div class="login-link">
                <p>By clicking <b>Register</b>, you agree to easyfarms<br> <a href="#"> Terms of use</a> and <a href="#">Privacy Policy</a></p>     
            </div>
        </form>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>   