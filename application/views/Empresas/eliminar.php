<?php
	$busisness = $query[0];
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
          	<div class="col-lg-12 col-md-7">
							<div class="card">
								<div class="header">
									<h4 class="title">Modificar categoria de cliente</h4>
								</div>
								<div class="content">
									<form action="/empresa/borrar" method="post">
										<input type="hidden" value="<?php echo $busisness->businessID; ?>" name="businessID" />										
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="busisness">Categoria de cliente</label>
													<input type="text" class="form-control border-input" placeholder="Ingrese la categoria" name="busisness" value="<?php echo $busisness->business; ?>" disabled/>
												</div>
											</div>
										</div>
										<!--Boton de guardar-->
										<div class="text-center">
											<button type="submit" class="btn btn-default btn-wd">Eliminar</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
<!-- <div class="panel panel-success">
	<div class="panel-heading">
		<strong>Eliminar categoria</strong>
	</div>
	<div class="panel-body">
		<form action="/empresa/borrar" method="post">
			<input type="hidden" value="<?php echo $busisness->businessID; ?>" name="businessID" />
			<div class="form-group row">
			  <label for="busisness" class="col-xs-2 col-md-2 col-form-label">Categoria</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese el nombre de la categoria" name="busisnes" value="<?php echo $busisness->business; ?>" disabled>
			  </div>
			</div>
			<div class="form-group row">
		      	<div class="center">
		        	<button type="submit" class="btn btn-primary">Eliminar</button>
		      	</div>
		    </div>
		</form>
	</div>
</div>-->
