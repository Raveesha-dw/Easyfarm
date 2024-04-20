<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="flex-container">


<div class="right-content">
<?php
$categorizedItems = $data['items'];

foreach($categorizedItems as $order):
?>

    <div class="product-container">
        <div class="product">
            

                <h3>Order ID: <?php echo $order[0] ?>
                <br>Order Status: <?php echo $order[1] ?></h3>
                <!-- <h3>Mark as Complete: Have you received the order the succesfully? <a href="">YES</a></h3> -->

                <h4>Items in the Order:</h4>
                <div class="items-order">
                
                    <?php
                    $itemNames = $data['itemNames'];

                    // print_r($itemNames[0]);
                    // print_r($itemNames);
                    for($i = 0; $i<count($itemNames); $i++){
                        if($itemNames[$i] == $order[0]){
                            // foreach($itemNames[$i][] as $item){ 
                                // echo 'yppppp';
                                // print_r($itemNames[$order[0]]);
                            // for($j=0; $j<count($itemNames[$i]); $j++){
                                foreach($itemNames[$order[0]] as $item){
                                ?>
                                <div class="item-name">
                                    <?php echo $item; ?>
                                </div>

                                <div class="review-button">
                                    <a href="<?php echo URLROOT?>/Review/sendItem/<?php echo $item ?>"><button>Review item</button></a>
                                </div>
                                <?php
                             }
                        }
                    }
                    ?>
                    
                    


                </div>
                
            <!-- <script>

            if ($order[1] == 'Completed') {
                document.getElementById('item-review').style.display = 'inline'; // Show the anchor tag
            } else {
                document.getElementById('item-review').style.display = 'none'; // Hide the anchor tag
            }
            </script> -->
                
        </div>
    </div> 

<?php
endforeach
?>
</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>  