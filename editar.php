<?php
include('A.php');
include('Sidebar.php');
if (isset($_SESSION['Usuario'])) {

?>
<!DOCTYPE html>
<html>
<head>
	<title>Editar</title>
<meta charset="utf-8">
</head>
<link rel="stylesheet" type="text/css" href="CSS.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<meta http-equiv="refresh" content="20"> 
<body>
<br>
<button class="btn btn-success" style='background-color:#A7EFCC; color:black; border-radius:30px;width:75px;height: 34px;'><?php echo"<a style='font-size: 15px;' href='perfil2.php?cod=".$_SESSION['Usuario']."'>Voltar</a>"; ?></button>
	<center>

		<br><br>
<?php
$codigo = $_GET['cod'];
if(!empty($_GET['cod'])){
 $usu = "SELECT * FROM tb_usuario WHERE codigo = $codigo";
 $result = mysqli_query($mysqli, $usu);
 if ($res = $mysqli->query($usu)) {
  while($obj = $res->fetch_object()) {
  	$Tipo = $obj->tipo;
  	if($Tipo == 0){        
		echo "<form method='POST' style='background-color: lightgrey; width: 600px; border-radius: 20px;' enctype='multipart/form-data'>
			<br>
			<br>
			<b id='col' style='font-size: 20px;'>Nome:</b>
			<br>
			<input type='text' name='nome' required placeholder='Ex.: Rafael' value='$obj->nome' style='width: 450px; height: 30px; border-radius: 15px;'>
			<br><br>
			<b id='col' style='font-size: 20px;'>Email:</b>
			<br>
			<input type='Email' name='Login' required placeholder='Ex.: Rafa@Naumsei.com' value='$obj->email' style='width: 450px; height: 30px; border-radius: 15px;'>
			<br><br>
			<b id='col' style='font-size: 20px;'>Senha:</b>
			<br>
			<input type='password' name='Senha' required placeholder='Ex.: °°°°°°°°°°' value='$obj->senha;' style='width: 450px; height: 30px; border-radius: 15px;'>
			<br><br>
			<b id='col' style='font-size: 20px;'>Descrição:</b>
			<br>
			<input type='text' name='descricao' placeholder='Ex.: pipipipopopo' value='$obj->descricao' style='width: 450px; height: 30px; border-radius: 15px;'>
			<br><br>
			<b id='col' style='font-size: 20px;'>Aniversário:</b>
			<br>
			<input type='date' name=data value='$obj->dt_nascimento' style='width: 450px; height: 30px; border-radius: 15px;'>
			<br>
	        <br>
	        <button class='btn btn-info' name='button' style='width: 300px; height: 30px; border-radius: 15px;'><em>Enviar</em></button>
			<br><br>
		</form>";
		if (isset($_POST['button'])) {

			$Senha = $_POST['Senha'];
			$custo = '04';
			$salt = 'Cf1f11ePArKlBJomM0F6aJ';
			$hash = crypt($Senha, '$2a$' . $custo . '$' . $salt . '$');

			$nome = $_POST["nome"];
			$Login = $_POST["Login"];
			$descricao = $_POST["descricao"];
			$data = $_POST["data"];

	    		$query = "UPDATE tb_usuario SET nome = '$nome', email = '$Login', senha = '$hash', descricao = '$descricao', dt_nascimento = '$data' WHERE codigo = '".$codigo."'";
	    			if ($q = $mysqli -> query($query)) {
	    				 echo "<script> alert('Conta editada com sucesso!');</script>";
					}else{echo $mysqli->error;echo "erro";}
		}
  	}else{
		echo "<form method='POST' style='background-color: lightgrey; width: 600px; border-radius: 20px;' enctype='multipart/form-data'>
			<br>
			<b id='col' style='font-size: 20px;'>Nome:</b>
			<br>
			<input type='text' name='nome' required placeholder='Ex.: Rafael' value='$obj->nome' style='width: 450px; height: 30px; border-radius: 15px;'>
			<br><br>
			<b id='col' style='font-size: 20px;'>Email:</b>
			<br>
			<input type='Email' name='Login' required placeholder='Ex.: Rafa@Naumsei.com' value='$obj->email' style='width: 450px; height: 30px; border-radius: 15px;'>
			<br><br>
			<b id='col' style='font-size: 20px;'>Senha:</b>
			<br>
			<input type='password' name='Senha' required placeholder='Ex.: °°°°°°°°°°' value='$obj->senha' style='width: 450px; height: 30px; border-radius: 15px;'>
			<br><br>
			<b id='col' style='font-size: 20px;'>Descrição:</b>
			<br>
			<input type='text' name='descricao' placeholder='Ex.: pipipipopopo' value='$obj->descricao' style='width: 450px; height: 30px; border-radius: 15px;'>
			<br><br>
			<b id='col' style='font-size: 20px;'>Aniversário:</b>
			<br>
			<input type='date' name=data value='$obj->dt_nascimento' style='width: 450px; height: 30px; border-radius: 15px;'>
			<br><br>
	        <b id='col' style='font-size: 20px;'>Referencia de instituição:</b>
	        <br>
	        <input type='text' name='ref' required value='$obj->ref_instituicao' placeholder='Ex.: pipipipopopo' style='width: 450px; height: 30px; border-radius: 15px;'>
	        <br><br>
	        <b id='col' style='font-size: 20px;'>Conclusão de estudo:</b>
	        <br>
	        <input type='date' name='date' required value='$obj->dt_conclusao' style='width: 450px; height: 30px; border-radius: 15px;'>
	        <br>
	        <br>
	        <button class='btn btn-info' name='button' style='width: 300px; height: 30px; border-radius: 15px;'><em>Enviar</em></button>
			<br><br>
		</form>";
		if (isset($_POST['button'])) {

			$Senha = $_POST['Senha'];
			$custo = '04';
			$salt = 'Cf1f11ePArKlBJomM0F6aJ';
			$hash = crypt($Senha, '$2a$' . $custo . '$' . $salt . '$');

			$nome = $_POST["nome"];
			$email = $_POST["Login"];
			$descricao = $_POST["descricao"];
			$data = $_POST["data"];
			$date = $_POST["date"];
			$ref = $_POST["ref"];

    		$query = "UPDATE tb_usuario SET nome = '$nome', email = '$email', senha = '$hash', descricao = '$descricao', dt_nascimento = '$data',dt_conclusao = '$date',ref_instituicao = '$ref' WHERE codigo = '".$codigo."'";
    			if ($q = $mysqli -> query($query)) {
    				 echo "<script> alert('Conta editada com sucesso!');</script>";
				}else{echo $mysqli->error;
					echo "erro";}
		}
	}
  }
 }
}
}else{header('location:Login.php');}
 ?>
</center>
<br>
</body>
</html>
