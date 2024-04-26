<div>
    <?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
</div>

<div class="container">
<?php require APPROOT . '/views/Vechile/v_renter_side_bar.php' ?>
<section class="home">
<!-- <?php print_r($data)?> -->




<?php require APPROOT .'/views/inc/components/navbars/renter_p.php'?>
<div class="booking-message">
<div class ="shero5">
                     <?php $products=$data; ?>
                     <?php foreach ($products as $product) : ?>

                     <div class ="msg-box">
                            <div class ="m-header">
                                   <div class ="msg-ID">
                                          <div class="m-img">
                                                  <i class="fa-solid fa-user"></i>
                                                 <!-- <img src="<?php echo URLROOT?>/public/images/seller/user.png" alt=""> -->
                                          </div>
                                   
                                   </div>
                                   <div class="msg-date"> <p><?php echo $product->Name ?></p>
                                          <p><?php echo $product->placed_Date ?><p>
                                   </div>

                                   <div class="msg-order-id">
                                        <p><?php echo "Order ID" ?></p>
                                        <p><?php echo $product->Order_ID ?></p>
                                    </div>

                                   
                                   
                            </div> 

                            <div class="msg-f"> 
                                   
                                          <!-- <div class="msg-f-detail">
                                                        <h3><?php echo $product->Name ?> wants <?php echo $product->V_name ?> number in  <?php echo $product->V_number ?> vechile</h3>
                                                 <br>
                                          </div> -->
                                           <!-- <div class="msg-product">


                                                               <h3>Vechile&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->V_name ?></h3>
                                                               <h3>Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->order_dates?></h3>
                                                               <h3>Pickup Location&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->location?></h3>
                                                               <h3>Contact Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->number?></h3>
                                                               <h3>Order ID<?php echo $product->Order_ID?></h3>

                                                                <h3>Notice&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->Message?></h3>



                                                        </div> -->

                                                        
                                                        <style>
    .msg-pdroduct {
        display: flex;
        width: 700px;
    }

    .product-info,
    .product-values {
        flex: 1; /* Each section takes equal space */
        display: flex; /* Use flexbox within each section */
        flex-direction: column; /* Stack items vertically */
        padding: 10px; /* Add padding for separation */
    }

    .product-info h3,
    .product-values h3 {
        margin: 0; /* Remove default margin */
    }
</style>

<img src="<?php echo URLROOT?>/public/images/vehicleRenter/<?php echo $product->Image;?>" width="100" height="100"/>



   <div class="msg-product">
        <table class="product-table">
            <tr>
                <th>Booking Dates</th>
                <td>
                    <?php 
                        $dates = explode(',', $product->order_dates); // Split the date string into an array
                        foreach ($dates as $date) {
                        echo $date . "<br>"; // Output each date on a new line
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <th>Location</th>
                <td><?php echo $product->location; ?></td>
            </tr>
            <tr>
                <th>Contact Number</th>
                <td><?php echo $product->number; ?></td>
            </tr>
            <tr>
                <th>Customer message</th>
                <td><?php echo $product->Message; ?></td>
            </tr>
        </table>
    </div>


                                                 <div class="button-msg">
                                                 
                                                 <div class="aa">
                                                        <button class="dd" style="cursor: default; "> <a ><?php echo $product->Status; ?> </a> </button>

                                                 </div> 
                                                 </div>
                                                 
                            </div>
                            
                     </div> 

                     <?php  endforeach;?>
                                                 <!-- <script>
                                                        
                                                        console.log(data);
                                                        function changeText(button) {
                                                        // var button = document.querySelector('.button-msg .dd');
                                                        button.textContent = "APPROVED";
                                                        //  button.style.backgroundColor = "green";
                                                        }
                                                        
                                                 </script> -->
                                          
                     

                     <br></br>
                     <br></br>
</div>
 </div>

<?php require APPROOT . '/views/inc/footer.php';?>  
                            
        
</section>

<style>
    /* Style for the container of the message box */
    .booking-message .shero5 .msg-box {
        border: 1px solid #ccc;
        /* padding: 10px; */
        /* margin-bottom: 200px; */
    }

    

    /* Style for the message ID */
    .msg-ID {
        display: flex;
        align-items: center;
    }

   

    /* Style for the message content */
    

    /* Style for the product details */
    .msg-f-detail h3 {
        margin-bottom: 5px;
    }

    /* Style for the product information */
    .msg-product h3 {
        margin: 5px 0;
    }

   
</style>
</div>
</div>
        
         