<!-- <div class="header">
        <div class="flex"> -->
            <!-- <h1><a href="<?php echo URLROOT?>/Pages/index"> EasyFarm </a></h1> -->
            <!-- <h1>EasyFarm</h1>
            <div class="navbar">
                <ul>
                    <li><a class="active" href="<?php echo URLROOT ?>/Pages/index">Marketplace</a></li>
                    <li><a href="#">Repository</a></li>
                    <li><a href="#">Forum</a></li>
                    <li><a href="#">Vehicle Renting</a></li>
                    <li><a href="<?php echo URLROOT?>/Users/login" id="home">Login</a></li>
                    <li><a href="<?php echo URLROOT?>/Pages/registerPage" id="home">Register</a></li>
                </ul>
            </div>
        </div>
    </div> -->
<div class="profileNavBar">
    <div class="header">
            <div class="flex">
                <!-- <h1>EasyFarm</h1> -->
                <div class="nav-logo">
                    <h2><a href="<?php echo URLROOT ?>/Pages/index">EasyFarm</a></h2>
                </div>
                <div class="nav-parts">
            </div>
            <div class="nav-parts">
            </div>
            <div class="nav-parts">
            </div>


                    <div class="nav-parts">
                    <a href="<?php echo URLROOT?>/Cart/showCart"><i class="fas fa-shopping-cart cart"></i></a>
                </a>
                </div>




                <div class="nav-parts">

                    <a href="<?php echo URLROOT ?>/Pages/index">Marketplace</a>
                </div>

                <div class="nav-parts">
                    <a href="<?php echo URLROOT?>/Blog">Blog</a>
                </div>

                <div class="nav-parts">
                    <a href="<?php echo URLROOT?>/Vehicle_item/gethomepage">Rent A Vehicle</a>
                </div>

            <?php
            if(!empty($_SESSION['user_email'])){
                ?>
                    <div class="welcome-banner" style="padding: 10px">
                        <h2 class="greeting" onclick="toggleMenu()"><?php echo $_SESSION['user_email']; ?> ></h2>
                        <div class="profile-menu-wrap" id="sub-menu">
                            <div class="user-menu">
                                <div class="user-info">
                                <a href="<?php echo URLROOT?>/Profile/viewProfile?email=<?php echo $_SESSION['user_email']; ?>" class="sub-link-menu">
                                        <h2><i class="fa-solid fa-user"></i>View Profile</h2>
                                        <span>></span>
                                    </a>
                                    <?php if($_SESSION['user_type'] == 'Seller') :?>
                                        <a href="<?php echo URLROOT?>/Pages/dashboard" class="sub-link-menu">
                                            <h2><i class="fa-solid fa-gauge"></i>Dashboard</h2>
                                            <span>></span>
                                        </a>

                                        <?php elseif($_SESSION['user_type'] == 'VehicleRenter') :?>

                                        <a href="http://localhost/Easyfarm/V_renter_home/get_details1" class="sub-link-menu">
                                            <h2><i class="fa-solid fa-gauge"></i>Dashboard</h2>
                                            <span>></span>
                                        </a>

                                        


                                    <?php else: ?>
                                        <a href="<?php echo URLROOT?>/Cart/showCart" class="sub-link-menu">
                                            <h2>Dashboard</h2>
                                            <span>></span>
                                        </a>

                                    <?php endif; ?>

                                    <a href="<?php echo URLROOT?>/Users/logout" class="sub-link-menu">
                                    <h2><i class="fa-solid fa-right-from-bracket"></i>Logout</h2>
                                    <span>></span>
                                </a>
                            </div>
                        </div>
                
                    </div>
                <?php
            }else{
                ?>

                <div class="nav-parts" style="padding: 20px 0">
                <!-- <button class="nav-btns" onclick="location.href='<?php echo URLROOT ?>/Users/login'">Login</button> -->
                <a href="<?php echo URLROOT ?>/Users/login" class="nav-btns">Login</a>
                
                </div>

                <div class="nav-parts" style="padding: 20px 0">
                    <!-- <button class="nav-btns" onclick="location.href='<?php echo URLROOT ?>/Pages/registerPage'">Register</button> -->
                    <a href="<?php echo URLROOT ?>/Pages/registerPage" class="nav-btns">Register</a>
            </div>
            <?php
            }
            ?>

                
            </div>
        </div>

</div>
    

    <script>
            let subMenu = document.getElementById("sub-menu");
            function toggleMenu(){
                subMenu.classList.toggle("open-menu");
            }
    </script>