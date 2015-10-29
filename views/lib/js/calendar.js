//Full Calendar
var m = moment();
$('#calendar').fullCalendar({
	header: {
		left: 'prev,next today',
		center: 'title',
		right: 'month,agendaWeek,agendaDay'
	},
	lang: 'fr',
	defaultDate: m,
	editable: false,
	eventLimit: true, // allow "more" link when too many events
	events: "",
	selectable: false,
});
