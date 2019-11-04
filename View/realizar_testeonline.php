<?php
session_start();

include_once "../Model/Conexao.php";

include_once "../Model/ProcessoSeletivo.php";
include_once "../Model/TesteOnline.php";
include_once "../Model/Questao.php";
include_once "../Model/Cargo.php";

include_once "../Controller/ProcessoSeletivoDAO.php";
include_once "../Controller/TesteOnlineDAO.php";
include_once "../Controller/QuestaoDAO.php";
include_once "../Controller/CargoDAO.php";

$conn = new Conexao();

$processo = new ProcessoSeletivo();
$processoDAO = new ProcessoSeletivoDAO($conn);
$questao = new Questao();
$questaoDAO = new QuestaoDAO($conn);
$testeOnline = new TesteOnline();
$testeOnlineDAO = new TesteOnlineDAO($conn);

//Id pegado do POST
if(isset($_POST['btnRealizarTeste'])) {
  $_SESSION['dadosTeste'] = array('idProcesso' => $_POST['idProcesso'], 'idTesteOnline' => $_POST['idTeste'], 'idQuestao' => 1, 'resultado' => 0);
}
if(!(isset($_POST['btnAvancar'])) && !(isset($_POST['btnRealizarTeste']))) {
  header('Location: index.php');
}

$processo->setIdProcesso($_SESSION['dadosTeste']['idProcesso']);
$processoDAO->Listar($processo);

$testeOnline->setIdTesteOnline($_SESSION['dadosTeste']['idTesteOnline']);
$testeOnline->setCnpj($processo->getCnpj());

$testeOnlineDAO->Listar($testeOnline);

$questao->setCnpj($processo->getCnpj());
$questao->setIdTesteOnline($_SESSION['dadosTeste']['idTesteOnline']);

//VERIFICAR SE ACERTOU A ANTERIOR
if(isset($_POST['btnAvancar'])) {
  var_dump($_POST['Alt']);

  $questao->setIdQuestao($_SESSION['dadosTeste']['idQuestao']);
  $questaoDAO->Listar($questao);
  if($questao->getResposta() == $_POST['Alt']) {
    $_SESSION['dadosTeste']['resultado']++;
  }

  if($_SESSION['dadosTeste']['idQuestao'] == $testeOnline->getQuantidadeQuestoes()) {
    echo('DEU'. $_SESSION['dadosTeste']['resultado']);
  }

  $_SESSION['dadosTeste']['idQuestao']++;
}
$questao->setIdQuestao($_SESSION['dadosTeste']['idQuestao']);
$questaoDAO->Listar($questao);

?>

<?php include_once 'headerCand.php'; ?>

<section class="masthead" id="sectionRealizarTeste" style="background: url(imagem/90463.jpg); background-size: cover;">
    <div class="container">

        <div class="jumbotron p-3 p-md-5" style="background-color: #FFF">
            <div class="container p-0">
              <h5 class="display-5 display-md-2">Teste de <?= $testeOnline->getNomeTesteOnline() ?></h1>
              <hr>
              <form method="POST" action="realizar_testeonline.php">
                <div class="row">
                  <div class="col-12">
                    <p class="lead"><strong><?= $questao->getIdQuestao() ?> - <?= $questao->getQuestao() ?></strong></p>
                  </div>
                </div>
                <div class="form-group  ">
                
                  <div class="row">
                    <div class="col-12">
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="Alt" id="A" value="A">
                        <label for="A" class="lead form-check-label"><?= $questao->getAltA() ?></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="Alt" id="B" value="B">
                        <label for="B" class="lead form-check-label"><?= $questao->getAltB() ?></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="Alt" id="C" value="C">
                        <label for="C" class="lead form-check-label"><?= $questao->getAltC() ?></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="Alt" id="D" value="D">
                        <label for="D" class="lead form-check-label"><?= $questao->getAltD() ?></label>
                      </div>
                    </div>
                  </div>
                </div>
            
                <hr class="my-2 my-md-4">

                <div class="form-row">
                  <div class="col text-center">
                    <input type="submit" name="btnAvancar" id="btnAvancar" class="btn btn-warning btn-lg float-right" value="Avançar"/>
                  </div>
                </div>
              </form>
        </div>
    </div>
  </section>

<?php include 'footer.php'; ?>
