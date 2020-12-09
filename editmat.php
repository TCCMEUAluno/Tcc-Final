<?php
include('A.php');
include('Sidebar.php');
if (isset($_SESSION['Usuario'])) {

    $codigo = $_GET['cd'];

    if(!empty($_GET['cd'])){
       $mat = "SELECT * FROM tb_materia WHERE codigo = $codigo";
      $resultado = mysqli_query($mysqli, $mat);
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <title>Editar matéria</title>
      <meta http-equiv="refresh" content="20"> 
    <meta charset="utf-8">
    </head>
    <body >
      <br>
<button class="btn btn-success" style='background-color:#A7EFCC; color:black; border-radius:30px;width:75px;height: 34px;'><?php echo"<a style='font-size: 15px;' href='adm.php'>Voltar</a>"; ?></button>
      <center>
        <br>
        <br>
        <br>
        <?php
            if ($res = $mysqli->query($mat)) {
              while($obj = $res->fetch_object()) {
        ?>
                    <h1><em id="Tit">Editar matéria</em></h1>
                    <div id="color2">
                    <form method="POST"  style="background-color: lightgrey; width: 600px; border-radius: 20px;" >
                    <br>
                    <br>
                    <br>
                    <b id="col" style="font-size: 20px;">Alterar matéria:</b>
                    <br>
                    <input type="text" name="nome" value="<?php echo $obj->nome;?>" required style="width: 450px; height: 30px; border-radius: 15px;">
                    <br>
                    <br>
                    <br>
                   <div class="row">
                    <button class="btn btn-info" name="button" style="width: 250px; margin-left: 40px; height: 30px; border-radius: 15px;"><em>Alterar</em></button>
                  </div>
                    <br>
                    <br>
                  </form>
                </div>
        <?php  }}else{echo $mysqli->error;}?>
                  <br>
                  <br>
                </center>
                <?php 
                if (isset($_POST['button'])) {
                    $result_mat = "UPDATE tb_materia SET nome = '".$_POST['nome']."' WHERE codigo = '$codigo'";
                    if ($query = $mysqli -> query($result_mat)) {
                      echo "<script> alert ('Matéria editada com sucesso!')</script>";
                    }else{echo $mysqli->error;}
                }

}else{header('location:Login.php');}                
?>
    </body>
    </html>

