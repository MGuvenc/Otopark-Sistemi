<?php
	@ob_start();
	@session_start();
	include("include/config.php");
	if(empty($_SESSION["kullanici"])){
		header("Refresh: 0; url= index.php");
	}else{
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>4M1A | Otopark Sistemi</title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />
		<meta content="otopark, otopark sistemi" name="description" />
		<meta content="MGuvenc" name="author" />
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href="assets/css/style.css" rel="stylesheet" />
		<link href="assets/css/style-responsive.css" rel="stylesheet" />
		<link href="assets/css/themes/default.css" rel="stylesheet" id="style_color" />
		<link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />		
		<link href="assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" type="text/css"  />
		<link href="assets/plugins/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
	</head>
	<body class="fixed-top">
	
	
	
	
	
		<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>	
		<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->	
		<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>		
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<!--[if lt IE 9]>
		<script src="assets/plugins/excanvas.js"></script>
		<script src="assets/plugins/respond.js"></script>	
		<![endif]-->	
		<script src="assets/plugins/breakpoints/breakpoints.js" type="text/javascript"></script>	
		<!-- IMPORTANT! jquery.slimscroll.min.js depends on jquery-ui-1.10.1.custom.min.js -->	
		<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
		<script src="assets/plugins/jquery.blockui.js" type="text/javascript"></script>	
		<script src="assets/plugins/jquery.cookie.js" type="text/javascript"></script>
		<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
		<script src="assets/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
		<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
		<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
		<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
		<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
		<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
		<script src="assets/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>	
		<script src="assets/plugins/flot/jquery.flot.js" type="text/javascript"></script>
		<script src="assets/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
		<script src="assets/plugins/jquery.peity.min.js" type="text/javascript"></script>	
		<script src="assets/plugins/jquery-knob/js/jquery.knob.js" type="text/javascript"></script>	
		<script src="assets/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
		<script src="assets/plugins/bootstrap-daterangepicker/date.js" type="text/javascript"></script>
		<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>		
		<script src="assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
		<script src="assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
		<script src="assets/scripts/app.js" type="text/javascript"></script>
		<script src="assets/scripts/index.js" type="text/javascript"></script>			
		
		<script>
			jQuery(document).ready(function() {		
				App.init(); // initlayout and core plugins
				Index.init();
				Index.initJQVMAP(); // init index page's custom scripts
				Index.initKnowElements(); // init circle stats(knob elements)
				Index.initPeityElements(); // init pierty elements
				Index.initCalendar(); // init index page's custom scripts
				Index.initCharts(); // init index page's custom scripts
				Index.initChat();
				Index.initDashboardDaterange();
				Index.initIntro();
			});
		</script>
	</body>
</html>
<?php } ?>