<?php include_once 'header.php'; ?>

<script src = "https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?php
if(isset($insertCorrect)){
	echo '<div class="alert alert-success alert-dismissable fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						<strong>Bien hecho!</strong> Se ha creado el evento correctamente
				</div>';
}
?>

<div class="jumbotron row">
	<h2>Crear un nuevo evento</h2>

  <form action="?new_event=new" method="POST">
    <div class="form-group">
      <label for="email">Ingrese su correo electr&oacute;nico</label>
      <input type="email" name="email" class="form-control" id="email" placeholder="ejemplo@mail.com" required>
    </div>

		<div class="form-group">
      <label for="datepicker">Seleccione la fecha</label>
      <input type="date" name="datepicker" class="form-control" id="datepicker" placeholder="Seleccione la fecha" required>
    </div>

		<div class="form-group">
      <label for="start_hour">Ingrese la hora de inicio</label>
      <input type="time" data-format="hh:mm:ss" name="start_hour" id="start_hour" class="form-control" placeholder="hh:mm:ss" required>
    </div>

    <div class="form-group">
      <label for="end_hour">Ingrese la hora de fin</label>
      <input type="time" name="end_hour" id="end_hour" class="form-control" placeholder="hh:mm:ss" required>
    </div>

		<div class="form-group">
      <label for="description">Ingrese la descripcion del evento</label>
       <textarea id="description" name="description" class="form-control no-resize" placeholder="Ingrese la descripcion del evento" required></textarea>
    </div>

		<?php
			if(isset($_SESSION['Secretaria'])){
				echo '<div class="form-group">
					      <label for="kind">Indique el tipo de evento a realizar</label>
					      <select class="form-control" id="kind" name="kind">
					        <option value="interna">Interno</option>
					        <option value="publica">P&uacute;blico</option>
					      </select>
					    </div>';
				}
		?>

		<div id="public-only">
			<div class="form-group">
				<label for="chair">Ingrese la cantidad de sillas (1500 colones cada una)</label>
				<input type="number" class="form-control" id="chair" name="chair" min="0" max="200" step="1" />
			</div>

			<div class="form-group">
				<label for="table">Ingrese la cantidad de mesas (3000 colones cada una)</label>
				<input type="number" class="form-control" id="table" name="table" min="0" max="200" step="1" />
			</div>

			<div class="form-group">
				<label for="tablecloths">Ingrese la cantidad de manteles (750 colones cada uno)</label>
				<input type="number" class="form-control" id="tablecloths" name="tablecloths" min="0" max="200" step="1" />
			</div>

			<div class="checkbox-kitchen form-group">
				<label id="check" for="kitchen"><input type="checkbox" id="kitchen" name="kitchen" value="kitchen"> Solicitar cocina (8500 colones)</label>
			</div>

			<div class="form-group">
				<label for="total">Su total es de </label>
				<input type="text" id="totalMoney" name="totalMoney"></input>
			</div>
		</div>

    <button type="submit" class="btn btn-warning">Crear</button>
  </form>
</div>

<script src="view/js/datePicker.js"></script>

<?php include_once 'footer.php'; ?>
