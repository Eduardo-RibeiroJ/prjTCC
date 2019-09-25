<?php

include_once "../Model/Conexao.php";
include_once "../Model/CandidatoCurso.php";
include_once "../Controller/CandidatoCursoDAO.php";

include_once "../Model/Candidato.php";
include_once "../Controller/CandidatoDAO.php";

$conn = new Conexao();

$curso = new CandidatoCurso();
$cursoDAO = new CandidatoCursoDAO($conn);

$candidato = new Candidato();
$candidatoDAO = new CandidatoDAO($conn);

$curso->setCpf('415');
$candidato->setCpf('415');

$ultimoRegistroCurso = $curso->getUltimoRegistroCurso();

?>

<?php include_once 'headerCand.php'; ?>

<div class="container">


    <input type="hidden" id="txtUltimoRegistroCurso" name="txtUltimoRegistroCurso" value="<?= $ultimoRegistroCurso ?>">
    <input type="hidden" id="txtCpf" name="txtCpf" value="<?= $candidato->getCpf() ?>">
  <section>


    <div class="row">
      <div class="col">
        <div class="accordion" id="accordionCandidatoCurso">

            <div class="row">

              <div class="jumbotron col-12">
                <h1 class="display-10">Adicione cursos profissionalizantes!</h1>
                <p class="lead">Aqui você poderá adicionar todos os cursos que voce já fez. Poderá agreagar muito na hora do processo seletivo</p>
                <hr class="my-10">
                <p>Para adiciona-las basta clicar nesse botão sempre que precisar adicionar um curso.</p>
                    <button name="btnAddCardCurso" id="btnAddCardCurso" class="btn btn-primary">Add Card</button>
              </div>
            </div>

        </div>
      </div>
    </div>

  </section>

</div>

       

<?php include 'footer.php'; ?>
