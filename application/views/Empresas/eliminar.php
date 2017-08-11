<?php 
	$busisness = $query[0]; 
?>
<div class="panel panel-success">
	<div class="panel-heading">
		<strong>Eliminar categoria</strong>
	</div>
	<div class="panel-body">
		<form action="/empresa/borrar" method="post">
			<input type="hidden" value="<?php echo $busisness->businessID; ?>" name="businessID" />
			<div class="form-group row">
			  <label for="busisness" class="col-xs-2 col-md-2 col-form-label">Categoria</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese el nombre de la categoria" name="busisnes" value="<?php echo $busisness->business; ?>" disabled>
			  </div>
			</div>
			<div class="form-group row">				
		      	<div class="center">
		        	<button type="submit" class="btn btn-primary">Eliminar</button>
		      	</div>		      
		    </div>
		</form>
	</div>
</div>