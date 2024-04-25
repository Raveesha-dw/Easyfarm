<?php require APPROOT . '/views/inc/headerAdmin.php';?>

<div class="body-container">
    <!--Sidebar-->
    <?php require APPROOT . '/views/inc/components/sidebars/admin_sidebar.php';?>

    <main>
        <h2>Manage Blog Categories</h2>
        <hr><br>

        <?php
            $blogCategories = $data['blogCategories'];
            $newCategory = $data['newCategory'];
        ?>


        
        <!-- Add New Category -->
        <button data-modal-target="#add-category">+ Add New Category</button>

        <div class="modal" id="add-category">
            <div class="modal-header">
                <div class="title">Add New Category</div>
                <button data-close-button class="close-button">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?php echo URLROOT;?>/Admin/addBlogCategory" method="POST">
                    <label for="category">Category Name: <br><span>(This will be displayed as the category name on the blog)</span></label>
                    <input type="text" id="category" name="category" placeholder="Enter new category name" value="<?php echo $newCategory['category']?>"></input><br><br>
                    <label for="permalink">Permalink: <br><span>(This should be unique and will be used to identify the category. Also this will be displayed in the URL)</span></label><br>
                    <input type="text" id="permalink" name="permalink" placeholder="Enter a suitable and unique permalink" value="<?php echo $newCategory['permalink']?>"></input><br><br>
                    <input type="submit" class="admin-table" value="Add Category">
                </form>
            </div>
        </div>
        <div id="overlay"></div>



        <!-- Show Existing Categories -->
        <table>
            <tr>
                <th>Category Name</th>
                <th>Permalink</th>
                <th>Action</th>
            </tr>

            <?php 
                foreach ($blogCategories as $index => $blogCategory):
            ?>
                    <tr>
                        <td><?php echo $blogCategory->category ?></td>
                        <td><?php echo $blogCategory->permalink ?></td>
                        <td>
                            <div class="btn-container">
                                <!-- Edit Form -->
                                <button data-modal-target="#edit-category-<?php echo $index ?>" class="admin-table">Edit</button>
                                <div class="modal" id="edit-category-<?php echo $index ?>">
                                    <div class="modal-header">
                                        <div class="title">Edit Category</div>
                                        <button data-close-button class="close-button">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo URLROOT;?>/Admin/editBlogCategory" method="POST">
                                            <label for="category">Category Name: <br><span>(This will be displayed as the category name on the blog)</span></label>
                                            <input type="text" id="category" name="category" placeholder="Enter new category name" value="<?php echo $blogCategory->category ?>"></input><br><br>
                                            <input type="hidden" name="permalink" value="<?php echo $blogCategory->permalink?>">
                                            <button type="submit" class="admin-table">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                                
                                <!-- Delete Button -->
                                <form action="<?php echo URLROOT?>/Admin/deleteBlogCategory" onclick="confirmDelete()" method="POST">
                                    <input type="hidden" name="permalink" value="<?php echo $blogCategory->permalink?>">
                                    <button class="admin-table" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
            <?php 
                endforeach; 
            ?>
        </table>

    </main>
</div>


<script>
    function confirmDelete(){
    var result = confirm('Are you sure you want to delete this category?');
    if (result == false){
    event.preventDefault();
        }
    }
</script>

<script src="<?php echo URLROOT . '/public/js/popupModal.js';?>"></script>