(function($) {
  'use strict';
  $(function() {
    if ($('#calendar').length) {
      $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,basicWeek,basicDay'
        },
        defaultDate: '2022-05-12',
        navLinks: true, 
        editable: true,
        eventLimit: true, 
        events: [{
            title: 'All Day Event',
            start: '2022-05-12'
          },
          {
            title: 'Long Event',
            start: '2022-05-12',
            end: '2022-05-12'
          },
          {
            id: 999,
            title: 'Repeating Event',
            start: ''2022-05-12 T16:00:00'
          },
          {
            id: 999,
            title: 'Repeating Event',
            start: ''2022-05-12T16:00:00'
          },
          {
            title: 'Conference',
            start: '2017-07-11',
            end: '2017-07-13'
          },
          {
            title: 'Meeting',
            start: '2017-07-12T10:30:00',
            end: '2017-07-12T12:30:00'
          },
          {
            title: 'Lunch',
            start: '2017-07-12T12:00:00'
          },
          {
            title: 'Meeting',
            start: '2017-07-12T14:30:00'
          },
          {
            title: 'Happy Hour',
            start: '2017-07-12T17:30:00'
          },
          {
            title: 'Dinner',
            start: '2022-05-12'
          },
          {
            title: 'Birthday Party',
            start: '2022-05-12'
          },
          {
            title: 'Click for Google',
            url: 'http://google.com/',
            start: '2022-05-12'
          }
        ]
      })
    }
  });
})(jQuery);
