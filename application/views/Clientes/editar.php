<?php 
	$customer = $query[0]; 
?>
<div class="panel panel-success">
	<div class="panel-heading">
		<strong>Modificar cliente</strong>
	</div>
	<div class="panel-body">
		<form action="/clientes/editar" method="post">
			<input type="hidden" value="<?php echo $customer->customerID; ?>" name="customerID" />
			<div class="form-group row">
			  <label for="firstname" class="col-xs-2 col-md-2 col-form-label">Nombres</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese el nombre" name="firstname" value="<?php echo $customer->firstname; ?>">
			  </div>
			</div>
			<div class="form-group row">
			  <label for="lastname" class="col-xs-2 col-md-2 col-form-label">Apellidos</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese el apellido" name="lastname" value="<?php echo $customer->lastname; ?>">
			  </div>
			</div>
			<div class="form-group row">
			  <label for="cedula" class="col-xs-2 col-md-2 col-form-label">Cedula</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese la cedula" name="cedula" value="<?php echo $customer->cedula; ?>">
			  </div>
			</div>
			<div class="form-group row">
			  <label for="cell_phone" class="col-xs-2 col-md-2 col-form-label">Celular</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese el numero de celular" name="cell_phone" value="<?php echo $customer->cell_phone; ?>">
			  </div>
			</div>
			<div class="form-group row">
			  <label for="email" class="col-xs-2 col-md-2 col-form-label">Correo</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese el correo" name="email" value="<?php echo $customer->email; ?>">
			  </div>
			</div>
			<div class="form-group row">
			  <label for="businessID" class="col-xs-2 col-md-2 col-form-label">Categoria</label>
			  <div class="col-xs-12 col-md-12">
			    <select class="selectpicker form-control" name="businessID">					
			    	<?php foreach($business as $empresa){ ?>
			    			<option value="<?php echo $empresa->businessID; ?>" <?php echo ($customer->businessID == $empresa->businessID)?"selected":""; ?>><?php echo $empresa->business; ?></option>
			    	<?php }?>				
			    </select>
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