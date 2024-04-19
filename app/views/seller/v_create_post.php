<?php
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
            <?php print_r($data); ?>
            <div class="shero1">
                <form class="ddd" action="<?php echo URLROOT ?>/Seller_post/create_post" enctype="multipart/form-data" method="POST">
                    <!-- drop box -->

                    <!-- <div class="imala"> -->
                    <div class="sdropdown1">
                        <label for="Category" class="scdropdown1" name="Category"><b>Item Category:</b></label>
                       <span class="invalid"><?php echo isset($data['Category_err']) ? $data['Category_err'] : ''; ?></span>

                        <br>


                        <!-- <select name="Category" id="sCategory"> -->
                        <!-- <option disabled selected>Select Category</option> -->
                        <select name="Category" id="sCategory">
                            <option disabled selected>Select Category</option>
                            <?php foreach ($data as $category) : ?>
                                <?php if (isset($category['category'])) : ?>
                                    <option value="<?php echo htmlspecialchars($category['category']); ?>"><?php echo htmlspecialchars($category['category']); ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>






                        <!-- </select> -->


                        <!-- <select name="Category" id="sCategory" >

                            <option disabled selected>Select Category</option>
                            
                            <option value= "Vegatable" >Vegatable</option>
                            <option value= "Fruits" >Fruits</option>
                            <option value= "Plants">Plants</option>
                            <option value= "Seeds">Seeds</option>
                            <option value= "Grains">Grains</option>
                            <option value= "Fertilizer" >Fertilizer</option>
                            <option value= "Insecticides" >Insecticides</option>
                            <option value= "Farming Tools">Farming Tools</option>
                        </select> -->

                    </div>



                    <div class="sitem">
                        <label for="Item"><b>Item Name</b></label>
                        <br>
                        <input id="sitem_name" name="Item_name" type="textbox" placeholder="Enter the Item Name" required value="<?php echo $data['Item_name']; ?>"><br />
                        <span class="invalid"><?php echo isset($data['Item_name_err']) ? $data['Item_name_err'] : ''; ?></span>


                    </div>

                    <div class="sstock_size">
                        <div class="iii">
                            <label for="stock"> <b>Unit Size</b></label>
                            <br>
                            <input id="size" name="Unit_size" type="number" step="1" min=0 placeholder="Enter unit size" required value="<?php echo $data['Unit_size']; ?>">
                           <span class="invalid"><?php echo isset($data['Unit_size_err']) ? $data['Unit_size_err'] : ''; ?></span>

                        </div>
                        <div class="sdropdown2">
                            <label for="Category2"><b>Type:</b></label>
                            <br>

                            <!-- <select name="Unit_type" id="stype">
                                <option disabled selected>Select Unit type</option>
                                <option value="Kg">Kg</option>
                                <option value="g">g</option>
                                <option value="plant">Plant</option>
                                <option value="ml">ml</option>
                                <option value="L">L</option>

                            </select> -->



                            <select name="Unit_type" id="stype">
                                <option disabled selected>Select Unit type</option>
                                <?php foreach ($data as $category) : ?>
                                    <?php if (isset($category['type'])) : ?>
                                        <?php $types = explode(',', $category['type']); ?>
                                        <?php foreach ($types as $type) : ?>
                                            <option value="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>







                         <span class="invalid"><?php echo isset($data['Unit_type_err']) ? $data['Unit_type_err'] : ''; ?></span>



                        </div>
                    </div>

                    <div class="sprice">
                        <b>Unit Price</b>
                        <br>
                        <input id="sprice" name="Unit_price" type="number" min=0 placeholder="Enter the Unit Price" required value="<?php echo $data['Unit_price']; ?>">
                       <span class="invalid"><?php echo isset($data['Unit_price_err']) ? $data['Unit_price_err'] : ''; ?></span>


                    </div>

                    <div class="stocksize">
                        <br>
                        <b>Stock Size</b>
                        <br>
                        <input id="Stock" name="Stock_size" type="number" step="1" min=0 placeholder="Enter the Stock Size" required value="<?php echo $data['Stock_size']; ?>">
                        <span class="invalid"><?php echo isset($data['stock_err']) ? $data['stock_err'] : ''; ?></span>


                    </div>




                    <br>
                    <div class="sdate">
                        <b>Exp</b>
                        <br>
                        <input id="se_date" name="Expiry_date" type="date" placeholder="Enter expire date">
                        <span class="invalid"><?php echo isset($data['Expiry_date_err']) ? $data['Expiry_date_err'] : ''; ?></span>


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

                        <span class="invalid"><?php echo isset($data['Expiry_date_err']) ? $data['Expiry_date_err'] : ''; ?></span>

                       <span class="invalid"><?php echo isset($data['Invalid_date_err']) ? $data['Invalid_date_err'] : ''; ?></span>

                    </div>



                    <br>
                    <!-- <div class="saddress">
                        <b>Address</b>
                        <br>
                        <input id="sAddress" name="address" type="textbox" placeholder="Enter the Address Line1">
                        <input id="sAddress" name="address" type="textbox" placeholder="Enter the Address Line2">
                        <input id="sAddress" name="address" type="textbox" placeholder="Enter the Address Line3">
                        <input id="sAddress" name="address" type="textbox" placeholder="Enter the Address Line4">


                    </div> -->

                    <br>
                    <div>




                    </div>

                    <br>
                    <br>

                    <br>

                    <br>
                    <div class="sDescription">
                        <b>Descripition</b>
                        <br>
                        <input id="sdes" name="Description" type="text" placeholder="Enter Descripitiion" required value="<?php echo $data['Description']; ?>">
                     <span class="invalid"><?php echo isset($data['Description_err']) ? $data['Description_err'] : ''; ?></span>

                    </div>






                    <div class="image">
                        <b>Upload image</b>
                        <br>
                        <br>
                        <!-- <input id="inside_imageq" name="Image" type="file" placeholder="Upload the Images">
                    <input id="inside_imageq" name="Image" type="file" placeholder="Upload the Images">
                    <input id="inside_imageq" name="Image" type="file" placeholder="Upload the Images"> -->
                        <input id="inside_imageq" name="Image" type="file" placeholder="Upload the Images">
                    <span class="invalid"><?php echo isset($data['Image_err']) ? $data['Image_err'] : ''; ?></span>

                    </div>


                    <div class="dropdown3">
                        <br>
                        <b>Delivery Method</b>
                        <br>
                        <br>

                        <input type="checkbox" id="Home Delivery" name="Home_Delivery" value="Home Delivery">
                        <label for="Home Delivery"> <b>Home Delivery</b></label><br>


                        <input type="checkbox" id="Instore Pickup" name="Insto_Pickup" value="Instore Pickup">
                        <label for="InstorePickupd"> <b>Insto Pickup</b></label><br>
                      <span class="invalid"><?php echo isset($data['DeliveryMethod_err']) ? $data['DeliveryMethod_err'] : ''; ?></span>





                    </div>








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
                // $(document).ready(function() {
                //     $("#sCategory").on('change', function() {
                //         var el = $(this);
                //         var typeDropdown = $("#stype");

                //         // Clear existing options
                //         typeDropdown.empty();
                //         typeDropdown.val(typeDropdown.find('option:first').val());






                        
                        // if (el.val() === "Vegatable") {
                        //     // Add options for Vegatable
                        //     typeDropdown.append("<option value='Kg'>Kg</option>");
                        //     typeDropdown.append("<option value='g'>g</option>");
                        // } else if (el.val() === "Fruits") {
                        //     // Add options for Fruits
                        //     typeDropdown.append("<option value='Kg'>Kg</option>");
                        //     typeDropdown.append("<option value='g'>g</option>");
                        // } else if (el.val() === "Plants") {
                        //     // Add options for Fruits
                        //     typeDropdown.append("<option value='Plants'>Plants</option>");

                        // } else if (el.val() === "Seeds") {
                        //     // Add options for Fruits
                        //     typeDropdown.append("<option value='Kg'>Kg</option>");
                        //     typeDropdown.append("<option value='g'>g</option>");
                        // } else if (el.val() === "Grains") {
                        //     // Add options for Fruits
                        //     typeDropdown.append("<option value='Kg'>Kg</option>");
                        //     typeDropdown.append("<option value='g'>g</option>");
                        // } else if (el.val() === "Fertilizer") {
                        //     // Add options for Fruits
                        //     typeDropdown.append("<option value='Kg'>Kg</option>");
                        //     typeDropdown.append("<option value='g'>g</option>");
                        //     typeDropdown.append("<option value='L'>L</option>");
                        //     typeDropdown.append("<option value='ml'>ml</option>");

                        // } else if (el.val() === "Insecticides") {
                        //     // Add options for Fruits
                        //     typeDropdown.append("<option value='ml'>ml</option>");
                        //     typeDropdown.append("<option value='l'>l</option>");
                        // }
                        // Add options for other categories if needed

                        // Optionally, you can select the first option
                        // typeDropdown.val(typeDropdown.find('option:first').val());
                    // });
                // });
              
              
     

              
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