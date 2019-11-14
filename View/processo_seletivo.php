<?php
session_start();

include_once "../Model/Conexao.php";

include_once "../Model/Recrutador.php";
include_once "../Model/ProcessoSeletivo.php";
include_once "../Model/ProcessoCompetencia.php";
include_once "../Model/ProcessoTeste.php";
include_once "../Model/ProcessoPergunta.php";
include_once "../Model/CandidatoProcesso.php";
include_once "../Model/CandidatoCompetencia.php";
include_once "../Model/Competencia.php";
include_once "../Model/TesteOnline.php";
include_once "../Model/Pergunta.php";
include_once "../Model/Cargo.php";

include_once "../Controller/RecrutadorDAO.php";
include_once "../Controller/ProcessoSeletivoDAO.php";
include_once "../Controller/ProcessoCompetenciaDAO.php";
include_once "../Controller/ProcessoTesteDAO.php";
include_once "../Controller/ProcessoPerguntaDAO.php";
include_once "../Controller/CandidatoProcessoDAO.php";
include_once "../Controller/CandidatoCompetenciaDAO.php";
include_once "../Controller/CompetenciaDAO.php";
include_once "../Controller/TesteOnlineDAO.php";
include_once "../Controller/PerguntaDAO.php";
include_once "../Controller/CargoDAO.php";

$conn = new Conexao();

$recrutador = new Recrutador();
$processo = new ProcessoSeletivo();
$candidatoProcesso = new CandidatoProcesso();
$processoCompetencia = new ProcessoCompetencia();
$processoTeste = new ProcessoTeste();
$processoPergunta = new ProcessoPergunta();

$recrutadorDAO = new RecrutadorDAO($conn);
$processoDAO = new ProcessoSeletivoDAO($conn);
$candidatoProcessoDAO = new CandidatoProcessoDAO($conn);
$processoCompetenciaDAO = new ProcessoCompetenciaDAO($conn);
$processoTesteDAO = new ProcessoTesteDAO($conn);
$processoPerguntaDAO = new ProcessoPerguntaDAO($conn);

//Id pegado no link
$idProcesso = $_GET['id'];

$processo->setIdProcesso($idProcesso);
$processoDAO->Listar($processo);

//Não encontrou processo seletivo
if ($processo->getIdProcesso() == NULL) {
  header('Location: index.php');
}

$recrutador->setCnpj($processo->getCnpj());
$recrutadorDAO->Listar($recrutador);

$processoCompetencia->setIdProcesso($idProcesso);
$arrayCompetencia = $processoCompetenciaDAO->Listar($processoCompetencia);

$processoTeste->setProcesso($processo);
$arrayTeste = $processoTesteDAO->Listar($processoTeste);

$processoPergunta->setProcesso($processo);
$arrayPergunta = $processoPerguntaDAO->Listar($processoPergunta);

//Verificar se o candidato ja se candidatou
if(isset($_SESSION['cpf'])) {
  $candidatoProcesso->setCpf($_SESSION['cpf']);
  $candidatoProcesso->setIdProcesso($idProcesso);
  $candidatoProcessoDAO->Listar($candidatoProcesso);
}

if (empty($_SESSION['logado']))
  include_once 'header.php';
else if ($_SESSION['logado'] == 1)
  include_once 'headerCand.php';
else if ($_SESSION['logado'] == 2)
  include_once 'headerRecrut.php';

?>


