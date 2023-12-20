<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<?php require APPROOT . '/views/inc/components/sidebars/seller_sidebar.php'?>
<!-- <?php print_r($data)?> -->
<?php require APPROOT .'/views/inc/components/navbars/sellerhome_nav.php'?>


<?php $products=$data; ?>
<?php foreach ($products as $product) : ?>

 <div class ="msg-box">
       <div class ="m-header">
              <div class ="msg-ID">
                     <div class="m-img">
                            <img src="<?php echo URLROOT?>/public/images/seller/user.png" alt="">
                     </div>
                
              </div>
              <div class="msg-date"> <p><?php echo $product->Name ?></p>
                      <p><?php echo $product->placed_Date ?><p>
              </div>
                
                
       </div> 

       <div class="msg-f"> 
              
                     <div class="msg-f-detail">
                            <h3><?php echo $product->Name ?> wants <?php echo $product->Item_name ?> in <?php echo $product->quantity ?> <?php echo $product->Unit_type?></h3>
                            <br>
                     </div>
                            <div class="msg-pdroduct">
                            <h3>Iteam&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->Item_name ?></h3>
                            <h3>Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->quantity ?><?php echo $product->Unit_type?></h3>
                            <h3>TO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->Address?></h3>
                            <h3>Method&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->DeliveryMethod?></h3>


                            </div>
                            <div class="button-msg">
                            
                            <button class="dd"> <a ><?php echo $product->Status; ?> </a> </button>

                                     <!--   -->
                            </div>
                            
       </div>
        
 </div> 

 <?php  endforeach;?>
                            <!-- <script>
                                   
                                   console.log(data);
                                   function changeText(button) {
                                   // var button = document.querySelector('.button-msg .dd');
                                    button.textContent = "APPROVED";
                                   //  button.style.backgroundColor = "green";
                                    }
                                   
                            </script> -->
                           
 

 <br></br>
 <br></br>
 

<?php require APPROOT . '/views/inc/footer.php';?>  
                            
        
        
        
         