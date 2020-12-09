<?
if (isset($_SESSION['Usuario'])) {
$codigo = $_GET['codigo'];

			if(!empty($_GET['codigo'])){

				$usuario = "DELETE FROM tb_usuario WHERE codigo = $codigo";
				$usu = mysqli_query($mysqli, $usuario);

				$acesso = "DELETE FROM acesso WHERE id_usuario = $codigo";
				$acessar = mysqli_query($mysqli, $acesso);

				$anotacao = "DELETE FROM anotacao WHERE id_usuario = $codigo";
				$anotar = mysqli_query($mysqli, $anotacao);

				$chat1 = "DELETE FROM chat WHERE id_destino = $codigo";
				$conversa = mysqli_query($mysqli, $chat1);

				$chat2 = "DELETE FROM chat WHERE id_origem = $codigo";
				$conversar = mysqli_query($mysqli, $chat2);

				$feed = "DELETE FROM feedback WHERE id_codigo = $codigo";
				$feedback = mysqli_query($mysqli, $feed);

				$cont = "DELETE FROM tb_conteudo WHERE id_usuario = $codigo";
				$conteudo = mysqli_query($mysqli, $cont);

				$mat = "DELETE FROM tb_materia WHERE id_usuario = $codigo";
				$materia = mysqli_query($mysqli, $mat);
				
				$vis = "DELETE FROM tb_vis WHERE id_usuario = $codigo";
				$visualizar = mysqli_query($mysqli, $vis);
				

				if(mysqli_affected_rows($mysqli)){

				}else{echo  $mysqli->error;}
			}
			session_destroy();
		header('location:Index.php');
        header('location:index.php');

}else{header('location:Login.php');}?>
