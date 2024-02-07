

// // // // // // var today = new Date();
// // // // // // var threeMonthsLater = new Date();
// // // // // // threeMonthsLater.setMonth(today.getMonth() + 3);

// // // // // // $('#calendar').multiDatesPicker({
// // // // // //     minDate: today,
// // // // // //     maxDate: threeMonthsLater
// // // // // // });


// // // // //  $(document).ready(function () {
// // // // //         var today = new Date();
// // // // //         var threeMonthsLater = new Date();
// // // // //         threeMonthsLater.setMonth(today.getMonth() + 3);

// // // // //         $('#calendar').fullCalendar({
// // // // //             header: {
// // // // //                 left: 'prev,next today',
// // // // //                 center: 'title',
// // // // //                 right: 'month,agendaWeek,agendaDay'
// // // // //             },
// // // // //             defaultDate: today,
// // // // //             editable: true,
// // // // //             eventLimit: true,
// // // // //             events: [
// // // // //                 // your events data goes here
// // // // //             ],
// // // // //             dayClick: function (date, jsEvent, view) {
// // // // //                 // handle day click
// // // // //             },
// // // // //             // Add the following eventRender callback
// // // // //             eventRender: function (event, element) {
// // // // //                 return [event.start >= today && event.start <= threeMonthsLater];
// // // // //             }
// // // // //         });
// // // // //     });









// // // // $(document).ready(function () {
// // // //     var today = new Date();
// // // //     var threeMonthsLater = new Date();
// // // //     threeMonthsLater.setMonth(today.getMonth() + 3);

// // // //     $('#calendar').fullCalendar({
// // // //         header: {
// // // //             left: 'prev,next today',
// // // //             center: 'title',
// // // //             // right: 'month,agendaWeek,agendaDay'
// // // //         },
// // // //         defaultDate: today,
// // // //         editable: true,
// // // //         eventLimit: true,
// // // //         events: [
// // // //             // your events data goes here
// // // //         ],
// // // //         dayClick: function (date, jsEvent, view) {
// // // //             // handle day click
// // // //         },
// // // //         validRange: {
// // // //             start: today,
// // // //             end: threeMonthsLater
// // // //         }
// // // //     });
// // // // });





// // // $(document).ready(function () {
// // //     var yesterday = new Date();
// // //     yesterday.setDate(yesterday.getDate() - 1);

// // //     var threeMonthsLater = new Date();
// // //     threeMonthsLater.setMonth(threeMonthsLater.getMonth() + 3);

// // //     $('#calendar').fullCalendar({
// // //         header: {
// // //             left: 'prev,next today',
// // //             center: 'title',
// // //             right: 'month,agendaWeek,agendaDay'
// // //         },
// // //         defaultDate: yesterday, // Set defaultDate to yesterday
// // //         editable: true,
// // //         eventLimit: true,
// // //         events: [
// // //             // your events data goes here
// // //         ],
// // //         dayClick: function (date, jsEvent, view) {
// // //             // handle day click
// // //         },
// // //         validRange: function(nowDate) {
// // //             return {
// // //                 start: yesterday,
// // //                 end: threeMonthsLater
// // //             };
// // //         }
// // //     });
// // // });






// // // $(document).ready(function () {
// // //     var yesterday = new Date();
// // //     yesterday.setDate(yesterday.getDate() - 1);

// // //     var threeMonthsLater = new Date();
// // //     threeMonthsLater.setMonth(threeMonthsLater.getMonth() + 3);

// // //     $('#calendar').fullCalendar({
// // //         header: {
// // //             left: 'prev,next today',
// // //             center: 'title',
// // //             right: 'month,agendaWeek,agendaDay'
// // //         },
// // //         defaultDate: yesterday,
// // //         editable: true,
// // //         eventLimit: true,
// // //         events: [
// // //             // your events data goes here
// // //         ],
// // //         dayClick: function (date, jsEvent, view) {
// // //             // Remove the existing 'clicked-date' class from all td elements
// // //             $('td.clicked-date').removeClass('clicked-date');

// // //             // Add the 'clicked-date' class to the clicked date's td element
// // //             $(jsEvent.currentTarget).addClass('clicked-date');
// // //         },
// // //         validRange: function(nowDate) {
// // //             return {
// // //                 start: yesterday,
// // //                 end: threeMonthsLater
// // //             };
// // //         }
// // //     });
// // // });




// // $(document).ready(function () {
// //     var yesterday = new Date();
// //     yesterday.setDate(yesterday.getDate() - 1);

// //     var threeMonthsLater = new Date();
// //     threeMonthsLater.setMonth(threeMonthsLater.getMonth() + 3);

// //     $('#calendar').fullCalendar({
// //         header: {
// //             left: 'prev,next today',
// //             center: 'title',
// //             right: 'month,agendaWeek,agendaDay'
// //         },
// //         defaultDate: yesterday,
// //         editable: true,
// //         eventLimit: true,
// //         events: [
// //             // your events data goes here
// //         ],
// //         dayClick: function (date, jsEvent, view) {
// //             // Remove the existing 'fc-day-top' class from all td elements
// //             $('.fc-day-top').removeClass('clicked-date');

// //             // Add the 'clicked-date' class to the clicked date's td element
// //             $(jsEvent.currentTarget).addClass('clicked-date');
// //         },
// //         validRange: function(nowDate) {
// //             return {
// //                 start: yesterday,
// //                 end: threeMonthsLater
// //             };
// //         }
// //     });
// // });









// $(document).ready(function () {
//     var yesterday = new Date();
//     yesterday.setDate(yesterday.getDate() - 1);

//     var threeMonthsLater = new Date();
//     threeMonthsLater.setMonth(threeMonthsLater.getMonth() + 3);

//     $('#calendar').fullCalendar({
//         header: {
//             left: 'prev,next today',
//             center: 'title',
//             right: 'month,agendaWeek,agendaDay'
//         },
//         defaultDate: yesterday,
//         editable: true,
//         eventLimit: true,
//         events: [
//             // your events data goes here
//         ],
//         dayClick: function (date, jsEvent, view) {

//             $('#calendar').multiDatesPicker();
//             // Remove the existing 'fc-day-top' class from all td elements
//             $('.fc-day-top').removeClass('clicked-date');

//             // Add the 'clicked-date' class to the clicked date's td element
//             $(jsEvent.currentTarget).addClass('clicked-date');

//             // Change the background color of the clicked date to red
//             $(jsEvent.currentTarget).css('background-color', 'red');
//         },
//         validRange: function(nowDate) {
//             return {
//                 start: yesterday,
//                 end: threeMonthsLater
//             };
//         }
//     });
// });

$(function() {
  var today = new Date();
  var threeMonthsFromNow = new Date();
  threeMonthsFromNow.setMonth(today.getMonth() + 3);

  // Initialize the datepicker
  $('#calendar').datepicker({
    minDate: today, // Disable past dates
    maxDate: threeMonthsFromNow, // Disable dates beyond three months
    dateFormat: 'dd/mm/yy', // Date format
    onSelect: function(dateText, inst) {
      // Do something when a date is selected
      console.log('Selected date:', dateText);
    }
  });
});
