<?php
include_once "../Model/Conexao.php";
include_once "../PostAjax/Questao.php";
include_once "../PostAjax/TesteOnline.php";
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
              <h2>&nbsp;- <?= $testeOnline->getNomeTesteOnline(); ?></h2>

              <div class="col-lg-2" style="text-align: right;">
               <a href="testeOnline.php?idTesteOnline=<?= $testeOnline->getIdTesteOnline(); ?>" class="btn btn-primary">Voltar</a> 
               <button class="btn btn-primary" type="button" value="">Adicionar</button>
               </div>
        </div><br>

            <table class="table" id="tabelaQuestao">
              <thead class="thead-dark">
                <tr>
                  <th>Nº</th>
                  <th>Questão</th>
                  <th></th>
                  <th></th>
                </tr>

                <?php foreach($arrayQuestao as $reg): ?>

                  <tr>
                    <td><?= $reg->getIdQuestao(); ?></td>
                    <td>
                      <label class = "limitador text-justify"><?= $reg->getQuestao(); ?></label>
                      <button class="btn btn-primary" type="button" value="<?= $reg->getIdQuestao(); ?>">Excluir</button>
                      <a class="btn btn-primary" href="testeOnline_questao_alterar.php?idTesteOnline=<?= $reg->getIdTesteOnline(); ?>&idQuestao=<?= $reg->getIdQuestao(); ?>" role="button">Alterar</a>
                     </td>
                   </tr>

                <?php endforeach; ?>
               </thead>
             </table>
      </div> 

<?php include 'footer.php'; ?>
