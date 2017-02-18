<?php include_once 'header.php'; ?>
<script src = "https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?php
	if(isset($incomeInserted)){
		echo '<div class="alert alert-success alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
              <strong>Listo!</strong> Se ha creado la entrada
          </div>';
	}
 ?>

<div class="jumbotron row">
	<h2>Crear nuevo ingreso o egreso</h2>
	<form method="POST" action="?income=new">
		<div class="form-group">
      <label for="datepicker">Seleccione la fecha</label>
      <input type="date" name="datepicker" class="form-control" id="datepicker" placeholder="Seleccione la fecha" required>
    </div>

		<div class="form-group">
      <label for="concept">Ingrese que desea hacer</label>
			<select class="form-control" id="concept" name="concept">
				<option value="2">Alquiler del Local Comercial</option>
				<option value="3">Pago de empleados</option>
				<option value="4">Compra de articulos</option>
				<option value="5">Reparacion</option>
				<option value="6">Otra entrada</option>
				<option value="7">Otra Salida</option>
			</select>
    </div>

		<div class="form-group">
      <label for="description">Agregue mas detalles</label>
       <textarea id="description" name="description" class="form-control no-resize" placeholder="Agregue mas detalles"> </textarea>
    </div>

			<div class="form-group">
				<label for="total">Ingrese el monto</label>
				<input type="text" id="total" class="form-control" name="total"></input>
			</div>

			<button type="submit" class="btn btn-warning">Crear</button>
  </form>
</div>

<script src="view/js/datePicker.js"></script>
<?php include_once 'footer.php'; ?>
