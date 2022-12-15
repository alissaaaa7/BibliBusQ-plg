<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "biblibusq";
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	?> <?php
	$verifica = 0;
	$titulo = $_POST['titulo'];
	$autor = $_POST['autor'];
?>

<style>
 .back {
	color: #fff;
	background-color: #003566;
	
 }
</style>
