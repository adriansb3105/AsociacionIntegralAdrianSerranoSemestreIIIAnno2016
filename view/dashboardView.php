<?php include_once 'header.php'; ?>

<div class="jumbotron row">
  <div class="center">
    <h1>Asociaci&oacute;n Integral de Guadalupe</h1>
  </div>

  <div class="links">
          <ul>

<?php
  if(isset($_SESSION['Secretaria'])){
    echo '
              <li>
                <a class="link" href="?reunion">Crear acta de reuni&oacute;n</a>
              </li>

              <li>
                <a class="link" href="?new_partner">Ingresar nuevo asociado</a>
              </li>

              <li>
                <a class="link" href="?new_event">Crear nuevo evento</a>
              </li>

              <li>
                <a class="link" href="?income">Nueva entrada o salida de dinero</a>
              </li>';
  }
 ?>

  <li>
   <a class="link" href="?see">Ver todos los movimientos de la caja</a>
 </li>

 </ul>
</div>

</div>

<?php include_once 'footer.php'; ?>
