<?php
include_once "../Model/Conexao.php";
include_once "../Model/Candidato.php";
include_once "../Controller/CandidatoDAO.php";

$conn = new Conexao();
$candidato = new Candidato();
$candidatoDAO = new CandidatoDAO($conn);

if (isset($_POST['btnSalvar'])) {

  $candidato->inserirCandidato(
    $_POST['cpf'],
    $_POST['txtNome'],
    $_POST['txtSobrenome'],
    $_POST['cbbSexo'],
    $_POST['txtDataNasc'],
    $_POST['email'],
    $_POST['senha'],
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

  $candidatoDAO->Alterar($candidato);

  header('Location: candidato_inserir_formacao.php');
}

?>

<?php include_once 'headerCand.php'; ?>

<div class="container">

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

          <form method="POST" action="candidato_inserir.php">

          <!-- Input hidden só pare teste, o verdadeiro vai ficar em uma variavel session -->
          <input type="hidden" id="cpf" name="cpf" value="415">
          <input type="hidden" id="email" name="email" value="edu@edu">
          <input type="hidden" id="senha" name="senha" value="12345">

            <div class="card">
              <div class="card-header">
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

            <div class="row">
              <div class="col text-center">
                <input type="submit" name="btnSalvar" id="btnSalvar" class="btn btn-primary" value="Salvar e Continuar">
              </div>
            </div>

          </form>

      </div>
    </div>

  </section>

</div>

       

<?php include 'footer.php'; ?>
