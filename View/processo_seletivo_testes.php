<?php
session_start();

unset($_SESSION['dadosTeste']);

include_once "../Model/Conexao.php";

include_once "../Model/ProcessoSeletivo.php";
include_once "../Model/ProcessoCompetencia.php";
include_once "../Model/CandidatoProcesso.php";
include_once "../Model/ProcessoTeste.php";
include_once "../Model/ProcessoPergunta.php";
include_once "../Model/ProcessoCandTeste.php";
include_once "../Model/ProcessoCandPergunta.php";
include_once "../Model/Competencia.php";
include_once "../Model/TesteOnline.php";
include_once "../Model/Pergunta.php";
include_once "../Model/Cargo.php";
include_once "../Model/Recrutador.php";

include_once "../Controller/ProcessoSeletivoDAO.php";
include_once "../Controller/ProcessoCompetenciaDAO.php";
include_once "../Controller/CandidatoProcessoDAO.php";
include_once "../Controller/ProcessoTesteDAO.php";
include_once "../Controller/ProcessoPerguntaDAO.php";
include_once "../Controller/ProcessoCandTesteDAO.php";
include_once "../Controller/ProcessoCandPerguntaDAO.php";
include_once "../Controller/CompetenciaDAO.php";
include_once "../Controller/TesteOnlineDAO.php";
include_once "../Controller/PerguntaDAO.php";
include_once "../Controller/CargoDAO.php";
include_once "../Controller/RecrutadorDAo.php";

$conn = new Conexao();

$processo = new ProcessoSeletivo();
$candProcesso = new CandidatoProcesso();
$processoCompetencia = new ProcessoCompetencia();
$processoTeste = new ProcessoTeste();
$processoPergunta = new ProcessoPergunta();
$recrutador = new Recrutador();


$processoDAO = new ProcessoSeletivoDAO($conn);
$candProcessoDAO = new CandidatoProcessoDAO($conn);
$processoCompetenciaDAO = new ProcessoCompetenciaDAO($conn);
$processoTesteDAO = new ProcessoTesteDAO($conn);
$processoPerguntaDAO = new ProcessoPerguntaDAO($conn);
$recrutadorDAO = new RecrutadorDAO($conn);

if (isset($_POST['txtIdProcesso'])) {
  $idProcesso = $_POST['txtIdProcesso'];
} else if (isset($_SESSION['txtIdProcesso'])) {
  $idProcesso = $_SESSION['txtIdProcesso'];
  unset($_SESSION['txtIdProcesso']);
} else {
  header('Location: index.php');
}

$processo->setIdProcesso($idProcesso);
$processoDAO->Listar($processo);

$recrutador->setCnpj($processo->getCnpj());
$recrutadorDAO->Listar($recrutador);

$processoCompetencia->setIdProcesso($idProcesso);
$arrayCompetencia = $processoCompetenciaDAO->Listar($processoCompetencia);

$processoTeste->setProcesso($processo);
$arrayTeste = $processoTesteDAO->Listar($processoTeste);

$processoPergunta->setProcesso($processo);
$arrayPergunta = $processoPerguntaDAO->Listar($processoPergunta);

if (isset($_POST['btnCandidatar'])) {

  if (!(isset($_SESSION['cpf']))) {
    header('Location: candidato_logar.php');
  }

  $candProcesso->inserirCandProcesso(
    $_SESSION['cpf'],
    $processo->getIdProcesso()
  );
  $candProcessoDAO->Inserir($candProcesso);
}

?>

<?php include_once 'headerCand.php'; ?>

