<?php

include_once 'headerCand.php';

include_once "../Model/Conexao.php";
include_once "../Model/Candidato.php";
include_once "../Controller/CandidatoDAO.php";

include_once "../Model/CandidatoFormacao.php";
include_once "../Controller/CandidatoFormacaoDAO.php";

include_once "../Model/CandidatoCurso.php";
include_once "../Controller/CandidatoCursoDAO.php";

include_once "../Model/CandidatoEmpresa.php";
include_once "../Controller/CandidatoEmpresaDAO.php";

include_once "../Model/CandidatoCompetencia.php";
include_once "../Controller/CandidatoCompetenciaDAO.php";

include_once "../Model/CandidatoObjetivo.php";
include_once "../Controller/CandidatoObjetivoDAO.php";

include_once "../Model/Cargo.php";
include_once "../Controller/CargoDAO.php";

$conn = new Conexao();
$candidato = new Candidato();
$candidatoDAO = new CandidatoDAO($conn);

$formacao = new CandidatoFormacao();
$formacaoDAO = new CandidatoFormacaoDAO($conn);

$curso = new CandidatoCurso();
$cursoDAO = new CandidatoCursoDAO($conn);

$empresa = new CandidatoEmpresa();
$empresaDAO = new CandidatoEmpresaDAO($conn);

$competencia = new CandidatoCompetencia();
$competenciaDAO = new CandidatoCompetenciaDAO($conn);

$objetivo = new CandidatoObjetivo();
$objetivoDAO = new CandidatoObjetivoDAO($conn);

//Aqui é o CPF da session
$candidato->setCpf($_SESSION['cpf']);
$formacao->setCpf($_SESSION['cpf']);
$curso->setCpf($_SESSION['cpf']);
$empresa->setCpf($_SESSION['cpf']);
$competencia->setCpf($_SESSION['cpf']);
$objetivo->setCpf($_SESSION['cpf']);

$candidatoDAO->Listar($candidato);
$arrayFormacao = $formacaoDAO->Listar($formacao);
$arrayCurso = $cursoDAO->Listar($curso);
$arrayEmpresa = $empresaDAO->Listar($empresa);
$arrayCompetencia = $competenciaDAO->Listar($competencia);
$objetivo = $objetivoDAO->Listar($objetivo);

function mask($val, $mask)
{
  $maskared = '';
  $k = 0;
  for ($i = 0; $i <= strlen($mask) - 1; $i++) {
    if ($mask[$i] == '#') {
      if (isset($val[$k]))
        $maskared .= $val[$k++];
    } else {
      if (isset($mask[$i]))
        $maskared .= $mask[$i];
    }
  }
  return $maskared;
}


?>

