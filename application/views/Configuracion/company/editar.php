<?php 
	$company = $query[0]; 
?>
<div class="panel panel-success">
   <div class="panel-heading">
        <div class="row">
            <div class="col-xs-6 col-md-6 text-left">
                <strong>Datos de la empresa</strong>            
            </div>            
        </div>       
    </div>
    <div class="panel-body">
        <form action="/configuracion/companyEdit" method="post">
            <div class="row">
                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <label for="companyName">Nombre Empresa</label>
                    <input class="form-control" type="text" placeholder="Ingrese el nombre de la compañia" name="name" value="<?php echo $company->name; ?>">
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <label for="owner">Nombre del propietario</label>
                    <input class="form-control" type="text" placeholder="Ingrese el nombre del propietario" name="owner" value="<?php echo $company->owner; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <label for="companyName">Numero de telefono</label>
                    <input class="form-control" type="text" placeholder="Ingrese el numero de telefono" name="phone" value="<?php echo $company->phone; ?>">
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <label for="companyName">Numero de celular</label>
                    <input class="form-control" type="text" placeholder="Ingrese el numero de celular" name="cell_phone" value="<?php echo $company->cell_phone; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <label for="companyName">Dirección</label>
                    <input class="form-control" type="text" placeholder="Ingrese la direccion" name="address" value="<?php echo $company->address; ?>">
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