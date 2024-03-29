<?php

include_once 'headerCand.php';

include_once "../Model/Conexao.php";
include_once "../Model/Candidato.php";
include_once "../Controller/CandidatoDAO.php";

$conn = new Conexao();
$candidato = new Candidato();
$candidatoDAO = new CandidatoDAO($conn);

//Aqui é o CPF da session
$candidato->setCpf($_SESSION['cpf']);

$candidatoDAO->Listar($candidato);

?>

<div style="background-image: linear-gradient(to left, rgba(188, 216, 238, 1), rgba(145,184,217,1));">
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

          <div class="accordion" id="accordionCandidatoDadosPessoais">

            <input type="hidden" id="cpf" name="cpf" value="<?= $candidato->getCpf(); ?>">

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
                        <input type="text" class="form-control" id="txtNome" name="txtNome" value="<?= $candidato->getNome(); ?>" required>
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
                          <option value="<?= $candidato->getEstadoCivil(); ?>" selected><?= $candidato->getEstadoCivil(); ?></option>
                          <option value="S">Solteiro(a)</option>
                          <option value="C">Casado(a)</option>
                          <option value="D">Divorcidado(a)</option>
                          <option value="V">Viúvo(a)</option>
                        </select>
                        <?php

                        ?>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="cbbSexo">Sexo</label>
                        <select class="custom-select" id="cbbSexo" name="cbbSexo" required>
                          <option value="<?= $candidato->getSexo(); ?>" selected><?= $candidato->getSexo(); ?></option>
                          <option value="M">Masculino</option>
                          <option value="F">Feminino</option>
                        </select>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col">
                        <button name="btnAlterarSalvarDadosPessoais" id="btnAlterarSalvarDadosPessoais" class="btn btn-primary float-right"><i class="far fa-save"></i> Salvar</button>
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
                        <input type="text" class="form-control" id="txtUF" name="txtUF" maxlength="2" style="text-transform:uppercase" value="<?= $candidato->getEstado(); ?>" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col">
                        <button name="btnAlterarSalvarEndereco" id="btnAlterarSalvarEndereco" class="btn btn-primary float-right"><i class="far fa-save"></i> Salvar</button>
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
                        <label for="txtTelefone1">Telefone Celular</label>
                        <input type="text" class="form-control" id="txtTelefone1" name="txtTelefone1" value="<?= $candidato->getTel1(); ?>" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="txtTelefone2">Telefone Fixo</label>
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

                    <div class="row">
                      <div class="col">
                        <button name="btnAlterarSalvarContato" id="btnAlterarSalvarContato" class="btn btn-primary float-right"><i class="far fa-save"></i> Salvar</button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <hr class="my-2 my-md-3">

      <div class="row">
        <div class="col">
          <a href="candidato_perfil.php" class="btn btn-primary float-right">Voltar</a>
        </div>
      </div>

    </section>

  </div>
</div>

<script type="text/javascript">
  jQuery(function($) {
    $("#txtCEP").mask("99999-999");
    $("#txtTelefone1").mask("(99)99999-9999");
    $("#txtTelefone2").mask("(99)9999-9999");
  });
</script>

<?php include 'footer.php'; ?>