<?php require APPROOT . '/views/inc/headerBlog.php'; ?>
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="container">
        <h2 style="font-size:x-large;">Agri-Q&A : Expert Insights</h2>
        <span>Answers to your questions by agri instructors </span>
        <hr>

        <div class="container">
                <div class="comment-section bg-light p-4 mt-5">

                <?php
                        $answers = $data;
                        foreach ($answers as $answer):
                ?>

                                <div class="comment-card"> 
                                        <p>
                                                <b><?php echo $answer->Name;?></b> replied to you, <br><br>
                                                <?php echo $answer->answer;?> <br>

                                                <div class="comment-card">
                                                        <i style="font-size: 16px;"><b><?php echo $_SESSION['user_name'];?></b> asks, </i><br>
                                                        <i style="font-size: 15px;"><?php echo $answer->question;?></i> 
                                                </div>
                                                <hr>

                                                <div style="display: flex; justify-content:space-between;">
                                                        <div>
                                                                on the article <a href="<?php echo URLROOT . '/Blog/post?id=' . $answer->post_id; ?>"><b><?php echo $answer->title;?></b></a><br>
                                                                <i><?php echo 'on ' . $answer->answer_datetime_edited;?></i>
                                                        </div>
                                                        <div>
                                                                <a href="<?php echo URLROOT . '/Blog/post?id=' . $answer->post_id; ?>">
                                                                        <button class="btn" style="margin-right: 8px; margin-top:3px;" >Visit Article</button>
                                                                </a>
                                                        </div>    
                                                </div>
                                                
                                        </p>
                                </div>
                <?php endforeach;?>
                </div>
        </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>  