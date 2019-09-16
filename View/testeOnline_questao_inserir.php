<?php include_once "../Model/TesteOnline.php"; ?>

<?php $numTeste = TesteOnline::getUltimoRegistro(); ?>

<?php include_once 'header.php'; ?>
      

    <!------------------------------------ Conteudo--------------------------------------------------------------->

    <div class="container">

      <section>
        <div class="row">
          <div class="col-md-9">
            <h4 class="d-inline" id="numTeste"><?= $numTeste;?></h4>
            <h4 class="d-inline">&nbsp;- Nome:&nbsp;</h4> <!-- &nbsp dá espaço -->
            <h4 class="d-inline" id="nomeTeste"><?= $_POST['nomeTeste']; ?> </h4>
          </div>

          <div class="col-md-3">
            <a href="testeOnline.php" id="btnVoltar" class="btn btn-primary">Voltar</a>
            <a href="testeOnline.php" id="btnConcluir" class="btn btn-primary">Concluir</a>
          </div>
        </div>

          <div class="row">
            <div class="col">

              <div class="card">
                <div class="card-header" id="numQuestao">Questão 1</div>

                    <form id="formInserirQuestao">
                      <div class="card-body">

                          <div class="card-text">
                            <div class="form-row">
                              <div class="form-group col">

                                <label for="questao">Questão</label>
                                <textarea name="questao" id="questao" class="form-control" rows="3" placeholder="" autofocus></textarea>
                              
                              </div>
                            </div>

                            <div class="form-row">
                              <div class="form-group col">

                                <label for="a">Alternativa A</label>
                                <input id="a" type="text" class="form-control" name="a" placeholder="">

                              </div>
                            </div>

                            <div class="form-row">
                              <div class="form-group col">

                                <label for="b">Alternativa B</label>
                                <input id="b" type="text" class="form-control" name="b" placeholder="">

                              </div>
                            </div>

                            <div class="form-row">
                              <div class="form-group col">

                                <label for="c">Alternativa C</label>
                                <input id="c" type="text" class="form-control" name="c" placeholder="">

                              </div>
                            </div>

                            <div class="form-row">
                              <div class="form-group col">

                                <label for="d">Alternativa D</label>
                                <input id="d" type="text" class="form-control" name="d" placeholder="">

                              </div>
                            </div>


                            <div class="form-row">
                              <div class="form-group col-md-6">
                                    <label for="tempo">Tempo para responder (segundos)</label>
                                    <input type="number" class="form-control" id="tempo" name="tempo" value="30">
                              </div>
                    
                              <div class="form-group col-md-6">
                                  <label for="inputResposta">Alternativa correta</label>
                                  <select id="resposta" name="resposta" class="form-control" tabindex="1">
                                  <option value="A" selected>A</option>
                                  <option value="B">B</option>
                                  <option value="C">C</option>
                                  <option value="D">D</option>
                                </select>
                            </div>

                            <div class="form-row text-center">
                              <div class="form-group col-6">
                                <button id="btnAdicionar" class="btn btn-secondary" href="#teste">Adicionar</button>
                              </div>

                              <div class="form-group col-6">
                                <button id="btnLimpar" class="btn btn-secondary" type="reset" href="#teste">Limpar</button>
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