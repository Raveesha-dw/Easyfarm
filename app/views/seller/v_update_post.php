<?php require APPROOT . '/views/inc/csslinking.php'; ?>
<?php 
    $this->db=new Database();
    $this->db->query("SELECT * FROM item WHERE Item_Id = :Item_Id");
    $this->db->bind(':Item_Id', $_GET['id']);
    $product = $this->db->resultSet();
    $products = json_decode(json_encode($product), true); 
    // print_r($products[0]);
    // $products = $product[0]; 
    // exit;


?>

    <div class="shero">
    <form action="<?php echo URLROOT ?>/Seller_post/updatepost" method="POST">
        <nav>
        <img src="<?php echo URLROOT?>/public/images/seller/logo.png" alt=""  class="logo">
        </nav>
        <div class="scolumn1">
            
                <div>
                    <div class ="sitem">
                    <label for="Item"><b>Item</b></label>
                    <br>
                    <input id="sitem_name" name="Item_name" type="textbox" placeholder="Enter the Item Name" value="<?php print_r($products[0]['Item_name']) ?>"><br/>
                    <span class="invalid"><?php if($data){echo $data['Item_name_err'];} ?></span>
                    
                    </div>
                    <input type="text"  name= "id" value="<?php print_r($_GET['id']); ?>" hidden></label>
                    <div class="sdropdown1">
                        <label for="Category" name="Category" value="<?php print_r($products[0]['Category']) ?>"><b>Choose your type:</b></label>
                        <span class="invalid"><?php if($data){ echo $data['Category_err'];} ?></span>
                        <br>
                        <select name="Category" id="sCategory">
                            <option value=1>Seeds</option>
                            <option value=2>Plant</option>
                            <option value=3>Food</option>
                            <option value=4>Crop</option>
                            <option value=5>fertilizer</option>
                            <option value=6>pesticides</option>
                            <option value=7>tools</option>
                        </select>
                        
                    </div>

                </div>
                <br>
                <div class ="sdate">
                    <b>Exp</b>
                    <br>
                    <input id="se_date"  name="Expiry_date"  type="date" placeholder="Enter expire date" value="<?php print_r($products[0]['Expiry_date']) ?>">
                    <span class="invalid"><?php if($data){echo $data['Expiry_date_err'];}  ?></span>
                </div>
                <br>
                <div class="saddress">
                    <b>Address</b>
                    <br>
                    <input id="sAddress" name ="address" type="textbox" placeholder="Enter the Address" >
                    
                </div>
                <br>
                <div>
                    
                    
                    <div class="sdropdown2">
                        <label for="Category"><b>Type:</b></label>
                        <br>
                        <select name="Unit_type" id="stype" >
                        <span class="invalid"><?php if($data){echo $data['Unit_type_err'];}  ?></span>
                            <option value=9>Kg</option>
                            <option value=10>quantity</option>
                            
                            <option value=11>L</option>
                        </select>
                        
                    </div> 
                </div>
                <br>
                <br>
                <div class="sprice">
                    <b>Price</b>
                    <br>
                    <input id="sprice" name="Unit_price" type="number" placeholder="Enter the Price" value="<?php print_r($products[0]['Unit_price']) ?>">
                    <span class="invalid"><?php if($data){echo $data['Unit_price_err'];}  ?></span>
                    
                </div>
                <br>
                <div class="sstock_size">
                    <b>size</b>
                    <br>
                    <input id="price" name="Stock_size" type="number" placeholder="Enter stock size" value="<?php print_r($products[0]['Stock_size']) ?>">
                    <span class="invalid"><?php if($data){echo $data['Stock_size_err'];}  ?></span>
                </div>
                <br>
                <div class="sDescription">
                    <b>Descripition</b>
                    <br>
                    <input id="sdes" name="Description" type="text" placeholder="Enter Descripitiion" value="<?php print_r($products[0]['Description']) ?>">
                    <span class="invalid"><?php if($data){echo $data['Description_err'];}  ?></span>
                </div>
                <div class="dropdown3">
                    <br>
                    <b>Delivery Method</b>
                    <br>
                        <select name="DeliveryMethod" id="type1" value="<?php print_r($products[0]['DeliveryMethod']) ?>">
                        <span class="invalid"><?php if($data){echo $data['DeliveryMethod_err'];}  ?></span>
                            <option value=13>Home Delivery</option>
                            <option value=14>Insto Pickup</option>
                            <option value=15>Both</option>
                            
                        </select>

                </div>
            
                
        </div>
            <div class="scolumn2">
                <b>Upload image</b>
                <div class="image">
                    
                    <br>
                    <input id="inside_image" name="Image" type="file" placeholder="Upload the Images" value="<?php print_r($products[0]['Image']) ?>">
                    <span class="invalid"><?php if($data){echo $data['Image_err'];}  ?></span>
                </div>
                <div>
                    <button type="submit" id ="create"><b>update</b> </button>
                </div>
        

            </div>

        </div>
        
</form>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>   