function paymentGateway() {
console.log("2344444");
    var hiddenTotalpayment = document.getElementById("hiddenTotalpayment").value;
    var hiddenuId = document.getElementById("hiddenuId").value;

    // Collect values from arrays
    var hiddenItem_Id = document.querySelectorAll("input[id^='hiddenItem_Id[]']");
    var hiddenquantity = document.querySelectorAll("input[id^='hiddenquantity[]']");
    var hiddenSubTotalpayment = document.querySelectorAll("input[id^='hiddenSubTotalpayment[]']");
    var hiddenselectedDeliveryMethod = document.querySelectorAll("input[id^='selectedDeliveryMethods[]']");
    
    var hiddenseller_Ids = document.querySelectorAll("input[id^='hiddenseller_Ids[]']");
    var hidden_product_chargings = document.querySelectorAll("input[id^='hidden_product_chargings[]']");
    var hidden_delivery_chargings = document.querySelectorAll("input[id^='hidden_delivery_chargings[]']");
console.log("555555555555555555555555555555555555555555555555555555");
console.log(hidden_delivery_chargings);
console.log(hidden_product_chargings);
console.log(hiddenseller_Ids);

    // Initialize arrays to store values
    var itemIds = [];
    var quantities = [];
    var subTotalPayments = [];
    var selectedDeliveryMethods = [];
    var sellerIds = [];
    var product_chargings = [];
    var delivery_chargings = [];

    

    // Populate arrays with values from hidden input fields
    hiddenItem_Id.forEach(function (element) {
        itemIds.push(element.value);
    });
    console.log(itemIds);
    

    hiddenquantity.forEach(function (element) {
        quantities.push(element.value);
    });

    hiddenSubTotalpayment.forEach(function (element) {
        subTotalPayments.push(element.value);
    });
    hiddenselectedDeliveryMethod.forEach(function (element) {
        selectedDeliveryMethods.push(element.value);
    });
    hiddenseller_Ids.forEach(function (element) {
        sellerIds.push(element.value);
    });
    hidden_product_chargings.forEach(function (element) {
        product_chargings.push(element.value);
    });
    hidden_delivery_chargings.forEach(function (element) {
        delivery_chargings.push(element.value);
    });

        // Create data object to send to the server
    var data = {
        hiddenTotalpayment: hiddenTotalpayment,
        hiddenuId: hiddenuId,
        itemIds: itemIds,
        quantities: quantities,
        sellerIds:sellerIds,
        product_chargings: product_chargings,
        delivery_chargings: delivery_chargings,
        selectedDeliveryMethods: selectedDeliveryMethods,
        subTotalPayments: subTotalPayments
    };
console.log(data);
    // Convert data to JSON format
    var dataToSend = JSON.stringify(data);
    console.log("sssssssssssssssss");
console.log(dataToSend);







    var xhttp = new XMLHttpRequest();
    console.log(xhttp);

    xhttp.onreadystatechange = () => {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            alert(xhttp.responseText);
            var obj = JSON.parse(xhttp.responseText);
            var payment = {
                "sandbox": true,
                "merchant_id": "1225296",
                // "return_url": "../Pages/index",
                // "cancel_url": "../Pages/",
                "return_url": "http://localhost/Easyfarm",
                "cancel_url": "http://localhost/Easyfarm/BuyNow/buyNow",
                "notify_url": "http://sample.com/notify",
                "order_id": obj["order_id"],
                "items": obj["items"],
                "amount": obj["amount"],
                "currency": obj["currency"],
                "hash": obj["hash"],
                "first_name": obj["first_name"],

         
                "last_name": obj["last_name"],
                "email": obj["email"],
                "phone": obj["phone"],
                "address": obj["address"],
                "city": obj["city"],
                "country": "Sri Lanka",
                "delivery_address": "No. 46, Galle road, Kalutara South",
                "delivery_city": "Kalutara",
                "delivery_country": "Sri Lanka",
                "custom_1": "",
                "custom_2": ""
            };

            var numOfItems = itemIds.length;
            var num_of_Seller_Ids = sellerIds.length;

            payhere.onCompleted = function onCompleted(orderId) {
                console.log(sellerIds);

                for (let i = 0; i < numOfItems; i++) {
                 
                    saveOrder(itemIds[i],hiddenuId,quantities[i],orderId, selectedDeliveryMethods[i],sellerIds,product_chargings,delivery_chargings);

                    // console.log("Payment completed. OrderID:" + orderId);
                }


                // for (let i = 0; i < num_of_Seller_Ids; i++) {

                //     saveOrder_Charging_details(sellerIds[i],product_chargings[i],delivery_chargings[i]);

                //     // console.log("Payment completed. OrderID:" + orderId);       
                // }




            








            };

            // payment window closed
            payhere.onDismissed = function onDismissed() {
                console.log("Payment dismissed");
            }






            payhere.startPayment(payment);
            console.log("aaaaaaaaaaaa");
       
        }
    };


    xhttp.open("POST", "../Payment/payment", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


    xhttp.send(dataToSend);
}








function saveOrder(Item_Id,uId , quantity,orderId,selectedDeliveryMethod,sellerIds,product_chargings,delivery_chargings){
    
    var f = new FormData();

    f.append("Item_Id", Item_Id);
    f.append("uId", uId);
    f.append("quantity", quantity);
    f.append("orderId", orderId);
    f.append("sellerIds",sellerIds);
    f.append("product_chargings",product_chargings);
    f.append("delivery_chargings",delivery_chargings);
    f.append("selectedDeliveryMethod",selectedDeliveryMethod);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        console.log("yyyyyyyyy");
        console.log(sellerIds);
        console.log(product_chargings);
        console.log(delivery_chargings);
        if(r.readyState == 4) {
            var t = r.responseText;
            console.log(t);
            console.log(typeof(t));
            window.location = "http://localhost/Easyfarm" ;

        }
    }

    r.open("POST", "../Payment/saveOrder", true);
    r.send(f);


}










function saveOrder_Charging_details(sellerId,product_charging,delivery_charging){
    console.log("AMMMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA");
    
    var f = new FormData();

    f.append("sellerId",sellerId);
    f.append("product_charging",product_charging);
    f.append("delivery_charging",delivery_charging);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if(r.readyState == 4) {
            var t = r.responseText;
            // console.log(t);
            // console.log(typeof(t));
            window.location = "http://localhost/Easyfarm" ;

        }
    }

    r.open("POST", "../Payment/saveOrder_Charging_details", true);
    r.send(f);


}





