<?php
	function oturumkontrol(){
		$kullanici = $_SESSION['kullanici'];
		$sifre = $_SESSION['sifre'];
		$sql = "SELECT * FROM user WHERE kullanici = '$kullanici'";
		$result = $conn->query($sql);
		if (mysqli_num_rows($result) > 0) {
			$row = $result->fetch_array(MYSQLI_NUM);
			if(strcmp($sifre, $row[3])){
				echo '<script language="javascript">window.location="index.php";</script>';
			}
		}
	}
?>