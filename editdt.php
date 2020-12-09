<?php
include('A.php');
include('Sidebar.php');
if (isset($_SESSION['Usuario'])) {
?>
<!DOCTYPE html>
<html>
<head>
  <title>Editar detalhes</title>
  <meta http-equiv="refresh" content="20"> 
</head>
<body>
  <br>
<button class="btn btn-success" style='background-color:#A7EFCC; color:black; border-radius:30px;width:75px;height: 34px;'><?php echo"<a style='font-size: 15px;' href='perfil2.php?cod=".$_SESSION['Usuario']."'>Voltar</a>"; ?></button>
  <center>
<?php
$cd = $_GET['cd'];
if (isset($_GET['cd'])) {
$query = "SELECT tipo, dt_conclusao, ref_instituicao, certificado FROM tb_usuario WHERE codigo = '".$_SESSION['Usuario']."'" ;
    if ($result = $mysqli->query($query)) {
      while ($obj = $result->fetch_object()) {
          $Tipo = $obj->tipo;
          $Conclusao = $obj->dt_conclusao;

                echo "
                <br>
                <div><center> <form method='POST' style='background-color: lightgrey; width: 600px; border-radius: 20px;' enctype='multipart/form-data'>
                     <br>
                     <b id='col' style='font-size: 20px;'>Certificado:</b>
                     <br>
                     <img src='$obj->certificado' style='width:200px;height:200px; border-radius:30px;border:2px solid black;'>
                     <br>
                     <input type='file' name='arquivo' value = '$obj->certificado'>
                     <br>
                     <br>
                     <b id='col' style='font-size: 20px;'>Referencia de instituição:</b>
                     <br>
                     <input type='text' name='ref' value='$obj->ref_instituicao' required placeholder='Ex.: pipipipopopo' style='width: 450px; height: 30px; border-radius: 15px;'>
                     <br>
                     <br>
                     <b id='col' style='font-size: 20px;'>Conclusão de estudo:</b>
                     <br>
                     <input type='date' name='data' value='$obj->dt_conclusao' required style='width: 450px; height: 30px; border-radius: 15px;'>
                     <br>
                     <br>
                     <button class='btn btn-info' name='botao' style='width: 300px; height: 30px; border-radius: 15px;'><em>Enviar</em></button>
                     <br>
                     <br>
               </form></center></div> 
               <br>"; 

        if (isset($_POST['botao'])) {

            $dir = "upload/certificados";
            $file = $_FILES["arquivo"];
            $arquivo = "$dir/".$file["name"];

                if(move_uploaded_file($file["tmp_name"], $arquivo )){

                  $query = "UPDATE tb_usuario SET dt_conclusao = '".$_POST['data']."', ref_instituicao = '".$_POST['ref']."', certificado = '".$arquivo."' WHERE codigo = '".$_SESSION['Usuario']."'";

                  if ($query = $mysqli -> query($query)) {
                    echo "<script> alert('Detalhes editados com sucesso!');</script>";
                  }
                }
        } 
      }
    }
  }

?>
</center>
<br>
</body>
</html>
<?php
}else{header('location:Login.php');}
?>
