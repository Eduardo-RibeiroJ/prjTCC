<?php

if (!isset($_SESSION)) {
	session_start();
}

include_once "../Model/Conexao.php";
include_once "../Model/Candidato.php";
include_once "../Controller/CandidatoDAO.php";

if (isset($_POST['btnEntrar'])) {

	$conn = new Conexao();
	$candidato = new Candidato();
	$candidatoDAO = new CandidatoDAO($conn);

	$candidato->setEmail($_POST['txtEmail']);
	$candidato->setSenha($_POST['txtSenha']);

	$resultado = $candidatoDAO->Logar($candidato);

	if ($resultado == 1)
		echo "<script> window.location.replace('candidato.php'); </script>";
	else if ($resultado == 2)
		echo "<script> alert('Senha errada!'); history.go(-1); window.location.replace('candidato_logar.php');</script>";
	else if ($resultado == 3)
		echo "<script> alert('E-mail não cadastrado!'); window.location.replace('candidato_cadastrar.php'); </script>";
}

if(!(isset($_SESSION['logado'])) || $_SESSION['logado'] != 1) {
	echo "<script>location.href='index.php'</script>";
}
?>

<!DOCTYPE HTML>
<html>

<head>
	<!-- Meta tags Obrigatórias -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="css/design.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>

<body>

	<!-- Navbar -->
	<header id="header">
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: rgba(20, 137, 204, 1);">
			<a class="navbar-brand h1 mb-0" href="index.php"> Connection</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsite" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsite">
				<ul class="navbar-nav">

					<li class="nav-item">
						<a class="nav-link" href="candidato.php">Home</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="candidato_minhas_vagas.php">Processos Seletivos</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="candidato_vagas.php?nomeCargo=">Vagas</a>
					</li>
				</ul>

				<ul class="navbar-nav ml-auto">

					<!-- Nav Item - Informação do usuário -->
					<li class="nav-item dropdown no-arrow" style="padding-left:1rem">
						<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span><?= $_SESSION['nomeCandidato']; ?></span>
							<img class="img-profile rounded-circle ml-2" style="width: 30px; height: 30px;" src="https://www.letradamusica.net/fotos/k/kasino/fotos/kasino-8.jpg">
						</a>

						<!-- Dropdown - User Information -->
						<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
							<a class="dropdown-item" href="candidato_perfil.php">
								<i></i>
								Perfil
							</a>
							<a class="dropdown-item" href="#">
								<i></i>
								Configurações
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="logout.php">
								<i></i>
								Sair
							</a>
						</div>
					</li>

				</ul>

			</div>
		</nav>
	</header>

	<!-- Fim do Cabeçalho que irá em todas as páginas  -->