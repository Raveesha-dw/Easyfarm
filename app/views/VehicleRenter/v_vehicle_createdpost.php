
<!-- <?php require APPROOT . '/views/inc/csslinking.php'; ?> -->
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<?php require APPROOT . '/views/inc/components/sidebars/seller_sidebar.php'?>

<?php $products = json_decode(json_encode($data), true); ?>




        <div class="wrapperVcreatedPost">

        
        
            
            
            


            <!--Posts-->
            <div class="product-container" id="product-vehicle-container">
                <?php $products =$data; ?>
                <?php foreach($products as $product) : ?>
                  
                    <div class="productt" id="product-vehicle">

                    
                        <img src="<?php echo URLROOT?>/public/images/vehicleRenter/<?php echo $product->Image;?> " alt="" class="poost1">
                        <!-- <?php echo$product->Image; ?> -->
                        
                        

                        <div class="name">
                            
                            <b id="namee1"> <?php echo $product->V_Id;?> </b> 
                             <b id="price1"> <?php echo  $product->Rental_Fee;?> </b> 

                            
                        </div>
                        
                        

                        
                            <div class="button-n">
                                <input  type="hidden" name="Item_Id" value="<?php echo $product->Item_Id;?>">

                                    <button class ="btn2"><a   href="http://localhost/Easyfarm/Seller_post/update_Product?id=<?php echo $product->Item_Id;?>">update</a></button>
                                    <!-- <p>Update  </p>
                                    </a> -->
                                <form  onsubmit="showRemoveConfirmation( );" method="post" action="<?php echo URLROOT ?>/Seller_post/delete_product">
                                    <input type="hidden" name="Item_Id" value="<?php echo $product->Item_Id;?>">
                                    <button  type="submit" class="buttonn" id="btnv3" name="delete_item">Delete</button>
                                </form>
                            </div>
                        
                    </div>
                <?php endforeach ?>  
            </div>
        </div>   
            
    

        
        
<script>
    // let subMenu = document.getElementById("subMenu");
    // function toggleMenu(){
    //     subMenu.classList.toggle("open-menu");
    // }
   

    


    // Function to show the remove confirmation popup
    function showRemoveConfirmation() {
        return confirm('Are you sure you want to delete this item?'); 
            // Handle item removal here, e.g., by making an AJAX request
                    
            }

        

</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>   


