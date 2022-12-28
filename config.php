<?php
	$servername = "localhost";
	$username = "root";
	$password = "";

	$conn = new mysqli($servername, $username, $password);

	if ($conn->connect_error) {
		die("Bağlantı Hatası: " . $conn->connect_error);
	}
	echo "Bağlantı Başarılı!";
?>