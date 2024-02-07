
<!-- <div class="side">
    <aside class="sidebar">
            <nav class="sidebar-menu">
                <a href="<?php echo URLROOT; ?>/Pages/dashboard" class="menu-item ">Shopping Cart</a><br><br>
                <a href="<?php echo URLROOT; ?>/Orders/placedOrders" class="menu-item">My Orders</a><br><br>
                <a href="<?php echo URLROOT; ?>/Pages/dashReviews" class="menu-item">My Reviews</a><br><br>
            </nav>

		</aside>
</div>   -->

<div class="wrapperCart">
    <div class="column1">
        <div class ="sidebar">
            <h3 >DASHBOARD</h3>
            <hr>
            <ul>
                <button id ="Cart" >Shopping Cart </button><br>
                <button id ="Order">My orders</button><br>
                <button id ="rate">My Reviews</button>

            </ul>
            
        </div>
    </div>
</div>





<script>

    document.getElementById("Cart").addEventListener("click", function() {
        window.location.href = "http://localhost/Easyfarm/Cart/showCart";
    });
    document.getElementById("Order").addEventListener("click", function() {
        window.location.href = "http://localhost/Easyfarm/Orders/placedOrders";
    });
    document.getElementById("rate").addEventListener("click", function() {
        window.location.href = "http://localhost/Easyfarm/Review/userReviews";
    });


</script>