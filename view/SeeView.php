<?php include_once 'header.php'; ?>

<div class="jumbotron row">
	<h2>Movimientos de la caja chica</h2>
  <table class="table table-hover">
      <thead>
        <tr>
          <th>Fecha</th>
          <th>Concepto</th>
          <th>Ingreso</th>
          <th>Egreso</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
  <?php
    if(isset($pettyCash)){
      foreach ($pettyCash as $val) {
        $concept = '';
        switch ($val[2]) {
          case 1:
              $concept = "Alquiler del Salon Comunal"; break;
          case 2:
              $concept = "Alquiler del Local Comercial"; break;
          case 3:
              $concept = "Pago de empleados"; break;
          case 4:
              $concept = "Compra de articulos"; break;
          case 5:
              $concept = "Reparacion"; break;
          case 6:
              $concept = "Otra entrada"; break;
          case 7:
              $concept = "Otra Salida"; break;
        }

        echo '<tr>
                <td>'.$val[1].'</td>
                <td>'.$concept.'</td>
                <td>'.$val[4].'</td>
                <td>'.$val[5].'</td>
                <td>'.$val[6].'</td>
              </tr>';
      }
    }
  ?>
    </tbody>
  </table>

</div>

<?php include_once 'footer.php'; ?>
