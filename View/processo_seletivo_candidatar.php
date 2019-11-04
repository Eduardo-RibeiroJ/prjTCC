<?php
session_start();

unset($_SESSION['dadosTeste']);

include_once "../Model/Conexao.php";

include_once "../Model/ProcessoSeletivo.php";
include_once "../Model/ProcessoCompetencia.php";
include_once "../Model/ProcessoTeste.php";
include_once "../Model/ProcessoPergunta.php";
include_once "../Model/Competencia.php";
include_once "../Model/TesteOnline.php";
include_once "../Model/Pergunta.php";
include_once "../Model/Cargo.php";

include_once "../Controller/ProcessoSeletivoDAO.php";
include_once "../Controller/ProcessoCompetenciaDAO.php";
include_once "../Controller/ProcessoTesteDAO.php";
include_once "../Controller/ProcessoPerguntaDAO.php";
include_once "../Controller/CompetenciaDAO.php";
include_once "../Controller/TesteOnlineDAO.php";
include_once "../Controller/PerguntaDAO.php";
include_once "../Controller/CargoDAO.php";

$conn = new Conexao();

$processo = new ProcessoSeletivo();
$processoCompetencia = new ProcessoCompetencia();
$processoTeste = new ProcessoTeste();
$processoPergunta = new ProcessoPergunta();

$processoDAO = new ProcessoSeletivoDAO($conn);
$processoCompetenciaDAO = new ProcessoCompetenciaDAO($conn);
$processoTesteDAO = new ProcessoTesteDAO($conn);
$processoPerguntaDAO = new ProcessoPerguntaDAO($conn);

//Id pegado no link
$idProcesso = $_GET['id'];

$processo->setIdProcesso($idProcesso);
$processoDAO->Listar($processo);

//Não encontrou processo seletivo
if($processo->getIdProcesso() == NULL) {
  header('Location: index.php');
}

$processoCompetencia->setIdProcesso($idProcesso);
$arrayCompetencia = $processoCompetenciaDAO->Listar($processoCompetencia);

$processoTeste->setProcesso($processo);
$arrayTeste = $processoTesteDAO->Listar($processoTeste);

$processoPergunta->setProcesso($processo);
$arrayPergunta = $processoPerguntaDAO->Listar($processoPergunta);

?>

<?php include_once 'headerCand.php'; ?>

<section class="masthead" id="sectionProcesso1" style="background: url(imagem/90463.jpg); background-size: cover;">
    <div class="container">

        <div class="jumbotron p-3 p-md-5" style="background-color: #FFF">
            <div class="container p-0">
                <h5 class="display-4 display-md-2">Vaga para <?= $processo->getCargo()->getNomeCargo() ?>!</h1>
                <p class="lead"><strong>Atenção!</strong> - Todos os testes online e perguntas devem ser respondidos até <?= $processo->getDataLimiteCandidatar(); ?>.</p>

                <?php if($arrayTeste): ?>
                  <div class="row">
                    <div class="col-12">
                      <p class="lead mb-1"><strong>Testes online necessários:</strong></p>
                      <?php foreach($arrayTeste as $reg): ?>
                        <form method="POST" action="realizar_testeonline.php">
                          <input type="hidden" id="idProcesso" name="idProcesso" value="<?= $idProcesso ?>" />
                          <input type="hidden" id="idTeste" name="idTeste" value="<?= $reg->getTesteOnline()->getIdTesteOnline() ?>" />

                          <div class="card mb-1">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-12 col-md-10">
                                  <p class="lead"><strong><?= $reg->getTesteOnline()->getNomeTesteOnline(); ?></strong></p>
                                </div>
                                <div class="col-12 col-md-2 text-center">
                                
                                  <input type="submit" name="btnRealizarTeste" class="btn btn-primary" value="Realizar teste"></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                      <?php endforeach; ?>
                    </div>
                  </div>
                <?php endif; ?>

                <?php if($arrayPergunta): ?>
                  <div class="row">
                    <div class="col-12">
                      <p class="lead mb-1"><strong>Perguntas necessárias:</strong></p>
                      <ul>
                      <?php foreach($arrayPergunta as $reg): ?>

                        <li><?= $reg->getPergunta()->getPergunta(); ?></li>

                      <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                <?php endif; ?>
            </div>
            <hr class="my-2 my-md-4">

            <div class="form-row">
              <div class="col text-center">
                <a href="recrutador.php" class="btn btn-warning btn-lg float-right">Enviar Resultados!</a>
              </div>
            </div>
        </div>
    </div>
  </section>

<?php include 'footer.php'; ?>
