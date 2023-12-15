<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapperPayment">

    <h1>Payment</h1>
    <div class="wrapperPayment-sub">
    <br>
    <hr>
    <br><br><br>
    <img src="<?php echo URLROOT?>/public\images\pay\card_img.png" alt="">
    <br><br><br><br>
    <hr>

    

        <p class="type">Card number *</p>
        <div class="input-box">
            <input type="text" placeholder="Enter Account number"  name="ac_number" id="ac_number"  required value="">
            <i class='bx bxs-edit-location'></i>
        </div>

        <p class="type">Name on card *</p>
        <div class="input-box">
            <input type="text" placeholder="Enter Account number"  name="ac_number" id="ac_number"  required value="">
            <i class='bx bxs-edit-location'></i>
        </div>

        <p class="type">Expiration date *</p>
        <div class="input-box">
            <input type="text" placeholder="Enter Account number"  name="ac_number" id="ac_number"  required value="">
            <i class='bx bxs-edit-location'></i>
        </div>

        <p class="type">CVV *</p>
        <div class="input-box">
            <input type="text" placeholder="Enter Account number"  name="ac_number" id="ac_number"  required value="">
            <i class='bx bxs-edit-location'></i>
        </div>

        <br><br><p><b>Save Card</b></p>
        <p>We will save this card for your convenience. If required, you can remove the card in the "Payment Options" section in the "Account" menu</p>

        <button type="submit" class="btn" name="pay" id="pay"><a href="#"></a>Pay Now</button>

    </div>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>        