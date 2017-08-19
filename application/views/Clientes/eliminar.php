<?php
	$customer = $query[0];
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
                    <a class="navbar-brand" href="#">Clientes</a>
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
				<h4 class="title">Modificar clientes</h4>
			</div>
			<div class="content">
				<form action="/clientes/guardar" method="post">
					<input type="hidden" value="<?php echo $customer->customerID; ?>" name="customerID" />
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="firstname">Nombres</label>
								<input type="text" class="form-control border-input" placeholder="Codigo" name="firstname" value="<?php echo $customer->firstname; ?>" disabled/>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="lastname">Apellidos</label>
								<input type="text" class="form-control border-input" placeholder="Descripción" name="lastname" value="<?php echo $customer->lastname; ?>" disabled/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="cedula">Cedula</label>
								<input type="text" class="form-control border-input" placeholder="Cedula" name="cedula" value="<?php echo $customer->cedula; ?>" disabled/>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="cell_phone">Celular</label>
								<input type="text" class="form-control border-input" placeholder="Celular"  name="cell_phone" value="<?php echo $customer->cell_phone; ?>" disabled/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
								<div class="form-group">
									<label for="email">Correo</label>
									<input type="text" class="form-control border-input" placeholder="Correo" name="email" value="<?php echo $customer->email; ?>" disabled/>
								</div>
						</div>
						<div class="col-md-6">
								<div class="form-group">
									<label for="business">Categoria</label>
									<input type="text" class="form-control border-input" placeholder="Correo" name="business" value="<?php echo $customer->business; ?>" disabled/>
								</div>
						</div>
					</div>
					<!--Boton de guardar-->
					<div class="text-center">
						<button type="submit" class="btn btn-default btn-wd">Eliminar</button>
					</div>
				</form>
			<div>
		</div>
	</div>
</div>
</div>
</div>

<!--<div class="panel panel-success">
	<div class="panel-heading">
		<strong>Eliminar cliente</strong>
	</div>
	<div class="panel-body">
		<form action="/clientes/editar" method="post">
			<input type="hidden" value="<?php echo $customer->customerID; ?>" name="customerID" />
			<div class="form-group row">
			  <label for="firstname" class="col-xs-2 col-md-2 col-form-label">Nombres</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese el nombre" name="firstname" value="<?php echo $customer->firstname; ?>" disabled>
			  </div>
			</div>
			<div class="form-group row">
			  <label for="lastname" class="col-xs-2 col-md-2 col-form-label">Apellidos</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese el apellido" name="lastname" value="<?php echo $customer->lastname; ?>" disabled>
			  </div>
			</div>
			<div class="form-group row">
			  <label for="cedula" class="col-xs-2 col-md-2 col-form-label">Cedula</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese la cedula" name="cedula" value="<?php echo $customer->cedula; ?>" disabled>
			  </div>
			</div>
			<div class="form-group row">
			  <label for="cell_phone" class="col-xs-2 col-md-2 col-form-label">Celular</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese el numero de celular" name="cell_phone" value="<?php echo $customer->cell_phone; ?>" disabled>
			  </div>
			</div>
			<div class="form-group row">
			  <label for="email" class="col-xs-2 col-md-2 col-form-label">Correo</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese el correo" name="email" value="<?php echo $customer->email; ?>" disabled>
			  </div>
			</div>
			<div class="form-group row">
			  <label for="business" class="col-xs-2 col-md-2 col-form-label">Categoria</label>
			  <div class="col-xs-12 col-md-12">
			    <input class="form-control" type="text" placeholder="Ingrese el correo" name="email" value="<?php echo $customer->business; ?>" disabled>
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
