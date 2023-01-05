<?php
	@ob_start();
	@session_start();
	include("include/config.php");
	date_default_timezone_set('Asia/Istanbul');
	if(empty($_SESSION["kullanici"])){
		header("Refresh: 0; url= index.php");
	}else if(!strcmp("Eleman", $_SESSION['yetki'])){
?>
<?php
	$mesaj = "";
	
	if(!empty($_POST["plaka"])){
		$selectPlaka = "SELECT kullanici FROM user WHERE plaka = '".$_POST['plaka']."' and cikis = 0";
		$rPlaka = $conn->query($selectPlaka);
		if(mysqli_num_rows($rPlaka)>0){
				$mesaj = '<div class="alert">Araç zaten otoparkta bulunuyor.. Lütfen farklı bir plaka girişi yapın!</div>';
		}else{
			$sql = "INSERT INTO arac (plaka, giris, cikis, eleman_id)
			VALUES ('".strtoupper($_POST['plaka'])."', '".time()."', '0', '".$_SESSION['id']."')";

			if ($conn->query($sql) === TRUE) {
				$mesaj = '<div class="alert alert-success">Araç Girişi Başarılı!</div>';
			} else {
				$mesaj = '<div class="alert">Hata: '.$sql.'<br>'.$conn->error.'</div>';
			}
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
					<div class="widget box light-grey">
						<div class="widget-title">
							<h4><i class="icon-bookmark-empty"></i> Araç Girişi</h4>
						</div>
						<div class="widget-body form">
							<?php echo $mesaj; ?>
							<form action="" id="form_sample_1" class="form-horizontal" method="post" enctype="multipart/form-data">
								<div class="control-group">
									<label class="control-label">Plaka</label>
									<div class="controls">
										<input name="plaka" type="text" class="span6" />
									</div>
								</div>
								<div class="form-actions">
									<button type="submit" onclick="submit();" class="btn btn-primary"><i class="icon-ok"></i> Araç Girişi Yap</button>
								</div>
							</form>
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
		<script type="text/javascript" src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
		<script type="text/javascript" src="assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
		<script type="text/javascript" src="assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
		<script type="text/javascript" src="assets/plugins/ckeditor/ckeditor.js"></script>  
		<script type="text/javascript" src="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
		<script type="text/javascript" src="assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
		<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
		<script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
		<script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
		<script type="text/javascript" src="assets/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>
		<script type="text/javascript" src="assets/plugins/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
		<script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script type="text/javascript" src="assets/plugins/clockface/js/clockface.js"></script>
		<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/date.js"></script>
		<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script> 
		<script type="text/javascript" src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>  
		<script type="text/javascript" src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
		<script type="text/javascript" src="assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>   
		<script type="text/javascript" src="assets/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
		<script src="assets/scripts/app.js"></script>
		<script src="assets/scripts/form-validation.js"></script>
		<script src="assets/scripts/form-components.js"></script> 
		<script>
			jQuery(document).ready(function() {
				App.init();
				FormValidation.init();
				FormComponents.init();
			});
		</script>
	</body>
</html>
<?php 
	}else{
		header("Refresh: 0; url= dashboard.php");
	}
?>