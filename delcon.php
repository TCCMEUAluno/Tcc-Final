<?php
session_start();
include("A.php");
if (isset($_SESSION['Usuario'])) {


$u = "SELECT  * FROM tb_usuario";
if ($result = $mysqli->query($u)) {
    while ($obj = $result->fetch_object()) {
      $Tipo = $obj->tipo;
      if ($Tipo ='2') {

			$codigo = $_GET['cd'];

			if(!empty($_GET['cd'])){

				$cont = "DELETE FROM tb_conteudo WHERE codigo = $codigo";
				$conteudo = mysqli_query($mysqli, $cont);

				$anexo = "DELETE FROM tb_anexo WHERE id_conteudo = $codigo";
				$anexos = mysqli_query($mysqli, $anexo);

				$tag = "DELETE FROM tb_tag WHERE id_conteudo = $codigo";
				$tags = mysqli_query($mysqli, $tag);

				$vis = "DELETE FROM tb_vis WHERE id_conteudo = $codigo";
				$visualizacao = mysqli_query($mysqli, $vis);

				if(mysqli_affected_rows($mysqli)){
					
				}else{echo  $mysqli->error;}

			}
			header('location:adm.php');

	  }if ($Tipo !='2') {

			 header('location:index.php');

	  }

    }
}
}else{header('location:Login.php');}