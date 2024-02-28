<header>
    <div style="overflow: hidden;"><h3>EASYFARM</h3></div>
    <nav>
        <ul class="nav-list">
            <li><a href="<?php echo URLROOT ?>">Marketplace</a></li>
            <li><a href="<?php echo URLROOT?>/Vehicle_item/gethomepage">Rent A Vehicle</a></li>
            <li><a href="<?php echo URLROOT . '/Blog' ?>">Blog</a></li>
        </ul>
    </nav>

    <?php
        if(isset( $_SESSION['user_ID'])){
    ?>
                <div class="nav-panel">
                     <ul class="nav-list">
                        <li><a href="<?php echo URLROOT . '/AgriInstructor'?>">Manage</a></li>
                        <li><a href="<?php echo URLROOT?>/Profile/viewProfile?email=<?php echo $_SESSION['user_email']; ?>">Profile</a></li>
                        <li><a href="<?php echo URLROOT?>/Users/logout">Logout</a></li>
                     </ul>   
                </div>
                <!-- <div class="btn-dashboard">
                        <a href="<?php echo URLROOT . '/AgriInstructor/manageposts' ?>" ><h5 class="btn-dashboard"><i class="bx bxs-tachometer"></i>  Dashboard</h5></a>
                </div> -->
   <?php
        }else{
   ?>
                <div class="nav-panel">
                        <div class="login">
                                <a href="<?php echo URLROOT . '/Users/login'?>">Log in</a>
                                <a class="btn btn-medium" href="<?php echo URLROOT . '/Pages/registerPage'?>">Sign up</a>
                        </div>
                </div>
   <?php
        }
    ?>
    
</header>