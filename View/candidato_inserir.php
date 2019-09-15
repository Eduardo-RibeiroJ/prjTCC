<?php
include_once "../Model/Conexao.php";
include_once "../Model/Candidato.php";
include_once "../Controller/CandidatoDAO.php";

$conn = new Conexao();
$candidato = new Candidato();
$candidatoDAO = new CandidatoDAO($conn);

if (isset($_POST['Adicionar'])) {
  echo "<script> alert('caiu');</script>";
}

?>

<?php include_once 'header.php'; ?>

    <section class="page-section">
      <div class="container">
          <div class="row d-flex justify-content-center">
            <div class=col-12>
              <h2>Candidato</h2>
            </div>

            <div class="col-12">
              <form method="POST" action="candidato_inserir.php">
                <div class="card">

                  <div class="card-header">
                    Dados Pessoais
                  </div>

                    <div class="card-body">
                      <div class="card-text">

                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="txtNome">Nome</label>
                              <input type="text" class="form-control" id="txtNome" name="txtNome" placeholder="" required autofocus>
                            </div>

                            <div class="form-group col-md-6">
                              <label for="txtSobrenome">Sobrenome</label>
                              <input type="text" class="form-control" id="txtSobrenome" name="txtSobrenome" placeholder="" required>
                            </div>
                          </div>


                          <div class="form-row">
                            <div class="form-group col-md-4">
                              <label for="txtDataNasc">Data Nascimento</label>
                              <input type="date" class="form-control" id="txtDataNasc" name="txtDataNasc" placeholder="" required>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="cbbEstadoCivil">Estado Civil</label>
                              <select class="custom-select" id="cbbEstadoCivil" name="cbbEstadoCivil" required>
                                <option value="" selected>Selecione</option>
                                <option value="S">Solteiro(a)</option>
                                <option value="C">Casado(a)</option>
                                <option value="D">Divorciado(a)</option>
                                <option value="V">Viúvo(a)</option>
                              </select>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="cbbSexo">Sexo</label>
                              <select class="custom-select" id="cbbSexo" name="cbbSexo" required>
                                <option value="" selected>Selecione</option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                              </select>
                            </div>
                          </div>
                              
                      </div>
                    </div>

                </div>

                <div class="card">

                  <div class="card-header">
                    Endereço
                  </div>

                    <div class="card-body">
                      <div class="card-text">

                          <div class="form-row">
                            <div class="form-group col-lg-6">
                              <label for="txtCEP">CEP</label>
                              <input type="text" class="form-control" id="txtCEP" name="txtCEP" placeholder="" required>
                            </div>

                            <div class="form-group col-lg-6">
                              <label for="txtEndereco">Endereço</label>
                              <input type="text" class="form-control" id="txtEndereco" name="txtEndereco" placeholder="Rua e número" required>
                            </div>
                          </div>

                          <div class="form-row">

                            <div class="form-group col-md-5">
                              <label for="txtBairro">Bairro</label>
                              <input type="text" class="form-control" id="txtBairro" name="txtBairro" placeholder="" required>
                            </div>

                            <div class="form-group col-md-5">
                              <label for="txtCidade">Cidade</label>
                              <input type="text" class="form-control" id="txtCidade" name="txtCidade" placeholder="" required>
                            </div>

                            <div class="form-group col-md-2">
                              <label for="txtUF">Estado</label>
                              <input type="text" class="form-control" id="txtUF" name="txtUF" placeholder="" required>
                            </div>

                          </div> 
                          
                      </div>
                    </div>

                </div>

                <div class="card">

                  <div class="card-header">
                    Contato
                  </div>

                    <div class="card-body">
                      <div class="card-text">

                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="txtTelefone">Telefone</label>
                              <input type="text" class="form-control" id="txtTelefone" name="txtTelefone" placeholder="" required>
                            </div>

                            <div class="form-group col-md-6">
                              <label for="txtTelefone2">Telefone 2</label>
                              <input type="text" class="form-control" id="txtTelefone2" name="txtTelefone2" placeholder="">
                            </div>

                          </div>

                          <div class="form-row">
                            <div class="form-group col">
                              <label for="txtlinkedin">LinkedIn</label>
                              <input type="text" class="form-control" id="txtlinkedin" name="txtlinkedin" placeholder="">
                            </div>
                          </div>

                          <div class="form-row">
                            <div class="form-group col">
                              <label for="txtFacebook">Facebook</label>
                              <input type="text" class="form-control" id="txtFacebook" name="txtFacebook" placeholder="">
                            </div>
                          </div>

                          <div class="form-row">
                            <div class="form-group col">
                              <label for="txtSitePessoal">Site Pessoal</label>
                              <input type="text" class="form-control" id="txtSitePessoal" name="txtSitePessoal" placeholder="">
                            </div>
                          </div>

                          </div> 
                          
                      </div>
                    </div>

                </div>

                <div class="form-row" style="padding-top:1rem">
                  <div class="form-group col-12">
                    <input type="submit" name="Adicionar" id="Adicionar" class="btn btn-primary"/>
                  </div>
                </div>

              </form>
            </div>
          </div>
      </div>
    </section>

       

<?php include 'footer.php'; ?>
