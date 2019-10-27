<?php

include_once 'headerCand.php';

include_once "../Model/Conexao.php";
include_once "../Model/Candidato.php";
include_once "../Controller/CandidatoDAO.php";

$conn = new Conexao();
$candidato = new Candidato();
$candidatoDAO = new CandidatoDAO($conn);

$candidato->setCpf($_SESSION['cpf']);
$candidatoDAO->Listar($candidato);

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
            </div>
          </div>
        </div>

        <div class="card my-2">
          <div class="card-header">
            <i class="far fa-handshake"></i> Processos Seletivos
          </div>

          <div class="card-body">
            <div class="card-text">
              RSRS
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
              RSRS
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>