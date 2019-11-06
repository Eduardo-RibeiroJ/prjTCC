<?php
session_start();

include_once "../Model/Conexao.php";

include_once "../Model/ProcessoSeletivo.php";
include_once "../Model/ProcessoCandTeste.php";
include_once "../Model/TesteOnline.php";
include_once "../Model/Questao.php";
include_once "../Model/Cargo.php";

include_once "../Controller/ProcessoSeletivoDAO.php";
include_once "../Controller/ProcessoCandTesteDAO.php";
include_once "../Controller/TesteOnlineDAO.php";
include_once "../Controller/QuestaoDAO.php";
include_once "../Controller/CargoDAO.php";

$conn = new Conexao();

$processo = new ProcessoSeletivo();
$processoDAO = new ProcessoSeletivoDAO($conn);
$processoCandTeste = new ProcessoCandTeste();
$processoCandTesteDAO = new ProcessoCandTesteDAO($conn);
$questao = new Questao();
$questaoDAO = new QuestaoDAO($conn);
$testeOnline = new TesteOnline();
$testeOnlineDAO = new TesteOnlineDAO($conn);

//Id pegado do POST

$processo->setIdProcesso($_SESSION['dadosTeste']['idProcesso']);
$processoDAO->Listar($processo);

$testeOnline->setIdTesteOnline($_SESSION['dadosTeste']['idTesteOnline']);
$testeOnline->setCnpj($processo->getCnpj());

$testeOnlineDAO->Listar($testeOnline);

$questao->setCnpj($processo->getCnpj());
$questao->setIdTesteOnline($_SESSION['dadosTeste']['idTesteOnline']);

$processoCandTeste->inserirProcCandTeste(
  $processo->getIdProcesso(),
  $_SESSION['cpf'],
  $testeOnline->getIdTesteOnline(),
  $_SESSION['dadosTeste']['resultado']
);
$processoCandTesteDAO->Inserir($processoCandTeste);

if(intval($_SESSION['dadosTeste']['resultado']) != 0) {
  $acertos = intval($testeOnline->getQuantidadeQuestoes()) / intval($_SESSION['dadosTeste']['resultado']);
} else {
  $acertos = 2;
}

unset($_SESSION['dadosTeste']);

if ($acertos >= 2) {
  $resultado = 'regular';
}
else if ($acertos >= 1.66) {
  $resultado = 'bom';
}
else if ($acertos > 1) {
  $resultado = 'ótimo';
}
else if($acertos == 1) {
  $resultado = 'excelente';
}

?>

<?php include_once 'headerCand.php'; ?>

<section class="masthead" id="sectionConcluirTeste" style="background: url(imagem/90463.jpg); background-size: cover;">
    <div class="container">

        <div class="jumbotron p-3 p-md-5" style="background-color: #FFF">
            <div class="container p-0">
              <h5 class="display-4 display-md-2">Teste de <?= $testeOnline->getNomeTesteOnline() ?> realizado!</h1>
              <p class="lead">Realize todos os testes e responda todas as perguntas para efetivar sua candidatura no processo seletivo.</p>
              <hr>
              
              <p class="lead"><strong>Você teve um <?= $resultado ?> desempenho.</strong></p>
        </div>
        <hr class="my-2 my-md-4">

        <div class="form-row">
          <div class="col text-center">
            <a href="processo_seletivo_candidatar-<?= $processo->getIdProcesso() ?>" name="btnVoltar" id="btnVoltar" class="btn btn-warning btn-lg float-right">Retornar</a>
          </div>
        </div>
    </div>
  </section>

<?php include 'footer.php'; ?>
