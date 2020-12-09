<?php

include('A.php');
include('Sidebar.php');
if (isset($_SESSION['Usuario'])) {
?>
<!DOCTYPE html>
<html>
<head>
<title>Chat</title>
</head>
<body>
  	<div class="row">
  		<center>
		<div class="col-md-6">
				<h3>Últimas mensagens recebidas</h3><hr>
				<?php 
					$query = "SELECT * FROM chat WHERE id_destino = '".$_SESSION['Usuario']."'";
						if ($result = $mysqli->query($query)) {
 				 		while ($obj = $result->fetch_object()) {
 				 			$id = $obj->id_origem;
 				 			if (isset($obj->mensagem)) {
	  							$msgRecebidas = $obj->mensagem;
								echo "<table style='width: 650px;'>
								<tr>";
									$q = "SELECT * FROM tb_usuario WHERE codigo = $id";
									if ($res = $mysqli->query($q)) {
 				 						while ($obj = $res->fetch_object()) {
 				 							echo "<td> <img src='$obj->foto' style='width:50px;height:50px; border-radius:30px;border:2px solid black; margin-top:10px;'></td>";
 				 							echo "<td> $obj->nome</td> <td>".$obj->email."</td>";
 				 							if ($obj->tipo == 0) {
    												echo "<td>Aluno</td>";}
    											elseif ($obj->tipo == 1) {
    												echo "<td>Professor</td>";
    											}else{echo "<td>Administrador</td>";}
 				 						}}
								echo "<td>".$msgRecebidas. "</td>" ;
								echo "<td> <form method='POST' action='ChatR.php'>";
								echo "<input type='hidden' name='MsgR' value='".$id."'>";
								echo "<button class='btn btn-success'style='background-color:#A7EFCC; color:black; border-radius:30px;'><a href='ChatR.php?MsgR=".$id."'>RESPONDER</a></button></td> ";
								echo "</form></tr> </table>";
	  			}}}?>
  		</div>
		<div class="col-md-6">	
			<h3>Comece Algumas Conversas!</h3>
				<table style=" width: 650px;">
 				 		<hr>
						<?php
						$query = "SELECT * FROM tb_usuario WHERE codigo != '".$_SESSION['Usuario']."'";

							if ($result = $mysqli->query($query)) {
 							 while ($obj = $result->fetch_object()) {
 							 	echo "<form method='POST' action='Chat.php'>";
 							 				echo "<input type='hidden' name='MsgR' value='".$obj->codigo."'></input>
  											<tr>
  												<td><img src='$obj->foto' style='width:50px;height:50px; border-radius:30px;border:2px solid black; margin-top:10px;'></td>
    											<td>".$obj->nome."</td>
   												<td>".$obj->email."</td>";
    											if ($obj->tipo == 0) {
    												echo "<td>Aluno</td>";}
    											elseif ($obj->tipo == 1) {
    												echo "<td>Professor</td>";
    											}else{echo "<td>Administrador</td>";}
    												echo "<td><button class='btn btn-success' style='background-color:#A7EFCC; color:black; border-radius:30px;'><a href='Chat.php?MsgR=".$obj->codigo."'>Enviar mensagem para ".$obj->nome."</a></button></td>
  											</tr>
  									  </form>";  
							}
						}
						?>
				</table>

	</div>
	</center>
   </div>
</body>
</html>
<?php }else{header('location:Login.php');}?>