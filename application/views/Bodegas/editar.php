<?php 
	$cellar = $query[0]; 
?>
<div class="panel panel-success">
	<div class="panel-heading">
		<strong>Editar Bodega</strong>
	</div>
	<div class="panel-body">
		<form action="/bodegas/editar" method="post">
			<input type="hidden" value="<?php echo $cellar->cellarID; ?>" name="cellarID" />
			<div class="form-group row">
			  <label for="bodega" class="col-xs-2 col-md-2 col-form-label">Bodega</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese la bodega" name="bodega" value="<?php echo $cellar->cellar; ?>">
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