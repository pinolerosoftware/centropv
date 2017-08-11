
<div class="panel panel-success">
	<div class="panel-heading">
		<strong>Nueva Categoria</strong>
	</div>
	<div class="panel-body">
		<form action="/categorias/guardar" method="post">
			<div class="form-group row">
			  <label for="marca" class="col-xs-2 col-md-2 col-form-label">Categoria</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese la categoria" name="categoria">
			  </div>
			</div>
			<div class="form-group row">				
		      	<div class="center">
		        	<button type="submit" class="btn btn-primary">Guardar</button>
		      	</div>		      
		    </div>
		</form>
	</div>
</div>