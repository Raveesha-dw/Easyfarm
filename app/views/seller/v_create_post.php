<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Store the selected values in session variables
    $_SESSION['selectedCategory'] = $_POST['Category'];
    $_SESSION['selectedUnitType'] = $_POST['Unit_type'];
    $_SESSION['selectedExpiryDate'] = $_POST['Expiry_date'];
}

// Retrieve the selected values from session variables, or use default values if not set
$selectedCategory = isset($_SESSION['selectedCategory']) ? $_SESSION['selectedCategory'] : '';
$selectedUnitType = isset($_SESSION['selectedUnitType']) ? $_SESSION['selectedUnitType'] : '';
$selectedExpiryDate = isset($_SESSION['selectedExpiryDate']) ? $_SESSION['selectedExpiryDate'] : '';


//  require APPROOT . '/views/inc/components/sidebars/seller_sidebar.php'
?>
<div class="headebr">

    <div>
        <?php require APPROOT . '/views/inc/header.php'; ?>
        <?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <div class="container">
        <?php require APPROOT . '/views/seller/a.php' ?>

        <section class="home">
            <!-- <?php print_r($data); ?> -->
            <div class="shero1">
                <form class="ddd" action="<?php echo URLROOT ?>/Seller_post/create_post" enctype="multipart/form-data" method="POST">
                    <br>
                    <div class="sdropdown1">
                        <span class="invalid"><?php echo isset($data['Category_err']) ? $data['Category_err'] : ''; ?></span>

                        <label for="Category" class="scdropdown1" name="Category"><b>Item Category<span class="requiredd"></span></b></label>




                        <!-- <select name="Category" id="sCategory"> -->
                        <!-- <option disabled selected>Select Category</option> -->
                        <select name="Category" id="sCategory">
                            <option disabled>Select Category</option>
                            <?php foreach ($data as $category) : ?>
                                <?php if (isset($category['category'])) : ?>
                                    <option value="<?php echo htmlspecialchars($category['category']); ?>" <?php echo ($category['category'] == $selectedCategory) ? 'selected' : ''; ?>><?php echo htmlspecialchars($category['category']); ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>

                    </div>




                    <div class="sitem">
                        <label for="sitem_name"><b>Item Name</b><span class="requiredd"></span></label>
                        <input id="sitem_name" name="Item_name" type="textbox" placeholder="Enter the Item Name" required value="<?php echo $data['Item_name']; ?>"><br />
                        <span class="invalid"><?php echo isset($data['Item_name_err']) ? $data['Item_name_err'] : ''; ?></span>
                    </div>

                    <br>
                    <div class="sstock_size">
                        <div class="iii">
                            <label for="stock"> <b>Unit Size<span class="requiredd"></span></b></label>

                            <input id="size" name="Unit_size" type="number" step="1" min=0 placeholder="Enter unit size" required value="<?php echo $data['Unit_size']; ?>">
                            <span class="invalid"><?php echo isset($data['Unit_size_err']) ? $data['Unit_size_err'] : ''; ?></span>

                        </div>
                        <div class="sdropdown2">
                            <label for="Category2"><b>Type<span class="requiredd"></span></b></label>






                            <select name="Unit_type" id="stype">
                                <option disabled>Select Unit type</option>
                                <?php foreach ($data as $category) : ?>
                                    <?php if (isset($category['type'])) : ?>
                                        <?php $types = explode(',', $category['type']); ?>
                                        <?php foreach ($types as $type) : ?>
                                            <option value="<?php echo htmlspecialchars($type); ?>" <?php echo ($type == $selectedUnitType) ? 'selected' : ''; ?>><?php echo htmlspecialchars($type); ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>







                            <span class="invalid"><?php echo isset($data['Unit_type_err']) ? $data['Unit_type_err'] : ''; ?></span>



                        </div>
                    </div>
                    <br>
                    <div class="sprice">
                        <b>Unit Price<span class="requiredd"></span></b>

                        <input id="sprice" name="Unit_price" type="number" min=0 placeholder="Enter the Unit Price" required value="<?php echo $data['Unit_price']; ?>">
                        <span class="invalid"><?php echo isset($data['Unit_price_err']) ? $data['Unit_price_err'] : ''; ?></span>


                    </div>
                    <br>

                    <div class="stocksize">
                        <span class="invalid"><?php echo isset($data['stock_err']) ? $data['stock_err'] : ''; ?></span>

                        <br>
                        <b>Stock Size<span class="requiredd"></span></b>
                        <br>
                        <input id="Stock" name="Stock_size" type="number" step="1" min=0 placeholder="Enter the Stock Size" required value="<?php echo $data['Stock_size']; ?>">



                    </div>




                    <br><br>
                    <span class="invalid"><?php echo isset($data['Invalid_date_err']) ? $data['Invalid_date_err'] : ''; ?></span>

                    <span class="invalid"><?php echo isset($data['Expiry_date_err']) ? $data['Expiry_date_err'] : ''; ?></span>
                    <div class="sdate">


                        <b>Expiry Date</b>
                        <br>
                        <!-- Input field for selecting the expiry date -->
                        <input id="se_date" name="Expiry_date" type="date" placeholder="Enter expire date" value="<?php echo htmlspecialchars($selectedExpiryDate); ?>">
                        <!-- Error message for expiry date -->
                        <!-- Error message for invalid date -->
                    </div>



                    <br>



                    <br>
                    <div class="sDescription">
                        <span class="invalid"><?php echo isset($data['Description_err']) ? $data['Description_err'] : ''; ?></span>

                        <label for="additionalReason"><b>Description</b></label>
                        <textarea id="additionalReason" name="Description" rows="4" placeholder="Enter  Description"></textarea>

                    </div>

                    <script>
                        var date = new Date();
                        var tdate = date.getDate();
                        var month = date.getMonth() + 1; //4
                        if (tdate < 10) {
                            tdate = '0' + tdate;
                        }
                        if (month < 10) {
                            month = '0' + month; //0 + 4=4
                        }
                        var year = date.getFullYear();
                        var minDate = year + "-" + month + "-" + tdate;
                        document.getElementById("se_date").setAttribute('min', minDate);
                        // console.log(minDate);
                    </script>


                    <br>


                    <div class="image">
                        <label for="inside_imageq"><b>Upload image<span class="requiredd"></span></b></label>
                        <input id="inside_imageq" name="Image" type="file" placeholder="Upload the Images" required>
                        <span class="invalid"><?php echo isset($data['Image_err']) ? $data['Image_err'] : ''; ?></span>
                    </div>






                    <span class="invalid"><?php echo isset($data['DeliveryMethod_err']) ? $data['DeliveryMethod_err'] : ''; ?></span>

                    <br>


                    <br>
                    <br>

                    <div class="delivery-options">
                        <b>Delivery Method<span class="requiredd"></span></b>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br><br>

                        <div class="option">
                            <input type="checkbox" id="Home_Delivery" name="Home_Delivery" value="Home-Delivery" <?php echo (isset($_POST['Home_Delivery']) && $_POST['Home_Delivery'] == 'Home-Delivery') ? 'checked' : ''; ?>>
                            <label for="Home_Delivery">Home-Delivery</label>
                        </div>
                        <div class="option">
                            <input type="checkbox" id="Instore_Pickup" name="Insto_Pickup" value="Instore Pickup" <?php echo (isset($_POST['Insto_Pickup']) && $_POST['Insto_Pickup'] == 'Instore Pickup') ? 'checked' : ''; ?>>
                            <label for="Instore_Pickup">In-Store-Pickup</label>
                        </div>


                    </div>

                    <br>



                    <div class="s1">
                        <button type="submit" id="create"><b>create</b> </button>
                    </div>






                </form>
            </div>
            <script>
                var categoryData = <?php echo json_encode($data); ?>;
            </script>

            <!-- Your other head elements -->
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
                console.log(categoryData);
                console.log("dd");













                var categoryData = <?php echo json_encode(array_values($data)); ?>;
                console.log("Category Data:", categoryData);

                $(document).ready(function() {
                    $("#sCategory").on('change', function() {
                        var el = $(this);
                        var typeDropdown = $("#stype");

                        // Clear existing options
                        typeDropdown.empty();
                        typeDropdown.val(typeDropdown.find('option:first').val());

                        // Get the selected category value
                        var selectedCategory = el.val();
                        console.log("Selected Category:", selectedCategory);

                        // Check if categoryData is an array
                        if (Array.isArray(categoryData)) {
                            // Find the category in categoryData
                            var selectedCategoryData = categoryData.find(category => category.category === selectedCategory);
                            console.log("Selected Category Data:", selectedCategoryData);

                            // Check if categoryData was found
                            if (selectedCategoryData) {
                                // Check if selectedCategoryData.type is a string
                                if (typeof selectedCategoryData.type === 'string') {
                                    // Split the type string into an array
                                    var units = selectedCategoryData.type.split(',');
                                    console.log("Units:", units);

                                    // Add options for each unit
                                    units.forEach(function(unit) {
                                        typeDropdown.append("<option value='" + unit + "'>" + unit + "</option>");
                                    });
                                } else {
                                    console.error("Type is not a string:", selectedCategoryData.type);
                                }
                            } else {
                                console.error("Category not found:", selectedCategory);
                            }
                        } else {
                            console.error("categoryData is not an array:", categoryData);
                        }
                    });
                });
            </script>

























            </script>
            <?php require APPROOT . '/views/inc/footer.php'; ?>
        </section>

    </div>
</div>