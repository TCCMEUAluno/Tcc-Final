<?php
include('A.php');
include('Sidebar.php');

if (isset($_SESSION['Usuario'])) {
$query = "SELECT * FROM usuario WHERE Codigo = '".$_SESSION['Usuario']."'" ;
if ($result = $mysqli->query($query)) {
  while ($obj = $result->fetch_object()) {
      $Nome = $obj->Nome;
      $Foto = $obj->FotoPerfil;
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<style type="text/css">

</style>
  <title>Sobre</title>
  <meta charset="utf-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
<body >

<div>
    <center>
       <div class="logo">
         <img style="max-width: 260px;" src="Imagens/logo.png">
       </div>
       <br>
       <div class="main" style="text-align: center; width: 700px;">
         <h1 style="color: black;">Sobre Nós</h1>
         <p style="color: black; font-size: 22px;">
           Somos um projeto de TCC iniciado pelos alunos do 3º ano da turma de Informática para Internet, matriculados na Escola Técnica Estadual de Itanhaém. Nosso site consiste em uma plataforma online de estudos que visa a conexão entre alunos e professores, compartilhamento de materiais de estudos e uma oportunidade para os usuários conhecerem mais sobre o e-learning.
         </p>
         <a href="Contato.php" style="text-align: center;">Clique para conhecer a equipe!</a>
      </div>
        </center>
</div>

</body>
</html>