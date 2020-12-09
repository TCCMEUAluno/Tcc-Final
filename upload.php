<?php
include('A.php');
include('Sidebar.php');
if (isset($_SESSION['Usuario'])) {

if (isset($_POST['Enviar'])) {

$dir = "upload/inicio";

$file = $_FILES["arquivo"];

$arquivo = "$dir/".$file["name"];

if(move_uploaded_file($file["tmp_name"], $arquivo )){

	$sql = "INSERT INTO imagens values ('null','".$arquivo."','1')";

	if ($mysqli->query($sql)) {
	}
	else{
	}
}
else{
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Upload de fotos</title>
<meta charset="utf-8">
<meta http-equiv="refresh" content="20"> 
</head>
<body>

<br>
<center>
<div style="width: 1200px;"> 
<br>
<b style="font-size: 20px;">Faça upload das imagens para o carrossel</b>
<br>
<b style="font-size: 10px;">As imagens devem ter 400px de altura e 1200px de largura</b>
<hr>
<form action="" method="post" enctype="multipart/form-data">
<input class="btn btn-sucess" type="file" name="arquivo" />
<input class="btn btn-sucess" type="submit" name="Enviar">
</form>
<br>

<div style="border-radius:30px;border:2px solid black; width: 1200px;">
 <br>
 <br>
<?php 
$sql_select = "SELECT * from imagens Where Tipo = 1";
if ($res = $mysqli->query($sql_select)) {
	while ($obj = $res->fetch_object()) {
	?>
	<div style="border-radius:30px;border:2px solid black; background-color: white; width:430px ;height: 280px; display: inline-block;">
	<img src="<?php echo $obj->nome; ?>" style="width: 400px;height: 200px; margin-top: 10px;">
	<div style=" width:200px;"><a href='<?php echo "delimg.php?codigo=".$obj->codigo.""?>'>Apagar</a></div>
	</div>
<?php
	}
}else{
	echo $mysqli->error;
}

 ?>
 <br>
 <br>
</div>
</div>
</center>
<br>
<br>

<?php
if (isset($_POST['Envia'])) {

$dir = "upload/inicio";

$file = $_FILES["arqui"];

$arqui = "$dir/".$file["name"];

if(move_uploaded_file($file["tmp_name"], $arqui )){

	$sql = "INSERT INTO imagens values ('null','".$arqui."','2')";

	if ($mysqli->query($sql)) {
	}
	else{
	}
}
else{
}
}?>

<br>
<center>
<div style="width: 1200px;"> 
<br>
<b style="font-size: 20px;">Faça upload das imagens para os destaques</b>
<br>
<b style="font-size: 10px;">As imagens devem ter entre 200px de altura e 260px de largura</b>
<hr>
<form action="" method="post" enctype="multipart/form-data">
<input class="btn btn-sucess" type="file" name="arqui" />
<input class="btn btn-sucess" type="submit" name="Envia">
</form>
<br>

<div style="border-radius:30px;border:2px solid black; width: 1200px;">
 <br>
 <br>
<?php 
$sql_select = "SELECT * from imagens Where Tipo = 2";
if ($res = $mysqli->query($sql_select)) {
	while ($obj = $res->fetch_object()) {
	?>
	<div style="border-radius:30px;border:2px solid black; background-color: white; width:290px ;height: 240px; display: inline-block;">
	<img src="<?php echo $obj->nome; ?>" style="width: 260px;height: 200px; margin-top: 10px;">
	<div style=" width:200px;"><a href='<?php echo "delimg.php?codigo=".$obj->codigo.""?>'>Apagar</a></div>
	</div>
<?php
	}
}else{
	echo $mysqli->error;
}

}else{header('location:Login.php');}
 ?>
 <br>
 <br>
</div>
</div>
</center>
<br>
<br>


</body>
</html>