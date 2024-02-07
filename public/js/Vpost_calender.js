$(document).ready(function () {
    var addedDates = {};

    initializeCalendar();

    function initializeCalendar() {
        addedDates = {};

        var currentDate = moment();
        var threeMonthsLater = moment().add(3, 'months');

        var calendar = $('#calendar').fullCalendar({
            editable: true,
            events: "../Calendar/fetch_anavailble_Dates",
            displayEventTime: false,
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {
                var selectedDate = start.format('YYYY-MM-DD');

                if (!addedDates[selectedDate]) {
                    var title = "Unavailable";
                    if (title) {
                        $.ajax({
                            url: '../V_post/create_post',
                            data: 'title=' + title + '&start=' + selectedDate + '&end=' + selectedDate,
                            type: "POST",
                            success: function (data) {
                                displayMessage("Added Successfully");
                                addedDates[selectedDate] = true;
                                highlightAddedDate(selectedDate);
                            }
                        });
                    }
                } else {
                    alert("An event has already been added for this date.");
                }
                calendar.fullCalendar('unselect');
            },
            validRange: {
                start: currentDate,
                end: threeMonthsLater
            }
        });

        // Prevent dragging for multiple date selection
        var isDragging = false;
        var dragThreshold = 5; // Adjust this value if needed for sensitivity

        $('#calendar').on('mousedown', function (e) {
            var startX = e.pageX,
                startY = e.pageY;

            $(document).on('mousemove.drag', function (e) {
                var currentX = e.pageX,
                    currentY = e.pageY;

                if (Math.abs(currentX - startX) > dragThreshold || Math.abs(currentY - startY) > dragThreshold) {
                    isDragging = true;
                    $(document).off('mousemove.drag');
                }
            });
        });

        $(document).on('mouseup', function () {
            $(document).off('mousemove.drag');
            if (isDragging) {
                isDragging = false;
                return false; // Prevent further action
            }
        });
    }

function highlightAddedDate(date) {
        var $dateCell = $('.fc-day[data-date="' + date + '"]');
        $dateCell.css({
            'background-color': 'brown',
            'position': 'relative' // Set position to relative to position the added text
        });
        $dateCell.append('<span class="added-text">Unavailable</span>'); // Append the text "ADDED" inside the date square
    }

    function displayMessage(message) {
        $(".response").html("<div class='success'>" + message + "</div>");
        setInterval(function () { $(".success").fadeOut(); }, 2000);
    }
});
