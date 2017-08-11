<?php 
	$iva = $query[0]; 
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
        <form action="/configuracion/ivaEdit" method="post">
            <div class="row">
                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <label for="descripcion">Descipción</label>
                    <input class="form-control" type="text" placeholder="Ingrese el nombre de la compañia" name="descripcion" value="<?php echo $iva->descripcion; ?>">
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <label for="porcentaje">Porcentaje</label>
                    <div class="input-group">                        
                        <input class="form-control" type="text" placeholder="Ingrese el nombre del propietario" name="porcentaje" value="<?php echo $iva->porcentaje; ?> %">
                        <span class="input-group-addon"> % </span>
                    </div>
                </div>
                <div class="form-group row">				
                    <div class="center">
                        <button type="submit" class="btn btn-primary">Modificar</button>
                    </div>		      
                </div>
            </div>           
        </form>
    </div>
</div>