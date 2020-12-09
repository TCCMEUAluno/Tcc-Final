<?php
session_start();
include("A.php");
if (isset($_SESSION['Usuario'])) {
	$u = "SELECT  * FROM tb_usuario";
	if ($result = $mysqli->query($u)) {
	    while ($obj = $result->fetch_object()) {
	      $Tipo = $obj->tipo;
	      if ($Tipo ='2') {
				$codigo = $_GET['cod'];

				if(!empty($_GET['cod'])){

					$tag = "DELETE FROM tb_tag WHERE codigo = $codigo";
					$usu = mysqli_query($mysqli, $tag);

					if(mysqli_affected_rows($mysqli)){
						header('location:adm.php');
					}else{echo  $mysqli->error;}
				}header('location:adm.php');

		 }if ($Tipo != '1') {
	        header('location:index.php');
	      }

	    }
	}
}else{header('location:Login.php');
}