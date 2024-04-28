<?php require APPROOT . '/views/inc/headerAdmin.php';?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

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
                    <label for="category">Category Name:  <br><span><i>(This will be displayed as the category name on the marketplace.)</i></span></label>
                    <input type="text" id="category" name="category" placeholder="Enter new category name" value="<?php echo $newCategory['category']?>" required></input><br><br>
                    
                    <label for="units">Units: <br><span><i>(Enter units separated by commas.)</i></span></label>
                    <input type="text" id="units" name="units" placeholder="E.g: Kg, g" value="<?php echo $newCategory['units']?>" required></input><br><br>                    

                    <label for="deliveryMethod">Select Delivery Method:</label>
                    <select name="deliveryMethod" id="deliveryMethod" required>
                        <option value="both">Home-Delivery & In-Store Pickup</option>
                        <option value="insto_pickup">In-Store Pickup Only</option>
                    </select>
                    <br><br>
                    
                    <div style="display: flex;">
                        <input type="checkbox" id="isExpDate" name="isExpDate" value="yes">
                        <label for="isExpDate">&MediumSpace; Producs in this category have an expiry date.</label>
                    </div>
                    <br>

                    <label for="fontAwsome">Font awsome code: <br><span><i>(This will be displayed on the marketplace homepage.)</i></label>
                    <input type="text" id="fontAwsome" name="fontAwsome" placeholder="E.g: fa-fruit" value="<?php echo $newCategory['fontAwsome']?>" required></input><br>

                    <br>
                    <button type="submit" class="admin-table">Add Category</button>
                </form>
            </div>
        </div>
        <div id="overlay"></div>

        <!-- Show Existing Categories -->
        <table>
            <tr>
                <th>Category Name</th>
                <th>Units</th>
                <th>Delivery Method</th>
                <th>Has Expiry Date?</th>
                <th>Font Awsome Code</th>
                <th>Action</th>
            </tr>

            <?php
                foreach ($marketplaceCategories as $index => $marketplaceCategory):
            ?>
                    <tr>
                        <td><?php echo $marketplaceCategory->category?></td>
                        <td><?php echo $marketplaceCategory->type?></td>
                        <td><?php 
                                switch($marketplaceCategory->delivery){
                                    case 'both':
                                        echo 'Home-Delivery & In-Store Pickup';
                                        break;
                                    case 'insto_pickup':
                                        echo 'In-Store Pickup Only';
                                        break;
                                }
                            ?>
                        </td>
                        <td><?php echo ucfirst($marketplaceCategory->date)?></td>
                        <td><?php echo $marketplaceCategory->icon?></td>
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
                                            <label for="category">Category Name: <br><span><i>(This will be displayed as the category name on the marketplace.)</i></label>
                                            <input type="text" id="category" name="category" placeholder="Enter new category name" value="<?php echo $marketplaceCategory->category?>"></input><br><br>
                                            
                                            <label for="units">Units: <br><span><i>(Enter units separated by commas.)</i></span></label>
                                            <input type="text" id="units" name="units" placeholder="E.g.: Kg, g" value="<?php echo $marketplaceCategory->type?>"></input><br><br>
                                            
                                            <label for="deliveryMethod">Select Delivery Method:</label>
                                            <select name="deliveryMethod" id="deliveryMethod" value="<?php echo $marketplaceCategory->delivery?>" required>
                                                <option value="both" <?php if($marketplaceCategory->delivery == "both") echo "selected";?>>Home-Delivery & In-Store Pickup</option>
                                                <option value="insto_pickup" <?php if($marketplaceCategory->delivery == "insto_pickup") echo "selected";?>>In-Store Pickup Only</option>
                                            </select>
                                            <br><br>

                                            <div style="display: flex;">
                                                <input type="checkbox" id="isExpDate" name="isExpDate" value="yes" <?php echo ($marketplaceCategory->date == 'yes' ? 'checked' : ''); ?>>
                                                <label for="isExpDate">&MediumSpace; Producs in this category have an expiry date.</label>
                                            </div>
                                            <br>

                                            <label for="fontAwsome">Font awsome code: <br><span><i>(This will be displayed on the marketplace homepage.)</i></label>
                                            <input type="text" id="fontAwsome" name="fontAwsome" placeholder="E.g: fa-fruit" value="<?php echo $marketplaceCategory->icon?>" ></input><br><br>

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