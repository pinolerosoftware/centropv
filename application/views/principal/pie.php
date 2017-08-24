		</div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, <a href="http://www.pinolerosoftware.com">PinoleroSoftware</a>
                </div>
            </div>
        </footer>
    </div>
</div>
 <!--   Core JS Files   -->
    <script src="<?php echo base_url(); ?>static/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>static/assets/js/bootstrap.min.js" type="text/javascript"></script>
	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="<?php echo base_url(); ?>static/assets/js/bootstrap-checkbox-radio.js"></script>
	<!--  Charts Plugin -->
	<script src="<?php echo base_url(); ?>static/assets/js/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url(); ?>static/assets/js/bootstrap-notify.js"></script>
    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="<?php echo base_url(); ?>static/assets/js/paper-dashboard.js"></script>
	<?php if(isset($linkScript)){
		if($linkScript == 'caja'){ ?>
				<script src="<?php echo base_url(); ?>static/js/react.js"></script>
				<script src="<?php echo base_url(); ?>static/js/react-dom.js"></script>
			  <script src="<?php echo base_url(); ?>static/js/nuevaCaja.js"></script>
	<?php }
	}
	?>
    <?php if(isset($linkScript)){
		 	if ($linkScript == 'usuario')
		  { ?>
        <script type="text/javascript">
            $('#administrator').change(function(){
                $('input[type="checkbox"]').map(function(i, o){
                    if(o.id != 'administrator'){
                        if(o.id != 'activo') {
                            $(o).prop('checked',$('#administrator').prop('checked'));
                        }
                    }
                });
            });
	    </script>
    <?php
		}
	}  ?>
	<?php if(isset($linkScript)){
					if($linkScript == 'home'){
		 ?>
			<script>
					var chart = new Chartist.Line('.graficoPastel', {
				  labels: ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'],
				  series: [
						<?php
								$stringArrayContado = '';
								$stringArrayCredito = '';
								foreach ($ventaSemaGrafico as $fila) {									
									$stringArrayContado = $stringArrayContado . $fila->Contado . ',';									
									$stringArrayCredito = $stringArrayCredito . $fila->Credito . ',';									
								}
								$stringArrayContado = substr($stringArrayContado,0,strlen($stringArrayContado) - 1);
								$stringArrayCredito = substr($stringArrayCredito,0,strlen($stringArrayCredito) - 1);
								$stringArrayContado = '['. $stringArrayContado. '],';
								$stringArrayCredito = '['. $stringArrayCredito . ']';
								echo $stringArrayContado;
								echo $stringArrayCredito;
						?>
				  ]
				}, {
				  low: 0,
				  showArea: false,
				  showPoint: true,
				  fullWidth: false
				});

				chart.on('draw', function(data) {
				  if(data.type === 'line' || data.type === 'area') {
				    data.element.animate({
				      d: {
				        begin: 2000 * data.index,
				        dur: 2000,
				        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
				        to: data.path.clone().stringify(),
				        easing: Chartist.Svg.Easing.easeOutQuint
				      }
				    });
				  }
				});
			</script>
<?php
				}
			}
 ?>
</body>
</html>
