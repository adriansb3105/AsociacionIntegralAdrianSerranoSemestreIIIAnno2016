<?php include_once 'header.php'; ?>

<script>
  var events = [<?php
      if (isset($events_array)) {
        echo $events_array;
      }
    ?>];
    console.log(events);
</script>

    <div id="mini-clndr" class=""></div>
      <script id="calendar-template" type="text/template">
        <div class="controls">
          <div class="clndr-previous-button">&lsaquo;</div><div class="month"><%= month %></div><div class="clndr-next-button">&rsaquo;</div>
        </div>

        <div class="days-container">
          <div class="days">
            <div class="headers">
              <% _.each(daysOfTheWeek, function(day) { %><div class="day-header"><%= day %></div><% }); %>
            </div>
            <% _.each(days, function(day) { %><div class="<%= day.classes %>" id="<%= day.id %>"><%= day.day %></div><% }); %>
          </div>
        </div>
      </script>



      <script src="view/js/moment.js"></script>
      <script src="view/js/underscore.js"></script>
      <script src="view/js/clndr.js"></script>
      <script src="view/js/main.js"></script>

<?php include_once 'footer.php'; ?>
