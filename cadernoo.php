<?php
include('A.php');
include('Sidebar.php');


  $result_materia = "SELECT * FROM tb_conteudo ";
  $resultado = mysqli_query($mysqli, $result_materia);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Caderno</title>
	<meta charset="utf-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</head>

<body>
<br>
<br>
<br>
<center>
<?php 
  if ($result = $mysqli->query($result_materia)) {
      while ($obj = $result->fetch_object()) {
        $cod = $obj->codigo;
        echo"
        <div class='col-md-3 '>
        <div class='card' style='width:260px; border-radius:20px;margin-top:10px; background-color:lightgray;'>
                  <div class='card-body'> 
                  <a style='font-size:15px;' href='Caderno.php?cd=".$obj->codigo."'>"."<h5>Caderno de " .$obj->nome. " - Professor(a): " .$obj->nm_usuario."</h5></a>
                   </div>
            </div>
            </div>"; }}
?>


</center>
</body>
<style type="text/css">
  a{
    font-size: 10px;
    color: black;
  }
</style>
</html>


