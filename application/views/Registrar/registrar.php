<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		body{
            padding: 10px;	
            margin: 10px;
        }
	</style>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/bootstrap.min.css">
</head>
<body>
    <form action="/registrar/crear" method="post">
        <div class="panel panel-success">
            <div class="panel-heading">
                <strong>Datos de empresa</strong>
            </div>
            <div class="panel-body">            
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label for="companyName">Nombre Empresa</label>
                        <input type="text" class="form-control" name="companyName" placeholder="Ingrese el nombre de la compañia">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label for="owner">Nombre del propietario</label>
                        <input type="text" class="form-control" name="owner" placeholder="Ingrese el nombre del propetario">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label for="phone">Telefono</label>
                        <input type="text" class="form-control" name="phone" placeholder="Ingrese el numero de la empresa">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label for="cell_phone">Celular</label>
                        <input type="text" class="form-control" name="cell_phone" placeholder="Ingrese el celular">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label for="address">Direccion</label>
                        <input type="text" class="form-control" name="address" placeholder="Ingrese la direccion del la empresa">
                    </div>                    
                </div> 
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Datos del usuario</strong>
            </div>
            <div class="panel-body">            
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label for="firstname">Nombres</label>
                        <input type="text" class="form-control" name="firstname" placeholder="Ingrese el nombre">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label for="lastname">Apellido</label>
                        <input type="text" class="form-control" name="lastname" placeholder="Ingrese el apellido">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label for="email">Correo</label>
                        <input type="email" class="form-control" name="email" placeholder="Ingrese el correo" required>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" placeholder="Ingrese la contraseña">
                    </div>
                </div>             
                <div class="row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">				
                        <div style="text-align: center;">
                            <button type="submit" class="btn btn-primary">Crear Cuenta</button>
                        </div>		      
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>