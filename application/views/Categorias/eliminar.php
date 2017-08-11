<?php 
	$category = $query[0]; 
?>
<div class="panel panel-success">
	<div class="panel-heading">
		<strong>Eliminar Categoria</strong>
	</div>
	<div class="panel-body">
		<form action="/categorias/borrar" method="post">
			<input type="hidden" value="<?php echo $category->categoryID; ?>" name="categoryID" />
			<div class="form-group row">
			  <label for="marca" class="col-xs-2 col-md-2 col-form-label">Categoria</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese la categoria" name="category" value="<?php echo $category->category; ?>" disabled>
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