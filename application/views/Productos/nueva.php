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
          <div class="col-lg-12 col-md-7">
						<div class="card">
							<div class="header">
              	<h4 class="title">Nuevo producto</h4>
              </div>
							<div class="content">
								<form action="/productos/guardar" method="post">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="firstname">Código</label>
												<input type="text" class="form-control border-input" placeholder="Codigo" name="codigo">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="lastname">Descripción</label>
												<input type="text" class="form-control border-input" placeholder="Descripción" name="descripcion">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="firstname">Codigo de barra</label>
												<input type="text" class="form-control border-input" placeholder="Codigo de barra" name="codigo_barra">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="lastname">Precio</label>
												<input type="text" class="form-control border-input" placeholder="Precio" name="precio">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												 <label for="brandID">Marca</label>
    										 <select class="form-control border-input" id="brandID" name="brandID">
												 		<?php foreach($brand as $marca){ ?>
																<option value="<?php echo $marca->brandID; ?>"><?php echo $marca->brand; ?></option>
														<?php }?>
												 </select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="categoryID">Categoria</label>
    										 <select class="form-control border-input" id="categoryID" name="categoryID">
												 		<?php foreach($category as $categoria){ ?>
																<option value="<?php echo $categoria->categoryID; ?>"><?php echo $categoria->category; ?></option>
														<?php }?>	
												 </select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="checkbox">
												<input id="service" name="service" type="checkbox">
												<label for="service">
													Servicio
												</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="checkbox">
												<input id="taxFree" name="taxFree" type="checkbox">
												<label for="taxFree">
													Iva
												</label>
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
		<strong>Nuevo producto</strong>
	</div>
	<div class="panel-body">
		<form action="/productos/guardar" method="post">
			<div class="form-group row">
			  <label for="codigo" class="col-xs-2 col-md-2 col-form-label">Codigo</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese el codigo" name="codigo">
			  </div>
			</div>
			<div class="form-group row">
			  <label for="descripcion" class="col-xs-2 col-md-2 col-form-label">descripcion</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese la descripcion" name="descripcion">
			  </div>
			</div>
			<div class="form-group row">
			  <label for="codigo_barra" class="col-xs-2 col-md-2 col-form-label">Codigo de Barra</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese el codigo de barra" name="codigo_barra">
			  </div>
			</div>
			<div class="form-group row">
			  <label for="precio" class="col-xs-2 col-md-2 col-form-label">Precios</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese el precio" name="precio">
			  </div>
			</div>
			<div class="form-group row">
			  <label for="brandID" class="col-xs-2 col-md-2 col-form-label">Marca</label>
			  <div class="col-xs-12 col-md-12">
			    <select class="selectpicker form-control" name="brandID">
			    	<?php foreach($brand as $marca){ ?>
			    			<option value="<?php echo $marca->brandID; ?>"><?php echo $marca->brand; ?></option>
			    	<?php }?>
			    </select>
			  </div>
			</div>
			<div class="form-group row">
			  <label for="categoryID" class="col-xs-2 col-md-2 col-form-label">Categoria</label>
			  <div class="col-xs-12 col-md-12">
			    <select class="selectpicker form-control" name="categoryID">
			    	<?php foreach($category as $categoria){ ?>
			    			<option value="<?php echo $categoria->categoryID; ?>"><?php echo $categoria->category; ?></option>
			    	<?php }?>				
			    </select>
			  </div>
			</div>
			<div class="form-group row">
			  <label for="service" class="col-xs-2 col-md-2 col-form-label">Servicio</label>
			  <div class="col-xs-12 col-md-12">
			    <input type="checkbox" name="service">
			  </div>
			</div>
			<div class="form-group row">
			  <label for="taxFree" class="col-xs-2 col-md-2 col-form-label">IVA</label>
			  <div class="col-xs-12 col-md-12">
			    <input type="checkbox" name="taxFree">
			  </div>
			</div>
			<div class="form-group row">				
		      	<div class="center">
		        	<button type="submit" class="btn btn-primary">Guardar</button>
		      	</div>		      
		    </div>
		</form>
	</div>
</div>-->