<?php
include('A.php');
session_start();

?>	
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
<meta charset="utf-8">  

<link rel="stylesheet" type="text/css" href="CSS.css">
<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body style="overflow-y: hidden;">
	<br>
	<center>
		<h1><em id="Tit">Login</em></h1>
		<div id="color3">
			<img src="Imagens/perfil.png" style="width: 220px;">
	<form method="POST" style="background-color: lightgrey; width: 600px; border-radius: 20px;">
		<br>
		<br>
		<b id="col" style="font-size: 20px;">Email:</b>
		<br>
		<input type="Email" name="Login" style="width: 450px; height: 30px; border-radius: 15px;" required>
		<br>
		<br>
		<b id="col" style="font-size: 20px;">Senha:</b>
		<br>
		<input type="password" name="Senha" style="width: 450px; height: 30px; border-radius: 15px;" required>
		<br>
		<br>
		<br>
		<button class="btn btn-success" style="width: 300px; height: 30px; border-radius: 15px;"><em>Enviar</em></button>
		<br>
		<br>
		<em>Não é Registrado ainda? Clique</em><a href="Cadastro.php"><em id="Hl" style="color: red;"> Aqui!</em></a>
		</div>
		<br>
		<br>
		<br>
	</form>
	<br>
	<br>
</center>
<?php

$query = "SELECT * FROM tb_usuario";


if (!isset($_SESSION['Usuario'])) {

	if (isset($_POST['Senha'])) {

		if ($result = $mysqli->query($query)) {
			while ($obj = $result->fetch_object()) {
				
				if (crypt($_POST['Senha'], $obj->senha) == $obj->senha) {

					if ($obj->email == $_POST['Login']) {

						if ($obj->status =='Ativo') {
							$_SESSION['Usuario'] = $obj->codigo;

							$sql = "insert into acesso value(null,'".$_SESSION['Usuario']."',(now()),null)";

							if ($query = $mysqli -> query($sql)) {

								header("location:Index.php");
							}
						}else{

							echo"<script> alert('Sua conta foi bloqueada!')</script>";
						}
					}
				}
			}	
		}
	}
}else{
	header("location:Index.php");
}
?>
</body>
</html>