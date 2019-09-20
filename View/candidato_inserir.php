<?php
include_once "../Model/Conexao.php";
include_once "../Model/Candidato.php";
include_once "../Controller/CandidatoDAO.php";

$conn = new Conexao();
$candidato = new Candidato();
$candidatoDAO = new CandidatoDAO($conn);

$candidato->setCpf("545454");

$candidatoDAO->Listar($candidato);

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
            <?php var_dump($candidato);?>

          <form method="POST" action="candidato_inserir.php">

            <div class="card">

              <div class="card-header" id="candidatoDadosPessoais">Dados Pessoais
                <button name="btnAlterarSalvarDadosPessoais" id="btnAlterarSalvarDadosPessoais" class="btn btn-primary float-right" data-toggle="collapse" data-target="#collapsecandidatoDadosPessoais" aria-expanded="true" aria-controls="collapsecandidatoDadosPessoais">Alterar</button>
              </div>

              <div id="collapsecandidatoDadosPessoais" class="collapse" aria-labelledby="candidatoDadosPessoais" data-parent="#accordionCandidatoDadosPessoais">

                <div class="card-body">
                  <div class="card-text">

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="txtNome">Nome</label>
                        <input type="text" class="form-control" id="txtNome" name="txtNome" value="<?= $candidato->getNome(); ?>" required autofocus>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="txtSobrenome">Sobrenome</label>
                        <input type="text" class="form-control" id="txtSobrenome" name="txtSobrenome" value="<?= $candidato->getSobrenome(); ?>" required>
                      </div>
                    </div>


                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="txtDataNasc">Data Nascimento</label>
                        <input type="date" class="form-control" id="txtDataNasc" name="txtDataNasc" value="" required>
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
            </div>

            <div class="card">

              <div class="card-header" id="candidatoEndereco" data-toggle="collapse" data-target="#collapsecandidatoEndereco" aria-expanded="true" aria-controls="collapsecandidatoEndereco">
                Endereço
                <button name="btnAlterarSalvarEndereco" id="btnAlterarSalvarEndereco" class="btn btn-primary float-right" data-toggle="collapse" data-target="#collapsecandidatoEndereco" aria-expanded="true" aria-controls="collapsecandidatoEndereco">Alterar</button>
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
                <button name="btnAlterarSalvarContato" id="btnAlterarSalvarContato" class="btn btn-primary float-right" data-toggle="collapse" data-target="#collapsecandidatoContato" aria-expanded="true" aria-controls="collapsecandidatoContato">Alterar</button>
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

          </form>

        </div>
      </div>
    </div>

  </section>

    <button name="btnContinuar" id="btnContinuar" class="btn btn-primary float-right" data-toggle="collapse">Continuar</button>

</div>

       

<?php include 'footer.php'; ?>
