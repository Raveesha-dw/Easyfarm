<!--Agri Instructor Create Post-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<div class="dashboard d-flex justify-content-between">

    <!--Sidebar-->
    <?php require APPROOT . '/views/inc/components/sidebars/agriInstructor_sidebar.php';?>

    <!--Create Post Form-->
    <div class="create-post-form w-100 mx-auto p-4" style="max-width:700px;">

        <h2>Create New Post</h2><br><br>

        <!-- <div class="create-form w-100 mx-auto p-4" style="max-width:700px;"> -->
        <form action="<?php echo URLROOT?>/AgriInstructor/createpost" method="POST" enctype="multipart/form-data">
            <div class="form-field mb-4">
                <label for="title">Post Title</label>
                <input type="text" class="form-control" name="title" id="" placeholder="Enter post title">
            </div>
            <div class="form-field mb-4">
                <label for="content">Article</label>
                <textarea type="text" class="form-control" name="content" id="" cols="30" rows="10" placeholder="Write your ideas..."></textarea>
            </div>
            <div class="form-field mb-4">
                <label for="image">Choose an image:</label>
                <input type="file" name="image" id="image">
            </div>
            <div class="form-field mb-4">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" name="slug" id="" placeholder="Enter a SEO friendly slug">
            </div>
            
            <input type="hidden" name="date_published" value="<?php echo date('Y-m-d H:i:s'); ?>"></input>
            <input type="hidden" name="author" value="<?php echo $_SESSION['user_ID']; ?>"></input>
            <div class="form-field">
                <input type="submit" class=" btn btn-primary" value="Publish" name="create">
            </div>
        </form>
        <!-- </div> -->

    </div>

</div>
