<div id="header" class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a title="Anasayfa" class="brand" href="dashboard.php">Anasayfa</a>         
				 	
			<div class="top-nav">
				<ul class="nav pull-right" id="top_menu">
					<li class="divider-vertical hidden-phone hidden-tablet"></li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-wrench"></i>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#"><i class="icon-cogs"></i>Ayarlar</a></li>
						</ul>
					</li>

					<li class="divider-vertical hidden-phone hidden-tablet"></li>

					<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i>
							<b class="caret"></b>
							</a>
						<ul class="dropdown-menu">
							<li><a href="#"><i class="icon-user"></i> <?=$_SESSION['kullanici']?></a></li>
							<li class="divider"></li>
							<li><a href="#"><i class="icon-signout"></i> Oturumu Kapat</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div> 
</div>