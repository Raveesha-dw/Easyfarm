<?php
// This line gets the current URL path, e.g., "/Users/login" or any other page
$current_page = $_SERVER['REQUEST_URI'];
?>
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

                <?php if ((!empty($_SESSION['user_email'])) && ($_SESSION['user_type'] == 'Buyer')): ?>
                    <div class="nav-parts">
                    <a href="<?php echo URLROOT ?>/Cart/showCart"><i class="fas fa-shopping-cart cart"></i></a>

                    </div>

                <?php endif;?>


                <div class="nav-parts">

                    <a href="<?php echo URLROOT ?>/Pages/index">Marketplace</a>
                </div>

                <div class="nav-parts">
                    <a href="<?php echo URLROOT ?>/Blog">Blog</a>
                </div>

                <div class="nav-parts">
                    <a href="<?php echo URLROOT ?>/Vehicle_item/gethomepage">Vehicle Booking</a>
                </div>

            <?php
if (!empty($_SESSION['user_email'])) {
    ?>
                    <div class="welcome-banner" style="padding: 10px">
                        <h2 class="greeting" onclick="toggleMenu()"><?php echo $_SESSION['user_email']; ?> ></h2>
                        <div class="profile-menu-wrap" id="sub-menu">
                            <div class="user-menu">
                                <div class="user-info">
                                <a href="<?php echo URLROOT ?>/Profile/viewProfile?email=<?php echo $_SESSION['user_email']; ?>" class="sub-link-menu">
                                        <h2><i class="fa-solid fa-user"></i>View Profile</h2>
                                        <span>></span>
                                    </a>
                                    <?php if ($_SESSION['user_type'] == 'Seller'): ?>
                                        <a href="<?php echo URLROOT ?>/Pages/dashboard" class="sub-link-menu">
                                            <h2><i class="fa-solid fa-gauge"></i>Dashboard</h2>
                                            <span>></span>
                                        </a>

                                        <?php elseif ($_SESSION['user_type'] == 'VehicleRenter'): ?>

                                        <a href="http://localhost/Easyfarm/V_renter_home/get_details1" class="sub-link-menu">
                                            <h2><i class="fa-solid fa-gauge"></i>Dashboard</h2>
                                            <span>></span>
                                        </a>




                                    <?php elseif ($_SESSION['user_type'] == 'Buyer'): ?>
                                        <a href="<?php echo URLROOT ?>/Cart/showCart" class="sub-link-menu">
                                            <h2>Shopping Cart</h2>
                                        </a>
                                        <a href="<?php echo URLROOT ?>/Orders/placedOrders" class="sub-link-menu">
                                            <h2>My orders</h2>
                                        </a>
                                        <a href="<?php echo URLROOT ?>/Review/userReviews" class="sub-link-menu">
                                            <h2>My Reviews</h2>
                                        </a>
                                    <?php endif;?>

                                    <a href="<?php echo URLROOT ?>/Users/logout" class="sub-link-menu">
                                    <h2><i class="fa-solid fa-right-from-bracket"></i>Logout</h2>
                                    <span>></span>
                                </a>
                            </div>
                        </div>

                    </div>
                <?php
} else {
    ?>

                <div class="nav-parts" style="padding: 20px 0">
                <!-- <button class="nav-btns" onclick="location.href='<?php echo URLROOT ?>/Users/login'">Login</button> -->
                <a href="<?php echo URLROOT ?>/Users/login" class="nav-btns">Login</a>

                </div>

                <!-- <div class="nav-parts" style="padding: 20px 0"> -->
                    <!-- <button class="nav-btns" onclick="location.href='<?php echo URLROOT ?>/Pages/registerPage'">Register</button> -->
                    <!-- <a href="<?php echo URLROOT ?>/Pages/registerPage" class="nav-btns">Register</a> -->
            <!-- </div> -->




                            <!-- Conditionally render the Register button if NOT on the login page -->
                <?php if (strpos($current_page, '/Users/login') === false): ?>
                    <div class="nav-parts" style="padding: 20px 0">
                        <a href="<?php echo URLROOT ?>/Pages/registerPage" class="nav-btns">Register</a>
                    </div>
                <?php endif;?>
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