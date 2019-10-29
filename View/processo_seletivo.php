<?php
session_start();

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

//Setando manualmente o id que vai ver no link
$idProcesso = 12;

$processo->setIdProcesso($idProcesso);
$processoDAO->Listar($processo);

$processoCompetencia->setIdProcesso($idProcesso);
$arrayCompetencia = $processoCompetenciaDAO->Listar($processoCompetencia);

$processoTeste->setIdProcesso($idProcesso);
$arrayTeste = $processoTesteDAO->Listar($processoTeste);

$processoPergunta->setIdProcesso($idProcesso);
$arrayPergunta = $processoPerguntaDAO->Listar($processoPergunta);

?>

<?php include_once 'headerRecrut.php'; ?>

<section class="masthead" id="sectionProcesso1" style="background: url(imagem/90463.jpg); background-size: cover;">
    <div class="container">

        <div class="jumbotron p-3 p-md-5" style="background-color: #FFF">
            <div class="container p-0">
                <h5 class="display-4 display-md-2">Vaga para <?= $processo->getCargo()->getNomeCargo() ?>!</h1>
                <p class="lead">O processo seletivo estará aberto entre <?= $processo->getDataInicio(); ?> a <?= $processo->getDataLimiteCandidatar(); ?>.</p>
                
                <div class="row d-flex justify-content-center">
                  <div class="col-12 col-md-9 border rounded p-4 mt-2 mb-5">
                    <p class="lead"><pre class="lead-pre"><?= $processo->getResumoVaga() ?></pre></p>
                    <div class="row">
                      <div class="col-12">
                        <p class="lead">Contratação: <?= $processo->getTipoContratacao() ?>, salário <?= $processo->getSalario() == 0 ? ' a combinar.' : 'de R$ '.$processo->getSalario().'.'?></p>
                      </div>
                    </div>
                  </div>
                </div>

                <?php if($arrayCompetencia): ?>
                  <div class="row">
                    <div class="col-12">
                      <p class="lead mb-1"><strong>Competências necessárias:</strong></p>
                      <ul>
                      <?php foreach($arrayCompetencia as $reg): ?>

                        <li><?= $reg->getCompetencia()->getNomeComp(); ?> nível <?= $reg->getNivel(); ?></li>

                      <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                <?php endif; ?>

                <?php if($arrayTeste): ?>
                  <div class="row">
                    <div class="col-12">
                      <p class="lead mb-1"><strong>Testes online necessários:</strong></p>
                      <ul>
                      <?php foreach($arrayTeste as $reg): ?>

                        <li><?= $reg->getTesteOnline()->getNomeTesteOnline(); ?></li>

                      <?php endforeach; ?>
                      </ul>
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
                <a href="recrutador.php" class="btn btn-warning btn-lg float-right">Candidatar-se!</a>
              </div>
            </div>
        </div>
    </div>
  </section>

<?php include 'footer.php'; ?>
