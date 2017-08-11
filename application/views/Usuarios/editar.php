<?php 
	$usuario = $query[0]; 
?>
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
                <div class="col-lg-12 col-md-7">
					<div class="card">
						<div class="content">
							<form action="/usuarios/editar" method="post">
								<input type="hidden" value="<?php echo $usuario->usercompanyID; ?>" name="usercompanyID" />
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="firstname">Nombres</label>
											<input type="text" class="form-control border-input" placeholder="Nombres" name="firstname" value="<?php echo $usuario->firstname; ?>" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="lastname">Apellidos</label>
											<input type="text" class="form-control border-input" placeholder="Apellidos" name="lastname" value="<?php echo $usuario->lastname; ?>" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="email">Correo</label>
											<input type="email" class="form-control border-input" placeholder="Correo" name="email" value="<?php echo $usuario->email; ?>" required>
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
											<input id="administrator" name="administrator" type="checkbox" <?php echo ($usuario->administrator == 1)?"checked":""; ?>>
											<label for="administrator">
												Administrador
											</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="checkbox">
											<input id="activo" name="activo" type="checkbox" <?php echo ($usuario->activo == 1)?"checked":""; ?>>
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
													<input id="bodega_v" name="bodega_v" type="checkbox" <?php echo ($usuario->bodega_v == 1)?"checked":"";?>>
													<label for="bodega_v">
														Ver
													</label>
												</div>
												<div class="checkbox">
													<input id="bodega_n" name="bodega_n" type="checkbox" <?php echo ($usuario->bodega_n == 1)?"checked":"";?>>
													<label for="bodega_n">
														Nuevo
													</label>
												</div>
												<div class="checkbox">
													<input id="bodega_m" name="bodega_m" type="checkbox" <?php echo ($usuario->bodega_m == 1)?"checked":"";?>>
													<label for="bodega_m">
														Modificar
													</label>
												</div>
												<div class="checkbox">
													<input id="bodega_e" name="bodega_e" type="checkbox" <?php echo ($usuario->bodega_e == 1)?"checked":"";?>>
													<label for="bodega_e">
														Eliminar
													</label>
												</div>												
											</fieldset>
											<!--Marcas-->
											<fieldset class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-xs-12">
												<legend>Marcas</legend>
												<div class="checkbox">
													<input id="marca_v" name="marca_v" type="checkbox" <?php echo ($usuario->marca_v == 1)?"checked":"";?>
													<label for="marca_v">
														Ver
													</label>
												</div>
												<div class="checkbox">
													<input id="marca_n" name="marca_n" type="checkbox" <?php echo ($usuario->marca_n == 1)?"checked":"";?>
													<label for="marca_n">
														Nuevo
													</label>
												</div>
												<div class="checkbox">
													<input id="marca_m" name="marca_m" type="checkbox" <?php echo ($usuario->marca_m == 1)?"checked":"";?>
													<label for="marca_m">
														Modificar
													</label>
												</div>
												<div class="checkbox">
													<input id="marca_e" name="marca_e" type="checkbox" <?php echo ($usuario->marca_e == 1)?"checked":"";?>
													<label for="marca_e">
														Eliminar
													</label>
												</div>												
											</fieldset>
											<!--Categorias-->
											<fieldset class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-xs-12">
												<legend>Categorias</legend>
												<div class="checkbox">
													<input id="categoria_v" name="categoria_v" type="checkbox" <?php echo ($usuario->categoria_v == 1)?"checked":"";?>>
													<label for="categoria_v">
														Ver
													</label>
												</div>
												<div class="checkbox">
													<input id="categoria_n" name="categoria_n" type="checkbox" <?php echo ($usuario->categoria_n == 1)?"checked":"";?>>
													<label for="categoria_n">
														Nuevo
													</label>
												</div>
												<div class="checkbox">
													<input id="categoria_m" name="categoria_m" type="checkbox" <?php echo ($usuario->categoria_m == 1)?"checked":"";?>>
													<label for="categoria_m">
														Modificar
													</label>
												</div>
												<div class="checkbox">
													<input id="categoria_e" name="categoria_e" type="checkbox" <?php echo ($usuario->categoria_e == 1)?"checked":"";?>>
													<label for="categoria_e">
														Eliminar
													</label>
												</div>												
											</fieldset>
											<!--Productos-->
											<fieldset class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-xs-12">
												<legend>Productos</legend>
												<div class="checkbox">
													<input id="producto_v" name="producto_v" type="checkbox" <?php echo ($usuario->producto_v == 1)?"checked":"";?>>
													<label for="producto_v">
														Ver
													</label>
												</div>
												<div class="checkbox">
													<input id="producto_n" name="producto_n" type="checkbox" <?php echo ($usuario->producto_n == 1)?"checked":"";?>>
													<label for="producto_n">
														Nuevo
													</label>
												</div>
												<div class="checkbox">
													<input id="producto_m" name="producto_m" type="checkbox" <?php echo ($usuario->producto_m == 1)?"checked":"";?>>
													<label for="producto_m">
														Modificar
													</label>
												</div>
												<div class="checkbox">
													<input id="producto_e" name="producto_e" type="checkbox" <?php echo ($usuario->producto_e == 1)?"checked":"";?>>
													<label for="producto_e">
														Eliminar
													</label>
												</div>												
											</fieldset>
											<!--Categoria Clientes-->
											<fieldset class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-xs-12">
												<legend>Categoria Clientes</legend>
												<div class="checkbox">
													<input id="categoria_cliente_v" name="categoria_cliente_v" type="checkbox"  <?php echo ($usuario->categoria_cliente_v == 1)?"checked":"";?>>
													<label for="categoria_cliente_v">
														Ver
													</label>
												</div>
												<div class="checkbox">
													<input id="categoria_cliente_n" name="categoria_cliente_n" type="checkbox"  <?php echo ($usuario->categoria_cliente_n == 1)?"checked":"";?>>
													<label for="categoria_cliente_n">
														Nuevo
													</label>
												</div>
												<div class="checkbox">
													<input id="categoria_cliente_m" name="categoria_cliente_m" type="checkbox"  <?php echo ($usuario->categoria_cliente_m == 1)?"checked":"";?>>
													<label for="categoria_cliente_m">
														Modificar
													</label>
												</div>
												<div class="checkbox">
													<input id="categoria_cliente_e" name="categoria_cliente_e" type="checkbox"  <?php echo ($usuario->categoria_cliente_e == 1)?"checked":"";?>>
													<label for="categoria_cliente_e">
														Eliminar
													</label>
												</div>												
											</fieldset>
											<!--Clientes-->
											<fieldset class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-xs-12">
												<legend>Clientes</legend>
												<div class="checkbox">
													<input id="cliente_v" name="cliente_v" type="checkbox" <?php echo ($usuario->cliente_v == 1)?"checked":"";?>>
													<label for="clientee_v">
														Ver
													</label>
												</div>
												<div class="checkbox">
													<input id="cliente_n" name="cliente_n" type="checkbox" <?php echo ($usuario->cliente_n == 1)?"checked":"";?>>
													<label for="cliente_n">
														Nuevo
													</label>
												</div>
												<div class="checkbox">
													<input id="cliente_m" name="cliente_m" type="checkbox" <?php echo ($usuario->cliente_m == 1)?"checked":"";?>>
													<label for="cliente_m">
														Modificar
													</label>
												</div>
												<div class="checkbox">
													<input id="cliente_e" name="cliente_e" type="checkbox" <?php echo ($usuario->cliente_e == 1)?"checked":"";?>>
													<label for="cliente_e">
														Eliminar
													</label>
												</div>												
											</fieldset>
											<!--Facturas-->
											<fieldset class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-xs-12">
												<legend>Facturas</legend>
												<div class="checkbox">
													<input id="factura_v" name="factura_v" type="checkbox" <?php echo ($usuario->factura_v == 1)?"checked":"";?>>
													<label for="factura_v">
														Ver
													</label>
												</div>
												<div class="checkbox">
													<input id="factura_n" name="factura_n" type="checkbox" <?php echo ($usuario->factura_n == 1)?"checked":"";?>>
													<label for="factura_n">
														Nuevo
													</label>
												</div>
												<div class="checkbox">
													<input id="factura_anular" name="factura_anular" type="checkbox" <?php echo ($usuario->factura_anular == 1)?"checked":"";?>>
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
		<strong>Modificar usuario</strong>
	</div>
	<div class="panel-body">
		<div class="panel-body">
		<form action="/usuarios/editar" method="post">
			<input type="hidden" value="<?php echo $usuario->usercompanyID; ?>" name="usercompanyID" />
			<div class="form-group row">
			  <label for="firstname" class="col-xs-2 col-md-2 col-form-label">Nombres</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese los nombres" name="firstname" value="<?php echo $usuario->firstname; ?>">
			  </div>
			</div>
			<div class="form-group row">
			  <label for="lastname" class="col-xs-2 col-md-2 col-form-label">Apellidos</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese los apellidos" name="lastname" value="<?php echo $usuario->lastname; ?>">
			  </div>
			</div>
			<div class="form-group row">
			  <label for="email" class="col-xs-2 col-md-2 col-form-label">Correo</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="email" placeholder="Ingrese el correo electronico" name="email" value="<?php echo $usuario->email; ?>" required>
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
						<input type="checkbox" name="administrator" <?php echo ($usuario->administrator == 1)?"checked":""; ?>>
					</div>
				</div>			
				<div class="form-group col-xs-6 col-md-6 col-lg-6 col-xl-6">
					<label for="activo" class="col-form-label">Activo</label>
					<div class="">
						<input type="checkbox" name="activo" <?php echo ($usuario->activo == 1)?"checked":""; ?>>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<fieldset class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-xs-11">
					<legend>Bodega</legend>
					<div class="form-group">
						<label for="activo" class="col-form-label">Ver</label>
						<div class="">
							<input type="checkbox" name="bodega_v" <?php echo ($usuario->bodega_v == 1)?"checked":"";?>/>
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Nuevo</label>
						<div class="">
							<input type="checkbox" name="bodega_n" <?php echo ($usuario->bodega_n == 1)?"checked":"";?>>
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Modificar</label>
						<div class="">
							<input type="checkbox" name="bodega_m" <?php echo ($usuario->bodega_m == 1)?"checked":"";?>>
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Eliminar</label>
						<div class="">
							<input type="checkbox" name="bodega_e" <?php echo ($usuario->bodega_e == 1)?"checked":"";?>>
						</div>
					</div>
				</fieldset>
				<fieldset class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-xs-11">
					<legend>Marcas</legend>
					<div class="form-group">
						<label for="activo" class="col-form-label">Ver</label>
						<div class="">
							<input type="checkbox" name="marca_v" <?php echo ($usuario->marca_v == 1)?"checked":"";?>>
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Nuevo</label>
						<div class="">
							<input type="checkbox" name="marca_n" <?php echo ($usuario->marca_n == 1)?"checked":"";?>>
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Modificar</label>
						<div class="">
							<input type="checkbox" name="marca_m" <?php echo ($usuario->marca_m == 1)?"checked":"";?>>
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Eliminar</label>
						<div class="">
							<input type="checkbox" name="marca_e" <?php echo ($usuario->marca_e == 1)?"checked":"";?>>
						</div>
					</div>
				</fieldset>
				<fieldset class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-xs-11">
					<legend>Categorias</legend>
					<div class="form-group">
						<label for="activo" class="col-form-label">Ver</label>
						<div class="">
							<input type="checkbox" name="categoria_v" <?php echo ($usuario->categoria_v == 1)?"checked":"";?>>
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Nuevo</label>
						<div class="">
							<input type="checkbox" name="categoria_n" <?php echo ($usuario->categoria_n == 1)?"checked":"";?>>
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Modificar</label>
						<div class="">
							<input type="checkbox" name="categoria_m" <?php echo ($usuario->categoria_m == 1)?"checked":"";?>>
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Eliminar</label>
						<div class="">
							<input type="checkbox" name="categoria_e" <?php echo ($usuario->categoria_e == 1)?"checked":"";?>>
						</div>
					</div>
				</fieldset>
				<fieldset class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-xs-11">
					<legend>Productos</legend>
					<div class="form-group">
						<label for="activo" class="col-form-label">Ver</label>
						<div class="">
							<input type="checkbox" name="producto_v" <?php echo ($usuario->producto_v == 1)?"checked":"";?>>
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Nuevo</label>
						<div class="">
							<input type="checkbox" name="producto_n" <?php echo ($usuario->producto_n == 1)?"checked":"";?>>
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Modificar</label>
						<div class="">
							<input type="checkbox" name="producto_m" <?php echo ($usuario->producto_m == 1)?"checked":"";?>>
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Eliminar</label>
						<div class="">
							<input type="checkbox" name="producto_e" <?php echo ($usuario->producto_e == 1)?"checked":"";?>>
						</div>
					</div>
				</fieldset>
				<fieldset class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-xs-11">
					<legend>Categoria de Clientes</legend>
					<div class="form-group">
						<label for="activo" class="col-form-label">Ver</label>
						<div class="">
							<input type="checkbox" name="categoria_cliente_v" <?php echo ($usuario->categoria_cliente_v == 1)?"checked":"";?>>
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Nuevo</label>
						<div class="">
							<input type="checkbox" name="categoria_cliente_n" <?php echo ($usuario->categoria_cliente_n == 1)?"checked":"";?>>
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Modificar</label>
						<div class="">
							<input type="checkbox" name="categoria_cliente_m" <?php echo ($usuario->categoria_cliente_m == 1)?"checked":"";?>>
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Eliminar</label>
						<div class="">
							<input type="checkbox" name="categoria_cliente_e" <?php echo ($usuario->categoria_cliente_e == 1)?"checked":"";?>>
						</div>
					</div>
				</fieldset>
				<fieldset class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-xs-11">
					<legend>Clientes</legend>
					<div class="form-group">
						<label for="activo" class="col-form-label">Ver</label>
						<div class="">
							<input type="checkbox" name="cliente_v" <?php echo ($usuario->cliente_v == 1)?"checked":"";?>>
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Nuevo</label>
						<div class="">
							<input type="checkbox" name="cliente_n" <?php echo ($usuario->cliente_n == 1)?"checked":"";?>>
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Modificar</label>
						<div class="">
							<input type="checkbox" name="cliente_m" <?php echo ($usuario->cliente_m == 1)?"checked":"";?>>
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Eliminar</label>
						<div class="">
							<input type="checkbox" name="cliente_e" <?php echo ($usuario->cliente_e == 1)?"checked":"";?>>
						</div>
					</div>
				</fieldset>
				<fieldset class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-xs-11">
					<legend>Facturas</legend>
					<div class="form-group">
						<label for="activo" class="col-form-label">Ver</label>
						<div class="">
							<input type="checkbox" name="factura_v" <?php echo ($usuario->factura_v == 1)?"checked":"";?>>
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Nuevo</label>
						<div class="">
							<input type="checkbox" name="factura_n" <?php echo ($usuario->factura_n == 1)?"checked":"";?>>
						</div>
					</div>
					<div class="form-group">
						<label for="activo" class="col-form-label">Anular</label>
						<div class="">
							<input type="checkbox" name="factura_anular" <?php echo ($usuario->factura_anular == 1)?"checked":"";?>>
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