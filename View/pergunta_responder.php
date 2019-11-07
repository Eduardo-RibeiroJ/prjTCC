<?php
session_start();

include_once "../Model/Conexao.php";

include_once "../Model/ProcessoSeletivo.php";
include_once "../Model/ProcessoPergunta.php";
include_once "../Model/ProcessoCandPergunta.php";
include_once "../Model/Pergunta.php";
include_once "../Model/Cargo.php";

include_once "../Controller/ProcessoSeletivoDAO.php";
include_once "../Controller/ProcessoPerguntaDAO.php";
include_once "../Controller/ProcessoCandPerguntaDAO.php";
include_once "../Controller/PerguntaDAO.php";
include_once "../Controller/CargoDAO.php";

$conn = new Conexao();

$processo = new ProcessoSeletivo();
$processoDAO = new ProcessoSeletivoDAO($conn);
$pergunta = new Pergunta();
$perguntaDAO = new PerguntaDAO($conn);
$processoPergunta = new ProcessoPergunta();
$processoPerguntaDAO = new ProcessoPerguntaDAO($conn);
$processoCandPergunta = new ProcessoCandPergunta();
$processoCandPerguntaDAO = new ProcessoCandPerguntaDAO($conn);

if(!(isset($_POST['btnResponder'])) && !(isset($_POST['btnConcluir']))) {
  header('Location: index.php');
}

$idProcesso = $_POST['txtIdProcesso'];

if(isset($_POST['btnResponder'])) {

}

if(isset($_POST['btnConcluir'])) {
  foreach($_POST as $name => $value) {

    $input = (str_split($name, 11));

    if($input[0] == "txtPergunta") {
      $idPergunta = $input[1];
      $resposta = $value;

      $processoCandPergunta->inserirProcCandPerg(
        $idProcesso,
        $_SESSION['cpf'],
        $idPergunta,
        $resposta
      );

      $processoCandPerguntaDAO->Inserir($processoCandPergunta);
    }
  }
  header('Location: processo_seletivo_candidatar-'.$idProcesso);
}

$processo->setIdProcesso($idProcesso);
$processoDAO->Listar($processo);

$processoPergunta->setProcesso($processo);
$arrayPergunta = $processoPerguntaDAO->Listar($processoPergunta);

?>

<?php include_once 'headerCand.php'; ?>

<section class="masthead" id="sectionRealizarTeste" style="background: url(imagem/90463.jpg); background-size: cover;">
    <div class="container">

        <div class="jumbotron p-3 p-md-5" style="background-color: #FFF">
            <div class="container p-0">
              <h5 class="display-4 display-md-2">Responda as perguntas necessárias para o processo seletivo!</h1>
              <hr>
              <form method="POST" action="pergunta_responder.php">
                <input type="hidden" id="txtIdProcesso" name="txtIdProcesso" value="<?= $idProcesso ?>" />
                <?php foreach($arrayPergunta as $reg): ?>
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label class="lead" for="txtPergunta<?= $reg->getPergunta()->getIdPergunta(); ?>"><?= $reg->getPergunta()->getPergunta(); ?></label>
                      <textarea name="txtPergunta<?= $reg->getPergunta()->getIdPergunta(); ?>" id="txtPergunta<?= $reg->getPergunta()->getIdPergunta(); ?>" rows="3" class="form-control" placeholder="Responda aqui..."></textarea>
                    </div>
                  </div>
                </div>

                <?php endforeach; ?>
            
                <hr class="my-2 my-md-4">

                <div class="form-row">

                  <div class="col-12">
                    <input type="submit" name="btnConcluir" id="btnConcluir" class="btn btn-warning btn-lg float-right" value="Concluir"/>
                  </div>
                </div>
              </form>
        </div>
    </div>
  </section>

  <script>
    window.onload = function() {

      var tempo = "<?= $tempo ?>";
      timer = parseInt(tempo);
      tempo = (parseInt(tempo)+1)*1000;
      var pTimer = document.getElementById('p-timer');

      var timerInterval = setInterval(function () {
        pTimer.innerHTML = timer + ' segundos restantes';
        timer--;

        if(timer == '-1') {
          clearInterval(timerInterval);
          pTimer.innerHTML = 'Tempo esgotado!';
        }

      }, 1000);
      
      setTimeout(function () {
        var rdb = document.getElementsByName('Alt');
        for(var i=0;i < rdb.length ;i++) {
          
          rdb[i].checked = false;
          rdb[i].setAttribute("disabled", "disabled");
        }
      }, tempo);
    }
  </script>

<?php include 'footer.php'; ?>