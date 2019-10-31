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

<section class="masthead" id="sectionProcesso1" style="background: url(imagem/90463.jpg); background-size: cover;">
    <div class="container">

        <div class="jumbotron p-3 p-md-5" style="background-color: #FFF">
            <div class="container p-0">
                <h5 class="display-4 display-md-2">Aberto novo processo seletivo!</h1>
                <p class="lead">O processo seletivo não poderá ser modificado, apenas cancelado.</p>
                
                <hr class="my-2 my-md-4">
                <p class="lead">O processo seletivo estará aberto entre <?= $processo->getDataInicio(); ?> a <?= $processo->getDataLimiteCandidatar(); ?></p>
                <p class="lead">Vaga para <?= $processo->getCargo()->getNomeCargo(); ?></p>

                <h4 class="mt-4">Segue link do processo seletivo: <a href="processo_seletivo.php?id=<?= $processo->getIdProcesso(); ?>">www.site.com.br/processo_seletivo/<?= $processo->getIdProcesso(); ?></a> <button class="btn btn-outline-dark ml-2" id="brnCopiar"><i class="far fa-copy"></i> Copiar</button></h4>
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
