<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		body{padding-top:20px;}
	</style>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/bootstrap.min.css">
</head>
<body>
	<form action="/login/login" method="post">
		<div class="container">
		    <div class="row">
				<div class="col-md-4 col-md-offset-4">
		    		<div class="panel panel-success">
					  	<div class="panel-heading">
					    	<h3 class="panel-title">Login</h3>
					 	</div>
					  	<div class="panel-body">
					    	<form accept-charset="UTF-8" role="form">
		                    <fieldset>
					    	  	<div class="form-group">
					    		    <input class="form-control" placeholder="Correo" name="email" type="text">
					    		</div>
					    		<div class="form-group">
					    			<input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
					    		</div>
					    		<div class="checkbox">
					    	    	<label>
					    	    		<input name="remember" type="checkbox" value="Recordarme"> Recordarme
					    	    	</label>
					    	    </div>
								<div class="form-group" style="text-align: right;">
					    			<a href="/registrar">Registrarse</a>
					    		</div>
					    		<input class="btn btn-lg btn-primary btn-block" type="submit" value="Iniciar Sesión">
					    	</fieldset>
							<div class="form-group" style="padding-top:12px">
								<?php
							  	if(isset($alerta)){
									  echo $alerta;
								  }
							  ?>
							</div>
					      	</form>							  
					    </div>
					</div>
				</div>
			</div>
		</div>
	</form>
</body>
</html>
