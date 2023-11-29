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
            <a class="nav-link text-uppercase text-expanded" href="pagCliente.php">Marcações
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="pagClienteDadosPessoais.php">Gestão  Pessoal</a>
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
                <span class="section-heading-lower">Marcações </span>
              </h2>
						<div class="intro-button mx-auto">
							<a class="btn btn-primary btn-xl" href="pagLogout.php">Logout</a>
						</div>
						
						<div class="secundary-button mx-auto">
							<a class="btn btn-primary btn-xl" href="pagClienteMarcar.html">Fazer Marção</a>
						</div>
		        <?php
							session_start();
							$_SESSION['nome'];
							if(!isset($_SESSION['nome'])or ($_SESSION["id_tipo_utilizador"])!=2){
								header("Location:pagHome.html");
							}else
							{
								
								// Ligar há base de dados
								include '../basedados/basedados.h';
								
								// Cria a tabela
								echo "<table border='1' style='text-align:center;'><tr><th>Marcações</th></tr>";
								echo "<table border='1' style='text-align:center;'><tr><th>Id</th><th>Data</th><th>hora</th><th>Preco</th><th>Utilizador</th><th>Desmarcar</th><th>Alterar</th></tr>";
								
								// Liga a tabela na base de dados
								$sql = "SELECT * FROM marcacao 
								WHERE id_utilizador = '{$_SESSION['nome']}'";
								//Seleciona a base de dados
								
								$retval = mysqli_query( $conn, $sql );
							
								if(! $retval ){
									die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
								}

								while($row = mysqli_fetch_array($retval)){// vai buscar ha base de dados os dados nela guardada e poem os na tabela
									echo "<td>".$row['id']."</td>";
									echo "<td>".$row['data']."</td>";
									echo "<td>".$row['hora']."</td>";
									echo "<td>".$row['id_preco']."</td>";
									echo "<td>".$row['id_utilizador']."</td>";
									echo "<td>".'<a href="pagClienteDesmarcar.php?id='.$row['id']."\">"."Desmarcar"."</a>"."</td>";
									echo "<td>".'<a href="pagClienteAlterarMarcacao.php?id='.$row['id']."\">"."Alterar"."</a>"."</td>";
									echo "</tr>";
									
								}
								echo "<br><a href='pagCliente.php'>Voltar a Pagina Inicial </a>";
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
