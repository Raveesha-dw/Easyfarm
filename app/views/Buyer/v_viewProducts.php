<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<br>

<?php
$category = $data['category'];
$count = count($data['allProduct']);
 ?>

<div class="no-results" style="text-align: center;">
    <medium><b><?php echo $count ?> items found for '<?php echo $category
     ?>' Category</b></medium><br>
    </div><br>

 <section class="product-section container">

<div class="product-container">


<?php
foreach($data['allProduct'] as $product):
?>

<a href="<?php echo URLROOT?>/Product/ProductPage/<?php echo $product->Item_Id?>">

    <div class="product">
    <!-- <img src="<?php echo URLROOT?>/public/images/products/vegi2.jpg" alt=""> -->
    <img src="<?php echo URLROOT?>/public/images/seller/<?php echo $product->Image;?>"/>
    <div class="product-description">
        <h3><?php echo $product->Item_name ?></h3>
        <h4><?php echo $product->Unit_price ?> LKR / <?php echo $product->Unit_size ?> <?php echo $product->Unit_type?></h4>
    </div>
    
</div>
</a>

<?php
endforeach;
?>
</div>
 </section>

<?php require APPROOT . '/views/inc/footer.php'; ?>  