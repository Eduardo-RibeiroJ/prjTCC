<?php
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
$questao->setIdTesteOnline($_GET['idTesteOnline']);

$testeOnlineDAO->Listar($testeOnline);
$arrayQuestao = $questaoDAO->Listar($questao);

?>

<?php include_once 'header.php'; ?>

    <div class="container">

      <section>

        <div class="row">
            <div class="col-lg-9">
              <h3 class="d-inline" id="idTesteOnline"><?= $testeOnline->getIdTesteOnline(); ?></h3>
              <h3 class="d-inline" >&nbsp;- <?= $testeOnline->getNomeTesteOnline(); ?></h3>
            </div>

            <div class="col-lg-3">
              <a href="testeOnline.php?idTesteOnline=<?= $testeOnline->getIdTesteOnline(); ?>" class="btn btn-primary">Voltar</a> 
              <button class="btn btn-primary" type="button" value="">Adicionar Questão</button>
            </div>
        </div>

          <div class="accordion" id="accordionQuestao">
              
              <?php foreach($arrayQuestao as $reg): ?>

              <div class="card" id=cardQuestao>
                <div class="card-header" id="questao<?= $reg->getIdQuestao(); ?>">
                  <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?= $reg->getIdQuestao(); ?>" aria-expanded="true" aria-controls="collapse<?= $reg->getIdQuestao(); ?>">
                      Questão <?= $reg->getIdQuestao(); ?>
                    </button>
                  </h5>
                </div>

                <div id="collapse<?= $reg->getIdQuestao(); ?>" class="collapse" aria-labelledby="questao<?= $reg->getIdQuestao(); ?>" data-parent="#accordionQuestao">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-7">
                        <h5 class="card-title"><?= $reg->getIdQuestao(); ?> - <?= $reg->getQuestao(); ?></h5>
                        <p>Alternativa correta: <?= $reg->getResposta(); ?></p>
                      </div>
                      <div class="col-lg-5 text-center">
                        <a class="btn btn-primary" href="testeOnline_questao_alterar.php?idTesteOnline=<?= $reg->getIdTesteOnline(); ?>&idQuestao=<?= $reg->getIdQuestao(); ?>" role="button">Alterar</a>
                        <button class="btn btn-primary" id="btnExcluir" type="button" value="<?= $reg->getIdQuestao(); ?>">Excluir</button>
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
