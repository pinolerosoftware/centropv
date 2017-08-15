<?php
	$company = $query[0];
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
									<form action="/configuracion/companyEdit" method="post">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
				                	<label for="companyName">Nombre Empresa</label>
													<input type="text" class="form-control border-input" placeholder="Ingrese el nombre de la compañia" name="name" value="<?php echo $company->name; ?>" />
												</div>
											</div>
				            	<div class="col-md-6">
												<div class="form-group">
				                	<label for="owner">Nombre del propietario</label>
				                  <input type="text" class="form-control border-input" placeholder="Ingrese el nombre del propietario" name="owner" value="<?php echo $company->owner; ?>" />
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
				                	<label for="phone">Numero de telefono</label>
													<input type="text" class="form-control border-input" placeholder="Ingrese el numero de telefono" name="phone" value="<?php echo $company->phone; ?>" />
												</div>
											</div>
				            	<div class="col-md-6">
												<div class="form-group">
													<label for="cell_phone">Numero de celular</label>
			                    <input class="form-control border-input" type="text" placeholder="Ingrese el numero de celular" name="cell_phone" value="<?php echo $company->cell_phone; ?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="address">Dirección</label>
			                    <input class="form-control border-input" type="text" placeholder="Ingrese la direccion" name="address" value="<?php echo $company->address; ?>">
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
</div>-->
