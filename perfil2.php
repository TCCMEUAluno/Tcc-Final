<?php
include('A.php');
include('Sidebar.php');
if (isset($_SESSION['Usuario'])) {
?>
<!DOCTYPE html>
<html>
<head>
  <title>Perfil</title>
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

$cod = $_GET['cod'];

if(!empty($_GET['cod'])){
  $result= "SELECT * FROM tb_usuario WHERE codigo = $cod";

  $resultado = mysqli_query($mysqli, $result);
}

if ($res = $mysqli->query($result)) {
 while ($obj = $res->fetch_object()) {
echo "
<div class='container'>
  <div class='row'>
    <div class='col' style='border:2px solid black; width:auto; max-width: 540px; border-radius: 20px;'>
            <center><h2 style='color: black;'>$obj->nome</h2> </center>
    </div>
    <div class='col' style=' margin-left: 10px;'>
            <a href='editar.php?cod=".$obj->codigo."' style='font-size: 15px; color:black;'> Editar</a> / 
            <a href='deletar.php?codigo=".$obj->codigo."' style='font-size: 15px; color:black;'> Excluir conta</a>
    </div>
  </div>

    <div class='w-100'></div>

  <div class='row'>
    <div class='col' style='margin-top: 30px; '>
          <center><img src='$obj->foto' style='width:250px;height:250px; border-radius:30px;border:2px solid black;'><br><a href='editft.php?cod=".$obj->codigo."' style='font-size: 15px; color:black;'> Editar foto</a></center>
    </div>
    <div class='col' style='height: 250px; margin-left: 10px; margin-top: 30px;border:2px solid black; border-radius:40px; background-color:white;'>
      <div class='card-header py-3'>
        <h4 class='m-0 font-weight-bold'>&ensp;Informações</h4>
      </div>
    <br>
            <h4>&ensp;Descrição: $obj->descricao </h4>
            <h4>&ensp;Aniversário: $obj->dt_nascimento</h4>";

        if (isset($obj->tipo)) {
          if ($obj->tipo == 1) {
          echo "
            <h4>&ensp;Conclusão dos estudos: $obj->dt_conclusao</h4>
            <h4>&ensp;Referência de instituição: $obj->ref_instituicao</h4> 
            <h4>&ensp;Tipo de usuário: Professor</h4>
            <h4>&ensp;<a href='editdt.php?cd=".$_SESSION['Usuario']."'>Editar detalhes</a></h4>";

         } 
         elseif ($obj->tipo == 0) {
            echo"<h4>&ensp;Tipo de usuário: Aluno</h4>";
         }
         else{
          echo "
          <h4>&ensp;Conclusão dos estudos: $obj->dt_conclusao</h4>
          <h4>&ensp;Referência de instituição: $obj->ref_instituicao</h4> 
          <h4>&ensp;Tipo de usuário: Administrador</h4>
          <h4>&ensp;<a href='editdt.php?cd=".$_SESSION['Usuario']."'>Editar detalhes</a></h4>";
         }
       }

    echo "
    </div>
  </div>
  <br>";
  if (isset($obj->tipo)) {
          if ($obj->tipo == 1) {
            echo "<br>";
         } 
         elseif ($obj->tipo == 0) {
            echo "<br>";}
         else{ echo "<br>";
         } 
       }

echo "</div>";}}
}else{
  header('location:Login.php');
}
?>

<br>
<br>

</body>
</html>
