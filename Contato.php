<?php
include('A.php');
include('Sidebar.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Contato</title>
</head>
<meta charset="utf-8">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<style type="text/css">
	*{
		margin: 0;
		padding: 0;
		font-family: sans-serif;
	}
	.team-section{
		overflow: hidden;
		text-align: center;
		padding: 60px;
	}
	.team-section h1{
		text-transform: uppercase;
		margin-bottom: 60px;
		font-size: 40px;
	}
	.border{
		display: block;
		margin: auto;
		width: 160px;
		height: 3px;
		background-color: black;
		margin-bottom: 40px;
	}
	.ps{
		margin-bottom: 40px;
	}
	.ps a{
		display: inline-block;
		margin: 0 30px;
		width: 160px;
		height: 160px;
		overflow: hidden;
		border-radius: 50%;
	}
	.ps a img{
		width: 100%;
		filter: grayscale(100%);
		transition: 0.4s all;
	}
	.ps a:hover > img{
		filter: none;
	}
	.section{
		width: 600px;
		margin: auto;
		font-size: 20px;
		text-align: justify;
		height: 0;
		overflow: hidden; 
	}
	.section:target{
		height: auto;

	}
	.name{
		display: block;
		margin-bottom: 30px;
		text-align: center;
		text-transform: uppercase;
		font-size: 22px;
	}
</style>
<body>
<br>
<button class="btn btn-success" style='background-color:#A7EFCC; color:black; border-radius:30px;width:75px;height: 34px;'><a href="SobreNos.php">Voltar</a></button>
<div class="team-section">
         <h1>Nossa Equipe</h1>
         <h2>3mintcc2020@gmail.com</h2>
         <br>
         <span class="border"></span>
         <div class="ps">
          <a href="#p1">
            <img src="Imagens/leticia.jpg">
          </a>
          <a href="#p2">
            <img src="Imagens/larissa.jpg">
          </a>
          <a href="#p3">
            <img src="Imagens/rafael.jpg">
          </a>
          <a href="#p4">
            <img src="Imagens/jeff.jpg">
          </a>
         <a href="#p5">
            <img src="Imagens/manuela.jpg">
          </a>
         </div>
         <div class="section" id="p1">
         	<span class="name">Leticia Santiago</span>
         	<p style="text-align: center;">
         	Gerente do Projeto e Analista da Documentação
         	</p>
         	<br>
         	<span class="border">
         	</span>
         </div>
         <div class="section" id="p2">
         	<span class="name">Larissa Sartori</span>
         	<p style="text-align: center;">
         	Web Designer, Desenvolvedora Front-End e Gerente de Mídias
         	</p>
         	<br>
         	<span class="border"></span>
         </div>
         <div class="section" id="p3">
         	<span class="name">Rafael Hungria</span>
           	<p style="text-align: center;">
         	Desenvolvedor Back-End
         	</p>
         	<br>
         	<span class="border"></span>
         </div>
         <div class="section" id="p4">
         	<span class="name">Jefferson Vitor</span>
          	<p style="text-align: center;">
         	Desenvolvedor Back-End e Administrador de Banco de Dados
         	</p>
         	<br>
         	<span class="border"></span>
         </div>
         <div class="section" id="p5">
         	<span class="name">Manuela Picão</span>
         	<p style="text-align: center;">
         	Analista de Banco de Dados e Gerente de Mídias
         	</p>
         	<br>
         	<span class="border"></span>
         </div>
         <center>
         	<div>
         		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3640.0822602431936!2d-46.78771368476012!3d-24.16884769019134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce2a634639f1ad%3A0x880cccc8530ba600!2sETEC%20de%20Itanha%C3%A9m!5e0!3m2!1spt-BR!2sbr!4v1603986006073!5m2!1spt-BR!2sbr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
         	</div>
         </center>
      </div>
</div>
</body>
</html>