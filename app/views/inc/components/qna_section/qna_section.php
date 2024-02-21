<?php
    date_default_timezone_set('Europe/Copenhagen');
    include 'dbh.inc.php';
    include 'qna.inc.php';

    //session_start();
?>

<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<section id ="questionSection" class="section-p4">
    <h3>Questions About This Product</h3>
    <hr><br>

    <?php
        //if(isLoggedIn() && $_SESSION['user_type'] == 'Buyer')
        if(true){
            echo "
            <div class='question-card'>
                <form method='POST' action='".setQuestions($conn)."'>
                    <input type='hidden' name='item_id' value=''>
                    <input type='hidden' name='user_id' value='".$_SESSION['user_ID']."'>
                    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                    <div class='text-area'><textarea name='question' cols='100' rows='5'></textarea><br></div>
                    <button type='submit' name='questionSubmit'>Ask Seller</button>
                </form>
            </div>";
        }else{
            echo "<p>Login to ask questions about this product!</p>";
        }

        getQuestions($conn);
    ?>
</section>

<script>
    function confirmDelete(){
    var result = confirm('Are you sure you want to delete this question?');
    if (result == false){
    event.preventDefault();
        }
    }
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>  