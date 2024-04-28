<?php require APPROOT . '/views/inc/headerAdmin.php';?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="body-container">
    <!--Sidebar-->
    <?php require APPROOT . '/views/inc/components/sidebars/admin_sidebar.php';?>

    <main>
        <h2>Manage Vehicle Categories</h2>
        <hr><br>

        <?php
            $vehicleCategories = $data['vehicleCategories'];
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
                <form action="<?php echo URLROOT;?>/Admin/addVehicleCategory" method="POST">
                    <label for="category">Category Name:  <br><span>(This will be displayed as the category name on the marketplace)</span></label>
                    <input type="text" id="category" name="category" placeholder="Enter new category name" value="<?php echo $newCategory['category']?>"></input><br><br>
                    <input type="submit" value="Add Category">
                </form>
            </div>
        </div>
        <div id="overlay"></div>

        <!-- Show Existing Categories -->
        <table>
            <tr>
                <th>Category Name</th>
                <th>Action</th>
            </tr>

            <?php
                foreach ($vehicleCategories as $index => $vehicleCategory):
            ?>
                    <tr>
                        <td><?php echo $vehicleCategory->Category_name?></td>
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
                                        <form action="<?php echo URLROOT;?>/Admin/editVehicleCategory" method="POST">
                                            <label for="category">Category Name: <br><span>(This will be displayed as the category name on the website)</label>
                                            <input type="text" id="category" name="category" placeholder="Enter new category name" value="<?php echo $vehicleCategory->Category_name?>"></input><br><br>
                                            <input type="hidden" name="category_id" value="<?php echo $vehicleCategory->Category_Id?>">
                                            <button type="submit" class="admin-table">Save Changes</button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Delete Button -->
                                <form action="<?php echo URLROOT?>/Admin/deleteVehicleCategory" onclick="confirmDelete()" method="POST">
                                    <input type="hidden" name="category_id" value="<?php echo $vehicleCategory->Category_Id?>">
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