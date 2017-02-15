<?php include_once 'header.php'; ?>

<script src = "https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class="jumbotron row">
	<h2>Crear un acta de reuni&oacute;n</h2>

  <form>
  	<div class="form-group">
      <label for="datepicker">Seleccione la fecha</label>
      <input type="date" class="form-control" id="datepicker" placeholder="Seleccione la fecha" required>
    </div>
    <div class="form-group">
      <label for="description">Ingrese una descripcion para el documento</label>
       <textarea class="form-control" id="description" rows="4" cols="50" placeholder="Seleccione la fecha" required></textarea> 
    </div>
    <button type="submit" class="btn btn-default">Guardar</button>
  </form>
</div>

<script src="view/js/datePicker.js"></script>
 
<?php include_once 'footer.php'; ?>


<!--
Reunion = {
  reunion_date Date,
	doc_url varchar(100),
	doc_name varchar(50),
	description varchar(100),
	PRIMARY KEY(reunion_date, doc_url)
}
-->