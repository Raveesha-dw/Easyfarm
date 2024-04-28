<?php require APPROOT . '/views/inc/headerAdmin.php';?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="body-container">
    <!--Sidebar-->
    <?php require APPROOT . '/views/inc/components/sidebars/admin_sidebar.php';?>

    <main>
        <h2>Manage Delivery Fee Rates</h2>
        <hr><br>

        <?php
            $deliveryZones = $data['deliveryZones'];
        ?>

        <!-- Show Delivery Zones -->
        <table>
            <tr>
                <th>From</th>
                <th>To</th>
                <th>Base Fee Rate</th>
                <th>Weight Fee Rate (per 2kg)</th>
                <th>Change Fee Rates</th>
            </tr>

            <?php
                foreach ($deliveryZones as $index => $deliveryZone):
            ?>
                    <tr>
                        <td><?php echo $deliveryZone->from_province?></td>
                        <td><?php echo $deliveryZone->to_province?></td>
                        <td><?php echo $deliveryZone->base_fee?></td>
                        <td><?php echo $deliveryZone->weight_fee?></td>
                        <td>
                            <div class="btn-container">
                                <!-- Edit Form -->
                                <button data-modal-target="#edit-category-<?php echo $index ?>" class="admin-table">Edit</button>
                                <div class="modal" id="edit-category-<?php echo $index ?>">
                                    <div class="modal-header">
                                        <div class="title">Edit Delivery Fee Rates</div>
                                        <button data-close-button class="close-button">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <b>From: </b><?php echo $deliveryZone->from_province?>
                                        <b>To: </b><?php echo $deliveryZone->to_province?>
                                        <br><br>
                                        <form action="<?php echo URLROOT;?>/Admin/editDeliveryFeeRates" method="POST">
                                            <label for="baseFee">Base Fee:</label>
                                            <input type="text" id="baseFee" name="baseFee" placeholder="Enter base fee rate" value="<?php echo $deliveryZone->base_fee?>" required></input><br><br>
                                            <label for="weightFee">Weight Fee:</label>
                                            <input type="text" id="weightFee" name="weightFee" placeholder="Enter weight fee rate (per 2kg)" value="<?php echo $deliveryZone->weight_fee?>" required></input><br><br>
                                            <input type="hidden" name="zoneID" value="<?php echo $deliveryZone->zone_ID?>">
                                            <button type="submit" class="admin-table">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                                <div id="overlay"></div>
                            </div>
                        </td>
                    </tr>
            <?php
                endforeach;
            ?>
        </table>

    </main>
</div>




<script src="<?php echo URLROOT . '/public/js/popupModal.js';?>"></script>