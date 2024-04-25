<?php require APPROOT . '/views/inc/csslinking.php'; ?>
<?php 
    // $this->db=new Database();
    // $this->db->query("SELECT * FROM item WHERE Item_Id = :Item_Id");
    // $this->db->bind(':Item_Id', $_GET['id']);
    // $product = $this->db->resultSet();
    // $products = json_decode(json_encode($product), true); 
    // include(APPROOT.'/models/M_seller_post.php');
    // get_data();
    // $dat=Array();
$dat=$data;
// print_r($dat);








    // NOT NEEDED











    
?>

    <div class="shero">
    <form action="<?php echo URLROOT ?>/Seller_post/updatepost" enctype="multipart/form-data" method="POST">
        <nav>
        <img src="<?php echo URLROOT?>/public/images/seller/logo.png" alt=""  class="logo">
        </nav>
        <div class="scolumn1">
            
            <input  type="hidden" name="Item_Id" value=<?php echo $data['Item_Id']?>>
        

                    <div class ="sitem">
                    <label for="Item"><b>Item</b></label>
                    <br>
                    <input id="sitem_name" name="Item_name" type="textbox" placeholder="Enter the Item Name" value="<?php print_r($dat['Item_name']) ?>"><br/>
                    <span class="invalid"><?php {echo $data['Item_name_err'];} ?></span>
                   
                    </div>
                    <!-- <input type="text"  name= "id" value="<?php print_r($_GET['id']); ?>" hidden></label> -->
                    <div class="sdropdown1">
                        <label for="Category" name="Category" value="<?php print_r($dat['Category']) ?>"><b>Choose your type:</b></label>
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

                
                <br>
                <div class ="sdate">
                    <b>Exp</b>
                    <br>
                    <input id="se_date"  name="Expiry_date"  type="date" placeholder="Enter expire date" value="<?php print_r($dat['Expiry_date']) ?>">
                    <script>
                        var date =new Date();
                        var tdate =date.getDate();
                        var month = date.getMonth() + 1; //4
                        if(tdate <10){
                            tdate ='0' +tdate;
                        }
                        if (month<10){
                            month = '0'+month;//0 + 4=4
                        }
                        var year = date.getFullYear();
                        var minDate = year + "-" + month + "-" + tdate;
                        document.getElementById("se_date").setAttribute('min',minDate);
                        // console.log(minDate);
                    </script>

                    <span class="invalid"><?php if($data){echo $data['Expiry_date_err'];}  ?></span>
                    <span class="invalid"><?php if($data){echo $data['Invalid_date_err'];}  ?></span>
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
                        
                        
                        <select name="Unit_type" id="stype">
                            <span class="invalid"><?php if($data){echo $data['Unit_type_err'];}  ?></span>
                        
                            <option value=1>Kg</option>
                            <option value=2>Packet</option>
                            <option value=3>Plant</option>
                            <option value=4>Unit</option>
                            
                        </select>
                        
                    </div> 
                </div>
                <br>
                <br>
                <div class="sprice">
                    <b>Price</b>
                    <br>
                    <input id="sprice" name="Unit_price" type="number" min=0 placeholder="Enter the Price" value="<?php print_r($dat['Unit_price']) ?>">
                    <span class="invalid"><?php if($data){echo $data['Unit_price_err'];}  ?></span>
                    
                </div>
                <br>
                <div class="sstock_size">
                    <b>size</b>
                    <br>
                    <input id="price" name="Stock_size" type="number" min=0 placeholder="Enter stock size" value="<?php print_r($dat['Stock_size']) ?>">
                    <span class="invalid"><?php if($data){echo $data['Stock_size_err'];}  ?></span>
                </div>
                <br>
                <div class="sDescription">
                    <b>Descripition</b>
                    <br>
                    <input id="sdes" name="Description" type="text" placeholder="Enter Descripitiion" value="<?php print_r($dat['Description']) ?>">
                    <span class="invalid"><?php if($data){echo $data['Description_err'];}  ?></span>
                </div>
                <div class="dropdown3">
                    <br>
                    <b>Delivery Method</b>
                    <br>
                        <select name="DeliveryMethod" id="type1" value="<?php  print_r($data['DeliveryMethod']) ?>">
                        <span class="invalid"><?php if($data){echo $data['DeliveryMethod_err'];}  ?></span>
                            <option value=13>Home Delivery</option>
                            <option value=14>Insto Pickup</option>
                            <option value=15>Both</option>
                            
                        </select>

                </div>
                <!-- </div> -->
            
                
                </div>
                <div class="scolumn2">
                <b>Upload image</b>
                <div class="image">
                    
                    <br>
                    <input id="inside_image" name="Image" type="file" placeholder="Upload the Images" value="<?php print_r($data['Image']) ?>">
                    <span class="invalid"><?php if($data){print_r( $data['Image_err']);}  ?></span>
                </div>
                <div>
                    <button type="submit" id ="create"><b>update</b> </button>
                </div>
        

            </div>

        </div>
        
</form>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>   