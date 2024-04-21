<div class="headebr">
       <div>
              <?php require APPROOT . '/views/inc/header.php'; ?>
              <?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>


       </div>


       <div class="container">
              <?php require APPROOT . '/views/seller/a.php' ?>

              <section class="home">

                     <?php require APPROOT . '/views/inc/components/navbars/sellerhome_nav.php' ?>
                     <div class="shero5">
                            <?php $products = $data; ?>
                            <?php foreach ($products as $product) : ?>

                                   <br><br>

                                   <div class="msg-box">
                                          <div class="m-header">
                                                 <div class="msg-ID">
                                                        <div class="m-img">
                                                               <i class="fa-solid fa-user"></i>
                                                               <!-- <img src="<?php echo URLROOT ?>/public/images/seller/user.png" alt=""> -->
                                                        </div>

                                                 </div>
                                                 <div class="msg-date">
                                                        <p><?php echo $product->Name ?></p>
                                                        <p><?php echo $product->placed_Date ?>
                                                        <p>
                                                 </div>


                                          </div>

                                          <div class="msg-f">

                                                 <div class="msg-f-detail">
                                                        <!-- <h3><?php echo $product->Name ?> wants <?php echo $product->Item_name ?> in <?php echo $product->quantity ?> <?php echo $product->Unit_type ?></h3> -->
                                                        <br>
                                                 </div>
                                                 <style>
                                                        .msg-pdroduct {
                                                               display: flex;
                                                               justify-content: space-between;
                                                        }

                                                        .product-info,
                                                        .product-values {
                                                               flex: 1;
                                                               margin-right: 10px;
                                                               /* Adjust the margin between the sections */
                                                        }

                                                        .product-info h3,
                                                        .product-values h3 {
                                                               margin: 0;
                                                               /* Remove default margin */
                                                        }
                                                 </style>

                                                 <div class="msg-pdroduct">
                                                        <div class="product-info">
                                                               <h3>Item</h3>
                                                               <h3>Quantity</h3>
                                                               <h3>TO</h3>
                                                               <h3>Method</h3>
                                                               <h3>Order ID</h3>
                                                               <h3>Unit Price</h3>
                                                               <h3>Contact Number</h3>
                                                        </div>
                                                        <div class="product-values">
                                                               <h3><?php echo $product->Item_name ?></h3>
                                                               <h3><?php echo $product->quantity ?><?php echo $product->Unit_type ?></h3>
                                                               <h3><?php echo $product->Address ?></h3>
                                                               <h3><?php echo $product->DeliveryMethod ?></h3>
                                                               <h3><?php echo $product->Order_ID ?></h3>
                                                               <h3><?php echo $product->Unit_price ?></h3>
                                                               <h3><?php echo $product->Contact_num ?></h3>
                                                        </div>
                                                 </div>

                                                 <div class="button-msg">

                                                        <div class="aa">
                                                               <button class="dd"> <a><?php echo $product->Status; ?> </a> </button>

                                                        </div>
                                                 </div>

                                          </div>

                                   </div>

                            <?php endforeach; ?>
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
                     </div>


                     <?php require APPROOT . '/views/inc/footer.php'; ?>

              </section>
       </div>
</div>