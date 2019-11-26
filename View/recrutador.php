<?php

?>

<?php include_once 'headerRecrut.php'; ?>

<section class="masthead" id="sectionRecrutador" style="background: url(imagem/17209.jpg); background-size: cover;">

  <div class="container">

    <div class="jumbotron p-3 p-md-5">
      <div class="container p-0">
        <h5 class="display-4 display-md-2">Aproveite a melhor ferramenta para encontrar o candidato ideal!</h1>
          <hr class="my-2 my-md-3">
          <p class="lead">Acompanhe e gerencie aqui os seus processos seletivos.</p>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6 col-sm-6 mb-3">
        <div class="card text-center border-0">
          <a href="criar_processo.php" class="btn btn-primary">
            <div class="fas fa-plus fa-3x mt-4">
            </div>
            <div class="px-2 pb-2">
              <h5>
                <p>Criar processo seletivo</p>
              </h5>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-6 col-sm-6 mb-3">
        <div class="card text-center border-0">
          <a href="processo_listagem.php" class="btn btn-primary">
            <div class="fas fa-folder-open fa-3x mt-4">
            </div>
            <div class="px-2 pb-2">
              <h5>
                <p>Processos seletivos</p>
              </h5>
            </div>
          </a>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-lg-6 col-sm-6 mb-3">
        <div class="card text-center border-0">
          <a href="testeOnline.php" class="btn btn-primary">
            <div class="fas fa-tasks fa-3x mt-4">
            </div>
            <div class="px-2 pb-2">
              <h5>
                <p>Gerenciar testes online</p>
              </h5>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-6 col-sm-6 mb-3">
        <div class="card text-center border-0">
          <a href="perguntas.php" class="btn btn-primary">
            <div class="fas fa-comment-dots fa-3x mt-4">
            </div>
            <div class="px-2 pb-2">
              <h5>
                <p>Gerenciar perguntas</p>
              </h5>
            </div>
          </a>
        </div>
      </div>
    </div>


  </div>
</section>

<?php include 'footer.php'; ?>