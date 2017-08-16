<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		body{padding-top:20px;}
	</style>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>static/css/login.css">
</head>
<body>
	<div class="panel col-md-4 col-md-offset-4 loginContent">
        <div class="panel-body">
            <div class="logo">
                <span class="glyphicon glyphicon-user"></span>
            </div>
            <form class="form" id="formLogin" action="/login/login" method="post">
                <div class="form-group">
                    <input class="control" type="email" name="email" value="" placeholder="Correo" autocomplete="off" style="border-radius:3px 3px 0px 0px">
                    <input class="control" type="password" name="password" value="" placeholder="Contraseña" autocomplete="off" style="border-radius:0px 0px 3px 3px">
                </div>
                <div class="form-group">
                    <button class="botton bg-blue">Iniciar Sesión</button>
                </div>
                <div class="form-group">
                    <p class="text-center">¿No tienes cuenta? <span class="tColor-blue"><strong>Regístrese</strong></span> </p>
                    <p class="text-center" id="changePass"><a class="btn-link tColor-blue" style="text-decoration:none;" href="#"><strong>Olvide mi contraseña</strong></a></p>
					<a class="btn-link tColor-blue" style="text-decoration:none;" href="#"></a>
				</div>
				<a class="btn-link tColor-blue" style="text-decoration:none;" href="#"></a>
			</form>
		</div>
		<a class="btn-link tColor-blue" style="text-decoration:none;" href="#"></a>
	</div>
	<!--<form action="/login/login" method="post">
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
	</form>-->
	  <script>
            
            $("#changePass").click(function(e){
                e.preventDefault();
                $('#formLogin').hide(200);
            });
            cambar = function(){
                $('#formChange').show(200);
            }
        </script>
</body>
</html>
