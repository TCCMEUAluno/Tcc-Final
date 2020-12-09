<?php
include('A.php');
include('Sidebar.php');
if (isset($_SESSION['Usuario'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Caderno</title>
	<meta charset="utf-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="refresh" content="20"> 
</head> 
<body>
 <br>
  <center>  
<div class="row" >
<?php 
$cd = $_GET['cd'];

if(!empty($_GET['cd'])){
  $sql_select = "SELECT * from anotacao WHERE id_usuario = '".$_SESSION['Usuario']."' AND id_conteudo = $cd";
}

if ($res = $mysqli->query($sql_select)) {
  while ($obj = $res->fetch_object()) {
    $usuario = $obj->id_usuario;
    $conteudo = $obj->id_conteudo;
    $notas = $obj->notas;
    $codigo = $obj->codigo;
     echo " <div  >
                <div class='card shadow mb-4' style='box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25); position: relative;display: flex;flex-direction: column;background-color: #fff;border: 1px solid #e3e6f0; border-radius: 20px; margin-top: 30px; height:430px; width:760px;'>
                        <div class='card-header py-3' style='padding: 10px 10px; background-color: #9F7FDF; border-bottom: 1px solid #e3e6f0; border-radius: calc(20px - 1px) calc(20px - 1px) 0 0; '><br>";
                          
                       echo "<br>
                        </div>
                       <form method='POST' style=' width: 760px; height: 310px;'><center>
                                        <textarea name='notas' id='editor' cols='80' rows='100' style='font-size: 20px;'> $notas</textarea>
                                        <input type='submit' class='btn btn' name='Salvar' value='Salvar' style='background-color:#FF914D; font-size:15px;'>
                       </center></form>
              </div>
            </div>";


                                  if(isset($_POST['notas'])){
                                      $caderno = "UPDATE anotacao SET notas = '".$_POST['notas']."'  WHERE id_usuario = '".$_SESSION['Usuario']."' AND id_conteudo = '".$conteudo."' AND codigo = $codigo";
                                      if ($query = $mysqli -> query($caderno)) {
                                      }else{ echo $mysqli->error;}
                                  }
                                    }
}else{echo $mysqli->error;}
                            ?>
</div>
</center>

	<br>
  <br>

<style> 
 textarea {background-color: #fff; box-sizing: border-box; width: 760px; height: 310px; padding: 10px; border: 0; display: block; overflow: auto;border: 1px solid #999; border-top: none; border-bottom-left-radius: 4px; border-bottom-right-radius: 4px;}

 </style>
</body>
</html>
<?php
}else{header('location:Login.php');}?>
