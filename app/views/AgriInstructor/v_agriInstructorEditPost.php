<!--Agri Instructor Edit Post-->

<?php
    $post = $data['post'];
    $categories = $data['categories'];
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<div class="body-container">
    <!--Sidebar-->
    <?php require APPROOT . '/views/inc/components/sidebars/agriInstructor_sidebar2.php';?>

    <!--Edit Post Form-->
    <main>
        <div class="create-post-form w-100 mx-auto p-4" style="max-width:700px;">

            <h2>Edit Post</h2><hr><br><br>

            <!-- <div class="create-form w-100 mx-auto p-4" style="max-width:700px;"> -->
            <form action="<?php echo URLROOT?>/AgriInstructor/updatepost" method="POST">

                <div class="form-field mb-4">
                    <label for="title">Post Title</label>
                    <input type="text" class="form-control" name="title" id="" placeholder="Enter post title" required value="<?php echo $post->title;?>"></input>
                </div>

                <div class="form-field mb-4">
                    <label for="category">Category:</label>
                    <select name="category" id="category">
                        <?php foreach($categories as $category):?>
                            <option value="<?php echo $category->permalink;?>" <?php if($category->permalink == $post->category): echo "selected"; endif;?>><?php echo $category->category;?></option>
                        <?php endforeach;?>
                    </select>
                </div>

                <div class="form-field mb-4">
                    <label for="content">Article</label>
                    <textarea type="text" class="form-control" name="content" id="" cols="30" rows="10" placeholder="Write your ideas..." required><?php echo $post->content;?></textarea>
                </div>
                
                <input type="hidden" name="date_updated" value="<?php echo date("Y/m/d"); ?>"></input>
                <input type="hidden" name="post_id" value="<?php echo $post->post_id; ?>"></input>
                <!-- <input type="hidden" name="author" value="<?php echo $_SESSION['user_ID']; ?>"></input> -->

                <div class="form-field">
                    <input type="submit" class=" btn btn-primary" value="Update & Publish" name="create">
                </div>
            </form>
            <!-- </div> -->

        </div>
    </main>
</div>

