<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<section id="productDetails" class="section-p1"">
<!-- <div class="flex-container"> -->

<br>

<?php

if($data['allreviews'] == NULL){ ?>
    <p style="color: lightslategray;">You haven't posted any reviews yet</p>
<?php } ?>
<div class="product-container">

<?php
foreach($data['allreviews'] as $review):
    // print_r($review);
?>

    <!-- <div class="product"> -->
    <div class="order-container">
    <img src="<?php echo URLROOT ?>/public/images/seller/<?php echo $review->Image ?> " width="100%" id="MainImg" height="50%" alt="">
    <div class="product-description">
        <h3>Reviewed: <?php echo $review->Item_name ?> </h3>
        <p>on <?php echo $review->posted_date ?> at <?php echo $review->posted_time?></p>

       
        <p>
            <!-- <?php echo $_SESSION['user_email']?> posted: <br><br> -->
        Review: <?php echo $review->Review?><br>
        Rating: <?php echo $review->Rating?> </p>
</div>
        <a href="<?php echo URLROOT; ?>/Review/updateUserReview/<?php echo $review->review_ID ?>/<?php echo $review->Item_name?>"><button>Update</button></a>
        <!-- <a href="<?php echo URLROOT; ?>/Review/deleteUserReview/<?php echo $review->review_ID ?>" onclick="return confirmDelete();"><button style="align-items: center; width:min-content;">Delete</button></a>
        
         -->

         <a  onclick="confirmDelete('<?php echo $review->review_ID ?>' )" href="<?php echo URLROOT ?>/Review/deleteReview?reviewId=<?php echo $review->review_ID; ?>"><button>Delete</button></a>
       

</div>




<?php
endforeach
?>
</div>
<!-- </div> -->
</section>

<script>
function confirmDelete(reviewId) {
     if (confirm('Are you sure you want to delete this review?')) {
            // window.location.href = '<?php echo URLROOT ?>/Review/deleteReview?reviewId=' + reviewId;
            window.location.href = '<?php echo URLROOT ?>/Review/deleteReview?reviewId=' + reviewId;

     }
    // return confirm("Are you sure you want to delete this review?");
}
</script>


<?php require APPROOT . '/views/inc/footer.php'; ?>  