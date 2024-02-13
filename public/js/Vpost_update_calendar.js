$(document).ready(function() {

    // Retrieve dates from the data attribute
    var calendarElement = document.getElementById('calendar');
    var datesJson = calendarElement.getAttribute('data-dates');
    var dates = JSON.parse(datesJson);

    // Use dates array to populate the calendar or perform any other actions
//     console.log(dates);

    var today = moment().startOf('day'); // Get today's date
    var threeMonthsLater = moment().add(3, 'months').endOf('day'); // Get date three months later

    var selectedDates = []; // Array to store selected dates

    $('#calendar').fullCalendar({

        defaultView: 'month',
        editable: true,
        selectable: true, // Allow date selection
        validRange: {
            start: today, // Set the start of the valid range to today
            end: threeMonthsLater // Set the end of the valid range to three months later
        },
        select: function(start, end) {
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

            document.getElementById("hiddenInputDates").value = selectedDates;

        }
    });

    // Mark the dates from the given array as selected
    dates.forEach(function(dateStr) {
        selectedDates.push(dateStr);
        $('td[data-date="' + dateStr + '"]').addClass('selected').css('background-color', '#d25151');
    });


    //clearing the selection on button click
    $('#clearSelectionBtn').click(function() {
        // Remove selection
        $('.selected').removeClass('selected').css('background-color', ''); // Reset background color
        selectedDates = []; // Clear the selected dates array
        console.log("Marked Dates:", selectedDates); // Log the marked dates after clearing
    });
});
