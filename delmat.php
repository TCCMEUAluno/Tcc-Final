<?php
session_start();
include("A.php");
if (isset($_SESSION['Usuario'])) {

$u = "SELECT  * FROM tb_usuario";
if ($result = $mysqli->query($u)) {
    while ($obj = $result->fetch_object()) {
      $Tipo = $obj->tipo;
      if ($Tipo = '2') {

			$codigo = $_GET['cd'];

			if(!empty($_GET['cd'])){

				$mat = "DELETE FROM tb_materia WHERE codigo = $codigo";
				$materia = mysqli_query($mysqli, $mat);

				$cont = "DELETE FROM tb_conteudo WHERE id_materia = $codigo";
				$conteudo = mysqli_query($mysqli, $cont);

				if(mysqli_affected_rows($mysqli)){

				}else{echo  $mysqli->error;}

			}header('location:adm.php');

		}if ($Tipo != '1' || $Tipo != '0') {
	        header('location:index.php');
	    }
	}
}
}else{header('location:Login.php');}