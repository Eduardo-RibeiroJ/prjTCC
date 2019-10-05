<?php
include_once "../Model/Conexao.php";
include_once "../Model/Pergunta.php";
include_once "../Controller/PerguntaDAO.php";

$conn = new Conexao();
$pergunta = new Pergunta();
$perguntaDAO = new PerguntaDAO($conn);
$arrayPergunta = $perguntaDAO->Listar($pergunta);

?>

<?php include_once 'header.php'; ?>

<div class="container">

  <section id="sectionCardsPergunta">
    <div class="jumbotron p-3 p-md-5">
      <div class="container p-0">
        <h5 class="display-4 display-md-2"><i class="fas fa-tasks d-none d-md-inline"> </i>Crie um questionário personalizado!</h1>

          <hr class="my-2 my-md-4">
          <div class="form-row">
            <div class="form-group col-lg-10">
              <p class="lead">Fique a vontade para utilizar as perguntas já criadas. Aqui você poderá adicionar mais perguntas para o processo seletivo, e assim poder conhecer melhor os candidatos.</p>
            </div>
          </div>

            <div class="form-row">
              <div class="form-group col-lg-10">
                <textarea class="form-control" type="text" name="txtPergunta" id="txtPergunta" rows="4" placeholder="Insira uma pergunta..." required autofocus></textarea>
              </div>

              <div class="form-group col-lg-2 text-center">
                <input type="submit" name="btnAlterarSalvarPergunta" id="btnAlterarSalvarPergunta" class="btn btn-primary btn-mg" value="Criar" />
              </div>
            </div>
      </div>
  </section>
</div>

<section>
  <div class="row">
    <div class="col">
      <h4>Pergunta Disponíveis</h4>
    </div>
  </div>

  <div class="accordion" id="accordionPergunta">

    <?php foreach ($arrayPergunta as $reg) : ?>

      <div class="card" id=cardTesteOnline>
        <div class="card-header" id="teste<?= $reg->getIdPergunta(); ?>" data-toggle="collapse" data-target="#collapse<?= $reg->getIdPergunta(); ?>" aria-expanded="true" aria-controls="collapse<?= $reg->getIdPergunta(); ?>">
          <?= $reg->getIdPergunta(); ?> - <?= $reg->getPergunta(); ?>
        </div>

        <div id="collapse<?= $reg->getIdPergunta(); ?>" class="collapse" aria-labelledby="teste<?= $reg->getIdPergunta(); ?>" data-parent="#accordionTesteOnline">
          <div class="card-body">
            <div class="row">

              <div class="col-lg-7">
                <h5 class="card-title">Pergunta: <?= $reg->getPergunta(); ?></h5>
              </div>

              <div class="col-lg-5 text-center">
                <a class="btn btn-outline-dark btn-mg" href="testeOnline_questao_listar.php?idPergunta=<?= $reg->getIdPergunta(); ?>&pergunta=<?= $reg->getPergunta(); ?>">Visualizar Questões</a>
                <button class="btn btn-danger" id="btnExcluir" type="button" value="<?= $reg->getIdPergunta(); ?>">Excluir a pergunta</button>
              </div>

            </div>
          </div>
        </div>

      </div>

    <?php endforeach; ?>

  </div>

</section>
</div>

<?php include 'footer.php'; ?>