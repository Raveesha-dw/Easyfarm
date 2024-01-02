function paymentGateway() {
    var hiddenTotalpayment = document.getElementById("hiddenTotalpayment").value;
    var hiddenItem_Id = document.getElementById("hiddenItem_Id").value;
    var hiddenuId = document.getElementById("hiddenuId").value;
    var hiddenquantity = document.getElementById("hiddenquantity").value;


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

            // Payment completed. It can be a successful failure
            payhere.onCompleted = function onCompleted(orderId) {
                saveOrder(hiddenItem_Id,hiddenuId,hiddenquantity,orderId);
                console.log("Payment completed. OrderID:" + orderId);
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
    var dataToSend =
        "hiddenTotalpayment=" + encodeURIComponent(hiddenTotalpayment) +
        "&hiddenItem_Id=" + encodeURIComponent(hiddenItem_Id) +
        "&hiddenuId=" + encodeURIComponent(hiddenuId);

    xhttp.send(dataToSend);
}

function saveOrder(Item_Id,uId , quantity,orderId){
    

    var f = new FormData();

    f.append("Item_Id", Item_Id);
    f.append("uId", uId);
    f.append("quantity", quantity);
    f.append("orderId", orderId);

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