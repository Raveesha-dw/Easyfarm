<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                    <td><?php echo $product->remainingStock ?></td>
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

<script>
  $(document).ready(function() {
    adjustContainerHeight();
});

$(window).resize(function() {
    adjustContainerHeight();
});

function adjustContainerHeight() {
    var container = $('.itable-section');
    var contentHeight = container.find('table').height();
    var windowHeight = $(window).height();
    var containerTop = container.offset().top;
    var containerMargin = parseFloat(container.css('margin-top').replace('px', '')) + parseFloat(container.css('margin-bottom').replace('px', ''));
    var containerHeight = windowHeight - containerTop - containerMargin;
    
    // Check if the content height exceeds the available space
    if (contentHeight > containerHeight) {
        container.css('height', containerHeight + 'px');
    } else {
        container.css('height', 'auto'); // Let it adjust dynamically
    }
}


</script>