<div style="background-image: linear-gradient(to left, rgba(220, 240, 255, 1), rgba(130,175,210,1));">
  <div class="container">

    <section id="sectionCandidatoPerfil">

      <div class="row">
        <div class="col">

          <input type="hidden" id="cpf" name="cpf" value="<?= $candidato->getCpf(); ?>">

          <div class="card mb-2">

            <div class="card-header" id="candidatoDadosPessoais">
              <p class="d-inline" data-toggle="collapse" data-target="#collapsecandidatoDadosPessoais" aria-expanded="true" aria-controls="collapsecandidatoDadosPessoais">Dados Pessoais</p>
              <a href="candidato_alterar.php" name="btnAlterarDadosPessoais" id="btnAlterarDadosPessoais" class="btn btn-outline-primary float-right">
                <i class="fas fa-pencil-alt"></i>
              </a>
            </div>

            <div id="collapsecandidatoDadosPessoais" class="collapse show" aria-labelledby="candidatoDadosPessoais">

              <div class="card-body">
                <div class="card-text">

                  <div class="row">
                    <div class="col">
                      <h4 class="display-4 mb-4">
                        <?= $candidato->getNome(); ?> <?= $candidato->getSobrenome(); ?>
                      </h4>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <p><strong>Data de Nascimento: </strong><?= date("d/m/Y", strtotime($candidato->getDataNasc())); ?></p>
                      <p><strong>Estado Civil: </strong><?= $candidato->getEstadoCivil(); ?></p>
                      <p><strong>Sexo: </strong><?= $candidato->getSexo(); ?></p>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card mb-2">

            <div class="card-header" id="candidatoEndereco">
              <p class="d-inline" data-toggle="collapse" data-target="#collapseCandidatoEndereco" aria-expanded="true" aria-controls="collapseCandidatoEndereco">Endereço</p>
              <a href="candidato_alterar.php" name="btnAlterarEndereco" id="btnAlterarEndereco" class="btn btn-outline-primary float-right">
                <i class="fas fa-pencil-alt"></i>
              </a>
            </div>

            <div id="collapseCandidatoEndereco" class="collapse show" aria-labelledby="candidatoEndereco">

              <div class="card-body">
                <div class="card-text">

                  <div class="row">
                    <div class="col">

                      <p><strong>CEP: </strong>
                        <?php $cep = $candidato->getCep();
                        echo mask($cep, '#####-###'); ?></p>
                      </p>
                      <p><strong>Endereço: </strong><?= $candidato->getEndereco(); ?></p>
                      <p><strong>Bairro: </strong><?= $candidato->getBairro(); ?></p>
                      <p><strong>Cidade: </strong><?= $candidato->getCidade(); ?> - <?= $candidato->getEstado(); ?></p>

                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="card mb-2">

            <div class="card-header" id="candidatoContato">
              <p class="d-inline" data-toggle="collapse" data-target="#collapsecandidatoContato" aria-expanded="true" aria-controls="collapsecandidatoContato">Contato</p>
              <a href="candidato_alterar.php" name="btnAlterarContato" id="btnAlterarContato" class="btn btn-outline-primary float-right">
                <i class="fas fa-pencil-alt"></i>
              </a>
            </div>

            <div id="collapsecandidatoContato" class="collapse show" aria-labelledby="candidatoContato">

              <div class="card-body">
                <div class="card-text">

                  <div class="row">
                    <div class="col">

                      <p><strong>E-mail: </strong><?= $candidato->getEmail(); ?></p>
                      <p><strong>Telefone Celular: </strong>
                        <?php $tel1 = $tel1 = $candidato->getTel1() == "" ? '' : '' . mask($candidato->getTel1(), '(##)#####-####');
                        echo $tel1 ?></p>
                      </p>
                      <p><strong>Telefone Fixo: </strong>
                        <?php $tel2 = $candidato->getTel2() == "" ? '' : '' . mask($candidato->getTel2(), '(##)####-####');
                        echo $tel2 ?>
                      </p>
                      <p><strong>LinkedIn: </strong><?= $candidato->getLinkedin(); ?></p>
                      <p><strong>Facebook: </strong><?= $candidato->getFacebook(); ?></p>
                      <p><strong>Site Pessoal: </strong><?= $candidato->getSitePessoal(); ?></p>

                    </div>

                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="card mb-2">

            <div class="card-header" id="candidatoObjetivo">
              <p class="d-inline" data-toggle="collapse" data-target="#collapsecandidatoObjetivo" aria-expanded="true" aria-controls="collapsecandidatoObjetivo">Objetivo Profissional</p>
              <a href="candidato_alterar_objetivo.php" name="btnAlterarObjetivo" id="btnAlterarObjetivo" class="btn btn-outline-primary float-right">
                <i class="fas fa-pencil-alt"></i>
              </a>
            </div>

            <div id="collapsecandidatoObjetivo" class="collapse show" aria-labelledby="candidatoObjetivo">

              <div class="card-body">
                <div class="card-text">

                  <div class="row">
                    <div class="col">

                      <p>Atuar como <strong><?= $objetivo->getCargo()->getNomeCargo(); ?></strong>, nível <?= $objetivo->getNivel(); ?></p>
                      <p>Pretensão salarial: R$ <?= $objetivo->getPretSal(); ?></p>

                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="card mb-2">

            <div class="card-header" id="candidatoCompetencia">
              <p class="d-inline" data-toggle="collapse" data-target="#collapsecandidatoCompetencia" aria-expanded="true" aria-controls="collapsecandidatoCompetencia">Idiomas e Competências</p>
              <a href="candidato_inserir_competencia.php" name="btnAlterarCompetencia" id="btnAlterarCompetencia" class="btn btn-outline-primary float-right">
                <i class="fas fa-pencil-alt"></i>
              </a>
            </div>

            <div id="collapsecandidatoCompetencia" class="collapse show" aria-labelledby="candidatoCompetencia">

              <div class="card-body">
                <div class="card-text">

                  <?php if ($arrayCompetencia) : ?>

                    <ul>

                      <?php foreach ($arrayCompetencia as $reg) : ?>

                        <li><strong><?= $reg->getCompetencia(); ?></strong>, nível <?= $reg->getNivel(); ?></li>

                      <?php endforeach; ?>

                    </ul>

                  <?php else : ?>
                    <p>
                      <strong>Insira seus idiomas e competências!</strong>
                      <a href="candidato_inserir_competencia.php" name="btnAlterarCompetencia" id="btnAlterarCompetencia" class="btn btn-outline-dark ml-4">
                        <i class="fas fa-plus"></i>
                      </a>
                    </p>
                  <?php endif; ?>


                </div>
              </div>
            </div>
          </div>

          <div class="card mb-2">

            <div class="card-header" id="candidatoFormacao">
              <p class="d-inline" data-toggle="collapse" data-target="#collapsecandidatoFormacao" aria-expanded="true" aria-controls="collapsecandidatoFormacao">Formação</p>
              <a href="candidato_inserir_formacao.php" name="btnAlterarFormacao" id="btnAlterarFormacao" class="btn btn-outline-primary float-right">
                <i class="fas fa-pencil-alt"></i>
              </a>
            </div>

            <div id="collapsecandidatoFormacao" class="collapse show" aria-labelledby="candidatoFormacao">

              <div class="card-body">
                <div class="card-text">

                  <?php if ($arrayFormacao) : ?>

                    <?php foreach ($arrayFormacao as $reg) : ?>

                      <div class="row">
                        <div class="col">

                          <h5><?= $reg->getTipo(); ?></h5>
                          <p><strong><?= $reg->getNomeCurso(); ?></strong>, <?= $reg->getNomeInstituicao(); ?></p>
                          <p>De <?= date("d/m/Y", strtotime($reg->getDataInicio())); ?> a <?= date("d/m/Y", strtotime($reg->getDataTermino())); ?></p>
                          <p><?= $reg->getEstado(); ?></p>
                          <hr />

                        </div>
                      </div>

                    <?php endforeach; ?>

                  <?php else : ?>
                    <p>
                      <strong>Insira suas formações acadêmicas!</strong>
                      <a href="candidato_inserir_formacao.php" name="btnAlterarFormacao" id="btnAlterarFormacao" class="btn btn-outline-dark ml-4">
                        <i class="fas fa-plus"></i>
                      </a>
                    </p>
                  <?php endif; ?>


                </div>
              </div>
            </div>
          </div>

          <div class="card mb-2">

            <div class="card-header" id="candidatoCurso">
              <p class="d-inline" data-toggle="collapse" data-target="#collapsecandidatoCurso" aria-expanded="true" aria-controls="collapsecandidatoCurso">Cursos Complementares</p>
              <a href="candidato_inserir_curso.php" name="btnAlterarCurso" id="btnAlterarCurso" class="btn btn-outline-primary float-right">
                <i class="fas fa-pencil-alt"></i>
              </a>
            </div>

            <div id="collapsecandidatoCurso" class="collapse show" aria-labelledby="candidatoCurso">

              <div class="card-body">
                <div class="card-text">

                  <?php if ($arrayCurso) : ?>

                    <?php foreach ($arrayCurso as $reg) : ?>

                      <div class="row">
                        <div class="col">

                          <p><strong><?= $reg->getNomeCurso(); ?></strong>, <?= $reg->getNomeInstituicao(); ?></p>
                          <p>Concluído em <?= date("d/m/Y", strtotime($reg->getAnoConclusao())); ?></p>
                          <p><?= $reg->getCargaHoraria(); ?> horas de curso</p>
                          <hr />

                        </div>
                      </div>

                    <?php endforeach; ?>

                  <?php else : ?>
                    <p>
                      <strong>Insira seus cursos complementares!</strong>
                      <a href="candidato_inserir_curso.php" name="btnAlterarCurso" id="btnAlterarCurso" class="btn btn-outline-dark ml-4">
                        <i class="fas fa-plus"></i>
                      </a>
                    </p>
                  <?php endif; ?>


                </div>
              </div>
            </div>
          </div>

          <div class="card mb-2">

            <div class="card-header" id="candidatoEmpresa">
              <p class="d-inline" data-toggle="collapse" data-target="#collapsecandidatoEmpresa" aria-expanded="true" aria-controls="collapsecandidatoEmpresa">Experiência Profissional</p>
              <a href="candidato_inserir_empresa.php" name="btnAlterarEmpresa" id="btnAlterarEmpresa" class="btn btn-outline-primary float-right">
                <i class="fas fa-pencil-alt"></i>
              </a>
            </div>

            <div id="collapsecandidatoEmpresa" class="collapse show" aria-labelledby="candidatoEmpresa">

              <div class="card-body">
                <div class="card-text">

                  <?php if ($arrayEmpresa) : ?>

                    <?php foreach ($arrayEmpresa as $reg) : ?>

                      <div class="row">
                        <div class="col">

                          <h5><?= $reg->getNomeEmpresa(); ?></h5>
                          <p><strong><?= $reg->getCargo(); ?></strong></p>
                          <p><?= $reg->getAtividades(); ?></p>
                          <p>De <?= date("d/m/Y", strtotime($reg->getDataInicio())); ?> <?= $reg->getDataSaida() == 0000 - 00 - 00 ? 'até agora' : 'a ' . date("d/m/Y", strtotime($reg->getDataSaida())) ?></p>
                          <hr />

                        </div>
                      </div>

                    <?php endforeach; ?>

                  <?php else : ?>
                    <p>
                      <strong>Insira suas últimas experiências profissionais!</strong>
                      <a href="candidato_inserir_empresa.php" name="btnAlterarEmpresa" id="btnAlterarEmpresa" class="btn btn-outline-dark ml-4">
                        <i class="fas fa-plus"></i>
                      </a>
                    </p>
                  <?php endif; ?>


                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="row">
        <div class="col">
          <a href="candidato.php" class="btn btn-primary float-right">Voltar</a>
        </div>
      </div>

    </section>

  </div>
</div>

<?php include 'footer.php'; ?>