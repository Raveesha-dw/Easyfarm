<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>


<section id="productDetails" class="section-p1">
<div class="review-card" style="display: grid; place-items: center;">
<?php
// echo $data['item_id'];

?>
<h3>Item : <?php echo $data['item_name']; ?></h3>
<!-- <div class="product" style="align-items:center; justify-content: center; display: flex;"> -->



<form action="<?php echo URLROOT ?>/Review/postReview" method="post" id="rating-form">
        
            <input type="hidden" name="user_ID" value="<?php echo $_SESSION['user_ID']; ?>">
            <input type="hidden" name="item_ID" value="<?php echo $data['item_id']; ?>">
            <!-- <input type="hidden" name="item_name" value="<?php echo $data['item_name']; ?>"> -->
        
      
<div class="rating-container">
        <div class="rating">
          <label for="rating"><medium>How likely are you to recomment this product to others?</medium></label><br>
            <input type="hidden" id="rating-value" name="rating" value="0">

            <?php for ($i = 1; $i <= 10; $i++) { ?>
            <div class="number-label">
                <span class="number" data-value="<?php echo $i; ?>" style="color: <?php echo $i <= 7 ? 'red' : 'green'; ?>"><?php echo $i; ?></span>
                <!-- <span class="number" data-value="<?php echo $i; ?>" onclick="highlightRating(this)" style="color: <?php echo $i <= 7 ? 'red' : 'green'; ?>"><?php echo $i; ?></span> -->
            </div>
           <?php } ?>

        </div>
</div>

       <label for="rating" style="align-items: center;"><medium>Share your thoughts about the product: </medium></label><br> 
    <div class="review-part">
    
    <textarea id="review" name="review" rows="4" cols="50" ></textarea><br><br>
    </div>

    <div>
    <input type="hidden" name="review_date" value="<?php echo date('Y-m-d'); ?>">
    <input type="hidden" name="review_time" value="<?php echo date('H:i:s'); ?>">
    </div>

    <!-- <input type="submit" value="Submit Review"> -->
    <!-- <input type="submit" value="Post" style=" font-size:medium; background-color: var(--dark-green); color: #fff; border-radius: 25%; "> -->
    <button type="button" onclick="submitReview()" style="align-items: center;">Post</button>

</form>

<!-- </div> -->
</div>
</section>

<script>
const ratingForm = document.getElementById('rating-form');
const stars = ratingForm.querySelectorAll('.number');

for (const star of stars) {
  star.addEventListener('click', selectRating);
}

function selectRating(event) {
  const clickedStar = event.target;
  const rating = parseInt(clickedStar.dataset.value);
  document.getElementById('rating-value').value = rating;

  // Highlight the selected star and unhighlight others
  stars.forEach(star => {
    if (star.dataset.value <= rating) {
      star.style.color = rating <= 7 ? 'red' : 'green';
    } else {
      star.style.color = '';
    }
  });
}

function submitReview() {
  const reviewTextarea = document.getElementById('review');
  const review = reviewTextarea.value.trim();
  const rating = document.getElementById('rating-value').value;

  // Check if a review is entered
  if (review === '') {
    alert('Please enter your review before submitting.');
    return;
  }

  // Submit the form
  ratingForm.submit();
}
</script>




<?php require APPROOT . '/views/inc/footer.php'; ?>  