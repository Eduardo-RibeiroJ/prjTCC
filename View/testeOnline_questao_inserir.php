<?php
session_start();

include_once "../Model/Conexao.php";
include_once "../Model/TesteOnline.php";
include_once "../Controller/TesteOnlineDAO.php";

$conn = new Conexao();
$testeOnline = new TesteOnline();
$testeOnlineDAO = new TesteOnlineDAO($conn);

$testeOnline->setCnpj($_SESSION['cnpj']);

$ultimoRegistro = TesteOnline::getUltimoRegistro($testeOnline);

if(isset($_GET['btnCriar'])) {

  $testeOnline->inserirTesteOnline(
    $ultimoRegistro,
    $_SESSION['cnpj'],
    $_GET['nomeTeste']
  );

} else {

  $testeOnline->inserirTesteOnline(
    $_GET['idTeste'],
    $_SESSION['cnpj'],
    $_GET['nomeTeste']
  );
}

?>

<?php include_once 'headerRecrut.php'; ?>
      
<div class="container" id="containerPrincipal">

  <div class="row">
    <div class="col-12">
      <h4 class="d-inline" id="numTeste"><?= $testeOnline->getIdTesteOnline();?></h4>
      <h4 class="d-inline">&nbsp;- Nome:&nbsp;</h4> <!-- &nbsp dá espaço -->
      <h4 class="d-inline" id="nomeTeste"><?= $testeOnline->getNomeTesteOnline(); ?> </h4>
    </div>
  </div>

  <section> 

    <div class="row">
      <div class="col">

        <div class="card">
          <div class="card-header" id="numQuestaoCard-Header">
            Questão <?= $testeOnline->getUltimoRegistroQuestao() ?>
          </div>
          <input type="hidden" id="numQuestao" name="numQuestao" value="<?= $testeOnline->getUltimoRegistroQuestao() ?>">
          <input type="hidden" id="txtCnpj" name="txtCnpj" value="<?= $_SESSION['cnpj'] ?>">

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
                  </div>


                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      <div class="form-row">
                        <div class="form-group col-lg text-center">
                          <button id="btnAdicionar" class="btn btn-primary btn-mg">Adicionar</button>
                          <a href="testeOnline.php" id="btnVoltar" class="btn btn-outline-dark">Voltar</a>
                        </div>
                      </div>
                    </li>
                  </ul>  

                </div> 
              </div>
            </form>

        </div>
      </div>
    </div>

  </section>

</div>

<?php include 'footer.php'; ?>