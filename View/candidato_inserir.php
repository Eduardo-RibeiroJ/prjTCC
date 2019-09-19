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

<?php include_once 'headerCand.php'; ?>

<div class="container">

<input type="hidden" id="cpf" name="cpf" value="415">

  <section>

    <div class="container-small">
      <div class="row">
        <div class=col>
          <h4>Crie seu perfil!</h4>
        </div>
      </div>
     </div>


    <div class="row">

      <div class="col">

        <div class="accordion" id="accordionCandidatoDadosPessoais">

          <form method="POST" action="candidato_inserir.php">

            <div class="card">

              <div class="card-header" id="candidatoDadosPessoais" data-toggle="collapse" data-target="#collapsecandidatoDadosPessoais" aria-expanded="true" aria-controls="collapsecandidatoDadosPessoais">
                Dados Pessoais
              </div>

              <div id="collapsecandidatoDadosPessoais" class="collapse show" aria-labelledby="candidatoDadosPessoais" data-parent="#accordionCandidatoDadosPessoais">

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

              <div class="form-row">
                <div class="form-group col text-center" style="padding-top:1rem">
                  <button name="btnSalvar" id="btnSalvar" class="btn btn-primary">Salvar</button>
                </div>
              </div>

            </div>

            <div class="card">

              <div class="card-header" id="candidatoEndereco" data-toggle="collapse" data-target="#collapsecandidatoEndereco" aria-expanded="true" aria-controls="collapsecandidatoEndereco">
                Endereço
              </div>

              <div id="collapsecandidatoEndereco" class="collapse" aria-labelledby="candidatoEndereco" data-parent="#accordionCandidatoDadosPessoais">

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

            </div>

            <div class="card">

              <div class="card-header" id="candidatoContato" data-toggle="collapse" data-target="#collapsecandidatoContato" aria-expanded="true" aria-controls="collapsecandidatoContato">
                Contato
              </div>

              <div id="collapsecandidatoContato" class="collapse" aria-labelledby="candidatoContato" data-parent="#accordionCandidatoDadosPessoais">

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
            </div>

            <div class="card">

              <div class="card-header" id="candidatoInstituicao" data-toggle="collapse" data-target="#collapsecandidInstituicao" aria-expanded="true" aria-controls="collapsecandidInstituicao">
                Instituição de ensino
              </div>

              <div id="collapsecandidInstituicao" class="collapse" aria-labelledby="candidatoInstituicao" data-parent="#accordionCandidatoDadosPessoais">

                <div class="card-body">
                  <div class="card-text">

                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="txtTelefone">Nome do curso</label>
                          <input type="text" class="form-control" id="txtTelefone" name="txtTelefone" placeholder="" required>
                        </div>

                        <div class="form-group col-md-4">
                          <label for="txtTelefone2">Nome da instituição</label>
                          <input type="text" class="form-control" id="txtTelefone2" name="txtTelefone2" placeholder="">
                        </div>

                        <div class="form-group col-md-4">
                          <label for="txtTipoCurso">Tipo do curso</label>
                          <select class="custom-select" id="tipoCurso" name="tipoCurso" required>
                            <option value="" selected>Selecione</option>
                            <option value="F12">Formação escolar fundamental (1°Grau) e média (2°Grau)</option>
                            <option value="EMP">Ensino Médio profisisonalizante</option>
                            <option value="GR">Graduação</option>
                            <option value="GRE">Graduação - especialização</option>
                            <option value="GRMB">Graduação - MBA</option>
                            <option value="GRME">Graduação - Mestrado</option>
                            <option value="GRD">Graduação - Doutorado</option>
                          </select>
                        </div>

                      </div>

                       <div class="form-row">

                        <div class="form-group col-md-3">
                          <label for="txtDataNasc">Data início</label>
                          <input type="date" class="form-control" id="txtDataNasc" name="txtDataNasc" placeholder="" required>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="txtDataNasc">Data término</label>
                          <input type="date" class="form-control" id="txtDataNasc" name="txtDataNasc" placeholder="" required>
                        </div>

                       </div>

                       <div class="form-row">

                        <div class="form-group col-md-6">
                          <label for="txtSituacao">Tipo do curso</label>
                          <select class="custom-select" id="situacao" name="situacao" required>
                            <option value="" selected>Selecione</option>
                            <option value="IM">Interrrompido</option>
                            <option value="EM">Em andamento</option>
                            <option value="FI">Finalizado</option>
                          </select>
                        </div>
                       </div>



                      </div> 
                      
                  </div>
                </div>

              </div>
            </div>


          </form>

        </div>
      </div>
    </div>

  </section>

</div>

       

<?php include 'footer.php'; ?>
