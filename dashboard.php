<?php
	@ob_start();
	@session_start();
	include("include/config.php");
	if(empty($_SESSION["kullanici"])){
		header("Refresh: 0; url= index.php");
	}else{
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="tr" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="tr" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="tr"> <!--<![endif]-->
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
		<?php include("header.php") ;?>
		<div id="container" class="row-fluid"><?php include("menu.php") ;?></div>
	
		<div id="body">
			<div class="container-fluid">
			
				<div class="row-fluid">
					<div class="span12">
						<h3 class="page-title">
							<?php echo $_SESSION['kullanici']; ?> <small>Hoşgeldin | <?php echo $_SESSION['yetki']; ?></small>
						</h3>
					</div>
				</div>
				
				<div id="page" class="dashboard">
                    <div class="widget" style="width:40%; float:left;">
					 
                        <div class="widget-title">
							<h4><i class="icon-reorder"></i> Kısayollar</h4>
							<span class="tools">
								<a href="javascript:;" class="icon-chevron-down"></a>
							</span>
                        </div>
						
                        <div class="widget-body">
							<div class="row-fluid">
								<a href="eleman_ekle.php" class="icon-btn span3">
									<i class="icon-group"></i>
									<div>Eleman Ekle</div>
								</a>
								<a href="eleman.php" class="icon-btn span3">
									<i class="icon-group"></i>
									<div>Eleman Görüntüle</div>
									<span class="badge badge-info">1</span>
								</a>
								<a href="eleman_cikar.php" class="icon-btn span3">
									<i class="icon-group"></i>
									<div>Eleman Çıkar</div>
								</a>
							</div>
							
							<div class="row-fluid">
								<a href="arac_giris.php" class="icon-btn span3">
									<i class="icon-bookmark-empty"></i>
									<div>Araç Ekle</div>
								</a>
								<a href="arac.php" class="icon-btn span3">
									<i class="icon-bookmark-empty"></i>
									<div>Araç Listele</div>
									<span class="badge badge-warning">1</span>
								</a>
								<a href="arac_cikis.php" class="icon-btn span3">
									<i class="icon-bookmark-empty"></i>
									<div>Araç Çıkışı</div>
									<span class="badge badge-warning">1</span>
								</a>
							</div>
							
							<div class="row-fluid">
								<a href="#" class="icon-btn span3">
									<i class="icon-edit"></i>
									<div>Rapor Görüntüle</div>
									<span class="badge badge-warning">1</span>
								</a>
								<a href="fiyat.php" class="icon-btn span3">
									<i class="icon-tags"></i>
									<div>Fiyat Listesi</div>
									<span class="badge badge-warning">1</span>
								</a>
							</div>
							
							<div class="row-fluid">
								<a href="kasa.php" class="icon-btn span3">
									<i class="icon-cloud"></i>
									<div>Kasa Görüntüle</div>
									<span class="badge badge-success">1000</span>
								</a> 
							</div>
							
							<div class="row-fluid">
								<a href="yonetici_ekle.php" class="icon-btn span3">
									<i class="icon-user"></i>
									<div>Yönetici Ekle</div>
								</a>
								<a href="yonetici.php" class="icon-btn span3">
									<i class="icon-user"></i>
									<div>Yönetici Görüntüle</div>
									<span class="badge badge-info">1</span>
								</a>
							</div>
							
                        </div>
                    </div>
                </div>
                
				<div class="widget" style="width:50%; margin-left:20px; float:left;">
                    <div class="widget-title">
                        <h4><i class="icon-bar-chart"></i> Son Araç Girişleri</h4>
                        <span class="tools"><a style="color:#016FA7;margin-right:20px;"href="#"> Tümü</a>
                        <a href="javascript:;" class="icon-chevron-down"></a>
                        </span>
                    </div>
                    <div class="widget-body" >
                        <table class="table table-hover"> 
                            <tr>
								<th><strong>Araç Adı</strong></th>
                                <th><strong>Fiyat</strong></th>
								<th><strong>Giriş</strong></th>
                            </tr>
                            <tr>
								<td><a href="#">sdf</a></td>
								<td>sdf</td>
								<td>dsf</td>
							</tr>
                        </table>
					</div>
                </div>
				
			</div>
		</div>

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