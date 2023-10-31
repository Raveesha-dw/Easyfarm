<?php
    date_default_timezone_set('Europe/Copenhagen');
    include 'dbh.inc.php';
    include 'qna.inc.php';
?>

<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<section id ="questionSection" class="section-p4">
    <h3>Edit Question</h3>
    <hr><br>
    <?php

        $question_id = $_POST['question_id'];
        $user_id = $_POST['user_id'];
        $date = $_POST['date'];
        $question = $_POST['question'];

        echo "
        <div class='question-card'>
        <form method='POST' action='".editQuestions($conn)."'>
            <input type='hidden' name='question_id' value='".$question_id."'>
            <input type='hidden' name='user_id' value='".$user_id."'>
            <input type='hidden' name='date' value='". $date."'>
            <textarea name='question' rows='10'>".$question."</textarea><br>
            <button type='submit' name='questionSubmit'>Edit</button>
        </form>
        </div>
        ";
    ?>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>  