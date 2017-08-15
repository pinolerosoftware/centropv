<?php
	$iva = $query[0];
?>
<nav class="navbar navbar-default">
            <div class="<con></con>tainer-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Configuración</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
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
	          <div class="col-lg-12 col-md-7">
							<div class="card">
								<div class="header">
									<h4 class="title">Datos de la empresa</h4>
									<div class="row">
								</div>
								<div class="content">
									<form action="/configuracion/ivaEdit" method="post">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="descripcion">Descipción</label>
			                    <input class="form-control border-input" type="text" placeholder="Ingrese la descripción" name="descripcion" value="<?php echo $iva->descripcion; ?>">
												</div>
											</div>
				            	<div class="col-md-6">
												<div class="form-group">
													<label for="porcentaje">Porcentaje</label>
			                    <input class="form-control border-input" type="text" placeholder="Ingrese el nombre del propietario" name="porcentaje" value="<?php echo $iva->porcentaje; ?> %">
												</div>
											</div>
										</div>
										<!--Boton de guardar-->
										<div class="text-center">
											<button type="submit" class="btn btn-default btn-wd">Guardar</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
<!--<div class="panel panel-success">
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
</div>-->
