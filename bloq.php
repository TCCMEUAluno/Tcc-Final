<?php
include('A.php');



	$codigo = $_GET['codigo'];
if(isset($_GET['codigo'])){
	 $bloq = "UPDATE tb_usuario SET status = 'Desativado' WHERE codigo = $codigo ";
			if ($q = $mysqli -> query($bloq)) {
				}else{echo $mysqli->error;}
        header('location:adm.php');
}
else{
	echo "Erro";
}


?>