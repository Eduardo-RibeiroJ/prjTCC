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

$objetivo->getCargo()->setNomeCargo($_GET['nomeCargo']);

$arrayVagas = $processoSeletivoDAO->ListarVaga($processoSeletivo, $objetivo);

?>

<div style="background-color:#c1ddf3">
  <div class="container">

    <form action="candidato_vagas.php" method="GET" class="form-signin" autocomplete="off">
      <div class="form-row">

        <div class="form-group col-12">
          <div class="input-group">
            <input class="form-control form-control-lg" name="nomeCargo" id="nomeCargo" type="text" placeholder="Pesquise pelo cargo desejado..." aria-describedby="btnPesquisar" />
            <div class="input-group-append">
              <button type="submit" class="btn btn-warning btn-lg" id="btnPesquisar"><i class="fas fa-search"></i></button>
            </div>

          </div>
          <div id="compList"></div>
        </div>
      </div>
    </form>
    <div class="row">
      <div class="col-12">
        <div class="btn-group float-right">
          <a href="candidato_vagas.php?nomeCargo=" class="btn btn-success btn-lg" aria-describedby="btnVoltar"><i class="fas fa-search"></i> Todas as vagas</a>
          <a href="candidato.php" class="btn btn-primary btn-lg" id="btnVoltar" name="btnVoltar">Voltar</a>
        </div>
      </div>
    </div>


    <?php if ($arrayVagas) : ?>
      <div class="row mb-3">
        <div class="col-12">
          <?php if ($objetivo->getCargo()->getNomeCargo() != '') : ?>
            <h4 class="mt-3">Vagas para <?= $objetivo->getCargo()->getNomeCargo() ?></h4>
          <?php else : ?>
            <h4 class="mt-3">Todas as vagas</h4>
          <?php endif; ?>

        </div>
      </div>

      <div class="d-flex flex-wrap justify-content-center mb-4">
        <?php foreach ($arrayVagas as $reg) : ?>
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
    <?php else : ?>

      <h4 class="mt-3">Sem resultados para <?= $objetivo->getCargo()->getNomeCargo() ?>.</h4>

    <?php endif; ?>


  </div>
</div>
<?php include 'footer.php'; ?>

<script>
  $(document).ready(function() {
    $('#nomeCargo').keyup(function() {
      var palavra = $(this).val();
      if (palavra != '') {
        $.post('../Controller/PesquisarCargo.php', {
          palavra: palavra
        }, function(lista) {
          $('#compList').fadeIn();
          $('#compList').html(lista);

        });
      } else {
        $('#compList').html('');
      }
    });
  });

  $(document).on('click', '.li-pesquisa', function() {
    $('#nomeCargo').val($(this).text());
    $('#compList').html('');
  })
</script>