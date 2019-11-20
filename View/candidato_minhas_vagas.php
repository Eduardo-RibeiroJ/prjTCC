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

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              Minhas vagas
            </div>
            <div class="card-body">
              <?php foreach ($arrayProcessos as $reg) : ?>

                <?php
                  $recrutador = new Recrutador();
                  $recrutadorDAO = new RecrutadorDAO($conn);

                  $recrutador->setCnpj($reg->getCnpj());
                  $recrutadorDAO->Listar($recrutador);

                ?>

                <div class="list-group">
                  <form method="POST" action="processo_seletivo_testes.php">
                    <input type="hidden" id="txtIdProcesso" name="txtIdProcesso" value="<?= $reg->getidProcesso() ?>" />
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-0">Vaga para <strong><?= $reg->getCargo()->getNomeCargo(); ?></strong></h5>
  
                    </div>
                    <p class="text-muted mb-0">Empresa <?= $recrutador->getNomeEmpresa() ?>, região de <?= $recrutador->getCidade() ?>.</p>
                    <p class="mb-0"><strong>Contratação:</strong> <?= $reg->getTipoContratacao(); ?></p>

                    <?php if ($reg->getSalario() != 0) : ?>
                      <p class="mb-1"><strong>Salário: </strong>R$ <?= $reg->getSalario(); ?></p>
                    <?php else : ?>
                      <p class="mb-1"><strong>Salário: </strong> A combinar</p>
                    <?php endif; ?>

                    
                    <div class="row">
                      <div class="col-12">
                        <?php if(strtotime(date("d-m-Y")) <= strtotime(str_replace("/", "-", $reg->getDataLimiteCandidatar()))): ?>
                          <p class="text-muted">Encerra em <strong><?= $reg->getDataLimiteCandidatar(); ?></strong>.
                          <button type="submit" id="btnVisualizarProcesso" name="btnVisualizarProcesso" class="btn bnt-sm btn-primary float-right"><i class='fas fa-search'></i> Visualizar</button>
                        <?php else: ?>
                          <p class="text-muted">Encerrada, boa sorte! <i class="far fa-thumbs-up"></i></p>
                        <?php endif; ?>
                      </div>
                    </div>
                        
                    <hr>
                    </form>
                </div>

              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
        
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