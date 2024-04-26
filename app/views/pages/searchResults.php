<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>


<?php
// print_r($data);
$count = count($data['search']);
$term = $data['term'];

 ?>
        <div class="no-results" style="text-align: center;">
        <medium><b><?php echo $count ?> items found for '<?php echo $term ?>'</b></medium><br>
        </div>
        <div class = "filters">

                <span style="color:slategray;">Sort By:</span>
            <select class="form-control" name="sort" id ="sort">
                <option selected="" disabled="" >Best Match </option>
                <option value="l2h">Price low to high</option>
                <option value="h2l">Price high to low</option>
            </select>


 </div> 

<section id="productDetails" class="section-p1" style="background-color: var(--bg-green);">
<?php
        if ($data['search'] == NULL){ ?>
        <div class="no-results" style="text-align: center;">
                <p>No Search Results Found.</p>
        </div>
        <?php 
        }else{
        $count = count($data['search']); ?>
        <!-- <div class="no-results" style="text-align: center;">
        <p><b><?php echo $count ?> items found </b></p><br> -->
        </div>


<div class="product-container">
<?php
foreach ($data['search'] as $product): ?>

<!-- <div class="order-container" style="margin: 10px;"> -->
<a href="<?php echo URLROOT?>/Product/ProductPage/<?php echo $product->Item_Id?>">

    <div class="product">
    <img src="<?php echo URLROOT?>/public/images/seller/<?php echo $product->Image;?>"/>
    <div class="product-description">
        <h3><?php echo $product->Item_name ?></h3><br>
        <h4><?php echo $product->Unit_price ?> LKR </h4> per <?php echo $product->Unit_size ?> <?php echo $product->Unit_type?>
    </div>
    </div>
<!-- </div> -->
</a>

<!-- </div> -->


<?php
endforeach
?>
</div>
<!-- </div>  -->
<?php
        }
        ?>
</section>

<script>
    document.getElementById('sort').addEventListener('change', function() {
        var productsContainer = document.querySelector('.product-container');
        var products = Array.from(productsContainer.querySelectorAll('.product'));

        var sortValue = this.value;

        products.sort(function(a, b) {
            var priceA = parseFloat(a.querySelector('.product-description h4').textContent.split(' ')[0]);
            var priceB = parseFloat(b.querySelector('.product-description h4').textContent.split(' ')[0]);

            if (sortValue === 'l2h') {
                return priceA - priceB;
            } else if (sortValue === 'h2l') {
                return priceB - priceA;
            }
        });

        // Clear the products container
        productsContainer.innerHTML = '';

        // Append sorted products to the container
        products.forEach(function(product) {
            productsContainer.appendChild(product);
        });
    });
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>