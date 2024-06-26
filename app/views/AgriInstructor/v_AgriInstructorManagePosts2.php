<?php require APPROOT . '/views/inc/headerBlog.php'; ?>
<?php require APPROOT . '/views/inc/header.php'; ?> 
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="body-container">
   <!--Sidebar-->
    <?php require APPROOT . '/views/inc/components/sidebars/agriInstructor_sidebar2.php';?>

    <main>

        <h2 style="font-size:x-large;">Manage Posts</h2>
        <hr>

        <!-- Posts -->
        <section class="blog-container">

            <?php
                $posts = $data;
                foreach ($posts as $post):
            ?>

            <!-- Box -->
            <div class="blog-box-2">

                <div class="blog-img">
                    <img src="data:image/jpeg;base64,<?php echo $post->image; ?>" alt="Blog img">
                </div>

                <div class="blog-text">
                    <span><?php echo $post->date_published; ?> </span>
                    <a href="#" class="blog-title"><?php echo $post->title; ?></a>
                    <p><?php echo $post->content; ?></p>

                    <!-- <form action="<?php //echo URLROOT . '/Blog/posts' ?>" method="POST">
                        <input type="hidden" name="id" value="<?php //echo $post->post_id;?>">
                        <input type="hidden" name="title" value="<?php //echo $post->title;?>">
                        <input type="hidden" name="content" value="<?php //echo $post->content;?>">
                        <input type="hidden" name="date_published" value="<?php //echo $post->date_published;?>">
                        <input type="hidden" name="image" value="<?php //echo $post->image;?>">
                        <input type="submit" class="btn-read-more" value="Read More" name="readmore">
                    </form> -->

                    <!-- View Button -->
                    <div style="display: flex;">
                        <form action="<?php echo URLROOT . '/Blog/post' ?>" method="GET">
                            <input type="hidden" name="id" value="<?php echo $post->post_id;?>">
                            <!-- <input type="submit" class="btn-read-more" value="View"> -->
                            <button type="submit" class="btn" style="padding: 4px 10px;">View</button>
                        </form>

                        <!-- Edit Button -->
                        <form action="<?php echo URLROOT?>/AgriInstructor/editpost" method='GET'>
                            <input type="hidden" name="id" value="<?php echo $post->post_id;?>">
                            <!-- <input type="submit" class="btn-read-more" value="Edit"> -->
                            <button type="submit" class="btn" style="padding: 4px 10px;">Edit</button>
                        </form>

                        <!-- Delete Button -->
                        <form action="<?php echo URLROOT?>/AgriInstructor/deletepost" onclick="confirmDelete()" method='POST'>
                            <input type="hidden" name="id" value="<?php echo $post->post_id;?>">
                            <!-- <input type="submit" class="btn-read-more" value="Delete"> -->
                            <button type="submit" class="btn" style="padding: 4px 10px;">Delete</button>
                        </form>
                    </div>
                </div>
            </div>

            <?php endforeach;?>

        </section>
    </main> 
</div>




<script>
    function confirmDelete(){
    var result = confirm('Are you sure you want to delete this post?');
    if (result == false){
    event.preventDefault();
        }
    }
</script>

<script src="app.js"></script>