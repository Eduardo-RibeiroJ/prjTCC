<?php

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

if (isset($_POST['btnVisualizarPerfil'])) {
  $cpf = $_POST['txtCpf'];
  $idProcesso = $_POST['txtIdProcesso'];
} else {
  header('Location: index.php');
}

//Aqui é o CPF da session
$candidato->setCpf($cpf);
$formacao->setCpf($cpf);
$curso->setCpf($cpf);
$empresa->setCpf($cpf);
$competencia->setCpf($cpf);
$objetivo->setCpf($cpf);

$candidatoDAO->Listar($candidato);
$objetivoDAO->Listar($objetivo);
$arrayFormacao = $formacaoDAO->Listar($formacao);
$arrayCurso = $cursoDAO->Listar($curso);
$arrayEmpresa = $empresaDAO->Listar($empresa);
$arrayCompetencia = $competenciaDAO->Listar($competencia);

include_once 'headerRecrut.php';
?>

  <section class="masthead" id="sectionProcesso1" style="background-image: linear-gradient(to left, rgba(188, 216, 238, 1), rgba(145,184,217,1));">
    <div class="container pb-2" style="background-color: #FFF">

      <div class="jumbotron p-1 px-md-5 pb-md-0" style="background-color: #FFF">
        <h5 class="display-3"><?= $candidato->getNome() ?> <?= $candidato->getSobrenome() ?></h1>
          <h6 class="lead mb-0"><?= $candidato->getEstadoCivil() ?>, <?= $candidato->getIdade() ?> anos</h6>
          <h6 class="lead mb-0"><?= $candidato->getEndereco() ?> - CEP: <?= $candidato->getCep() ?></h6>
          <h6 class="lead mb-0"><?= $candidato->getBairro() ?>, <?= $candidato->getCidade() ?>-<?= $candidato->getEstado() ?></h6>
          <h6 class="lead mb-0">Contato: <?= $candidato->getTel1() ?> <?= $candidato->getTel2() == '' ? '' : '- ' . $candidato->getTel2() ?></h6>
          <h6 class="lead mb-0">E-mail: <?= $candidato->getEmail() ?></h6>
          <?php if ($candidato->getLinkedin()) : ?>
            <h6 class="lead mb-0">LinkedIn: <?= $candidato->getLinkedin() ?></h6>
          <?php endif; ?>
          <?php if ($candidato->getFacebook()) : ?>
            <h6 class="lead mb-0">Facebook: <?= $candidato->getFacebook() ?></h6>
          <?php endif; ?>
          <?php if ($candidato->getSitePessoal()) : ?>
            <h6 class="lead mb-0">Site Pessoal: <?= $candidato->getSitePessoal() ?></h6>
          <?php endif; ?>

          <hr class="my-2 my-md-4">

          <div class="row mt-2">
            <div class="col-12">
              <p class="lead mb-1 text-uppercase"><strong>Objetivo Profissional</strong></p>
              <ul>
                <li>
                  <p class="mb-0">Atuar como: <strong><?= $objetivo->getCargo()->getNomeCargo(); ?></strong></p>
                </li>
                <li>
                  <p class="mb-0">Nível: <strong><?= $objetivo->getNivel(); ?></strong></p>
                </li>
                <li>
                  <p class="mb-0">Pretenção salarial: <strong>R$ <?= $objetivo->getPretSal(); ?></strong></p>
                </li>
              </ul>
            </div>
          </div>

          <?php if ($arrayCompetencia) : ?>
            <div class="row">
              <div class="col-12">
                <p class="lead mb-1 text-uppercase mt-3"><strong>Competências</strong></p>
                <ul>
                  <?php foreach ($arrayCompetencia as $reg) : ?>
                    <li>
                      <p class="mb-0"><strong><?= $reg->getCompetencia(); ?></strong>, nível <?= $reg->getNivel(); ?></p>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          <?php else : ?>
            <p class="lead mt-3 mb-3">O candidato não tem competências cadastradas.</p>
          <?php endif; ?>


          <?php if ($arrayFormacao) : ?>
            <div class="row">
              <div class="col-12">
                <p class="lead mb-1 text-uppercase mt-3"><strong>Formação Acadêmica</strong></p>
                <?php foreach ($arrayFormacao as $reg) : ?>
                  <h5><?= $reg->getTipo(); ?></h5>
                  <p class="mb-0"><strong><?= $reg->getNomeCurso(); ?></strong>, <?= $reg->getNomeInstituicao(); ?></p>
                  <p class="mb-0">De <?= date("d/m/Y", strtotime($reg->getDataInicio())); ?> a <?= date("d/m/Y", strtotime($reg->getDataTermino())); ?></p>

                  <p class="mb-0"><?= $reg->getEstado(); ?></p>
                  <hr>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>

          <?php if ($arrayCurso) : ?>
            <div class="row">
              <div class="col-12">
                <p class="lead mb-1 text-uppercase"><strong>Cursos Complementares</strong></p>
                <?php foreach ($arrayCurso as $reg) : ?>
                  <p class="mb-0"><strong><?= $reg->getNomeCurso(); ?></strong>, <?= $reg->getNomeInstituicao(); ?></p>
                  <p class="mb-0">Concluído em <?= date("d/m/Y", strtotime($reg->getAnoConclusao())); ?></strong> - <?= $reg->getCargaHoraria(); ?> horas de curso</p>
                  <hr>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>

          <?php if ($arrayEmpresa) : ?>
            <div class="row">
              <div class="col-12">
                <p class="lead mb-1 text-uppercase mt-3"><strong>Experiência Profissional</strong></p>
                <?php foreach ($arrayEmpresa as $reg) : ?>
                  <h5><?= $reg->getNomeEmpresa(); ?></h5>
                  <p class="mb-0"><strong><?= $reg->getCargo(); ?></strong></p>
                  <p class="mb-0"><?= $reg->getAtividades(); ?></p>
                  <p class="mb-0">De <?= date("d/m/Y", strtotime($reg->getDataInicio())); ?> <?= $reg->getDataSaida() == 0000-00-00 ? 'até agora': 'a '. date("d/m/Y", strtotime($reg->getDataSaida())) ?></p>
                  <hr>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>

          <div class="row">
            <div class="col">
              <form method="POST" action="processo_listagem_candidato.php">
                <input type="hidden" name="txtIdProcesso" id="txtIdProcesso" value="<?= $idProcesso ?>" />
                <input type="submit" name="btnVisualizarCandidatos" id="btnVisualizarCandidatos" class="btn btn-warning btn-lg float-right" value="Voltar" />
              </form>
            </div>
          </div>

      </div>
      <!--jumbotron -->
    </div>
    <!--container -->

  </section>

  <?php include 'footer.php'; ?>