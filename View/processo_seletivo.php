<?php
session_start();

include_once "../Model/Conexao.php";

include_once "../Model/ProcessoSeletivo.php";
include_once "../Model/ProcessoCompetencia.php";
include_once "../Model/ProcessoTeste.php";
include_once "../Model/ProcessoPergunta.php";
include_once "../Model/Competencia.php";

include_once "../Controller/ProcessoSeletivoDAO.php";
include_once "../Controller/ProcessoCompetenciaDAO.php";
include_once "../Controller/ProcessoTesteDAO.php";
include_once "../Controller/ProcessoPerguntaDAO.php";
include_once "../Controller/CompetenciaDAO.php";

$conn = new Conexao();

$processo = new ProcessoSeletivo();
$processoCompetencia = new ProcessoCompetencia();
$processoTeste = new ProcessoTeste();
$processoPergunta = new ProcessoPergunta();

$processoDAO = new ProcessoSeletivoDAO($conn);
$processoCompetenciaDAO = new ProcessoCompetenciaDAO($conn);
$processoTesteDAO = new ProcessoTesteDAO($conn);
$processoPerguntaDAO = new ProcessoPerguntaDAO($conn);
$competenciaDAO = new CompetenciaDAO($conn);

//Setando manualmente o id que vai ver no link
$idProcesso = 13;

$processo->setIdProcesso($idProcesso);
$processoDAO->Listar($processo);

$processoCompetencia->setIdProcesso($idProcesso);
$arrayCompetencia = $processoCompetenciaDAO->Listar($processoCompetencia);

$processoTeste->setIdProcesso($idProcesso);
$processoTesteDAO->Listar($processoTeste);

$processoPergunta->setIdProcesso($idProcesso);
$processoPerguntaDAO->Listar($processoPergunta);

?>

<?php include_once 'headerRecrut.php'; ?>

<section class="masthead" id="sectionProcesso1" style="background: url(imagem/90463.jpg); background-size: cover;">
    <div class="container">

        <div class="jumbotron p-3 p-md-5" style="background-color: #FFF">
            <div class="container p-0">
                <h5 class="display-4 display-md-2">Vaga para <?= $processo->getIdCargo() ?>!</h1>
                <p class="lead">O processo seletivo estará aberto entre <?= $processo->getDataInicio(); ?> a <?= $processo->getDataLimiteCandidatar(); ?>.</p>
                
                <div class="row d-flex justify-content-center">
                  <div class="col-12 col-md-9 border rounded p-4 mt-2 mb-5">
                    <p class="lead"><?= $processo->getResumoVaga() ?></p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12">
                  <p class="lead mb-1"><strong>Competências necessárias:</strong></p>
                  <ul>
                    <?php if($arrayCompetencia): ?>
                      <?php foreach($arrayCompetencia as $reg): ?>

                        <?php
                          $competencia = new Competencia();
                          $competencia->setIdComp($reg->getIdCompetencia());
                          $competenciaDAO->Listar($competencia);
                        ?>

                        <li><?= $competencia->getNomeComp(); ?> nível <?= $reg->getNivel(); ?></li>

                      <?php endforeach; ?>
                    <?php endif; ?>
                  </ul>
                  </div>
                </div>
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
