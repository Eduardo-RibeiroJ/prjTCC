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


<section class="masthead" id="sectionProcesso1" style="background: url(imagem/90464.jpg); background-size: cover;">
  <div class="container" style="background-color: #FFF">

    <div class="jumbotron p-3 p-md-5" style="background-color: #FFF">
      <div class="container p-0">
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
                  <p class="mb-0"><strong>Atuar como: </strong> Porteiro</p>
                </li>
                <li>
                  <p class="mb-0"><strong>Nível: </strong> Junior</p>
                </li>
                <li>
                  <p class="mb-0"><strong>Pretenção salarial: </strong> R$2800,00</p>
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
            <?php else : ?>
              <p class="lead">O candidato não tem competências cadastradas.</p>
            </div>
          <?php endif; ?>
      </div>

      <?php if ($arrayFormacao) : ?>
        <div class="row">

          <div class="col-12">
            <p class="lead mb-1 text-uppercase mt-3"><strong>Formação Acadêmica</strong></p>
            <?php foreach ($arrayFormacao as $reg) : ?>
              <h5><?= $reg->getTipo(); ?></h5>
              <p class="mb-0"><strong><?= $reg->getNomeCurso(); ?></strong>, <?= $reg->getNomeInstituicao(); ?></p>
              <p class="mb-0">De <?= $reg->getDataInicio(); ?> a <?= $reg->getDataTermino(); ?></p>
              <p class="mb-0"><?= $reg->getEstado(); ?></p>
              <hr>
            <?php endforeach; ?>

          </div>
        </div>
      <?php endif; ?>
    </div>

    <?php if ($arrayCurso) : ?>
      <div class="row">

        <div class="col-12">
          <p class="lead mb-1 text-uppercase"><strong>Cursos Complementares</strong></p>
          <?php foreach ($arrayCurso as $reg) : ?>
            <p class="mb-0"><strong><?= $reg->getNomeCurso(); ?></strong>, <?= $reg->getNomeInstituicao(); ?></p>
            <p class="mb-0">Concluído em <?= $reg->getAnoConclusao(); ?></strong> - <?= $reg->getCargaHoraria(); ?> horas de curso</p>
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
            <p class="mb-0">De <?= $reg->getDataInicio(); ?> a <?= $reg->getDataSaida(); ?></p>
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
  <!--container p-0 -->
  </div>
  <!--jumbotron -->

  </div>
</section>

<?php include 'footer.php'; ?>