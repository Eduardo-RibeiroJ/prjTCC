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

    
    <div class="container">

      <section>
        <div class="row">
          <div class="col-md">
            <h4 class="d-inline" id="numTeste"><?= $testeOnline->getIdTesteOnline(); ?></h4>
            <h4 class="d-inline">&nbsp;- Nome:&nbsp;</h4> <!-- &nbsp dá espaço -->
            <h4 class="d-inline" id="nomeTeste"><?= $testeOnline->getNomeTesteOnline(); ?></h4>
          </div>

        </div>

          <div class="row">
            <div class="col">

              <div class="card">
                <div class="card-header">Questão <?= $questao->getIdQuestao(); ?></div>
                <input type="hidden" id="numQuestao" name="numQuestao" value="<?= $questao->getIdQuestao(); ?>">

                    <form id="formAlterarQuestao">
                      <div class="card-body">

                          <div class="card-text">
                            <div class="form-row">
                              <div class="form-group col">

                                <label for="questao">Questão</label>
                                <textarea name="questao" id="questao" class="form-control" rows="3" placeholder="" autofocus><?= $questao->getQuestao(); ?></textarea>
                              
                              </div>
                            </div>

                            <div class="form-row">
                              <div class="form-group col">

                                <label for="a">Alternativa A</label>
                                <input id="a" type="text" class="form-control" name="a" value="<?= $questao->getAltA(); ?>">

                              </div>
                            </div>

                            <div class="form-row">
                              <div class="form-group col">

                                <label for="b">Alternativa B</label>
                                <input id="b" type="text" class="form-control" name="b" value="<?= $questao->getAltB(); ?>">

                              </div>
                            </div>

                            <div class="form-row">
                              <div class="form-group col">

                                <label for="c">Alternativa C</label>
                                <input id="c" type="text" class="form-control" name="c" value="<?= $questao->getAltC(); ?>">

                              </div>
                            </div>

                            <div class="form-row">
                              <div class="form-group col">

                                <label for="d">Alternativa D</label>
                                <input id="d" type="text" class="form-control" name="d" value="<?= $questao->getAltD(); ?>">

                              </div>
                            </div>


                            <div class="form-row">
                              <div class="form-group col-md-6">
                                    <label for="tempo">Tempo para responder (segundos)</label>
                                    <input type="number" class="form-control" id="tempo" name="tempo" value="<?= $questao->getTempo(); ?>">
                              </div>
                    
                              <div class="form-group col-md-6">
                                  <label for="inputResposta">Alternativa correta</label>
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

                            <div class="form-row">
                              <div class="form-group col text-center">
                                <button class="btn btn-primary btn-lg" id="btnSalvar">Salvar</button>
                                <a href="testeOnline_questao_listar.php?idTesteOnline=<?= $testeOnline->getIdTesteOnline(); ?>" class="btn btn-secondary">Voltar</a>
                              </div>

                            </div>
                          </div> 
                        </div>
                      </div>
                    </form>
              </div>
            </div>
          </div>
                   
      </section>
    </div>


  <?php include 'footer.php'; ?>