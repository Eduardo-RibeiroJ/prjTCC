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

<div style="background-image: linear-gradient(to right, rgba(188, 216, 238, 1), rgba(145,184,217,1));">
  <div class="container">

    <div class="jumbotron p-3 p-md-5">
      <div class="container p-0">
        <h5 class="display-4 display-md-2"><i class="fas fa-user-tie d-none d-md-inline"> </i>Mantenha-se atualizado!</h1>

          <hr class="my-2 my-md-3">
          <p class="lead">Gerencie aqui seus principais dados.</p>
      </div>
    </div>

    <section>

      <div class="row">
        <div class="col">

          <div class="accordion" id="accordionRecrutadorDados">
            <input type="hidden" id="txtCnpj" name="txtCnpj" value="<?= $recrutador->getCnpj(); ?>">

            <div class="card">
              <div class="card-header" id="recrutadorDados">
                <i class="fas fa-id-card"></i>
                Dados da empresa
                <button name="btnAlterarDadosEmpresa" id="btnAlterarDadosEmpresa" class="btn btn-outline-primary float-right" data-toggle="collapse" data-target="#collapseRecrutadorDados" aria-expanded="true" aria-controls="collapseRecrutadorDados">
                  <i class="fas fa-pencil-alt"></i>
                </button>
              </div>

              <div id="collapseRecrutadorDados" class="collapse" aria-labelledby="recrutadorDados" data-parent="#accordionRecrutadorDados">

                <div class="card-body">
                  <div class="card-text">

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="txtNomeEmpresa">Nome da empresa</label>
                        <input type="text" class="form-control" id="txtNomeEmpresa" name="txtNomeEmpresa" value="<?= $recrutador->getNomeEmpresa(); ?>" required autofocus>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-lg-6">
                        <label for="txtEndereco">Endereço</label>
                        <input type="text" class="form-control" id="txtEndereco" name="txtEndereco" placeholder="Rua e número" value="<?= $recrutador->getEndereco(); ?>" required>
                      </div>
                      <div class="form-group col-lg-2">
                        <label for="txtCEP">CEP</label>
                        <input type="text" class="form-control" id="txtCEP" name="txtCEP" placeholder="" value="<?= $recrutador->getCep(); ?>" required>
                      </div>
                      <div class="form-group col-md-2">
                        <label for="txtEstado">Estado</label>
                        <input type="text" class="form-control" id="txtEstado" name="txtEstado" placeholder="" value="<?= $recrutador->getEstado(); ?>" required>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-5">
                        <label for="txtCidade">Cidade</label>
                        <input type="text" class="form-control" id="txtCidade" name="txtCidade" placeholder="" value="<?= $recrutador->getCidade(); ?>" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="txtBairro">Bairro</label>
                        <input type="text" class="form-control" id="txtBairro" name="txtBairro" placeholder="" value="<?= $recrutador->getBairro(); ?>" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col">
                        <button name="btnAlterarSalvarEnderecoRecrutador" id="btnAlterarSalvarEnderecoRecrutador" class="btn btn-primary float-right">Salvar</button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="card">

              <div class="card-header" id="recrutadorContato">
                <i class="fas fa-phone"></i>
                Contato
                <button name="btnAlterarContato" id="btnAlterarContato" class="btn btn-outline-primary float-right" data-toggle="collapse" data-target="#collapseRecrutadorContato" aria-expanded="true" aria-controls="collapseRecrutadorContato">
                  <i class="fas fa-pencil-alt"></i>
                </button>
              </div>

              <div id="collapseRecrutadorContato" class="collapse" aria-labelledby="recrutadorContato" data-parent="#accordionRecrutadorDados">

                <div class="card-body">
                  <div class="card-text">

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="txtTelefone1">Telefone</label>
                        <input type="text" class="form-control" id="txtTelefone1" name="txtTelefone1" placeholder="" value="<?= $recrutador->getTel1(); ?>" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="txtTelefone2">Telefone 2</label>
                        <input type="text" class="form-control" id="txtTelefone2" name="txtTelefone2" placeholder="" value="<?= $recrutador->getTel2(); ?>">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col">
                        <label for="txtLinkedin">LinkedIn</label>
                        <input type="text" class="form-control" id="txtLinkedin" name="txtLinkedin" placeholder="" value="<?= $recrutador->getLinkedin(); ?>">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col">
                        <label for="txtFacebook">Facebook</label>
                        <input type="text" class="form-control" id="txtFacebook" name="txtFacebook" placeholder="" value="<?= $recrutador->getFacebook(); ?>">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col">
                        <label for="txtSiteEmpresa">Site da empresa</label>
                        <input type="text" class="form-control" id="txtSiteEmpresa" name="txtSiteEmpresa" placeholder="" value="<?= $recrutador->getSiteEmpresa(); ?>">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col">
                        <button name="btnAlterarSalvarContatoRecrutador" id="btnAlterarSalvarContatoRecrutador" class="btn btn-primary float-right">Salvar</button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </section>
  </div>
</div>

<script type="text/javascript">
  //Máscaras
  jQuery(function($) {
    $("#txtCEP").mask("99999-999");
    $("#txtTelefone1").mask("(99)99999-9999");
    $("#txtTelefone2").mask("(99)9999-9999");
  });
</script>

<?php include 'footer.php'; ?>