<?php
	@ob_start();
	@session_start();
	include("include/config.php");
	date_default_timezone_set('Asia/Istanbul');
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
									<h4><i class="icon-bookmark-empty"></i> Araç Girişleri</h4>
								</div>
								<div class="widget-body">
									<div class="clearfix margin-bottom-10"></div>
									Bilgi
									<table class="table table-striped table-bordered table-hover" id="sample_1" style="font-size:12px;">
										<thead>
											<tr>
												<th>Plaka</th>
												<th>Giriş</th>
												<th>Çıkış</th>
												<th>Fiyat</th>
												<th>Eleman</th>
												<th>Durumu</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$sql = "SELECT * FROM arac WHERE eleman_id=".$_SESSION['id']."";
											$result = $conn->query($sql);
											if (mysqli_num_rows($result)>0){
												while ($row = $result->fetch_array(MYSQLI_NUM)) {
													$giris = $row[2];
													$giris = date("Y-m-d H:i:s", $giris);
													echo '<tr class="odd gradeX"><td>'.$row[1].'</td>
													<td>'.$giris.'</td>';
													if(!strcmp("0", $row[3])){
														echo '<td>-</td>';
													}else{
														$cikis = $row[3];
														$cikis = date("Y-m-d H:i:s", $cikis);
														echo '<td>'.$cikis.'</td>';
													}
													if(strcmp("0", $row[3])){
														$sql3 = "SELECT fiyat FROM guncel_fiyat";
														$result3 = $conn->query($sql3);
														if (mysqli_num_rows($result3)>0){
															$scout = $row[3] - $row[2];
															$scout = intval($scout/60/60);
															$row3 = $result3->fetch_array(MYSQLI_NUM);
															$total = $row3[0] * $scout;
															echo '<td>'.$total.'</td>';
														}
													}else{
														echo '<td>-</td>';
													}
													$sql2 = "SELECT kullanici FROM user WHERE id = '$row[4]'";
													$result2 = $conn->query($sql2);
													if (mysqli_num_rows($result2)>0){
														$row2 = $result2->fetch_array(MYSQLI_NUM);
														$row[4] = $row2[0];
														echo '<td>'.$row[4].'</td>';
													}
													if(strcmp("0", $row[3])){
														echo '<td><font color="green">Çıkış Yaptı</font></td></tr>';
													}else{
														echo '<td><font color="red">Çıkış Yapmadı</font></td></tr>';
													}
												}
											}else{
												echo'<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>';
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