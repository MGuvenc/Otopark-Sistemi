<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "otopark";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Bağlantı Hatası: " . $conn->connect_error);
	}
?>