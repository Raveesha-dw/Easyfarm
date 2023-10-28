<div class="log_nav">
        <div class="system-nav-main">
            <!-- <h1>EasyFarm</h1> -->
            <div class="nav-logo">
                <a href="<?php echo URLROOT ?>/Pages/index">EasyFarm</a>
            </div>

            <div class="nav-parts">
                <a href="<?php echo URLROOT?>/Pages/index">Repositary</a>
            </div>

            <div class="nav-parts">
                <a href="<?php echo URLROOT?>/Pages/index">Forum</a>
            </div>

            <div class="nav-parts">
                <a href="<?php echo URLROOT?>/Pages/index">Vehicle Renting</a>
            </div>

           <?php
           if(!empty($_SESSION['user_email'])){
            ?>
                <div class="welcome-banner" style="padding:10px">
                    <h2 class="greeting"><?php echo $_SESSION['user_email']; ?></h2>
                    <div class="profile-menu-wrap" id="sub-menu">
                        <div class="user-menu">
                            <div class="user-info">
                                <a href="<?php echo URLROOT?>/Pages/Profile" class="sub-link-menu">
                                    <h2>View Profile</h2>
                                    <span>></span>
                                </a>

                                <a href="<?php echo URLROOT?>/Pages/index" class="sub-link-menu">
                                    <h2>Dashboard</h2>
                                    <span>></span>
                                </a>

                                <a href="<?php echo URLROOT?>/Users/logout" class="sub-link-menu">
                                    <h2>Logout</h2>
                                    <span>></span>
                                </a>
                            </div>
                        </div>
                    </div>
            
                </div>
            <?php
           }else{
            ?>

            <div class="nav-parts" style="padding: 20px 0">
            <button class="nav-btns" onclick="location.href='<?php echo URLROOT ?>/Users/login'">Login</button>
            </div>

            <div class="nav-parts" style="padding: 20px 0">
                <button class="nav-btns" onclick="location.href='<?php echo URLROOT ?>/Pages/registerPage'">Register</button>
           </div>
           <?php
           }
           ?>







            <!-- <div class="navbar">
                <ul>
                    <li><a class="active" href="../pages/index.php">Marketplace</a></li>
                    <li><a href="#">Repository</a></li>
                    <li><a href="#">Forum</a></li>
                    <li><a href="#">Vehicle Renting</a></li>
                    <!-- <li><a href="<?php echo URLROOT?>/Pages/loginPage">Login</a></li>
                    <li><a href="<?php echo URLROOT?>/Pages/registerPage">Register</a></li> -->
                    <!-- <li><i class="fa fa-user"></i>User </li> -->
                </ul> -->

                <!-- <img src="<?php echo URLROOT ?>/public/images/profilepic.png" class="user-pic" onclick="toggleMenu()"> -->

                <!-- <div class="sub-menu">
                         <div class="user-info">
                            <img src="images/user.png">
                            <h3>imalka Dhananja </h2>
                        </div> -->
                        <!-- <hr>
                        
                        <a href="#" class="sub-menu-link">
                            <i class="fa fa-user"></i>
                            <p>Edit Profile</p>
                            <span>></span>
                        </a>

                        <a href="#" class="sub-menu-link">
                            <i class="fa fa-sign-out"></i>
                            <p>Log Out</p>
                            <span></span>
                        </a>

                    </div> --> 
            </div>
        </div>
    </div>

    <script>
            let subMenu = document.getElementById("sub-menu");
            function toggleMenu(){
                subMenu.classList.toggle("open-menu");
            }
    </script>