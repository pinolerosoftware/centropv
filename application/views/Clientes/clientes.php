
	<div class="panel panel-success">
		<div class="panel-heading">
            <div class="row">
                <div class="col-xs-6 col-md-6 text-left">
                    <strong>Lista de Clientes</strong>            
                </div>
                <div class="col-xs-6 col-md-6 text-right">
                <?php if($nuevo == '1') {?>
                    <a class="blanco cursor-pointer" href="<?php echo base_url().'clientes/nueva/';?> ">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a> 
                <?php } ?>
                </div>
            </div>           
        </div>                    	
        <div class="panel-body">
        <div class="table-responsive">
        	<table class="table table-bordered">
                <thead class="thead-default">
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Cedula</th>
                        <th>Celular</th>
                        <th>Correo</th>
                        <th>Categoria</th> 
                        <th>Saldo</th>       
                        <th colspan="2" class="center">Acción</th>
                    </tr>
                </thead> 
                <tbody>
                    <?php
						foreach ($query as $fila) {
					?>		
						<tr>
							<td><?php echo $fila->firstname; ?></td>
                            <td><?php echo $fila->lastname; ?></td>
                            <td><?php echo $fila->cedula; ?></td>
                            <td><?php echo $fila->cell_phone; ?></td>
                            <td><?php echo $fila->email; ?></td>
                            <td><?php echo $fila->business; ?></td>                            
                            <td><?php echo $fila->saldo; ?></td>                            
                            <td class="center">
                            <?php if($editar == '1') {?>
                                <a class="cursor-pointer" href="<?php echo base_url().'clientes/modificar/'.$fila->customerID; ?>">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                            <?php } ?>
                            </td>
                            <td class="center">
                            <?php if($eliminar == '1') {?>
                                <a class="cursor-pointer" href="<?php echo base_url().'clientes/eliminar/'.$fila->customerID; ?>">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            <?php } ?>
                            </td>
						</tr>
					<?php
						}
					?>      	
                </tbody> 
            </table>
            </div>
        </div>
	</div>


   