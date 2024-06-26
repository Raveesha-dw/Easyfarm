$(document).ready(function() {
    var calendarElement = document.getElementById('calendar');
    var unavailableDatesJson = calendarElement.getAttribute('data-unavailable-dates');
    var unconfirmed_booking_datesJson = calendarElement.getAttribute('data-unconfirmed_booking_dates');
    var confirmed_booking_datesJson = calendarElement.getAttribute('data-confirmed_booking_dates');
    var post_create_dateJson = calendarElement.getAttribute('data-create-date');
    var booking_DataJson = calendarElement.getAttribute('data-booking_Data');
    var more_details_bookingJson = calendarElement.getAttribute('data-more_details_booking');
    var last_date_of_planJson = calendarElement.getAttribute('data-last_date_of_plan');

    var unavailableDates = JSON.parse(unavailableDatesJson);
    var unconfirmed_booking_dates = JSON.parse(unconfirmed_booking_datesJson);
    var confirmed_booking_dates = JSON.parse(confirmed_booking_datesJson);
    var booking_Data = JSON.parse(booking_DataJson);
    var more_details_booking = JSON.parse(more_details_bookingJson);
    var post_create_date = JSON.parse(post_create_dateJson);




    var today = moment().startOf('day'); // Get today's date
   
      
    var lastDateOfPlan = moment(last_date_of_planJson).startOf('day'); // Parse the last date

    var today = moment().startOf('day'); // Get today's date
    
    var activeRangeEnd = moment(lastDateOfPlan).endOf('day');

    $('#calendar').fullCalendar({
        defaultView: 'month',
        editable: true,
        selectable: true, // Allow date selection
        validRange: {
            start: today.format(), 
            end: activeRangeEnd.format() 
        },
        events: function(start, end, timezone, callback) {
            var events = [];

            // Add unavailable dates
            unavailableDates.forEach(function(date) {
                events.push({
                    start: date,
                    end: date,
                    rendering: 'background',
                    color: '#ec2c2c' // Red
                });
            });

            // Add unconfirmed booking dates
            unconfirmed_booking_dates.forEach(function(date) {
                events.push({
                    start: date,
                    end: date,
                    rendering: 'background',
                    color: '#0b12d6' // Yellow
                });
            });

            // Add confirmed booking dates
            confirmed_booking_dates.forEach(function(date) {
                events.push({
                    start: date,
                    end: date,
                    rendering: 'background',
                    color: '#1bec84' // Green
                });
            });

            callback(events);
        },

        dayClick: function(date, jsEvent, view) {

            // Check if the clicked date is in the booking data
            var clickedDate = date.format('YYYY-MM-DD');
            var foundBooking = booking_Data.find(function(item) {
                return item.date === clickedDate;
            });

        //     if (foundBooking) {
        //         // Find the corresponding details from more_details_booking using the Order_ID
        //         var moreDetails = more_details_booking.find(function(item) {
        //             return item.Order_ID === foundBooking['0rder_ID'];
        //         });

        //         var alertMessage = ''+ date.format() + '\n\n\n';
        //         alertMessage += 'Booking Details:\n\n';
        //         alertMessage += 'Status of aproving booking: ' + foundBooking.status + '\n';
        //         alertMessage += 'Name of the customer : ' + moreDetails.name + '\n';
        //         alertMessage += 'Location : ' + moreDetails.location + '\n';
        //         alertMessage += 'Phone Number :'+ moreDetails.number + '\n';
        //         alertMessage += 'The day the order was placed :'+ moreDetails.placed_Date + '\n';

        //         alert(alertMessage);
        //     }
        // }



        // Inside the dayClick function
if (foundBooking) {


    if (foundBooking.status === "success") {
        foundBooking.status = "Accept";
    }



    var moreDetails = more_details_booking.find(function(item) {
        return item.Order_ID === foundBooking['0rder_ID'];
    });
    

    var modalContent = '<p>Date: ' + date.format() + '</p>';
    modalContent += '<br><b><p>Booking Details:</b></p>';
    modalContent += '<p><span class="highlight">Status of approving booking:</span> ' + foundBooking.status + '</p>';
    modalContent += '<p><span class="highlight">Name of the customer:</span> ' + moreDetails.name + '</p>';
    modalContent += '<p><span class="highlight">Location:</span> ' + moreDetails.location + '</p>';
    modalContent += '<p><span class="highlight">Phone Number:</span> ' + moreDetails.number + '</p>';
    modalContent += '<p><span class="highlight">The day the order was placed:</span> ' + moreDetails.placed_Date + '</p><br>';

    document.getElementById("modalContent").innerHTML = modalContent;
    document.getElementById("myModal").style.display = "block";

    // When the user clicks on <span> (x) or OK button, close the modal
    var closeModal = function() {
        document.getElementById("myModal").style.display = "none";
    };

    document.getElementsByClassName("close")[0].onclick = closeModal;
    document.getElementById("okButton").onclick = closeModal;
}


















// Inside the dayClick function
// if (foundBooking) {
//     var moreDetails = more_details_booking.find(function(item) {
//         return item.Order_ID === foundBooking['0rder_ID'];
//     });

//     // Clear existing modal content
//     var modalContentElement = document.getElementById("modalContent");
//     modalContentElement.innerHTML = ''; // Clear previous content

//     // Create a structured layout for the booking details
//     var details = [
//         { key: 'Date', value: date.format() },
//         { key: 'Status of approving booking', value: foundBooking.status },
//         { key: 'Name of the customer', value: moreDetails.name },
//         { key: 'Location', value: moreDetails.location },
//         { key: 'Phone Number', value: moreDetails.number },
//         { key: 'The day the order was placed', value: moreDetails.placed_Date }
//     ];

//     details.forEach(detail => {
//         var p = document.createElement('p');
//         p.innerHTML = `<strong>${detail.key}:</strong> ${detail.value}`;
//         modalContentElement.appendChild(p);
//     });

//     // Display the modal
//     document.getElementById("myModal").style.display = "block";

//     // When the user clicks on <span> (x), close the modal
//     document.getElementsByClassName("close")[0].onclick = function() {
//         document.getElementById("myModal").style.display = "none";
//     }
// }













// // Inside the dayClick function
// if (foundBooking) {
//     var moreDetails = more_details_booking.find(function(item) {
//         return item.Order_ID === foundBooking['0rder_ID'];
//     });

//     // Clear existing modal content
//     var modalContentElement = document.getElementById("modalContent");
//     modalContentElement.innerHTML = ''; // Clear previous content

//     // Dynamically create and append content
//     var details = [
//         { key: 'Date', value: date.format() },
//         { key: 'Status of approving booking', value: foundBooking.status },
//         { key: 'Name of the customer', value: moreDetails.name },
//         { key: 'Location', value: moreDetails.location },
//         { key: 'Phone Number', value: moreDetails.number },
//         { key: 'The day the order was placed', value: moreDetails.placed_Date },
//     ];

//     details.forEach(function(detail) {
//         var detailDiv = document.createElement("div");
//         detailDiv.style.textAlign = "left"; // Ensure text is aligned to the left
//         detailDiv.innerHTML = `<strong>${detail.key}:</strong> ${detail.value}`;
//         modalContentElement.appendChild(detailDiv);
//     });

//     // Display the modal
//     document.getElementById("myModal").style.display = "block";
// }

// // Close modal functionality
// document.getElementsByClassName("close")[0].onclick = function() {
//     document.getElementById("myModal").style.display = "none";
// }


















        }

        ,
        select: function(start, end, jsEvent, view) {
            console.log('Selected date: ' + start.format());

            document.getElementById("hiddenSelectedDates").value = start.format();
        }
    });
});
