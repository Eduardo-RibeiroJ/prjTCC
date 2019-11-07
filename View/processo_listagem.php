<?php
session_start();

include_once "../Model/Conexao.php";

include_once "../Model/ProcessoSeletivo.php";
include_once "../Model/Cargo.php";
include_once "../Controller/ProcessoSeletivoDAO.php";
include_once "../Controller/CargoDAO.php";

$conn = new Conexao();
$processo = new ProcessoSeletivo();
$processoDAO = new ProcessoSeletivoDAO($conn);
$cargo = new Cargo();
$cargoDAO = new CargoDAO($conn);

$processo->setCnpj($_SESSION['cnpj']);
$arrayProcessos = $processoDAO->Listar($processo);

include_once 'headerRecrut.php';
?>

<div style="background: url(imagem/17209.jpg); background-size: cover;">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <i class="fas fa-folder-open"></i> Processos Seletivos em Andamento
          </div>

          <div class="card-body">
            <div class="card-text">
            <?php if($arrayProcessos): ?>
              
              <?php foreach($arrayProcessos as $reg): ?>
                <form method="POST" action="processo_listagem_candidatos.php">
                  <div class="row">
                    <div class="col-12">
                      <input type="hidden" id="txtIdProcesso" name="txtIdProcesso" value="<?= $reg->getidProcesso() ?>" />

                      <p class="lead d-inline">Vaga para <strong><?= $reg->getCargo()->getNomeCargo(); ?></strong>, encerra em <?= $reg->getDataLimiteCandidatar(); ?>.</p>
                      <button type="submit" id="btnVisualizarCandidatos" name="btnVisualizarCandidatos" class="btn bnt-sm btn-outline-dark float-right mb-1"><i class='fas fa-search'></i></button>
                    </div>
                  </div>
                </form>

              <?php endforeach; ?>
            <?php else: ?>
              <p class="lead">Não há processos seletivos em andamento.</p>
            <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-header">
            <i class="fas fa-archive"></i> Processos Seletivos encerrados
          </div>

          <div class="card-body">
            <div class="card-text">
            <?php if($arrayProcessos): ?>
              
              <?php foreach($arrayProcessos as $reg): ?>
                <form method="POST" action="processo_listagem_candidatos.php">
                  <div class="row">
                    <div class="col-12">
                      <input type="hidden" id="txtIdProcesso" name="txtIdProcesso" value="<?= $reg->getidProcesso() ?>" />

                      <p class="lead d-inline">Vaga para <strong><?= $reg->getCargo()->getNomeCargo(); ?></strong>, encerra em <?= $reg->getDataLimiteCandidatar(); ?>.</p>
                      <button type="submit" id="btnVisualizarCandidatos" name="btnVisualizarCandidatos" class="btn bnt-sm btn-outline-dark float-right mb-1"><i class='fas fa-search'></i></button>
                    </div>
                  </div>
                </form>

              <?php endforeach; ?>
            <?php else: ?>
              <p class="lead">Não há processos seletivos encerrados.</p>
            <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>