<section class="masthead" id="sectionProcesso1" style="background-image: linear-gradient(to right, rgba(188, 216, 238, 1), rgba(145,184,217,1));">
  <div class="container">

    <div class="jumbotron p-3 p-md-5" style="background-color: #FFF">
      <div class="container p-0">
        <?php if (isset($_POST['btnCandidatar'])) : ?>
          <h5 class="display-4 display-md-2"><i class="far fa-thumbs-up"></i> Boa sorte!</h1>
            <p class="lead mb-0">Você se candidatou para a vaga de <strong><?= $processo->getCargo()->getNomeCargo() ?></strong></p>
            <p class="lead text-muted">Responda os testes online e perguntas até <strong><?= $processo->getDataLimiteCandidatar(); ?></strong>.</p>
          <?php else : ?>
            <h5 class="display-4 display-md-2 mb-0">Vaga para <?= $processo->getCargo()->getNomeCargo() ?></h5>
            <p class="lead text-muted">Empresa <?= $recrutador->getNomeEmpresa() ?>, região de <?= $recrutador->getCidade() ?>.</p>
              <p class="lead"><strong>Atenção!</strong> - Todos os testes online e perguntas devem ser respondidos até <strong><?= $processo->getDataLimiteCandidatar(); ?></strong>.</p>
            <?php endif; ?>

            <?php if ($arrayTeste) : ?>
              <div class="row">
                <div class="col-12">
                  <p class="lead mt-2 mb-1"><strong>Testes online necessários:</strong></p>
                  <?php foreach ($arrayTeste as $reg) : ?>
                    <form method="POST" action="testeonline_realizar.php">
                      <input type="hidden" id="idProcesso" name="idProcesso" value="<?= $idProcesso ?>" />
                      <input type="hidden" id="idTeste" name="idTeste" value="<?= $reg->getTesteOnline()->getIdTesteOnline() ?>" />

                      <div class="card mb-1">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-12 col-md-10">
                              <p class="lead"><strong><?= $reg->getTesteOnline()->getNomeTesteOnline(); ?></strong></p>
                            </div>
                            <div class="col-12 col-md-2 text-center">
                              <?php
                                  $processoCandTeste = new ProcessoCandTeste();
                                  $processoCandTesteDAO = new ProcessoCandTesteDAO($conn);

                                  $processoCandTeste->setIdProcesso($processo->getIdProcesso());
                                  $processoCandTeste->setIdTesteOnline($reg->getTesteOnline()->getIdTesteOnline());
                                  $processoCandTeste->setCpf($_SESSION['cpf']);

                                  $realizouTeste = $processoCandTesteDAO->Listar($processoCandTeste);

                                  ?>
                              <?php if ($realizouTeste->getIdTesteOnline()) : ?>
                                
                                <input type="submit" class="btn btn-success" disabled="true" value="Teste Realizado!" />
                              <?php else : ?>
                                <button type="submit" name="btnRealizarTeste" class="btn btn-primary"><i class="fas fa-tasks"></i> Realizar teste</button>
                              <?php endif; ?>

                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($arrayPergunta) : ?>
              <div class="row">
                <div class="col-12">
                  <p class="lead mt-3 mb-1"><strong>Perguntas necessárias:</strong></p>
                  <ul>
                    <?php foreach ($arrayPergunta as $reg) : ?>

                      <li><?= $reg->getPergunta()->getPergunta(); ?></li>

                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
              <form method="POST" action="pergunta_responder.php">
                <input type="hidden" id="txtIdProcesso" name="txtIdProcesso" value="<?= $idProcesso ?>" />
                <?php
                  $processoCandPergunta = new ProcessoCandPergunta();
                  $processoCandPerguntaDAO = new ProcessoCandPerguntaDAO($conn);

                  $processoCandPergunta->setIdProcesso($processo->getIdProcesso());
                  $processoCandPergunta->setCpf($_SESSION['cpf']);

                  $realizouPergunta = $processoCandPerguntaDAO->Listar($processoCandPergunta);

                  ?>
                <div class="row">
                  <div class="col-12">
                    <?php if ($realizouPergunta) : ?>
                      <input type="submit" class="btn btn-success float-right" disabled="true" value="Perguntas Respondidas!" />
                    <?php else : ?>
                      <button type="submit" name="btnResponder" class="btn btn-primary float-right"><i class="far fa-comment-dots"></i> Responder</button>
                    <?php endif; ?>
                  </div>
                </div>

              </form>
            <?php endif; ?>
      </div>
      <hr class="my-2 my-md-4">

      <div class="form-row">
        <div class="col text-center">
          <a href="candidato.php" class="btn btn-warning float-right">Retornar</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>