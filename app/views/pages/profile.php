<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapperProfile">
    <?php 
    // TODO: Add the user type
    $data['User_type']="Buyer";
    ?>
    
    <h1>You are registered as a <?php echo $data['User_type']; ?></h1>


    <div class="wrapperProfile_sub">

        <div class="row">
            <div class="column1" >
                <p>Full name</p>
            </div>
            <div class="column2" >
                <p>Some text..</p>
            </div>
        </div>

        <div class="row">
            <div class="column1" >
                <p>Contact number</p>
            </div>
            <div class="column2" >
                <p>Some text..</p>
            </div>
        </div>

        <div class="row">
            <div class="column1" >
                <p>Email</p>
            </div>
            <div class="column2" >
                <p>Some text..</p>
            </div>
        </div>
               
        <div class="row">
            <div class="column1" >
                <p>Password  </p>
            </div>
            <div class="column2" >
                <p>Some text..</p>
            </div>
        </div>














        <?php if ($data['User_type'] == "Buyer") : ?>
            <div class="row">
                <div class="column1" >
                    <p>Address </p>
                </div>
                <div class="column2" >
                    <p>Some text..</p>
                </div>
            </div>
                        
            <div class="row">
                <div class="column1" >
                    <p>City </p>
                </div>
                <div class="column2" >
                    <p>Some text..</p>
                </div>
            </div>
                
            <div class="row">
                <div class="column1" >
                    <p>Postal Code </p>
                </div>
                <div class="column2" >
                    <p>Some text..</p>
                </div>
            </div>


        <?php elseif ($data['User_type'] == "Seller") : ?>
            <div class="row">
                <div class="column1" >
                    <p>Store Name</p>
                </div>
                <div class="column2" >
                    <p>Some text..</p>
                </div>
            </div>

            <div class="row">
                <div class="column1" >
                    <p>Store Address </p>
                </div>
                <div class="column2" >
                    <p>Some text..</p>
                </div>
            </div>
            
            <div class="row">
                <div class="column1" >
                    <p>Account holder name </p>
                </div>
                <div class="column2" >
                    <p>Some text..</p>
                </div>
            </div>
            
            <div class="row">
                <div class="column1" >
                    <p>Bank name </p>
                </div>
                <div class="column2" >
                    <p>Some text..</p>
                </div>
            </div>
            
            <div class="row">
                <div class="column1" >
                    <p>Branch name</p>
                </div>
                <div class="column2" >
                    <p>Some text..</p>
                </div>
            </div>
            
            <div class="row">
                <div class="column1" >
                    <p>Account number</p>
                </div>
                <div class="column2" >
                    <p>Some text..</p>
                </div>
            </div>

        <?php elseif ($data['User_type'] == "AgricultureExpert") : ?>
            <div class="row">
                <div class="column1" >
                    <p>Address</p>
                </div>
                <div class="column2" >
                    <p>Some text..</p>
                </div>
            </div>

            <div class="row">
                <div class="column1" >
                    <p>City </p>
                </div>
                <div class="column2" >
                    <p>Some text..</p>
                </div>
            </div>

            <div class="row">
                <div class="column1" >
                    <p>Occupation</p>
                </div>
                <div class="column2" >
                    <p>Some text..</p>
                </div>
            </div>

            <div class="row">
                <div class="column1" >
                    <p>Workplace </p>
                </div>
                <div class="column2" >
                    <p>Some text..</p>
                </div>
            </div>

            <div class="row">
                <div class="column1" >
                    <p> NIC front/back images</p>
                </div>
                <div class="column2" >
                    <p>Some text..</p>
                </div>
            </div>

            <div class="row">
                <div class="column1" >
                    <p>Workplace ID front/back images </p>
                </div>
                <div class="column2" >
                    <p>Some text..</p>
                </div>
            </div>


            <?php elseif ($data['User_type'] == "VehicleRenter") : ?>
            <div class="row">
                <div class="column1" >
                    <p>Address</p>
                </div>
                <div class="column2" >
                    <p>Some text..</p>
                </div>
            </div>

            <div class="row">
                <div class="column1" >
                    <p>City </p>
                </div>
                <div class="column2" >
                    <p>Some text..</p>
                </div>
            </div>

            <?php endif; ?>          


    </div>


</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>        