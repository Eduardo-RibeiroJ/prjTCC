<?php
include_once 'headerRecrut.php';
?>


<section class="masthead" id="sectionProcesso1" style="background: url(imagem/90463.jpg); background-size: cover;">
  <div class="container">

    <div class="jumbotron p-3 p-md-5" style="background-color: #FFF">
      <div class="container p-0">
        <h5 class="display-4 display">Will Smith</h1>
          <h6 class="lead mb-0">Solteiro, idade X anos</h6>
          <h6 class="lead mb-0">Rua x, Bairro y, Cidade z</h6>
          <h6 class="lead mb-0">Email , telefone</h6>

          <div class="row mt-5">
            <div class="col-12">
              <p class="lead mb-1"><strong>Objetivo Profissional</strong></p>
              <ul>
                <li>
                  <p><strong>Cargo: </strong></p>
                </li>
                <li>
                  <p><strong>Nível: </strong></p>
                <li>
                  <p><strong>Pretenção salarial:</p>
                </li>
              </ul>
            </div>
          </div>
      </div>

      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Fatec Sorocaba</h5>
          <h6 class="card-subtitle mb-2 text-muted">Curso: Análise e Desenvolvimento de Sistemas</h6>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

        </div>
      </div>

      <hr class="my-2 my-md-4">

      <input type="hidden" name="txtIdProcesso" id="txtIdProcesso" value="" />
      <div class="form-row">
        <div class="col text-center">
          <input type="submit" name="btnCandidatar" id="btnCandidatar" class="btn btn-warning btn-lg float-right" value="Candidatar-se!" />
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>