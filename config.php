<?php
try {
	$pdo = new PDO("mysql:dbname=reserva_veiculo;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}