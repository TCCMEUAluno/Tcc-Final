<?php
session_start();
include("A.php");
if (isset($_SESSION['Usuario'])) {

$codigo = $_GET['codigo'];

if(!empty($_GET['codigo'])){

	$usuario = "DELETE FROM imagens WHERE codigo = $codigo";
	$usu = mysqli_query($mysqli, $usuario);

	if(mysqli_affected_rows($mysqli)){
		header('location:upload.php');
	}else{echo  $mysqli->error;}
}
}else{header('location:Login.php');}