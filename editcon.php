<?php
include('A.php');
include('Sidebar.php');
if (isset($_SESSION['Usuario'])) {

    $codigo = $_GET['cd'];
    if (!empty($_GET['cd'])) {
    $query = "SELECT * FROM tb_conteudo WHERE codigo = $codigo" ;
    if ($result = $mysqli->query($query)) {
      while ($obj = $result->fetch_object()) {
          $nome = $obj->nome;
          $codigo = $obj->codigo;
    }
    }
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    	<title>Edição de conteúdo</title>
        <meta http-equiv="refresh" content="20"> 
    </head>
    <body>
    <form method='POST' enctype="multipart/form-dat">
    	<center>

    		<?php
    		if ($res = $mysqli->query($query)) {
              while($obj = $res->fetch_object()) {
           	echo "
    			  <br>
    			  <br>
    			  <b id='col' style='font-size: 20px;'>Novo conteudo:</b>
    			  <br>
    			  <input type='text' name='nome' value='$obj->nome' required style='width: 400px; height: 30px; border-radius: 15px;'>
    			  <br>
    			  <br>
    			  <b id='col' style='font-size: 20px;'>Descrição:</b>
    			  <br>
    			  <input type='text' name='descricao' value='$obj->descricao' required style='width: 400px; height: 30px; border-radius: 15px;'>
    			  <br>
    			  <br>
    			  ";
           }
       }
    		$tag = "SELECT * FROM tb_tag WHERE id_conteudo = $codigo";
    		  $resultado = mysqli_query($mysqli, $tag);
    		   if ($res = $mysqli->query($tag)) {
             	 while($obj = $res->fetch_object()) {
             	 	echo " <b id='col' style='font-size: 20px;'>Alterar tag:</b>
    					    <br>
    					    <input type='text' name='tag' value='$obj->nome' required style='width: 400px; height: 30px; border-radius: 15px;'>
    					    <br>
    					    <br>";
    				}
    			}

    			echo"<button class='btn btn-info' name='button' style='width: 300px; height: 30px; border-radius: 15px;'><em>Cadastrar</em></button>
    			  <br>";
    		   if (isset($_POST['button'])) {

        		$result_cont = "UPDATE tb_conteudo SET nome = '".$_POST['nome']."', descricao = '".$_POST['descricao']."' WHERE codigo = '$codigo'";
        		if ($query = $mysqli -> query($result_cont)) {
        		}else{echo $mysqli->error;}

        		$result_tag = "UPDATE tb_tag SET nome = '".$_POST['tag']."' WHERE id_conteudo = '$codigo'";
    		    if ($query = $mysqli -> query($result_tag)) {
    		    }else{echo $mysqli->error;}

        		echo "<script> alert ('Conteudo editado com sucesso!')</script>";
    		}
    		echo "<a style='font-size: 20px;' href='meusconteudos.php'>Voltar</a>";
}else{header('location:Login.php');}?>
    </center>
    </form>
    </body>
    </html>

