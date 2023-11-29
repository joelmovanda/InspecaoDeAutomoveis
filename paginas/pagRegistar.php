<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">


	<!-- Bootstrap core CSS -->
	<link href="bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="business-casual.min.css" rel="stylesheet">

</head>

<body>

	<h1 class="site-heading text-center text-white d-none d-lg-block">
		<span class="site-heading-upper text-primary mb-3"></span>
		<span class="site-heading-lower">SISTEMA DE MARCAÇÃO ONLINE DE INPEÇÃO DE AUTOMÓVEL</span>
	</h1>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav mx-auto">
					<li class="nav-item active px-lg-4">
						<a class="nav-link text-uppercase text-expanded" href="pagHome.html">Pagina Inicial
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item px-lg-4">
						<a class="nav-link text-uppercase text-expanded" href="pagSobre.html">Sobre</a>
					</li>
					<li class="nav-item px-lg-4">
						<a class="nav-link text-uppercase text-expanded" href="pagProdutos.html">Produtos</a>
					</li>
					<li class="nav-item px-lg-4">
						<a class="nav-link text-uppercase text-expanded" href="pagLoja.html">Loja</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<section class="page-section clearfix">
		<div class="container">
			<div class="intro">
				<img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="intro.jpg" alt="">
				<div class="intro-text left-0 text-center bg-faded p-5 rounded">
					<h2 class="section-heading mb-4">
						<span class="section-heading-lower">Inspeção de automovel de qualidade</span>
					</h2>
					<?php
						$categ = $_GET['categoria'];
						$nome = $_GET['nome'];
						$senha = $_GET['senha'];
						$morada = $_GET['morada'];
						$telefone = $_GET['telefone'];
						$conSenha = $_GET['conSenha'];
						$idade = $_GET['idade'];
						$sexo = $_GET['sexo'];
						
						// Ligar há base de dados
						include '../basedados/basedados.h';
						if($senha == $conSenha)
						{	
							$sql = "INSERT INTO utilizador(id_tipo_utilizador,nome, senha,morada,telefone,idade,sexo) VALUES('$categ','$nome', 
							'$senha','$morada','$telefone','$idade','$sexo')";;
							//Seleciona a base de dados
							
							$retval = mysqli_query( $conn, $sql );
							if(! $retval ){
								die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
							}
							if (mysqli_affected_rows ($conn) == 1)
							{
								echo ('<font color="green">Registrado com sucesso!!!</font>');
								echo "<br><a href='pagLogin.html'>Fazer Login</a>";
							} 
							else
							{	
								echo ('<font color="red">Falha ao Registrar!!!</font>'); 
								echo "<br><a href='pagRegistar.html'>Voltar ao ínicio</a>";
							}					
						}else
						{	
							echo ('<font color="red">Palavra passe incorreta !!!</font>'); 
							echo "<br><a href='pagRegistar.html'>Tentar Novamente</a>";
						
						}					
					?>  
				</div>
			</div>
		</div>
	</section>

	<footer class="footer text-faded text-center py-5">
		<div class="container">
			<p class="m-0 small">Copyright by Joelmo Vanda & Samira Omais &copy; Your Website 2021</p>
		</div>
	</footer>
	<!-- Bootstrap core JavaScript -->
	<script src="jquery.min.js"></script>
	<script src="bootstrap.bundle.min.js"></script>

</body>

</html>




