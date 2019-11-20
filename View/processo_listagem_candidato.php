<?php
session_start();

include_once "../Model/Conexao.php";

include_once "../Model/Candidato.php";
include_once "../Model/ProcessoSeletivo.php";
include_once "../Model/ProcessoCompetencia.php";
include_once "../Model/CandidatoProcesso.php";
include_once "../Model/CandidatoCompetencia.php";
include_once "../Model/ProcessoCompetencia.php";
include_once "../Model/ProcessoTeste.php";
include_once "../Model/ProcessoPergunta.php";
include_once "../Model/ProcessoCandTeste.php";
include_once "../Model/ProcessoCandPergunta.php";
include_once "../Model/Cargo.php";
include_once "../Model/TesteOnline.php";
include_once "../Model/Pergunta.php";
include_once "../Model/Competencia.php";

include_once "../Controller/CandidatoDAO.php";
include_once "../Controller/ProcessoSeletivoDAO.php";
include_once "../Controller/ProcessoCompetenciaDAO.php";
include_once "../Controller/CandidatoProcessoDAO.php";
include_once "../Controller/CandidatoCompetenciaDAO.php";
include_once "../Controller/ProcessoCompetenciaDAO.php";
include_once "../Controller/ProcessoTesteDAO.php";
include_once "../Controller/ProcessoPerguntaDAO.php";
include_once "../Controller/ProcessoCandTesteDAO.php";
include_once "../Controller/ProcessoCandPerguntaDAO.php";
include_once "../Controller/CargoDAO.php";
include_once "../Controller/TesteOnlineDAO.php";
include_once "../Controller/PerguntaDAO.php";
include_once "../Controller/CompetenciaDAO.php";

$conn = new Conexao();
$processo = new ProcessoSeletivo();
$processoDAO = new ProcessoSeletivoDAO($conn);
$candidatoProcesso = new CandidatoProcesso();
$candidatoProcessoDAO = new CandidatoProcessoDAO($conn);
$processoCompetencia = new ProcessoCompetencia();
$processoCompetenciaDAO = new ProcessoCompetenciaDAO($conn);

if (isset($_POST['btnVisualizarCandidatos'])) {
  $idProcesso = $_POST['txtIdProcesso'];

  $processo->setIdProcesso($idProcesso);
  $processoDAO->Listar($processo);

  $candidatoProcesso->setIdProcesso($idProcesso);
  $arrayCandidatos = $candidatoProcessoDAO->Listar($candidatoProcesso);

  $processoCompetencia->setIdProcesso($idProcesso);
  $arrayCompProcesso = $processoCompetenciaDAO->Listar($processoCompetencia);
} else {
  header('Location: index.php');
}

include_once 'headerRecrut.php'

?>

