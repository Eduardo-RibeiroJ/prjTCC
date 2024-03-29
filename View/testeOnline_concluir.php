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

if (intval($_SESSION['dadosTeste']['resultado']) != 0) {
  $acertos = intval($testeOnline->getQuantidadeQuestoes()) / intval($_SESSION['dadosTeste']['resultado']);
} else {
  $acertos = 2;
}

unset($_SESSION['dadosTeste']);

?>

<?php include_once 'headerCand.php'; ?>

<section class="masthead" id="sectionConcluirTeste" style="background-image: linear-gradient(to left, rgba(188, 216, 238, 1), rgba(145,184,217,1));">
  <div class="container">

    <div class="jumbotron p-3 p-md-5" style="background-color: #FFF">
      <div class="container p-0">
        <h5 class="display-4 display-md-2">Teste de <?= $testeOnline->getNomeTesteOnline() ?> realizado!</h1>
          <p class="lead">Realize todos os testes e responda todas as perguntas para efetivar sua candidatura no processo seletivo.</p>
          <hr>

      </div>

      <form method="POST" action="processo_seletivo_testes.php">
        <div class="form-row">
          <div class="col text-center">
            <input type="hidden" name="txtIdProcesso" value="<?= $processo->getIdProcesso() ?>">
            <input type="submit" name="btnVoltar" id="btnVoltar" class="btn btn-warning btn-lg float-right" value="Retornar" />
          </div>
        </div>
      </form>
    </div>
</section>

<?php include 'footer.php'; ?>