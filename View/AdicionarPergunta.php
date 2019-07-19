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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

        <!-- Navbar -->
        <!-- Navbar (sit on top) -->
        <!--<div class="w3-top">
                <div class="w3-bar w3-white w3-card" id="myNavbar">
                <a href="#home" class="w3-bar-item w3-button w3-wide">LOGO</a>
                <!- Right-sided navbar links -->
                <!--<div class="w3-right w3-hide-small">
                    <a href="#Nos" class="w3-bar-item w3-button">Sobre Nós</a>
                    <a href="#Servicos" class="w3-bar-item w3-button"> Serviços</a>
                    <a href="#Contato" class="w3-bar-item w3-button">Contato</a>
                    <a href="#TrabConsosco" class="w3-bar-item w3-button">Trabalhe conosco</a>
                    <a href="#Login" class="w3-bar-item w3-button">Login</a>
                </div>->

                <!-- Hide right-floated links on small screens and replace them with a menu icon -->
                <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
                    <i class="fa fa-bars"></i>
                </a>
                </div>
            </div>
            
            <!-- Sidebar on small screens when clicking the menu icon -->
            <nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
                <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
                <a href="#Nos" onclick="w3_close()" class="w3-bar-item w3-button">Sobre Nós</a>
                <a href="#Servicos" onclick="w3_close()" class="w3-bar-item w3-button">Serviços</a>
                <a href="#Contato" onclick="w3_close()" class="w3-bar-item w3-button">Contato</a>
                <a href="#TrabConsosco" onclick="w3_close()" class="w3-bar-item w3-button">Trabalhe conosco</a>
                <a href="#Login" onclick="w3_close()" class="w3-bar-item w3-button">Login</a>
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
                      <div class="input-group input-group-md">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Adicionar pergunta</span>
                            </div>
                            <div class="form-group">
                            <textarea name="Questao" class="form-control" id="Questao" rows="3"></textarea>
                        </div>
                      </div>
                      <br>
                      <div class="form-group col-md-2">
                            <label for="inputTempo">Tempo de resposta</label>
                            <input name="TempoQuestao" type="number" class="form-control" id="Tempo" value="30">
                      </div>

                      <div class="form-group col-md-2">
                            <label for="TipoResposta">Tipo de resposta</label>
                            <select name="TipoResposta" id="TipoResposta" class="form-control">
                              <option value="A" selected>Alternativa</option>
                              <option value="D">Dissertativa</option>
                            </select>
                          </div>
                      
                          <div class="form-group col-md-2">
                              <label for="inputResposta">Resposta</label>
                              <select name="Resposta" id="Resposta" class="form-control" placeholder="rsrs" tabindex="1">
                              <option value="A" selected>A</option>
                              <option value="B">B</option>
                              <option value="C">C</option>
                              <option value="D">D</option>
                            </select>
                         </div>

                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"> <div class="input-group">
                            <span class="input-group-addon">A)</span>
                            <input name="A" id="A" type="text" class="form-control" name="msg" placeholder="Adicionar questão">
                          </div></li>
                      <li class="list-group-item"> <div class="input-group">
                            <span class="input-group-addon">B)</span>
                            <input name="B" id="B" type="text" class="form-control" name="msg" placeholder="Adicionar questão">
                          </div></li>
                      <li class="list-group-item"> <div class="input-group">
                            <span class="input-group-addon">C)</span>
                            <input name="C" id="C" type="text" class="form-control" name="msg" placeholder="Adicionar questão">
                          </div></li>
                      <li class="list-group-item"> <div class="input-group">
                            <span class="input-group-addon">D)</span>
                            <input name="D" id="D" type="text" class="form-control" name="msg" placeholder="Adicionar questão">
                          </div></li>
                    </ul>
                    <div class="card-body">
                        <button name="Limpar" type="submit" class="btn btn-primary">Limpar</button>
                        <button name="Inserir" type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                  <div>
                    <button name="Finalizar" type="submit" class="btn btn-primary">Finalizar</button>
                </form>
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