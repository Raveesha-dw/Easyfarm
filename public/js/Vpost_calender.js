// $(document).ready(function() {
//     var selectedDates = []; // Array to store selected dates

//     $('#calendar').fullCalendar({
//         // Your FullCalendar options here...
//         // For example:
//         defaultView: 'month',
//         editable: true,
//         selectable: true, // Allow date selection
//         validRange: {
//             start: moment().startOf('day') // Set the start of the valid range to today
//         },


//         select: function(start, end, jsEvent, view) {
//             // Store the selected dates
//             var currentDate = moment(start);
//             while (currentDate.isBefore(end, 'day')) {
//                 var dateStr = currentDate.format('YYYY-MM-DD');
//                 var index = selectedDates.indexOf(dateStr);
//                 if (index !== -1) {
//                     // Date is already selected, so unselect it
//                     selectedDates.splice(index, 1);
//                     $('td[data-date="' + dateStr + '"]').removeClass('selected').css('background-color', '');
//                 } else {
//                     // Date is not selected, so select it
//                     selectedDates.push(dateStr);
//                     $('td[data-date="' + dateStr + '"]').addClass('selected').css('background-color', '#d25151');
//                 }
//                 currentDate.add(1, 'day');
//             }
//             console.log("Marked Dates:", selectedDates); // Log the marked dates
//             sendMarkedDates(selectedDates); // Send the marked dates to the controller
//         }
//     });

//     // Function to send marked dates to the controller
//     function sendMarkedDates(datesArray) {
//         // Create a new XMLHttpRequest object
//         var xhr = new XMLHttpRequest();
        
//         // Define the URL of the controller
//         var url = "../V_post/create_post";
        
//         // Set up the request
//         xhr.open("POST", url, true);
        
//         // Set the appropriate content type for the form data
//         xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
//         // Define the callback function to handle the response
//         xhr.onreadystatechange = function() {
//             if (xhr.readyState === XMLHttpRequest.DONE) {
//                 if (xhr.status === 200) {
//                     // Request was successful
//                     console.log("Dates sent successfully");
//                     // You can handle any response from the server here
//                 } else {
//                     // Request failed
//                     console.error("Error sending dates: " + xhr.status);
//                     // You can handle errors here
//                 }
//             }
//         };
        
//         // Convert datesArray to a query string
//         var params = "markedDates=" + encodeURIComponent(JSON.stringify(datesArray));
        
//         // Send the request with the form data
//         xhr.send(params);
//     }


//     // Example of clearing the selection on button click
//     $('#clearSelectionBtn').click(function() {
//         // Remove selection
//         $('.selected').removeClass('selected').css('background-color', ''); // Reset background color
//         selectedDates = []; // Clear the selected dates array
//         console.log("Marked Dates:", selectedDates); // Log the marked dates after clearing
//         sendMarkedDates(selectedDates); // Send the empty marked dates array to the controller
//     });
// });



$(document).ready(function() {
    var today = moment().startOf('day'); // Get today's date
    var threeMonthsLater = moment().add(3, 'months').endOf('day'); // Get date three months later

    var selectedDates = []; // Array to store selected dates

    $('#calendar').fullCalendar({
        // Your FullCalendar options here...
        // For example:
        defaultView: 'month',
        editable: true,
        selectable: true, // Allow date selection
        validRange: {
            start: today, // Set the start of the valid range to today
            end: threeMonthsLater // Set the end of the valid range to three months later
        },
        select: function(start, end, jsEvent, view) {
            // Store the selected dates
            var currentDate = moment(start);
            while (currentDate.isBefore(end, 'day')) {
                var dateStr = currentDate.format('YYYY-MM-DD');
                var index = selectedDates.indexOf(dateStr);
                if (index !== -1) {
                    // Date is already selected, so unselect it
                    selectedDates.splice(index, 1);
                    $('td[data-date="' + dateStr + '"]').removeClass('selected').css('background-color', '');
                } else {
                    // Date is not selected, so select it
                    selectedDates.push(dateStr);
                    $('td[data-date="' + dateStr + '"]').addClass('selected').css('background-color', '#d25151');
                }
                currentDate.add(1, 'day');
            }
            console.log("Marked Dates:", selectedDates); // Log the marked dates
            sendMarkedDates(selectedDates); // Send the marked dates to the controller
        }
    });

    // Function to send marked dates to the controller
    function sendMarkedDates(datesArray) {
        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();
        
        // Define the URL of the controller
        var url = "../V_post/create_post";
        
        // Set up the request
        xhr.open("POST", url, true);
        
        // Set the appropriate content type for the form data
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
        // Define the callback function to handle the response
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Request was successful
                    console.log("Dates sent successfully");
                    // You can handle any response from the server here
                } else {
                    // Request failed
                    console.error("Error sending dates: " + xhr.status);
                    // You can handle errors here
                }
            }
        };
        
        // Convert datesArray to a query string
        var params = "markedDates=" + encodeURIComponent(JSON.stringify(datesArray));
        
        // Send the request with the form data
        xhr.send(params);
    }


    // Example of clearing the selection on button click
    $('#clearSelectionBtn').click(function() {
        // Remove selection
        $('.selected').removeClass('selected').css('background-color', ''); // Reset background color
        selectedDates = []; // Clear the selected dates array
        console.log("Marked Dates:", selectedDates); // Log the marked dates after clearing
        sendMarkedDates(selectedDates); // Send the empty marked dates array to the controller
    });
});
