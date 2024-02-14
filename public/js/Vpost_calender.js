$(document).ready(function() {
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




    function sendMarkedDates() {
        var myValue = "Hello from JavaScript!";
        document.getElementById("hiddenInputDates").value = myValue;
    }

    


    // clearing the selection on button click
    $('#clearSelectionBtn').click(function() {
        $('.selected').removeClass('selected').css('background-color', ''); // Reset background color
        selectedDates = []; // Clear the selected dates array
        
    });
});
