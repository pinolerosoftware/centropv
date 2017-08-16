<nav class="navbar navbar-default">
            <div class="<con></con>tainer-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Marcas</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="/bodegas" >
                                <i class="ti-panel"></i>
								<p>Bodegas</p>
                            </a>
                        </li>
                        <li>
                            <a href="/marcas" >
                                <i class="ti-panel"></i>
								<p>Marcas</p>
                            </a>
                        </li>
                        <li>
                            <a href="/categorias" >
                                <i class="ti-panel"></i>
								<p>Categorias</p>
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
                        <h4 class="title">Lista de marcas</h4>
                        <?php if($nuevo == '1') {?>
                            <a href="/marcas/nueva" class="pull-right h4">
                            <i class="ti-plus"></i>
                            </a>
                        <?php }?>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <th>Marca</th>
                                <th colspan="2" style="text-align: center">Acción</th>
                            </thead>
                            <tbody>
                             <?php
                                foreach ($query as $fila) {
                            ?>
                                <tr>
                                    <td><?php echo $fila->brand ?></td>
                                    <td style="text-align: center">
                                        <?php if($editar == '1') {?>
                                            <a class="cursor-pointer" href="<?php echo base_url().'marcas/modificar/'.$fila->brandID; ?>">
                                                <span class="ti-pencil"></span>
                                            </a>
                                        <?php }?>
                                    </td>
                                    <td style="text-align: center">
                                        <?php if($eliminar == '1') {?>
                                            <a class="cursor-pointer" href="<?php echo base_url().'marcas/eliminar/'.$fila->brandID; ?>">
                                                <span class="ti-trash"></span>
                                            </a>
                                        <?php }?>
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
	</div>-->
