<?php
    $ventaDia = $totalDia[0];
    $ventaSemana = $totalSemana[0];
    $ventaMes = $totalMes[0];
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
                    <a class="navbar-brand" href="#">Dashboard</a>
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

          <div class="col-lg-4 col-sm-4">
              <div class="card">
                  <div class="content">
                      <div class="row">
                          <div class="col-xs-12">
                              <div class="numbers">
                                  <p>Contado</p>
                                  C$ <?php echo isset($ventaDia->Contado)?number_format($ventaDia->Contado,2):"0.00"; ?>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-xs-12">
                              <div class="numbers">
                                  <p>Credito</p>
                                  C$ <?php echo isset($ventaDia->Credito)?number_format($ventaDia->Credito,2):"0.00"; ?>
                              </div>
                          </div>
                      </div>
                       <div class="row">
                          <div class="col-xs-12">
                              <div class="numbers">
                                  <p>Total</p>
                                  C$
                                  <?php
                                      $dia = (isset($ventaDia->Contado)?$ventaDia->Contado:0.00 ) + (isset($ventaDia->Credito)?$ventaDia->Credito:0.00);
                                      echo number_format($dia,2);
                                  ?>
                              </div>
                          </div>
                      </div>
                      <div class="footer">
                          <hr>
                          <div class="stats">
                              <i class="ti-reload"></i> Venta por día
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-lg-4 col-sm-4">
              <div class="card">
                  <div class="content">
                      <div class="row">
                          <div class="col-xs-12">
                              <div class="numbers">
                                  <p>Contado</p>
                                  C$ <?php echo isset($ventaSemana->Contado)?number_format($ventaSemana->Contado,2):"0.00"; ?>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-xs-12">
                              <div class="numbers">
                                  <p>Credito</p>
                                  C$ <?php echo isset($ventaSemana->Credito)?number_format($ventaSemana->Credito,2):"0.00"; ?>
                              </div>
                          </div>
                      </div>
                       <div class="row">
                          <div class="col-xs-12">
                              <div class="numbers">
                                  <p>Total</p>
                                  C$
                                  <?php
                                      $semana = (isset($ventaSemana->Contado)?$ventaSemana->Contado:0 ) + (isset($ventaSemana->Credito)?$ventaSemana->Credito:0);
                                      echo number_format($semana,2);
                                  ?>
                              </div>
                          </div>
                      </div>
                      <div class="footer">
                          <hr>
                          <div class="stats">
                              <i class="ti-reload"></i> Venta por semana
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-lg-4 col-sm-4">
              <div class="card">
                  <div class="content">
                      <div class="row">
                          <div class="col-xs-12">
                              <div class="numbers">
                                  <p>Contado</p>
                                  C$ <?php echo isset($ventaMes->Contado)?number_format($ventaMes->Contado,2):"0.00"; ?>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-xs-12">
                              <div class="numbers">
                                  <p>Credito</p>
                                  C$ <?php echo isset($ventaMes->Credito)?number_format($ventaMes->Credito,2):"0.00"; ?>
                              </div>
                          </div>
                      </div>
                       <div class="row">
                          <div class="col-xs-12">
                              <div class="numbers">
                                  <p>Total</p>
                                  C$
                                  <?php
                                      $mes = (isset($ventaMes->Contado)?$ventaMes->Contado:0 ) + (isset($ventaMes->Credito)?$ventaMes->Credito:0);
                                      echo number_format($mes,2);
                                  ?>
                              </div>
                          </div>
                      </div>
                      <div class="footer">
                          <hr>
                          <div class="stats">
                              <i class="ti-reload"></i> Venta por mes
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-lg-12 col-sm-12">
            <div class="card">
              <div class="content">
                <div class="graficoPastel" style="height: 250px;">
                </div>
              </div>
              <div class="footer">
                  <hr>
                  <div class="stats">
                      <div style="background-color:#F3BB45; width: 10px; height: 10px; margin-left: 10px"></div> Contado <br />
                      <div style="background-color:#68B3C8; width: 10px; height: 10px; margin-left: 10px"></div> Credito <br />
                      <i class="ti-reload margin-left: 10px"></i> Ventas de la semana
                  </div>
              </div>
            </div>
          </div>

            <div class="col-lg-12 col-sm-12">
              <div class="card">
                <div class="content">
                    <div class="content table-responsive table-full-width">
                      <table class="table table-striped">
                          <thead>
                              <tr>
                                  <th>Número</th>
                                  <th>Descripción</th>
                                  <th>Monto</th>
                              <tr>
                          </thead>
                          <tbody>
                              <?php
                                  $numero = 1;
                                  foreach($topProductosMonto as $fila){
                              ?>
                              <tr>
                                  <td><?php echo $numero; ?></td>
                                  <td><?php echo $fila->descripcion; ?></td>
                                  <td>C$ <?php echo number_format($fila->monto, 2); ?></td>
                              </tr>
                              <?php
                                      $numero++;
                                  }
                              ?>
                          </tbody>
                      </table>
                    </div>
                </div>
                <div class="footer">
                    <hr>
                    <div class="stats">
                        <i class="ti-reload"></i> Top Productos
                    </div>
                </div>
              </div>
            </div>