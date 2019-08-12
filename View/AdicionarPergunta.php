<?php

include_once "../Model/Conexao.php";
include_once "../Model/TesteOnline.php";
include_once "../Model/TestePergunta.php";
include_once "../Controller/TestePerguntaDAO.php";
include_once "../Controller/TestePerguntaDAO.php";

if (isset($_POST['Adicionar'])) { //Dados que vem da pagina anterior (Só vai entrar aqui pela primeira vez)
  $numQuestao = 1; //Inicia com 1
}

$nomeQuestionario = $_POST['NomeQuestionario']; //Para sempre atualizar com o mesmo nome do questionario que foi pego na pagina anterior
$numQuestionario = $_POST['NumeroQuestionario'];

if (isset($_POST['Inserir'])) {

  $con = new Conexao();
  $classeTestePergunta = new TestePergunta();
  $classeTesteOnline = new TesteOnline();

  $classeTestePergunta->inserirPergunta(
    $_POST['NumeroQuestionario'],
    $_POST['NumeroQuestao'],
    $_POST['Questao'],
    $_POST['A'],
    $_POST['B'],
    $_POST['C'],
    $_POST['D'],
    $_POST['Resposta'],
    $_POST['TempoQuestao']
  );

  $classeTesteOnline->addQuestao($classeTestePergunta);


  $numQuestao = $_POST['NumeroQuestao'] + 1;

  /*$testePerguntaDAO = new TestePerguntaDAO($con);
  $testePerguntaDAO->Inserir($classeTestePergunta);*/
  echo "<script> alert('Questão cadastrada!'); </script>";
}

if (isset($_POST['Finalizar'])) {

  echo "<script> alert('Entrou2222'); </script>";

}

#

  //echo "$_GET['NomeQuestionario']";
  /*$cn = new Conexao();
  $cp = new Produto();

  $cp->inserirProduto(
    $_POST['txtNomeProduto'],
    $_POST['ckbPersonalizado'] = (isset($_POST['ckbPersonalizado'])) ? 1 : 0,
    $_POST['cbbCor'],
    $_POST['txtObs'],
    $_POST['txtQuantidadeTotal']
  );

  $pc = new ProdutoController($cn);
  $pc->Inserir($cp);
  echo "<script> alert('Produto cadastrado!'); window.location.replace('produto_listar.php'); </script>";*/

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

    <style type="text/css">

    .w3-bar .w3-button {
    padding: 16px;
    }

    #b{
        height: 120px;
        padding: 80px 100px 80px 30px;
    }

    </style>

    <body>

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

        <div id="b" class="row">
            <!---Título-->
            <h2><strong>Questionário</strong></h2>
        </div>

        <div class="row">

            <div class="card" style="width: 136rem;">
                  <form method="POST" action="AdicionarPergunta.php">
                    <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"><?= $numQuestionario ?> - Questionário: <?= $nomeQuestionario ?> </label>
                                <input name="NomeQuestionario" type="hidden" value="<?= $nomeQuestionario ?>"/>
                                <input name="NumeroQuestionario" type="hidden" value="<?= $numQuestionario ?>"/>
                            </div>
                            <br>
                      <h3 class="card-title">Questão <?= $numQuestao ?></h3>
                      <input name="NumeroQuestao" type="hidden" value="<?= $numQuestao ?>"/>
                      <div class="input-group-md">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Adicionar pergunta</span>
                            </div>
                            <div class="form-group">
                            <textarea name="Questao" class="form-control" id="Questao" rows="3"></textarea>
                        </div>
                      </div>
                      <br>
                      <div class="form-row">
                  <div class="form-group col-md-2">
                        <label for="inputTempo">Tempo de resposta</label>
                        <input type="number" class="form-control" id="Tempo" value="30">
                  </div>

                  <div class="form-group col-md-2">
                        <label for="TipoResposta">Tipo de resposta</label>
                        <select id="TipoResposta" class="form-control">
                          <option value="A" selected>Alternativa</option>
                          <option value="D">Dissertativa</option>
                        </select>
                      </div>
                  
                      <div class="form-group col-md-2">
                          <label for="inputResposta">Resposta</label>
                          <select id="Resposta" class="form-control" placeholder="rsrs" tabindex="1">
                          <option value="A" selected>A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                        </select>
                     </div>
                  </div>
                </div>

                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                      <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupPrepend1">A)</span>
                          <input id="A" type="text" class="form-control" name="msg" placeholder="Adicionar questão">
                        </div>        
                      </li>
                    <li class="list-group-item">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend2">B)</span>
                        <input id="B" type="text" class="form-control" name="msg" placeholder="Adicionar questão">
                      </li>
                    <li class="list-group-item">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend3">C)</span>
                        <input id="C" type="text" class="form-control" name="msg" placeholder="Adicionar questão">
                      </li>
                    <li class="list-group-item">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend4">D)</span>
                        <input id="D" type="text" class="form-control" name="msg" placeholder="Adicionar questão">
                      </li> 
                </ul>

                    <div class="card-body">
                        <button name="Limpar" type="submit" class="btn btn-primary">Limpar</button>
                        <button name="Inserir" type="submit" class="btn btn-primary">Adicionar</button>
                        <button name="Finalizar" type="submit" class="btn btn-primary">Finalizar</button>
                    </div>
                </div>
           </div> 
      </form>

  </div>


    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="../JS/script.js"></script>

</body>
</html>