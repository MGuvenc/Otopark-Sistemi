<div id="sidebar" class="nav-collapse collapse">
	<div class="sidebar-toggler hidden-phone"></div>
	<ul>
		<li class="start active ">
			<a href="dashboard.php">
				<i class="icon-home"></i> 
				<span class="title">Ana Sayfa</span>
			</a>
		</li>
	<?php
		if(!strcmp("Patron", $_SESSION['yetki'])){
	?>
	
		<li class="has-sub ">
			<a href="javascript:;">
				<i class="icon-group"></i> 
				<span class="title">Eleman Yönetimi</span>
                <span class="arrow "></span>
			</a>
            <ul class="sub">
				<li ><a href="eleman_ekle.php">Eleman Ekle</a></li>
				<li ><a href="eleman.php">Eleman Görüntüle</a></li>
				<li ><a href="eleman_cikar.php">Eleman Çıkar</a></li>
			</ul>
		</li>
		
		<li class="has-sub ">
			<a href="javascript:;">
				<i class="icon-edit"></i> 
				<span class="title">Raporlar</span>
                <span class="arrow "></span>
			</a>
            <ul class="sub">
				<li ><a href="rapor.php">Rapor Görüntüle</a></li>
            </ul>
        </li>
		
		<li class="has-sub ">
			<a href="javascript:;">
				<i class="icon-tags"></i> 
				<span class="title">Fiyat Yönetimi</span>
				<span class="arrow "></span>
			</a>
			<ul class="sub">
                <li ><a href="fiyat.php">Fiyat Listesi</a></li>
			</ul>
		</li>
		
        <li class="has-sub ">
			<a href="javascript:;">
				<i class="icon-cloud"></i> 
				<span class="title">Kasa Yönetimi</span>
				<span class="arrow "></span>
			</a>
			<ul class="sub">
				<li ><a href="kasa.php">Kasa Görüntüle</a></li>
			</ul>
		</li>
		
	<?php } ?>
	<?php
		if(!strcmp("Eleman", $_SESSION['yetki'])){
	?>
	
        <li class="has-sub ">
			<a href="javascript:;">
				<i class="icon-bookmark-empty"></i> 
				<span class="title">Araç Yönetimi</span>
				<span class="arrow "></span>
			</a>
			<ul class="sub">
				<li ><a href="arac_giris.php">Araç Ekle</a></li>
                <li ><a href="arac.php">Araç Görüntüle</a></li>
                <li ><a href="arac_cikis.php">Araç Çıkışı</a></li>
			</ul>
		</li>
		
	<?php } ?>
	
	<?php
		if(!strcmp("Admin", $_SESSION['yetki'])){
	?>
	
        <li class="has-sub ">
			<a href="javascript:;">
				<i class="icon-cogs"></i> 
				<span class="title">Site Yönetimi</span>
                <span class="arrow "></span>
			</a>
            <ul class="sub">
                <li ><a href="yonetici_ekle.php">Yönetici Ekle</a></li> 
                <li ><a href="yonetici.php">Yönetici Görüntüle</a></li>                       
			</ul>
        </li>
		
	<?php } ?>
	
		<li class="">
			<a href="include/cikis.php">
				<i class="icon-signout"></i> 
				<span class="title">Oturumu Kapat</span>
			</a>
		</li>
	</ul>
</div>