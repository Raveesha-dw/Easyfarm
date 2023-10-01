<div class="header">
        <div class="flex">
            <h1>EasyFarm</h1>
            <div class="navbar">
                <ul>
                    <li><a class="active" href="../pages/index.php">Marketplace</a></li>
                    <li><a href="#">Repository</a></li>
                    <li><a href="#">Forum</a></li>
                    <li><a href="#">Vehicle Renting</a></li>
                    <!-- <li><a href="<?php echo URLROOT?>/Pages/loginPage">Login</a></li>
                    <li><a href="<?php echo URLROOT?>/Pages/registerPage">Register</a></li> -->
                    <li><i class="fa fa-user"></i>User </li>
                </ul>

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
            let subMenu = document.getElementById("subMenu");
            function toggleMenu(){
                subMenu.classList.toggle("open-menu");
            }
    </script>