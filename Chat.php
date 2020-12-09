<?php
include('A.php');
include('Sidebar.php');

if (isset($_SESSION['Usuario'])) {
$MsgR = $_GET['MsgR'];
if (!isset($_GET['MsgR'])) {
	
}
$query = "SELECT * FROM tb_usuario WHERE codigo = '".$_GET['MsgR']."'";

if ($result = $mysqli->query($query)) {
  while ($obj = $result->fetch_object()) {
  	$NomeG = $obj->nome;
}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Enviar Mensagem</title>
</head>
<body>
	<center>
<br>
<br>
<br>
<br>
<div style="width:650px;height:400px; overflow-y: scroll; overflow-x: hidden; border-radius:30px;border:2px solid black;background-color: lightgrey;">
<?php

echo "<br><p>Enviar Mensagem Para ".$NomeG."</p>";
	?>
	<form method="POST" style="position: fixed; margin-left: 20px; margin-top: 40px;">
	<br><textarea type="text" name="Mensagem" style="resize: none; height: 200px; width: 600px" required></textarea><br>
	<button class="btn btn-success" style='background-color:#A7EFCC; color:black; border-radius:30px;width:75px;height: 34px;'>ENVIAR</button>
	<button class="btn btn-success" style='background-color:#A7EFCC; color:black; border-radius:30px;width:75px;height: 34px;'><a href="ChatInicio.php">Voltar</a></button>
</form>
</div>
</center>
</body>
<?php
$Dest = $_GET['MsgR'];

if (isset($_POST['Mensagem'])) {

$sql = "insert into chat value(null,'".$Dest."','".$_POST['Mensagem']."',1,'".$_SESSION['Usuario']."')";

if ($query = $mysqli -> query($sql)) {
}
else{echo "<h1>ERRO MUITO</h1>";}
}

?>

<style type="text/css">
.frase{
	padding-left: 30px;
}
</style>
</html>
<?php }else{header('location:Login.php');}?>