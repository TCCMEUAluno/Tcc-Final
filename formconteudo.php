<?php
include('A.php');
include('Sidebar.php');
if (isset($_SESSION['Usuario'])) {

$u = "SELECT  * FROM tb_usuario";
if ($result = $mysqli->query($u)) {
    while ($obj = $result->fetch_object()) {
      $Tipo = $obj->tipo;
      if ($Tipo ='1') {
if (isset($_SESSION['Usuario'])) {
$query = "SELECT * FROM tb_usuario WHERE codigo = '".$_SESSION['Usuario']."'" ;
if ($result = $mysqli->query($query)) {
  while ($obj = $result->fetch_object()) {
      $nome = $obj->nome;
      $codigo = $obj->codigo;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Cadastrar conteúdo</title>
</head>
<body>
  <button class="btn btn-success" style='background-color:#A7EFCC; color:black; border-radius:30px;width:75px;height: 34px;'><?php echo"<a style='font-size: 15px;' href='index.php'>Voltar</a>"; ?></button>
  <center>

     <?php  
        echo "<br><br><fieldset style='background-color:#FF914D; width:600px; border-radius:40px;'>";
        echo "<form method='POST'>
        <br><br>
        <br><b id='col' style='font-size: 25px;'>Selecione uma matéria:</b>
        <select id='appearance-select'>";
               if (isset($_SESSION['Usuario'])) {
                    $codigo = $_SESSION['Usuario'];
                    $cont = "SELECT nome,codigo FROM tb_materia";
                    if ($result = $mysqli->query($cont)) {
                      while ($obj = $result->fetch_object()) {
                        $cod = $obj->codigo;
                            echo"<option value='$cod'><a style='font-size: 25px;' href='formconteudo.php?cod=".$obj->codigo."' >$obj->nome </a></option> ";
                      }
                    }
                }
        echo"</select>
        <br><br>
        <b id='col' style='font-size: 25px;'>Novo conteudo:</b>
        <br>
        <input type='text' name='nome' required style='width: 400px; height: 30px; border-radius: 15px;'>
        <br><br>
        <b id='col' style='font-size: 25px;'>Descrição:</b>
        <br>
        <input type='text' name='descricao' required style='width: 400px; height: 30px; border-radius: 15px;'>
        <br><br>
        <button class='btn btn-info' style='width: 300px; height: 30px; border-radius: 15px;'><em>Cadastrar</em></button>
        <br><br>
        </form>";

        if (!empty($_POST['nome'])) {
          $query_select = "SELECT nome FROM tb_conteudo WHERE nome = '".$_POST['nome']."'";
            if ($query = $mysqli -> query($query_select)) {
              while ($obj = $query->fetch_object()) {
                $nome = $obj->nome;
              }
            }
             if($nome == $_POST['nome']){
                  echo"<script> alert('Esse conteudo já existe');</script>";
                }
                else{
                      $conteudo= "INSERT INTO tb_conteudo value(null,'".$_POST['nome']."','".$_POST['descricao']."',(now()), $cod,'".$_SESSION['Usuario']."', '$nome')";
                      if ($query = $mysqli -> query($conteudo)) {
                            echo "<script> alert('Conteúdo gravado com sucesso!');</script>";
                          }else{echo $mysqli->error;}
                    }
        }
        if (isset($_POST['nome'])) {
              $c = "SELECT codigo FROM tb_conteudo where id_materia = $cod"; 
              if ($result = $mysqli->query($c)) { 
                    while ($obj = $result->fetch_object()) { 
                    $cd = $obj->codigo;
                    }
                  }
              $cont = "SELECT codigo FROM tb_conteudo where id_materia = $cod and codigo = $cd"; 
              if ($result = $mysqli->query($cont)) { 
                    while ($obj = $result->fetch_object()) { 
                      echo "<a style='font-size: 20px;' href='form.php?cd=".$obj->codigo."'>Cadastrar Anexos</a>";
                    }
                  }
            }
        echo "<br><br></fieldset>";
        echo "<br>";
}
}
}         ?>
    

</center>
</body>
</html>
<style type="text/css">
  #appearance-select{   -webkit-appearance: none;  
   appearance: none; 
   background: url(http://www.webcis.com.br/images/imagens-noticias/select/ico-seta-appearance.gif) no-repeat #eeeeee;  
    background-position: 170px center;  
     width: 200px; 
    height:25px; 
   border:1px solid #ddd;
   border-radius: 10px;
 }

</style>
<?php
}if ($Tipo != '1') {
        header('location:index.php');
      }

    }
}
}else{header('location:Login.php');}
  ?>