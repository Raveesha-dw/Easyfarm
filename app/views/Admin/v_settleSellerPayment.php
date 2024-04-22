<?php require APPROOT . '/views/inc/headerAdmin.php';?>

<div class="body-container">
    <!--Sidebar-->
    <?php require APPROOT . '/views/inc/components/sidebars/admin_sidebar.php';?>

    <main>
        <h2>Seller's Bank Details</h2>
        <hr><br>

        
        <?php
            $sellerData = $data['sellerData'];
        ?>

        <h3>Seller Details:</h3>
        <table>
            <tr>
                <th>Seller ID</th>
                <td><?php echo $sellerData->U_Id?></td>
            </tr>
            <tr>
                <th>Seller Name</th>
                <td><?php echo $sellerData->Name?></td>
            </tr>
            <tr>
                <th>Store Name</th>
                <td><?php echo $sellerData->Store_Name?></td>
            </tr>
        </table>
        <br><br><br>

        <h3><b>Bank Account Details:</b></h3>
        <table>
            <tr>
                <th>Account Holder's Name</th>
                <td><?php echo $sellerData->Account_Holder?></td>
            </tr>
            <tr>
                <th>Bank Name</th>
                <td><?php echo $sellerData->Bank_Name?></td>
            </tr>
            <tr>
                <th>Branch Name</th>
                <td><?php echo $sellerData->Branch_Name?></td>
            </tr>
            <tr>
                <th>Account Number</th>
                <td><?php echo $sellerData->Account_Number?></td>
            </tr>
        </table>


    </main>
</div>