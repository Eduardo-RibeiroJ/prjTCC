<?php

include_once 'headerCand.php';

include_once "../Model/Conexao.php";
include_once "../Model/CandidatoFormacao.php";
include_once "../Controller/CandidatoFormacaoDAO.php";

include_once "../Model/Candidato.php";
include_once "../Controller/CandidatoDAO.php";

$conn = new Conexao();

$formacao = new CandidatoFormacao();
$formacaoDAO = new CandidatoFormacaoDAO($conn);

$candidato = new Candidato();
$candidatoDAO = new CandidatoDAO($conn);

$formacao->setCpf($_SESSION['cpf']);
$candidato->setCpf($_SESSION['cpf']);

$ultimoRegistro = $formacao->getUltimoRegistroFormacao();

$arrayFormacao = $formacaoDAO->Listar($formacao);

if (isset($_POST['btnContinuar'])) {

  header('Location: candidato_inserir_curso.php');
}

?>

<div class="container">

  <div class="jumbotron p-3 p-md-5">
    <div class="container p-0">
      <h5 class="display-4 display-md-2"><i class="fas fa-graduation-cap d-none d-md-inline"> </i>Queremos saber sobre suas formações acadêmicas!</h1>

        <hr class="my-2 my-md-4">
        <p class="lead">Gerencie aqui tudo sobre as suas formações.</p>
    </div>
  </div>

  <input type="hidden" id="txtUltimoRegistro" name="txtUltimoRegistro" value="<?= $ultimoRegistro ?>">
  <input type="hidden" id="txtCpf" name="txtCpf" value="<?= $candidato->getCpf() ?>">

  <section id="sectionCardsFormacao">

    <?php foreach ($arrayFormacao as $reg) : ?>

      <div class="row">
        <div class="col">

          <div class="card">
            <div class="card-header" id="candidatoFormacao<?= $reg->getIdFormacao(); ?>">
              <p id="tituloHeader<?= $reg->getIdFormacao(); ?>" class="d-inline"><?= $reg->getNomeCurso(); ?></p>
              <button name="btnAlterar<?= $reg->getIdFormacao(); ?>" id="btnAlterar<?= $reg->getIdFormacao(); ?>" class="btn btn-outline-primary float-right d-inline" data-toggle="collapse" data-target="#collapseCandidatoFormacao<?= $reg->getIdFormacao(); ?>">
                <i class="fas fa-pencil-alt"></i>
              </button>
            </div>

            <div id="collapseCandidatoFormacao<?= $reg->getIdFormacao(); ?>" class="collapse">

              <div class="card-body">
                <div class="card-text">
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="txtNomeCurso">Nome do curso</label>
                      <input type="text" class="form-control" id="txtNomeCurso<?= $reg->getIdFormacao(); ?>" name="txtNomeCurso" value="<?= $reg->getNomeCurso(); ?>" required>
                    </div>

                    <div class="form-group col-md-4">
                      <label for="txtNomeInsti">Nome da instituição</label>
                      <input type="text" class="form-control" id="txtNomeInsti<?= $reg->getIdFormacao(); ?>" name="txtNomeInsti" value="<?= $reg->getNomeInstituicao(); ?>">
                    </div>

                    <div class="form-group col-md-4">
                      <label for="tipoCurso">Tipo do curso</label>
                      <select class="custom-select" id="cbbTipoCurso<?= $reg->getIdFormacao(); ?>" name="cbbTipoCurso" required>
                        <option value="<?= $reg->getTipo(); ?>" selected><?= $reg->getTipo(); ?></option>
                        <option value="EF">Ensino Fundamental</option>
                        <option value="EM">Ensino Médio</option>
                        <option value="EMP">Ensino Médio profissionalizante</option>
                        <option value="ET">Ensino Técnico</option>
                        <option value="GRB">Graduação - Bacharelado</option>
                        <option value="GRT">Graduação - Tecnólogo</option>
                        <option value="GRL">Graduação - Licenciatura</option>
                        <option value="GRE">Graduação - Especialização</option>
                        <option value="GRMBA">Graduação - MBA</option>
                        <option value="GRME">Graduação - Mestrado</option>
                        <option value="GRD">Graduação - Doutorado</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="dtaInicioInsti">Data início</label>
                      <input type="date" class="form-control" id="dtaInicioInsti<?= $reg->getIdFormacao(); ?>" name="dtaInicioInsti" value="<?= $reg->getDataInicio(); ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="dtaTermInsti">Data término (previsão)</label>
                      <input type="date" class="form-control" id="dtaTermInsti<?= $reg->getIdFormacao(); ?>" name="dtaTermInsti" value="<?= $reg->getDataTermino(); ?>" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="cbbSituacaoInsti">Tipo do curso</label>
                      <select class="custom-select" id="cbbSituacaoInsti<?= $reg->getIdFormacao(); ?>" name="cmbSituacaoInsti" required>
                        <option value="" selected><?= $reg->getEstado(); ?></option>
                        <option value="IN">Interrrompido</option>
                        <option value="EA">Em andamento</option>
                        <option value="FI">Finalizado</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-row float-right">
                    <div class="col">
                      <button value="<?= $reg->getIdFormacao(); ?>" name="btnAlterarSalvarFormacao" id="btnAlterarSalvarFormacao" class="btn btn-primary mb-3">Salvar</button>
                      <button value="<?= $reg->getIdFormacao(); ?>" name="btnExcluirFormacao" id="btnExcluirFormacao" class="btn btn-secondary mb-3">Apagar</button>
                    </div>
                  </div>

                </div> <!-- CardText -->
              </div> <!-- CardBody -->
            </div>
          </div> <!-- Card -->

        </div>
      </div>

    <?php endforeach; ?>

    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header" id="candidatoFormacao<?= $ultimoRegistro ?>">
            <p class="d-inline">Insira aqui uma nova formação!</p>
            <button name="btnAlterar<?= $ultimoRegistro ?>" id="btnAlterar<?= $ultimoRegistro ?>" class="btn btn-outline-primary float-right d-inline" data-toggle="collapse" data-target="#collapseCandidatoFormacao<?= $ultimoRegistro ?>">
              <i class="fas fa-plus"></i>
            </button>
          </div>
          <div id="collapseCandidatoFormacao<?= $ultimoRegistro ?>" class="collapse">
            <div class="card-body">
              <div class="card-text">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="txtNomeCurso">Nome do curso</label>
                    <input type="text" class="form-control" id="txtNomeCurso<?= $ultimoRegistro ?>" name="txtNomeCurso" placeholder="" required>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="txtNomeInsti">Nome da instituição</label>
                    <input type="text" class="form-control" id="txtNomeInsti<?= $ultimoRegistro ?>" name="txtNomeInsti" placeholder="">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="tipoCurso">Tipo do curso</label>
                    <select class="custom-select" id="cbbTipoCurso<?= $ultimoRegistro ?>" name="cbbTipoCurso" required>
                      <option value="" selected>Selecione</option>
                      <option value="EF">Ensino Fundamental</option>
                      <option value="EM">Ensino Médio</option>
                      <option value="EMP">Ensino Médio profisisonalizante</option>
                      <option value="ET">Ensino Técnico</option>
                      <option value="GRB">Graduação - Bacharelado</option>
                      <option value="GRT">Graduação - Tecnólogo</option>
                      <option value="GRL">Graduação - Licenciatura</option>
                      <option value="GRE">Graduação - Especialização</option>
                      <option value="GRMBA">Graduação - MBA</option>
                      <option value="GRME">Graduação - Mestrado</option>
                      <option value="GRD">Graduação - Doutorado</option>
                    </select>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="dtaInicioInsti">Data início</label>
                    <input type="date" class="form-control" id="dtaInicioInsti<?= $ultimoRegistro ?>" name="dtaInicioInsti" placeholder="" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="dtaTermInsti">Data término (previsão)</label>
                    <input type="date" class="form-control" id="dtaTermInsti<?= $ultimoRegistro ?>" name="dtaTermInsti" placeholder="" required>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="cbbSituacaoInsti">Tipo do curso</label>
                    <select class="custom-select" id="cbbSituacaoInsti<?= $ultimoRegistro ?>" name="cmbSituacaoInsti" required>
                      <option value="" selected>Selecione</option>
                      <option value="IN">Interrrompido</option>
                      <option value="EA">Em andamento</option>
                      <option value="FI">Finalizado</option>
                    </select>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col">
                    <button value="<?= $ultimoRegistro ?>" name="btnAlterarSalvarFormacao" id="btnAlterarSalvarFormacao" class="btn btn-primary float-right">Inserir</button>
                  </div>
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