<?php
include('A.php');
include('Sidebar.php');
if (isset($_SESSION['Usuario'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Busca por conteúdo</title>
</head>
<body >
  <br>
<center>
<div style="background-color:white; width: 900px;overflow-x: hidden; overflow:auto; height: 500px;border: 2px solid black; border-radius: 10px">
  <br><?php
if($_POST){
  $BuscaR = $_POST['BuscaR'];
  $query = "SELECT * FROM tb_conteudo WHERE nome LIKE '%".$_POST['BuscaR']."%'";
  if ($result = $mysqli->query($query)) {
    while ($obj = $result->fetch_object()) {
      $materia = $obj->id_materia;
      $data = $obj->dt_publicacao;
      $nome = $obj->nome;
      $usuario = $obj->nm_usuario;
      $descricao = $obj->descricao;
      $codigo = $obj->codigo;
    echo "<div style='width: 800px;height:120px; border-bottom:1px solid black;font-size:15px;'><br>";
            echo"<br><div class='col-md-6'><b>Data de publicação: $data</b></div>
            <div class='col-md-6'>Conteúdo: $nome</div> 
            <div class='col-md-6'><b>Professor: $usuario</b></div>
            <div>$descricao</div>";
            echo"<div><a href='video.php?cd=".$codigo."'> Ver mais </a></div>
            <br>
          <div>
    ";  

  }
  }
}
}else{header('location:Login.php');}
?>

</div>
</center>
<br>
  </body>
</html>