<?php
include_once "../Model/Conexao.php";
include_once "../Model/Questao.php";
include_once "../Model/TesteOnline.php";
include_once "../Controller/TesteOnlineDAO.php";
include_once "../Controller/QuestaoDAO.php";

$conn = new Conexao();

$testeOnline = new TesteOnline();
$questao = new Questao();

$testeOnlineDAO = new TesteOnlineDAO($conn);
$questaoDAO = new QuestaoDAO($conn);

$testeOnline->setIdTesteOnline($_GET['idTesteOnline']);
$questao->setIdTesteOnline($_GET['idTesteOnline']);

$testeOnlineDAO->Listar($testeOnline);
$arrayQuestao = $questaoDAO->Listar($questao);

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script type="text/javascript" language="javascript" src="../JS/jquery-3.2.1.js"></script>
    <script src="../JS/script.js"></script>
    <script src="../JS/ajax.js"></script>

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
              <h2 id="idTesteOnline"><?= $testeOnline->getIdTesteOnline(); ?></h2>
              <h2><pre> - Teste Online <?= $testeOnline->getNomeTesteOnline(); ?></pre></h2>
        </div>

        <div class="row">
          </div class="col-8">
            <h2>Questões</h2>
            <a href="testeOnline.php" class="btn btn-primary btn-lg">Voltar</a>
          </div>


          <div class="col-12">
            <table id="tabelaQuestao" class="table table-striped">
                <tr>
                  <th>Questão Nº</th>
                  <th>Questão</th>
                  <th></th>
                  <th></th>
                </tr>

                <?php foreach($arrayQuestao as $reg): ?>

                  <tr>
                    <td><?= $reg->getIdQuestao(); ?></td>
                    <td><?= $reg->getQuestao(); ?></td>
                    <td><button class="btnExcluir btn btn-primary" type="button" value="<?= $reg->getIdQuestao(); ?>">Excluir</button></td>
                    <td> <a class="btn btn-primary" href="testeOnline_questao_alterar.php?idTesteOnline=<?= $reg->getIdTesteOnline(); ?>&idQuestao=<?= $reg->getIdQuestao(); ?>">Alterar</a></td>
                  </tr>

                <?php endforeach; ?>

            </table>

          </div>
        </div>

</div> 

</body>
</html>
