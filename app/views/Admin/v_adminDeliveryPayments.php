<?php require APPROOT . '/views/inc/headerAdmin.php';?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="body-container">
    <!--Sidebar-->
    <?php require APPROOT . '/views/inc/components/sidebars/admin_sidebar.php';?>

    <main>
        <h2>Delivery Agent Payments</h2>
        <hr><br>

        <div class="btn-container">
                <form action="<?php echo URLROOT?>/Admin/delivery" method="GET">
                        <input type="hidden" name="status" value="Unsettled">
                        <button class="admin-table" type="submit">Unsettled</button>
                </form>

                <form action="<?php echo URLROOT?>/Admin/delivery" method="GET">
                        <input type="hidden" name="status" value="Settled">
                        <button class="admin-table" type="submit">Settled</button>
                </form>
        </div>

        <?php
            $deliveryPayments = $data['deliveryPayments'];
        ?>

        <table>
            <tr>
                <th>Seller ID</th>
                <th>Payment ID</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            <?php
                foreach ($deliveryPayments as $deliveryPayment):
            ?>
                    <tr>
                        <td><?php echo $deliveryPayment->seller_ID?></td>
                        <td><?php echo $deliveryPayment->Payment_Id?></td>
                        <td><?php echo $deliveryPayment->delivery_charge?></td>
                        <td><?php echo $deliveryPayment->DeliveryPaymentStatus?></td>
                        <td>
                            <div class="btn-container">
                                <form action="<?php echo URLROOT?>/Admin/delivery" method="POST">
                                    <?php
                                        $status = ($deliveryPayment->DeliveryPaymentStatus == 'Unsettled') ? ('Settled') : ('Unsettled');
                                    ?>
                                    <input type="hidden" name="paymentID" value="<?php echo $deliveryPayment->Payment_Id?>">
                                    <input type="hidden" name="sellerID" value="<?php echo $deliveryPayment->seller_ID?>">
                                    <input type="hidden" name="status" value="<?php echo $status?>">
                                    <button class="admin-table" type="submit">Mark As <?php echo $status?></button>
                                </form>
                            </div>
                        </td>
                    </tr>
            <?php
                endforeach;
            ?>
        </table>

    </main>
</div>