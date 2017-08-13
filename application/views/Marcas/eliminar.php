<?php 
	$brand = $query[0]; 
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
                    <a class="navbar-brand" href="#">Marca</a>
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
          <div class="col-lg-12 col-md-7">
						<div class="card">
							<div class="header">
              	<h4 class="title">Modificar Marca</h4>
              </div>
							<div class="content">
								<form action="/marcas/borrar" method="post">
									<input type="hidden" value="<?php echo $brand->brandID; ?>" name="brandID" />
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="marca">Marca</label>
												<input type="text" class="form-control border-input" name="marca" value="<?php echo $brand->brand; ?>" disabled />
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

<!--<div class="panel panel-success">
	<div class="panel-heading">
		<strong>Eliminar Marca</strong>
	</div>
	<div class="panel-body">
		<form action="/marcas/borrar" method="post">
			<input type="hidden" value="<?php echo $brand->brandID; ?>" name="brandID" />
			<div class="form-group row">
			  <label for="marca" class="col-xs-2 col-md-2 col-form-label">Marca</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese la marca" name="marca" value="<?php echo $brand->brand; ?>" disabled>
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