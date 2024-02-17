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
                toggleDateSelection(dateStr);
                currentDate.add(1, 'day');
            }
            updateHiddenInput();
        },
        dayClick: function(date, jsEvent, view) {
            // Ensure only month view navigation triggers the actions
            if (view.name === 'month') {
                $('#calendar').fullCalendar('gotoDate', date);
            }
        },
        viewRender: function(view, element) {
            markSelectedDates(selectedDates);
        }
    });

    // Function to toggle date selection
    function toggleDateSelection(dateStr) {
        var index = selectedDates.indexOf(dateStr);
        if (index !== -1) {
            selectedDates.splice(index, 1);
        } else {
            selectedDates.push(dateStr);
        }
        markSelectedDates(selectedDates);
    }

    // Function to mark selected dates
    function markSelectedDates(dates) {
        $('.selected').removeClass('selected').css('background-color', ''); // Reset background color
        dates.forEach(function(dateStr) {
            $('td[data-date="' + dateStr + '"]').addClass('selected').css('background-color', '#d25151');
        });
    }

    // Function to update hidden input field
    function updateHiddenInput() {
        document.getElementById("hiddenInputDates").value = selectedDates;
    }


    // Mark the dates from the given array as selected
    dates.forEach(function(dateStr) {
        selectedDates.push(dateStr);
        $('td[data-date="' + dateStr + '"]').addClass('selected').css('background-color', '#d25151');
    });



    // Button click event to clear selection
    $('#clearSelectionBtn').click(function() {
        selectedDates = [];
        markSelectedDates(selectedDates);
        updateHiddenInput();
    });
});
