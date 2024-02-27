<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<?php require APPROOT . '/views/inc/components/sidebars/buyer_sidebar.php'?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- <style>
        .flex-container{
                display: flex;
        justify-content: space-between;
        }

</style> -->

<!-- <script>
        $(document).ready(function() {
            
            $('.orderConfirm').click(function() {
                var orderId = $(this).data('order-id');
                
                $.ajax({
                    url: '<?php echo URLROOT?>/Orders/changeOrderStatus',
                    method: 'POST',
                //     data: { orderId: orderId, status: 'COMPLETE' },
                 data: { orderId: orderId},
                    success: function(response) {
                        $(this).closest('.order-container').find('.status').html('Status: <span style="color: green;">COMPLETED</span>');
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('Failed to update order status. Please try again later.');
                    }
                });
            });
        });
    </script> -->

<div class="completeButton">
        <form action="<?php echo URLROOT?>/Orders/completedOrdersOfUser">
        <button id="completedBtn" type="submit">View Completed Orders</button>
        </form>
</div>

<div class="flex-container">

<div class="right-content">

<?php 
// echo $_SESSION['user_ID'];
$orderItems = $data['orderItems'];
foreach ($orderItems as $orderId => $itemNames): ?>

<div class="order-container">
        <div class="product">
                <h3 class="order-id">Order ID: <?php echo $orderId; ?></h3><br>
                <h4 class="items-title">Items in the Order</h4>
                <ul class="item-list">
                <?php foreach ($itemNames as $itemName): ?>
                    <li><?php echo $itemName; ?></li>
                <?php endforeach; ?>
                </ul><br><br>
                <p >Status: &nbsp;<span style="color: red;">PENDING</span></p>

                <p class="status">Mark as Complete:<span style="color: red;"> &nbsp;I have received this order successfully</span></p>
                <form action="<?php echo URLROOT?>/Orders/changeOrderStatus/<?php echo $orderId; ?>" method="POST">
                <button class="orderConfirm" type="submit" name="submit">Confirm</button>
                </form>

        </div>
</div>




<?php endforeach ?>


</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>  