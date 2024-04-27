<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<?php require APPROOT . '/views/inc/headerBlog.php'; ?>

<div class="body-container">
   <!--Sidebar-->
    <?php require APPROOT . '/views/inc/components/sidebars/agriInstructor_sidebar2.php';?>

    <main>

        <h2 style="font-size:x-large;">Blog Notifications</h2>
        <hr>

        <!-- Posts -->
        <div class="container">
                <div class="comment-section bg-light p-4 mt-5">

                <?php
                        $questions = $data;
                        foreach ($questions as $question):
                                // print_r($question);
                ?>

                                <div class="comment-card"> 
                                        <p>
                                                <b><?php echo $question->userName;?></b> asks, <br><br>
                                                <?php echo $question->question;?> <br>
                                                <hr>

                                                <div style="display: flex; justify-content:space-between;">
                                                        <div>
                                                                on the article <b><?php echo $question->title;?></b><br>
                                                                <i><?php echo 'on ' . $question->datetime_last_edited;?></i><br><br>
                                                        </div>
                                                        <div>
                                                                <i style="font-size: 14px;">Visit post and reply.</i><br>
                                                                <a class="btn" style="margin-right: 8px; margin-top:3px;" href="<?php echo URLROOT . '/Blog/post?id=' . $question->post_id; ?>">Go To Post</a>
                                                        </div>
                                                        
                                                        
                                                </div>
                                                
                                        </p>
                                </div>
                <?php endforeach;?>
                </div>
        </div>
    </main> 
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>  


<script>
    function confirmDelete(){
    var result = confirm('Are you sure you want to delete this post?');
    if (result == false){
    event.preventDefault();
        }
    }
</script>

<script src="app.js"></script>