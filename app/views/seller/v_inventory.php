<div class="headebr">
    <div>
        <?php require APPROOT . '/views/inc/header.php'; ?>
        <?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
    </div>


    <div class="container">
        <?php require APPROOT . '/views/seller/a.php' ?>

        <section class="home">
<!-- <?php print_r($data); ?> -->

<div class="itable-section">
    <table>
        <!-- Fix: Corrected opening tag from <thered> to <thead> -->
        <thead>
            <tr>
                <th>S No.</th>
                <th>Product</th>
                <th>Name</th>
                <th>Available Size</th>
                <th>Expiry date</th>
            </tr>
            <?php $products = $data; ?>
            <?php
            $count = 1;
             foreach ($products as $product) : 
          
            ?>
                <tr>
                    <!-- <td><?php echo $product->Item_Id ?></td>
                     -->
                     <td><?php echo $count; ?></td>
                    <td> <img src="<?php echo URLROOT ?>/public/images/seller/<?php echo $product->Image; ?>"/> </td>
                    <td><?php echo $product->Item_name ?></td>
                    <td><?php echo $product->Stock_size ?></td>
                    <td><?php echo $product->Expiry_date ?></td>
                </tr>
            <?php $count++;
             endforeach; ?>
        </thead>
    </table>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>

</section>
</div>
</div>