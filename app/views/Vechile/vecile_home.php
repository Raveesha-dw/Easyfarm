<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<!-- <?php print_r($data) ?> -->

<div class="wrapper">
    <!--Menu-->
    
    <section class="menu">
        <div class="container">
            <h2 class="title">Featured Categories</h2>
            <div class="menu-container">

                <?php foreach ($data['v_Categories'] as $category) : ?>
                    <div class="card">
                        <i class="fa-solid fa-truck-fast"></i>
                        <h3><a href="<?php echo URLROOT ?>/Vehicle_item/getcatergorized_items?Category_name=<?php echo $category->Category_name; ?>"><?php echo $category->Category_name; ?> </a></h3>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>

    </section><hr>
    <!--  -->



 <!-- <form action="<?php echo URLROOT ?>/product/productSearch" method="POST">
        <div class="search-container">
            <input type="text" id="search" name="search" class="search-bar" placeholder="Search for product...">
            <button type="submit">Search</button>
            <a href="<?php echo URLROOT ?>/product/productSearch">Search </a>  -->
        <!-- </div> -->
    <!-- </form> -->
 
        <!--  -->


        <!--Product List-->
        <section class="product-section container">

             <div class = "filters">

            <select class="form-control" name="sort" id ="sort">
                <option selected="" disabled="" >Sort by Default </option>
                <option value="l2h">Price low to high</option>
                <option value="h2l">Price high to low</option>
            </select>


        </div>
           

    

            <!-- <h2 class="title">Featured Products</h2> -->
            <div class="product-container">
                              <?php

    // print_r($data);
    foreach ($data['items'] as $item) :
    ?>
                  


                    <div class="product">
                         <a href="<?php echo URLROOT ?>/Vechile_orders/details?V_Id=<?php echo $item->V_Id; ?>">

                        <img src="<?php echo URLROOT ?>/public/images/vehicleRenter/<?php echo $item->Image; ?>" />
                        <div class="product-description">
                            <h3><?php echo $item->V_category; ?></h3>
                            <!-- <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div> -->
<!--                             
                            <h5> <?php echo $item->Charging_Unit; ?></h5>
                            <h4><?php echo $item->Rental_Fee; ?>LKR</h4> -->
                            <h4> LKR <?php echo $item->Rental_Fee;?></h4>
                            <h4> <?php echo  $item->Charging_Unit;?></h4>
                        </div>
                        <!-- </div> -->
                        <!-- </div> -->
                        <input type="hidden" name="V_Id" value="<?php echo $item->V_Id; ?>">
                        </a>
                    </div>
                     <?php endforeach; ?>
                
            </div>

           


        </section>


</div>
<!-- Add this script at the end of your HTML body or in a separate JavaScript file -->
<script>
   document.getElementById('sort').addEventListener('change', function() {
    console.log("Sort dropdown changed"); // Check if event listener triggers

    var productsContainer = document.querySelector('.product-container');
    var products = Array.from(productsContainer.querySelectorAll('.product'));

    var sortValue = this.value;
    console.log("Sort value:", sortValue); // Check selected sort value

    products.sort(function(a, b) {
        var priceA = parseFloat(a.querySelector('.product-description h4').textContent);
        var priceB = parseFloat(b.querySelector('.product-description h4').textContent);
        console.log("Price A:", priceA, "Price B:", priceB); // Check prices for comparison

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