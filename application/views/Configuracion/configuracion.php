<?php
	$company = $company[0];
    $iva = $iva[0] ;
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
                    <a class="navbar-brand" href="#">Configuracion</a>
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
						<a href="/configuracion/company" class="pull-right h4">
            	<i class="ti-plus"></i>
            </a>
						</div>
          </div>
					<div class="content">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
                	<label for="companyName">Nombre Empresa</label>
									<div class="well well-sm"><?php echo isset($company->name)?$company->name:"Sin asignar"; ?></div>
								</div>
							</div>
            	<div class="col-md-6">
								<div class="form-group">
                	<label for="owner">Nombre del propietario</label>
                  <div class="well well-sm"><?php echo isset($company->owner)?$company->owner:"Sin asignar"; ?></div>
								</div>
							</div>
						</div>
            <div class="row">
							<div class="col-md-6">
								<div class="form-group">
                	<label for="companyName">Numero de telefono</label>
                  <div class="well well-sm"><?php echo isset($company->phone)?$company->phone:"Sin asignar"; ?></div>
								</div>
							</div>
              <div class="col-md-6">
								<div class="form-group">
                	<label for="companyName">Numero de celular</label>
                  <div class="well well-sm"><?php echo isset($company->cell_phone)?$company->cell_phone:"Sin asignar"; ?></div>
								</div>
							</div>
						</div>
            <div class="row">
							<div class="col-md-12">
								<div class="form-group">
                	<label for="companyName">Dirección</label>
                  <div class="well well-sm"><?php echo isset($company->address)?$company->address:"Sin asignar"; ?></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>

        <div class="col-lg-12 col-md-7">
          <div class="card">
						<div class="header">
          	  	<h4 class="title">Datos del Iva</h4>
								<div class="row">
								<a href="/configuracion/iva" class="pull-right h4">
		            	<i class="ti-plus"></i>
		            </a>
            </div>
					<div class="content">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
                  <label for="companyName">Descripción</label>
                  <div class="well well-sm"><?php echo isset($iva->descripcion)?$iva->descripcion:"Sin asignar"; ?></div>
								</div>
							</div>
              <div class="col-md-6">
								<div class="form-group">
                  <label for="owner">Porcentaje</label>
                  <div class="well well-sm"><?php echo isset($iva->porcentaje)?number_format($iva->porcentaje,2):"Sin asignar"; ?> %</div>
								</div>
							</div>
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
            <div class="col-xs-6 col-md-6 text-right">
                <a class="blanco cursor-pointer" href="<?php echo base_url().'configuracion/company/';?> ">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <label for="companyName">Nombre Empresa</label>
                <div class="well well-sm"><?php echo isset($company->name)?$company->name:"Sin asignar"; ?></div>
            </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <label for="owner">Nombre del propietario</label>
                <div class="well well-sm"><?php echo isset($company->owner)?$company->owner:"Sin asignar"; ?></div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <label for="companyName">Numero de telefono</label>
                <div class="well well-sm"><?php echo isset($company->phone)?$company->phone:"Sin asignar"; ?></div>
            </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <label for="companyName">Numero de celular</label>
                <div class="well well-sm"><?php echo isset($company->cell_phone)?$company->cell_phone:"Sin asignar"; ?></div>
            </div>
        </div>
         <div class="row">
            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <label for="companyName">Dirección</label>
                <div class="well well-sm"><?php echo isset($company->address)?$company->address:"Sin asignar"; ?></div>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-success">
   <div class="panel-heading">
        <div class="row">
            <div class="col-xs-6 col-md-6 text-left">
                <strong>Datos del iva</strong>
            </div>
            <div class="col-xs-6 col-md-6 text-right">
                <a class="blanco cursor-pointer" href="<?php echo base_url().'configuracion/iva/';?> ">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <label for="companyName">Descripción</label>
                <div class="well well-sm"><?php echo isset($iva->descripcion)?$iva->descripcion:"Sin asignar"; ?></div>
            </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <label for="owner">Porcentaje</label>
                <div class="well well-sm"><?php echo isset($iva->porcentaje)?number_format($iva->porcentaje,2):"Sin asignar"; ?> %</div>
            </div>
        </div>
    </div>
</div>-->
