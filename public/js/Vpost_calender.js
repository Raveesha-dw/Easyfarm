$(document).ready(function() {
    var selectedDates = []; // Array to store selected dates

    $('#calendar').fullCalendar({
        // Your FullCalendar options here...
        // For example:
        defaultView: 'month',
        editable: true,
        selectable: true, // Allow date selection
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
        }
    });

    // Example of clearing the selection on button click
    $('#clearSelectionBtn').click(function() {
        // Remove selection
        $('.selected').removeClass('selected').css('background-color', ''); // Reset background color
        selectedDates = []; // Clear the selected dates array
    });
});

