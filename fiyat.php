<?php
	@ob_start();
	@session_start();
	include("include/config.php");
	date_default_timezone_set('Asia/Istanbul');
	if(empty($_SESSION["kullanici"])){
		header("Refresh: 0; url= index.php");
	}else{
?>
<?php
	$mesaj = "";
	if(!empty($_POST["deneme"])){
		$updateFiyat = "UPDATE guncel_fiyat SET fiyat='".$_POST["deneme"]."'";
		if ($conn->query($updateFiyat) === TRUE) {
			$mesaj = '<div class="alert alert-success">Fiyat Güncellendi!</div>';
		}else {
			$mesaj = '<div class="alert">Çıkış işlemi başarısız!</div>';
		}
	}
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
		<link href="#" rel="stylesheet" id="style_metro" />
		<link href="assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" type="text/css"  />
		<link href="assets/plugins/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
	</head>
	<body class="fixed-top">
		<?php include("header.php") ;?>
		<div id="container" class="row-fluid">
			<?php include("menu.php") ;?>
		</div>
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
					<div class="row-fluid">
						<div class="span12">
							<div class="widget box light-grey">
								<div class="widget-title">
									<h4><i class="icon-tags"></i> Fiyat Listesi</h4>
								</div>
								<div class="widget-body">
									<div class="clearfix margin-bottom-10"></div>
									<?php echo $mesaj; ?>
									<table class="table table-striped table-bordered table-hover" style="font-size:12px;">
										<thead>
											<tr>
												<th>Saatlik Fiyat</th>
												<th>İşlem</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$selectFiyat = "SELECT fiyat FROM guncel_fiyat";
											$rFiyat = $conn->query($selectFiyat);
											if (mysqli_num_rows($rFiyat)>0){
												$rowFiyat = $rFiyat->fetch_array(MYSQLI_NUM);
												echo '<td><form method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
													  <input type="text" name="deneme" value="'.$rowFiyat[0].'"><input type="text" class="input-mini" value="TL" disabled></td>
													  <td><button class="btn btn-info">
													  Düzenle</button></form></td>';
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script> 
		<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<!--[if lt IE 9]>
		<script src="assets/plugins/excanvas.js"></script>
		<script src="assets/plugins/respond.js"></script>  
		<![endif]-->   
		<script src="assets/plugins/breakpoints/breakpoints.js" type="text/javascript"></script>
		<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
		<script src="assets/plugins/jquery.blockui.js" type="text/javascript"></script>  
		<script src="assets/plugins/jquery.cookie.js" type="text/javascript"></script>
		<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
		<script type="text/javascript" src="assets/plugins/data-tables/jquery.dataTables.js"></script>
		<script type="text/javascript" src="assets/plugins/data-tables/DT_bootstrap.js"></script>
		<script src="assets/scripts/app.js"></script>
		<script src="assets/scripts/table-managed.js"></script>     
		<script>
			jQuery(document).ready(function() {       
				App.init();
				TableManaged.init();
			});
		</script>
	</body>
</html>
<?php } ?>