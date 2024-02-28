<?php require APPROOT . '/views/inc/headerBlog.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/navbar.php'; ?>

<!-- Version 1.0 -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<div class="blog-post-container mt-5">
    <div class="container">
        <?php
            // $posts = $data;
            // foreach ($posts as $post):
        ?>
        <div class="row mb-4 p-5 bg-light">
            <div class="col-sm-2">
                <?php //echo $post->date_published; ?>
            </div>
            <div class="col-sm-3">
                <h2> <?php //echo $post->title; ?></h2>
            </div>
            <div class="col-sm-5">
                <?php //echo $post->content; ?>
            </div>
            <div class="col-sm-2">
                <form action="Blog/posts" method="POST">
                    <input type="hidden" name="id" value="<?php //echo $post->id;?>">
                    <input type="hidden" name="title" value="<?php //echo $post->title;?>">
                    <input type="hidden" name="content" value="<?php //echo $post->content;?>">
                    <input type="hidden" name="date_published" value="<?php //echo $post->date_published;?>">
                    <input type="submit" class="btn btn-primary" value="Read More" name="readmore">
                </form>
                <a href="<?php //echo URLROOT . '/Blog/posts/' . $post->id;?>" class="btn btn-primary">READ MORE</a>
            </div>
        </div>
        <?php //endforeach;?>
    </div>
</div> -->



<!-- Version 2.0 -->


<style>
    /* @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap'); */
</style>


<section class="cover" id="cover">
    <!-- <div class="btn-dashboard">
        <a href="<?php echo URLROOT . '/AgriInstructor/manageposts' ?>" ><h5 class="btn-dashboard"><i class="bx bxs-tachometer"></i>  Dashboard</h5></a>
    </div> -->
    <div class="cover-text container">
        <h2 class="cover-title">Easyfarm Blog<br></h2>
        <span class="cover-subtitle"><br>.     Get Ideas from Agriculture Experts!</span>
    </div>
</section>

<!-- Blog Container -->
<section class="blog-container1">

    <!-- Main Container -->
    <div class="blog-main-container">

        <?php
            $posts = $data['posts'];
            $categories = $data['categories'];

            foreach ($posts as $post):
        ?>

        <!-- Box -->
        <div class="blog-box">

            <div class="border-rounded">

                <div class="blog-img">
                    <img src="data:image/jpeg;base64,<?php echo $post->image; ?>" alt="Blog img">
                </div>

                <div class="blog-text">
                    <span>On <?php echo $post->date_published; ?></span>
                    <a href="#" class="blog-title"><?php echo $post->title; ?></a>
                    <p><?php echo $post->content; ?></p>

                    <!-- <form action="Blog/posts" method="POST">
                        <input type="hidden" name="id" value="<?php echo $post->id;?>">
                        <input type="hidden" name="title" value="<?php echo $post->title;?>">
                        <input type="hidden" name="content" value="<?php echo $post->content;?>">
                        <input type="hidden" name="date_published" value="<?php echo $post->date_published;?>">
                        <input type="hidden" name="image" value="<?php echo $post->image;?>">
                        <input type="submit" class="btn-read-more" value="Read More" name="readmore">
                    </form> -->

                    <form action="<?php echo URLROOT . '/Blog/post' ?>" method="GET">
                        <input type="hidden" name="id" value="<?php echo $post->post_id;?>">
                        <input type="submit" class="btn-read-more" value="Read More">
                    </form>
                </div>
            </div>
        </div>

        <?php endforeach;?>

        <!-- Box 3 -->
        <!-- <div class="blog-box">

            <div class="blog-img">
                <img src="images/blog1.jpg" alt="Blog img">
            </div>

            <div class="blog-text">
                <span>30th December 2023 / Agriculture</span>
                <a href="#" class="blog-title">Blog post title here</a>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt enim accusantium vel reprehenderit eum laboriosam optio in quisquam soluta aliquid nostrum animi delectus facere libero, eaque blanditiis? Minima, iusto! Et!</p>
                <a href="#">Read More</a>
            </div>
        </div> -->

    </div>



    <!-- Sidebar -->
    <div class="blog-sidebar-container">

        <!-- Widget Categories -->
        <div class="widget border-rounded">
            <div class="widget-header">
                <h3 class="widget-title">Explore Topics</h3>
                <!-- <img src="images/wave.svg" class="wave" alt="wave"/> -->
            </div>
            <div class="widget-content">
                <ul class="list">
                    <?php foreach ($categories as $category): ?>
                        <li><a href="<?php echo URLROOT . '/Blog/category?ctg=' . trim($category->permalink) ?>"><?php echo $category->category; ?></a><!--<span>(5)</span>--></li>
                    <?php endforeach;?>
                </ul>
            </div> 
        </div>

    </div>

</section>