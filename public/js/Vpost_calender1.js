// $(document).ready(function () {
//     var addedDates = {};

//     initializeCalendar();

//     function initializeCalendar() {
//         addedDates = {};

//         var calendar = $('#calendar').fullCalendar({
//             editable: true,
//             events: "../Calendar/fetch_anavailble_Dates",
//             displayEventTime: false,
//             selectable: true,
//             selectHelper: true,
//             select: function (start, end, allDay) {
//                 var selectedDate = start.format('YYYY-MM-DD');

//                 if (!addedDates[selectedDate]) {
//                     var title = "ADDED";
//                     if (title) {
//                         $.ajax({
//                             url: '../V_post/create_post',
//                             data: 'title=' + title + '&start=' + selectedDate + '&end=' + selectedDate,
//                             type: "POST",
//                             success: function (data) {
//                                 displayMessage("Added Successfully");
//                                 addedDates[selectedDate] = true;
//                                 calendar.fullCalendar('renderEvent', {
//                                     title: title,
//                                     start: selectedDate,
//                                     end: selectedDate,
//                                     allDay: true
//                                 }, true);
//                             }
//                         });
//                     }
//                 } else {
//                     alert("An event has already been added for this date.");
//                 }
//                 calendar.fullCalendar('unselect');
//             }
//         });


//         function highlightAddedDate(date) {
//             var $dateCell = $('.fc-day[data-date="' + date + '"]');
//             $dateCell.css('background-color', 'black');
//         }




















//         // Prevent dragging for multiple date selection
//         var isDragging = false;
//         var dragThreshold = 5; // Adjust this value if needed for sensitivity

//         $('#calendar').on('mousedown', function (e) {
//             var startX = e.pageX,
//                 startY = e.pageY;

//             $(document).on('mousemove.drag', function (e) {
//                 var currentX = e.pageX,
//                     currentY = e.pageY;

//                 if (Math.abs(currentX - startX) > dragThreshold || Math.abs(currentY - startY) > dragThreshold) {
//                     isDragging = true;
//                     $(document).off('mousemove.drag');
//                 }
//             });
//         });

//         $(document).on('mouseup', function () {
//             $(document).off('mousemove.drag');
//             if (isDragging) {
//                 isDragging = false;
//                 return false; // Prevent further action
//             }
//         });
//     }

//     function displayMessage(message) {
//         $(".response").html("<div class='success'>" + message + "</div>");
//         setInterval(function () { $(".success").fadeOut(); }, 2000);
//     }
// });



// $(document).ready(function () {
//     var addedDates = {};

//     initializeCalendar();

//     function initializeCalendar() {
//         addedDates = {};

//         var calendar = $('#calendar').fullCalendar({
//             editable: true,
//             events: "../Calendar/fetch_anavailble_Dates",
//             displayEventTime: false,
//             selectable: true,
//             selectHelper: true,
//             select: function (start, end, allDay) {
//                 var selectedDate = start.format('YYYY-MM-DD');

//                 if (!addedDates[selectedDate]) {
//                     var title = "ADDED";
//                     if (title) {
//                         $.ajax({
//                             url: '../V_post/create_post',
//                             data: 'title=' + title + '&start=' + selectedDate + '&end=' + selectedDate,
//                             type: "POST",
//                             success: function (data) {
//                                 displayMessage("Added Successfully");
//                                 addedDates[selectedDate] = true;
//                                 highlightAddedDate(selectedDate);
//                             }
//                         });
//                     }
//                 } else {
//                     alert("An event has already been added for this date.");
//                 }
//                 calendar.fullCalendar('unselect');
//             }
//         });

//         // Prevent dragging for multiple date selection
//         var isDragging = false;
//         var dragThreshold = 5; // Adjust this value if needed for sensitivity

//         $('#calendar').on('mousedown', function (e) {
//             var startX = e.pageX,
//                 startY = e.pageY;

//             $(document).on('mousemove.drag', function (e) {
//                 var currentX = e.pageX,
//                     currentY = e.pageY;

//                 if (Math.abs(currentX - startX) > dragThreshold || Math.abs(currentY - startY) > dragThreshold) {
//                     isDragging = true;
//                     $(document).off('mousemove.drag');
//                 }
//             });
//         });

//         $(document).on('mouseup', function () {
//             $(document).off('mousemove.drag');
//             if (isDragging) {
//                 isDragging = false;
//                 return false; // Prevent further action
//             }
//         });
//     }

//     function highlightAddedDate(date) {
//         var $dateCell = $('.fc-day[data-date="' + date + '"]');
//         $dateCell.css('background-color', 'white');
//         $dateCell.append('<span class="added-text">ADDED</span>'); // Append the text "ADDED"
//     }
    

//     function displayMessage(message) {
//         $(".response").html("<div class='success'>" + message + "</div>");
//         setInterval(function () { $(".success").fadeOut(); }, 2000);
//     }
// });



$(document).ready(function () {
    var addedDates = {};

    initializeCalendar();

    function initializeCalendar() {
        addedDates = {};

        var today = moment().startOf('day'); // Get today's date
        var calendar = $('#calendar').fullCalendar({
            editable: true,
            events: "../Calendar/fetch_anavailble_Dates",
            displayEventTime: false,
            selectable: true,
            selectHelper: true,
            validRange: {
                start: today // Set the valid range to start from today
            },
            select: function (start) {
                var selectedDate = start.format('YYYY-MM-DD');

                if (!addedDates[selectedDate]) {
                    var title = "ADDED";
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
            'background-color': 'black',
            'position': 'relative' // Set position to relative to position the added text
        });
        $dateCell.append('<span class="added-text">ADDED</span>'); // Append the text "ADDED" inside the date square
    }
    
    function displayMessage(message) {
        $(".response").html("<div class='success'>" + message + "</div>");
        setInterval(function () { $(".success").fadeOut(); }, 2000);
    }
});