<section class="masthead" id="sectionRecrutador" style="background: url(imagem/17209.jpg); background-size: cover;">

  <div class="container">

    <div class="row">
      <div class="col-12">
        <h5 class="display-4">Vaga para <strong><?= $processo->getCargo()->getNomeCargo(); ?></strong></h4>
          <p class="lead text-muted">
            <?php
            $quantCand = $candidatoProcessoDAO->quantCandidatos($candidatoProcesso);
            if ($quantCand == 0)
              echo "Nenhum candidato";
            else if ($quantCand == 1)
              echo "1 candidato";
            else
              echo $quantCand . " candidatos";
            ?>
      </div>
    </div>
    <hr>

    <!-- CARD DO CANDIDATO-->

    <?php $arrayClassifica = array() ?>
    <?php if ($arrayCandidatos) : ?>

      <?php foreach ($arrayCandidatos as $reg) : ?>
        <?php

            $candidatoCompetencia = new CandidatoCompetencia();
            $candidatoCompetenciaDAO = new CandidatoCompetenciaDAO($conn);
            $candidatoCompetencia->setCpf($reg->getCpf());
            $arrayCompetencias = $candidatoCompetenciaDAO->Listar($candidatoCompetencia);

            $processoCandTeste = new ProcessoCandTeste();
            $processoCandTesteDAO = new ProcessoCandTesteDAO($conn);
            $processoCandTeste->setCpf($reg->getCpf());
            $processoCandTeste->setIdProcesso($processo->getIdProcesso());
            $arrayTestes = $processoCandTesteDAO->Listar($processoCandTeste);

            $mediaTestes = 0.0;

            foreach ($arrayTestes as $teste) {
              $resTeste = $processoCandTesteDAO->ListarResultado($teste, $processo);
              $mediaTestes += $resTeste;
            }

            $retornoComp = $candidatoCompetenciaDAO->ListarQuantComp($candidatoCompetencia, $processoCompetencia);

            $arrayClassifica[] = [
              "candidato" => $reg,
              "quantComp" => $retornoComp['quantComp'],
              "pontosNivel" => $retornoComp['pontosNivel'],
              "mediaTestes" => $mediaTestes
            ];

            ?>

      <?php endforeach; ?>
      <?php
        //Ordenando a array

        function comparar($a, $b)
        {
          if ($a['quantComp'] > $b['quantComp'])
            return -1;
          else if ($a['quantComp'] < $b['quantComp'])
            return 1;
          else
            if ($a['pontosNivel'] > $b['pontosNivel'])
            return -1;
          else if ($a['pontosNivel'] < $b['pontosNivel'])
            return 1;
          else
              if ($a['mediaTestes'] > $b['mediaTestes'])
            return -1;
          else if ($a['mediaTestes'] < $b['mediaTestes'])
            return 1;
          else
            return 0;
        }

        usort($arrayClassifica, "comparar");
        ?>

    <?php endif; ?>


    <?php if ($arrayClassifica) : ?>
      <div id="accordion">

        <?php foreach ($arrayClassifica as $cand) : ?>
          <div class="card">
            <div class="card-header" id="heading<?= $cand['candidato']->getCpf() ?>">
              <h5 class="d-inline"><?= $cand['candidato']->getNome() ?> <?= $cand['candidato']->getSobrenome() ?></h5>
              <button class="btn btn-outline-primary float-right d-inline" data-toggle="collapse" data-target="#collapse<?= $cand['candidato']->getCpf() ?>" aria-expanded="true" aria-controls="collapse<?= $cand['candidato']->getCpf() ?>">
                <i class="fas fa-search"></i>
              </button>
            </div>

            <div id="collapse<?= $cand['candidato']->getCpf() ?>" class="collapse" aria-labelledby="heading<?= $cand['candidato']->getCpf() ?>" data-parent="#accordion">
              <div class="card-body">
                <div class="card-text">
                  <form method="POST" action="candidato_cv.php">
                    <input type="hidden" id="txtCpf" name="txtCpf" value="<?= $cand['candidato']->getCpf() ?>" />
                    <input type="hidden" id="txtIdProcesso" name="txtIdProcesso" value="<?= $idProcesso ?>" />

                    <?php

                        $candidatoCompetencia = new CandidatoCompetencia();
                        $candidatoCompetenciaDAO = new CandidatoCompetenciaDAO($conn);
                        $candidatoCompetencia->setCpf($cand['candidato']->getCpf());
                        $arrayCompetencias = $candidatoCompetenciaDAO->ListarCompProc($candidatoCompetencia, $processo);

                        $processoCandTeste = new ProcessoCandTeste();
                        $processoCandTesteDAO = new ProcessoCandTesteDAO($conn);
                        $processoCandTeste->setCpf($cand['candidato']->getCpf());
                        $processoCandTeste->setIdProcesso($processo->getIdProcesso());
                        $arrayTestes = $processoCandTesteDAO->Listar($processoCandTeste);

                        $processoCandPergunta = new ProcessoCandPergunta();
                        $processoCandPerguntaDAO = new ProcessoCandPerguntaDAO($conn);
                        $processoCandPergunta->setCpf($cand['candidato']->getCpf());
                        $processoCandPergunta->setIdProcesso($processo->getIdProcesso());
                        $arrayPerguntas = $processoCandPerguntaDAO->Listar($processoCandPergunta);

                        ?>

                    <div class="row">
                      <?php if ($arrayCompetencias) : ?>

                        <div class="col-12 col-lg-6">
                          <p class="lead mb-0"><strong>Competências Correspondentes</strong></p>
                          <ul>
                            <?php foreach ($arrayCompetencias as $reg) : ?>
                              <li><strong><?= $reg->getCompetencia(); ?></strong>, nível <?= $reg->getNivel(); ?> <i class="fas fa-check text-success"></i></li>
                            <?php endforeach; ?>
                          </ul>

                        </div>
                      <?php else : ?>
                        <div class="col-12 col-lg-6">
                          <p class="lead">O candidato não tem competências correspondentes.</p>
                        </div>
                      <?php endif; ?>

                      <?php if ($arrayTestes) : ?>

                        <div class="col-12 col-lg-6">
                          <p class="lead mb-0"><strong>Testes Online Realizados</strong></p>
                          <ul>
                            <?php foreach ($arrayTestes as $reg) : ?>
                              <?php
                                      $testeOnline = new TesteOnline();
                                      $testeOnlineDAO = new TesteOnlineDAO($conn);

                                      $testeOnline->setIdTesteOnline($reg->getIdTesteOnline());
                                      $testeOnline->setCnpj($processo->getCnpj());
                                      $testeOnlineDAO->Listar($testeOnline);

                                      $resTeste = $processoCandTesteDAO->ListarResultado($reg, $processo);

                                      ?>

                              <li>Teste de <?= $testeOnline->getNomeTesteOnline() ?>: <strong><?= $resTeste ?>% de acertos.</strong></li>
                            <?php endforeach; ?>
                          </ul>
                        </div>
                      <?php else : ?>
                        <div class="col-12 col-lg-6">
                          <p class="lead">O candidato não realizou nenhum teste online.</p>
                        </div>
                      <?php endif; ?>
                    </div>

                    <?php if ($arrayPerguntas) : ?>

                      <div class="row">
                        <div class="col-12">
                          <p class="lead mb-0"><strong>Perguntas</strong></p>
                        </div>
                      </div>

                      <?php foreach ($arrayPerguntas as $reg) : ?>
                        <?php
                                $pergunta = new Pergunta();
                                $perguntaDAO = new PerguntaDAO($conn);

                                $pergunta->setIdPergunta($reg->getIdPergunta());
                                $pergunta->setCnpj($processo->getCnpj());
                                $perguntaDAO->Listar($pergunta);
                                ?>

                        <div class="row">
                          <div class="col-12">
                            <p class="lead mb-0"><?= $pergunta->getPergunta(); ?></p>
                            <p class="mt-0"><?= $reg->getResposta(); ?></p>
                          </div>
                        </div>
                      <?php endforeach; ?>

                    <?php else : ?>
                      <div class="row">
                        <div class="col-12">
                          <p class="lead">O candidato não respondeu nenhuma pergunta.</p>
                        </div>
                      </div>
                    <?php endif; ?>

                    <button type="submit" id="btnVisualizarPerfil" name="btnVisualizarPerfil" class="btn btn-primary float-right mb-3"><i class="fas fa-user-tie"></i> Visualizar Perfil</button>
                  </form>
                </div>
              </div>
            </div>
          </div> <!-- card -->

        <?php endforeach; ?>
      </div> <!-- accordion -->
    <?php else : ?>
      <div class="row">
        <div class="col-12">
          <p class="lead">Não há candidatos, divulgue seu processo seletivo!</p>
          <strong>Link: <a href="processo_seletivo-<?= $processo->getIdProcesso(); ?>">localhost/prjtcc/View/processo_seletivo-<?= $processo->getIdProcesso(); ?></strong></a>
        </div>
      </div>
    <?php endif; ?>

    <div class="row">
      <div class="col-12 text-right mt-2">
        <a href="processo_listagem.php" class="btn btn-warning" id="btnVoltar" name="btnVoltar">Voltar</a>
      </div>
    </div>

  </div>
</section>
<?php include 'footer.php'; ?>