<?php
include_once 'headerRecrut.php';
?>


<section class="masthead" id="sectionProcesso1" style="background: url(imagem/90463.jpg); background-size: cover;">
  <div class="container" style="background-color: #FFF">

    <div class="jumbotron p-3 p-md-5" style="background-color: #FFF">
      <div class="container p-0">
        <h5 class="display-4 display">Will Smith</h1>
          <h6 class="lead mb-0">Solteiro, 51 anos</h6>
          <h6 class="lead mb-0">Rua Ocean Drive, Bairro Miami, Cidade New York</h6>
          <h6 class="lead mb-0">Email: will_fresh_prince@hotmail.com , telefone: (51)98524-9874</h6>

          <hr class="my-2 my-md-4">

          <div class="row mt-5">
            <div class="col-12">
              <p class="lead mb-1"><strong>Objetivo Profissional</strong></p>
              <ul>
                <li>
                  <p class="mb-0"><strong>Cargo: </strong> Desenvolvedor</p>
                </li>
                <li>
                  <p class="mb-0"><strong>Nível: </strong> Junior</p>
                </li>
                <li>
                  <p class="mb-0"><strong>Pretenção salarial: </strong> R$2800,00</p>
                </li>
              </ul>
            </div>
          </div>

          <div class="row mt-3 mb-3">
            <div class="col-12">
              <p class="lead mb-1"><strong>Competências</strong></p>
              <ul>
                <li>
                  <p class="mb-0">C#</p>
                </li>
                <li>
                  <p class="mb-0">SQL Server</p>
                </li>
                <li>
                  <p class="mb-0">Java</p>
                </li>
                <li>
                  <p class="mb-0">Metodologia Scrum</p>
                </li>
              </ul>
            </div>
          </div>

          <!-- Formação-->

          <div class="row mt-3 mb-3">
            <div class="col-12">
              <p class="lead mb-1 pb-3"><strong>Formação Acadêmica</strong></p>
              <div class="card border-0 pb-0 pt-0">
                <div class="card-body">
                  <h5 class="card-title">Fatec Sorocaba</h5>
                  <h6 class="card-text mb-3"><strong>Curso: </strong>Análise e Desenvolvimento de Sistemas</h6>
                  <p class="card-text mb-0">Data: 26/05/2010 - 05/12/2014</p>
                  <p class="card-text">Situação: Em andamento</p>
                </div>
              </div>
            </div>
          </div>

          <hr class="my-2 my-md-4">

          <!-- Cursos-->

          <div class="row mt-3 mb-3">
            <div class="col-12">
              <p class="lead mb-1 pb-3"><strong>Curso Profissionalizante</strong></p>

              <div class="card border-0">
                <div class="card-body pb-0 pt-0">
                  <h5 class="card-title">Introdução a redes</h5>
                  <h6 class="card-text mb-3"><strong>Instituição: </strong>Cisco Networking Academic</h6>
                  <p class="card-text mb-0">Ano conclusão: 12/06/2016</p>
                  <p class="card-text mb-0">Carga horária: 70</p>
                </div>
              </div>
            </div>
          </div>

          <hr class="my-2 my-md-4">

          <div class="card border-0">
            <div class="card-body pb-0 pt-0">
              <h5 class="card-title">Introdução a redes</h5>
              <h6 class="card-text mb-3"><strong>Instituição: </strong>Cisco Networking Academic</h6>
              <p class="card-text mb-0">Ano conclusão: 12/06/2016</p>
              <p class="card-text mb-0">Carga horária: 70</p>
            </div>
          </div>

          <hr class="my-2 my-md-4">

          <!-- Empresas-->

          <div class="row mt-3 mb-3">
            <div class="col-12">
              <p class="lead mb-1 pb-3"><strong>Histórico profissional</strong></p>
              <div class="card border-0">
                <div class="card-body pb-0 pt-0">
                  <h5 class="card-title">IBM</h5>
                  <h6 class="card-text mb-3"><strong>Cargo: </strong>Programador C#</h6>
                  <p class="card-text mb-0"><strong>Período: </strong>de 12/06/2016 a 22/04/2017</p>
                  <p class="card-text mb-0"><strong>Atividade: </strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tristique rutrum sem et rutrum. Vivamus ex sem, malesuada sed ultrices eget, maximus sed turpis. Cras porta dolor quis eros faucibus, nec porta lorem lobortis. Pellentesque pellentesque convallis efficitur. Sed dignissim fermentum augue eu volutpat. Aenean enim massa, euismod a tristique et, venenatis ut massa. Aenean ultricies, nulla ac dignissim dictum, tortor magna faucibus quam, nec faucibus nisi elit sit amet velit. Phasellus lobortis velit non porta consequat. Mauris finibus porta eros, ut aliquam dui ultrices eu. Quisque sed convallis mauris. Morbi vestibulum auctor nisi ac ultricies.</p>
                </div>
              </div>
            </div>
          </div>


      </div>
      <!--container p-0 -->
    </div>
    <!--jumbotron -->

    <hr class="my-2 my-md-4">

    <input type="hidden" name="txtIdProcesso" id="txtIdProcesso" value="" />
    <div class="form-row">
      <div class="col text-center">
        <input type="submit" name="btnCandidatar" id="btnCandidatar" class="btn btn-warning btn-lg float-right" value="Candidatar-se!" />
      </div>
    </div>


  </div>
</section>

<?php include 'footer.php'; ?>