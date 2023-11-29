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
						<a class="nav-link text-uppercase text-expanded" href="pagAdmin.php">Gestão de Utilizadores
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item px-lg-4">
						<a class="nav-link text-uppercase text-expanded" href="pagAdminMarcacao.php">Gestão das Marcações</a>
					</li>
					<li class="nav-item px-lg-4">
						<a class="nav-link text-uppercase text-expanded" href="pagAdminDadosPessoais.php">Gestão de dados Pessoais</a>
					</li>
					</ul>
				</div>
			</div>
		</nav>

		<section class="page-section cta">
			<div class="container">
				<div class="row">
					<div class="col-xl-9 mx-auto">
						<div class="cta-inner text-center rounded">
							<h2 class="section-heading mb-5">
								<span class="section-heading-lower">Gestão de Utilizadores </span>
									</h2>
						<div class="intro-button mx-auto">
							<a class="btn btn-primary btn-xl" href="pagLogout.php">Logout</a>
						</div>
						<?php
							session_start();
							$_SESSION['nome'];
							if(!isset($_SESSION['nome'])or ($_SESSION['nome']!="admin") and ($_SESSION["id_tipo_utilizador"])!=1){
								header("Location:pagHome.html");
								
							}
							else
							{
								$nome = $_GET["nome"];
								// Ligar há base de dados
								include '../basedados/basedados.h';
								// Cria a tabela
								echo "<table border='1' style='text-align:center;'><tr><th>Utilizador à Editar                                     </th></tr>";
								echo "<table border='1' style='text-align:center;'><tr><th>Nome</th><th>Senha</th><th>Tipo de Utilizador</th></tr>";
								// Liga a tabela na base de dados
								$sql = "SELECT * FROM utilizador WHERE nome='$nome'";
								
								$retval = mysqli_query( $conn, $sql );
								if(! $retval ){
									die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
								}

								while($row = mysqli_fetch_array($retval)){// vai buscar ha base de dados os dados nela guardada e poem os na tabela
									echo "<td>".$row['nome']."</td>";
									echo "<td>".$row['senha']."</td>";
									echo "<td>".$row['id_tipo_utilizador']."</td>";
									echo "</tr>";
									
									echo'<form action="pagAdminEditarUserF.php" method="GET">';
									echo'<label>Nome <input type="hidden" name="nome" value='.$row['nome'].' size="10"/><br>';
									echo'<label>Senha<input name="senha" value='.$row['senha'].' size="10"/><br>';
									echo'<label>Morada<input name="morada" value='.$row['morada'].' size="10"/><br>';
									echo'<label>Telefone<input name="telefone" value='.$row['telefone'].' size="10"/><br>';
									echo'<label>Sexo<input name="sexo" value='.$row['sexo'].' size="10"/><br>';
									echo'<label>Idade<input name="idade" value='.$row['idade'].' size="10"/><br>';
									echo'<input type="submit" value="Confirmar"/>';
									echo'</form>';
									
									echo'<form action="pagAdmin.php" method="GET">';	
									echo'<input type="submit" value="voltar"/>';
									echo'</form>';	
								}
								mysqli_close($conn);
							}
						?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Bootstrap core JavaScript -->
		<script src="jquery.min.js"></script>
		<script src="bootstrap.bundle.min.js"></script>

		<!-- Script to highlight the active date in the hours list -->
		<script>
			$('.list-hours li').eq(new Date().getDay()).addClass('today');
		</script>

	</body>

</html>
