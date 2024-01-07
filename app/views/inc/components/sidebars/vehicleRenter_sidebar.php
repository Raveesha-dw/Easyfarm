<!--Sidebar-->
            

                
                    <div class ="sidebar-post">
                        <hr>
                        <header>MENU</header>
                        
                                <ul>
                                    <button id ="order"><img src="<?php echo URLROOT?>/public/images/seller/order.png" alt="">Order </button>
                                    <button id ="post"><img src="<?php echo URLROOT?>/public/images/seller/post.png" alt="">Create Post </button>
                                    <button id ="inventory"><img src="<?php echo URLROOT?>/public/images/seller/inventory.png" alt="">Inventory </button>
                                    <button id ="plan"><img src="<?php echo URLROOT?>/public/images/seller/myplan.png" alt="">My Plan </button>
                                    <button id ="created"><img src="<?php echo URLROOT?>/public/images/seller/myplan.png" alt="">Created Post</button>

                                </ul>
                        
                    </div>
                    <script>
                        document.getElementById("post").addEventListener("click", function() {
                             window.location.href = "http://localhost/Easyfarm/V_post/creating";
                            });
                    </script>
                    <script>
                        document.getElementById("order").addEventListener("click", function() {
                             window.location.href = "#";
                            });
                    </script>
                    <script>
                        document.getElementById("inventory").addEventListener("click", function() {
                             window.location.href = "#";
                            });
                    </script>
                    <script>
                        document.getElementById("plan").addEventListener("click", function() {
                             window.location.href = "#";
                            });
                    </script>
                    <script>
                        document.getElementById("created").addEventListener("click", function() {
                             window.location.href = "http://localhost/Easyfarm/V_post/created_post";
                            });
                    </script>
