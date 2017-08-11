 <nav class="navbar navbar-default">
            <div class="<con></con>tainer-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Productos</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="/usuarios/nuevo" >
                                <i class="ti-panel"></i>
								<p>Bodegas</p>
                            </a>
                        </li>
                        <li>
                            <a href="/usuarios/nuevo" >
                                <i class="ti-panel"></i>
								<p>Marcas</p>
                            </a>
                        </li>
                        <li>
                            <a href="/usuarios/nuevo" >
                                <i class="ti-panel"></i>
								<p>Categorias</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
								<p>Salir</p>
								<i class="ti-shift-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Lista de productos</h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <th>Codigo</th>
                                <th>Descripcion</th>
                                <th>Codigo de barra</th>
                                <th>Precio</th>
                                <th>Marca</th>
                                <th>Categoria</th>
                                <th>Servicio</th>
                                <th>IVA</th>
                                <th colspan="2">Acción</th>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($query as $fila) {
                                ?>	
                                    <tr>
                                        <td><?php echo $fila->codigo; ?></td>
                                        <td><?php echo $fila->descripcion; ?></td>
                                        <td><?php echo $fila->codigo_barra; ?></td>
                                        <td><?php echo $fila->precio; ?></td>
                                        <td><?php echo $fila->brand; ?></td>
                                        <td><?php echo $fila->category; ?></td>
                                        <td class="center">
                                            <div class="checkbox">
												<input type="checkbox" <?php echo ($fila->service == 1)?"checked":""; ?> disabled />												
											</div>
                                        </td>
                                        <td class="center">
                                            <div class="checkbox">
                                                <input type="checkbox" <?php echo ($fila->taxFree == 1)?"checked":""; ?> disabled />
                                            </div>
                                        </td>
                                        <td class="center">
                                        <?php if($editar == '1') {?>
                                            <a class="cursor-pointer" href="<?php echo base_url().'productos/modificar/'.$fila->productID; ?>">
                                                <span class="ti-pencil"></span>
                                            </a>
                                        <?php } ?>
                                        </td>
                                        <td class="center">
                                        <?php if($eliminar == '1') {?>
                                            <a class="cursor-pointer" href="<?php echo base_url().'productos/eliminar/'.$fila->productID; ?>">
                                                <span class="ti-trash"></span>
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
        </div>
   
	<!--
        <div class="panel panel-success">
		<div class="panel-heading">
            <div class="row">
                <div class="col-xs-6 col-md-6 text-left">
                    <strong>Lista de Productos</strong>            
                </div>
                <div class="col-xs-6 col-md-6 text-right">
                <?php if($nuevo == '1') { ?>
                    <a class="blanco cursor-pointer" href="<?php echo base_url().'productos/nueva/';?> ">
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
                        <th>Codigo</th>
                        <th>Descripcion</th>
                        <th>Codigo de barra</th>
                        <th>Precio</th>
                        <th>Marca</th>
                        <th>Categoria</th>
                        <th>Servicio</th>
                        <th>IVA</th>
                        <th colspan="2" class="center">Acción</th>
                    </tr>
                </thead> 
                <tbody>
                    <?php
						foreach ($query as $fila) {
					?>		
						<tr>
							<td><?php echo $fila->codigo ?></td>
                            <td><?php echo $fila->descripcion ?></td>
                            <td><?php echo $fila->codigo_barra ?></td>
                            <td><?php echo $fila->precio ?></td>
                            <td><?php echo $fila->brand ?></td>
                            <td><?php echo $fila->category ?></td>
                            <td class="center"><input type="checkbox" <?php echo ($fila->service == 1)?"checked":""; ?> disabled data-group-cls="btn-group-vertical"/></td>
                            <td class="center"><input type="checkbox" <?php echo ($fila->taxFree == 1)?"checked":""; ?> disabled data-group-cls="btn-group-vertical" /></td>
                            <td class="center">
                            <?php if($editar == '1') {?>
                                <a class="cursor-pointer" href="<?php echo base_url().'productos/modificar/'.$fila->productID; ?>">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                            <?php } ?>
                            </td>
                            <td class="center">
                            <?php if($eliminar == '1') {?>
                                <a class="cursor-pointer" href="<?php echo base_url().'productos/eliminar/'.$fila->productID; ?>">
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
    -->


   