<?php require APPROOT . '/views/inc/headerAdmin.php';?>

<div class="body-container">
    <!--Sidebar-->
    <?php require APPROOT . '/views/inc/components/sidebars/admin_sidebar.php';?>

    <main>
        <h2>Manage Marketplace Categories</h2>
        <hr><br>

        <?php
            $marketplaceCategories = $data['marketplaceCategories'];
            $newCategory = $data['newCategory'];
        ?>

        
        <!-- Add New Category -->
        <button data-modal-target="#add-category">+ Add New Category</button>
        <!-- Form -->
        <div class="modal" id="add-category">
            <div class="modal-header">
                <div class="title">Add New Category</div>
                <button data-close-button class="close-button">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?php echo URLROOT;?>/Admin/addMarketplaceCategory" method="POST">
                    <label for="category">Category Name:  <br><span>(This will be displayed as the category name on the marketplace)</span></label>
                    <input type="text" id="category" name="category" placeholder="Enter new category name" value="<?php echo $newCategory['category']?>"></input><br><br>
                    <label for="units">Units: <br><span>(Enter units separated by commas.)</span></label><br>
                    <input type="text" id="units" name="units" placeholder="E.g.: Kg, g" value="<?php echo $newCategory['units']?>"></input><br><br>
                    <input type="submit" value="Add Category">
                </form>
            </div>
        </div>
        <div id="overlay"></div>

        <!-- Show Existing Categories -->
        <table>
            <tr>
                <th>Category Name</th>
                <th>Units</th>
                <th>Action</th>
            </tr>

            <?php
                foreach ($marketplaceCategories as $index => $marketplaceCategory):
            ?>
                    <tr>
                        <td><?php echo $marketplaceCategory->category?></td>
                        <td><?php echo $marketplaceCategory->type?></td>
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
                                        <form action="<?php echo URLROOT;?>/Admin/editMarketplaceCategory" method="POST">
                                            <label for="category">Category Name: <br><span>(This will be displayed as the category name on the marketplace)</label>
                                            <input type="text" id="category" name="category" placeholder="Enter new category name" value="<?php echo $marketplaceCategory->category?>"></input><br><br>
                                            <label for="units">Units: <br><span>(Enter units separated by commas.)</span></label><br>
                                            <input type="text" id="units" name="units" placeholder="E.g.: Kg, g" value="<?php echo $marketplaceCategory->type?>"></input><br><br>
                                            <input type="hidden" name="category_id" value="<?php echo $marketplaceCategory->category_id?>">
                                            <button type="submit" class="admin-table">Save Changes</button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Delete Button -->
                                <form action="<?php echo URLROOT?>/Admin/deleteMarketplaceCategory" onclick="confirmDelete()" method="POST">
                                    <input type="hidden" name="category_id" value="<?php echo $marketplaceCategory->category_id?>">
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