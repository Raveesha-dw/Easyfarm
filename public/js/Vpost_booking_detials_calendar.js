$(document).ready(function() {
    var calendarElement = document.getElementById('calendar');
    var unavailableDatesJson = calendarElement.getAttribute('data-unavailable-dates');
    var unconfirmed_booking_datesJson = calendarElement.getAttribute('data-unconfirmed_booking_dates');
    var confirmed_booking_datesJson = calendarElement.getAttribute('data-confirmed_booking_dates');
    var post_create_dateJson = calendarElement.getAttribute('data-create-date');
    var booking_DataJson = calendarElement.getAttribute('data-booking_Data');

    var unavailableDates = JSON.parse(unavailableDatesJson);
    var unconfirmed_booking_dates = JSON.parse(unconfirmed_booking_datesJson);
    var confirmed_booking_dates = JSON.parse(confirmed_booking_datesJson);
    var booking_Data = JSON.parse(booking_DataJson);
    console.log(booking_Data);
    var post_create_date = JSON.parse(post_create_dateJson);

    var today = moment().startOf('day'); // Get today's date
    var postCreateDate = moment(post_create_date);
    var threeMonthsLater = postCreateDate.add(3, 'months').endOf('day'); // Get date three months later

    $('#calendar').fullCalendar({
        defaultView: 'month',
        editable: true,
        selectable: true, // Allow date selection
        validRange: {
            start: today.format(), // Set the start of the valid range to today
            end: threeMonthsLater.format() // Set the end of the valid range to three months later
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
                    color: '#26d87f' // Green
                });
            });

            callback(events);
        },
        dayClick: function(date, jsEvent, view) {
            // Check if the clicked date is in the booking data
            var clickedDate = date.format('YYYY-MM-DD');
            var found = booking_Data.some(function(item) {
                return item.date === clickedDate;
            });
            if (found) {
                // Popup message when clicking a date
                alert('You clicked on: ' + date.format());
            }
        },
        select: function(start, end, jsEvent, view) {
            // Print the selected date
            console.log('Selected date: ' + start.format());
            // You can do further actions with the selected date here

            document.getElementById("hiddenSelectedDates").value = start.format();
        }
    });
});
