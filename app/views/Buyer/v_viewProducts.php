<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<br>

<?php
foreach($data['allProduct'] as $product):
?>

<a href="<?php echo URLROOT?>/Product/ProductPage/<?php echo $product->Item_Id?>">
<div class="product-container">
    <div class="product">
    <img src="<?php echo URLROOT?>/public/images/products/vegi2.jpg" alt="">
    <div class="product-description">
        <h3><?php echo $product->Item_name ?></h3>
    </div>
    </div>
</div>
</a>

<?php
endforeach;
?>

<?php require APPROOT . '/views/inc/footer.php'; ?>  