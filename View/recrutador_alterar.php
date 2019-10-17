<?php

include_once 'headerRecrut.php';

include_once "../Model/Conexao.php";
include_once "../Model/Recrutador.php";
include_once "../Controller/RecrutadorDAO.php";

$conn = new Conexao();
$recrutador = new Recrutador();
$recrutadorDAO = new RecrutadorDAO($conn);

//Aqui é o CPF da session
$recrutador->setCnpj($_SESSION['cnpj']);

$recrutadorDAO->Listar($recrutador);

?>

<div class="container">

<div class="jumbotron p-3 p-md-5">
    <div class="container p-0">
      <h5 class="display-4 display-md-2"><i class="fas fa-user-tie d-none d-md-inline"> </i>Mantenha-se atualizado!</h1>
      
      <hr class="my-2 my-md-4">
      <p class="lead">Gerencie aqui seus principais dados.</p>
    </div>
  </div>

  <section>

    <div class="row">
      <div class="col">

        <div class="accordion" id="accordionCandidatoDadosPessoais">

            <input type="hidden" id="cnpj" name="cnpj" value="<?= $recrutador->getCpf(); ?>">

            <div class="card">

              <div class="card-header" id="candidatoDadosPessoais">
                <i class="fas fa-id-card"></i>
                Dados Pessoais
                <button name="btnAlterarDadosPessoais" id="btnAlterarDadosPessoais" class="btn btn-outline-primary float-right" data-toggle="collapse" data-target="#collapsecandidatoDadosPessoais" aria-expanded="true" aria-controls="collapsecandidatoDadosPessoais">
                  <i class="fas fa-pencil-alt"></i>
                </button>
              </div>

              <div id="collapsecandidatoDadosPessoais" class="collapse" aria-labelledby="candidatoDadosPessoais" data-parent="#accordionCandidatoDadosPessoais">

                <div class="card-body">
                  <div class="card-text">

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="txtNome">Nome</label>
                        <input type="text" class="form-control" id="txtNome" name="txtNome" value="<?= $recrutador->getNome(); ?>" required autofocus>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="txtSobrenome">Sobrenome</label>
                        <input type="text" class="form-control" id="txtSobrenome" name="txtSobrenome" value="<?= $recrutador->getSobrenome(); ?>" required>
                      </div>
                    </div>


                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="txtDataNasc">Data Nascimento</label>
                        <input type="date" class="form-control" id="txtDataNasc" name="txtDataNasc" value="<?= $recrutador->getDataNasc(); ?>" required>
                      </div>

                      <div class="row d-flex justify-content-center">
                        <div class="col d-flex justify-content-center">
                          <button name="btnAlterarSalvarDadosPessoais" id="btnAlterarSalvarDadosPessoais" class="btn btn-primary">Salvar</button>
                        </div>
                      </div>

                    </div>
                          
                  </div>
                </div>
              </div>
            </div>

            <div class="card">

              <div class="card-header" id="candidatoEndereco">
                <i class="fas fa-map-marked-alt"></i>
                Endereço
                <button name="btnAlterarEndereco" id="btnAlterarEndereco" class="btn btn-outline-primary float-right" data-toggle="collapse" data-target="#collapseCandidatoEndereco" aria-expanded="true" aria-controls="collapseCandidatoEndereco">
                  <i class="fas fa-pencil-alt"></i>
                </button>
              </div>

              <div id="collapseCandidatoEndereco" class="collapse" aria-labelledby="candidatoEndereco" data-parent="#accordionCandidatoDadosPessoais">

                <div class="card-body">
                  <div class="card-text">

                    <div class="form-row">
                      <div class="form-group col-lg-6">
                        <label for="txtCEP">CEP</label>
                        <input type="text" class="form-control" id="txtCEP" name="txtCEP" value="<?= $recrutador->getCep(); ?>" required>
                      </div>

                      <div class="form-group col-lg-6">
                        <label for="txtEndereco">Endereço</label>
                        <input type="text" class="form-control" id="txtEndereco" name="txtEndereco" value="<?= $recrutador->getEndereco(); ?>" required>
                      </div>
                    </div>

                    <div class="form-row">

                      <div class="form-group col-md-5">
                        <label for="txtBairro">Bairro</label>
                        <input type="text" class="form-control" id="txtBairro" name="txtBairro" value="<?= $recrutador->getBairro(); ?>" required>
                      </div>

                      <div class="form-group col-md-5">
                        <label for="txtCidade">Cidade</label>
                        <input type="text" class="form-control" id="txtCidade" name="txtCidade" value="<?= $recrutador->getCidade(); ?>" required>
                      </div>

                      <div class="form-group col-md-2">
                        <label for="txtUF">Estado</label>
                        <input type="text" class="form-control" id="txtUF" name="txtUF" value="<?= $recrutador->getEstado(); ?>" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col">
                        <button name="btnAlterarSalvarEndereco" id="btnAlterarSalvarEndereco" class="btn btn-primary float-right">Salvar</button>
                      </div>
                    </div>
                  
                  </div>
                </div>
              </div>
            </div>

            <div class="card">

              <div class="card-header" id="candidatoContato">
                <i class="fas fa-phone"></i>
                Contato
                <button name="btnAlterarContato" id="btnAlterarContato" class="btn btn-outline-primary float-right" data-toggle="collapse" data-target="#collapsecandidatoContato" aria-expanded="true" aria-controls="collapsecandidatoContato">
                  <i class="fas fa-pencil-alt"></i>
                </button>
              </div>

              <div id="collapsecandidatoContato" class="collapse" aria-labelledby="candidatoContato" data-parent="#accordionCandidatoDadosPessoais">

                <div class="card-body">
                  <div class="card-text">

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="txtTelefone">Telefone</label>
                          <input type="text" class="form-control" id="txtTelefone" name="txtTelefone" value="<?= $recrutador->getTel1(); ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                          <label for="txtTelefone2">Telefone 2</label>
                          <input type="text" class="form-control" id="txtTelefone2" name="txtTelefone2" value="<?= $recrutador->getTel2(); ?>">
                        </div>

                      </div>

                      <div class="form-row">
                        <div class="form-group col">
                          <label for="txtlinkedin">LinkedIn</label>
                          <input type="text" class="form-control" id="txtlinkedin" name="txtlinkedin" value="<?= $recrutador->getLinkedin(); ?>">
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col">
                          <label for="txtFacebook">Facebook</label>
                          <input type="text" class="form-control" id="txtFacebook" name="txtFacebook" value="<?= $recrutador->getFacebook(); ?>">
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col">
                          <label for="txtSitePessoal">Site Pessoal</label>
                          <input type="text" class="form-control" id="txtSitePessoal" name="txtSitePessoal" value="<?= $recrutador->getSitePessoal(); ?>">
                        </div>
                      </div>

                      <div class="row">
                        <div class="col d-flex justify-content-center">
                          <button name="btnAlterarSalvarContato" id="btnAlterarSalvarContato" class="btn btn-primary">Salvar</button>
                        </div>
                      </div>
                      
                  </div>
                </div>
              </div>
            </div>

        </div>
      </div>
    </div>

    <hr class="my-2 my-md-4">

    <div class="row">
      <div class="col">
        <button href="recrutador.php" class="btn btn-primary float-right" >Visualizar Perfil</button>
      </div>
    </div>

  </section>

</div>

       

<?php include 'footer.php'; ?>
