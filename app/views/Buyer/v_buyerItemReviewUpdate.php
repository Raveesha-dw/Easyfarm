<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="review-card">
<?php
// echo $data['item_id'];

$editReview = $data['editReview'];
// echo $editReview->Item_name;
?>

<h2><?php echo $editReview->Item_name; ?></h2>

<form action="<?php echo URLROOT ?>/Review/editReview" method="post">
        <div>
            <input type="hidden" name="review_ID" value="<?php echo $editReview->review_ID ?>">
            <input type="hidden" name="user_ID" value="<?php echo $_SESSION['user_ID']; ?>">
            <input type="hidden" name="item_ID" value="<?php echo $editReview->item_ID;?>">
            <input type="hidden" name="item_name" value="<?php echo $editReview->Item_name;?>">
            
        </div>

        <!-- <div class="rating-part">
        <label for="rating">Rating:</label>
        <select id="rating" name="rating">
            <option value="5">5 - Excellent</option>
            <option value="4">4 - Very Good</option>
            <option value="3">3 - Good</option>
            <option value="2">2 - Fair</option>
            <option value="1">1 - Poor</option>
        </select><br><br>
    </div> -->

  
  <div class="rating">
    <input type="radio" id="star5" name="rating" value="5" /><span><label for="star5" title="5 stars">&#9734;</label></span>
    <input type="radio" id="star4" name="rating" value="4" /><span><label for="star4" title="4 stars">&#9734;</label></span>
    <input type="radio" id="star3" name="rating" value="3" /><span><label for="star3" title="3 stars">&#9734;</label></span>
    <input type="radio" id="star2" name="rating" value="2" /><span><label for="star2" title="2 stars">&#9734;</label></span>
    <input type="radio" id="star1" name="rating" value="1" /><span><label for="star1" title="1 star">&#9734;</label></span>
  </div>


    
    <div class="review-part">
    <label for="review">Review:</label><br>
    <textarea id="review" name="review" rows="4" cols="50" required></textarea><br><br>
    </div>

    <div>
    <input type="hidden" name="review_date" value="<?php echo date('Y-m-d'); ?>">
    <input type="hidden" name="review_time" value="<?php echo date('H:i:s'); ?>">
    </div>

    <input type="submit" value="Update Review">
</form>


</div>

<script>
const ratingForm = document.getElementById('rating-form');
const stars = ratingForm.querySelectorAll('span');

for (const star of stars) {
  star.addEventListener('click', setRating);
}

function setRating(event) {
  const clickedStar = event.target;
  const rating = clickedStar.parentElement.querySelector('input').value;
  console.log('User rated:', rating);
  // You can send this rating to your backend or do any other action with it.


const data = {
    rating: rating
  };

  
  fetch('<?php echo URLROOT?>/Review/postReview', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  })
  .then(response => {
    if (response.ok) {
      console.log('Rating submitted successfully');
   
    } else {
      console.error('Rating submission failed');
      
    }
  })
  .catch(error => {
    console.error('Error:', error);
    // Optionally, handle errors here
  });

}

</script>



<?php require APPROOT . '/views/inc/footer.php'; ?>  