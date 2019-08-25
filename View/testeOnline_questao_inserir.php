<?php include_once "../Model/TesteOnline.php"; ?>

<?php include_once 'header.php'; ?>
      

    <!------------------------------------ Conteudo--------------------------------------------------------------->

    <div class="container-fluid">

        <div id="titulo" class="row">
              <h2><strong>Teste Online</strong></h2>
        </div>

        <div class="row">

            <div class="card" style="width: 136rem;">
                  <form id="formInserirQuestao">
                    <div class="card-body">
                            <div class="form-group row">

                                 <?php $numTeste = TesteOnline::getUltimoRegistro(); ?>
                                <h3 id="numTeste"><?= $numTeste;?></h3>
                                <h3>&nbsp;- Nome do Teste Online:&nbsp;</h3> <!--  &nbsp dá espaço -->
                                <h3 id="nomeTeste"><?= $_POST['nomeTeste']; ?> </h3>

                            </div>
                            <br>
                      <h3 class="card-title" id="numQuestao">Questão 1</h3>
                      <div class="input-group-md">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Adicionar questão</span>
                            </div>
                            <div class="form-group">
                              <textarea name="questao" id="questao" class="form-control" rows="3" placeholder="Digite aqui a questão..." autofocus></textarea>
                            </div>
                      </div>
                      <br>
                      <div class="form-row">
                  <div class="form-group col-md-2.5">
                        <label for="tempo">Tempo para responder (segundos)</label>
                        <input type="number" class="form-control" id="tempo" name="tempo" value="30">
                  </div>
                  
                      <div class="form-group col-md-1.5">
                          <label for="inputResposta">Alternativa correta</label>
                          <select id="resposta" name="resposta" class="form-control" tabindex="1">
                          <option value="A" selected>A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                        </select>
                     </div>
                  </div>
                </div>

                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                      <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupPrepend1">A)</span>
                          <input id="a" type="text" class="form-control" name="a" placeholder="Digite aqui uma alternativa...">
                        </div>        
                      </li>
                    <li class="list-group-item">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend2">B)</span>
                        <input id="b" type="text" class="form-control" name="b" placeholder="Digite aqui uma alternativa...">
                      </li>
                    <li class="list-group-item">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend3">C)</span>
                        <input id="c" type="text" class="form-control" name="c" placeholder="Digite aqui uma alternativa...">
                      </li>
                    <li class="list-group-item">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend4">D)</span>
                        <input id="d" type="text" class="form-control" name="d" placeholder="Digite aqui uma alternativa...">
                      </li> 
                </ul>

                    <div class="card-body">
                        <button id="btnAdicionar" class="btn btn-secondary">Adicionar</button>
                        <button id="btnLimpar" class="btn btn-secondary" type="reset">Limpar</button>
                            <a href="testeOnline.php" class="btn btn-primary">Concluir</a>
                    </div>
                </div>
           </div> 
      </form>

  </div>


<?php include 'footer.php'; ?>