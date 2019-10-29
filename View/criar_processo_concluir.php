<?php
session_start();

include_once "../Model/ProcessoSeletivo.php";

$processo = new ProcessoSeletivo();

$dadosProcesso = unserialize($_SESSION['processo_etapa1']);
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
                <p class="lead">O processo seletivo estará aberto entre <?= $dadosProcesso->getDataInicio(); ?> a <?= $dadosProcesso->getDataLimiteCandidatar(); ?></p>
                <p class="lead">Vaga para <?= $dadosProcesso->getIdCargo(); ?> nível <?= $dadosProcesso->getNivelCargo(); ?></p>

                <h4>Segue link do processo seletivo: <a href="#">www.site/processoseletivo/4684844</a> <button class="btn btn-outline-dark ml-2" id="brnCopiar"><i class="far fa-copy"></i> Copiar</button></h4>
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
