<?php

include_once 'headerCand.php';

include_once "../Model/Conexao.php";
include_once "../Model/CandidatoCurso.php";
include_once "../Controller/CandidatoCursoDAO.php";

include_once "../Model/Candidato.php";
include_once "../Controller/CandidatoDAO.php";

$conn = new Conexao();

$curso = new CandidatoCurso();
$cursoDAO = new CandidatoCursoDAO($conn);

$candidato = new Candidato();
$candidatoDAO = new CandidatoDAO($conn);

$curso->setCpf($_SESSION['cpf']);
$candidato->setCpf($_SESSION['cpf']);

$ultimoRegistro = $curso->getUltimoRegistroCurso();
$arrayCurso = $cursoDAO->Listar($curso);

?>

<div class="container">

  <div class="jumbotron p-3 p-md-5">
    <div class="container p-0">
      <h1 class="display-5 display-md-5"><i class="fas fa-award d-none d-md-inline"> </i>Adicione cursos!</h1>
      <p class="lead">Aqui você poderá adicionar todos os cursos profissionalizantes que voce já fez. Poderá agregar muito na hora do processo seletivo</p>

      <hr class="my-2 my-md-4">
      <p>Gerencie aqui tudo sobre as seus cursos.</p>
    </div>
  </div>

  <input type="hidden" id="txtUltimoRegistro" name="txtUltimoRegistro" value="<?= $ultimoRegistro ?>">
  <input type="hidden" id="txtCpf" name="txtCpf" value="<?= $candidato->getCpf() ?>">


  <section id="sectionCardsCurso">

    <?php foreach ($arrayCurso as $reg) : ?>

      <div class="row">
        <div class="col">

          <div class="card">
            <div class="card-header" id="candidatoCurso<?= $reg->getIdCurso(); ?>">
              <p id="tituloHeader<?= $reg->getIdCurso(); ?>" class="d-inline"><?= $reg->getNomeCurso(); ?></p>
              <button name="btnAlterar<?= $reg->getIdCurso(); ?>" id="btnAlterar<?= $reg->getIdCurso(); ?>" class="btn btn-outline-primary float-right d-inline" data-toggle="collapse" data-target="#collapseCandidatoCurso<?= $reg->getIdCurso(); ?>">
                <i class="fas fa-pencil-alt"></i>
              </button>
            </div>

            <div id="collapseCandidatoCurso<?= $reg->getIdCurso(); ?>" class="collapse">

              <div class="card-body">
                <div class="card-text">
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="txtNomeCurso">Nome do curso</label>
                      <input type="text" class="form-control" id="txtNomeCurso<?= $reg->getIdCurso(); ?>" name="txtNomeCurso" value="<?= $reg->getNomeCurso(); ?>" required>
                    </div>

                    <div class="form-group col-md-4">
                      <label for="txtNomeInsti">Nome da instituição</label>
                      <input type="text" class="form-control" id="txtNomeInsti<?= $reg->getIdCurso(); ?>" name="txtNomeInsti" value="<?= $reg->getNomeInstituicao(); ?>">
                    </div>
                  </div>

                  <div class="form-row">

                    <div class="form-group col-md-3">
                      <label for="Conclusao">Conclusão</label>
                      <input type="date" class="form-control" id="Conclusao<?= $reg->getIdCurso(); ?>" name="Conclusao" value="<?= $reg->getAnoConclusao(); ?>" required>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="CargaHoraria">Carga horária</label>
                      <input type="int" class="form-control" id="CargaHoraria<?= $reg->getIdCurso(); ?>" name="CargaHoraria" value="<?= $reg->getCargaHoraria(); ?>" required>
                    </div>
                  </div>

                  <div class="form-row float-right mb-2">
                    <div class="col">
                      <button value="<?= $reg->getIdCurso(); ?>" name="btnAlterarSalvarCurso" id="btnAlterarSalvarCurso" class="btn btn-primary">Salvar</button>
                      <button value="<?= $reg->getIdCurso(); ?>" name="btnExcluirCurso" id="btnExcluirCurso" class="btn btn-secondary">Apagar</button>
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
          <div class="card-header" id="candidatoCurso<?= $ultimoRegistro ?>">
            <p class="d-inline">Insira aqui um novo curso!</p>
            <button name="btnAlterar<?= $ultimoRegistro ?>" id="btnAlterar<?= $ultimoRegistro ?>" class="btn btn-outline-primary float-right d-inline" data-toggle="collapse" data-target="#collapseCandidatoCurso<?= $ultimoRegistro ?>">
              <i class="fas fa-plus"></i>
            </button>
          </div>
          <div id="collapseCandidatoCurso<?= $ultimoRegistro ?>" class="collapse">
            <div class="card-body">
              <div class="card-text">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="txtNomeCurso">Nome do curso</label>
                    <input type="text" class="form-control" id="txtNomeCurso<?= $ultimoRegistro ?>" name="txtNomeCurso" placeholder="" required>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="txtNomeInsti">Nome da instituição</label>
                    <input type="text" class="form-control" id="txtNomeInsti<?= $ultimoRegistro ?>" name="txtNomeInsti" placeholder="">
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="Conclusao">Conclusão</label>
                    <input type="date" class="form-control" id="Conclusao<?= $ultimoRegistro ?>" name="Conclusao" placeholder="" required>
                  </div>
                  <div class="form-group col-md-6-3">
                    <label for="CargaHoraria">Carga horária</label>
                    <input type="text" class="form-control" id="CargaHoraria<?= $ultimoRegistro ?>" name="CargaHoraria" placeholder="" required>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col">
                    <button value="<?= $ultimoRegistro ?>" name="btnAlterarSalvarCurso" id="btnAlterarSalvarCurso" class="btn btn-primary">Inserir</button>
                  </div>
                </div>

              </div><!-- Car-text-->
            </div> <!-- Car-body-->
          </div> <!-- Car-body-->
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