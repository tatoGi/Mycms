"use strict";

var KTCalendarBasic = function() {

    return {
        //main function to initiate the module
        init: function() {
            var todayDate = moment().startOf('day');
            var YM = todayDate.format('YYYY-MM');
            var year = todayDate.format('YYYY');
            var birthdays = JSON.parse(document.querySelector('input[name=birthdays]').value);
console.log(birthdays)
            var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
            var TODAY = todayDate.format('YYYY-MM-DD');
            var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

            var calendarEl = document.getElementById('kt_calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid', 'list' ],
                themeSystem: 'bootstrap',
                isRTL: KTUtil.isRTL(),
                locale : 'ka',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },

                height: 800,
                contentHeight: 780,
                aspectRatio: 3,  // see: https://fullcalendar.io/docs/aspectRatio

                nowIndicator: true,
                now: TODAY + 'T09:25:00', // just for demo

                views: {
                    dayGridMonth: { buttonText: 'თვე' },
                    timeGridWeek: { buttonText: 'კვირა' },
                    timeGridDay: { buttonText: 'დღე' }
                },

                defaultView: 'dayGridMonth',
                defaultDate: TODAY,

                editable: true,
                eventLimit: false, // allow "more" link when too many events
                navLinks: true,
                events: birthdays,
                // events: [
                //     {
                //         title: 'ირაკლი ბანძელაძე',
                //         start: YM + '-01',
                //         className: "fc-event-danger fc-event-solid-warning"
                //     },
                    
                //     {
                //         title: 'ირაკლი ბანძელაძე',
                //         start: YM + '-02',
                //         className: "fc-event-danger fc-event-solid-warning"
                //     },
                //     {
                //         title: 'ირაკლი ბანძელაძე',
                //         start: YM + '-06',
                //         className: "fc-event-danger fc-event-solid-warning"
                //     },
                // ],

                eventRender: function(info) {
                    var element = $(info.el);
                    if (info.event.extendedProps && info.event.extendedProps.description) {
                        if (element.hasClass('fc-day-grid-event')) {
                            element.data('content', info.event.extendedProps.description);
                            element.data('placement', 'top');
                            KTApp.initPopover(element);
                        } else if (element.hasClass('fc-time-grid-event')) {
                            element.find('.fc-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                        } else if (element.find('.fc-list-item-title').lenght !== 0) {
                            element.find('.fc-list-item-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                        }
                    }
                }
            });
            // calendar.setOption('locales', 'ka');
            calendar.render();
        }
    };
}();

jQuery(document).ready(function() {
    KTCalendarBasic.init();
});
