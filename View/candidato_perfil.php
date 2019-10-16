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

  <section id="sectionCandidatoPerfil">

    <div class="row">
      <div class="col">


            <input type="hidden" id="cpf" name="cpf" value="<?= $candidato->getCpf(); ?>">

            <div class="card">

              <div class="card-header" id="candidatoDadosPessoais" data-toggle="collapse" data-target="#collapsecandidatoDadosPessoais" aria-expanded="true" aria-controls="collapsecandidatoDadosPessoais">
                Dados Pessoais
                <button name="btnAlterarDadosPessoais" id="btnAlterarDadosPessoais" class="btn btn-outline-primary float-right">
                  <i class="fas fa-pencil-alt"></i>
                </button>
              </div>

              <div id="collapsecandidatoDadosPessoais" class="collapse show" aria-labelledby="candidatoDadosPessoais">

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
												<p><strong>Data de Nascimento: </strong><?= $candidato->getDataNasc(); ?></p>
												<p><strong>Estado Civil: </strong><?= $candidato->getEstadoCivil(); ?></p>
												<p><strong>Sexo: </strong><?= $candidato->getSexo(); ?></p>
                      
											</div>
										</div>
                          
                  </div>
                </div>
              </div>
            </div>

            <div class="card">

              <div class="card-header" id="candidatoEndereco" data-toggle="collapse" data-target="#collapseCandidatoEndereco" aria-expanded="true" aria-controls="collapseCandidatoEndereco">
                Endereço
                <button name="btnAlterarEndereco" id="btnAlterarEndereco" class="btn btn-outline-primary float-right">
                  <i class="fas fa-pencil-alt"></i>
                </button>
              </div>

              <div id="collapseCandidatoEndereco" class="collapse show" aria-labelledby="candidatoEndereco">

                <div class="card-body">
                  <div class="card-text">

                    <div class="form-row">
                      <div class="form-group col">

                        <p><strong>CEP: </strong><?= $candidato->getCep(); ?></p>
												<p><strong>Endereço: </strong><?= $candidato->getEndereco(); ?></p>
												<p><strong>Bairro: </strong><?= $candidato->getBairro(); ?></p>
												<p><strong>Cidade: </strong><?= $candidato->getCidade(); ?> - <?= $candidato->getEstado(); ?></p>
                      
                      </div>                      
                    </div>
                  
                  </div>
                </div>
              </div>
            </div>

            <div class="card">

              <div class="card-header" id="candidatoContato" data-toggle="collapse" data-target="#collapsecandidatoContato" aria-expanded="true" aria-controls="collapsecandidatoContato">
                Contato
                <button name="btnAlterarContato" id="btnAlterarContato" class="btn btn-outline-primary float-right">
                  <i class="fas fa-pencil-alt"></i>
                </button>
              </div>

              <div id="collapsecandidatoContato" class="collapse show" aria-labelledby="candidatoContato">

                <div class="card-body">
                  <div class="card-text">

                      <div class="form-row">
                        <div class="form-group col">  

                          <p><strong>E-mail: </strong><?= $candidato->getEmail(); ?></p>
                          <p><strong>Telefone 1: </strong><?= $candidato->getTel1(); ?></p>
                          <p><strong>Telefone 2: </strong><?= $candidato->getTel2(); ?></p>
                          <p><strong>LinkedIn: </strong><?= $candidato->getLinkedin(); ?></p>
                          <p><strong>Facebook: </strong><?= $candidato->getFacebook(); ?></p>
                          <p><strong>Site Pessoal: </strong><?= $candidato->getSitePessoal(); ?></p>

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

       

<?php include 'footer.php'; ?>
