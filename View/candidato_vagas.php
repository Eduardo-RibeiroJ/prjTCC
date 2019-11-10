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
$candidato = new Candidato();
$candidatoDAO = new CandidatoDAO($conn);
$candidatoProcesso = new CandidatoProcesso();
$candidatoProcessoDAO = new CandidatoProcessoDAO($conn);
$cargo = new Cargo();
$cargoDAO = new CargoDAO($conn);

$candidato->setCpf($_SESSION['cpf']);
$candidatoDAO->Listar($candidato);

$candidatoProcesso->setCpf($_SESSION['cpf']);
$arrayProcessos = $candidatoProcessoDAO->Listar($candidatoProcesso);
?>

<div style="background: url(imagem/fundo31.png); background-size: cover;">
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

      <div class="form-group col-lg-6">
        <div class="card text-center">
          <div class="card-body p-3">
            <h5 class="card-title mb-0">Programador C#</h5>
            <p class="card-text mb-0"> O processo encerra em dd/mm/aaa</p>
            <button class="btn btn-primary btn-md mb-0" id="btnPesquisar"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </div>

      <div class="form-group col-lg-6">
        <div class="card text-center">
          <div class="card-body p-3">
            <h5 class="card-title mb-0">Analista de sistema</h5>
            <p class="card-text mb-0"> O processo encerra em dd/mm/aaa</p>
            <button class="btn btn-primary btn-md" mb-0 id="btnPesquisar"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </div>

      <div class="form-group col-lg-6">
        <div class="card text-center">
          <div class="card-body p-3">
            <h5 class="card-title mb-0">Suporte ao usuário</h5>
            <p class="card-text mb-0"> O processo encerra em dd/mm/aaa</p>
            <button class="btn btn-primary btn-md" id="btnPesquisar"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </div>

      <div class="form-group col-lg-6">
        <div class="card text-center">
          <div class="card-body p-3">
            <h5 class="card-title mb-0">Tester</h5>
            <p class="card-text mb-0"> O processo encerra em dd/mm/aaa</p>
            <button class="btn btn-primary btn-md mb-0" id="btnPesquisar"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </div>

    </div><!-- d-flex flex-wrap justify-content-center-->

  </div>
</div>
<?php include 'footer.php'; ?>