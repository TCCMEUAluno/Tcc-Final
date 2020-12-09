<?php
include('A.php');
session_start();

if (isset($_POST['nome'])) {

	$query_select = "SELECT email FROM tb_usuario WHERE email = '".$_POST['Login']."'";
	if ($query = $mysqli -> query($query_select)) {
		while ($obj = $query->fetch_object()) {
			$email = $obj->email;
		}
	}

	 if($email == $_POST['Login']){
        echo"<script> alert('Esse email já existe');</script>";
      }
      else{
			if (isset($_POST['Tipo'])) {
				
				$Senha = $_POST['Senha'];
				$custo = '04';
				$salt = 'Cf1f11ePArKlBJomM0F6aJ';
				$dir = "upload/imagens";
				$file = $_FILES["arquivo"];
				$arquivo = "$dir/".$file["name"];
				$hash = crypt($Senha, '$2a$' . $custo . '$' . $salt . '$');

				if(move_uploaded_file($file["tmp_name"], $arquivo )){
					echo "Arquivo enviado com sucesso!";
					$sql = "insert into tb_usuario value(null,'".$_POST['nome']."','".$_POST['Login']."','".$hash."', '".$_POST['desc']."', '".$_POST['data']."',null, null, null,'".$_POST['Tipo']."', '".$arquivo."','Ativo')";

					if ($query = $mysqli -> query($sql)) {
						header("location:Login.php");
					}else{echo "<h1>É nescessário escolher o tipo de perfil '".$_POST['nome']."'</h1>";}
				}else{echo "Erro, o arquivo não pode ser enviado";}
			}
		}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
<meta charset="utf-8">
</head>
<link rel="stylesheet" type="text/css" href="CSS.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<body>
	<center>
		<br>
		<br>
		<br>
		<h1><em id="Tit">Cadastro</em></h1>
		<div id="color2">
	<form method="POST" style="" enctype="multipart/form-data">
		<div class="col-md-4" style="margin-left: 200px;border-radius: 20px; background-color: lightgrey; border-color: black; width: 480px; height: 365px;">
		<br>
		<b id="col" style="font-size: 20px;">Foto de Perfil:</b>
		<br>
		<input type="file" name="arquivo" required>
		<br>
		<b id="col" style="font-size: 20px;">Nome:</b>
		<br>
		<input type="text" name="nome" required placeholder="Ex.: Rafael" style="width: 450px; height: 30px; border-radius: 15px;">
		<br>
		<br>
		<b id="col" style="font-size: 20px;">Email:</b>
		<br>
		<input type="Email" name="Login" required placeholder="Ex.: Rafa@Naumsei.com" style="width: 450px; height: 30px; border-radius: 15px;">
		<br>
		<br> 
		<b id="col" style="font-size: 20px;">Senha:</b>
		<br>
		<input type="password" name="Senha" required placeholder="Ex.: °°°°°°°°°°" style="width: 450px; height: 30px; border-radius: 15px;">
		<br>
		</div>
		<div class="col-md-4" style="margin-left: 10px;border-radius: 20px; background-color: lightgrey;  width: 480px;">
			<br>
		<b id="col" style="font-size: 20px;" style="width: 450px; height: 30px; border-radius: 15px;">Você é:</b>
		<br>
		<div style="text-align: center;">
		<input type="radio" name="Tipo" value="0" style="font-size: 20px; width: 20px; height: 15px;" required> &ensp;Aluno</input>
		<br>
		&ensp;&ensp;&ensp; <input type="radio" name="Tipo" value="1" style="font-size: 20px; width: 20px; height: 15px;" required> &ensp;Professor</input>
		<br>
		&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; <input type="radio" name="Tipo" value="2" style="font-size: 20px; width: 20px; height: 15px;" required> &ensp;Administrador</input>
		</div>
		<br>
		<b id="col" style="font-size: 20px;">Descrição:</b>
		<br>
		<input type="text" name="desc" required placeholder="Ex.: pipipipopopo" style="width: 450px; height: 30px; border-radius: 15px;">
		<br>
		<br>
		<b id="col" style="font-size: 20px;">Aniversário:</b>
		<br>
		<input type="date" name=data required style="width: 450px; height: 30px; border-radius: 15px;">
		<br>
		<br>
		<button class="btn btn-info" style="width: 300px; height: 30px; border-radius: 15px;"><em>Enviar</em></button>
		<br>
		<br>
		<em id="col">Se Enganou? Clique</em><a href="Login.php"><em id="Hl" style="color: red;"> Aqui </em></a><em id="col">Para Voltar.</em>
		<br>
		</div>
	</form>
	</div>
	<br>
	<br>
</center>
</body>
</html>
