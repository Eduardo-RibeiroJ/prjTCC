<?php

include_once 'headerCand.php';

include_once "../Model/Conexao.php";
include_once "../Model/Candidato.php";
include_once "../Model/ProcessoSeletivo.php";
include_once "../Model/CandidatoProcesso.php";
include_once "../Model/Cargo.php";

include_once "../Controller/CandidatoDAO.php";
include_once "../Controller/ProcessoSeletivoDAO.php";
include_once "../Controller/CandidatoProcessoDAO.php";
include_once "../Controller/CargoDAO.php";

$conn = new Conexao();

$conn = new Conexao();
$candidato = new Candidato();
$candidatoDAO = new CandidatoDAO($conn);

$candidatoProcesso = new CandidatoProcesso();
$candidatoProcessoDAO = new CandidatoProcessoDAO($conn);

$processoSeletivo = new ProcessoSeletivo();
$processoSeletivoDAO = new ProcessoSeletivoDAO($conn);

$candidato->setCpf($_SESSION['cpf']);
$candidatoDAO->Listar($candidato);

$candidatoProcesso->setCpf($_SESSION['cpf']);
$arrayProcessos = $candidatoProcessoDAO->Listar($candidatoProcesso);


?>

<div style="background: url(imagem/80124.jpg); background-size: cover;">
  <div class="container">

    <div class="jumbotron p-3 p-md-5" style="background-color: #FFF">
      <div class="container p-0">
        <h5 class="display-4 display-md-1">Vagas em que se candidatou</h1>
          <hr class="my-2 my-md-3">
          <p class="lead">Acompanhe os processos seletivos em que você está participando</p>

      </div>
    </div>

    <?php foreach ($arrayProcessos as $reg) : ?>
      <form method="POST" action="processo_seletivo_testes.php">

        <div class="my-3 p-3 bg-white rounded shadow-sm">
          <h6 class="border-bottom border-gray pb-2 mb-0">Candidaturas recentes</h6>
          <div class="media text-muted pt-3">
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <p class="lead d-inline p-0">Vaga para <strong><?= $reg->getCargo()->getNomeCargo(); ?></strong></p>
                <button type="submit" id="btnVisualizarProcesso" name="btnVisualizarProcesso" class="btn bnt-sm btn-outline-dark float-right mb-1"><i class='fas fa-search'></i></button>
              </div>
              <h6><strong>Contratação:</strong> <?= $reg->getTipoContratacao(); ?></h6>
              <h6><strong>Salário: </strong><?= $reg->getSalario(); ?></h6>
            </div>
          </div>
          <small class="d-block text-right mt-3">
            <a href="#">subir</a>
          </small>
        </div>
  </div>
  </form>
<?php endforeach; ?>


</div>
</div>
<?php include 'footer.php'; ?>