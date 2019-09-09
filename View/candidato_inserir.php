<?php
include_once "../Model/Conexao.php";
include_once "../Model/Candidato.php";
include_once "../Controller/CandidatoDAO.php";

$conn = new Conexao();
$candidato = new Candidato();
$candidatoDAO = new CandidatoDAO($conn);

?>

<?php include_once 'header.php'; ?>

    <section class="page-section">
      <div class="container">
          <div class="row d-flex justify-content-center">
            <div class=col-12>
              <h2>Candidato</h2>
            </div>

            <form method="POST" action="inserirCandidato">
              <div class="card">

                <div class="card-header">
                  Dados Pessoais
                </div>

                  <div class="card-body">
                    <div class="card-text">

                        <div class="form-row">
                          <div class="form-group col-6">
                            <label for="txtNome">Nome</label>
                            <input type="text" class="form-control" id="txtNome" name="txtNome" placeholder="Digite seu nome..." required>
                          </div>

                          <div class="form-group col-6">
                            <label for="txtSobrenome">Nome</label>
                            <input type="text" class="form-control" id="txtSobrenome" name="txtSobrenome" placeholder="Digite seu sobrenome..." required>
                          </div>

                          <div class="form-group col-4">
                            <label for="txtDataNasc">Data Nascimento</label>
                            <input type="date" class="form-control" id="txtDataNasc" name="txtDataNasc" placeholder="Digite sua data de nascimento..." required>
                          </div>

                          <div class="form-group col-4">
                            <label for="cbbEstadoCivil">Estado Civil</label>
                            <select class="custom-select" id="cbbEstadoCivil" name="cbbEstadoCivil" required>
                              <option value="" selected>Selecione seu estado civil</option>
                              <option value="S">Solteiro(a)</option>
                              <option value="C">Casado(a)</option>
                              <option value="D">Divorciado(a)</option>
                              <option value="V">Viúvo(a)</option>
                            </select>
                          </div>

                          <div class="form-group col-4">
                            <label for="cbbSexo">Sexo</label>
                            <select class="custom-select" id="cbbSexo" name="cbbSexo" required>
                              <option value="" selected>Selecione seu sexo</option>
                              <option value="M">Masculino</option>
                              <option value="F">Feminino</option>
                            </select>
                          </div>
                           
                        </div>
                    </div>
                  </div>

              </div>

              <div class="form-group">
                <input type="submit" name="Adicionar" id="Adicionar" class="btn btn-primary" value="Adicionar" />
              </div>

            </form>
          </div>
      </div>
    </section>

       

<?php include 'footer.php'; ?>
