<?php
include('A.php');



      $cod = $_GET['cod'];
if(isset($_GET['cod'])){

 $desbloq = "UPDATE tb_usuario SET status = 'Ativo' WHERE codigo = $cod ";
			if ($q = $mysqli -> query($desbloq)) {
						}else{echo $mysqli->error;}
             header('location:adm.php');
}
else{
	echo "Erro";
}


?>