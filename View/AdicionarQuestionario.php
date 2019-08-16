<?php
include_once "../Model/Conexao.php";
include_once "../Model/TesteOnline.php";
include_once "../Controller/TesteOnlineDAO.php";

$conn = new Conexao();
$testeOnline = new TesteOnline();
$testeOnlineDAO = new TesteOnlineDAO($conn);
$arrayTestesOnline = $testeOnlineDAO->Listar($testeOnline);

?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

    <body>

        <!-- Navbar -->
        <!-- Navbar (sit on top) -->
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0F91CF;">
          <a class="navbar-brand" href="#"> 
            <img src="Imagens/Logo(2).jpg" width="50" height="50" class="d-inline-block align-top" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                  <span class="navbar-toggler-icon"></span>
                </button>
        
          <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(página atual)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Sobre Nós</a>
              </li>
              <!-- DropBox -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Serviços
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Soluções de Software</a>
                  <a class="dropdown-item" href="#">Suporte</a>
                  <a class="dropdown-item" href="#">Análise de processos</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Veja mais</a>
                </div>
              </li>
              <li class="nav-item">
                      <a class="nav-link" href="#">Trabalhe conosoco</a>
              </li>
              <li class="nav-item">
                      <a class="nav-link" href="#">Contatos</a>
              </li>      
           <!-- Pesquisa -->
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
              <button class="btn btn-outline-Secondary my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>
          </div>
  </nav>

    <div class="container-fluid">

        <div id="titulo" class="row">
            <!---Título-->
            <h2><strong>Teste Online</strong></h2>
        </div>

        <div class="row">

            <div class="card" style="width: 136rem;">
                <form method="POST" action="AdicionarQuestao.php">
                  <div class="card-body">
                      <label class="col-sm-3 col-form-label">Nome do Teste Online</label>
                      <div class="col-sm-5">
                        <input class="form-control" type="text" name="nomeTeste" id="nomeTeste" placeholder="inserir aqui">
                        <input name="numTeste" type="hidden" value="1"/>
                      </div>
                  </div>
                  <div class="card-body">
                      <input type="submit" name="Adicionar" id="Adicionar" class="btn btn-primary" value="Adicionar" />
                  </div>
                </form>

            </div>
        </div>

        <h2>Testes Online Disponíveis</h2>
        <div class="row">
          <div class="col-8">
            <table class="table table-striped">
              <tr>
                <th>ID do Teste Online</th>
                <th>Nome do Teste Online</th>
                <th>Quantidade de Questões</th>
                <th></th>
                <th></th>
                <th></th>
              </tr>

              <?php foreach($arrayTestesOnline as $reg): ?>

              <tr>
                <td><?= $reg->getIdTesteOnline(); ?></td>
                <td><?= $reg->getNomeTesteOnline(); ?></td>
                <td><?= $reg->getQuantidadeQuestoes(); ?></td>
                <td> <a href="questoes_listar.php?idTesteOnline=<?= $reg->getIdTesteOnline(); ?>">Visualizar Questões</a> </td>
                <td> <a href="testeonline_alterar.php?idTesteOnline=<?= $reg->getIdTesteOnline(); ?>">Alterar</a> </td>
                <td> <a href="testeonline_excluir.php?idTesteOnline=<?= $reg->getIdTesteOnline(); ?>">Excluir</a> </td>
              </tr>

              <?php endforeach; ?>

            </table>

          </div>
        </div>

</div> 

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="../JS/script.js"></script>

</body>
</html>