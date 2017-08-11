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
	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url(); ?>static/assets/js/demo.js"></script>
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
</body>
</html>