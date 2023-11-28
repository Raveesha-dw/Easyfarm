
<!-- <?php require APPROOT . '/views/inc/csslinking.php'; ?> -->
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<?php require APPROOT . '/views/inc/components/sidebars/seller_sidebar.php'?>

<?php $products = json_decode(json_encode($data), true); ?>

<!-- if(isset($_POST['delete_item'])) {
    $this->db=new Database();
    

} -->



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
                            <span></span>
                        </a>

                        <a href="#" class="sub-menu-link">
                            <img src="<?php echo URLROOT?>/public/images/seller/logout.png" alt="">
                            <p>Log Out</p>
                            <span></span>
                        </a>

                    </div>
                </div>
            </nav> -->
        
        
            
            
            


            <!--Posts-->
            <div class="product-container" id="product-seller-container">
                <?php $products =$data; ?>
                <?php foreach($products as $product) : ?>
                  
                    <div class="product" id="product-seller">

                    
                        <!-- <img src="<?php echo URLROOT?>/public/images/seller/$item['Image']" alt=""class="post1"> -->
                        

                        <div class="name">
                            <b id="name1"> <?php echo $product->Item_Id;?> </b> 
                             <b id="price1"> <?php echo  $product->Unit_price;?> </b> 

                            
                        </div>
                        
                        
                        <!--<div class="buttonn">
                            <a href="http://localhost/Easyfarm/Pages/updateProduct?id=<?php echo $product->Item_Id;?>">
                            <button id="btn2" >Update</button>
                            </a>-->

                        <div class="buttonn" id="btn2">
                       

                            <a href="http://localhost/Easyfarm/Pages/updateProduct?id=<?php echo $product->Item_Id;?>">
                            <p>Update</p>
                            </a>
                            
                        </div>
                    

                        <div>
                        <form method="post" action="<?php echo URLROOT ?>/Seller_post/delete_product">
                            <input type="hidden" name="Item_Id" value="<?php echo $product->Item_Id;?>">
                            <button onclick="showRemoveConfirmation('<?php echo $product->Item_Id; ?>' )" type="submit" class="buttonn" id="btnv3" name="delete_item">Delete</button>
                        </form>
                        </div>
                    
                    </div>
                <?php endforeach ?>  
            </div>
        </div>   
            
    

        
        
<script>
    let subMenu = document.getElementById("subMenu");
    function toggleMenu(){
        subMenu.classList.toggle("open-menu");
    }
   

    


    // Function to show the remove confirmation popup
    function showRemoveConfirmation(Item_Id) {
        if(confirm('Are you sure you want to delete this item?')) {
            // Handle item removal here, e.g., by making an AJAX request
                    
            }
        }

</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>   

