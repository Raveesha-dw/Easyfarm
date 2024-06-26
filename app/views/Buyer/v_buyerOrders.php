<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="completeButton">
        <form action="<?php echo URLROOT?>/Orders/completedOrdersOfUser">
        <button id="completedBtn" type="submit">View Completed Orders</button>
        </form>
</div>

<?php
$accept = $data['acceptOrders'];
if($accept != NULL){ ?>

<section id="productDetails" class="section-p1">

<div class="right-content">

<?php foreach($accept as $order): ?>

<div class="order-container">
<span style="margin: 10px; color:dark gray" >
<i class="fa-solid fa-thumbs-up" style="color: var(--dark-green);"></i><b>&nbsp;Your Order has been placed successfully</b></span>

        <!-- <div class="product"> -->
        <?php
        $orderInfo = $order['order'];
        $item = $order['item'];
        $seller = $order['seller'];
        ?>
                <div class="text-top-right" style="margin-left:85%; margin-top:0%;">
                <large><b>Status: </b>&nbsp;<span style="color: red;">RECEIVED</span></large>
                </div>
                <h2 class="order-id">Order ID: <?php echo $orderInfo->Order_ID ?></h2>
                <span><medium>Placed Date: <?php echo $orderInfo->placed_Date?> </medium></span><br>

                <br> <h3>Item Details</h3>
               <ul class="item-list" style="font: size 15px;">
                 <li>Item Name: <?php echo $item->Item_name?></li>
                 <li>Unit Price: <?php echo $orderInfo->Unit_price?> / <?php echo $orderInfo->Unit_size ?><?php echo $orderInfo->Unit_type ?></li>
                 <li>Quantity: <?php echo $orderInfo->quantity?></li>
                 <?php $price = $orderInfo->Unit_price* ($orderInfo->quantity/$orderInfo->Unit_size); ?>
                 <li>Item Price: <?php echo $price ?> LKR</li>
               </ul>

                <p><large><b>Seller Information: <?php echo $seller->Store_Name ?> , <?php echo $seller->Store_Adress ?> </b></large></p>
                <p><large>Delivery Method:
                 <b><?php 
                 if($orderInfo->DeliveryMethod == 'Home'){
                        echo 'Home Delivery';
                 }else{
                        echo 'In-Store Pickup';
                 }
                ?></large></p><br></b>

</div>
<?php
endforeach
?>
</div>
</section>


<?php
}
?>



<section id="productDetails" class="section-p1">
<!-- <div class="flex-container"> -->

<?php if($data['orders'] == NULL){
        echo 'You currently have no pending orders';
}else{ ?>


<!-- <div class="right-content"> -->

<?php 
// print_r($data);
?>
<?php 
$orders = $data['orders'];

foreach ($orders as $order): ?>

<div class="order-container" style="margin-right: 10px;">
        <!-- <div class="product"> -->
        <?php
        $orderInfo = $order['order'];
        $item = $order['item'];
        $seller = $order['seller'];

        if($orderInfo->DeliveryMethod == 'Home-Delivery'){ ?>
                <span style="margin: 10px; color:dark gray" >
        <i class="fa-solid fa-truck" style="color: var(--dark-green);"></i><b>&nbsp;Your Order is On the Way</b></span>
      <?php  }else{ ?>
                <span style="margin: 10px; color:dark gray" >
        <i class="fa-solid fa-store" style="color: var(--dark-green);"></i><b>&nbsp;Your Order is Ready For Pickup</b></span>
        <?php }
        ?>


                <div class="text-top-right" style="margin-left:85%; margin-top:0%;">
                <large><b>Status: </b>&nbsp;<span style="color: red;">PENDING</span></large>
                </div>
                <h2 class="order-id">Order ID: <?php echo $orderInfo->Order_ID ?></h2>
                <span><medium>Placed Date: <?php echo $orderInfo->placed_Date?> </medium></span><br>
                
                
               <br> <h3>Item Details</h3>
               <ul class="item-list" style="font-size:17px;">
                 <li>Item Name: <?php echo $item->Item_name?></li>
                 <li>Unit Price: <?php echo $orderInfo->Unit_price?> / <?php echo $orderInfo->Unit_size ?><?php echo $orderInfo->Unit_type ?></li>
                 <li>Quantity: <?php echo $orderInfo->quantity?><?php echo $orderInfo->Unit_type?></li>
                 <?php $price = $orderInfo->Unit_price* ($orderInfo->quantity/$orderInfo->Unit_size); ?>
                 <li>Item Price: <?php echo $price ?> LKR</li>
               </ul>
                
                <p><large><b>Seller Information: <?php echo $seller->Store_Name ?> , <?php echo $seller->Store_Adress ?> </b></large></p>
                <p><large>Delivery Method:
               <b>  <?php 
                 if($orderInfo->DeliveryMethod == 'Home'){
                        echo 'Home Delivery';
                 }else{
                        echo 'In-Store Pickup';
                 }
                ?></large></p> </b>

                <p class="status" style="font-size: larger;">Mark as Complete:<span style="color: red;"> &nbsp;I have received this order successfully</span></p>
                <form action="<?php echo URLROOT?>/Orders/changeOrderStatus/<?php echo $orderInfo->Order_ID; ?>" method="POST">
                <button class="orderConfirm" type="submit" name="submit" style="margin-left:37%;">Confirm</button>
                </form>



        <!-- </div> -->
</div>

<?php
endforeach
?>
<!-- </div> -->
</div>
 <?php } ?>
</section>


<?php require APPROOT . '/views/inc/footer.php'; ?>