<?php
include('A.php');
include('Sidebar.php');
if (isset($_SESSION['Usuario'])) {

$u = "SELECT  * FROM tb_usuario";
if ($result = $mysqli->query($u)) {
    while ($obj = $result->fetch_object()) {
      $Tipo = $obj->tipo;
    }
      if ($Tipo ='1') {
?>
<!DOCTYPE html>
<html>
<head>
  <title>Cadastrar anexos</title>
</head>
<body>
  <button class="btn btn-success" style='background-color:#A7EFCC; color:black; border-radius:30px;width:75px;height: 34px;'><?php echo"<a style='font-size: 15px;' href='formconteudo.php'>Voltar</a>"; ?></button>
  <center>

     <?php  
        if (isset($_GET['cd'])) {
              echo "<br><br><br><br><fieldset style='background-color:#FF914D; width:600px; border-radius:40px;'>";
              $cd = $_GET['cd'];
              echo "<br><form method='post' action='' enctype='multipart/form-data'>
                    <b id='col' style='font-size: 25px;'>Video:</b>
                    <br>
                    <input type='file' name='arquivo' required post_max_size>";
            if (isset($_FILES['arquivo'])) {
              $dir = "upload/videos";
              $file = $_FILES["arquivo"];
              $arquivo = "$dir/".$file["name"];

                if(move_uploaded_file($file["tmp_name"], $arquivo )){
                    $sql = "INSERT INTO tb_anexo values ('null','".$arquivo."','$cd','1')";
                        if ($mysqli->query($sql)) {
                        }else{echo $mysqli->error;}   
                }else{ echo "<script> alert('Erro no envio do arquivo!');</script>";}
            }
              echo "<br><br>
                    <b id='col' style='font-size: 25px;'>Arquivo em PDF:</b>
                    <br>
                    <input type='file' name='pdf' required>
                    <br>";
            if (isset($_FILES['pdf'])) {
                $pasta = "upload/pdf";
                $file = $_FILES["pdf"];
                $pdf = "$pasta/".$file["name"];

                    if(move_uploaded_file($file["tmp_name"], $pdf )){
                        $sql = "INSERT INTO tb_anexo values ('null','".$pdf."','$cd','2')";
                          if ($mysqli->query($sql)) {
                              }else{echo $mysqli->error;}
                    }else{echo "<script> alert('Erro no envio do arquivo!');</script>";}
            }
              echo "<br><br>
                    <b id='col' style='font-size: 25px;'>Nova TAG:</b>
                    <br>
                    <input type='text' name='tag' required style='width: 400px; height: 30px; border-radius: 15px;'>
                    <br><br>";
            if (!empty($_POST['tag'])) {
                  $tag= "INSERT INTO tb_tag values(null,'".$_POST['tag']."',$cd)";
                    if ($query = $mysqli -> query($tag)) {
                  } 
                }
            echo "<br><button class='btn btn-info' style='width: 300px; height: 30px; border-radius: 15px;'><em>Cadastrar</em></button></form><br></fieldset>";
             echo "<script> alert('Conteúdo gravado com sucesso!');</script>";
        }
 ?>
    

</center>
</body>
</html>
<?php
}if ($Tipo != '1') {
        header('location:index.php');
      }
}
}else{header('location:Login.php');}
  ?>