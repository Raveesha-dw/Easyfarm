<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapperBuyNow">

                <div class="column4" >
<?php
print_r($data);?>
                <div class="box">
                    <div class="wrapperBuyNow_sub">
                            <p><b> Delivered to :</b></p>
                            <p> <?php echo $data[0]['Name']; ?></p>
                            <p> <?php echo $data[0]['Contact_num']; ?> </p>
                            <p> <?php echo $data[0]['Address']; ?>
                                <a class="open-button" onclick="openForm()" > Change </a>
                            </p>
                            <p> Email to <?php echo $data[0]['Email']; ?></p>
                        </div>

                 </div>
       
                 <?php
                    $orderItems =$data;
                    // print_r($orderItems);
                    $orderTotal = 0.00;
                    $orderDeliveryTotal = 0.00;
                    $orderPayment = 0.00;

                    if (!empty($orderItems)) {
                        
                       
                            foreach ($orderItems as $orderItem) {
                                
                                if (is_array($orderItem)) {
                                    
                                    $orderTotal += ($orderItem['totalPayment']);
                                    $orderDeliveryTotal += $orderItem['deliveryFee'];
                                    
                                    
                                }
                                 
                                
                                // $cartTotal += ($cartItem['quantity'] * $cartItem['unitPrice']);
                            }
                            $orderTotal = $orderTotal - $orderDeliveryTotal;
                            $orderPayment = $orderTotal +  $orderDeliveryTotal ;
                        }
                       ?>
              
             <?php if (!empty($orderItems)) : ?>

            <?php
             $orderItemsBySeller = [];

             foreach($orderItems as $data){
                // print_r($data);
                // Print stmt here
                $sellerStore = $data['Store_Name'];

                $orderItemsBySeller[$sellerStore][] = $data;                
             } ?>

                    <?php foreach($orderItemsBySeller as $sellerStore => $items) :?>

                    <br><h3 style="color: darkblue;">Seller: <?php echo $items[0]['Store_Name']; ?></h3>
                     
                    <?php foreach ($items as $data) : ?>
                            <?php if (is_array($data)) :  print_r($data);   ?>
                            
                            <!-- 
                      Print stmt here 
                     new part starts here -->
                    
                   <?php  $deliFee = 0;
                   if($data['selectedDeliveryMethod'] == 'Home' || $data['selectedDeliveryMethod'] == 'Home Delivery'){ ?>
                    <br><h3><strong>Home Delivery </strong></h3>

                        <div class="wrapperBuyNow_sub">
                        <p><b> <?php echo $data['Item_name']; ?></b></p>
                        <section id="productDetails" class="section-p1">
                            <div class="row">
                                <!-- <div class="column1" > -->
                                    <div class="single-pro-image">
                                        <img src="<?php echo URLROOT?>/public/images/products/vegi2.jpg" width="100%" id="MainImg" alt=""> 
                                    <!-- </div> -->
                                </div>
                            </div>

                        <div class="row">
                                    <div class="column1" >
                                        <p>Quantity</p>
                                    </div>
                                    <div class="column2" >
                                        <p><?php echo $data['quantity']; ?><?php echo $data['Unit_type']?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="column1" >
                                        <p>Unit Price</p>
                                    </div>
                                    <div class="column2" >
                                        <p><b><small>LKR </small></b> <?php echo number_format($data['Unit_price'],2)?> / <?php echo $data['Unit_size']?> <?php echo $data['Unit_type']?> </p>
                                    </div>
                                </div>

                                 <div class="row">
                                    <div class="column1" >
                                        <p>Amount for Quantity</p>
                                    </div>
                                    <div class="column2" >
                                        <p><b><small>LKR </small></b><?php echo number_format($data['total'], 2) ?></p>
                                    </div>
                                </div>
                            </section>       
                        </div>

                       <?php if ($data['deliveryFee'] != 0){
                            $deliFee = $deliFee + $data['deliveryFee'];
                        }else{
                            $data['deliveryFee'] = $deliFee;
                        }
                         ?>

                        <?php
                       } ?> 
                       <?php endif; ?>                        
                        <?php endforeach; ?>

                       <div class="row">
                                    
                                     <br><h3><b>Delivery Fee</b>&nbsp;&nbsp;&nbsp;&nbsp; <b>LKR</b> <?php echo number_format($data['deliveryFee'],2); ?></h3>
                                </div>

                         

                        <?php foreach ($items as $data) : ?>
                            <?php if (is_array($data)) : 
                            // print_r($data);
                            ?>
                            
                        <?php if(trim($data['selectedDeliveryMethod']) != 'Home Delivery'){ ?>
                        
                        <br><h3><strong>In-Store Pickup </strong></h3>

                        <div class="wrapperBuyNow_sub">
                        <p><b> <?php echo $data['Item_name']; ?></b></p>
                        <section id="productDetails" class="section-p1">
                            <div class="row">
                                <!-- <div class="column1" > -->
                                    <div class="single-pro-image">
                                        <img src="<?php echo URLROOT?>/public/images/products/vegi2.jpg" width="100%" id="MainImg" alt=""> 
                                    <!-- </div> -->
                                </div>
                            </div>

                        <div class="row">
                                    <div class="column1" >
                                        <p>Quantity</p>
                                    </div>
                                    <div class="column2" >
                                        <p><?php echo $data['quantity']; ?><?php echo $data['Unit_type']?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="column1" >
                                        <p>Unit Price</p>
                                    </div>
                                    <div class="column2" >
                                        <p><b><small>LKR </small></b> <?php echo number_format($data['Unit_price'],2)?> / <?php echo $data['Unit_size']?> <?php echo $data['Unit_type']?> </p>
                                    </div>
                                </div>

                                 <div class="row">
                                    <div class="column1" >
                                        <p>Amount for Quantity</p>
                                    </div>
                                    <div class="column2" >
                                        <p><b><small>LKR </small></b><?php echo number_format($data['total'], 2) ?></p>
                                    </div>
                                </div>
                            </section>       
                        </div>

                        <?php } ?>
                        
                        <?php endif; ?>                        
                        <?php endforeach; ?>
                        <?php endforeach; ?>

                    <?php endif; ?>

                 <!-- from here -->


                </div>
                <div class="column5" >
                    <div class="wrapperBuyNow_sub">
                        <p><b>Order Summary</b></p>
                        <div class="row">
                            <div class="column1" >
                                <p>Item Total </p>
                            </div>
                            <div class="column2" >
                                <p><b><small>LKR </small></b> <?php echo number_format($orderTotal,2); ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="column1" >
                                <p>Delivery Fee</p>
                            </div>
                            <div class="column2" >
                                <p><b><small>LKR </small></b> <?php echo number_format($orderDeliveryTotal,2); ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="column1" >
                                <p>Total Payment</p>
                            </div>
                            <div class="column2" >
                                <p><b><small>LKR </small></b> <?php echo number_format($orderPayment,2); ?></p>
                            </div>
                        </div>



                        
                           <br><button type="submit" id="btn" class="btn" onclick="paymentGateway();">Place Order</button>


                           <input type="hidden" id="hiddenuId" value="<?php echo $data['uId']; ?>">
                           <input type="hidden" id="hiddenTotalpayment" value="<?php echo $orderPayment; ?>">
                           <input type="hidden" id="hiddenDeliveryFee" value="<?php echo $orderDeliveryTotal; ?>">
                           
                                <?php if (!empty($orderItems)) : ?>                     
                                    <?php foreach ($orderItems as $data) : 
                                     ?>
                                        <?php if (is_array($data)) : ?>

                           
                                            <input type="hidden" id="hiddenSubTotalpayment[]" value="<?php echo number_format($data['totalPayment'],2); ?>">
                                            <input type="hidden" id="hiddenItem_Id[]" value="<?php echo $data['Item_Id']; ?>">
                                            <input type="hidden" id="hiddenUnit_price[]" value="<?php echo $data['Unit_price']; ?>"> <!-- new -->
                                            <input type="hidden" id="hiddenUnit_size[]" value="<?php echo $data['Unit_size']; ?>">  <!-- new -->
                                            <input type="hidden" id="hiddenUnit_type[]" value="<?php echo $data['Unit_type']; ?>">   <!-- new -->
                                            <input type="hidden" id="hiddenquantity[]" value="<?php echo $data['quantity']; ?>">
                                           
                                            
                                            <input type="hidden" id="selectedDeliveryMethods[]" value=<?php echo $data['selectedDeliveryMethod']; ?>>  <!-- new -->
                                            


                                    <?php endif; ?>                        
                                    <?php endforeach; ?>
                                <?php endif; ?>

                           
                      
         
                    </div>
                </div>



                <!-- <div class="editAddress"> -->
                    <div class="form-popup" id="myForm">
                    <!-- <form action="/action_page.php" class="form-container"> -->
                    <form action="<?php echo URLROOT ?>/BuyNow/updateAddress" method="POST" class="form-container"> 
             
                    <p><b>Change the Address</b><br></p>

                        <p class="type">Address </p>
                        <div class="input-box">
                            <input type="text" name="address" placeholder="Enter address" required value="<?php echo $data['Address']; ?>">
                            <i class='bx bxs-edit-location'></i>
                            <!-- <span class="invalid"><?php echo $data['address_err']; ?></span> -->
                        </div>

                        <p class="type">City </p>
                        <div class="input-box">
                            <input type="text" name="city" placeholder="Enter the City" required value="">
                            <i class='bx bxs-edit-location'></i>
                            <!-- <span class="invalid"><?php echo $data['address_err']; ?></span> -->
                        </div>
                        
                        <p class="type">Province </p>
                        <div class="input-box">
                        <?php if(!isset($_SESSION['buyer_province'])){ ?>
                            <span style="color: red;">Add your delivery province</span>
                        <?php } ?>

                        <select id="province_select" name="Province" required value="">
                                   <option disabled selected>Province</option>
                                   <option value="North">North</option>
                                   <option value="Western">Western</option>
                                   <option value="North Central">North Central</option>
                                   <option value="Central">Central</option>
                                   <option value="Sabaragamuwa">Sabaragamuwa</option>
                                   <option value="North Western">North Western</option>
                                   <option value="Eastern">Eastern</option>
                                   <option value="Uva">Uva</option>
                                   <option value="Southern">Southern</option>
                            </select>


                            <!-- <input type="text" name="district" placeholder="Enter the District" required value=""> -->
                            <i class='bx bxs-edit-location'></i> 
                            <!-- <span class="invalid"><?php echo $data['address_err']; ?></span> -->
                        </div>

                    <input type="hidden" name="uId" value=<?php echo$_SESSION['user_ID']?>>

                    <?php if (!empty($orderItems)) : ?>                     
                            <?php foreach ($orderItems as $data) : ?>
                                <?php if (is_array($data)) : ?>

                                <!-- <input type="hidden" name="user_type" value="Buyer"> -->
                                
                                <input type="hidden" name="quantitiesTo[]" value=<?php echo $data['quantity']; ?>>
                                <input type="hidden" name="itemIds[]" value=<?php echo $data['Item_Id']; ?>>
                                <input type="hidden" name="selectedDeliveryMethods[]" value=<?php echo $data['selectedDeliveryMethod']; ?>>
                                <input type="hidden" name="totals[]" value=<?php echo $data['total']; ?>>
                                <input type="hidden" name="deliveryFees[]" value=<?php echo $data['deliveryFee']; ?>>
                                <input type="hidden" name="totalPayments[]" value=<?php echo $data['totalPayment']; ?>>
                    


                            <?php endif; ?>                        
                            <?php endforeach; ?>
                        <?php endif; ?>





                        
                


                        <br><button type="submit" class="btn" onclick="closeForm()">Save Changes</button>
                    
                    
                    </form>
                    </div>
                <!-- </div> -->


</div>



 

<?php require APPROOT . '/views/inc/footer.php'; ?>       



<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

<script src="<?php echo URLROOT ?>\public\js\payment.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
    $('#province_select').on('change', function() {
        var selectedProvince = $(this).val();
        $.ajax({
            url: '<?php echo URLROOT?>/BuyNow/Checkout', 
            method: 'POST',
            data: { province: selectedProvince },
            success: function(response) {
                $('#delivery_fee').text(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});
</script>