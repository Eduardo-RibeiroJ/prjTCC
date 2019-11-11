<?php

include_once 'headerCand.php';

include_once "../Model/Conexao.php";
include_once "../Model/CandidatoObjetivo.php";
include_once "../Controller/CandidatoObjetivoDAO.php";

include_once "../Model/Cargo.php";
include_once "../Controller/CargoDAO.php";

include_once "../Model/Candidato.php";
include_once "../Controller/CandidatoDAO.php";

$conn = new Conexao();

$candObjetivo = new CandidatoObjetivo();
$candObjetivoDAO = new CandidatoObjetivoDAO($conn);

$candidato = new Candidato();
$candidatoDAO = new CandidatoDAO($conn);

$candObjetivo->setCpf($_SESSION['cpf']);
$candidato->setCpf($_SESSION['cpf']);

$candObjetivoDAO->Listar($candObjetivo);

?>

<div class="container">

  <div class="jumbotron p-3 p-md-5">
    <div class="container p-0">
      <h1 class="display-5 display-md-5"><i class="fas fa-bullseye d-none d-md-inline"> </i>Atuação profissional!</h1>
      <p class="lead"></p>

      <hr class="my-2 my-md-4">
      <p>Defina a área com a qual pretende atuar.</p>
    </div>
  </div>

  <input type="hidden" id="txtCpf" name="txtCpf" value="<?= $candidato->getCpf() ?>">
  <input type="hidden" id="txtIdcandObjetivo" name="txtIdcandObjetivo" value="<?= $candObjetivo->getIdObjetivo() ?>">
  <input type="hidden" class="form-control" id="txtIdCargo" name="txtIdCargo" value="<?= $candObjetivo->getCargo()->getIdCargo(); ?>">

  <section id="sectionObjetivo">

    <div class="row">
      <div class="col">

        <div class="row">
          <div class="col">

            <div class="card">
              <div class="card-header">
                <i class="fas fa-id-card"></i>
                Objetivo profissional
              </div>

              <div class="card-body">
                <div class="card-text">

                  <div class="form-row">

                    <div class="form-group col-md-6">
                      <label for="txtCargo">Cargo</label>
                      <input type="text" class="form-control" id="txtCargo" name="txtCargo" autocomplete="off" value="<?= $candObjetivo->getCargo()->getNomeCargo(); ?>" required autofocus>
                      <div id="compList"></div>
                    </div>

                    <div class="form-group col-md-5">
                      <label for="cbbNivel">Nível</label>
                      <select class="custom-select" id="cbbNivel" name="cbbNivel" required>
                        <option value="" selected><?= $candObjetivo->getNivel(); ?></option>
                        <option value="T">Trainee</option>
                        <option value="E">Estágio</option>
                        <option value="J">Junior</option>
                        <option value="S">Senior</option>
                        <option value="P">Pleno</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="txtPretSal">Pretenção salarial</label>
                      <input type="text" class="form-control" id="txtPretSal" name="txtPretSal" value="<?= $candObjetivo->getPretSal(); ?>" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col">
                      <button name="btnAlterarcandObjetivo" id="btnAlterarcandObjetivo" class="btn btn-primary float-right">Salvar</button>
                    </div>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
  </section>
</div>

<?php include 'footer.php'; ?>

<script>
  $(document).ready(function() {
    $('#txtCargo').keyup(function() {
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

  $(document).on('click', 'li', function() {
    $('#txtCargo').val($(this).text());
    $('#compList').html('');
  })
</script>