
	<div class="panel panel-success">
		<div class="panel-heading">
            <div class="row">
                <div class="col-xs-6 col-md-6 text-left">
                    <strong>Lista de Marcas</strong>            
                </div>
                <div class="col-xs-6 col-md-6 text-right">
                <?php if($nuevo == '1') {?>
                    <a class="blanco cursor-pointer" href="<?php echo base_url().'marcas/nueva/';?> ">
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
                        <th>Marca</th>                        
                        <th colspan="2" class="center">Acción</th>
                    </tr>
                </thead> 
                <tbody>
                    <?php
						foreach ($query as $fila) {
					?>		
						<tr>
							<td><?php echo $fila->brand ?></td>
                            <td class="center">
                            <?php if($editar == '1') {?>
                                <a class="cursor-pointer" href="<?php echo base_url().'marcas/modificar/'.$fila->brandID; ?>">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                            <?php } ?>
                            </td>
                            <td class="center">
                            <?php if($eliminar == '1') {?>
                                <a class="cursor-pointer" href="<?php echo base_url().'marcas/eliminar/'.$fila->brandID; ?>">
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
