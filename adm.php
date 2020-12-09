<?php
include('A.php');
include('Sidebar.php');
if (isset($_SESSION['Usuario'])) {

$u = "SELECT  * FROM tb_usuario";
if ($result = $mysqli->query($u)) {
    while ($obj = $result->fetch_object()) {
      $Tipo = $obj->tipo;
      if ($Tipo ='2') {
        
        $usuario = "SELECT email, nome FROM tb_usuario";

$uss = "SELECT Mensagem, codigo, cod, assunto FROM feedback";

$acess = "SELECT DATE_FORMAT (`dt_acesso`,'%d/%m/%Y') AS data, Sum(id_usuario) as acessos FROM acesso GROUP BY data";

$usu = "SELECT * FROM tb_usuario where Tipo = 1 or Tipo = 2";

$usa = "SELECT * FROM tb_usuario where Tipo = 0";

$mat = "SELECT * FROM tb_materia";

$cont = "SELECT * FROM tb_conteudo";
$tag = "SELECT * FROM tb_tag";

?>
<!DOCTYPE html>
<html>
<head>
  <title>Página do Administrador</title>
  <meta charset="utf-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="refresh" content="40"> 
</head>
<body>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<div class="row" >
  
      <div class="col-lg-5" style="margin-left: 50px;">
           <div class="card shadow mb-4" style="box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25); position: relative;display: flex;flex-direction: column;background-color: #fff;border: 1px solid #e3e6f0; border-radius: 20px; margin-left: 35px; margin-top: 30px; margin-right: -70px; ">
                  <div class="card-header py-3" style="padding: 10px 10px; background-color: #9F7FDF; border-bottom: 1px solid #e3e6f0; border-radius: calc(20px - 1px) calc(20px - 1px) 0 0; ">
                    <h6 class="m-0 font-weight-bold" style="display: inline; font-size: 15px;">Acessos:</h6>
                  </div>
                  <div class="card-body" style="flex: 1 1 auto;padding: 1.25rem;overflow:scroll;height:180px; width:560px; overflow-x: hidden; overflow:auto;">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">   
                                  <thead>
                                    <tr role="row">
                                      <th style="width: 30px;">Dia</th>
                                      <th  style="width: 30px;">Acessos</th>
                                    </tr>
                                  </thead>
                                   <?php
                                    if ($result = $mysqli->query($acess)) {
                                       while ($obj = $result->fetch_object()) {
                                              echo" 
                                                <tr role='row' class='even'>
                                                    <td>".$obj->data."</td>
                                                    <td>".$obj->acessos."</td>
                                                </tr> ";}} else{echo $mysqli->error;} ?>
                         </table> 
                  </div>
            </div>
      </div>

      <div class="col-lg-5" style="margin-left: 25px;" >
           <div class="card shadow mb-4" style="box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25); position: relative;display: flex;flex-direction: column;background-color: #fff;border: 1px solid #e3e6f0; border-radius: 20px; margin-left: 35px; margin-top: 30px; margin-right: -70px; ">
                  <div class="card-header py-3" style="padding: 10px 10px; background-color: #9F7FDF; border-bottom: 1px solid #e3e6f0; border-radius: calc(20px - 1px) calc(20px - 1px) 0 0; ">
                    <h6 class="m-0 font-weight-bold" style="display: inline; font-size: 15px;">Cadastros:</h6>
                  </div>
                  <div class="card-body" style="flex: 1 1 auto;padding: 1.25rem;overflow:scroll;height:180px; width:560px; overflow-x: hidden; overflow:auto;">
                   <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">   
                                  <thead>
                                    <tr role="row">
                                      <th style="width: 30px;">Nome</th>
                                      <th  style="width: 30px;">Cadastros</th>
                                    </tr>
                                  </thead>
                                   <?php
                                    if ($result = $mysqli->query($usuario)) {
                                       while ($obj = $result->fetch_object()) {
                                              echo" 
                                                <tr role='row' class='even'>
                                                    <td>".$obj->nome."</td>
                                                    <td>".$obj->email."</td>
                                                </tr> ";}} else{echo $mysqli->error;}?>
                   </table> 
                  </div>
            </div>
      </div>

      <div class="col-lg-5" style="margin-left: 50px;" >
          <div class="card shadow mb-4" style="box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25); position: relative; display: flex; flex-direction: column;background-color: #fff; border: 1px solid #e3e6f0; border-radius: 20px; margin-left: 35px; margin-top: 30px; margin-right: -70px; ">
                  <div class="card-header py-3" style="padding: 10px 10px; background-color: #9F7FDF; border-bottom: 1px solid #e3e6f0; border-radius: calc(20px - 1px) calc(20px - 1px) 0 0; ">
                    <h6 class="m-0 font-weight-bold" style="display: inline; font-size: 15px;">Professores: </h6>
                  </div>
                  <div class="card-body" style="flex: 1 1 auto; padding: 1.25rem; overflow:scroll; height:180px; width:560px; overflow-x: hidden; overflow:auto;">
                           <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info">   
                               <thead>
                                 <tr role="row">
                                   <th style="width: 10px;">Id</th>
                                   <th style="width: 70px;">Nome</th>
                                   <th style="width: 70px;">Email</th>
                                   <th style="width: 10px;">Excluir</th>
                                   <th style="width: 10px;">Status</th>
                                   <th style="width: 40px;">Bloquear</th>
                                 </tr>
                               </thead> 

                                 <?php

                                 if ($result = $mysqli->query($usu)) {
                                    while ($obj = $result->fetch_object()) {
                                           echo" 
                                               <tr role='row'>
                                                  <td>".$obj->codigo."</td>
                                                  <td>".$obj->nome."</td>
                                                  <td>".$obj->email."</td>
                                                  <td><a href='del.php?codigo=".$obj->codigo."'>Apagar</a></td>
                                                  <td>".$obj->status."</td>
                                                  <td><a href='bloq.php?codigo=".$obj->codigo."'>Desativar</a> | <a href='desbloq.php?cod=".$obj->codigo."'>Ativar</a></td>
                                              </tr>";}} else{echo $mysqli->error;}?>

                           </table>
                  </div>
          </div>
      </div>

      <div class="col-lg-5" style="margin-left: 25px;" >
           <div class="card shadow mb-4" style="box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25); position: relative; display: flex; flex-direction: column;background-color: #fff; border: 1px solid #e3e6f0; border-radius: 20px; margin-left: 35px; margin-top: 30px; margin-right: -70px; ">
                  <div class="card-header py-3" style="padding: 10px 10px; background-color: #9F7FDF; border-bottom: 1px solid #e3e6f0; border-radius: calc(20px - 1px) calc(20px - 1px) 0 0; ">
                    <h6 class="m-0 font-weight-bold" style="display: inline; font-size: 15px;">Alunos:</h6>
                  </div>
                  <div class="card-body" style="flex: 1 1 auto; padding: 1.25rem; overflow:scroll; height:180px; width:560px; overflow-x: hidden; overflow:auto;">
                           <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info">   
                                  <thead>
                                    <tr role="row">
                                      <th style="width: 70px;">Id</th>
                                      <th style="width: 70px;">Nome</th>
                                      <th style="width: 70px;">Email</th>
                                      <th style="width: 10px;">Excluir</th>
                                      <th style="width: 10px;">Status</th>
                                      <th style="width: 40px;">Bloquear</th>
                                    </tr>
                                  </thead>                                    
                                    <?php
                                    if ($result = $mysqli->query($usa)) {
                                       while ($obj = $result->fetch_object()) {
                                              echo" 
                                                  <tr role='row'>
                                                     <td>".$obj->codigo."</td>
                                                     <td>".$obj->nome."</td>
                                                     <td>".$obj->email."</td>
                                                     <td><a href='del.php?codigo=".$obj->codigo."'>Apagar</a></td>
                                                     <td>".$obj->status."</td>
                                                  <td><a href='bloq.php?codigo=".$obj->codigo."'>Desativar</a> | <a href='desbloq.php?cod=".$obj->codigo."'>Ativar</a></td>
                                                 </tr>";}} else{echo $mysqli->error;}?>
                           </table>
                  </div>
          </div>
      </div>
</div>
<div class="row" >
      <div class="col-lg-5" style="margin-left: 50px;">
          <div class="card shadow mb-4" style="box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25); position: relative;display: flex;flex-direction: column;background-color: #fff;border: 1px solid #e3e6f0; border-radius: 20px; margin-left: 35px; margin-top: 30px; margin-right: -70px; ">
                <div class="card-header py-3" style="padding: 10px 10px; background-color: #9F7FDF; border-bottom: 1px solid #e3e6f0; border-radius: calc(20px - 1px) calc(20px - 1px) 0 0; ">
                   <h6 class="m-0 font-weight-bold" style="font-size: 15px;"> Feedback:</h6>
                </div>
                <div class="card-body" style="flex: 1 1 auto;padding: 1.25rem; overflow:scroll;height:200px; width:560px; overflow-x: hidden; overflow:auto;">
                      <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">   
                                  <thead>
                                    <tr role="row">
                                      <th style="width: 70px;">Usuário</th>
                                      <th style="width: 60px;">Código</th>
                                      <th style="width: 20px;">Mensagem</th>
                                      <th style="width: 20px;">Assunto</th>
                                    </tr>
                                  </thead>
                                  <?php
                                    if ($result = $mysqli->query($uss)) {
                                       while ($obj = $result->fetch_object()) {
                                              echo" 
                                                     <tr role='row'>
                                                          <td>".$obj->cod."</td>
                                                          <td>".$obj->codigo."</td>
                                                          <td>".$obj->Mensagem."</td>
                                                          <td>".$obj->assunto."</td>
                                                      </tr>";}
                                                    } else{echo $mysqli->error;}?>
                      </table>
                </div>
          </div>
      </div>
      <div class="col-lg-5" style="margin-left: 25px;">
          <div class="card shadow mb-4" style="box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25); position: relative;display: flex;flex-direction: column;background-color: #fff;border: 1px solid #e3e6f0; border-radius: 20px; margin-left: 35px; margin-top: 30px; margin-right: -70px; ">
                <div class="card-header py-3" style="padding: 10px 10px; background-color: #9F7FDF; border-bottom: 1px solid #e3e6f0; border-radius: calc(20px - 1px) calc(20px - 1px) 0 0; ">
                   <h6 class="m-0 font-weight-bold" style="font-size: 15px;"> Matérias:</h6>
                </div>
                <div class="card-body" style="flex: 1 1 auto;padding: 1.25rem; overflow:scroll;height:200px; width:560px; overflow-x: hidden; overflow:auto;">
                      <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">   
                                  <thead>
                                    <tr role="row">
                                      <th style="width: 60px;">Código</th>
                                      <th style="width: 60px;">Nome</th>
                                      <th style="width: 20px;">Editar</th>
                                      <th style="width: 10px;">Excluir</th>
                                    </tr>
                                  </thead>
                                  <?php
                                    if ($result = $mysqli->query($mat)) {
                                       while ($obj = $result->fetch_object()) {
                                              echo" 
                                                     <tr role='row'>
                                                          <td>".$obj->codigo."</td>
                                                          <td>".$obj->nome."</td>
                                                          <td><a href='editmat.php?cd=".$obj->codigo."'>Editar</a></td>
                                                          <td><a href='delmat.php?cd=".$obj->codigo."'>Apagar</a></td>
                                                      </tr>";}
                                                    } else{echo $mysqli->error;}?>
                      </table>
                </div>
          </div>
      </div>
</div>
<div class="row" >
      <div class="col-lg-5" style="margin-left: 50px;">
          <div class="card shadow mb-4" style="box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25); position: relative;display: flex;flex-direction: column;background-color: #fff;border: 1px solid #e3e6f0; border-radius: 20px; margin-left: 35px; margin-top: 30px; margin-right: -70px; ">
                <div class="card-header py-3" style="padding: 10px 10px; background-color: #9F7FDF; border-bottom: 1px solid #e3e6f0; border-radius: calc(20px - 1px) calc(20px - 1px) 0 0; ">
                   <h6 class="m-0 font-weight-bold" style="font-size: 15px;"> Tag:</h6>
                </div>
                <div class="card-body" style="flex: 1 1 auto;padding: 1.25rem; overflow:scroll;height:200px; width:560px; overflow-x: hidden; overflow:auto;">
                      <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">   
                                  <thead>
                                    <tr role="row">
                                      <th style="width: 60px;">Código</th>
                                      <th style="width: 20px;">Nome</th>
                                      <th style="width: 10px;">Excluir</th>
                                    </tr>
                                  </thead>
                                  <?php
                                    if ($result = $mysqli->query($tag)) {
                                       while ($obj = $result->fetch_object()) {
                                              echo" 
                                                     <tr role='row'>
                                                          <td>".$obj->codigo."</td>
                                                          <td>".$obj->nome."</td>
                                                          <td><a href='deltag.php?cod=".$obj->codigo."'>Apagar</a></td>
                                                      </tr>";}
                                                    } else{echo $mysqli->error;}?>
                      </table>
                </div>
          </div>
      </div>
      <div class="col-lg-5" style="margin-left: 25px;">
          <div class="card shadow mb-4" style="box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25); position: relative;display: flex;flex-direction: column;background-color: #fff;border: 1px solid #e3e6f0; border-radius: 20px; margin-left: 35px; margin-top: 30px; margin-right: -70px; ">
                <div class="card-header py-3" style="padding: 10px 10px; background-color: #9F7FDF; border-bottom: 1px solid #e3e6f0; border-radius: calc(20px - 1px) calc(20px - 1px) 0 0; ">
                   <h6 class="m-0 font-weight-bold" style="font-size: 15px;"> Conteúdos:</h6>
                </div>
                <div class="card-body" style="flex: 1 1 auto;padding: 1.25rem; overflow:scroll;height:200px; width:560px; overflow-x: hidden; overflow:auto;">
                      <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">   
                                  <thead>
                                    <tr role="row">
                                      <th style="width: 60px;">Código</th>
                                      <th style="width: 60px;">Nome</th>
                                      <th style="width: 10px;">Excluir</th>
                                    </tr>
                                  </thead>
                                  <?php
                                    if ($result = $mysqli->query($cont)) {
                                       while ($obj = $result->fetch_object()) {
                                              echo" 
                                                     <tr role='row'>
                                                          <td>".$obj->codigo."</td>
                                                          <td>".$obj->nome."</td>
                                                          <td><a href='delcon.php?cd=".$obj->codigo."'>Apagar</a></td>
                                                      </tr>";}
                                                    } else{echo $mysqli->error;}?>
                      </table>
                </div>
          </div>
      </div>
</div>
  <br>
</body>
</html>

<?php
      }if ($Tipo != '2') {
        header('location:index.php');
      }

    }
}
}else{
  header('location:Login.php');
}

