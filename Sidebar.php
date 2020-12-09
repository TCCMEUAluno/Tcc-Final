<?php
include('A.php');
session_start();
if (isset($_SESSION['Usuario'])) {
  $query = "SELECT * FROM tb_usuario WHERE codigo = '".$_SESSION['Usuario']."'";
  if ($result = $mysqli->query($query)) {
    while ($obj = $result->fetch_object()) {
        $Nome = $obj->nome;
        $Tipo = $obj->tipo;
        $codigo = $obj->codigo;
  }
  }
}
?>
<script type="text/javascript">
function openNav() {
  document.getElementById("mySidenav").style.width = "160px";
  document.getElementById("main").style.marginLeft = "40px";
  document.getElementById("barras").style.color = "#111";
  document.getElementById("barras").style.cursor = "default";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
  document.getElementById("barras").style.color = "white";
   document.getElementById("barras").style.cursor = "pointer";
}
</script>
<div id="hover" style="background-color: #A7EFCC; height: 80px; width: 100%;">
              

     <div id="main" style="display: block; position:absolute;">

     <span id="barras" style="font-size:30px; cursor:pointer; color:white;" onclick="openNav()">&#9776; </span>
     <?php
              if (isset($_SESSION['Usuario'])) {

                echo "<h4 style='display: inline-block;margin-left: 30px;font-size:20px;'>Bem-Vindo(a) ".$Nome."</h4>";
                echo "<a style='margin-left: 30px;width: 50px; height: 50px; position: absolute;display: inline-block;padding: 10px;font-size:20px;' href='Sair.php'>Sair</a>";
              }
              ?>
     </div>
     <form method="POST" action="pesqdeusuarios.php" style="display: inline-block; position:absolute; margin-left: 1090px;padding: 20px;">
                    <input type="text" name="pesq" style="width: 150px; height:20px; border-radius: 20px; font-size: 10px;" placeholder="Busque por usuarios!">
                    <button type="submit" class="btn btn-success" style="background-color: #A7EFCC; border-color: #A7EFCC;"><img style="width: 25px;" src="Imagens/lupa.png"></button>
     </form>

     

       <div id="mySidenav" class="sidenav" style="background-color: #FF914D; border-radius: 10px;">
          <span style="font-size:50px;cursor:pointer;color:white;" href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</span>
              <a href="Index.php" id="hover" style='background-color: #FF914D; text-align: center;'><img style="height: 90px; width: 90px;" src="Imagens/livro.png"></a>
              
                 <?php 
                if (isset($_SESSION['Usuario'])) {
                  echo "<center>
                    
                   <form method='POST' action='BuscaRapida.php'>
                    <h2 style='font-size:15px;'>Busca Rápida</h2>
                    <input type='text' name='BuscaR' style='width: 150px; border-radius: 20px; ' placeholder='Busque por conteudo!'>
                    <br>
                    <br>
                    <button type='submit' class='btn btn-success'>Pesquisar</button>
                  <hr>
                  </form>
              </center>";
                   if (isset($Tipo)) {
                      if ($Tipo == 1) {
                          echo "<a id='hover' href='perfil2.php?cod=".$_SESSION['Usuario']."' style='background-color: #FF914D; text-align: center; font-size:20px;'>Meu Canal</a>";
                          echo "<a id='hover' href='materias.php' style='background-color: #FF914D; text-align: center; font-size:20px;'>Matérias</a>";
                          $result= "SELECT * FROM tb_usuario WHERE codigo = '".$_SESSION['Usuario']."'";
                              if ($res = $mysqli->query($result)) {
                              while ($obj = $res->fetch_object()) {
                              echo "<a id='hover' href='formconteudo.php' style='background-color: #FF914D; text-align: center; font-size:20px;'><img src='Imagens/+.png' style='width: 40px; height: 40px;'></a>";}}
                          echo "<a id='hover' href='Feedback.php'  style='background-color: #FF914D; text-align: center; font-size:20px;'>Feedback</a>";
                          echo "<a id='hover' href='cadernoo.php'  style='background-color: #FF914D; text-align: center; font-size:20px;'>Caderno</a>";
                          echo "<a id='hover' href='meusconteudos.php'  style='background-color: #FF914D; text-align: center; font-size:20px;'>Meus conteúdos</a>";     

                      }
                      elseif ($Tipo == 2){
                          echo "<a id='hover' href='perfil2.php?cod=".$_SESSION['Usuario']."' style='background-color: #FF914D; text-align: center; font-size:20px;'>Meu Canal</a>";
                          echo "<a id='hover' href='materias.php' style='background-color: #FF914D; text-align: center; font-size:20px;'>Matérias</a>"; 
                          echo "<a id='hover' href='formmaterias.php' style='background-color: #FF914D; text-align: center; font-size:20px;'>Criar nova matéria</a>"; 
                           echo "<a id='hover' href='adm.php' style='background-color: #FF914D; text-align: center; font-size:20px;'>Administrar</a>"; 
                           echo "<a id='hover' href='upload.php'  style='background-color: #FF914D; text-align: center; font-size:20px;'>Editar imagens</a>
                           ";
                           echo "<a id='hover' href='cadernoo.php'  style='background-color: #FF914D; text-align: center; font-size:20px;'>Caderno</a>";
                      }
                      else{
                          echo "<a id='hover' href='perfil2.php?cod=".$_SESSION['Usuario']."' style='background-color: #FF914D; text-align: center; font-size:20px;'>Meu Canal</a>";
                          echo "<a id='hover' href='materias.php' style='background-color: #FF914D; text-align: center; font-size:20px;'>Matérias</a>";
                          echo "<a id='hover' href='cadernoo.php'  style='background-color: #FF914D; text-align: center; font-size:20px;'>Caderno</a>";
                          echo "<a id='hover' href='Feedback.php'  style='background-color: #FF914D; text-align: center; font-size:20px;'>Feedback</a>";                    }

                   }

                     echo "<a id='hover' href='ChatInicio.php'  style='background-color: #FF914D; text-align: center; font-size:20px;'>Chat</a>";
              }
              else{
                echo "<a id='hover' style='background-color: #FF914D; text-align: center; font-size:20px;' href='login.php'>Login</a>";
              }
            ?> 
           
          <a id="hover" href="SobreNos.php"  style="background-color: #FF914D; text-align: center; font-size:20px;">Sobre</a>
       </div> 
      
     </div>