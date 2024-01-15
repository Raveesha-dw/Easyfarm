$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: "<?php echo URLROOT ?>/Calendar/fetch_anavailble_Dates",
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            // var title = prompt('Event Title:');
            var title = "unavailable";

            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                $.ajax({
                    // url: '<?php echo URLROOT ?>/Calendar/add_anavailble_Dates',
                    url: '../Calendar/add_anavailble_Dates',
                    data: 'title=' + title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    // print: console.log('title=' + title + '&start=' + start + '&end=' + end),
                    success: function (data) {
                        console.log("data");
                        displayMessage("Added Successfully");
                    }
                });
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                true
                        );
            }
            calendar.fullCalendar('unselect');
        },
        
        editable: true,
        eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: '../Calendar/edit_anavailble_Dates',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("Updated Successfully");
                        }
                    });
                },
        eventClick: function (event) {
             console.log("11111111");
            var deleteMsg = confirm("Do you really want to delete?");
            console.log("kkkkkkkkk");
             
            if (deleteMsg) {
                
                $.ajax({
                    
                    type: "POST",
                    url: "../Calendar/delete_anavailble_Dates",
                    data: "id=" + event.id,
                    success: function (response) {
                        // displayMessage(response);
                        console.log("hasi");
                        console.log(response);
                        if(parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            displayMessage("Deleted Successfully");
                        }
                    }
                });
            }
        }

    });
});

function displayMessage(message) {
	    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 2000);
}
