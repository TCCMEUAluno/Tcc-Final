<?php
include('A.php');
include('Sidebar.php');

if (isset($_SESSION['Usuario'])) {
$query = "SELECT tipo, dt_conclusao, ref_instituicao, certificado FROM tb_usuario WHERE codigo = '".$_SESSION['Usuario']."'" ;
if ($result = $mysqli->query($query)) {
  while ($obj = $result->fetch_object()) {
      $Tipo = $obj->tipo;
      $Conclusao = $obj->dt_conclusao;
      
        if ($Conclusao == null) {
          if ($Tipo == 1 || $Tipo == 2) {
            echo "
            <br>
            <div><center> <form method='POST' style='background-color: lightgrey; width: 600px; border-radius: 20px;' enctype='multipart/form-data'>
                 <br>
                 <b id='col' style='font-size: 20px;'>Certificado:</b>
                 <br>
                 <input type='file' name='arquivo'>
                 <br>
                 <br>
                 <b id='col' style='font-size: 20px;'>Referencia de instituição:</b>
                 <br>
                 <input type='text' name='ref' required placeholder='Ex.: pipipipopopo' style='width: 450px; height: 30px; border-radius: 15px;'>
                 <br>
                 <br>
                 <b id='col' style='font-size: 20px;'>Conclusão de estudo:</b>
                 <br>
                 <input type='date' name='data' required style='width: 450px; height: 30px; border-radius: 15px;'>
                 <br>
                 <br>
                 <button class='btn btn-info' style='width: 300px; height: 30px; border-radius: 15px;'><em>Enviar</em></button>
                 <br>
                 <br>
           </form></center></div> 
           <br>"; 
                      if (isset($_POST['ref'])) {

    $dir = "upload/certificados";
    $file = $_FILES["arquivo"];
    $arquivo = "$dir/".$file["name"];

    if(move_uploaded_file($file["tmp_name"], $arquivo )){

      $query = "UPDATE tb_usuario SET dt_conclusao = '".$_POST['data']."', ref_instituicao = '".$_POST['ref']."', certificado = '".$arquivo."' WHERE codigo = '".$_SESSION['Usuario']."'";

      if ($query = $mysqli -> query($query)) {
      }
}
  } 
          }

        }
      
  }
}




}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<meta charset="utf-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <meta http-equiv="refresh" content="20"> 
  </head>
  <script type="text/javascript" src="slick/slick.min.js"></script>
	<script type="text/javascript">
$(document).ready(function(){
$('#A').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  dots: true,
  centerMode: true,
  focusOnSelect: true,
  autoplay: true,
  autoplaySpeed: 3000,
  fade: true,
  swipe: false
});
$('#B').slick({
  slidesToShow: 3,
  slidesToScroll: 3,
  dots: true,
  centerMode: true,
  focusOnSelect: true,
  infinite: true,
  arrows: true 	
});
  });
	</script>

<body>
<center>
<div id="A" class="slider-nav" style="top: 20px; width: 1200px;  align-content: center; position: relative; ">
<?php 
$sql_select = "SELECT * from imagens Where Tipo = 1";
if ($res = $mysqli->query($sql_select)) {
  while ($obj = $res->fetch_object()) {
  ?>
  		<div class="slide-for"><img height="400px" width="1200px" src="<?php echo $obj->nome; ?>" style="border-radius: 20px;"></div>
<?php
  }
}else{
  echo $mysqli->error;
}
 ?>
</div>
	<br>
	<hr>
<div id="B" class="slider-nav" style="top: 20px; width: 1200px; align-content: center; position: relative; ">
<?php 
$sql_select = "SELECT * from imagens Where Tipo = 2";
if ($res = $mysqli->query($sql_select)) {
  while ($obj = $res->fetch_object()) {
  ?>
  	  <div class="slide-for"><img width="260px" height="200" src="<?php echo $obj->nome; ?>" style="border-radius: 20px;"></div>
<?php
  }
}else{
  echo $mysqli->error;
}
 ?>
</div>
	<br>
  <br>
</center>
</body>
</html>