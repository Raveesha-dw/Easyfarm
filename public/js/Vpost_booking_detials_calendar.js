$(document).ready(function() {
    var calendarElement = document.getElementById('calendar');
    var unavailableDatesJson = calendarElement.getAttribute('data-unavailable-dates');
    
    var unconfirmed_booking_datesJson = calendarElement.getAttribute('data-unconfirmed_booking_dates');
    console.log(unconfirmed_booking_datesJson);
    var confirmed_booking_datesJson = calendarElement.getAttribute('data-confirmed_booking_dates');
    var post_create_dateJson = calendarElement.getAttribute('data-create-date');

    var unavailableDates = JSON.parse(unavailableDatesJson);
    var unconfirmed_booking_dates = JSON.parse(unconfirmed_booking_datesJson);
    var confirmed_booking_dates = JSON.parse(confirmed_booking_datesJson);
    var post_create_date = JSON.parse(post_create_dateJson);
console.log(confirmed_booking_dates);
// console.log(unavailableDates);
// console.log(unconfirmed_booking_dates);
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
        }
    });
});
