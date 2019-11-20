<?php

include_once 'headerCand.php';

include_once "../Model/Conexao.php";
include_once "../Model/Candidato.php";
include_once "../Model/ProcessoSeletivo.php";
include_once "../Model/CandidatoProcesso.php";
include_once "../Model/Cargo.php";
include_once "../Model/Recrutador.php";

include_once "../Controller/CandidatoDAO.php";
include_once "../Controller/ProcessoSeletivoDAO.php";
include_once "../Controller/CandidatoProcessoDAO.php";
include_once "../Controller/CargoDAO.php";
include_once "../Controller/RecrutadorDAO.php";

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

<div style="background-image: linear-gradient(to left, rgba(188, 216, 238, 1), rgba(145,184,217,1));">
  <div class="container">

  <?php if($arrayProcessos): ?>


    <?php foreach ($arrayProcessos as $reg) : ?>
      <div class="card-header" style="background-color:#FFFF">
        <h5 class="mt-2">Minhas vagas</h5>
      </div>
      <form method="POST" action="processo_seletivo_testes.php">

        <!--<div class="media text-muted pt-3">
            <div class="media-body pb-3 mb-0 border-bottom">
              <div class="d-flex justify-content-between align-items-center">
                <input type="hidden" id="txtIdProcesso" name="txtIdProcesso" value="<?= $reg->getidProcesso() ?>" />
                <p class="lead p-0">Vaga para <strong><?= $reg->getCargo()->getNomeCargo(); ?></strong></p>
                <button type="submit" id="btnVisualizarProcesso" name="btnVisualizarProcesso" class="btn bnt-sm btn-outline-dark float-right mb-1"><i class='fas fa-search'></i></button>
              </div>
              <h6><strong>Contratação:</strong> <?= $reg->getTipoContratacao(); ?></h6>
              <h6><strong>Salário: </strong><?= $reg->getSalario(); ?></h6>
            </div>
          </div>
        </form>-->

        <?php
          $recrutador = new Recrutador();
          $recrutadorDAO = new RecrutadorDAO($conn);

          $recrutador->setCnpj($reg->getCnpj());
          $recrutadorDAO->Listar($recrutador);

        ?>

        <div class="list-group">
          <input type="hidden" id="txtIdProcesso" name="txtIdProcesso" value="<?= $reg->getidProcesso() ?>" />
          <a href="#" class="list-group-item list-group-item-action border-top-0 border-bottom-1 border-right-0 border-left-0">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-0">Vaga para <strong><?= $reg->getCargo()->getNomeCargo(); ?></strong></h5>
              <button type="submit" id="btnVisualizarProcesso" name="btnVisualizarProcesso" class="btn bnt-sm btn-outline-dark float-right mb-1"><i class='fas fa-search'></i></button>
            </div>
            <p class="text-muted mb-0">Empresa <?= $recrutador->getNomeEmpresa() ?>, região de <?= $recrutador->getCidade() ?>.</p>
            <p class="mb-0"><strong>Contratação:</strong> <?= $reg->getTipoContratacao(); ?></p>

            <?php if ($reg->getSalario() != 0) : ?>
              <p class="mb-1"><strong>Salário: </strong><?= $reg->getSalario(); ?></p>
            <?php else : ?>
              <p class="mb-1"><strong>Salário: </strong> A combinar</p>
            <?php endif; ?>

          </a>
        </div>
      <?php endforeach; ?>
    <?php else: ?>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="lead">Você não se candidatou para nenhum processo seletivo, não perca tempo e veja todas as vagas!</h4>
            <a href="candidato_vagas.php?nomeCargo=" class="btn btn-primary mt-3 float-right"><i class="fas fa-search"></i> Visualizar Todas</a>
          </div>
        </div>
      </div>
    </div>
    
    <?php endif; ?>
  

  </div>
</div>

<?php include 'footer.php'; ?>