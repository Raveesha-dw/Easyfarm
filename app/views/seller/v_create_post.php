<?php require APPROOT . '/views/inc/csslinking.php'; ?>




    <div class="shero">
    <form action="<?php echo URLROOT ?>/Seller_post/create_post" enctype="multipart/form-data" method="POST">
        <nav>
        <img src="<?php echo URLROOT?>/public/images/seller/logo.png" alt=""  class="logo">
        </nav>
        <div class="scolumn1">
            
                <div>
                    <div class ="sitem">
                    <label for="Item"><b>Item</b></label>
                    <br>
                    <input id="sitem_name" name="Item_name" type="textbox" placeholder="Enter the Item Name" required value="<?php echo $data['Item_name'];?>" ><br/>
                    <span class="invalid"><?php if($data){echo $data['Item_name_err'];} ?></span>
                   
                    </div>

                    <div class="sdropdown1">
                        <label for="Category" name="Category"><b>Choose your type:</b></label>
                        <!-- <span class="invalid"><?php if($data){ echo $data['Category_err'];} ?></span> -->
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
                    <input id="se_date"  name="Expiry_date"  type="date" placeholder="Enter expire date" >
                    
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
                        <label for="Category2"><b>Type:</b></label>
                        <br>
                        
                        <select name="Unit_type" id="stype">
                        
                            <option value=1>Kg</option>
                            <option value=2>Packet</option>
                            <option value=3>Plant</option>
                            <option value=4>Unit</option>
                            
                        </select>
                        <span class="invalid"><?php if($data) {echo $data['Unit_type_err'];}  ?></span>
                        
                        
                    </div> 
                </div>
                
                <br>
                <br>
                <div class="sprice">
                    <b>Price</b>
                    <br>
                    <input id="sprice" name="Unit_price" type="number" min=0 Mplaceholder="Enter the Price" required value="<?php echo $data['Unit_price'];?>">
                    <span class="invalid"><?php if($data){echo $data['Unit_price_err'];}  ?></span>
                    
                </div>
                <br>
                <div class="sstock_size">
                    <b>size</b>
                    <br>
                    <input id="price" name="Stock_size" type="number" placeholder="Enter stock size" min=o required value="<?php echo $data['Stock_size'];?>">
                    <span class="invalid"><?php if($data){echo $data['Stock_size_err'];}  ?></span>
                </div>
                <br>
                <div class="sDescription">
                    <b>Descripition</b>
                    <br>
                    <input id="sdes" name="Description" type="text" placeholder="Enter Descripitiion" required value="<?php echo $data['Description'];?>">
                    <span class="invalid"><?php if($data){echo $data['Description_err'];}  ?></span>
                </div>
                <div class="dropdown3">
                    <br>
                    <b>Delivery Method</b>
                    <br>
                        <select name="DeliveryMethod" id="type1">
                        <span class="invalid"><?php if($data){echo $data['DeliveryMethod_err'];}  ?></span>
                            <option value=1>Home Delivery</option>
                            <option value=2>In-store Pickup</option>
                            <!-- <option value=3>Both</option> -->
                            
                        </select>

                </div>
            
                
        </div>
            <div class="scolumn2">
                <b>Upload image</b>
                <div class="image">
                    <input id="inside_imageq" name="Image" type="file" placeholder="Upload the Images">
                    <span class="invalid"><?php if($data){echo $data['Image_err'];}  ?></span>
                </div>
                <div>
                    <button type="submit" id ="create"><b>create</b> </button>
                </div>
        

            </div>

        </div>
        
</form>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>   