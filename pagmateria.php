<?php
include('A.php');
include('Sidebar.php');
if (isset($_SESSION['Usuario'])) {

$cd = $_GET['cd'];

if(!empty($_GET['cd'])){
  $result_materia = "SELECT * FROM tb_conteudo WHERE id_materia = $cd";
  $resultado = mysqli_query($mysqli, $result_materia);
}

$conteudo = "SELECT codigo FROM tb_conteudo WHERE id_materia = $cd";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Conteúdos</title>
	<meta charset="utf-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</head>

<body>
<br>
<center>
<br>
<br>
<?php 
  if ($result = $mysqli->query($result_materia)) {
      while ($obj = $result->fetch_object()) {
        echo"
        <div class='col-sm-3 '>
        <div class='card' style='width:260px; border-radius:20px;margin-top:10px;'>
                  <div class='card-body'> 
                  <center>
                  <a style='font-size:15px;' href='video.php?cd=".$obj->codigo."'>"."Conteúdo: " .$obj->nome. " - Professor(a): " .$obj->nm_usuario."</a>
                  </center>
                   </div>
            </div>
            </div>"; }}

}else{header('location:Login.php');}?>


</center>
</body>
<style type="text/css">
  a{
    font-size: 10px;
    color: black;
  }
  #s{
    padding-left: 80px;
    padding-top: -10px;
    padding-bottom: 20px;
    margin: 50px;
}
.card{
  width: 200px;
}
</style>
</html>

