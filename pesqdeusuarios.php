<?php
include('A.php');
include('Sidebar.php');
$usuario = "SELECT codigo, nome, email, tipo, descricao, dt_nascimento, dt_conclusao, ref_instituicao, foto FROM tb_usuario";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Pesquisa de usuário</title>
  
<link rel="stylesheet" type="text/css" href="CSS.css">
<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">

<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>

<?php
if($_POST){
    $pesq = $_POST['pesq'];
    $pesquise = "SELECT * FROM tb_usuario WHERE nome LIKE '%$pesq%'";
    if ($result=$mysqli->query($pesquise)) {
    }
    while ($obj = $result->fetch_object()) {
            echo "
<form>
<div class='col-sm-2 ml-5' id='s'> 
    <div class='card text-center' style='width: 230px; height: 330px; border-radius: 40px;'>
      <div class='card-header' style='border-radius: calc(40px - 1px) calc(40px - 1px) 0 0;'>
        <ul class='nav nav-tabs' role='tablist'> 
            <li class='nav-item'><a class='nav-link active' data-toggle='tab' href='#a".$obj->codigo."' style=' border-radius: 20px;'>Usuário</a></li>
            <li class='nav-item'><a class='nav-link' data-toggle='tab' href='#p".$obj->codigo."' style='border-radius: 20px;'>Sobre:</a></li>
        </ul>
      </div>
      <div class='tab-content'>
          <div class='tab-pane container active' id='a".$obj->codigo."'>
            <br> 
            <h4>Nome: $obj->nome</h4>
            <img style='width:160px; height:155px; border-radius:90px;' src='$obj->foto' class='card-img-top' alt='...' style='height: 240px; width: 20rem'> <br>
            <h4>Email: $obj->email</h4>
            <Input type='hidden' value='.$obj->codigo.'>
            <a href='perfil.php?codigo=".$obj->codigo."'> Visitar </a>
          </div> <br>
          <div class='tab-pane container fade' id='p".$obj->codigo."'>
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
          echo "<h4>Tipo de usuário: Administrador</h4>";
         }
       }
         echo "
          </div> 
      </div>
    </div> 
</div>
</form>";
    }}?>

</body>
</html>
<style type="text/css">
  #s{
    padding-left: 80px;
    padding-top: -10px;
    padding-bottom: 20px;
    margin: 50px;
}
</style>

