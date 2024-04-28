<?php require APPROOT . '/views/inc/headerBlog.php'; ?>
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<?php
    $post = $data['post'];
    $sellerDetails = $data['author'];
    $comments = $data['comments'];
    $productDetails = $data['post'];
    $inquiries = $data['comments'];
?>

<div class="img-blog-post">
    <img src="data:image/jpeg;base64,<?php echo $post->image; ?>" alt="Blog img">
</div> 

<!-- <div class="btn-dashboard">
    <a href="<?php // echo URLROOT . '/Blog' ?>" ><h5 class="btn-dashboard"><i class="bx bxs-home"></i>  Blog</h5></a>
</div> -->


<div class="blog-post">
    <div class="container">
        <!-- Article -->
        <div class="post">
            <h1><?php echo $post->title; ?></h1>
            <p><?php echo $sellerDetails->Name;?> posted on <?php echo $post->date_published; ?> </p>
            <hr><br>
            <p><?php echo $post->content; ?> </p>
        </div>



        <!-- Comment Section -->
        <!-- <div class="comment-section bg-light p-4 mt-5">
            <h3>Comments</h3>
            <hr><br>

            <!-- Comment Editor -->
            <?php 
                //if(isset($_SESSION['user_ID'])){ 
            ?>

                    <!-- <h4>Write a comment...</h4>
                    <div class="question-card">
                        <form action="<?php echo URLROOT . '/Blog/writeComment'?>" method='POST'>
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_ID'];?>">
                            <input type="hidden" name="post_id" value="<?php echo $_GET['id']?>">
                            <input type="hidden" name="datetime_posted" value="<?php echo date('Y-m-d H:i:s');?>">
                            <textarea name="comment" id="comment" cols="100" rows="3"></textarea>
                            <br>
                            <input class="btn btn-comment" type="submit" name="writeComment" value="Comment"><br><br>
                        </form>
                    </div> -->

            <?php            
                // }else{
                //     echo "<span>Please login to comment.</span><br><br><br>";
                // }
            ?>



            <!-- Display Comments -->
            <?php 
                //foreach ($comments as $comment):
            ?>

                    <!-- Comment card -->
                    <!-- <div class="comment-card">
                        <p>
                             <!-- <b><?php echo $comment->userName;?></b> says, <br><br>
                            <?php echo $comment->comment;?> <br><br>
                            <i><?php echo $comment->datetime_last_edited;?></i><br> -->
                        <!-- </p> -->

                        <?php
                            // if(isset($_SESSION['user_ID'])){
                            //     if($comment->user_id == $_SESSION['user_ID']){
                        ?>
                                    <!-- Edit Comment -->
                                    <!-- <button class="comment-edit-btn display-0 display-1">Edit</button>
                                    <div class="edit-form display-0" style="display:none;">
                                        <form action="<?php echo URLROOT . '/Blog/editComment'?>" method="POST">
                                            <input type="hidden" name="comment_id" value="<?php echo $comment->comment_id;?>">
                                            <input type="hidden" name="post_id" value="<?php echo $_GET['id']?>">
                                            <input type="hidden" name="datetime" value="<?php echo date('Y-m-d H:i:s');?>">
                                            <textarea name="edited_comment" cols="100" rows="3"><?php echo $comment->comment;?></textarea><br><br><br>
                                            <button class="btn btn-save" type="submit">Save</button>
                                        </form>
                                        <button class="btn btn-cancel display-1">Cancel</button>
                                    </div>

                                    <!-- Delete Comment -->
                                    <!-- <form class="delete-form" action="<?php echo URLROOT . '/Blog/deleteComment'?>" onclick='confirmDelete()' method="POST">
                                        <input type="hidden" name="comment_id" value="<?php echo $comment->comment_id;?>">
                                        <input type="hidden" name="post_id" value="<?php echo $_GET['id']?>">
                                        <input type="submit" name="commentDelete" value="Delete">
                                    </form>  -->
                        <!-- <?php            
                            //     }
                            // }
                        ?> -->
                    <!-- </div> --> 

            <?php 
               // endforeach;
            ?>

        </div>

        <div class="container">
            <div class="comment-section bg-light p-4 mt-5">
            <h3>Ask Questions About This Article</h3>
            <hr>

            <!-- Editor -->
            <?php 
                if(isset($_SESSION['user_ID'])){ 
            ?>

                    <div class="question-card">
                        <form action="<?php echo URLROOT . '/Blog/askQuestion'?>" method='POST'>
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_ID'];?>">
                            <input type="hidden" name="post_id" value="<?php echo $post->post_id;?>">
                            <input type="hidden" name="datetime_posted" value="<?php echo date('Y-m-d H:i:s');?>">
                            <textarea name="question" id="question" cols="100" rows="4" placeholder="Write your question..."></textarea>
                            <br>
                            <button class="btn" type="submit">Ask Question</button>
                        </form>
                    </div>

            <?php            
                }else{
                    echo "<br><span>Please login to ask questions.</span><br><br><br>";
                }
            ?>

            <!-- Display Questions -->
            <?php 
                foreach ($inquiries as $inquiry):
            ?> 

                <!-- Question card -->
                <div class="comment-card"> 
                    <p>
                        <b><?php echo $inquiry->userName;?></b> <?php echo ($inquiry->userType != 'AgricultureExpert') ? 'asks,' : 'comments,'; ?> <br><br>
                        <?php echo $inquiry->question;?> <br><br>
                        <i>on <?php echo $inquiry->datetime_last_edited;?></i><br>
                    </p>

                    <!-- Answer -->
                    <?php
                        if($inquiry->answer){
                    ?>
                        <div class="comment-card">
                            <b><?php echo $sellerDetails->Name;?></b> answers, <br><br>
                            <!-- <span><b>Agri Instructor</b> replies,<br></span> -->
                            <?php echo $inquiry->answer;?> <br><br>
                            <i>on <?php echo $inquiry->answer_datetime_edited;?></i>
                            <?php
                                if(isset($_SESSION['user_ID']) && $_SESSION['user_type'] == 'AgricultureExpert'){
                            ?>
                                    <!-- Edit Answer -->
                                    <button class="comment-edit-btn display-0 display-1">Edit</button>
                                    <div class="edit-form display-0" style="display:none;">
                                        <form action="<?php echo URLROOT . '/Blog/editAnswer'?>" method="POST">
                                            <input type="hidden" name="question_id" value="<?php echo $inquiry->question_id;?>">
                                            <input type="hidden" name="post_id" value="<?php echo $productDetails->post_id;?>">
                                            <input type="hidden" name="datetime" value="<?php echo date('Y-m-d H:i:s');?>">
                                            <textarea name="edited_answer" cols="100" rows="4"><?php echo $inquiry->answer;?></textarea><br><br><br>
                                            <button class="btn btn-save" type="submit">Save</button>
                                        </form>
                                        <button class="btn btn-cancel display-1">Cancel</button>
                                    </div>

                                    <!-- Delete Answer -->
                                    <form class="delete-form" action="<?php echo URLROOT . '/Blog/deleteAnswer'?>" onclick='confirmDeleteAnswer()' method="POST">
                                        <input type="hidden" name="question_id" value="<?php echo $inquiry->question_id;?>">
                                        <input type="hidden" name="post_id" value="<?php echo $productDetails->post_id;?>">
                                        <input type="submit" name="answerDelete" value="Delete">
                                    </form>
                            <?php            
                                }
                            ?>
                        </div>               
                    <?php
                        }

                        if(isset($_SESSION['user_ID'])){

                            //If the logged in user is the person who has asked the question he/she can edit/delete it
                            if($_SESSION['user_ID'] == $inquiry->user_id){
                    ?>
                                <!-- Edit Question -->
                                <button class="comment-edit-btn display-0 display-1">Edit</button>
                                <div class="edit-form display-0" style="display:none;">
                                    <form action="<?php echo URLROOT . '/Blog/editQuestion'?>" method="POST">
                                        <input type="hidden" name="question_id" value="<?php echo $inquiry->question_id;?>">
                                        <input type="hidden" name="product_id" value="<?php echo $productDetails->post_id;?>">
                                        <input type="hidden" name="datetime" value="<?php echo date('Y-m-d H:i:s');?>">
                                        <textarea name="edited_question" cols="100" rows="4"><?php echo $inquiry->question;?></textarea><br><br><br>
                                        <button class="btn btn-save" type="submit">Save</button>
                                    </form>
                                    <button class="btn btn-cancel display-1">Cancel</button>
                                </div>

                                <!-- Delete Question -->
                                <form class="delete-form" action="<?php echo URLROOT . '/Blog/deleteQuestion'?>" onclick='confirmDeleteQestion()' method="POST">
                                    <input type="hidden" name="question_id" value="<?php echo $inquiry->question_id;?>">
                                    <input type="hidden" name="product_id" value="<?php echo $productDetails->post_id;?>">
                                    <input type="submit" name="questionDelete" value="Delete">
                                </form>
                    <?php            
                            }

                            // Any agri instructor can reply to questions, but there is no reply option for comments posted by agri instructors
                            if($_SESSION['user_type'] == 'AgricultureExpert' && $inquiry->userType != 'AgricultureExpert' && empty($inquiry->answer)){
                    ?>
                                <!-- Answer Question -->
                                <div class="display-answer-form">
                                    <button class="btn btn-answer display-answer-0 display-answer-1">Answer</button>
                                    <div class="edit-form display-answer-0" style="display:none;">
                                        <form action="<?php echo URLROOT . '/Blog/answerQuestion'?>" method="POST">
                                            <input type="hidden" name="question_id" value="<?php echo $inquiry->question_id;?>">
                                            <input type="hidden" name="post_id" value="<?php echo $productDetails->post_id;?>">
                                            <input type="hidden" name="answer_datetime" value="<?php echo date('Y-m-d H:i:s');?>">
                                            <textarea name="answer" cols="100" rows="4" placeholder="Write answer..."></textarea><br><br><br>
                                            <button class="btn btn-save" type="submit">Answer</button>
                                        </form>
                                        <button class="btn btn-cancel display-answer-1">Cancel</button>
                                    </div>
                                </div>
                    <?php            
                            }
                        }
                    ?>
                </div>

            <?php 
                endforeach;
            ?>
        </div>
        </div>
        <
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>  

<!-- Include jQuery -->
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        $(".display-1").on("click", function () {
            var commentDiv = $(this).closest(".comment-card");
            commentDiv.find(".display-0").toggle();
        });
    });

    function confirmDelete(){
    var result = confirm('Are you sure you want to delete this comment?');
    if (result == false){
    event.preventDefault();
        }
    }
</script> -->

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    

    $(document).ready(function () {
        $(".display-1").on("click", function () {
            var commentDiv = $(this).closest(".comment-card");
            commentDiv.find(".display-0").toggle();
        });
    });

    $(document).ready(function () {
        $(".display-answer-1").on("click", function () {
            var commentDiv = $(this).closest(".display-answer-form");
            commentDiv.find(".display-answer-0").toggle();
        });
    });

    function confirmDeleteQestion(){
        var result = confirm('Are you sure you want to delete this question?');
        if (result == false){
            event.preventDefault();
        }
    }

    function confirmDeleteAnswer(){
    var result = confirm('Are you sure you want to delete this answer?');
    if (result == false){
    event.preventDefault();
        }
    }
    
</script>