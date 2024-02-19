<div class="headebr">
    <div>
        <?php require APPROOT . '/views/inc/header.php'; ?>
        <?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
    </div>


    <div class="container">

        <?php require APPROOT . '/views/seller/a.php' ?>

        <section class="home">


            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

            <div class="shero1">
                <?php $dat = $data; ?>
                <form class="ddd" action="<?php echo URLROOT ?>/Seller_post/updatepost" enctype="multipart/form-data" method="POST">
                    <!-- drop box -->
                    <input type="hidden" name="Item_Id" value=<?php echo $data['Item_Id'] ?>>

                    <div class="sdropdown1">
                        <label for="sCategory" class="scdropdown1" name="Category"><b>Item Category:</b></label>
                        <span class="invalid"><?php if ($data) {
                                                    echo $data['Category_err'];
                                                } ?></span>
                        <br>
                        <select name="Category" id="sCategory">
                            <option disabled selected>Select Category</option>
                            <option value="Vegatable" <?php echo ($data['Category'] == 'Vegatable') ? 'selected' : ''; ?>>Vegatable</option>
                            <option value="Fruits" <?php echo ($data['Category'] == 'Fruits') ? 'selected' : ''; ?>>Fruits</option>
                            <option value="Plants" <?php echo ($data['Category'] == 'Plants') ? 'selected' : ''; ?>>Plants</option>
                            <option value="Seeds" <?php echo ($data['Category'] == 'Seeds') ? 'selected' : ''; ?>>Seeds</option>
                            <option value="Grains" <?php echo ($data['Category'] == 'Grains') ? 'selected' : ''; ?>>Grains</option>
                            <option value="Fertilizer" <?php echo ($data['Category'] == 'Fertilizer') ? 'selected' : ''; ?>>Fertilizer</option>
                            <option value="Insecticides" <?php echo ($data['Category'] == 'Insecticides') ? 'selected' : ''; ?>>Insecticides</option>
                            <option value="Farming Tools" <?php echo ($data['Category'] == 'Farming Tools') ? 'selected' : ''; ?>>Farming Tools</option>
                        </select>
                    </div>




                    <div class="sitem">
                        <label for="Item"><b>Item Name</b></label>
                        <br>
                        <input id="sitem_name" name="Item_name" type="textbox" placeholder="Enter the Item Name" value="<?php print_r($dat['Item_name']) ?>"><br />
                        <span class="invalid"><?php if ($data) {
                                                    echo $data['Item_name_err'];
                                                } ?></span>

                    </div>

                    <div class="sstock_size">
                        <div class="iii">
                            <label for="stock"> <b>Unit Size</b></label>
                            <br>
                            <input id="size" name="Unit_size" type="number" step="1" min=0 placeholder="Enter unit size" value="<?php print_r($dat['Unit_size']) ?>">
                            <span class="invalid"><?php if ($data) {
                                                        echo $data['Unit_size_err'];
                                                    }  ?></span>
                        </div>
                        <div class="sdropdown2">
                            <label for="stype"><b>Type:</b></label>
                            <br>
                            <select name="Unit_type" id="stype">
                                <option disabled selected>Select Unit type</option>
                                <option value="Kg" <?php echo ($data['Unit_type'] == 'Kg') ? 'selected' : ''; ?>>Kg</option>
                                <option value="g" <?php echo ($data['Unit_type'] == 'g') ? 'selected' : ''; ?>>g</option>
                                <option value="plant" <?php echo ($data['Unit_type'] == 'plant') ? 'selected' : ''; ?>>Plant</option>
                                <option value="ml" <?php echo ($data['Unit_type'] == 'ml') ? 'selected' : ''; ?>>ml</option>
                                <option value="L" <?php echo ($data['Unit_type'] == 'L') ? 'selected' : ''; ?>>L</option>
                            </select>
                            <span class="invalid"><?php if ($data) {
                                                        echo $data['Unit_type_err'];
                                                    } ?></span>
                        </div>

                    </div>

                    <div class="sprice">
                        <b>Unit Price</b>
                        <br>
                        <input id="sprice" name="Unit_price" type="number" min=0 placeholder="Enter the Unit Price" value="<?php print_r($dat['Unit_price']) ?>">
                        <span class="invalid"><?php if ($data) {
                                                    echo $data['Unit_price_err'];
                                                }  ?></span>

                    </div>

                    <div class="stocksize">
                        <br>
                        <b>Stock Size</b>
                        <br>
                        <input id="Stock" name="Stock_size" type="number" step="1" min=0 placeholder="Enter the Stock Size" value="<?php print_r($dat['Stock_size']) ?>">
                        <span class="invalid"><?php if ($data) {
                                                    echo $data['Stock_size_err'];
                                                }  ?></span>

                    </div>




                    <br>
                    <div class="sdate">
                        <b>Exp</b>
                        <br>
                        <input id="se_date" name="Expiry_date" type="date" placeholder="Enter expire date" value="<?php print_r($dat['Expiry_date']) ?>">
                        <span class="invalid"><?php if ($data) {
                                                    echo $data['Expiry_date_err'];
                                                }  ?></span>

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

                        <span class="invalid"><?php if ($data) {
                                                    echo $data['Expiry_date_err'];
                                                }  ?></span>
                        <span class="invalid"><?php if ($data) {
                                                    echo $data['Invalid_date_err'];
                                                }  ?></span>
                    </div>



                    <br>
                    <div class="saddress">
                        <b>Address</b>
                        <br>
                        <input id="sAddress" name="address" type="textbox" placeholder="Enter the Address Line1">
                        <input id="sAddress" name="address" type="textbox" placeholder="Enter the Address Line2">
                        <input id="sAddress" name="address" type="textbox" placeholder="Enter the Address Line3">
                        <input id="sAddress" name="address" type="textbox" placeholder="Enter the Address Line4">


                    </div>

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
                        <input id="sdes" name="Description" type="text" placeholder="Enter Descripitiion" value="<?php print_r($dat['Description']) ?>">
                        <span class="invalid"><?php if ($data) {
                                                    echo $data['Description_err'];
                                                }  ?></span>
                    </div>






                    <div class="image">
                        <b>Upload image</b>
                        <!-- <br> -->
                        <!-- <br> -->

                        <!-- Display current image filename -->
                        <?php if (!empty($data['Image'])) : ?>
                            <div>Current Image: <?php echo $data['Image']; ?></div>
                            <br>
                        <?php endif; ?>

                        <!-- File input for uploading a new image -->
                        <input id="inside_imageq" name="Image" type="file">
                        <span class="invalid"><?php if ($data) {
                                                    echo $data['Image_err'];
                                                } ?></span>
                    </div>



                    <div class="dropdown3">
                        <br>
                        <b>Delivery Method</b>
                        <br>
                        <br>

                        <input type="checkbox" id="Home Delivery" name="Home_Delivery" value="Home Deliver" <?php echo ($data['DeliveryMethod'] == 'Home Deliver') ? 'checked' : ''; ?>>
                        <label for="Home Delivery"><b>Home Delivery</b></label><br>

                        <input type="checkbox" id="Insto Pickup" name="Insto_Pickup" value="Insto Pickup" <?php echo ($data['DeliveryMethod'] == 'Insto Pickup') ? 'checked' : ''; ?>>
                        <label for="Insto Pickup"><b>Insto Pickup</b></label><br>
                        <span class="invalid"><?php if ($data) {
                                                    echo $data['DeliveryMethod_err'];
                                                } ?></span>
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
        $(document).ready(function() {
            $("#sCategory").on('change', function() {
                var el = $(this);
                var typeDropdown = $("#stype");

                // Clear existing options
                typeDropdown.empty();
                typeDropdown.val(typeDropdown.find('option:first').val());

                if (el.val() === "Vegatable") {
                    // Add options for Vegatable
                    typeDropdown.append("<option value='Kg'>Kg</option>");
                    typeDropdown.append("<option value='g'>g</option>");
                } else if (el.val() === "Fruits") {
                    // Add options for Fruits
                    typeDropdown.append("<option value='Kg'>Kg</option>");
                    typeDropdown.append("<option value='g'>g</option>");
                } else if (el.val() === "Plants") {
                    // Add options for Fruits
                    typeDropdown.append("<option value='Plants'>Plants</option>");

                } else if (el.val() === "Seeds") {
                    // Add options for Fruits
                    typeDropdown.append("<option value='Kg'>Kg</option>");
                    typeDropdown.append("<option value='g'>g</option>");
                } else if (el.val() === "Grains") {
                    // Add options for Fruits
                    typeDropdown.append("<option value='Kg'>Kg</option>");
                    typeDropdown.append("<option value='g'>g</option>");
                } else if (el.val() === "Fertilizer") {
                    // Add options for Fruits
                    typeDropdown.append("<option value='Kg'>Kg</option>");
                    typeDropdown.append("<option value='g'>g</option>");
                    typeDropdown.append("<option value='L'>L</option>");
                    typeDropdown.append("<option value='ml'>ml</option>");

                } else if (el.val() === "Insecticides") {
                    // Add options for Fruits
                    typeDropdown.append("<option value='ml'>ml</option>");
                    typeDropdown.append("<option value='l'>l</option>");
                }
                // Add options for other categories if needed

                // Optionally, you can select the first option
                typeDropdown.val(typeDropdown.find('option:first').val());
            });
        });
    </script>




    </section>

</div>
</div>