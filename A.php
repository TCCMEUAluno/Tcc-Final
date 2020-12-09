<!DOCTYPE html>
<html>
<head>
</head>
<meta charset="utf-8">  
<link rel="stylesheet" type="text/css" href="CSS.css">
<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    
  </head>

<body>



<?php


$servidor = 'localhost';
$usuario = 'root';
$senha = 'usbw';
$banco = 'meualuno'; 


$mysqli = new mysqli($servidor, $usuario, $senha, $banco);
$mysqli->query("SET NAMES 'utf8'");
$mysqli->query('SET character_set_connection=utf8');
$mysqli->query('SET character_set_client=utf8');
$mysqli->query('SET character_set_result=utf8');

//if (mysqli_connect_errno()) {trigger_error(mysqli_connect_error());}else{echo "Conectou";}

?>

</body>

</html>