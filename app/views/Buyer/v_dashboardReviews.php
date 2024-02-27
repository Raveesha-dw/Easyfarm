<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<?php require APPROOT . '/views/inc/components/sidebars/buyer_sidebar.php'?>

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
        <p><span style="font-size: smaller;"> on <?php echo $review->posted_date ?> at <?php echo $review->posted_time?></span></p><br>
        <p><?php echo $_SESSION['user_email']?> posted: <br><br>Review: <?php echo $review->Review?> <br> Rating: <?php echo $review->Rating?> </p>
</div>
        <a href="<?php echo URLROOT; ?>/Review/updateUserReview/<?php echo $review->review_ID ?>"><button style="align-items: center;">Update</button></a>
        <!-- <a href="<?php echo URLROOT; ?>/Review/deleteUserReview/<?php echo $review->review_ID ?>" onclick="return confirmDelete();"><button style="align-items: center;">Delete</button></a> -->
        <a  onclick="confirmDelete('<?php echo $review->review_ID ?>' )" href="<?php echo URLROOT ?>/Review/deleteReview?reviewId=<?php echo $review->review_ID; ?>"><button style="align-items: center;">Delete</button></a>
        <!-- <a  onclick="confirmDelete('<?php echo $review->review_ID ?>' )" href="<?php echo URLROOT ?>/Review/deleteReview/<?php echo $review->review_ID; ?>"><button style="align-items: center;">Delete</button></a> -->
       

</div>


</div>

<?php
endforeach
?>
</div>

<script>
function confirmDelete(reviewId) {
     if (confirm('Are you sure you want to delete this review?')) {
            // window.location.href = '<?php echo URLROOT ?>/Review/deleteReview?reviewId=' + reviewId;
            window.location.href = '<?php echo URLROOT ?>/Review/deleteReview?reviewId=' + reviewId;

     }
   
}
</script>


<?php require APPROOT . '/views/inc/footer.php'; ?>  