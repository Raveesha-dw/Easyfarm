<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="completeButton">
        <form action="<?php echo URLROOT?>/Orders/pendingOrdersOfUser">
        <button id="completedBtn" type="submit">View Pending Orders</button>
        </form>
</div>

<div class="flex-container">

<div class="right-content">

<?php 
// print_r($data);
?>
<?php 
$orders = $data['orders'];
foreach ($orders as $order): ?>
<div class="order-container">
        <div class="product">
                <h3 class="order-id">Order ID: <?php echo $order->Order_ID ?></h3>
                <span><small>Placed Date: <?php echo $order->placed_Date?> </small></span><br>
                <p >Status: &nbsp;<span style="color: red;">PENDING</span></p>
                
               <br> <h4>Item Details</h4><br>
               <ul class="item-list">
                 <li>Item Name: <?php echo $order->Item_name?></li>
                 <li>Unit Price: <?php echo $order->Unit_price?> / <?php echo $order->Unit_size ?><?php echo $order->Unit_type ?></li>
                 <li>Quantity: <?php echo $order->quantity?></li>
                 <?php $price = $order->Unit_price* $order->quantity; ?>
                 <li>Item Price: <?php echo $price ?></li>
               </ul>
                <br>
                <p>Delivery Method: <?php $order->DeliveryMethod ?></p><br><br>
                <button><a href="<?php echo URLROOT?>/Review/itemReview/<?php echo $item->Item_Id ?>" style="color: red;">Review item</a></button>


        </div>
</div>

<?php
endforeach
?>
</div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?> 