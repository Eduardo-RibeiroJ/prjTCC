<?php
session_start();

//Define o fuso horário
date_default_timezone_set('America/Sao_Paulo');

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
  <div class="container" id="div-processo-listagem">
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
                      <input type="hidden" id="txtIdProcesso" name="txtIdProcesso" value="<?= $reg->getIdProcesso() ?>" />

                      <?php if(strtotime(date("d-m-Y")) > strtotime(str_replace("/", "-", $reg->getDataLimiteCandidatar()))): ?>
                        <p class="lead d-inline text-muted">Vaga para <strong><?= $reg->getCargo()->getNomeCargo(); ?></strong>, <span class="text-danger">inscrições encerradas.</p>
                        <button type="submit" id="btnVisualizarCandidatos" name="btnVisualizarCandidatos" class="btn bnt-sm btn-outline-dark float-right mb-1"><i class='fas fa-search'></i></button>
                      <?php else: ?>
                        <p class="lead d-inline">Vaga para <strong><?= $reg->getCargo()->getNomeCargo(); ?></strong>, inscrições encerram em <?= $reg->getDataLimiteCandidatar(); ?>.</p>
                        <button type="submit" id="btnVisualizarCandidatos" name="btnVisualizarCandidatos" class="btn bnt-sm btn-outline-dark float-right mb-1"><i class='fas fa-search'></i></button>
                        <button id="btnEncerrarProcesso" name="btnEncerrarProcesso" value="<?= $reg->getIdProcesso() ?>" class="btn bnt-sm btn-outline-danger float-right mb-1 mr-2"><i class='fas fa-times'></i></button>
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

        <div class="row">
          <div class="col-12 text-right mt-2">
            <a href="recrutador.php" class="btn btn-warning" id="btnVoltar" name="btnVoltar">Voltar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>