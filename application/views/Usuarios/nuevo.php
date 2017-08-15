<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Nuevo Usuario</a>
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
						<div class="content">
							<form action="/usuarios/guardar" method="post">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="firstname">Nombres</label>
											<input type="text" class="form-control border-input" placeholder="Nombres" name="firstname">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="lastname">Apellidos</label>
											<input type="text" class="form-control border-input" placeholder="Apellidos" name="lastname">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="email">Correo</label>
											<input type="email" class="form-control border-input" placeholder="Correo" name="email">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="password">Contraseña</label>
											<input type="password" class="form-control border-input" placeholder="Contraseña" name="password">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="checkbox">
											<input id="administrator" name="administrator" type="checkbox">
											<label for="administrator">
												Administrador
											</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="checkbox">
											<input id="activo" name="activo" type="checkbox">
											<label for="activo">
												Activo
											</label>
										</div>
									</div>
								</div>
								<!--Permisos de Accesos-->
								<div class="row">
									<div class="panel panel-default" style="margin:5px;">
										 <div class="panel-heading">Permisos de Acceso</div>
										 <div class="panel-body">
										 	<!--Bodegas-->
											<fieldset class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-xs-12">
												<legend>Bodega</legend>
												<div class="checkbox">
													<input id="bodega_v" name="bodega_v" type="checkbox">
													<label for="bodega_v">
														Ver
													</label>
												</div>
												<div class="checkbox">
													<input id="bodega_n" name="bodega_n" type="checkbox">
													<label for="bodega_n">
														Nuevo
													</label>
												</div>
												<div class="checkbox">
													<input id="bodega_m" name="bodega_m" type="checkbox">
													<label for="bodega_m">
														Modificar
													</label>
												</div>
												<div class="checkbox">
													<input id="bodega_e" name="bodega_e" type="checkbox">
													<label for="bodega_e">
														Eliminar
													</label>
												</div>												
											</fieldset>
											<!--Marcas-->
											<fieldset class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-xs-12">
												<legend>Marcas</legend>
												<div class="checkbox">
													<input id="marca_v" name="marca_v" type="checkbox">
													<label for="marca_v">
														Ver
													</label>
												</div>
												<div class="checkbox">
													<input id="marca_n" name="marca_n" type="checkbox">
													<label for="marca_n">
														Nuevo
													</label>
												</div>
												<div class="checkbox">
													<input id="marca_m" name="marca_m" type="checkbox">
													<label for="marca_m">
														Modificar
													</label>
												</div>
												<div class="checkbox">
													<input id="marca_e" name="marca_e" type="checkbox">
													<label for="marca_e">
														Eliminar
													</label>
												</div>												
											</fieldset>
											<!--Categorias-->
											<fieldset class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-xs-12">
												<legend>Categorias</legend>
												<div class="checkbox">
													<input id="categoria_v" name="categoria_v" type="checkbox">
													<label for="categoria_v">
														Ver
													</label>
												</div>
												<div class="checkbox">
													<input id="categoria_n" name="categoria_n" type="checkbox">
													<label for="categoria_n">
														Nuevo
													</label>
												</div>
												<div class="checkbox">
													<input id="categoria_m" name="categoria_m" type="checkbox">
													<label for="categoria_m">
														Modificar
													</label>
												</div>
												<div class="checkbox">
													<input id="categoria_e" name="categoria_e" type="checkbox">
													<label for="categoria_e">
														Eliminar
													</label>
												</div>												
											</fieldset>
											<!--Productos-->
											<fieldset class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-xs-12">
												<legend>Productos</legend>
												<div class="checkbox">
													<input id="producto_v" name="producto_v" type="checkbox">
													<label for="producto_v">
														Ver
													</label>
												</div>
												<div class="checkbox">
													<input id="producto_n" name="producto_n" type="checkbox">
													<label for="producto_n">
														Nuevo
													</label>
												</div>
												<div class="checkbox">
													<input id="producto_m" name="producto_m" type="checkbox">
													<label for="producto_m">
														Modificar
													</label>
												</div>
												<div class="checkbox">
													<input id="producto_e" name="producto_e" type="checkbox">
													<label for="producto_e">
														Eliminar
													</label>
												</div>												
											</fieldset>
											<!--Categoria Clientes-->
											<fieldset class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-xs-12">
												<legend>Categoria Clientes</legend>
												<div class="checkbox">
													<input id="categoria_cliente_v" name="categoria_cliente_v" type="checkbox">
													<label for="categoria_cliente_v">
														Ver
													</label>
												</div>
												<div class="checkbox">
													<input id="categoria_cliente_n" name="categoria_cliente_n" type="checkbox">
													<label for="categoria_cliente_n">
														Nuevo
													</label>
												</div>
												<div class="checkbox">
													<input id="categoria_cliente_m" name="categoria_cliente_m" type="checkbox">
													<label for="categoria_cliente_m">
														Modificar
													</label>
												</div>
												<div class="checkbox">
													<input id="categoria_cliente_e" name="categoria_cliente_e" type="checkbox">
													<label for="categoria_cliente_e">
														Eliminar
													</label>
												</div>												
											</fieldset>
											<!--Clientes-->
											<fieldset class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-xs-12">
												<legend>Clientes</legend>
												<div class="checkbox">
													<input id="cliente_v" name="cliente_v" type="checkbox">
													<label for="clientee_v">
														Ver
													</label>
												</div>
												<div class="checkbox">
													<input id="cliente_n" name="cliente_n" type="checkbox">
													<label for="cliente_n">
														Nuevo
													</label>
												</div>
												<div class="checkbox">
													<input id="cliente_m" name="cliente_m" type="checkbox">
													<label for="cliente_m">
														Modificar
													</label>
												</div>
												<div class="checkbox">
													<input id="cliente_e" name="cliente_e" type="checkbox">
													<label for="cliente_e">
														Eliminar
													</label>
												</div>												
											</fieldset>
											<!--Facturas-->
											<fieldset class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-xs-12">
												<legend>Facturas</legend>
												<div class="checkbox">
													<input id="factura_v" name="factura_v" type="checkbox">
													<label for="factura_v">
														Ver
													</label>
												</div>
												<div class="checkbox">
													<input id="factura_n" name="factura_n" type="checkbox">
													<label for="factura_n">
														Nuevo
													</label>
												</div>
												<div class="checkbox">
													<input id="factura_anular" name="factura_anular" type="checkbox">
													<label for="factura_anular">
														Anular
													</label>
												</div>									
											</fieldset>
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
		<strong>Nuevo usuario</strong>
	</div>
	<div class="panel-body">
		<form action="/usuarios/guardar" method="post">
			<div class="form-group row">
			  <label for="firstname" class="col-xs-2 col-md-2 col-form-label">Nombres</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese los nombres" name="firstname">
			  </div>
			</div>
			<div class="form-group row">
			  <label for="lastname" class="col-xs-2 col-md-2 col-form-label">Apellidos</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese los apellidos" name="lastname">
			  </div>
			</div>
			<div class="form-group row">
			  <label for="email" class="col-xs-2 col-md-2 col-form-label">Correo</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="email" placeholder="Ingrese el correo electronico" name="email" required>
			  </div>
			</div>
			<div class="form-group row">
			  <label for="password" class="col-xs-2 col-md-2 col-form-label">Contraseña</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="password" placeholder="Ingrese la contraseña" name="password">
			  </div>
			</div>			
			<div class="row">
				<div class="form-group col-xs-6 col-md-6 col-lg-6 col-xl-6">
					<label for="administrator" class="col-form-label">Administrador</label>
					<div class="">
						<input type="checkbox" name="administrator" id="administrator">
					</div>
				</div>			
				<div class="form-group col-xs-6 col-md-6 col-lg-6 col-xl-6">
					<label for="activo" class="col-form-label">Activo</label>
					<div class="">
						<input type="checkbox" name="activo" id="activo">
					</div>
				</div>
			</div>
			<div class="form-group row">
				<fieldset class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-xs-11">
					<legend>Bodega</legend>
					<div class="form-group">
						<label for="activo" class="col-form-label">Ver</label>
						<div class="">
							<input type="checkbox" name="bodega_v">
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Nuevo</label>
						<div class="">
							<input type="checkbox" name="bodega_n">
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Modificar</label>
						<div class="">
							<input type="checkbox" name="bodega_m">
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Eliminar</label>
						<div class="">
							<input type="checkbox" name="bodega_e">
						</div>
					</div>
				</fieldset>
				<fieldset class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-xs-11">
					<legend>Marcas</legend>
					<div class="form-group">
						<label for="activo" class="col-form-label">Ver</label>
						<div class="">
							<input type="checkbox" name="marca_v">
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Nuevo</label>
						<div class="">
							<input type="checkbox" name="marca_n">
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Modificar</label>
						<div class="">
							<input type="checkbox" name="marca_m">
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Eliminar</label>
						<div class="">
							<input type="checkbox" name="marca_e">
						</div>
					</div>
				</fieldset>
				<fieldset class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-xs-11">
					<legend>Categorias</legend>
					<div class="form-group">
						<label for="activo" class="col-form-label">Ver</label>
						<div class="">
							<input type="checkbox" name="categoria_v">
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Nuevo</label>
						<div class="">
							<input type="checkbox" name="categoria_n">
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Modificar</label>
						<div class="">
							<input type="checkbox" name="categoria_m">
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Eliminar</label>
						<div class="">
							<input type="checkbox" name="categoria_e">
						</div>
					</div>
				</fieldset>
				<fieldset class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-xs-11">
					<legend>Productos</legend>
					<div class="form-group">
						<label for="activo" class="col-form-label">Ver</label>
						<div class="">
							<input type="checkbox" name="producto_v">
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Nuevo</label>
						<div class="">
							<input type="checkbox" name="producto_n">
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Modificar</label>
						<div class="">
							<input type="checkbox" name="producto_m">
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Eliminar</label>
						<div class="">
							<input type="checkbox" name="producto_e">
						</div>
					</div>
				</fieldset>
				<fieldset class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-xs-11">
					<legend>Categoria de Clientes</legend>
					<div class="form-group">
						<label for="activo" class="col-form-label">Ver</label>
						<div class="">
							<input type="checkbox" name="categoria_cliente_v">
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Nuevo</label>
						<div class="">
							<input type="checkbox" name="categoria_cliente_n">
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Modificar</label>
						<div class="">
							<input type="checkbox" name="categoria_cliente_m">
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Eliminar</label>
						<div class="">
							<input type="checkbox" name="categoria_cliente_e">
						</div>
					</div>
				</fieldset>
				<fieldset class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-xs-11">
					<legend>Clientes</legend>
					<div class="form-group">
						<label for="activo" class="col-form-label">Ver</label>
						<div class="">
							<input type="checkbox" name="cliente_v">
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Nuevo</label>
						<div class="">
							<input type="checkbox" name="cliente_n">
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Modificar</label>
						<div class="">
							<input type="checkbox" name="cliente_m">
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Eliminar</label>
						<div class="">
							<input type="checkbox" name="cliente_e">
						</div>
					</div>
				</fieldset>
				<fieldset class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-xs-11">
					<legend>Facturas</legend>
					<div class="form-group">
						<label for="activo" class="col-form-label">Ver</label>
						<div class="">
							<input type="checkbox" name="factura_v">
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Nuevo</label>
						<div class="">
							<input type="checkbox" name="factura_n">
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Anular</label>
						<div class="">
							<input type="checkbox" name="factura_anular">
						</div>
					</div>				
				</fieldset>
			</div>
			<div class="form-group row">				
				<div class="center">
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>		      
		  	</div>			
		</form>
	</div>
</div>-->