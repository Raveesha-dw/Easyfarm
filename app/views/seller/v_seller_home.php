<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<?php require APPROOT . '/views/inc/components/sidebars/seller_sidebar.php'?>
 
        <div class="hero">
        
            <!-- <nav>
                <img src="<?php echo URLROOT?>/public/images/seller/logo.png" alt=""  class="logo">
                <img src="<?php echo URLROOT?>/public/images/seller/user.png" alt="" class="user-pic" onclick="toggleMenu()">

                <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                        
                            <img src="<?php echo URLROOT?>/public/images/seller/user.png" alt="">
                            <h3>imalka Dhananja </h2>
                        </div>
                        <hr>
                        
                        <a href="#" class="sub-menu-link">
                            <img src="<?php echo URLROOT?>/public/images/seller/profile.png" alt="">
                            <p>Edit Profile</p>
                            <span>></span>
                        </a>
                        
                        <a href="#" class="sub-menu-link">
                            <img src="<?php echo URLROOT?>/public/images/seller/logout.png" alt="">
                            <p>Log Out</p>
                            <span></span>
                        </a>

                    </div>
                </div>
            </nav> -->
            <!-- <div class ="sidebar">
                <hr>
                <header>MENU</header>
                
                <ul>
                
                    <button id ="order"><img src="<?php echo URLROOT?>/public/images/seller/order.png" alt="">Order </button>
                    <button id ="post"><img src="<?php echo URLROOT?>/public/images/seller/post.png" alt="">Create Post </button>
                    <button id="post"><img src="<?php echo URLROOT?>/public/images/seller/post.png" alt="">Create Post</button>

                    <script>
                        document.getElementById("post").addEventListener("click", function() {
                             window.location.href = "http://localhost/Easyfarm/Pages/create_post";
                            });
                    </script>

                    <button id ="inventory"><img src="<?php echo URLROOT?>/public/images/seller/inventory.png" alt="">Inventory </button>
                    <button id ="plan"><img src="<?php echo URLROOT?>/public/images/seller/myplan.png" alt="">My Plan </button>
                    <script>
                        document.getElementById("plan").addEventListener("click", function() {
                             window.location.href = "http://localhost/Easyfarm/Pages/myplan";
                            });
                    </script>
                    <button  id ="created"><img src="<?php echo URLROOT?>/public/images/seller/myplan.png" alt="">Created Post</button>

                </ul>

            </div> -->
           
        </div>
        <?php require APPROOT . '/views/inc/footer.php'; ?> 
        
        
        <script>
            let subMenu = document.getElementById("subMenu");
            function toggleMenu(){
                subMenu.classList.toggle("open-menu");
            }
        </script>
         