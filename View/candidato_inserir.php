<?php
session_start();

include_once "../Model/Conexao.php";
include_once "../Model/Candidato.php";
include_once "../Controller/CandidatoDAO.php";

$conn = new Conexao();
$candidato = new Candidato();
$candidatoDAO = new CandidatoDAO($conn);

if (isset($_POST['btnSalvar'])) {

  $candidato->inserirCandidato(
    $_SESSION['cpf'],
    $_POST['txtNome'],
    $_POST['txtSobrenome'],
    $_POST['cbbSexo'],
    $_POST['txtDataNasc'],
    $_SESSION['email'],
    $_SESSION['senha'],
    $_POST['cbbEstadoCivil'],
    $_POST['txtCEP'],
    $_POST['txtEndereco'],
    $_POST['txtBairro'],
    $_POST['txtCidade'],
    $_POST['txtUF'],
    $_POST['txtTelefone1'],
    $_POST['txtTelefone2'],
    $_POST['txtLinkedin'],
    $_POST['txtFacebook'],
    $_POST['txtSitePessoal']
  );

  $candidatoDAO->Inserir($candidato);

  session_destroy();
  header('Location: candidato_logar.php');

}

?>

<?php include_once 'header.php'; ?>

<div class="container">

  <div class="jumbotron p-3 p-md-5">
    <div class="container p-0">
      <h5 class="display-4 display-md-2"><i class="fas fa-user-tie d-none d-md-inline"></i> Queremos saber sobre você!</h1>
      
      <hr class="my-2 my-md-4">
      <p class="lead">Insira seus dados pessoais para começarmos.</p>
    </div>
  </div>

  <section>

    <div class="row">
      <div class="col">

          <form method="POST" action="candidato_inserir.php">

          <!-- Input hidden só pare teste, o verdadeiro vai ficar em uma variavel session -->
          <input type="hidden" id="cpf" name="cpf" value="<?= $_SESSION['cpf']; ?>">
          <input type="hidden" id="email" name="email" value="edu@edu">
          <input type="hidden" id="senha" name="senha" value="12345">

            <div class="card">
              <div class="card-header">
                <i class="fas fa-id-card"></i>
                Dados Pessoais
              </div>

              <div class="card-body">
                <div class="card-text">

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="txtNome">Nome</label>
                      <input type="text" class="form-control" id="txtNome" name="txtNome" required autofocus>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="txtSobrenome">Sobrenome</label>
                      <input type="text" class="form-control" id="txtSobrenome" name="txtSobrenome" required>
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

            <div class="card">

              <div class="card-header">
                <i class="fas fa-map-marked-alt"></i>
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
                        <label for="txtSitePessoal">Site Pessoal</label>
                        <input type="text" class="form-control" id="txtSitePessoal" name="txtSitePessoal" placeholder="">
                      </div>
                    </div>
                    
                </div>
              </div>
            </div>

            <hr class="my-2 my-md-4">

            <div class="form-row">
              <div class="col text-center">
                <input type="submit" name="btnSalvar" id="btnSalvar" class="btn btn-warning btn-lg float-right" value="Cadastrar!">
              </div>
            </div>

          </form>

      </div>
    </div>

  </section>

</div>

       

<?php include 'footer.php'; ?>
