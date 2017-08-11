<?php 
	$brand = $query[0]; 
?>
<div class="panel panel-success">
	<div class="panel-heading">
		<strong>Editar Marca</strong>
	</div>
	<div class="panel-body">
		<form action="/marcas/editar" method="post">
			<input type="hidden" value="<?php echo $brand->brandID; ?>" name="brandID" />
			<div class="form-group row">
			  <label for="marca" class="col-xs-2 col-md-2 col-form-label">Marca</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese la marca" name="marca" value="<?php echo $brand->brand; ?>">
			  </div>
			</div>
			<div class="form-group row">				
		      	<div class="center">
		        	<button type="submit" class="btn btn-primary">Modificar</button>
		      	</div>		      
		    </div>
		</form>
	</div>
</div>