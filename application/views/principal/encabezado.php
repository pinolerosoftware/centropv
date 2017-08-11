<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>static/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>static/assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?php echo $titulo; ?></title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
 <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url();?>static/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url();?>static/assets/css/animate.min.css" rel="stylesheet"/>
    <!--  Paper Dashboard core CSS    -->
    <link href="<?php echo base_url();?>static/assets/css/paper-dashboard.css" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url();?>static/assets/css/demo.css" rel="stylesheet" />
    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url();?>static/assets/css/themify-icons.css" rel="stylesheet">
    <!--<link href="<?php echo base_url();?>static/assets/css/paper-kit.scss" rel="stylesheet">-->
</head>
<body>
  <div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="primary">
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?php echo base_url();?>" class="simple-text">
                    <?php echo $companyName; ?>
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="/">
                        <i class="ti-layout"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="/usuarios">
                        <i class="ti-user"></i>
                        <p>Usuarios</p>
                    </a>
                </li>
                <li>
                    <a href="/productos">
                        <i class="ti-view-list-alt"></i>
                        <p>Inventario</p>
                    </a>
                </li>
                <li>
                    <a href="/caja">
                        <i class="ti-shopping-cart"></i>
                        <p>Vantas</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="ti-bar-chart"></i>
                        <p>Reportes</p>
                    </a>
                </li>
                <li>
                    <a href="/configuracion">
                        <i class="ti-panel"></i>
                        <p>Configuracion</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>
     <div class="main-panel">
        
            
       