<?php
session_start();

include_once "../Model/Conexao.php";

include_once "../Model/Candidato.php";
include_once "../Model/ProcessoSeletivo.php";
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

include_once "../Controller/CandidatoDAO.php";
include_once "../Controller/ProcessoSeletivoDAO.php";
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

$conn = new Conexao();
$processo = new ProcessoSeletivo();
$processoDAO = new ProcessoSeletivoDAO($conn);
$candidatoProcesso = new CandidatoProcesso();
$candidatoProcessoDAO = new CandidatoProcessoDAO($conn);

if(isset($_POST['btnVisualizarCandidatos'])) {
  $idProcesso = $_POST['txtIdProcesso'];

  $processo->setIdProcesso($idProcesso);
  $processoDAO->Listar($processo);

  $candidatoProcesso->setIdProcesso($idProcesso);
  $arrayCandidatos = $candidatoProcessoDAO->Listar($candidatoProcesso);

} else {
  header('Location: index.php');
}

include_once 'headerRecrut.php'

?>

<div>

  <div class="container">

    <div class="row">
      <div class="col-12">
        <h5 class="display-4">Vaga para <strong><?= $processo->getCargo()->getNomeCargo(); ?></strong>, encerra em <?= $processo->getDataLimiteCandidatar(); ?>.</h4>
      <p class="lead text-muted">49 candidatos</p>
      </div>
    </div>
    <hr>

    <!-- CARD DO CANDIDATO-->


    <?php if($arrayCandidatos): ?>
      <div id="accordion">
              
        <?php foreach($arrayCandidatos as $reg): ?>
          <div class="card">
            <div class="card-header" id="heading<?= $reg->getCpf() ?>">
              <h5 class="d-inline"><?= $reg->getNome() ?> <?= $reg->getSobrenome() ?></h5>
              <button class="btn btn-outline-primary float-right d-inline" data-toggle="collapse" data-target="#collapse<?= $reg->getCpf() ?>" aria-expanded="true" aria-controls="collapse<?= $reg->getCpf() ?>">
                <i class="fas fa-search"></i>
              </button>
            </div>

            <div id="collapse<?= $reg->getCpf() ?>" class="collapse" aria-labelledby="heading<?= $reg->getCpf() ?>" data-parent="#accordion">
              <div class="card-body">
                <div class="card-text">
                  <form method="POST" action="candidato_cv.php">
                    <input type="hidden" id="txtCpf" name="txtCpf" value="<?= $reg->getCpf() ?>" />
                    <input type="hidden" id="txtIdProcesso" name="txtIdProcesso" value="<?= $idProcesso ?>" />

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

                        $processoCandPergunta = new ProcessoCandPergunta();
                        $processoCandPerguntaDAO = new ProcessoCandPerguntaDAO($conn);
                        $processoCandPergunta->setCpf($reg->getCpf());
                        $processoCandPergunta->setIdProcesso($processo->getIdProcesso());
                        $arrayPerguntas = $processoCandPerguntaDAO->Listar($processoCandPergunta);
                      
                      ?>

                      <div class="row">
                        <?php if($arrayCompetencias): ?>

                          <div class="col-12 col-lg-6">
                            <p class="lead mb-0"><strong>Competências</strong></p>
                            <ul>
                            <?php foreach($arrayCompetencias as $reg): ?>
                              <li><strong><?= $reg->getCompetencia(); ?></strong>, nível <?= $reg->getNivel(); ?></li>
                            <?php endforeach; ?>
                            </ul>
                          
                          </div>
                        <?php else: ?>
                          <p class="lead">O candidato não tem competências cadastradas.</p>
                        <?php endif; ?>

                        <?php if($arrayTestes): ?>

                            <div class="col-12 col-lg-6">
                              <p class="lead mb-0"><strong>Testes Online Realizados</strong></p>
                              <ul>
                              <?php foreach($arrayTestes as $reg): ?>
                                <?php
                                  $testeOnline = new TesteOnline();
                                  $testeOnlineDAO = new TesteOnlineDAO($conn);

                                  $testeOnline->setIdTesteOnline($reg->getIdTesteOnline());
                                  $testeOnline->setCnpj($processo->getCnpj());
                                  $testeOnlineDAO->Listar($testeOnline);
                                ?>

                                <li>Teste de <?= $testeOnline->getNomeTesteOnline()?>: <strong><?= $reg->getResultado(); ?> acertos </strong> entre <?= $testeOnline->getQuantidadeQuestoes(); ?> perguntas.</li>
                              <?php endforeach; ?>
                              </ul>
                            </div>
                        <?php else: ?>
                          <p class="lead">O candidato não realizou nenhum teste online.</p>
                        <?php endif; ?>
                      </div>

                      <?php if($arrayPerguntas): ?>
                        
                        <div class="row">
                          <div class="col-12">
                            <p class="lead mb-0"><strong>Perguntas</strong></p>
                          </div>
                        </div>

                          <?php foreach($arrayPerguntas as $reg): ?>
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
                          
                      <?php else: ?>
                              <p class="lead">O candidato não respondeu as perguntas.</p>
                      <?php endif; ?>

                    <button type="submit" id="btnVisualizarPerfil" name="btnVisualizarPerfil" class="btn btn-warning float-right mb-2">Visualizar Perfil</button>
                  </form>
                </div>
              </div>
            </div>
          </div> <!-- card -->

        <?php endforeach; ?>
      </div> <!-- accordion -->
    <?php else: ?>
      <p class="lead">Não há candidatos, divulgue seu processo seletivo!</p>
    <?php endif; ?>


    <div class="row">
      <div class="col">
        <div class="card">

          <div class="card-header" id="">
            <span>Arnoldo Barreto Neto</span>
            <button name="btnAbrir" id="btnAbrir" class="btn btn-outline-primary float-right d-inline" data-toggle="collapse" data-target="#collapseCandidato">
              <i class="fas fa-search"></i>
            </button>
          </div>

          <div id="collapseCandidato" class="collapse">
            <div class="card-body">
              <div class="card-text">
                <div class="form-row">

                  <div class="col-lg-4 col-md-5">
                    <h6 class="card-title text-uppercase text-muted mb-2">Competências</h6>
                    <ul>
                      <li>Desenvolvimento de pessoas</li>
                      <li>Trabalho em equipe</li>
                      <li>Análise de mercado financeiro</li>
                      <li>Coaching quântico</li>
                      <li>Mildfsdffsdfsdfk</li>
                      <li>Msdfssdfdfsdfsilk</li>
                      <li>Misdfsdsdfsdfsdlk</li>
                      <li>Mifssdfdflk</li>
                      <li>Misdfsdfsdflk</li>
                    </ul>
                  </div>

                  <div class="col-lg-3 col-md-3 ml-3">
                    <h6 class="card-title text-uppercase text-muted mb-1">Matemática</h6>
                    <span class="h2 mb-0 card-title">10</span>
                    <h6 class="card-title text-uppercase text-muted mb-1">Português</h6>
                    <span class="h2 mb-0">10</span>
                    <h6 class="card-title text-uppercase text-muted mb-1">Raciocínio lógico</h6>
                    <span class="h2 mb-0">10</span>
                    <h6 class="card-title text-uppercase text-muted mb-1">Inglês</h6>
                    <span class="h2 mb-0 card-title">10</span>
                  </div>
                  <div class="col-lg-3 col-md-3 ml-3">
                    <h6 class="card-title text-uppercase text-muted mb-1">Testes específicos 1</h6>
                    <span class="h2 mb-0 card-title">10</span>
                    <h6 class="card-title text-uppercase text-muted mb-1">Testes específicos 2</h6>
                    <span class="h2 mb-0">10</span>
                    <h6 class="card-title text-uppercase text-muted mb-1">Testes específicos 3</h6>
                    <span class="h2 mb-0">10</span>
                    <h6 class="card-title text-uppercase text-muted mb-1">Testes específicos 4</h6>
                    <span class="h2 mb-0 card-title">10</span>
                  </div>

                </div> <!-- form-row -->

                <div class="form-row">
                  <h3 class="pr-5 mt-3">Perguntas</h3>
                  <div class="row">
                    <div class="card-body">
                      <h5 class="card-title text-uppercase text-muted mb-2">Por quê</h5>
                      <span class="h6 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sagittis elit mattis, ultricies lorem vitae, tristique ipsum. Cras facilisis euismod tortor non posuere. Duis nisl lorem, gravida eget ex et, accumsan ornare quam. Vivamus in tortor varius, bibendum enim at, imperdiet felis. Curabitur accumsan maximus velit sed sagittis. Praesent vitae placerat quam. Nunc efficitur nunc nisl, at elementum elit pharetra vitae. Morbi lacinia lobortis eros, id euismod elit vestibulum quis. Duis consectetur feugiat quam vitae sodales. Nullam bibendum eu tellus et faucibus. Vivamus posuere congue ullamcorper. Duis ac ligula lacinia, sollicitudin nunc sit amet, vulputate dolor.</span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="card-body">
                      <h5 class="card-title text-uppercase text-muted mb-2">Por quê</h5>
                      <span class="h6 mb-0">Cras facilisis euismod tortor non posuere. Duis nisl lorem, gravida eget ex et, accumsan ornare quam. Vivamus in tortor varius, bibendum enim at, imperdiet felis. Curabitur accumsan maximus velit sed sagittis. Praesent vitae placerat quam. Nunc efficitur nunc nisl, at elementum elit pharetra vitae. Morbi lacinia lobortis eros, id euismod elit vestibulum quis. Duis consectetur feugiat quam vitae sodales. Nullam bibendum eu tellus et faucibus. Vivamus posuere congue ullamcorper. Duis ac ligula lacinia, sollicitudin nunc sit amet, vulputate dolor.</span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="card-body">
                      <h5 class="card-title text-uppercase text-muted mb-2">Por quê</h5>
                      <span class="h6 mb-0">Curabitur accumsan maximus velit sed sagittis. Praesent vitae placerat quam. Nunc efficitur nunc nisl, at elementum elit pharetra vitae. Morbi lacinia lobortis eros, id euismod elit vestibulum quis. Duis consectetur feugiat quam vitae sodales. Nullam bibendum eu tellus et faucibus. Vivamus posuere congue ullamcorper. Duis ac ligula lacinia, sollicitudin nunc sit amet, vulputate dolor.</span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="card-body">
                      <h5 class="card-title text-uppercase text-muted mb-2">Por quê</h5>
                      <span class="h6 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. , vulputate dolor.</span>
                    </div>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col">
                    <a href="candidato_perfil.php" class="btn btn-primary float-right">Visualizar Perfil</a>
                  </div>
                </div>

              </div><!-- card-text -->
            </div><!-- card-body -->
          </div>
          <!--collapseCandidato-->

        </div>
        <!--card-->
      </div>
      <!--col-->
    </div>
    <!--row-->

  </div>
</div>
<?php include 'footer.php'; ?>