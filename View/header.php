<!DOCTYPE HTML>
<html>

<head>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="css/design.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
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
        <ul class="navbar-nav mr-auto">

          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#sobre">Sobre o sistema</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#funcionalidades">Caracteristicas</a>
          </li>

          <!--<li class="nav-item">
            <a class="nav-link" href="candidato_logar.php">Entrar</a>
          </li>-->

        </ul>

        <button type="button" class="btn btn-outline-light mr-1" data-toggle="modal" data-target="#candidato">Sou candidato</button>
        <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#recrutador">Sou empresa</button>

    </nav>
  </header>

  <?php

  include_once "../Model/Conexao.php";
  include_once "../Model/Candidato.php";
  include_once "../Controller/CandidatoDAO.php";

  ?>


  <!-- Botão de acesso candidato -->

  <div class="modal fade" id="candidato" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="TituloModalCentralizado"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-signin" action="candidato.php" method="post">
            <h1 class="h3 mb-3 font-weight-normal text-center">Faça login</h1>
            <div class="form-row">
              <div class="form-group col-12">
                <label class="text-left">
                  <h6>Endereço de email</h6>
                </label>
                <input type="email" id="txtEmail" name="txtEmail" class="form-control" placeholder="Seu email" required="" autofocus="">
              </div>
              <div class="form-group col-12">
                <label class="text-left">
                  <h6>Senha</h6>
                </label>
                <input type="password" id="txtSenha" name="txtSenha" class="form-control" placeholder="Senha" required="">
              </div>
            </div>

            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me"> Lembrar de mim
              </label>
            </div>
            <input type="submit" id="btnEntrar" name="btnEntrar" class="btn btn-lg btn-outline-primary btn-block" value="Logar">
          </form>
        </div>
        <div class="modal-footer">
          <p class="pt-3">É novo no site? cadastre-se aqui.</p>
          <a href="Candidato_cadastrar.php" class="btn btn-primary" role="button" aria-pressed="true">Cadastrar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Botão de acesso para o recrutador -->

  <div class="modal fade" id="recrutador" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="TituloModalCentralizado"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-signin" action="recrutador.php" method="post">
            <h1 class="h3 mb-3 font-weight-normal text-center">Faça login</h1>
            <div class="form-row">
              <div class="form-group col-12">
                <label class="text-left">
                  <h6>Cnpj</h6>
                </label>
                <input type="text" id="txtCnpj" name="txtCnpj" class="form-control" placeholder="Seu cnpj" required="" autofocus="">
              </div>
              <div class="form-group col-12">
                <label class="text-left">
                  <h6>Senha</h6>
                </label>
                <input type="password" id="txtSenha" name="txtSenha" class="form-control" placeholder="Senha" required="">
              </div>
            </div>

            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me"> Lembrar de mim
              </label>
            </div>
            <input type="submit" id="btnEntrarRecrutador" name="btnEntrarRecrutador" class="btn btn-lg btn-outline-primary btn-block" value="Logar">
          </form>
        </div>
        <div class="modal-footer">
          <p class="pt-3">É novo no site? cadastre-se aqui.</p>
          <a href="Recrutador_cadastrar.php" class="btn btn-primary" role="button" aria-pressed="true">Cadastrar</a>
        </div>
      </div>
    </div>
  </div>



  <!-- Fim do Cabeçalho que irá em todas as páginas  -->