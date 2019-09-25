<?php

include_once "../Model/Conexao.php";
include_once "../Model/CandidatoFormacao.php";
include_once "../Controller/CandidatoFormacaoDAO.php";

include_once "../Model/Candidato.php";
include_once "../Controller/CandidatoDAO.php";

$conn = new Conexao();

$formacao = new CandidatoFormacao();
$formacaoDAO = new CandidatoFormacaoDAO($conn);

$candidato = new Candidato();
$candidatoDAO = new CandidatoDAO($conn);

$formacao->setCpf('415');
$candidato->setCpf('415');

$ultimoRegistro = $formacao->getUltimoRegistroFormacao();

if (isset($_POST['btnContinuar'])) {

  header('Location: candidato_inserir_curso.php');
}

?>

<?php include_once 'headerCand.php'; ?>

<div class="container">

    <input type="hidden" id="txtUltimoRegistro" name="txtUltimoRegistro" value="<?= $ultimoRegistro ?>">
    <input type="hidden" id="txtCpf" name="txtCpf" value="<?= $candidato->getCpf() ?>">

  <section>


    <div class="row">
      <div class="col">
        <div class="accordion" id="accordionCandidatoFormacao">

            <div class="row">

              <div class="jumbotron col-12">
                <h1 class="display-10">Adicione sua formação! <?= $ultimoRegistro ?></h1>
                <p class="lead">Aqui você poderá adicionar todas as instituições pelas quais já passou.</p>
                <hr class="my-10">
                <p>Para adiciona-las basta clicar nesse botão sempre que precisar adicionar uma formação.</p>
                    <button name="btnAddCardFormacao" id="btnAddCardFormacao" class="btn btn-primary">Add Card</button>
              </div>
            </div>

        </div>

         <div class="row">
              <div class="col text-center">
                <input type="submit" name="btnContinuar" id="btnContinuar" class="btn btn-primary" value="Continuar">
              </div>
            </div>

      </div>
    </div>

  </section>

</div>

       

<?php include 'footer.php'; ?>
