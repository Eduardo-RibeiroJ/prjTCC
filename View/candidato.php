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

$candidatoProcesso = new CandidatoProcesso();
$candidatoProcessoDAO = new CandidatoProcessoDAO($conn);

$processoSeletivo = new ProcessoSeletivo();
$processoSeletivoDAO = new ProcessoSeletivoDAO($conn);

$objetivo = new CandidatoObjetivo();
$objetivoDAO = new CandidatoObjetivoDAO($conn);

$candidato->setCpf($_SESSION['cpf']);
$candidatoDAO->Listar($candidato);

$candidatoProcesso->setCpf($_SESSION['cpf']);
$arrayProcessos = $candidatoProcessoDAO->Listar($candidatoProcesso);

$objetivo->setCpf($_SESSION['cpf']);
$objetivo = $objetivoDAO->Listar($objetivo);

$arrayVagas = $processoSeletivoDAO->ListarVaga($processoSeletivo, $objetivo);

?>

<!-- Masthead -->
<!-- <header class="masthead text-white text-left" id="home" style="background: url(imagem/90463.jpg); background-size: cover;">
        <div class="overlay"></div>
    
    </header> -->

<div style="background: url(imagem/17209.jpg); background-size: cover;">
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

    <div class="row">
      <div class="col-lg-6">

        <div class="card my-2">
          <div class="card-header">
            <i class="fas fa-user-tie"></i> Perfil
          </div>

          <div class="card-body">
            <div class="card-text">
              <h5>
                <?= $candidato->getNome() ?> <?= $candidato->getSobrenome() ?>
                <img class="img-profile rounded-circle d-none d-md-inline float-right" style="width: 4em; height: 4em;" src="https://www.letradamusica.net/fotos/k/kasino/fotos/kasino-8.jpg">
              </h5>

              <p class="mb-0"><?= $candidato->getIdade() ?> anos</p>
              <p class="mb-0"><?= $candidato->getEmail() ?></p>
              <p class="mb-0">Telefone: <?= $candidato->getTel1() ?></p>
              <?php $tel2 = $candidato->getTel2() == "" ? '' : 'Celular: ' . $candidato->getTel2();
              echo $tel2 ?>
              <a href="candidato_perfil.php" class="btn btn-sm btn-primary mt-2 float-right">Visualizar Perfil</a>
            </div>
          </div>
        </div>

        <div class="card my-2">
          <div class="card-header">
            <i class="far fa-handshake"></i> Processos Seletivos
          </div>

          <div class="card-body">
            <div class="card-text">
              <?php if ($arrayProcessos) : ?>

                <?php foreach ($arrayProcessos as $reg) : ?>
                  <form method="POST" action="processo_seletivo_testes.php">
                    <div class="row">
                      <div class="col-12">
                        <ul class="list-group list-group-flush">
                          <input type="hidden" id="txtIdProcesso" name="txtIdProcesso" value="<?= $reg->getidProcesso() ?>" />
                          <li class="list-group-item">
                            <p class="lead d-inline">Vaga para <strong><?= $reg->getCargo()->getNomeCargo(); ?></strong>, encerra em <?= $reg->getDataLimiteCandidatar(); ?>.</p>
                            <button type="submit" id="btnVisualizarProcesso" name="btnVisualizarProcesso" class="btn bnt-sm btn-outline-dark float-right mb-1 mt-3"><i class='fas fa-search'></i></button>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </form>
                <?php endforeach; ?>
                <a href="candidato_perfil" class="btn btn-sm btn-primary mt-3 float-right">Visualizar Todos</a>

              <?php else : ?>
                <p class="lead">Você não está participando de nenhum processo seletivo.</p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card my-2" style="height: 94.5%">
          <div class="card-header">
            <i class="fas fa-briefcase"> </i> Vagas
          </div>

          <div class="card-body">
            <div class="card-text">

              <?php foreach ($arrayVagas as $reg) : ?>
                <div class="row">
                  <div class="col-12">
                    <ul class="list-group list-group-flush">
                      <input type="hidden" id="txtIdProcesso" name="txtIdProcesso" value="<?= $reg->getidProcesso() ?>" />
                      <li class="list-group-item">
                        <p class="lead d-inline"><?= $reg->getCargo()->getNomeCargo(); ?> encerra em <?= $reg->getDataLimiteCandidatar(); ?>.</p>
                        <a href="processo_seletivo-<?= $reg->getidProcesso() ?>" id="btnVisualizarProcesso" name="btnVisualizarProcesso" class="btn bnt-sm btn-outline-dark float-right mb-1 mt-3"><i class='fas fa-search'></i></a>
                      </li>
                    </ul>

                  </div>
                </div>
              <?php endforeach; ?>
              <a href="candidato_vagas.php" class="btn btn-sm btn-primary mt-3 float-right">Visualizar mais</a>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>