<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" type="image" href="view/img/favicon.ico"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="view/css/style.css">
  <link rel="stylesheet" href="view/css/clndr.css">
  <title>Asociacion Integral</title>
</head>
<body>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

    <header>
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img alt="logo" src="view/img/worldwide.png"></a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Principal <span class="sr-only">(current)</span></a></li>
              <li><a href="?calendar">Actividades</a></li>
            </ul>
            
            <form action="?login=log" class="navbar-form navbar-right" method="POST">
              <div class="form-group">
                <label class="sr-only" for="emailLogin">Ingrese su correo</label>
                <input type="email" class="form-control" id="emailLogin" placeholder="Ingrese su correo">
              </div>
              <div class="form-group">
                <label class="sr-only" for="passwordLogin">Ingrese su contrase&ntilde;a</label>
                <input type="password" class="form-control" id="passwordLogin" placeholder="Ingrese su contrase&ntilde;a">
              </div>
              
              <button type="submit" class="btn btn-success">Ingresar</button>
            </form>
          </div>
        </div>
      </nav>
    </header>

    <div class="container">
