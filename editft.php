<?php
include('A.php');
include('Sidebar.php');
if (isset($_SESSION['Usuario'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Editar foto</title>
<meta charset="utf-8">
</head>
<link rel="stylesheet" type="text/css" href="CSS.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<meta http-equiv="refresh" content="20"> 
<body>
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
	echo "<form method='POST' style='background-color: lightgrey; width: 600px; border-radius: 20px;' enctype='multipart/form-data'>
		<br>
		<b>Atual foto de perfil:</b>
		<br>";?>
		<img src="<?php echo $obj->foto;?>" style="width:200px;height:200px; border-radius:30px;border:2px solid black;">
		<br><br>
		<input type="file" name="arquivo" value="<?php echo $obj->foto;?>">
		<br><br>
		<?php echo "
        <button class='btn btn-info' name='button' style='width: 300px; height: 30px; border-radius: 15px;'><em>Enviar</em></button>
		<br><br>
	</form>";
	if (isset($_POST['button'])) {
		$dir = "upload/imagens";
		$file = $_FILES["arquivo"];
		$arquivo = "$dir/".$file["name"];

		if(move_uploaded_file($file["tmp_name"], $arquivo )){
				$query = "UPDATE tb_usuario SET foto = '".$arquivo."' WHERE codigo = '".$codigo."'";
    			if ($q = $mysqli -> query($query)) {
    				 echo "<script> alert('Imagem editada com sucesso!');</script>";
				}else{echo $mysqli->error;}
		}else{
			echo "<script> alert('Erro no envio da imagem!');</script>";}
	}
	echo "<a style='font-size: 20px;' href='perfil2.php?cod=".$_SESSION['Usuario']."'>Voltar</a> ";
}
}
} 
}else{header('location:Login.php');}?>
</center>
</body>
</html>