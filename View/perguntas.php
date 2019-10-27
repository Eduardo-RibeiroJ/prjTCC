<?php

include_once 'headerRecrut.php';

include_once "../Model/Conexao.php";
include_once "../Model/Pergunta.php";
include_once "../Controller/PerguntaDAO.php";

include_once "../Model/Recrutador.php";
include_once "../Controller/RecrutadorDAO.php";

$conn = new Conexao();

$pergunta = new Pergunta();
$perguntaDAO = new PerguntaDAO($conn);

$recrutador = new Recrutador();
$recrutadorDAO = new RecrutadorDAO($conn);

$pergunta->setCnpj($_SESSION['cnpj']);
$recrutador->setCnpj($_SESSION['cnpj']);

$ultimoRegistro = $pergunta->getUltimoRegistroPergunta();
$arrayPergunta = $perguntaDAO->Listar($pergunta);

?>

<div class="container">

  <div class="jumbotron p-3 p-md-5">
    <div class="container p-0">
      <h5 class="display-4 display-md-2"><i class="fas fa-question-circle d-none d-md-inline"> </i>Adicione perguntas!</h1>

        <hr class="my-2 my-md-4">
        <p class="lead">Crie perguntas para que possam ser utilizadas no seu processo seletivo, ajudará muito a conhecer mais os candidatos.</p>
    </div>
  </div>

  <input type="hidden" id="txtUltimoRegistro" name="txtUltimoRegistro" value="<?= $ultimoRegistro ?>">
  <input type="hidden" id="txtCnpj" name="txtCnpj" value="<?= $recrutador->getCnpj() ?>">

  <section id="sectionCardsPergunta">

    <?php foreach ($arrayPergunta as $reg) : ?>

      <div class="row">
        <div class="col">

          <div class="card">
            <div class="card-header" id="SalvarPergunta<?= $reg->getIdPergunta(); ?>">
              <p id="tituloHeader<?= $reg->getIdPergunta(); ?>" class="d-inline"><?= $reg->getPergunta(); ?></p>
              <button name="btnAlterar<?= $reg->getIdPergunta(); ?>" id="btnAlterar<?= $reg->getIdPergunta(); ?>" class="btn btn-outline-primary float-right d-inline" data-toggle="collapse" data-target="#collapseRecrutadorPergunta<?= $reg->getIdPergunta(); ?>">
                <i class="fas fa-pencil-alt"></i>
              </button>
            </div>

            <div id="collapseRecrutadorPergunta<?= $reg->getIdPergunta(); ?>" class="collapse">

              <div class="card-body">
                <div class="card-text">
                  <div class="form-row">
                    <div class="form-group col-md-10">
                      <label for="txtPergunta">Pergunta</label>
                      <textarea type="text" class="form-control" rows="4" id="txtPergunta<?= $reg->getIdPergunta(); ?>" name="txtPergunta" value="<?= $reg->getPergunta(); ?>" required><?= $reg->getPergunta(); ?></textarea>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col">
                      <button value="<?= $reg->getIdPergunta(); ?>" name="btnAlterarSalvarPergunta" id="btnAlterarSalvarPergunta" class="btn btn-primary">Salvar</button>
                      <button value="<?= $reg->getIdPergunta(); ?>" name="btnExcluirPergunta" id="btnExcluirPergunta" class="btn btn-secondary">Apagar</button>
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
          <div class="card-header" id="SalvarPergunta<?= $ultimoRegistro ?>">
            <p class="d-inline">Insira aqui uma nova pergunta!</p>
            <button name="btnAlterar<?= $ultimoRegistro ?>" id="btnAlterar<?= $ultimoRegistro ?>" class="btn btn-outline-primary float-right d-inline" data-toggle="collapse" data-target="#collapseRecrutadorPergunta<?= $ultimoRegistro ?>">
              <i class="fas fa-plus"></i>
            </button>
          </div>
          <div id="collapseRecrutadorPergunta<?= $ultimoRegistro ?>" class="collapse">
            <div class="card-body">
              <div class="card-text">
                <div class="form-row">
                  <div class="form-group col-md-10">
                    <label for="txtPergunta">Pergunta</label>
                    <textarea type="text" class="form-control" rows="4" id="txtPergunta<?= $ultimoRegistro ?>" name="txtPergunta" placeholder="" required></textarea>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col">
                    <button value="<?= $ultimoRegistro ?>" name="btnAlterarSalvarPergunta" id="btnAlterarSalvarPergunta" class="btn btn-primary">Inserir</button>
                  </div>
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