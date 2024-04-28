<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="completeButton">
        <form action="<?php echo URLROOT?>/Orders/pendingOrdersOfUser">
        <button id="completedBtn" type="submit">View Pending Orders</button>
        </form>
</div>


<section id="productDetails" class="section-p1" style="display: block;">
<!-- <div class="flex-container"> -->
        <?php if($data['orders'] == NULL){
        echo 'You currently have no pending orders';
        }else{
                ?>
        

<!-- <div class="right-content"> -->

<?php 
// print_r($data);
?>
<?php 
$orders = $data['orders'];
foreach ($orders as $order): ?>

<div class="order-container">

        <!-- <div class="product"> -->

                <?php
                $orderInfo = $order['order'];
                $item = $order['item'];
                $seller = $order['seller'];
                ?>

                <div class="text-top-right" style="margin-left:85%; margin-top:0%;">
                <large><b>Status: </b>&nbsp;<span style="color: red;">COMPLETED</span></large>
                </div>

                <h2 class="order-id">Order ID: <?php echo $orderInfo->Order_ID ?></h2>
                <span><medium>Placed Date: <?php echo $orderInfo->placed_Date?> </medium></span><br>
                <!-- <p >Status: &nbsp;<span style="color: red;">PENDING</span></p> -->
                
               <br> <h3>Item Details</h3><br>
               <ul class="item-list" style="font-size:large;">
                 <li>Item Name: <?php echo $item->Item_name?></li>
                 <li>Unit Price: <?php echo $orderInfo->Unit_price?> / <?php echo $orderInfo->Unit_size ?><?php echo $orderInfo->Unit_type ?></li>
                 <li>Quantity: <?php echo $orderInfo->quantity?></li>
                 <?php $price = $orderInfo->Unit_price* $orderInfo->quantity; ?>
                 <li>Item Price: <?php echo $price ?></li>
               </ul>
                <br>
                <p><large>Delivery Method:
                 <?php 
                 if($orderInfo->DeliveryMethod == 'Home'){
                        echo 'Home Delivery';
                 }else{
                        echo 'In-Store Pickup';
                 }
                ?></large></p><br>
                <a href="<?php echo URLROOT?>/Review/itemReview/<?php echo $orderInfo->Item_ID ?>" style="color: red;"><button>Review item</button></a>


        </div>
</div>

<?php
endforeach
?>
<!-- </div> -->
<!-- </div> -->
<?php } ?>

</section>


<?php require APPROOT . '/views/inc/footer.php'; ?> 