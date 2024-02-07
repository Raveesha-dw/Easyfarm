$(document).ready(function () {
    var addedDates = {};

    initializeCalendar();

    function initializeCalendar() {
        addedDates = {};

        var calendar = $('#calendar').fullCalendar({
            editable: true,
            events: "../Calendar/fetch_anavailble_Dates",
            displayEventTime: false,
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {
                var selectedDate = $.fullCalendar.formatDate(start, "Y-MM-DD");
                
                if (!addedDates[selectedDate]) {
                    var title = "ADDED";
                    if (title) {
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                        $.ajax({
                            url: '../V_post/create_post',
                            data: 'title=' + title + '&start=' + start + '&end=' + end,
                            type: "POST",
                            success: function (data) {
                                displayMessage("Added Successfully");
                                addedDates[selectedDate] = true;
                            }
                        });

                        calendar.fullCalendar('renderEvent', {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        }, true);
                    }
                    calendar.fullCalendar('unselect');
                } else {
                    alert("An event has already been added for this date.");
                }
            },
            eventDrop: function (event, delta) {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                // $.ajax({
                //     url: '../Calendar/edit_anavailble_Dates',
                //     data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event._id,
                //     type: "POST",
                //     success: function (response) {
                //         displayMessage("Updated Successfully");
                //     }
                // });
            },
            eventClick: function (event) {
                var deleteMsg = confirm("Do you really want to delete?");
                if (deleteMsg) {
                    // $.ajax({
                    //     type: "POST",
                    //     url: "../Calendar/delete_anavailble_Dates",
                    //     data: "id=" + event.id,
                    //     success: function (response) {
                    //         if (parseInt(response) > 0) {
                    //             $('#calendar').fullCalendar('removeEvents', event.id);
                    //             displayMessage("Deleted Successfully");
                    //             var selectedDate = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                    //             addedDates[selectedDate] = false;
                    //         }
                    //     }
                    // });
                }
            }
        });
    }

    function displayMessage(message) {
        $(".response").html("<div class='success'>" + message + "</div>");
        setInterval(function () { $(".success").fadeOut(); }, 2000);
    }
});
