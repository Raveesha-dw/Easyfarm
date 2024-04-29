
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

                <?php if (($_SESSION['user_type'] == 'Buyer') && (!empty($_SESSION['user_email']))): ?>
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
                    <a href="<?php echo URLROOT ?>/Vehicle_item/gethomepage">Rent</a>
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
                                        <a href="<?php echo URLROOT ?>/Orders/pendingOrdersOfUser" class="sub-link-menu">
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