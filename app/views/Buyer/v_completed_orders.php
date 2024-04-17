<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<?php require APPROOT . '/views/inc/components/sidebars/buyer_sidebar.php';?>


<div class="flex-container">

<div class="right-content">
<?php 
$orderItems = $data['orderItems'];
foreach ($orderItems as $orderID => $orderItem): ?>

<div class="order-container">
        <div class="product">
        <h3 class="order-id">Order ID: <?php echo $orderID; ?></h3>
        <p><span style="font-size: smaller; color: grey;">
                Placed on: <?php echo $orderItem['order']->placed_Date; ?>
        </span></p><br>

        <!-- <h4 class="items-title">Items in the Order</h4> -->
        <!-- <ul>
                <?php foreach ($orderItem['items'] as $item): ?>
                <li><?php echo $item->Item_name; ?> - <?php echo $item->quantity; ?></li>
                <?php endforeach ?>
        </ul> -->

        <table id="orders-table">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
                <?php $totalOrderPrice = 0; ?>
            <?php foreach ($orderItem['items'] as $item): ?>
                <tr>
                    <td><?php echo $item->Item_name; ?><br>
                    <a href="<?php echo URLROOT?>/Review/itemReview/<?php echo $item->Item_Id ?>" style="color: red;">Review item</a> </td>
                    <td><?php echo $item->quantity; ?></td> 
                    <td><?php echo $item->Unit_price; ?></td>
                    <td><?php echo $item->quantity * $item->Unit_price; ?></td>
                </tr>

                <?php $totalOrderPrice += $item->quantity * $item->Unit_price; ?>
            <?php endforeach; ?>
            
        </tbody>
    </table>

        <br>
        <h3>Total Order Price: <?php echo $totalOrderPrice; ?></h3>
        </div>
        </div>

        <?php endforeach ?>
</div>
</div>


















<?php require APPROOT . '/views/inc/footer.php'; ?>  