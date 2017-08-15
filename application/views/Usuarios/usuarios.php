 <nav class="navbar navbar-default">
            <div class="<con></con>tainer-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Usuarios</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="/usuarios/nuevo" >
                                <i class="ti-panel"></i>
								<p>Crear usuario</p>
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
<?php
    foreach($query as $fila){
?>
    <div class="col-lg-4 col-md-5">
        <div class="card card-user">
            <div class="image">
                <img src="<?php echo base_url(); ?>static/assets/img/background-2.jpg" alt="...">
            </div>
            <div class="content">
                <div class="author">
                    <img class="avatar border-white" src="<?php echo base_url(); ?>static/assets/img/usuarios.png" alt="...">
                    <h4 class="title"><?php echo $fila->firstname . " " . $fila->lastname;  ?><br>
                        <a href="/usuarios/modificar/<?php echo $fila->usercompanyID; ?>"><small>Modificar</small></a>
                    </h4>
                </div>                               
            </div>
            <hr>                           
        </div>
    </div>          
<?php
    }
?>


