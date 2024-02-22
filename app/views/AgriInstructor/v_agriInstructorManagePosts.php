<!--Agri Instructor Manage Post-->

<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap');
</style>

<!-- Dashboard -->
<!-- <main> -->
<div class="dashboard d-flex justify-content-between">

    <!--Sidebar-->
    <?php require APPROOT . '/views/inc/components/sidebars/agriInstructor_sidebar2.php';?>

    <!-- Posts -->
    <section class="blog-container">

        <?php
            $posts = $data;
            foreach ($posts as $post):
        ?>

        <!-- Box -->
        <div class="blog-box">

            <div class="blog-img">
                <img src="data:image/jpeg;base64,<?php echo $post->image; ?>" alt="Blog img">
            </div>

            <div class="blog-text">
                <span><?php echo $post->date_published; ?> / Agriculture</span>
                <a href="#" class="blog-title"><?php echo $post->title; ?></a>
                <p><?php echo $post->content; ?></p>

                <!-- <form action="<?php echo URLROOT . '/Blog/posts' ?>" method="POST">
                    <input type="hidden" name="id" value="<?php echo $post->post_id;?>">
                    <input type="hidden" name="title" value="<?php echo $post->title;?>">
                    <input type="hidden" name="content" value="<?php echo $post->content;?>">
                    <input type="hidden" name="date_published" value="<?php echo $post->date_published;?>">
                    <input type="hidden" name="image" value="<?php echo $post->image;?>">
                    <input type="submit" class="btn-read-more" value="Read More" name="readmore">
                </form> -->

                <!-- View Button -->
                <form action="<?php echo URLROOT . '/Blog/post' ?>" method="GET">
                    <input type="hidden" name="id" value="<?php echo $post->post_id;?>">
                    <input type="submit" class="btn-read-more" value="View">
                </form>

                <!-- Edit Button -->
                <form action="<?php echo URLROOT?>/AgriInstructor/editpost" method='GET'>
                    <input type="hidden" name="id" value="<?php echo $post->post_id;?>">
                    <input type="submit" class="btn-read-more" value="Edit">
                </form>

                <!-- Delete Button -->
                <form action="<?php echo URLROOT?>/AgriInstructor/deletepost" onclick="confirmDelete()" method='POST'>
                    <input type="hidden" name="id" value="<?php echo $post->post_id;?>">
                    <input type="submit" class="btn-read-more" value="Delete">
                </form>
            </div>
        </div>

        <?php endforeach;?>

    </section>

</div>
<!-- </main> -->

<script>
    function confirmDelete(){
    var result = confirm('Are you sure you want to delete this post?');
    if (result == false){
    event.preventDefault();
        }
    }
</script>

<!-- </body> -->