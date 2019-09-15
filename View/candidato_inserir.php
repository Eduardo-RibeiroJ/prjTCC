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

            <div class="col-12">
              <form method="POST" action="inserirCandidato">
                <div class="card">

                  <div class="card-header">
                    Dados Pessoais
                  </div>

                    <div class="card-body">
                      <div class="card-text">

                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="txtNome">Nome</label>
                              <input type="text" class="form-control" id="txtNome" name="txtNome" placeholder="Digite seu nome..." required>
                            </div>

                            <div class="form-group col-md-6">
                              <label for="txtSobrenome">Nome</label>
                              <input type="text" class="form-control" id="txtSobrenome" name="txtSobrenome" placeholder="Digite seu sobrenome..." required>
                            </div>
                          </div>


                          <div class="form-row">
                            <div class="form-group col-md-4">
                              <label for="txtDataNasc">Data Nascimento</label>
                              <input type="date" class="form-control" id="txtDataNasc" name="txtDataNasc" placeholder="Digite sua data de nascimento..." required>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="cbbEstadoCivil">Estado Civil</label>
                              <select class="custom-select" id="cbbEstadoCivil" name="cbbEstadoCivil" required>
                                <option value="" selected>Selecione seu estado civil</option>
                                <option value="S">Solteiro(a)</option>
                                <option value="C">Casado(a)</option>
                                <option value="D">Divorciado(a)</option>
                                <option value="V">Viúvo(a)</option>
                              </select>
                            </div>

                            <div class="form-group col-md-4">
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

                <div class="card">

                  <div class="card-header">
                    Endereço
                  </div>

                    <div class="card-body">
                      <div class="card-text">

                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="txtCEP">CEP</label>
                              <input type="text" class="form-control" id="txtCEP" name="txtCEP" placeholder="Digite seu CEP..." required>
                            </div>

                            <div class="form-group col-md-6">
                              <label for="txtEndereco">Endereço</label>
                              <input type="text" class="form-control" id="txtEndereco" name="txtEndereco" placeholder="Digite seu endereço (rua e número)..." required>
                            </div>
                          </div>

                          <div class="form-row">

                            <div class="form-group col-md-4">
                              <label for="txtBairro">Bairro</label>
                              <input type="text" class="form-control" id="txtBairro" name="txtBairro" placeholder="Digite seu bairro..." required>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="txtCidade">Cidade</label>
                              <input type="text" class="form-control" id="txtCidade" name="txtCidade" placeholder="Digite sua cidadee..." required>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="txtUF">Estado</label>
                              <input type="text" class="form-control" id="txtUF" name="txtUF" placeholder="Digite seu estado..." required>
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
                              <input type="text" class="form-control" id="txtTelefone" name="txtTelefone" placeholder="Digite seu telefone..." required>
                            </div>

                            <div class="form-group col-md-6">
                              <label for="txtTelefone2">Telefone 2</label>
                              <input type="text" class="form-control" id="txtTelefone2" name="txtTelefone2" placeholder="Digite outro telefone..." required>
                            </div>

                          </div>

                          <div class="form-row">
                            <div class="form-group col">
                              <label for="txtlinkedin">LinkedIn</label>
                              <input type="text" class="form-control" id="txtlinkedin" name="txtlinkedin" placeholder="Insira seu LinkedIn...">
                            </div>
                          </div>

                          <div class="form-row">
                            <div class="form-group col">
                              <label for="txtFacebook">Facebook</label>
                              <input type="text" class="form-control" id="txtFacebook" name="txtFacebook" placeholder="Insira seu Facebook...">
                            </div>
                          </div>

                          <div class="form-row">
                            <div class="form-group col">
                              <label for="txtSitePessoal">Site Pessoal</label>
                              <input type="text" class="form-control" id="txtSitePessoal" name="txtSitePessoal" placeholder="Insira seu site pessoal...">
                            </div>
                          </div>

                          </div> 
                          
                      </div>
                    </div>

                </div>

                <div class="form-row" style="padding-top:1rem">
                  <div class="form-group col-12">
                    <input type="submit" name="Adicionar" id="Adicionar" class="btn btn-primary" value="Adicionar" />
                  </div>
                </div>

              </form>
            </div>
          </div>
      </div>
    </section>

       

<?php include 'footer.php'; ?>
