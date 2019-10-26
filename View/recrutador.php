<?php

?>

<?php include_once 'headerRecrut.php'; ?>

<section class="masthead" id="sectionRecrutador" style="background: url(imagem/); background-size: cover;">
  <div class="container">

    <div class="jumbotron p-3 p-md-5" style="background-color: #FFF">
      <div class="container p-0">
        <h5 class="display-4 display-md-2">Aproveite a melhor ferramenta para encontrar o candidato ideal!</h1>
          <hr class="my-2 my-md-4">
          <p class="lead">Acompanhe e gerencie aqui os seus processos seletivos.</p>
      </div>
    </div>

    <!--<div class="row">

      <div class="col-md-6 text-center">
        <a href="criar_processo.php" class="btn btn-primary btn-grande"><i class="fas fa-plus fa-3x"> </i>
          <h4>Abrir novo processo seletivo</h4>
        </a>
      </div>

      <div class="col-md-6">
        <button class="btn btn-primary btn-grande"><i class="fas fa-folder-open fa-3x"> </i>
          <h4>Processos seletivos em andamento</h4>
        </button>
      </div>

    </div>

    <div class="row">

      <div class="col-md-6 text-center">
        <a href="testesOnline.php" class="btn btn-primary btn-grande"><i class="fas fa-tasks fa-3x"> </i>
          <h4>Gerenciar testes online</h4>
        </a>
      </div>

      <div class="col-md-6">
        <a href="perguntas.php" class="btn btn-primary btn-grande"><i class="far fa-comment-dots fa-3x"> </i>
          <h4>Gerenciar perguntas</h4>
        </a>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <button class="btn btn-primary btn-grande"><i class="fas fa-user-tie fa-3x"> </i>
          <h4>Pesquisar candidatos</h4>
        </button>
      </div>

      <div class="col-md-6">
        <button class="btn btn-primary btn-grande"><i class="fas fa-archive fa-3x"> </i>
          <h4>Processos seletivos encerrados</h4>
        </button>
      </div>
    </div>-->

    <!--Processo seletivo -->

    <div class="row">
      <div class="col-lg-4 col-sm-6 ">
        <div class="card text-center hover-shadow-lg hover-translate-y-n10 shadow-sm bg-white rounded">
          <a href="criar_processo.php" class="btn btn-outline-light" style="background-color:#1874CD">
            <div class="fas fa-plus fa-3x mt-5">
            </div>
            <div class="px-4 pb-5">
              <h5>
                <p>Criar processo seletivo</p>
              </h5>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-sm-6">
        <div class="card text-center hover-shadow-lg hover-translate-y-n10 shadow-sm bg-white rounded">
          <a href="" class="btn btn-outline-light" style="background-color:#1874CD">
            <div class="fas fa-folder-open fa-3x mt-5">
            </div>
            <div class="px-4 pb-5">
              <h5>
                <p>Em andamento</p>
              </h5>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-sm-6">
        <div class="card text-center hover-shadow-lg hover-translate-y-n10 shadow-sm bg-white rounded">
          <a href="" class="btn btn-outline-light" style="background-color:#1874CD">
            <div class="fas fa-archive fa-3x mt-5">
            </div>
            <div class="px-4 pb-5">
              <h5>
                <p>Encerrados</p>
              </h5>
            </div>
          </a>
        </div>
      </div>
    </div>

    <!--Outros -->

    <div class="row">
      <div class="col-lg-4 col-sm-6">
        <div class="card text-center hover-shadow-lg hover-translate-y-n10 shadow-sm bg-white rounded">
          <a href="" class="btn btn-outline-light" style="background-color:#1874CD">
            <div class="fas fa-tasks fa-3x mt-5">
            </div>
            <div class="px-4 pb-5">
              <h5>
                <p>Gerenciar testes onlines</p>
              </h5>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-sm-6">
        <div class="card text-center hover-shadow-lg hover-translate-y-n10 shadow-sm bg-white rounded">
          <a href="" class="btn btn-outline-light" style="background-color:#1874CD">
            <div class="fas fa-comment-dots fa-3x mt-5">
            </div>
            <div class="px-4 pb-5">
              <h5>
                <p>Gerenciar perguntas</p>
              </h5>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-sm-6">
        <div class="card text-center hover-shadow-lg hover-translate-y-n10 shadow-sm bg-white rounded">
          <a href="" class="btn btn-outline-light" style="background-color:#1874CD">
            <div class="fas fa-user-tie fa-3x mt-5">
            </div>
            <div class="px-4 pb-5">
              <h5>
                <p>Pesquisar candidatos</p>
              </h5>
            </div>
          </a>
        </div>
      </div>
    </div>


  </div>
</section>

<?php include 'footer.php'; ?>