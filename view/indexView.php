<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="view/css/style.css">
  <link rel="stylesheet" href="view/css/clndr.css">
  <title>Asociacion Integral</title>
</head>
<body>
    <header>
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img alt="logo" src="view/img/worldwide.png"></a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Principal <span class="sr-only">(current)</span></a></li>
              <li><a href="#">Actividades</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <div id="mini-clndr"></div>
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

    <footer>

    </footer>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="view/js/moment.js"></script>
    <script src="view/js/underscore.js"></script>
    <script src="view/js/clndr.js"></script>
    <script src="view/js/main.js"></script>
</body>
</html>
