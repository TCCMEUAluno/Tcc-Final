<?php
include('A.php');
include('Sidebar.php');
if (isset($_SESSION['Usuario'])) {

$mat = "SELECT codigo, nome FROM tb_materia";

?>
<!DOCTYPE html>
<html>
<head>
  <title>Matérias</title>
	<meta charset="utf-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<br><br>
<?php
       if ($result = $mysqli->query($mat)) {
          while ($obj = $result->fetch_object()) {
                echo" <div class='col-sm-2 ml-5' id='s'>
                <button style='box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25); background-color: lightgrey;border: 1px solid #e3e6f0; border-radius: 20px; width:200px; height:60px;'> <center> <a style='font-size: 30px;color: black;' href='pagmateria.php?cd=".$obj->codigo."'>".$obj->nome."</a > </center></button>
                </div>

                  ";
      }
    }
}else{header('location:Login.php');}?>

	<br>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("h3").toggle();
  });
});
</script>
</body>
<style type="text/css">
  a{
    
  }
  #s{
    padding-top: -10px;
    padding-bottom: 20px;
    margin-left: 35px;
}
</style>
</html>

