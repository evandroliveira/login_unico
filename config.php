<?php
	try {
		$pdo = new PDO("mysql:dbname=login_unico;host=localhost", "root", "");
		
	} catch (PDOEception $e) {
		echo "ERRO: ".$e->getMessage();
	}
?>