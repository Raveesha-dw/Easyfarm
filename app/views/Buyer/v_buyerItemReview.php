<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="review-card">
<?php
// echo $data['item_id'];

?>

<h2><?php echo $data['item_name']; ?></h2>

<form action="<?php echo URLROOT ?>/Review/postReview" method="post">
        <div>
            <input type="hidden" name="user_ID" value="<?php echo $_SESSION['user_ID']; ?>">
            <input type="hidden" name="item_ID" value="<?php echo $data['item_id']; ?>">
            <!-- <input type="hidden" name="item_name" value="<?php echo $data['item_name']; ?>"> -->
        </div>
        <div class="rating-part">
    <label for="rating">Rating:</label>
    <select id="rating" name="rating">
        <option value="5">5 - Excellent</option>
        <option value="4">4 - Very Good</option>
        <option value="3">3 - Good</option>
        <option value="2">2 - Fair</option>
        <option value="1">1 - Poor</option>
    </select><br><br>
    </div>

    <div class="review-part">
    <label for="review">Review:</label><br>
    <textarea id="review" name="review" rows="4" cols="50" required></textarea><br><br>
    </div>

    <div>
    <input type="hidden" name="review_date" value="<?php echo date('Y-m-d'); ?>">
    <input type="hidden" name="review_time" value="<?php echo date('H:i:s'); ?>">
    </div>

    <input type="submit" value="Submit Review">
</form>


</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>  