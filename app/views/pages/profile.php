<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapperProfile">


    <h1>You are registered as a <?php echo $data['User_type']; ?></h1>


    <div class="wrapperProfile_sub">
        <p><b>Profile</b></p><br>

        <div class="row">
            <div class="column1" >
                <p><img src="<?php echo URLROOT?>/public/images/Profile\images (1).jpeg" alt=""></p>
                
            </div>
            <div class="column2" >
                <p><?php echo $data['Name']; ?></p>
                <p>Registered as a <?php echo $data['User_type']; ?></p>
            </div>
        </div>

    </div>


    <div class="wrapperProfile_sub">

        <p><b>Account Details</b></p><br>

        <div class="row">
            <div class="column1" >
                <p>Full name</p>
            </div>
            <div class="column2" >
                <p><?php echo $data['Name']; ?></p>
            </div>
        </div>


        <div class="row">
            <div class="column1" >
                <p>Email</p>
            </div>
            <div class="column2" >
                <p><?php echo $data['Email']; ?></p>
            </div>
        </div>


        <?php if ($data['User_type'] == "Buyer") : ?>

            <div class="row">
                <div class="column1" >
                    <p>Contact number</p>
                </div>
                <div class="column2" >
                    <p><?php echo $data['Contact_num']; ?></p>
                </div>
            </div>

            <div class="row">
                <div class="column1" >
                    <p>Address </p>
                </div>
                <div class="column2" >
                    <p><?php echo $data['Address']; ?></p>
                </div>
            </div>

            
<!--                         
            <div class="row">
                <div class="column1" >
                    <p>City </p>
                </div>
                <div class="column2" >
                    <p><?php echo $data['Address']; ?></p>
                </div>
            </div>
                
            <div class="row">
                <div class="column1" >
                    <p>Postal Code </p>
                </div>
                <div class="column2" >
                    <p><?php echo $data['Name']; ?></p>
                </div>
            </div> -->


        <?php elseif ($data['User_type'] == "Seller") : ?>


<!--             
            <div class="row">
                <div class="column1" >
                    <p>Contact number</p>
                </div>
                <div class="column2" >
                    <p><?php echo $data['Contact_num']; ?></p>
                </div>
            </div> -->

            <div class="row">
                <div class="column1" >
                    <p>Store Name</p>
                </div>
                <div class="column2" >
                    <p><?php echo $data['Store_Name']; ?></p>
                </div>
            </div>

            <div class="row">
                <div class="column1" >
                    <p>Store Address </p>
                </div>
                <div class="column2" >
                    <p><?php echo $data['Store_Adress']; ?></p>
                </div>
            </div>
<!--             
            <div class="row">
                <div class="column1" >
                    <p>Account holder name </p>
                </div>
                <div class="column2" >
                    <p><?php echo $data['Account_Holder']; ?></p>
                </div>
            </div> -->
            
            <div class="row">
                <div class="column1" >
                    <p>Bank name </p>
                </div>
                <div class="column2" >
                    <p><?php echo $data['Bank_Name']; ?></p>
                </div>
            </div>
            
            <div class="row">
                <div class="column1" >
                    <p>Branch name</p>
                </div>
                <div class="column2" >
                    <p><?php echo $data['Branch_Name']; ?></p>
                </div>
            </div>
            
            <div class="row">
                <div class="column1" >
                    <p>Account number</p>
                </div>
                <div class="column2" >
                    <p><?php echo $data['Account_Number']; ?></p>
                </div>
            </div>

        <?php elseif ($data['User_type'] == "AgricultureExpert") : ?>
            <div class="row">
                <div class="column1" >
                    <p>Address</p>
                </div>
                <div class="column2" >
                    <p><?php echo $data['Address']; ?></p>
                </div>
            </div>

            <div class="row">
                <div class="column1" >
                    <p>City </p>
                </div>
                <div class="column2" >
                    <p><?php echo $data['City']; ?></p>
                </div>
            </div>

            <div class="row">
                <div class="column1" >
                    <p>Workplace </p>
                </div>
                <div class="column2" >
                    <p><?php echo $data['Workplace']; ?></p>
                </div>
            </div>

            <!-- <div class="row">
                <div class="column1" >
                    <p> NIC front/back images</p>
                </div>
                <div class="column2" >
                    <p><?php echo $data['NIC']; ?></p>
                </div>
            </div>

            <div class="row">
                <div class="column1" >
                    <p>Workplace ID front/back images </p>
                </div>
                <div class="column2" >
                    <p><?php echo $data['Prof_id']; ?></p>
                </div>
            </div> -->


            <?php elseif ($data['User_type'] == "VehicleRenter") : ?>


            <div class="row">
                <div class="column1" >
                    <p>Contact number</p>
                </div>
                <div class="column2" >
                    <p><?php echo $data['Contact_num']; ?></p>
                </div>
            </div>

            <div class="row">
                <div class="column1" >
                    <p>Address</p>
                </div>
                <div class="column2" >
                    <p><?php echo $data['Address']; ?></p>
                </div>
            </div>

            <div class="row">
                <div class="column1" >
                    <p>City </p>
                </div>
                <div class="column2" >
                    <p><?php echo $data['City']; ?></p>
                </div>
            </div>

            <?php endif; ?>          


    </div>
    
    <div class="wrapperProfile_sub">
        <p><b>Change Passward</b></p><br>

        <form action="<?php echo URLROOT ?>/Profile/updateProfile" method="post" >
            
        <p class="type">Current passward *</p>
            <div class="input-box">
                <input type="password" placeholder="Enter Current Password"  name="current-password" id="current-password" required >
                <i class='bx bxs-lock-open-alt'></i>
                <span class="invalid"><?php echo $data['password_err']; ?></span>
            </div>

            <p class="type">New passward *</p>
            <div class="input-box">
                <input type="password" placeholder="Enter Password"  name="password" id="password" required >
                <i class='bx bxs-lock-open-alt'></i>
                <span class="invalid"><?php echo $data['password_err']; ?></span>
            </div>



            <p class="type">Confirm passward *</p>
            <div class="input-box">
                <input type="password" placeholder="Again enter Password"  name="confirm-password" id="confirm-password" required >
                <i class='bx bxs-lock-open-alt'></i>
                <span class="invalid"><?php echo $data['confirm-password_err']; ?></span>
            </div>

           

            <!-- <input type="hidden" name="otp" value="<?php echo $data['otp']; ?>"> -->
            <input type="hidden" name="email" value=<?php echo $data['Email']; ?>>

            <!-- <input type="hidden" name="uId" value=<?php echo$_SESSION['user_ID']?>> -->
            
            
            <br><button type="submit" class="btn" >Save the changes</button>

        </form>

    </div>


</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>        