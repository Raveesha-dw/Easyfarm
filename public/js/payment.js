function paymentGateway() {
console.log("2344444");
    var hiddenTotalpayment = document.getElementById("hiddenTotalpayment").value;
    var hiddenuId = document.getElementById("hiddenuId").value;

    // Collect values from arrays
    var hiddenItem_Id = document.querySelectorAll("input[id^='hiddenItem_Id[]']");
    var hiddenquantity = document.querySelectorAll("input[id^='hiddenquantity[]']");
    var hiddenSubTotalpayment = document.querySelectorAll("input[id^='hiddenSubTotalpayment[]']");
    var hiddenselectedDeliveryMethod = document.querySelectorAll("input[id^='selectedDeliveryMethods[]']");

console.log(hiddenItem_Id);
console.log(hiddenselectedDeliveryMethod);

    // Initialize arrays to store values
    var itemIds = [];
    var quantities = [];
    var subTotalPayments = [];
    var selectedDeliveryMethods = [];
    

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


        // Create data object to send to the server
    var data = {
        hiddenTotalpayment: hiddenTotalpayment,
        hiddenuId: hiddenuId,
        itemIds: itemIds,
        quantities: quantities,
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

            for (let i = 0; i < numOfItems; i++) {
                console.log("qqqqqq");
                payhere.onCompleted = function onCompleted(orderId) {
                    console.log("eeeeeee");
                saveOrder(itemIds[i],hiddenuId,quantities[i],orderId, selectedDeliveryMethods[i]);
                console.log("Payment completed. OrderID:" + orderId);
                
            }

            // Payment completed. It can be a successful failure

                // var paymentQueryString = Object.keys(payment).map(key => key + '=' + encodeURIComponent(payment[key])).join('&');
                // window.location.href = "http://localhost/Easyfarm/Plan/update_details?id=" + payment['plan_id'];
                
                
                //  Note : validate the payment and show success or failure page to the customer


            };

            // payment window closed
            payhere.onDismissed = function onDismissed() {
                //  Note : Prompt user to pay again or show an error page
                console.log("Payment dismissed");
            }






            payhere.startPayment(payment);
            console.log("aaaaaaaaaaaa");
       
        }
    };

    // xhttp.open("GET", "../Payment/payment?hiddenTotalpayment=" + encodeURIComponent(hiddenTotalpayment), true);
    // xhttp.send();

    xhttp.open("POST", "../Payment/payment", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Convert data to a query string
    // var dataToSend =
    //     "hiddenTotalpayment=" + encodeURIComponent(hiddenTotalpayment) +
    //     "&hiddenItem_Id=" + encodeURIComponent(hiddenItem_Id) +
    //     "&hiddenuId=" + encodeURIComponent(hiddenuId) +
    //     // "&hiddenuId=" + encodeURIComponent(hiddenuId);


    xhttp.send(dataToSend);
}

function saveOrder(Item_Id,uId , quantity,orderId,selectedDeliveryMethod){
    

    var f = new FormData();

    f.append("Item_Id", Item_Id);
    f.append("uId", uId);
    f.append("quantity", quantity);
    f.append("orderId", orderId);
    f.append("selectedDeliveryMethod",selectedDeliveryMethod);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        console.log("yyyyyyyyy");
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