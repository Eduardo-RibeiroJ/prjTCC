<?php

include_once 'headerCand.php';

include_once "../Model/Conexao.php";
include_once "../Model/CandidatoObjetivo.php";
include_once "../Controller/CandidatoObjetivoDAO.php";

include_once "../Model/Candidato.php";
include_once "../Controller/CandidatoDAO.php";

include_once "../Model/Cargo.php";
include_once "../Controller/CargoDAO.php";

$conn = new Conexao();

$objetivo = new CandidatoObjetivo();
$objetivoDAO = new CandidatoObjetivoDAO($conn);

$candidato = new Candidato();
$candidatoDAO = new CandidatoDAO($conn);

$objetivo->setCpf($_SESSION['cpf']);
$candidato->setCpf($_SESSION['cpf']);

$objetivoDAO->Listar($objetivo);

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

  <section id="sectionCardsObjetivo">

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
                      <input type="text" class="form-control" id="txtCargo" name="txtCargo" placeholder="Digite..." required autofocus>
                      <div id="compList"></div>
                    </div>

                    <div class="form-group col-md-5">
                      <label for="cbbNivel">Nível</label>
                      <select class="custom-select" id="cbbNivel" name="cbbNivel" required>

                        <?php

                        $alternativas = ['Selecione', 'Trainee', 'Estágio', 'Junior', 'Senior', 'Pleno'];

                        foreach ($alternativas as $value) {

                          if ($value == $objetivo->getNivel())
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
                      <input type="text" class="form-control" id="txtPretSal" name="txtPretSal" value="" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col">
                      <button name="btnSalvarObjetivo" id="btnSalvarObjetivo" class="btn btn-primary float-right">Inserir</button>
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