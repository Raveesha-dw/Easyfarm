<div class="header">
        <div class="flex">
            <!-- <h1>EasyFarm</h1> -->
            <div class="nav-logo">
                <a href="<?php echo URLROOT ?>/Pages/index">EasyFarm</a>
            </div>
            <div class="nav-parts">
        </div>
        <div class="nav-parts">
        </div>
        <div class="nav-parts">
        </div>

            <div class="nav-parts">
                <a href="<?php echo URLROOT?>/Pages/index">Marketplace</a>
            </div>

            <div class="nav-parts">
                <a href="<?php echo URLROOT?>/Pages/index">Repositary</a>
            </div>

            <!-- <div class="nav-parts">
                <a href="<?php echo URLROOT?>/Pages/index">Forum</a>
            </div> -->

            <div class="nav-parts">
                <a href="<?php echo URLROOT?>/Pages/index">Vehicle Renting</a>
            </div>

           <?php
           if(!empty($_SESSION['user_email'])){
            ?>
                <div class="welcome-banner" style="padding: 10px">
                    <h2 class="greeting" onclick="toggleMenu()"><?php echo $_SESSION['user_email']; ?> ></h2>
                    <div class="profile-menu-wrap" id="sub-menu">
                        <div class="user-menu">
                            <div class="user-info">
                    
                                <!-- <form action="<?php echo URLROOT ?>/Profile/viewProfile" method="POST" class="sub-link-menu">> -->
                                <a href="<?php echo URLROOT?>/Profile/viewProfile?email=<?php echo $_SESSION['user_email']; ?>" class="sub-link-menu">
                                    <!-- <input type="hidden" name="user_type" value=<?php echo $_SESSION['user_type']; ?>> -->
                                    <!-- <input type="hidden" name="email" value=<?php echo $_SESSION['user_email']; ?>> -->
                                    <!-- <input type="hidden" name="U_Id" value=<?php echo $_SESSION['U_Id']; ?>> -->


                                    
                                        <h2>View Profile</h2>
                                        <span>></span>
                                    </a>
                                <!-- </form> -->

                                <?php
                                $usertype = $_SESSION['user_type']
                                ?>
                                <a href="<?php echo URLROOT?>/Cart/showCart" class="sub-link-menu">
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

            
        </div>
    </div>

    <script>
            let subMenu = document.getElementById("sub-menu");
            function toggleMenu(){
                subMenu.classList.toggle("open-menu");
            }
    </script>