<section class="masthead" id="sectionProcesso1" style="background-color:#c1ddf3">
  <div class="container">

    <div class="jumbotron p-3 p-md-5" style="background-color: #FFF">
      <div class="container p-0">
        <h5 class="display-4 display-md-2">Vaga para <?= $processo->getCargo()->getNomeCargo() ?>!</h1>
          <?php if(strtotime(date("d-m-Y")) > strtotime(str_replace("/", "-", $processo->getDataLimiteCandidatar()))): ?>
            <h4 class="text-center"><strong>Inscrições encerradas!</strong></h4>

          <?php else: ?>
            <p class="lead">Inscrições para processo seletivo estarão abertas até <strong><?= $processo->getDataLimiteCandidatar(); ?></strong>.</p>

          <?php endif; ?>



          <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-9 border rounded p-4 mt-2 mb-5">
              <p class="lead">
                <strong>Empresa <?= $recrutador->getNomeEmpresa() ?> contrata <?= $processo->getCargo()->getNomeCargo() ?> na região de <?= $recrutador->getCidade() ?></strong>
              </p>
              <p class="lead">
                <pre class="lead-pre"><?= $processo->getResumoVaga() ?></pre>
              </p>
              <div class="row">
                <div class="col-12">
                  <p class="lead">Contratação: <?= $processo->getTipoContratacao() ?>, salário <?= $processo->getSalario() == 0 ? ' a combinar.' : 'de R$ ' . $processo->getSalario() . '.' ?></p>
                </div>
              </div>
            </div>
          </div>

          <?php if (isset($_SESSION['cpf'])) : ?>
            <?php
              $candidatoCompetencia = new CandidatoCompetencia();
              $candidatoCompetenciaDAO = new CandidatoCompetenciaDAO($conn);
              $candidatoCompetencia->setCpf($_SESSION['cpf']);
              $arrayCompetencias = $candidatoCompetenciaDAO->ListarCompProc($candidatoCompetencia, $processo);
              
            ?>
            <?php if ($arrayCompetencias) : ?>
              <div class="row">
                <div class="col-12">
                  <p class="lead mb-1"><strong>Competências correspondentes:</strong></p>
                  <ul>
                    <?php foreach ($arrayCompetencias as $comp) : ?>

                      <li><strong><?= $comp->getCompetencia() ?></strong> nível <?= $comp->getNivel(); ?> <i class="fas fa-check text-success"></i></li>

                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            <?php else: ?>
            <p class="lead"><strong>Você não tem competências correspondentes com a vaga.</strong></p>

            <?php endif; ?>

          <?php else: ?>

            <?php if ($arrayCompetencia) : ?>
            <div class="row">
              <div class="col-12">
                <p class="lead mb-1"><strong>Competências necessárias:</strong></p>
                <ul>
                  <?php foreach ($arrayCompetencia as $reg) : ?>

                    <li><strong><?= $reg->getCompetencia()->getNomeComp(); ?></strong> nível <?= $reg->getNivel(); ?></li>

                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
            <?php endif; ?>

          <?php endif; ?>





          <?php if ($arrayTeste) : ?>
            <div class="row">
              <div class="col-12">
                <p class="lead mb-1"><strong>Testes online necessários:</strong></p>
                <ul>
                  <?php foreach ($arrayTeste as $reg) : ?>

                    <li><?= $reg->getTesteOnline()->getNomeTesteOnline(); ?></li>

                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          <?php endif; ?>

          <?php if ($arrayPergunta) : ?>
            <div class="row">
              <div class="col-12">
                <p class="lead mb-1"><strong>Perguntas necessárias:</strong></p>
                <ul>
                  <?php foreach ($arrayPergunta as $reg) : ?>

                    <li><?= $reg->getPergunta()->getPergunta(); ?></li>

                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          <?php endif; ?>
      </div>
      <hr class="my-2 my-md-4">

      <form method="POST" action="processo_seletivo_testes.php">
        <input type="hidden" name="txtIdProcesso" id="txtIdProcesso" value="<?= $idProcesso; ?>" />
        <div class="form-row">
          <div class="col text-center">
            <?php if(strtotime(date("d-m-Y")) > strtotime(str_replace("/", "-", $processo->getDataLimiteCandidatar()))): ?>
              <p class="lead text-muted"><strong>Incrições encerradas!</strong></p>
              <a href="index.php" class="btn btn-warning btn-lg float-right">Retornar</a>
            <?php elseif(isset($_SESSION['cnpj'])): ?>
              <a href="recrutador.php" class="btn btn-warning btn-lg float-right">Retornar</a>
            <?php elseif ($candidatoProcesso->getCpf() == NULL) : ?>
              <input type="submit" name="btnCandidatar" id="btnCandidatar" class="btn btn-warning btn-lg float-right" value="Candidatar-se!" />
            <?php else : ?>
              <p class="lead text-muted"><strong>Você já é candidato!</strong></p>
              <input type="submit" name="btnTestes" id="btnTestes" class="btn btn-success btn-lg float-right" value="Visualizar Testes" />
            <?php endif; ?>


          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>