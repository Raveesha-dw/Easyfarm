<?php require APPROOT . '/views/inc/headerAdmin.php';?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="body-container">
    <!--Sidebar-->
    <?php require APPROOT . '/views/inc/components/sidebars/admin_sidebar.php';?>

    <main>
        <h2>Seller Payments</h2>
        <hr><br>

        <div class="btn-container">
                <form action="<?php echo URLROOT?>/Admin/seller" method="GET">
                        <input type="hidden" name="status" value="Unsettled">
                        <button class="admin-table" type="submit">Unsettled</button>
                </form>

                <form action="<?php echo URLROOT?>/Admin/seller" method="GET">
                        <input type="hidden" name="status" value="Settled">
                        <button class="admin-table" type="submit">Settled</button>
                </form>
        </div>

        <?php
            $sellerPayments = $data['sellerPayments'];
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
                foreach ($sellerPayments as $sellerPayment):
            ?>
                    <tr>
                        <td><?php echo $sellerPayment->seller_ID?></td>
                        <td><?php echo $sellerPayment->Payment_Id?></td>
                        <td><?php echo $sellerPayment->product_charge?></td>
                        <td><?php echo $sellerPayment->PaymentStatus?></td>
                        <td>
                            <div class="btn-container">

                                <?php
                                        if($sellerPayment->PaymentStatus == 'Unsettled'){
                                ?>
                                                <form action="<?php echo URLROOT?>/Admin/settleSellerPayment" method="POST">
                                                        <input type="hidden" name="sellerID" value="<?php echo $sellerPayment->seller_ID?>">
                                                        <button class="admin-table" type="submit">Show Bank Details</button>
                                                </form>
                                <?php
                                        }
                                ?>


                                <form action="<?php echo URLROOT?>/Admin/seller" method="POST">
                                    <?php
                                        $status = ($sellerPayment->PaymentStatus == 'Unsettled') ? ('Settled') : ('Unsettled');
                                    ?>
                                    <input type="hidden" name="paymentID" value="<?php echo $sellerPayment->Payment_Id?>">
                                    <input type="hidden" name="sellerID" value="<?php echo $sellerPayment->seller_ID?>">
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

<?php require APPROOT . '/views/inc/footer.php'; ?>  

<script src="<?php echo URLROOT . '/public/js/popupModal.js';?>"></script>