<nav class="navbar navbar-default">
            <div class="<con></con>tainer-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Categoria de clientes</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="/clientes" >
                                <i class="ti-panel"></i>
								<p>Clientes</p>
                            </a>
                        </li>
                        <li>
                            <a href="/empresa" >
                                <i class="ti-panel"></i>
								<p>Categoria de clientes</p>
                            </a>
                        </li>
                        <li>
                            <a href="/login/logout">
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
                        <h4 class="title">Lista de categorias de clientes</h4>
                        <?php if($nuevo == '1') {?>
                            <a href="/empresa/nueva" class="pull-right h4">
                            <i class="ti-plus"></i>
                            </a>
                        <?php }?>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Categoria</th>
                                    <th colspan="2" style="text-align: center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($query as $fila) {
                                ?>		
                                    <tr>
                                        <td><?php echo $fila->business; ?></td>
                                        <td class="center">
                                        <?php if($editar == '1') {?>
                                            <a class="cursor-pointer" href="<?php echo base_url().'empresa/modificar/'.$fila->businessID; ?>">
                                                <span class="ti-pencil"></span>
                                            </a>
                                        <?php } ?>
                                        </td>
                                        <td class="center">
                                        <?php if($eliminar == '1') {?>
                                            <a class="cursor-pointer" href="<?php echo base_url().'empresa/eliminar/'.$fila->businessID; ?>">
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

    <!--<div class="panel panel-success">
		<div class="panel-heading">
            <div class="row">
                <div class="col-xs-6 col-md-6 text-left">
                    <strong>Lista de categorias</strong>            
                </div>
                <div class="col-xs-6 col-md-6 text-right">
                <?php if($nuevo == '1') {?>
                    <a class="blanco cursor-pointer" href="<?php echo base_url().'empresa/nueva/';?> ">
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
                        <th>Categorias</th>                        
                        <th colspan="2" class="center">Acción</th>
                    </tr>
                </thead> 
                <tbody>
                    <?php
						foreach ($query as $fila) {
					?>		
						<tr>
							<td><?php echo $fila->business; ?></td>
                            <td class="center">
                            <?php if($editar == '1') {?>
                                <a class="cursor-pointer" href="<?php echo base_url().'empresa/modificar/'.$fila->businessID; ?>">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                            <?php } ?>
                            </td>
                            <td class="center">
                            <?php if($eliminar == '1') {?>
                                <a class="cursor-pointer" href="<?php echo base_url().'empresa/eliminar/'.$fila->businessID; ?>">
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
	</div>-->
