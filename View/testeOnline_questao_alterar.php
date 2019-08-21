<?php

include_once "../Model/Conexao.php";
include_once "../Model/Questao.php";
include_once "../Model/TesteOnline.php";
include_once "../Controller/QuestaoDAO.php";
include_once "../Controller/TesteOnlineDAO.php";

$conn = new Conexao();
$questao = new Questao();
$questaoDAO = new QuestaoDAO($conn);
$testeOnline = new TesteOnline();
$testeOnlineDAO = new TesteOnlineDAO($conn);

$testeOnline->setIdTesteOnline($_GET['idTesteOnline']);
$questao->setIdTesteOnline($_GET['idTesteOnline']);
$questao->setIdQuestao($_GET['idQuestao']);

$testeOnlineDAO->Listar($testeOnline);
$questaoDAO->Listar($questao);

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/design.css">

</head>

  <body>

    <header>
          <!-- Navbar -->
          <!-- Navbar (sit on top) -->
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0F91CF;">
        <a class="navbar-brand" href="#"> 
            <img src="Imagens/Screenshot_1.png" width="150" height="50" class="d-inline-block align-top" alt="">
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
              </ul>
            </div>      
        </nav>
      </header>

    <!------------------------------------ Conteudo--------------------------------------------------------------->

    <div class="container-fluid">

        <div id="titulo" class="row">
            <!---Título-->
            <div class="col-6">
              <h2><strong>Teste Online</strong></h2>
            </div>
            <div clss="col-2">
              <a href="testeOnline_questao_listar.php?idTesteOnline=<?= $testeOnline->getIdTesteOnline(); ?>" class="btn btn-primary btn-lg">Voltar</a>
            </div>
        </div>

        <div class="row">

            <div class="card" style="width: 136rem;">
                  <form id="formAlterarQuestao">
                    <div class="card-body">
                            <div class="form-group row">

                                <h3 id="numTeste"><?= $testeOnline->getIdTesteOnline(); ?></h3>

                                <h3><pre> - Nome do Teste Online: </pre></h3>
                                <h3 id="nomeTeste"><?= $testeOnline->getNomeTesteOnline(); ?> </h3>
                            </div>
                            <br>
                      <h3 class="card-title" id="numQuestao">Questão <?= $questao->getIdQuestao(); ?></h3>
                      <div class="input-group-md">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Alterar questão</span>
                            </div>
                            <div class="form-group">
                              <textarea name="questao" id="questao" class="form-control" rows="3"><?= $questao->getQuestao(); ?></textarea>
                            </div>
                      </div>
                      <br>
                      <div class="form-row">
                  <div class="form-group col-md-2.5">
                        <label for="tempo">Tempo de resposta</label>
                        <input type="number" class="form-control" id="tempo" name="tempo" value="<?= $questao->getTempo(); ?>">
                  </div>
                  
                      <div class="form-group col-md-3">
                          <label for="resposta">Resposta</label>
                          <select id="resposta" name="resposta" class="form-control" tabindex="1">

                          <?php

                          $alternativas = ['A','B','C','D'];

                            foreach ($alternativas as $value) {

                              if($value == $questao->getResposta()) 
                                $selected = 'selected';
                              else
                                $selected = '';

                              echo '<option value="'.$value.'" '.$selected.'>'.$value.'</option>';
                            }
                            
                            ?>
                          </select>
                      </div>
                  </div>
                </div>

                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                      <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupPrepend1">A)</span>
                          <input id="a" type="text" class="form-control" name="a" placeholder="Adicionar questão" value="<?= $questao->getAltA(); ?>">
                        </div>        
                      </li>
                    <li class="list-group-item">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend2">B)</span>
                        <input id="b" type="text" class="form-control" name="b" placeholder="Adicionar questão" value="<?= $questao->getAltB(); ?>">
                      </li>
                    <li class="list-group-item">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend3">C)</span>
                        <input id="c" type="text" class="form-control" name="c" placeholder="Adicionar questão" value="<?= $questao->getAltC(); ?>">
                      </li>
                    <li class="list-group-item">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend4">D)</span>
                        <input id="d" type="text" class="form-control" name="d" placeholder="Adicionar questão" value="<?= $questao->getAltD(); ?>">
                      </li> 
                </ul>

                    <div class="card-body">
                        <button id="btnSalvar" class="btn btn-primary">Salvar</button>
                        <button id="btnLimpar" class="btn btn-primary" type="reset">Limpar</button>
                    </div>
                </div>
           </div> 
      </form>

  </div>

  <script type="text/javascript" language="javascript" src="../JS/jquery-3.2.1.js"></script>
    <!-- Script para o menu-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script src="../JS/script.js"></script>
    <script src="../JS/ajax.js"></script>
</body>
</html>