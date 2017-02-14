/*var currentMonth = moment().format('YYYY-MM');
var nextMonth    = moment().add(1, 'month').format('YYYY-MM');
var events = [
  { date: '2017-02-12', title: 'Este es el titulo', location: 'En mi casa', person: 'Adrian'},
  { date: currentMonth + '-' + '19', title: 'Cat Frisbee', location: 'Jefferson Park' },
  { date: currentMonth + '-' + '23', title: 'Kitten Demonstration', location: 'Center for Beautiful Cats' },
  { date: nextMonth + '-' + '07',    title: 'Small Cat Photo Session', location: 'Center for Cat Photography' }
];
*/

$('#mini-clndr').clndr({
  template: $('#calendar-template').html(),
  events: events,
  clickEvents: {
    click: function(target) {
      if(target.events.length) {
        var daysContainer = $('#mini-clndr').find('.days-container');
        daysContainer.toggleClass('show-events', true);

        console.log(target);
        alert("Date: "+target.date._i+", location: "+target.events[0].location+", title: "+target.events[0].title+
              ", person: "+target.events[0].person+", description"+target.events[0].description);

        $('#mini-clndr').find('.x-button').click( function() {
          daysContainer.toggleClass('show-events', false);
        });
      }else{
        target.events.push({ date: target.date._i, title: 'Nuevo titulo', location: 'Por hay', person: 'Jose'});
        console.log(target);
        alert("Date: "+target.date._i+", location: "+target.events[0].location+", title: "+target.events[0].title+
              ", person: "+target.events[0].person+", description"+target.events[0].description);
      }
    }
  },
  adjacentDaysChangeMonth: true
});
