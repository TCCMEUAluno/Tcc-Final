<?php
include('A.php');
include('Sidebar.php');
if (isset($_SESSION['Usuario'])) {

$cd = $_GET['cd'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Video</title>
	<meta charset="utf-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head> 
<body>

<br><button class="btn btn-success" style='background-color:#A7EFCC; color:black; border-radius:30px;width:75px;height: 34px;'><?php echo"<a style='font-size: 15px;' href='materias.php'>Voltar</a>"; ?></button>
<center>
<div>
<?php 
if(!empty($_GET['cd'])){
  $fetchVideos = mysqli_query($mysqli, "SELECT anexo FROM tb_anexo where Tipo = '1' AND id_conteudo = $cd");
     while($row = mysqli_fetch_assoc($fetchVideos)){
       $location = $row['anexo'];
       echo "<video src='".$location."' controls width='720px' height='520px' >";
     }
}?>
</div>
    


<?php
echo"</center>";

if(!empty($_GET['cd'])){
  $result= "SELECT * FROM tb_conteudo WHERE codigo = $cd";

  $resultado = mysqli_query($mysqli, $result);
}
if ($res = $mysqli->query($result)) {
   while ($obj = $res->fetch_object()) {
      $codigo = $obj->codigo;
      $nome = $obj->nome;
      $descricao = $obj->descricao;
      $data = $obj->dt_publicacao;
      $usuario = $obj->nm_usuario;
    }
}


  $result= "SELECT * FROM anotacao";
  if ($res = $mysqli->query($result)) {
     while ($obj = $res->fetch_object()) {
        $cod = $obj->id_conteudo;
    }
  }
if ($codigo != $cod) {
  echo "
    <center>
      <div class='card shadow mb-4' style='box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25); background-color: #fff;border: 1px solid #e3e6f0; border-radius: 20px; width: 730px;' >
              <div class='card-header py-3' style='padding: 10px 10px; background-color: #9F7FDF; border-bottom: 1px solid #e3e6f0; border-radius: calc(20px - 1px) calc(20px - 1px) 0 0; '>
                <h3 class='m-0 font-weight-bold' style='display: inline; font-size: 15px; text-align: right;'>Descrição:</h3>
                    <div class='btn-group dropright' style='margin-left: 500px; '>";
                         echo" <button class='btn btn-secondary dropdown-toggle' id='but' style='background-color:#9F7FDF; border-radius: 20px; border: 1px solid #e3e6f0;'> Anotações </button>
                            <div class='dropdown-menu' id='drop'>";
                            ?>

                                      <form method="POST" style="width: 340px; height: 240px;"><center>
                                        <textarea name="notas" id="editor" cols="80" rows="100" ></textarea>
                                        <input type="submit" name="Enviar">
                                      </center></form>
                            <?php
                                  if(isset($_POST['Enviar'])){
                                      $caderno = "insert into anotacao value (null,'".$_POST['notas']."','".$_SESSION['Usuario']."', '".$_GET['cd']."')";
                                      if ($query = $mysqli -> query($caderno)) {
                                         echo "<script> alert('Anotação gravada com sucesso!');</script>";
                                      }else{ echo "<script> alert('Erro!');</script>";}
                                  }
              echo "</div>
                    </div>
              </div> 
              <div class='card-body' style=' flex: 1 1 auto;padding: 1.25rem;overflow:scroll; height:200px; width:720px; overflow-wrap: break-word;overflow-x: hidden; overflow:auto;'>
                  <h4 style='text-align: justify;'>Conteúdo: $nome</h4>
                  <h4 style='text-align: justify;'>Descrição: $descricao</h4>
                  <h4 style='text-align: justify;'>Data de publicação: $data</h4>
                  <h4 style='text-align: justify;'>Nome do professor que publicou: $usuario</h4>";

              $tag = "SELECT * FROM tb_tag WHERE id_conteudo = $cd";
                  if ($result = $mysqli->query($tag)) {
                     while ($obj = $result->fetch_object()) {
                        echo"<h4 style='text-align: justify;'>TAG: $obj->nome</h4>";}}
             echo "<div>";

          if(!empty($_GET['cd'])){
               $fetch = mysqli_query($mysqli, "SELECT anexo FROM tb_anexo where Tipo = '2' AND id_conteudo = $cd");
               while($row = mysqli_fetch_assoc($fetch)){
                    $loc = $row['anexo'];
                  echo "
                  &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<button id='myBtn' style='margin-left:-590px;'> Arquivo para estudo</button>
                  <div id='myModal' class='modal'>
                    <div class='modal-content'>
                      <span class='close'>&times;</span>
                     <iframe src='".$loc."' controls width='850px' height='400px'></iframe>
                    </div>
                  </div>";
               }
          }
}else{
  echo "
    <center>
      <div class='card shadow mb-4' style='box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25); background-color: #fff;border: 1px solid #e3e6f0; border-radius: 20px; width: 730px;' >
              <div class='card-header py-3' style='padding: 10px 10px; background-color: #9F7FDF; border-bottom: 1px solid #e3e6f0; border-radius: calc(20px - 1px) calc(20px - 1px) 0 0; '>
                <h3 class='m-0 font-weight-bold' style='display: inline; font-size: 15px; text-align: right;'>Descrição:</h3>
                    <div class='btn-group dropright' style='margin-left: 500px; '>";         
              echo "</div>
              </div> 
              <div class='card-body' style=' flex: 1 1 auto;padding: 1.25rem;overflow:scroll; height:200px; width:720px; overflow-wrap: break-word;overflow-x: hidden; overflow:auto;'>
                  <h4 style='text-align: justify;'>Conteúdo: $nome</h4>
                  <h4 style='text-align: justify;'>Descrição: $descricao</h4>
                  <h4 style='text-align: justify;'>Data de publicação: $data</h4>
                  <h4 style='text-align: justify;'>Nome do professor que publicou: $usuario</h4>";

              $tag = "SELECT * FROM tb_tag WHERE id_conteudo = $cd";
                  if ($result = $mysqli->query($tag)) {
                     while ($obj = $result->fetch_object()) {
                        echo"<h4 style='text-align: justify;'>TAG: $obj->nome</h4>";}}
             echo "<div>";

          if(!empty($_GET['cd'])){
               $fetch = mysqli_query($mysqli, "SELECT anexo FROM tb_anexo where Tipo = '2' AND id_conteudo = $cd");
               while($row = mysqli_fetch_assoc($fetch)){
                    $loc = $row['anexo'];
                  echo "
                  <button id='myBtn' style='margin-left:-590px;'> Arquivo para estudo</button>
                  <div id='myModal' class='modal'>
                    <div class='modal-content'>
                      <span class='close'>&times;</span>
                     <iframe src='".$loc."' controls width='850px' height='400px'></iframe>
                    </div>
                  </div>";
               }
          }
}

}else{header('location:Login.php');}?>
 
</div>
              </div>
      </div>
</center>
	<br>
  <br>

  <script>
document.getElementById("but").onclick = function() {myFunction()};
function myFunction() {
  document.getElementById("drop").classList.toggle("show");
}

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<style>
 textarea {width: 323px; height: 215px; padding: 10px; border: 0; display: block; overflow: auto;border: 1px solid #999; margin-top: 10px; border-bottom-left-radius: 4px; border-bottom-right-radius: 4px;}

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 900px;
  height: 500px;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
 <br>
</body>
</html>