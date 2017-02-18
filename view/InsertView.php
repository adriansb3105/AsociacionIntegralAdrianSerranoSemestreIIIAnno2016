<?php include_once 'header.php'; ?>

<script src = "https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?php
if(isset($insertCorrect)){
	echo '<div class="alert alert-success alert-dismissable fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						<strong>Hecho!</strong> Una nueva persona se ha insertado
				</div>';
}
?>

<div class="jumbotron row">
	<h2>Insertar un nuevo asociado</h2>
  <form action="?insert=new" method="POST">
    <div class="form-group">
      <label for="id">Ingrese el n&uacute;mero de c&eacute;dula</label>
      <input type="text" name="id" class="form-control" id="id" placeholder="Ingrese el n&uacute;mero de c&eacute;dula" required>
    </div>

    <div class="form-group">
      <label for="first_name">Ingrese el nombre</label>
      <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Ingrese el nombre" required>
    </div>

    <div class="form-group">
      <label for="last_name">Ingrese los apellidos</label>
      <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Ingrese los apellidos" required>
    </div>

    <div class="form-group">
      <label for="phone">Ingrese n&uacute;mero telef&oacute;nico</label>
      <input type="text" name="phone" class="form-control" id="phone" placeholder="Ingrese n&uacute;mero telef&oacute;nico" required>
    </div>

    <div class="form-group">
      <label for="email">Ingrese el correo electr&oacute;nico</label>
      <input type="text" name="email" class="form-control" id="email" placeholder="ejemplo@mail.com" required>
    </div>

    <div class="form-group">
      <label for="pass">Ingrese una contrase&ntilde;a provisional</label>
      <input type="password" name="pass" class="form-control" id="pass" placeholder="Ingrese una contrase&ntilde;a provisional" required>
    </div>

    <div class="form-group">
      <label for="address">Ingrese la direcci&oacute;n</label>
      <textarea id="address" name="address" class="form-control no-resize" placeholder="Ingrese la direcci&oacute;n" required></textarea>
    </div>

    <button type="submit" class="btn btn-warning">Guardar</button>
  </form>
</div>

<script src="view/js/datePicker.js"></script>

<?php include_once 'footer.php'; ?>
