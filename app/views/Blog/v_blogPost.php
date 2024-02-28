<?php require APPROOT . '/views/inc/headerBlog.php'; ?>

<?php
    $post = $data['post'];
    $comments = $data['comments'];
?>

<div class="img-blog-post">
    <img src="data:image/jpeg;base64,<?php echo $post->image; ?>" alt="Blog img">
</div>

<div class="btn-dashboard">
    <a href="<?php echo URLROOT . '/Blog' ?>" ><h5 class="btn-dashboard"><i class="bx bxs-home"></i>  Blog</h5></a>
</div>


<div class="blog-post mt-5">
    <div class="container">
        <!-- Article -->
        <div class="post bg-light p-4 mt-5">
            <h1><?php echo $post->title; ?></h1>
            <p>Posted by Anjana Tharusha on <?php echo $post->date_published; ?> </p>
            <hr>
            <p><?php echo $post->content; ?> </p>
        </div>



        <!-- Comment Section -->
        <div class="comment-section bg-light p-4 mt-5">
            <h3>Comments</h3>
            <hr><br>

            <!-- Comment Editor -->
            <?php 
                if(isset($_SESSION['user_ID'])){ 
            ?>

                    <h4>Write a comment...</h4>
                    <div class="question-card">
                        <form action="<?php echo URLROOT . '/Blog/writeComment'?>" method='POST'>
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_ID'];?>">
                            <input type="hidden" name="post_id" value="<?php echo $_GET['id']?>">
                            <input type="hidden" name="datetime_posted" value="<?php echo date('Y-m-d H:i:s');?>">
                            <textarea name="comment" id="comment" cols="100" rows="3"></textarea>
                            <br>
                            <input class="btn btn-comment" type="submit" name="writeComment" value="Comment"><br><br>
                        </form>
                    </div>

            <?php            
                }else{
                    echo "<span>Please login to comment.</span><br><br><br>";
                }
            ?>



            <!-- Display Comments -->
            <?php 
                foreach ($comments as $comment):
            ?>

                    <!-- Comment card -->
                    <div class="comment-card">
                        <p>
                            <b><?php echo $comment->userName;?></b> says, <br><br>
                            <?php echo $comment->comment;?> <br><br>
                            <i><?php echo $comment->datetime_last_edited;?></i><br>
                        </p>

                        <?php
                            if(isset($_SESSION['user_ID'])){
                                if($comment->user_id == $_SESSION['user_ID']){
                        ?>
                                    <!-- Edit Comment -->
                                    <button class="comment-edit-btn display-0 display-1">Edit</button>
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
                                    <form class="delete-form" action="<?php echo URLROOT . '/Blog/deleteComment'?>" onclick='confirmDelete()' method="POST">
                                        <input type="hidden" name="comment_id" value="<?php echo $comment->comment_id;?>">
                                        <input type="hidden" name="post_id" value="<?php echo $_GET['id']?>">
                                        <input type="submit" name="commentDelete" value="Delete">
                                    </form>
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
</div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
</script>