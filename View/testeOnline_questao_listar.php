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

    <div class="container-fluid">

        <div id="titulo" class="row">
            <!---Título-->
              <h2 id="idTesteOnline"><?= $testeOnline->getIdTesteOnline(); ?></h2>
              <h2><pre> - Teste Online <?= $testeOnline->getNomeTesteOnline(); ?></pre></h2>
        </div>

        <div class="row">
          </div class="col-8">
            <h2>Questões</h2>
            <a href="testeOnline.php" class="btn btn-primary btn-lg">Voltar</a>
          </div>


          <div class="col-12">
            <table id="tabelaQuestao" class="table table-striped">
                <tr>
                  <th>Questão Nº</th>
                  <th>Questão</th>
                  <th></th>
                  <th></th>
                </tr>

                <?php foreach($arrayQuestao as $reg): ?>

                  <tr>
                    <td><?= $reg->getIdQuestao(); ?></td>
                    <td><?= $reg->getQuestao(); ?></td>
                    <td><button class="btnExcluir btn btn-primary" type="button" value="<?= $reg->getIdQuestao(); ?>">Excluir</button></td>
                    <td> <a class="btn btn-primary" href="testeOnline_questao_alterar.php?idTesteOnline=<?= $reg->getIdTesteOnline(); ?>&idQuestao=<?= $reg->getIdQuestao(); ?>">Alterar</a></td>
                  </tr>

                <?php endforeach; ?>

            </table>

          </div>
        </div>

</div> 

<?php include 'footer.php'; ?>
