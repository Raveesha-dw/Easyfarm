<?php
// This line gets the current URL path, e.g., "/Users/login" or any other page
$current_page = $_SERVER['REQUEST_URI'];
?>
<div class="navvvvvv">

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


                <form action="<?php echo URLROOT ?>/product/productSearch" method="POST">
                    <div class="search-container" style="display: flex;">
                        <input type="text" id="search" name="search" class="search-bar" placeholder="Search for product..." style="flex: 1; margin-right: 5px;">
                        <button type="submit" class="search-button">Search</button>
                    </div>

                </form>

            </div>
            <div class="nav-parts">
            </div>




            <div class="nav-parts">

                <a href="<?php echo URLROOT ?>/Pages/index">Marketplace</a>
            </div>

            <div class="nav-parts">
                <a href="<?php echo URLROOT ?>/Blog">Blog</a>
            </div>

            <!-- <div class="nav-parts">
                    <a href="<?php echo URLROOT ?>/Pages/index">Forum</a>
                </div> -->

            <div class="nav-parts">
                <a href="<?php echo URLROOT ?>/Vehicle_item/gethomepage">Vehicle Renting</a>
                <!-- <a href ="" ><i class="fa-regular fa-bell"></i><span>17</span></a> -->

            </div>


            
            <!-- <div class="nav-parts">

                <div class="s">

                    <div class="icon" onclick="toggleNotifi()">
                        <img src="\Easyfarm\public\images\pay\bell.png" alt=""> <span>17</span>
                    </div>
                    <div class="notifi-box" id="box">
                        <h2>Notifications <span>17</span></h2>
                        <div class="notifi-item">
                            <img src="img/avatar1.png" alt="img">
                            <div class="text">
                                <h4>Elias Abdurrahman</h4>
                                <p>@lorem ipsum dolor sit amet</p>
                            </div>
                        </div>

                    </div>
                </div>

                <script>
                    var box = document.getElementById('box');
                    var down = false;


                    function toggleNotifi() {
                        if (down) {
                            box.style.height = '0px';
                            box.style.opacity = 0;
                            down = false;
                        } else {
                            box.style.height = '510px';
                            box.style.opacity = 1;
                            down = true;
                        }
                    }
                </script>

            </div> -->

















            <?php
            if (!empty($_SESSION['user_email'])) {
            ?>
                <div class="welcome-banner" style="padding: 10px">
                    <!-- <h2 class="greeting" onclick="toggleMenu()"><?php echo $_SESSION['user_email']; ?> ></h2> -->
                    <h2 class="greeting" onclick="toggleMenu()"><i class="fa-solid fa-bars"></i> </h2>

                    <div class="profile-menu-wrap" id="sub-menu">
                        <div class="user-menu">
                            <div class="user-info">
                                <a href="<?php echo URLROOT ?>/Profile/viewProfile?email=<?php echo $_SESSION['user_email']; ?>" class="sub-link-menu">
                                    <h2><i class="fa-solid fa-user"></i>View Profile</h2>
                                    <span></span>
                                </a>
                                <?php if ($_SESSION['user_type'] == 'Seller') : ?>
                                    <a href="<?php echo URLROOT ?>/Pages/dashboard" class="sub-link-menu">
                                        <h2><i class="fa-solid fa-gauge"></i>Dashboard</h2>
                                        <span>></span>
                                    </a>

                                <?php elseif ($_SESSION['user_type'] == 'VehicleRenter') : ?>

                                    <a href="http://localhost/Easyfarm/V_renter_home/get_details1" class="sub-link-menu">
                                        <h2><i class="fa-solid fa-gauge"></i>Dashboard</h2>
                                        <span>></span>
                                    </a>




<?php elseif ($_SESSION['user_type'] == 'Buyer'): ?>
                                        <!-- <a href="<?php echo URLROOT ?>/Cart/showCart" class="sub-link-menu">
                                            <h2>Shopping Cart</h2>
                                        </a> -->
                                        <a href="<?php echo URLROOT ?>/Orders/placedOrders" class="sub-link-menu">
                                            <h2><i class="fa-solid fa-sort"></i>My orders</h2>
                                        </a>
                                        <a href="<?php echo URLROOT ?>/Review/userReviews" class="sub-link-menu">
                                            <h2><i class="fa-solid fa-magnifying-glass-dollar"></i>My Reviews</h2>
                                        </a>
                                    <?php endif;?>

                                    <a href="<?php echo URLROOT ?>/Users/logout" class="sub-link-menu">
                                    <h2><i class="fa-solid fa-right-from-bracket"></i>Logout</h2>
                                    <span></span>
                                </a>
                            </div>
                        </div>


                    </div>
                <?php
            } 
            else {
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
                            <?php if ((!empty($_SESSION['user_email'])) && ($_SESSION['user_type'] == 'Buyer')): ?>
                    <div class="nav-parts">
                    <a href="<?php echo URLROOT ?>/Cart/showCart"><i class="fas fa-shopping-cart cart"></i></a>

                    </div>

                <?php endif;?>
</div>


                </div>
        </div>

    </div>


    <script>
        let subMenu = document.getElementById("sub-menu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }

        var box = document.getElementById('box');
        var bellIcon = document.querySelector('.fa-bell');
        var down = false;

        function toggleNotifi() {
            if (down) {
                box.style.height = '0px';
                box.style.opacity = 0;
                down = false;
            } else {
                box.style.height = 'auto'; // Set height to auto to show the content dynamically
                box.style.opacity = 1;
                down = true;
            }
        }

        // Toggle notification box when bell icon is clicked
        bellIcon.addEventListener('click', function() {
            toggleNotifi();
        });
    </script>