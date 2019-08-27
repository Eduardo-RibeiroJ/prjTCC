<?php

include_once "../Model/Conexao.php";
include_once "../Model/Questao.php";
include_once "../Model/TesteOnline.php";
include_once "../Controller/QuestaoDAO.php";
include_once "../Controller/TesteOnlineDAO.php";

$conn = new Conexao();
$questao = new Questao();
$questaoDAO = new QuestaoDAO($conn);
$testeOnline = new TesteOnline();
$testeOnlineDAO = new TesteOnlineDAO($conn);

$testeOnline->setIdTesteOnline($_GET['idTesteOnline']);
$questao->setIdTesteOnline($_GET['idTesteOnline']);
$questao->setIdQuestao($_GET['idQuestao']);

$testeOnlineDAO->Listar($testeOnline);
$questaoDAO->Listar($questao);

?>

<?php include_once 'header.php'; ?>


    <div class="container-fluid">

        <div id="titulo" class="row">
              <h2><strong>Teste Online</strong></h2>
              <div class="col-sm-6">
              <a href="testeOnline_questao_listar.php?idTesteOnline=<?= $testeOnline->getIdTesteOnline(); ?>" class="btn btn-primary btn-lg">Voltar</a> 
              </div>    
        </div>

        <br>

        <div class="row">

            <div class="card" style="width: 136rem;">
                  <form id="formAlterarQuestao">
                    <div class="card-body">
                    <br>
                            <div class="form-group row">
                                <h3 id="numTeste"><?= $testeOnline->getIdTesteOnline(); ?></h3>
                                <h3>&nbsp;- Teste Online:&nbsp;</h3>
                                <h3 id="nomeTeste"><?= $testeOnline->getNomeTesteOnline(); ?> </h3>
                            </div>
                            <br>
                      <h3 class="card-title" id="numQuestao">Questão <?= $questao->getIdQuestao(); ?></h3>
                      <div class="input-group-md">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Alterar questão</span>
                            </div>
                            <div class="form-group">
                              <textarea name="questao" id="questao" class="form-control" rows="3"><?= $questao->getQuestao(); ?></textarea>
                            </div>
                      </div>
                      <br>
                      <div class="form-row">
                  <div class="form-group col-md-2.5">
                        <label for="tempo">Tempo de resposta</label>
                        <input type="number" class="form-control" id="tempo" name="tempo" value="<?= $questao->getTempo(); ?>">
                  </div>
                  
                      <div class="form-group col-md-3">
                          <label for="resposta">Resposta</label>
                          <select id="resposta" name="resposta" class="form-control" tabindex="1">

                          <?php

                          $alternativas = ['A','B','C','D'];

                            foreach ($alternativas as $value) {

                              if($value == $questao->getResposta()) 
                                $selected = 'selected';
                              else
                                $selected = '';

                              echo '<option value="'.$value.'" '.$selected.'>'.$value.'</option>';
                            }
                            
                            ?>
                          </select>
                      </div>
                  </div>
                </div>

                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                      <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupPrepend1">A)</span>
                          <input id="a" type="text" class="form-control" name="a" placeholder="Adicionar questão" value="<?= $questao->getAltA(); ?>">
                        </div>        
                      </li>
                    <li class="list-group-item">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend2">B)</span>
                        <input id="b" type="text" class="form-control" name="b" placeholder="Adicionar questão" value="<?= $questao->getAltB(); ?>">
                      </li>
                    <li class="list-group-item">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend3">C)</span>
                        <input id="c" type="text" class="form-control" name="c" placeholder="Adicionar questão" value="<?= $questao->getAltC(); ?>">
                      </li>
                    <li class="list-group-item">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend4">D)</span>
                        <input id="d" type="text" class="form-control" name="d" placeholder="Adicionar questão" value="<?= $questao->getAltD(); ?>">
                      </li> 
                </ul>

                    <div class="card-body">
                        <button id="btnSalvar" class="btn btn-primary">Salvar</button>
                        <button id="btnLimpar" class="btn btn-primary" type="reset">Limpar</button>
                    </div>
                </div>
           </div> 
      </form>

  </div>

  <?php include 'footer.php'; ?>