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

<div style="background-image: linear-gradient(to left, rgba(220, 240, 255, 1), rgba(130,175,210,1));">
  <div class="container" id="containerPergunta">

    <div class="jumbotron p-3 p-md-5 bg-light">
      <div class="container p-0">
        <h5 class="display-4 display-md-2"><i class="fas fa-question-circle d-none d-md-inline"> </i>Adicione perguntas!</h1>

          <hr class="my-2 my-md-4">
          <p class="lead">Crie perguntas para que possam ser utilizadas no seu processo seletivo, ajudará muito a conhecer mais os candidatos.</p>
      </div>
      <form>
        <div class="form-row">
          <div class="form-group col-12">
            <textarea type="text" class="form-control" rows="4" id="txtPergunta" name="txtPergunta" placeholder="Escreva sua pergunta..." required autofocus></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-right">
            <a href="recrutador.php" class="btn btn-warning" id="btnVoltar" name="btnVoltar">Voltar</a>
            <button class="btn btn-primary" id="btnInserirPergunta" name="btnInserirPergunta">Inserir</button>
          </div>
        </div>
      </form>

    </div>

    <input type="hidden" id="txtUltimoRegistro" name="txtUltimoRegistro" value="<?= $ultimoRegistro ?>">
    <input type="hidden" id="txtCnpj" name="txtCnpj" value="<?= $recrutador->getCnpj() ?>">

    <section id="sectionCardsPergunta">

      <?php foreach ($arrayPergunta as $reg) : ?>

        <div class="row">
          <div class="col">

            <div class="card mb-1">
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
                      <div class="form-group col-md-12">
                        <label for="txtPergunta">Pergunta</label>
                        <textarea type="text" class="form-control" rows="4" id="txtPergunta<?= $reg->getIdPergunta(); ?>" name="txtPergunta" value="<?= $reg->getPergunta(); ?>" required><?= $reg->getPergunta(); ?></textarea>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="col text-right">
                        <button value="<?= $reg->getIdPergunta(); ?>" name="btnExcluirPergunta" id="btnExcluirPergunta" class="btn btn-danger"><i class="far fa-trash-alt"></i> Apagar</button>
                        <button value="<?= $reg->getIdPergunta(); ?>" name="btnAlterarSalvarPergunta" id="btnAlterarSalvarPergunta" class="btn btn-primary"><i class="far fa-save"></i> Salvar</button>
                      </div>
                    </div>

                  </div> <!-- CardText -->
                </div> <!-- CardBody -->
              </div>
            </div> <!-- Card -->
          </div>
        </div>

      <?php endforeach; ?>

    </section>
  </div>
</div>
<?php include 'footer.php'; ?>