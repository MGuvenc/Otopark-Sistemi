<?php
	@ob_start();
	@session_start();
	include("include/config.php");
	date_default_timezone_set('Asia/Istanbul');
	if(empty($_SESSION["kullanici"])){
		header("Refresh: 0; url= index.php");
	}else if(!strcmp("Patron", $_SESSION['yetki'])){
?>
<?php
	$i = 0;
	$selectUser = "SELECT * FROM user";
	$queryUser = $conn -> query($selectUser);
	$arrayID=array();//1 2
	$arrayUser=array();//1350 0
	$arrayKadi = array();//mg mg2
	if (mysqli_num_rows($queryUser)>0){
		while($rowUser = $queryUser->fetch_array(MYSQLI_NUM)){
			array_push($arrayID,$rowUser[0]);
			array_push($arrayKadi,$rowUser[1]);
		}
	}
	$mesaj ="";
	for($a = 0; $a < count($arrayID); $a++){
		$selectKasa = "SELECT * FROM kasa";
		$queryKasa = $conn -> query($selectKasa);
		if (mysqli_num_rows($queryKasa)>0){
			while ($rowKasa = $queryKasa->fetch_array(MYSQLI_NUM)) {
				if(!strcmp($rowKasa[3],$arrayID[$a])){
					$i += $rowKasa[2];
				}
			}
			array_push($arrayUser,$i);
			$i = 0;
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
									<h4><i class="icon-cloud"></i> Kasa</h4>
								</div>
								<div class="widget-body">
									<div class="clearfix margin-bottom-10"></div><table class="table table-striped table-bordered table-hover" id="sample_1" style="font-size:12px;">
										<thead>
											<tr>
												<th>Kullanıcı Adı</th>
												<th>Toplam Ciro</th>
											</tr>
										</thead>
										<tbody>
											<?php
												for($a = 0; $a < count($arrayID); $a++){
													echo '<tr><td>'.$arrayKadi[$a].'</td><td>'.$arrayUser[$a].' TL</td></tr>';
												}
											?>
										</tbody>
									</table>
									<canvas id="canvas" width="600" height="500"></canvas>
									
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
		<script type="text/javascript">
			var myColor = ["#39ca74","#e54d42","#f0c330","#3999d8","#35485d"];
			var myData = [];
			var myLabel = [];
			<?php for($a = 0; $a < count($arrayID); $a++){ ?>
			myLabel.push("<?=$arrayKadi[$a];?>");
			myData.push(<?=$arrayUser[$a];?>);
			<?php } ?>
			function getTotal(){
				var myTotal = 0;
				for (var j = 0; j < myData.length; j++) {
					myTotal += (typeof myData[j] == 'number') ? myData[j] : 0;
				}
				return myTotal;
			}
 
			function plotData() {
				var canvas;
				var ctx;
				var lastend = 0;
				var myTotal = getTotal();
				var doc;
				canvas = document.getElementById("canvas");
				var x = (canvas.width)/2;
				var y = (canvas.height)/2;
				var r = 150;
  
				ctx = canvas.getContext("2d");
				ctx.clearRect(0, 0, canvas.width, canvas.height);
 
				for (var i = 0; i < myData.length; i++) {
					ctx.fillStyle = myColor[i];
					ctx.beginPath();
					ctx.moveTo(x,y);
					ctx.arc(x,y,r,lastend,lastend+(Math.PI*2*(myData[i]/myTotal)),false);
					ctx.lineTo(x,y);
					ctx.fill();
    
					// Grafik üzerindeki ifadeler bu kısımdan sonra yaptırılacak.
					ctx.beginPath();
					var start = [];
					var end = [];
					var last = 0;
					var flip = 0;
					var textOffset = 0;
					var precentage = (myData[i]/myTotal)*100;
					start = getPoint(x,y,r-20,(lastend+(Math.PI*2*(myData[i]/myTotal))/2));
					end = getPoint(x,y,r+20,(lastend+(Math.PI*2*(myData[i]/myTotal))/2));
					if(start[0] <= x){
						flip = -1;
						textOffset = -110;
					}else{
						flip = 1;
						textOffset = 10;
					}
					ctx.moveTo(start[0],start[1]);
					ctx.lineTo(end[0],end[1]);
					ctx.lineTo(end[0]+120*flip,end[1]);
					ctx.strokeStyle = "#bdc3c7";
					ctx.lineWidth   = 2;
					ctx.stroke();
   
					// Etiketler ayarlanıyor
					ctx.font="17px Arial";
					ctx.fillText(myLabel[i].toUpperCase()+" > "+precentage.toFixed(0)+"%",end[0]+textOffset,end[1]-4); 
   
					// Döngü artırılıyor
					lastend += Math.PI*2*(myData[i]/myTotal);
    
				}
			}
			// Sihirli nokta bulunuyor.
			function getPoint(c1,c2,radius,angle) {
				return [c1+Math.cos(angle)*radius,c2+Math.sin(angle)*radius];
			}
			// Çizim fonksiyonu çalıştırılıyor.
			plotData();
		</script>
	</body>
</html>
<?php 
	}else{
		header("Refresh: 0; url= dashboard.php");
	}
?>