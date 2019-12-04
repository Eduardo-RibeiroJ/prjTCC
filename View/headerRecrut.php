<?php
if (!isset($_SESSION)) {
	session_start();
}

include_once "../Model/Conexao.php";
include_once "../Model/Recrutador.php";
include_once "../Controller/RecrutadorDAO.php";

if (isset($_POST['btnEntrarRecrutador'])) {

	$conn = new Conexao();
	$recrutador = new Recrutador();
	$recrutadorDAO = new RecrutadorDAO($conn);

	// Elimina mascara
	$cnpj = preg_replace("/[^0-9]/", "", $_POST['txtCnpj']);
	$cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);

	//Tem que voltar a mascara
	//echo "<script>alert($cnpj);</script>";

	$recrutador->setCnpj($cnpj);
	$recrutador->setSenha($_POST['txtSenha']);

	$resultado = $recrutadorDAO->Logar($recrutador);

	if ($resultado == 1)
		echo "<script> window.location.replace('recrutador.php'); </script>";
	else if ($resultado == 2)
		echo "<script> alert('Senha errada!'); history.go(-1); window.location.replace('index.php');</script>";
	else if ($resultado == 3)
		echo "<script> alert('Cnpj não cadastrado!'); window.location.replace('recrutador_cadastrar.php'); </script>";
}

if (!(isset($_SESSION['logado'])) || $_SESSION['logado'] != 2) {
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

	<script type="text/javascript" src="../JS/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../JS/jquery.mask.js"></script>

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
						<a class="nav-link" href="recrutador.php">Home</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="processo_listagem.php">Processos Seletivos</a>
					</li>
				</ul>

				<ul class="navbar-nav ml-auto">

					<!-- Nav Item - Informação do usuário -->
					<li class="nav-item dropdown no-arrow" style="padding-left:0.15rem">
						<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span><?= $_SESSION['nomeEmpresa']; ?></span>
							<img class="img-profile rounded-circle" src="imagem/company.png">
						</a>

						<!-- Dropdown - User Information -->
						<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
							<a class="dropdown-item" href="recrutador_alterar.php">
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