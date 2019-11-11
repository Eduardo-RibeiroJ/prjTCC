<?php

include_once 'headerCand.php';

include_once "../Model/Conexao.php";
include_once "../Model/Candidato.php";
include_once "../Model/ProcessoSeletivo.php";
include_once "../Model/CandidatoProcesso.php";
include_once "../Model/Cargo.php";
include_once "../Model/CandidatoObjetivo.php";

include_once "../Controller/CandidatoDAO.php";
include_once "../Controller/ProcessoSeletivoDAO.php";
include_once "../Controller/CandidatoProcessoDAO.php";
include_once "../Controller/CargoDAO.php";
include_once "../Controller/CandidatoObjetivoDAO.php";

$conn = new Conexao();

$candidato = new Candidato();
$candidatoDAO = new CandidatoDAO($conn);

$cargo = new Cargo();
$cargoDAO = new CargoDAO($conn);

$processoSeletivo = new ProcessoSeletivo();
$processoSeletivoDAO = new ProcessoSeletivoDAO($conn);

$objetivo = new CandidatoObjetivo();
$objetivoDAO = new CandidatoObjetivoDAO($conn);

$candidato->setCpf($_SESSION['cpf']);
$candidatoDAO->Listar($candidato);

$objetivo->setCpf($_SESSION['cpf']);
$objetivo = $objetivoDAO->Listar($objetivo);

$arrayVagas = $processoSeletivoDAO->ListarVaga($processoSeletivo, $objetivo);

?>

<div style="background: url(imagem/80124.jpg); background-size: cover;">
  <div class="container">

    <form class="form-signin">
      <div class="form-row">

        <div class="form-group col">
          <div class="input-group">
            <input class="form-control form-control-lg" type="text" placeholder="Pesquise pelo cargo desejado..." />
            <div class="input-group-btn">
              <button class="btn btn-warning btn-lg ml-2" id="btnPesquisar"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
    </form>

    <div class="d-flex flex-wrap justify-content-center">

      <?php foreach ($arrayVagas as $reg) : ?>
        <input type="hidden" id="txtIdProcesso" name="txtIdProcesso" value="<?= $reg->getidProcesso() ?>" />
        <div class="form-group col-lg-6">
          <div class="card text-center">
            <div class="card-body p-3">
              <h5 class="card-title mb-0"><?= $reg->getCargo()->getNomeCargo(); ?></h5>
              <p class="card-text mb-0"> O processo encerra em <?= $reg->getDataLimiteCandidatar(); ?></p>
              <a href="processo_seletivo-<?= $reg->getidProcesso() ?>" class="btn btn-primary btn-md mb-0" id="btnVisualizarProcesso"><i class="fas fa-search"></i></a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div><!-- d-flex flex-wrap justify-content-center-->

  </div>
</div>
<?php include 'footer.php'; ?>