<?php
session_start();

include_once "../Model/Conexao.php";
include_once "../Model/ProcessoSeletivo.php";
include_once "../Controller/ProcessoSeletivoDAO.php";
include_once "../Model/Cargo.php";
include_once "../Controller/CargoDAO.php";

$conn = new Conexao();

$processo = new ProcessoSeletivo();
$processoDAO = new ProcessoSeletivoDAO($conn);

$dadosProcesso = unserialize($_SESSION['processo_etapa1']);

$processo->setIdProcesso($dadosProcesso->getIdProcesso());
$processoDAO->Listar($processo);

unset($_SESSION['processo_etapa1']);

?>

<?php include_once 'headerRecrut.php'; ?>

<section class="masthead" id="sectionProcessoConcluir" style="background-image: linear-gradient(to right, rgba(188, 216, 238, 1), rgba(145,184,217,1));">
  <div class="container">

    <div class="jumbotron p-3 p-md-5" style="background-color: #FFF">
      <div class="container p-0">
        <h5 class="display-4 display-md-2">Aberto novo processo seletivo!</h1>
          <p class="lead mb-0">O processo seletivo não poderá ser modificado, apenas cancelado.</p>

          <hr class="my-2 my-md-4">
          <p class="lead"><strong>Vaga para <?= $processo->getCargo()->getNomeCargo(); ?></strong></p>
          <p class="lead mb-0">O processo seletivo estará aberto entre <strong><?= $processo->getDataInicio(); ?> a <?= $processo->getDataLimiteCandidatar(); ?></strong></p>
          <p class="lead text-muted">Atenção - O processo seletivo pode ser encerrado antes do prazo estimado.</p>

          <h4 class="mt-4">Segue link do processo seletivo: <a href="processo_seletivo-<?= $processo->getIdProcesso(); ?>">localhost/processo_seletivo-<?= $processo->getIdProcesso(); ?></a> <button class="btn btn-outline-dark ml-2" id="btnCopiar"><i class="far fa-copy"></i> Copiar</button></h4>
          <input type="hidden" id="txtLinkCopiar" value="localhost/processo_seletivo-<?= $processo->getIdProcesso(); ?>">
      </div>
      <hr class="my-2 my-md-4">

      <div class="form-row">
        <div class="col text-center">
          <a href="recrutador.php" class="btn btn-primary btn-lg float-right">Retornar</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>