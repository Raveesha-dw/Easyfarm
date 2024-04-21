


$(document).ready(function() {



    // var modal = document.getElementById("myModal");
    // var okBtn = document.getElementById("modal-ok-btn");
  
// okBtn.onclick = function(event) {
//     event.preventDefault();
//     modal.style.display = "none";
// }



    // Initialize selectedDates array to store selected dates
    var selectedDates = [];

console.log(lastday); // This will log the month data to the console

    var today = moment().startOf('day'); // Get today's date
    var threeMonthsLater = lastday; // Get date three months later

    var selectedDates = [];// Array to store selected dates
    var unavailableDates = jsonData;
    var pendingdates = jsonData1;

   

    var calendar = $('#calendar').fullCalendar({

          events: [
    ...unavailableDates.map(function(dateString) {
        return {
            title: 'Unavailable', // Displayed title for the event
            start: dateString, // Start date of the event
            rendering: 'background', // Render the event as background
            color: 'red' // Background color of the event
        };
    }),
    ...pendingdates.map(function(dateString) {
        return {
            title: 'Pending', // Displayed title for the event
            start: dateString, // Start date of the event
            rendering: 'background', // Render the event as background
            color: 'blue' // Background color of the event
        };
    })
],

        


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
           
            var currentDate = moment(start);
            while (currentDate.isBefore(end, 'day')) {
                var dateStr = currentDate.format('YYYY-MM-DD');

                    
                if (unavailableDates.includes(dateStr)) {
                  
                
                    
                     showModal('This date is unavailable for booking.');
            return false;
                }
     
    

function showModal(message) {
  // Get the modal element
  var modal = document.getElementById("myModal");
  // Get the <span> element that closes the modal
  var okBtn = document.getElementById("modal-ok-btn");
  // Get the message container
  var modalContent = document.getElementById("modal-content");

  // Set the message content
  modalContent.innerHTML = message;

  // Display the modal
  modal.style.display = "block";

  // When the user clicks on OK button, close the modal
  okBtn.onclick = function() {
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
}




                var index = selectedDates.indexOf(dateStr);
                if (index !== -1) {
                    // Date is already selected, so unselect it
                    selectedDates.splice(index, 1);
                    $('td[data-date="' + dateStr + '"]').removeClass('selected').css('background-color', '').find('.added-text').remove();
                } else {
                    // Date is not selected, so select it
                    selectedDates.push(dateStr);
                    $('td[data-date="' + dateStr + '"]').addClass('selected').css({
                        'background-color': 'green',
                        'position': 'relative' // Ensure the parent container has position:relative
                    });

                    // Check if the "Allocated" text already exists before appending it
                    if (!$('td[data-date="' + dateStr + '"]').find('.added-text').length) {
                        $('td[data-date="' + dateStr + '"]').append('<span class="added-text"></span>');
                    }

                    // Apply styles for the added text
                    $('.added-text').css({
                        'color': 'red', 
                        'position': 'absolute',
                        'top': '50%',
                        'left': '50%',
                        'transform': 'translate(-50%, -50%)',
                        'z-index': '1' 
                    });

                }
                currentDate.add(1, 'day');
            }
            console.log("Marked Dates:", selectedDates); // Log the marked dates
            sendMarkedDates(selectedDates); // Send the marked dates to the controller
            document.getElementById("hiddenInputDates").value = JSON.stringify(selectedDates);
        },

        viewRender: function(view, element) {
            // When the view changes, ensure that selected dates remain black
            selectedDates.forEach(function(dateStr) {
                $('td[data-date="' + dateStr + '"]').addClass('selected').css({
                    'background-color': 'black',
                    'position': 'relative'
                });
                if (!$('td[data-date="' + dateStr + '"]').find('.added-text').length) {
                    $('td[data-date="' + dateStr + '"]').append('<span class="added-text">Allocated</span>');
                }
                $('.added-text').css({
                    'color': 'red',
                    'position': 'absolute',
                    'top': '50%',
                    'left': '50%',
                    'transform': 'translate(-50%, -50%)',
                    'z-index': '1'
                });
            });
        }










    });
    

    // Function to send marked dates to the controller
    function sendMarkedDates(datesArray) {
        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();
        // url: '../V_post/create_post',
        

        // Set up the request
        xhr.open("POST",'../V_post/create_post' , true);

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
        $('.selected').removeClass('selected').css('background-color', '').find('.added-text').remove(); // Reset background color and remove added text
        selectedDates = []; // Clear the selected dates array
        console.log("Marked Dates:", selectedDates); // Log the marked dates after clearing
        sendMarkedDates(selectedDates); // Send the empty marked dates array to the controller
    });
});


