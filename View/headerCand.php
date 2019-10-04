<?php 
session_start();

if (isset($_POST['btnEntrar'])) {
    
	$conn = new Conexao();
    $candidato = new Candidato();
    $candidatoDAO = new CandidatoDAO($conn);

	$candidato->setEmail($_POST['txtEmail']);
	$candidato->setSenha($_POST['txtSenha']);

    $resultado = $candidatoDAO->Logar($candidato);
    
    if($resultado == 1)
        echo "<script> window.location.replace('candidato_alterar.php'); </script>";
    else if($resultado == 2)
        echo "<script> alert('Senha errada!'); history.go(-1); window.location.replace('candidato_logar.php');</script>";
    else if($resultado == 3)
        echo "<script> alert('E-mail não cadastrado!'); window.location.replace('candidato_logar.php'); </script>";
	
}

if(empty($_SESSION['logado'])){
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
     <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-image: linear-gradient(to right, rgba(10, 100, 180, 1), rgba(23,166,255,1));">
              <a class="navbar-brand h1 mb-0" href="#"> Connection</a>

              <button class="navbar-toggler" type="button" data-toggle="collapse"
                  data-target="#navbarsite" aria-controls="conteudoNavbarSuportado" aria-expanded="false"
                  aria-label="Alterna navegação">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsite">
                  <ul class="navbar-nav">

                     <li class="nav-item">
                       <a class="nav-link" href="#home">Home</a>
                     </li>

                     <li class="nav-item">
                       <a class="nav-link" href="#sobre">Minhas vagas</a>
                     </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Alerta -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i><img src="imagem/sino.png"></i>
                                    <!-- Counter - alerta -->
                                    <span class="badge badge-danger badge-counter">3+</span>
                                </a>

                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow" aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                    Alerts Center
                                    </h6>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                            </li>

                            <!-- Nav Item - Mensagem -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i><img src="imagem/mensagem.png"></i>
                                    <!-- Counter - mensagem -->
                                    <span class="badge badge-danger badge-counter">7</span>
                                </a>
                                <!-- Dropdown - mensagem -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                                 <h6 class="dropdown-header">
                                    Alerts Center
                                    </h6>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                            </li>

                            <!-- Nav Item - Informação do usuário -->
                            <li class="nav-item dropdown no-arrow" style="padding-left:1rem">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span><?= $_SESSION['nomeCandidato']; ?></span>
                                    <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/30x30">
                                </a>

                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                    <i></i>
                                    Perfil
                                    </a>
                                    <a class="dropdown-item" href="#">
                                    <i></i>
                                    Configurações
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
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