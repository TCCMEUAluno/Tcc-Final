<?php
include('A.php');
include('Sidebar.php');
if (isset($_SESSION['Usuario'])) {

if (isset($_POST['Feedback'])) {

$sql = "insert into feedback value(null,'".$_POST['Feedback']."',null,'".$_POST['Assunto']."')";

if ($query = $mysqli -> query($sql)) {
}
else{echo $_SESSION['Usuario'];}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
</head>
<body >

	<br>
	<br>
	<script>
function alerta() {
  alert("Mensagem Enviada");
}
</script>
	<center>
		<div><h1>Faça seu Feedback</h1></div>
<form method="POST">
	<label>Escolha um Assunto:</label>
	<select  id='appearance-select' name="Assunto">
		<optgroup label="Problemas">
			<option value="Chat">Chat</option>
			<option value="Pesquisas">Pesquisas</option>
			<option value="Erros">Erros</option>
		</optgroup>
		<optgroup label="Sugestões">
			<option value="Paginas">Páginas</option>
			<option value="Otimizacao">Otimização</option>
			<option value="Add Recursos">Adicionar Recurso</option>
		</optgroup>
		<optgroup label="Outros">Outros</optgroup>
			<option value="Outro">Outro</option>
	</select>
	<br>
	<br>Mensagem:
	<br><textarea type="text" name="Feedback" style="resize: none; height: 200px; width: 600px; border-radius:30px;border:2px solid black; font-size: 15px;" required></textarea>
	<br>
	<button class="btn btn-success" type="submit" onclick="alerta()">ENVIAR</button>
</form>
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
<?php }else{header('location:Login.php');}?>
