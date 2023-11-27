
<?php require APPROOT . '/views/inc/csslinking.php'; ?>
<?php $dat = Seller_post::getposts() ?>
<?php $products = json_decode(json_encode($dat), true); ?>

<!-- if(isset($_POST['delete_item'])) {
    $this->db=new Database();
    

} -->


<div class ="z">
        <div class="hero">
            <nav>
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
                            <span></span>
                        </a>

                        <a href="#" class="sub-menu-link">
                            <img src="<?php echo URLROOT?>/public/images/seller/logout.png" alt="">
                            <p>Log Out</p>
                            <span></span>
                        </a>

                    </div>
                </div>
            </nav>
        <div class="column12">

        
            <div class ="sidebar">
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
        </div>
        <?php foreach($products as $product) : ?>
        <div class="colum21">

          
            <img src="<?php echo URLROOT?>/public/images/seller/$item['Image']" alt=""class="post1">
            
            




        

            <div class="name">
                
                <b id="name1"><?php print_r( $product['Item_name'] ) ?></b>
                <b id="price1"><?php print_r( $product['Unit_price'] ) ?></b>
                
            </div>
            <div class="button">
                <a href="http://localhost/Easyfarm/Pages/updateProduct?id=<?php echo $product['Item_Id']; ?>">
                <button id="btn2" >Update</button>
                </a>

            <form method="post" action="<?php echo URLROOT ?>/Seller_post/delete_product">
                <input type="hidden" name="Item_Id" value="<?php echo $product['Item_Id']; ?>">
             <button onclick="showRemoveConfirmation('<?php echo $product['Item_Id']; ?>' )" type="submit" id="btn3" name="delete_item">Delete</button>
            </form>
            </div>

        </div>
        <?php endforeach ?>
            
       

        
        
        <script>
            let subMenu = document.getElementById("subMenu");
            function toggleMenu(){
                subMenu.classList.toggle("open-menu");
            }

       

            let quantityInputs = document.querySelectorAll('.quantity-input');
            let subtotalsubtotalElements = document.querySelectorAll('.subtotal .subtotal-value');
            let cartTotalElement = document.querySelector('.cart-total-value');


            // Function to show the remove confirmation popup
            function showRemoveConfirmation(Item_Id) {
                if (confirm('Are you sure you want to delete this item?')) {
                    // Handle item removal here, e.g., by making an AJAX request
                          
                    }
                }
            

   







            
            
        </script>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>