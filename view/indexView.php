<?php include_once 'header.php';

  if(isset($errorLogin)){
    echo '<div class="alert alert-danger alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
              <strong>Error!</strong> Usuario o contrase&ntilde;a incorrectos
          </div>';
  }
?>

<div class="jumbotron row">
  <h1>Asociaci&oacute;n Integral de Guadalupe</h1>
  <div class="top-space col-lg-9">
    <p>Nos complace darle la bienvenida al sitio de la Asociaci&oacute;n Integral de Guadalupe.</p>
    <p>La Asociaci&oacute;n ayuda al mejoramiento del cant&oacute;n brindando servicios para todas las personas de la comunidad.</p>
    <p>De esta forma crece Guadalupe y se crea un mejor futuro para todos.</p>
  </div>
  <div class="top-space col-lg-3">
    <img class="img-rounded img-responsive" src="view/img/asociation.png" alt="asociacion">
  </div>
</div>

<?php include_once 'footer.php'; ?>
