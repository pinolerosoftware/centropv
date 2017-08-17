<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
	<!--<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>static/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>static/assets/img/favicon.png">-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?php echo $titulo; ?></title>
  <!-- favicon-->
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url();?>static/assets/img/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url();?>static/assets/img/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url();?>static/assets/img/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>static/assets/img/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url();?>static/assets/img/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url();?>static/assets/img/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url();?>static/assets/img/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url();?>static/assets/img/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>static/assets/img/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url();?>static/assets/img/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>static/assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>static/assets/img/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>static/assets/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?php echo base_url();?>static/assets/img/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<?php echo base_url();?>static/assets/img/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <!--favicon-->
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
    <?php if(isset($linkCSS)){
      if($linkCSS == 'caja'){ ?>
        <link href="<?php echo base_url();?>static/css/caja.css" rel="stylesheet">
    <?php }
    }
    ?>
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
                <li class="<?php echo isset($menuActivo)?($menuActivo == 'Dashboard')?"active":"":""; ?>">
                    <a href="/">
                        <i class="ti-layout"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="<?php echo isset($menuActivo)?($menuActivo == 'Usuarios')?"active":"":""; ?>">
                    <a href="/usuarios">
                        <i class="ti-user"></i>
                        <p>Usuarios</p>
                    </a>
                </li>
                <li class="<?php echo isset($menuActivo)?($menuActivo == 'Inventario')?"active":"":""; ?>">
                    <a href="/productos">
                        <i class="ti-view-list-alt"></i>
                        <p>Inventario</p>
                    </a>
                </li>
                <li class="<?php echo isset($menuActivo)?($menuActivo == 'Vantas')?"active":"":""; ?>">
                    <a href="/caja">
                        <i class="ti-shopping-cart"></i>
                        <p>Ventas</p>
                    </a>
                </li>
                <li class="<?php echo isset($menuActivo)?($menuActivo == 'Reportes')?"active":"":""; ?>">
                    <a href="#">
                        <i class="ti-bar-chart"></i>
                        <p>Reportes</p>
                    </a>
                </li>
                <li class="<?php echo isset($menuActivo)?($menuActivo == 'Configuracion')?"active":"":""; ?>">
                    <a href="/configuracion">
                        <i class="ti-panel"></i>
                        <p>Configuracion</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>
    <div class="main-panel">
