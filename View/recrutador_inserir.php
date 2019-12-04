<?php
session_start();

include_once "../Model/Conexao.php";
include_once "../Model/Recrutador.php";
include_once "../Controller/RecrutadorDAO.php";

$conn = new Conexao();
$recrutador = new Recrutador();
$recrutadorDAO = new RecrutadorDAO($conn);

if (isset($_POST['btnSalvar'])) {

  $recrutador->inserirRecrutador(
    $_SESSION['cnpj'],
    $_POST['txtNomeEmpresa'],
    $_SESSION['email'],
    $_SESSION['senha'],
    $_POST['txtCEP'],
    $_POST['txtEstado'],
    $_POST['txtCidade'],
    $_POST['txtEndereco'],
    $_POST['txtBairro'],
    $_POST['txtTelefone1'],
    $_POST['txtTelefone2'],
    $_POST['txtLinkedin'],
    $_POST['txtFacebook'],
    $_POST['txtSiteEmpresa']
  );

  $recrutadorDAO->Inserir($recrutador);

  session_destroy();
  header('Location: recrutador_logar.php');
}

?>

<?php include_once 'header.php'; ?>

<div style="background-image: linear-gradient(to left, rgba(188, 216, 238, 1), rgba(145,184,217,1));">
  <div class="container">

    <div class="jumbotron p-3 p-md-5">
      <div class="container p-0">
        <h5 class="display-4 display-md-2"><i class="fas fa-building d-none d-md-inline"></i> Queremos saber sobre sua empresa!</h1>

          <hr class="my-2 my-md-3">
          <p class="lead">Insira as informações sobre a sua empresa.</p>
      </div>
    </div>

    <section>

      <div class="row">
        <div class="col">

          <form method="POST" action="recrutador_inserir.php">

            <div class="card">
              <div class="card-header">
                <i class="fas fa-id-card"></i>
                Dados da empresa
              </div>

              <div class="card-body">
                <div class="card-text">

                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="txtNomeEmpresa">Nome da empresa</label>
                      <input type="text" class="form-control" id="txtNomeEmpresa" name="txtNomeEmpresa" required autofocus>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-lg-7">
                      <label for="txtEndereco">Endereço</label>
                      <input type="text" class="form-control" id="txtEndereco" name="txtEndereco" placeholder="Rua e número" required>
                    </div>
                    <div class="form-group col-lg-3">
                      <label for="txtCEP">CEP</label>
                      <input type="text" class="form-control" id="txtCEP" name="txtCEP" placeholder="" required>
                    </div>
                    <div class="form-group col-md-2">
                      <label for="txtEstado">Estado</label>
                      <input type="text" class="form-control" id="txtEstado" name="txtEstado" placeholder="" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="txtCidade">Cidade</label>
                      <input type="text" class="form-control" id="txtCidade" name="txtCidade" placeholder="" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="txtBairro">Bairro</label>
                      <input type="text" class="form-control" id="txtBairro" name="txtBairro" placeholder="" required>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="card">

              <div class="card-header">
                <i class="fas fa-phone"></i>
                Contato
              </div>

              <div class="card-body">
                <div class="card-text">

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="txtTelefone1">Telefone</label>
                      <input type="text" class="form-control" id="txtTelefone1" name="txtTelefone1" placeholder="" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="txtTelefone2">Telefone 2</label>
                      <input type="text" class="form-control" id="txtTelefone2" name="txtTelefone2" placeholder="">
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col">
                      <label for="txtLinkedin">LinkedIn</label>
                      <input type="text" class="form-control" id="txtLinkedin" name="txtLinkedin" placeholder="">
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
                      <label for="txtSiteEmpresa">Site da empresa</label>
                      <input type="text" class="form-control" id="txtSiteEmpresa" name="txtSiteEmpresa" placeholder="">
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <hr class="my-2 my-md-4">

            <div class="form-row">
              <div class="col text-center">
                <input type="submit" name="btnSalvar" id="btnSalvar" class="btn btn-primary btn-lg float-right" value="Cadastrar!">
              </div>
            </div>
          </form>

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