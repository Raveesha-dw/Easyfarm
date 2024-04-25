<!-- <?php print_r($data) ?> -->

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


    <div class="container">

        <?php require APPROOT . '/views/seller/a.php' ?>

        <section class="home">
            <!-- <?php print_r($data) ?> -->


            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

            <div class="shero1">
                <?php $dat = $data; ?>
                <form class="ddd" action="<?php echo URLROOT ?>/Seller_post/updatepost" enctype="multipart/form-data" method="POST">
                    <!-- drop box -->
                    <input type="hidden" name="Item_Id" value=<?php echo $data['Item_Id'] ?>>

                    <div class="sdropdown1">
                        <label for="sCategory" class="scdropdown1" name="Category"><b>Item Category<span class="requiredd"></span></b></label>
                        <span class="invalid"><?php if ($data) {
                                                    echo $data['Category_err'];
                                                } ?></span>



                        <select name="Category" id="sCategory">
                            <option disabled>Select Category</option>
                            <?php foreach ($data as $categoryObject) : ?>
                                <?php if (isset($categoryObject->category)) : ?>
                                    <?php
                                    $category = $categoryObject->category;
                                    ?>
                                    <option value="<?php echo htmlspecialchars($category); ?>" <?php echo ($category === $data['Category']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($category); ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>


                    </div>




                    <div class="sitem">
                        <label for="Item"><b>Item Name<span class="requiredd"></span></b></label>

                        <input id="sitem_name" name="Item_name" type="textbox" placeholder="Enter the Item Name" value="<?php print_r($dat['Item_name']) ?>"><br />
                        <span class="invalid"><?php if ($data) {
                                                    echo $data['Item_name_err'];
                                                } ?></span>

                    </div>
                    <br>

                    <div class="sstock_size">
                        <div class="iii">
                            <label for="stock"> <b>Unit Size<span class="requiredd"></span></b></label>

                            <input id="size" name="Unit_size" type="number" step="1" min=0 placeholder="Enter unit size" value="<?php print_r($dat['Unit_size']) ?>">
                            <span class="invalid"><?php if ($data) {
                                                        echo $data['Unit_size_err'];
                                                    }  ?></span>
                        </div>
                        <div class="sdropdown2">
                            <label for="stype"><b>Type<span class="requiredd"></span></b></label>

                            <select name="Unit_type" id="stype">
                                <option disabled>Select Unit type</option>
                                <?php foreach ($data as $categoryObject) : ?>
                                    <?php if (isset($categoryObject->type)) : ?>
                                        <?php
                                        $types = explode(',', $categoryObject->type);
                                        ?>
                                        <?php foreach ($types as $type) : ?>
                                            <option value="<?php echo htmlspecialchars($type); ?>" <?php echo ($type === $data['Unit_type']) ? 'selected' : ''; ?>>
                                                <?php echo htmlspecialchars($type); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>

                            <span class="invalid"><?php if ($data) {
                                                        echo $data['Unit_type_err'];
                                                    } ?></span>
                        </div>

                    </div>

                    <div class="sprice">
                        <b>Unit Price<span class="requiredd"></span></b>
                        <br>
                        <input id="sprice" name="Unit_price" type="number" min=0 placeholder="Enter the Unit Price" value="<?php print_r($dat['Unit_price']) ?>">
                        <span class="invalid"><?php if ($data) {
                                                    echo $data['Unit_price_err'];
                                                }  ?></span>

                    </div>

                    <div class="stocksize">
                        <br>
                        <b>Stock Size<span class="requiredd"></span></b>
                        <br>
                        <input id="Stock" name="Stock_size" type="number" step="1" min=0 placeholder="Enter the Stock Size" value="<?php print_r($dat['Stock_size']) ?>">
                        <span class="invalid"><?php if ($data) {
                                                    echo $data['Stock_size_err'];
                                                }  ?></span>

                    </div>




                    <br>
                    <!-- Your HTML content -->
                    <div class="sdate" id="datt">
                        <span class="invalid"><?php echo isset($data['Invalid_date_err']) ? $data['Invalid_date_err'] : ''; ?></span>
                        <span class="invalid"><?php echo isset($data['Expiry_date_err']) ? $data['Expiry_date_err'] : ''; ?></span>
                        <br>
                        <b>Expiry Date</b>
                        <br>
                        <!-- Input field for selecting the expiry date -->
                        <input id="se_date" name="Expiry_date" type="date" placeholder="Enter expire date" value="<?php print_r($dat['Expiry_date']) ?>">
                    </div>
                    <script>
                        $(document).ready(function() {
                            // Get the input element
                            var expiryDateInput = document.getElementById('se_date');

                            // Set the minimum value to today's date
                            expiryDateInput.min = new Date().toISOString().split("T")[0];
                        });
                    </script>

                    <!-- Your JavaScript -->
                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            // Define the category data obtained from PHP
                            var categoryData = <?php echo json_encode(array_values($data)); ?>;

                            // Function to show or hide the expiry date input based on the selected category
                            function showDate(selectedCategory) {
                                // Find the selected category data in the array
                                var selectedCategoryData = categoryData.find(function(category) {
                                    return category.category === selectedCategory;
                                });

                                // Check if the selected category data exists
                                if (selectedCategoryData) {
                                    // Check the delivery method of the selected category
                                    var datee = selectedCategoryData.date;
                                    if (datee === 'yes') {
                                        // Show expiry date input
                                        $('#datt').show();
                                    } else {
                                        // Hide expiry date input
                                        $('#datt').hide();
                                        $('#se_date').val('');
                                    }
                                }
                            }

                            // Event listener for the category dropdown change
                            $("#sCategory").on('change', function() {
                                var selectedCategory = $(this).val();
                                showDate(selectedCategory);
                            });

                            // Initialize the expiry date input based on the default selected category
                            var defaultCategory = $("#sCategory").val();
                            showDate(defaultCategory);
                        });
                    </script>



                    <br>
                    <br>
                    <!-- <div class="sDescription">
                        <b>Descripition</b>
                        <br>
                        <input id="sdes" name="Description" type="text" placeholder="Enter Descripitiion" value="<?php print_r($dat['Description']) ?>">
                        <span class="invalid"><?php if ($data) {
                                                    echo $data['Description_err'];
                                                }  ?></span>
                    </div> -->

                    <div class="sDescription">
                        <!-- <span class="invalid"><?php echo isset($data['Description_err']) ? $data['Description_err'] : ''; ?></span> -->

                        <label for="additionalReason"><b>Description</b></label>
                        <textarea id="additionalReason" name="Description" rows="4" placeholder="Enter Description"><?php echo isset($data['Description']) ? $data['Description'] : ''; ?></textarea>
                    </div>





                    <div class="image">

                        <!-- <br> -->
                        <!-- <br> -->

                        <label for="inside_imageq"><b>Upload image<span class="requiredd"></span></b></label>
                        <input id="inside_imageq" name="Image" type="file" placeholder="Upload the Images" required>
                        <span class="invalid"><?php echo isset($data['Image_err']) ? $data['Image_err'] : ''; ?></span>
                    </div>





                    <div class="dropdown3">
                        <br>

                        <br>
                        <br>

                        <div class="delivery-options">
                            <br><br>
                            <br><br>
                            <b>Delivery Method<span class="requiredd"></span></b>
                            <br><br>

                            <?php
                            // Assuming $data['DeliveryMethod'] contains "Home Delivery, Insto Pickup"
                            $deliveryMethods = explode(', ', $data['DeliveryMethod']);
                        //   print_r($deliveryMethods) ;

                            // in_array('Home Delivery', $deliveryMethods): This function checks if the value 'Home Delivery' exists in the array $deliveryMethods. If it does, it returns true; otherwise, it returns false
                            $homeDeliveryChecked = in_array('Home-Delivery', $deliveryMethods) ? 'checked' : '';
                            $instoPickupChecked = in_array('Insto Pickup', $deliveryMethods) ? 'checked' : '';
                            // print_r($instoPickupChecked);
                            ?>
                            <!-- hideen value -->

                            <div id="Home_Delivery" style="<?php echo $homeDeliveryChecked ? '' : 'display:none;'; ?>">
                                <input type="checkbox" id="Home_Delivery" name="Home_Delivery" value="Home Delivery" <?php echo $homeDeliveryChecked; ?>>
                                <label for="Home_Delivery">Home Delivery</label>
                            </div>

                            <div id="Instore_Pickup" style="<?php echo $instoPickupChecked ? '' : 'display:none;'; ?>">
                                <input type="checkbox" id="Insto_Pickup" name="Insto_Pickup" value="Insto Pickup" <?php echo $instoPickupChecked; ?>>
                                <label for="Insto_Pickup">In-store Pickup</label><br>
                            </div>

                            <span class="invalid"><?php echo isset($data['DeliveryMethod_err']) ? $data['DeliveryMethod_err'] : ''; ?></span>
                        </div>

                        <script>
                            $(document).ready(function() {
                                // Define the category data obtained from PHP
                                var categoryData = <?php echo json_encode(array_values($data)); ?>;

                                // Function to show delivery options based on the selected category
                                function showDeliveryOptions(selectedCategory) {
                                    // Find the selected category data in the array
                                    var selectedCategoryData = categoryData.find(function(category) {
                                        return category.category === selectedCategory;
                                    });

                                    // Check if the selected category data exists
                                    if (selectedCategoryData) {
                                        // Check the delivery method of the selected category
                                        var deliveryMethod = selectedCategoryData.delivery;
                                        if (deliveryMethod === 'home_delivery') {
                                            // Show home delivery option
                                            $('#Insto_Pickup').hide().find(':checkbox').prop('checked', false);
                                            $('#Home_Delivery').show();
                                            

                                        } else if (deliveryMethod === 'insto_pickup') {
                                            // Show in-store pickup option
                                            $('#Home_Delivery').hide().find(':checkbox').prop('checked', false);
                                            // $('#Home_Delivery').hide();
                                            $('#Instore_Pickup').show();

                                        } else if (deliveryMethod === 'both') {
                                            // Show both options
                                            $('#Home_Delivery').show();
                                            $('#Instore_Pickup').show();
                                        }
                                    }
                                }

                                // Event listener for the category dropdown change
                                $("#sCategory").on('change', function() {
                                    var selectedCategory = $(this).val();
                                    showDeliveryOptions(selectedCategory);
                                });

                                // Initialize the delivery options based on the default selected category
                                var defaultCategory = $("#sCategory").val();
                                showDeliveryOptions(defaultCategory);
                            });
                        </script>
                    </div>








                    <div class="s1">
                        <button type="submit" id="create"><b>update</b> </button>
                    </div>


            </div>



            </form>
            <?php require APPROOT . '/views/inc/footer.php'; ?>
    </div>







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




    </section>

</div>
</div>