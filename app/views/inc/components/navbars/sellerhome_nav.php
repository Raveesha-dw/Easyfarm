<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    // Function to set active link and color
    function setActiveLink(link) {
        $('.link').removeClass('active');
        $(link).addClass('active');
        localStorage.setItem('activeLink', $(link).attr('href'));
    }
    
    // Check if there's an active link in local storage
    var activeLink = localStorage.getItem('activeLink');
    if (activeLink) {
        setActiveLink('a[href="' + activeLink + '"]');
    }
    
    // Click event handler for links
    $('.link').click(function(event){
        event.preventDefault();
        setActiveLink(this);
        window.location.href = $(this).attr('href');
    });
});
</script>

<style>
.active {
    color: red; /* Change 'red' to the desired color */
}
</style>

<div class="homeheader">
    <a href="http://localhost/Easyfarm/Seller_home/get_product_details1" class="link">NEW ARRIVAL</a>
    <a href="http://localhost/Easyfarm/Seller_home/get_product_details2" class="link">PENDING</a>
    <a href="http://localhost/Easyfarm/Seller_home/get_product_details3" class="link">COMPLETED</a>
</div>
