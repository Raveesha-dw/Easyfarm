<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="flex-container">

<br>

<?php
// $allReviews = $data['allreviews'];
// print_r($allReviews);

foreach($data['allreviews'] as $review):
    // print_r($review);
?>
<div class="product-container">
    <div class="product">
    <img src="<?php echo URLROOT?>/public/images/products/vegi2.jpg" alt="">
    <div class="product-description">
        <h3>Reviewed: <?php echo $review->Item_name ?> </h3>
        <p>on <?php echo $review->posted_date ?> at <?php echo $review->posted_time?></p>
        <p><?php echo $_SESSION['user_email']?> posted: <br>Review: <?php echo $review->Review?> <br> Rating: <?php echo $review->Rating?> </p>
</div>
        <a href="<?php echo URLROOT; ?>/Review/updateUserReview/<?php echo $review->review_ID ?>/<?php echo $review->Item_name?>"><button style="align-items: center;">Update</button></a>
        <a href="<?php echo URLROOT; ?>/Review/deleteUserReview/<?php echo $review->review_ID ?>" onclick="return confirmDelete();"><button style="align-items: center;">Delete</button></a>
       

</div>


</div>

<?php
endforeach
?>
</div>

<script>
function confirmDelete() {
    return confirm("Are you sure you want to delete this review?");
}
</script>


<?php require APPROOT . '/views/inc/footer.php'; ?>  