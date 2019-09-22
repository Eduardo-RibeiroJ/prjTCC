<?php
include_once "../Model/Conexao.php";
include_once "../Model/Candidato.php";
include_once "../Controller/CandidatoDAO.php";

$conn = new Conexao();
$candidato = new Candidato();
$candidatoDAO = new CandidatoDAO($conn);

//Aqui é o CPF da session
$candidato->setCpf("415");

$candidatoDAO->Listar($candidato);

?>

<?php include_once 'headerCand.php'; ?>

<div class="container">

  <section>

    <div class="container-small">
      <div class="row">
        <div class=col>
          <h4>Altere seu perfil!</h4>
        </div>
      </div>
     </div>


    <div class="row">
      <div class="col">

        <div class="accordion" id="accordionCandidatoDadosPessoais">

          <form>

            <input type="hidden" id="cpf" name="cpf" value="<?= $candidato->getCpf(); ?>">

            <div class="card">

              <div class="card-header" id="candidatoDadosPessoais">
                Dados Pessoais
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
                        <input type="date" class="form-control" id="txtDataNasc" name="txtDataNasc" value="<?= $candidato->getDataNasc(); ?>" required>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="cbbEstadoCivil">Estado Civil</label>
                        <select class="custom-select" id="cbbEstadoCivil" name="cbbEstadoCivil" required>

                        <?php

                          $alternativas = ['S','C','D','V'];

                            foreach ($alternativas as $value) {

                              if($value == $candidato->getEstadoCivil())
                                $selected = 'selected';
                              else
                                $selected = '';

                              echo '<option value="'.$value.'" '.$selected.'>'.$value.'</option>';
                            }

                          ?>
                        </select>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="cbbSexo">Sexo</label>
                        <select class="custom-select" id="cbbSexo" name="cbbSexo" required>
                          
                          <?php

                          $alternativas = ['M','F'];

                            foreach ($alternativas as $value) {

                              if($value == $candidato->getSexo())
                                $selected = 'selected';
                              else
                                $selected = '';

                              echo '<option value="'.$value.'" '.$selected.'>'.$value.'</option>';
                            }

                          ?>

                        </select>
                      </div>
                    </div>
                          
                  </div>
                </div>
              </div>
            </div>

            <div class="card">

              <div class="card-header" id="candidatoEndereco">
                Endereço
                <button name="btnAlterarSalvarEndereco" id="btnAlterarSalvarEndereco" class="btn btn-primary float-right" data-toggle="collapse" data-target="#collapsecandidatoEndereco" aria-expanded="true" aria-controls="collapsecandidatoEndereco">Alterar</button>
              </div>

              <div id="collapsecandidatoEndereco" class="collapse" aria-labelledby="candidatoEndereco" data-parent="#accordionCandidatoDadosPessoais">

                <div class="card-body">
                  <div class="card-text">

                      <div class="form-row">
                        <div class="form-group col-lg-6">
                          <label for="txtCEP">CEP</label>
                          <input type="text" class="form-control" id="txtCEP" name="txtCEP" value="<?= $candidato->getCep(); ?>" required>
                        </div>

                        <div class="form-group col-lg-6">
                          <label for="txtEndereco">Endereço</label>
                          <input type="text" class="form-control" id="txtEndereco" name="txtEndereco" value="<?= $candidato->getEndereco(); ?>" required>
                        </div>
                      </div>

                      <div class="form-row">

                        <div class="form-group col-md-5">
                          <label for="txtBairro">Bairro</label>
                          <input type="text" class="form-control" id="txtBairro" name="txtBairro" value="<?= $candidato->getBairro(); ?>" required>
                        </div>

                        <div class="form-group col-md-5">
                          <label for="txtCidade">Cidade</label>
                          <input type="text" class="form-control" id="txtCidade" name="txtCidade" value="<?= $candidato->getCidade(); ?>" required>
                        </div>

                        <div class="form-group col-md-2">
                          <label for="txtUF">Estado</label>
                          <input type="text" class="form-control" id="txtUF" name="txtUF" value="<?= $candidato->getEstado(); ?>" required>
                        </div>
                      </div> 
                  
                  </div>
                </div>
              </div>
            </div>

            <div class="card">

              <div class="card-header" id="candidatoContato">
                Contato
                <button name="btnAlterarSalvarContato" id="btnAlterarSalvarContato" class="btn btn-primary float-right" data-toggle="collapse" data-target="#collapsecandidatoContato" aria-expanded="true" aria-controls="collapsecandidatoContato">Alterar</button>
              </div>

              <div id="collapsecandidatoContato" class="collapse" aria-labelledby="candidatoContato" data-parent="#accordionCandidatoDadosPessoais">

                <div class="card-body">
                  <div class="card-text">

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="txtTelefone">Telefone</label>
                          <input type="text" class="form-control" id="txtTelefone" name="txtTelefone" value="<?= $candidato->getTel1(); ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                          <label for="txtTelefone2">Telefone 2</label>
                          <input type="text" class="form-control" id="txtTelefone2" name="txtTelefone2" value="<?= $candidato->getTel2(); ?>">
                        </div>

                      </div>

                      <div class="form-row">
                        <div class="form-group col">
                          <label for="txtlinkedin">LinkedIn</label>
                          <input type="text" class="form-control" id="txtlinkedin" name="txtlinkedin" value="<?= $candidato->getLinkedin(); ?>">
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col">
                          <label for="txtFacebook">Facebook</label>
                          <input type="text" class="form-control" id="txtFacebook" name="txtFacebook" value="<?= $candidato->getFacebook(); ?>">
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col">
                          <label for="txtSitePessoal">Site Pessoal</label>
                          <input type="text" class="form-control" id="txtSitePessoal" name="txtSitePessoal" value="<?= $candidato->getSitePessoal(); ?>">
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
