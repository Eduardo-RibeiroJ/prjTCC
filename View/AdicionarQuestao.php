<?php

//Dados que vem da pagina anterior (Só vai entrar aqui pela primeira vez)
$numQuestionario = 484; //Inicia com 1
$nomeQuestionario = "carai";
$numQuestao = 1;
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
    <script type="text/javascript" language="javascript" src="../JS/jquery-3.2.1.js"></script>
    <script src="../JS/script.js"></script>
    <script src="../JS/ajax.js"></script>

</head>

    <body>

    <header>
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
    </header>

    <!------------------------------------ Conteudo--------------------------------------------------------------->

    <div class="container-fluid">

        <div id="titulo" class="row">
            <!---Título-->
            <h2><strong>Questionário</strong></h2>
        </div>

        <div class="row">

            <div class="card" style="width: 136rem;">
                  <form>
                    <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"><?= $numQuestionario ?> - Questionário: <?= $nomeQuestionario ?> </label>
                                <input name="numQuestionario" id="numQuestionario" type="hidden" value="<?= $numQuestionario ?>"/>
                            </div>
                            <br>
                      <h3 class="card-title" id="teste">Questão <?= $numQuestao ?></h3>
                      <input name="numQuestao" id="numQuestao" type="hidden" value="<?= $numQuestao ?>"/>
                      <div class="input-group-md">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Adicionar questão</span>
                            </div>
                            <div class="form-group">
                              <textarea name="questao" id="questao" class="form-control" rows="3"></textarea>
                            </div>
                      </div>
                      <br>
                      <div class="form-row">
                  <div class="form-group col-md-2">
                        <label for="tempo">Tempo de resposta</label>
                        <input type="number" class="form-control" id="tempo" name="tempo" value="30">
                  </div>
                  
                      <div class="form-group col-md-2">
                          <label for="inputResposta">Resposta</label>
                          <select id="resposta" name="resposta" class="form-control" placeholder="rsrs" tabindex="1">
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
                          <input id="a" type="text" class="form-control" name="a" placeholder="Adicionar questão">
                        </div>        
                      </li>
                    <li class="list-group-item">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend2">B)</span>
                        <input id="b" type="text" class="form-control" name="b" placeholder="Adicionar questão">
                      </li>
                    <li class="list-group-item">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend3">C)</span>
                        <input id="c" type="text" class="form-control" name="c" placeholder="Adicionar questão">
                      </li>
                    <li class="list-group-item">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend4">D)</span>
                        <input id="d" type="text" class="form-control" name="d" placeholder="Adicionar questão">
                      </li> 
                </ul>

                    <div class="card-body">
                        <button id="btnAdicionar">Adicionar</button>
                    </div>
                </div>
           </div> 
      </form>

  </div>
</body>
</html>