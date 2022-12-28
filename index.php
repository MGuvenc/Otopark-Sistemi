<?php
	@ob_start();
	@session_start();
	include("include/config.php");

	if(!empty($_POST['kullanici'])&&!empty($_POST['sifre'])){
		$kullanici = $_POST['kullanici'];
		$sifre = md5($_POST['sifre']);
		$sql = "SELECT * FROM user WHERE kullanici = '$kullanici'";
		$result = $conn->query($sql);
		if (mysqli_num_rows($result) > 0) {
			$row = $result->fetch_array(MYSQLI_NUM);
			if(!strcmp($sifre, $row[3])){ 
				$_SESSION['kullanici'] = $row[1];
				$_SESSION['sifre'] = $row[3];
				$_SESSION['yetki'] = $row[4];
				$bilgi = '<div class="alert alert-success"><strong>Giriş Başarılı! </strong> Yönlendiriliyorsunuz..</div>';
				header("Refresh: 1; url= dashboard.php");
			}else{
				$bilgi = "Şifre yanlış!";
			}
		}else{
			$bilgi = "Kullanıcı sistemde kayıtlı değil!";
		}
	}else{
		$bilgi = "Lütfen boş alan bırakmayınız!";
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
		<link href="assets/css/pages/login.css" rel="stylesheet" type="text/css" />  
	</head>

	<body>
		
		<div id="logo" class="center"></div>
		
		<div id="login">
			<img src="https://www.4m1a.com/wp-content/uploads/2020/03/4m1aLogo.png" alt="4M1A Yazılım" class="center" /> 
	   
			<form id="loginform" class="form-vertical no-padding no-margin" action="#" method="post">
				<p class="center">Kullanıcı adınızı ve şifrenizi yazınız.</p>
				<div class="control-group">
					<div class="controls">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-user"></i></span><input id="input-username" name="kullanici" type="text" placeholder="Kullanıcı Adı" />
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-lock"></i></span><input id="input-password" name="sifre" type="password" placeholder="Şifre" />
						</div>
					</div>
				</div>
				<div class="control-group remember-me">
					<div class="controls">
						<label class="checkbox">
						<input type="checkbox" name="remember" value="1"/> Beni Hatırla
						</label>
					</div>
				</div>
				<input type="submit" id="login-btn" class="btn btn-block btn-inverse" value="GİRİŞ" name="giris" />
			</form>
		</div>
	 
		<div id="login-copyright">
		  <?php
			if(isset($bilgi))
				echo  $bilgi;
			?>
			<br> Otopark Sistemi <br><a href="4m1a.com">4M1A Yazılım</a>
		</div>
	  
		<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script> 
		<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>    
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<!--[if lt IE 9]>
			<script src="assets/plugins/excanvas.js"></script>
			<script src="assets/plugins/respond.js"></script> 
		<![endif]-->  
		<script src="assets/plugins/breakpoints/breakpoints.js" type="text/javascript"></script>  
		<script src="assets/plugins/jquery.blockui.js" type="text/javascript"></script> 
		<script src="assets/plugins/jquery.cookie.js" type="text/javascript"></script>
		<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
		<script src="assets/scripts/app.js"></script>
		<script src="assets/scripts/login.js"></script> 
	  
		<script>
			jQuery(document).ready(function() {
				App.init();
				Login.init();
			});
		</script>
	</body>
</html>