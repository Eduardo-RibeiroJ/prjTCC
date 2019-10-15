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

<div class="container">

  <section>

    <div class="row">
      <div class="col">

        <div class="accordion" id="accordionCandidatoPerfil">

            <input type="hidden" id="cpf" name="cpf" value="<?= $candidato->getCpf(); ?>">

            <div class="card">

              <div class="card-header" id="candidatoDadosPessoais">
                Dados Pessoais
                <button value="min" name="btnExpandir" id="btnExpandir" class="btn btn-outline-primary float-right" data-toggle="collapse" data-target="#collapsecandidatoDadosPessoais" aria-expanded="true" aria-controls="collapsecandidatoDadosPessoais">
									<i class="fas fa-minus"></i>
                </button>
              </div>

              <div id="collapsecandidatoDadosPessoais" class="collapse show" aria-labelledby="candidatoDadosPessoais" data-parent="#accordionCandidatoPerfil">

                <div class="card-body">
                  <div class="card-text">

                    <div class="form-row">
                      <div class="form-group col">
												<h4 class="display-4">
													<?= $candidato->getNome(); ?> <?= $candidato->getSobrenome(); ?>
												</h4>
                      </div>
                    </div>


                    <div class="form-row">
											<div class="form-group col">
												<p><strong>Data de nascimento: </strong><?= $candidato->getDataNasc(); ?></p>
												<p><strong>Estado Civil: </strong><?= $candidato->getEstadoCivil(); ?></p>
												<p><strong>Sexo: </strong><?= $candidato->getSexo(); ?></p>
                      
											</div>
										</div>
                    
                      <div class="row">
                        <div class="col">
                          <button name="btnAlterarSalvarDadosPessoais" id="btnAlterarSalvarDadosPessoais" class="btn btn-outline-primary float-right"><i class="fas fa-pencil-alt"></i></button>
                        </div>
                      </div>
                          
                  </div>
                </div>
              </div>
            </div>

            <div class="card">

              <div class="card-header" id="candidatoEndereco">
                Endereço
                <button name="btnAlterarEndereco" id="btnAlterarEndereco" class="btn btn-outline-primary float-right" data-toggle="collapse" data-target="#collapseCandidatoEndereco" aria-expanded="true" aria-controls="collapseCandidatoEndereco">
                  <i class="fas fa-pencil-alt"></i>
                </button>
              </div>

              <div id="collapseCandidatoEndereco" class="collapse" aria-labelledby="candidatoEndereco" data-parent="#accordionCandidatoPerfil">

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

              <div id="collapsecandidatoContato" class="collapse" aria-labelledby="candidatoContato" data-parent="#accordionCandidatoPerfil">

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
        <button href="candidato.php" class="btn btn-primary float-right" >Visualizar Perfil</button>
      </div>
    </div>

  </section>

</div>

       

<?php include 'footer.php'; ?>
