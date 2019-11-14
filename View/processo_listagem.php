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
            <i class="fas fa-folder-open"></i> Processos Seletivos
          </div>

          <div class="card-body">
            <div class="card-text">
            <?php if($arrayProcessos): ?>
              
              <?php foreach($arrayProcessos as $reg): ?>
                <form method="POST" action="processo_listagem_candidato.php">
                  <div class="row">
                    <div class="col-12">
                      <input type="hidden" id="txtIdProcesso" name="txtIdProcesso" value="<?= $reg->getidProcesso() ?>" />

                      <?php if(strtotime(date("d-m-Y")) > strtotime(str_replace("/", "-", $reg->getDataLimiteCandidatar()))): ?>
                        <p class="lead d-inline text-muted">Vaga para <strong><?= $reg->getCargo()->getNomeCargo(); ?></strong>, <span class="text-danger">inscrições encerradas.</p>
                        <button type="submit" id="btnVisualizarCandidatos" name="btnVisualizarCandidatos" class="btn bnt-sm btn-outline-dark float-right text-muted mb-1"><i class='fas fa-search'></i></button>
                      <?php else: ?>
                        <p class="lead d-inline">Vaga para <strong><?= $reg->getCargo()->getNomeCargo(); ?></strong>, inscrições encerram em <?= $reg->getDataLimiteCandidatar(); ?>.</p>
                        <button type="submit" id="btnVisualizarCandidatos" name="btnVisualizarCandidatos" class="btn bnt-sm btn-outline-dark float-right mb-1"><i class='fas fa-search'></i></button>
                      <?php endif; ?>
                    </div>
                  </div>
                </form>
                <hr>

              <?php endforeach; ?>
            <?php else: ?>
              <p class="lead">Não há processos seletivos.</p>
            <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>