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
  <input type="hidden" id="txtIdcandObjetivo" name="txtCpf" value="<?= $candObjetivo->getIdObjetivo() ?>">

  <section id="sectionCardscandObjetivo">

    <div class="row">
      <div class="col">

        <div class="row">
          <div class="col">

            <div class="card">
              <div class="card-header">
                <i class="fas fa-id-card"></i>
                candObjetivo profissional
              </div>

              <div class="card-body">
                <div class="card-text">

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="txtCargo">Cargo</label>
                      <input type="text" class="form-control" id="txtCargo" name="txtCargo" value="<?= $candObjetivo->getCargo()->getNomeCargo(); ?>" required autofocus>
                    </div>

                    <div class="form-group col-md-5">
                      <label for="cbbNivel">Nível</label>
                      <select class="custom-select" id="cbbNivel" name="cbbNivel" required>

                        <?php

                        $alternativas = ['Selecione', 'T', 'E', 'J', 'S', 'P'];

                        foreach ($alternativas as $value) {

                          if ($value == $candObjetivo->getNivel())
                            $selected = 'selected';
                          else
                            $selected = '';

                          echo '<option value="' . $value . '" ' . $selected . '>' . $value . '</option>';
                        }

                        ?>
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

        <hr class="my-2 my-md-4">

        <div class="row">
          <div class="col">
            <a href="candidato_perfil.php" class="btn btn-primary float-right">Visualizar Perfil</a>
          </div>
        </div>

  </section>
</div>

<?php include 'footer.php'; ?>