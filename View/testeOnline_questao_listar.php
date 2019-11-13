<?php
session_start();

include_once "../Model/Conexao.php";
include_once "../Model/Questao.php";
include_once "../Model/TesteOnline.php";
include_once "../Controller/TesteOnlineDAO.php";
include_once "../Controller/QuestaoDAO.php";

$conn = new Conexao();

$testeOnline = new TesteOnline();
$questao = new Questao();

$testeOnlineDAO = new TesteOnlineDAO($conn);
$questaoDAO = new QuestaoDAO($conn);

$testeOnline->setIdTesteOnline($_GET['idTesteOnline']);
$testeOnline->setCnpj($_SESSION['cnpj']);
$questao->setIdTesteOnline($_GET['idTesteOnline']);
$questao->setCnpj($_SESSION['cnpj']);

$testeOnlineDAO->Listar($testeOnline);
$arrayQuestao = $questaoDAO->Listar($questao);

?>

<?php include_once 'headerRecrut.php'; ?>

<div style="background-color:#c1ddf3">
  <div class="container">

    <section>

      <div class="container-small">
        <div class="row">
          <div class="col">
            <h4 class="d-inline" id="idTesteOnline"><?= $testeOnline->getIdTesteOnline(); ?></h4>
            <h4 class="d-inline">&nbsp;- <?= $testeOnline->getNomeTesteOnline(); ?></h4>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <input type="hidden" id="txtCnpj" name="txtCnpj" value="<?= $_SESSION['cnpj']; ?>">

          <div class="accordion" id="accordionQuestao">

            <?php foreach ($arrayQuestao as $reg) : ?>

              <div class="card" id=cardQuestao>
                <div class="card-header" id="questao<?= $reg->getIdQuestao(); ?>" data-toggle="collapse" data-target="#collapse<?= $reg->getIdQuestao(); ?>" aria-expanded="true" aria-controls="collapse<?= $reg->getIdQuestao(); ?>">
                  Questão <?= $reg->getIdQuestao(); ?>
                </div>

                <div id="collapse<?= $reg->getIdQuestao(); ?>" class="collapse" aria-labelledby="questao<?= $reg->getIdQuestao(); ?>" data-parent="#accordionQuestao">
                  <div class="card-body">
                    <div class="row">

                      <div class="col-lg-7">
                        <h5 class="card-title justify"><?= $reg->getQuestao(); ?></h5>
                        <p>Alternativa correta: <strong>(<?= $reg->getResposta(); ?>) <?= $reg->getRespostaCorreta(); ?></strong></p>
                        <p>Responder em <strong><?= $reg->getTempo(); ?> segundos</strong></p>
                      </div>

                      <div class="col-lg-5 text-right">
                        <a class="btn btn-outline-dark btn-mg" href="testeOnline_questao_alterar.php?idTesteOnline=<?= $reg->getIdTesteOnline(); ?>&idQuestao=<?= $reg->getIdQuestao(); ?>" role="button">Alterar</a>
                        <button class="btn btn-danger btn-mg" id="btnExcluir" type="button" value="<?= $reg->getIdQuestao(); ?>">Excluir</button>
                      </div>

                    </div>
                  </div>
                </div>

              </div>

            <?php endforeach; ?>

          </div>

          <div class="container-small">
            <div class="row">
              <div class="col text-center">
                <a href="testeOnline_questao_inserir.php?idTeste=<?= $testeOnline->getIdTesteOnline(); ?>&nomeTeste=<?= $testeOnline->getNomeTesteOnline(); ?>" class="btn btn-primary btn-lg">Adicionar Questões</a>
                <a href="testeOnline.php" class="btn btn-outline-dark btn-lg">Voltar</a>
              </div>
            </div>
          </div>

        </div>
      </div>

    </section>
  </div>
</div>

<?php include 'footer.php'; ?>