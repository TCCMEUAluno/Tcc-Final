<?php
include('A.php');
include('Sidebar.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title> Visitar Perfil</title>
  <meta charset="utf-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="CSS.css">
<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">

<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>  
<body>
<br>
<br>
<?php 

$codigo = $_GET['codigo'];

if(!empty($_GET['codigo'])){
  $result= "SELECT * FROM tb_usuario WHERE codigo = $codigo";

  $resultado = mysqli_query($mysqli, $result);
}

if ($res = $mysqli->query($result)) {
 while ($obj = $res->fetch_object()) {
echo "
<div class='container'>
 <div class='row'>
    <div class='col' style='border:2px solid black; width:auto; max-width: 560px; border-radius: 20px;'>
            <center><h2 style='color: black;'>$obj->nome</h2></center>
    </div>

    <div class='w-100'></div>

    <div class='col' style='margin-top: 30px; '>
          <center><img src='$obj->foto' style='width:250px;height:250px; border-radius:30px;border:2px solid black;'></center>
    </div>
    <div class='col' style='height: 250px; margin-left: 20px; margin-top: 30px;border:2px solid black; border-radius:40px; background-color:white;'>
      <div class='card-header py-3'>
        <h4 class='m-0 font-weight-bold'>Informações</h4>
      </div>
    <br>
            <h4>Descrição: $obj->descricao </h4>
            <h4>Aniversário: $obj->dt_nascimento</h4>";

            if (isset($obj->tipo)) {
          if ($obj->tipo == 1) {
          echo "
            <h4>Conclusão dos estudos: $obj->dt_conclusao</h4>
            <h4>Referência de instituição: $obj->ref_instituicao</h4> 
            <h4>Tipo de usuário: Professor</h4>";
         } 
         elseif ($obj->tipo == 0) {
            echo"<h4>Tipo de usuário: Aluno</h4>";
         }
         else{
          echo "
          <h4>Conclusão dos estudos: $obj->dt_conclusao</h4>
          <h4>Referência de instituição: $obj->ref_instituicao</h4> 
          <h4>Tipo de usuário: Administrador</h4>";
         }
       }

    echo "
    </div>
  </div>
  <br>";

echo "</div>";}}?>

<br>
<br>
</body>
</html>
