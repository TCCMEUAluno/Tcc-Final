<?php
include('A.php');
include('Sidebar.php');
if (isset($_SESSION['Usuario'])) {

$u = "SELECT  * FROM tb_usuario";
if ($result = $mysqli->query($u)) {
    while ($obj = $result->fetch_object()) {
      $Tipo = $obj->tipo;
    }
}
      if ($Tipo ='2') {
      		$name = '';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar matéria</title>
<meta charset="utf-8">
</head>
<body>
	<br>
<button class="btn btn-success" style='background-color:#A7EFCC; color:black; border-radius:30px;width:75px;height: 34px;'><?php echo"<a style='font-size: 15px;' href='index.php'>Voltar</a>"; ?></button>
	<center>
		<h1><em id="Tit">Cadastro de matéria</em></h1>
<div id="color2">
	<form method="POST" style="background-color: lightgrey; width: 600px; border-radius: 20px;" >
		<br>
		<br>
		<b id="col" style="font-size: 20px;">Nova matéria:</b>
		<br>
		<input type="text" name="nome" required style="width: 450px; height: 30px; border-radius: 15px;">
		<br>
		<br>
		<br>
		<button class="btn btn-info" style="width: 300px; height: 30px; border-radius: 15px;"><em>Cadastrar</em></button>
		<br>
		<br>
		<a href="materias.php"><em id="Hl" style="color: red;"> Ver matérias</em></a>
		<br>
		<br>
	</form>
</div>
	<br>
	<br>
</center>
<?php 
if (isset($_POST['nome'])) {

	$query_select = "SELECT nome FROM tb_materia WHERE nome = '".$_POST['nome']."'";
            if ($query = $mysqli -> query($query_select)) {
              while ($obj = $query->fetch_object()) {

                $name = $obj->nome;
              }
            }
             if($name == $_POST['nome']){
                  echo"<script> alert('Essa matéria já existe');</script>";
                }
                else{
					$materia = "INSERT INTO tb_materia value('null','".$_POST['nome']."', 'null')";
					if ($query = $mysqli -> query($materia)) {
						echo"<script> alert('Matéria gravada com sucesso!');</script>";
					}else{echo $mysqli->error;}
				}
}				
?>
</body>
</html>

<?php  
}if ($Tipo != '2') {
        header('location:index.php');
      }
}else{header('location:Login.php');}

?>