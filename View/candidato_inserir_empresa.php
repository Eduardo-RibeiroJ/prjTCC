<?php

include_once 'headerCand.php';

include_once "../Model/Conexao.php";
include_once "../Model/CandidatoEmpresa.php";
include_once "../Controller/CandidatoEmpresaDAO.php";

include_once "../Model/Candidato.php";
include_once "../Controller/CandidatoDAO.php";

$conn = new Conexao();

$empresa = new CandidatoEmpresa();
$empresaDAO = new CandidatoEmpresaDAO($conn);

$candidato = new Candidato();
$candidatoDAO = new CandidatoDAO($conn);

$empresa->setCpf($_SESSION['cpf']);
$candidato->setCpf($_SESSION['cpf']);

$ultimoRegistro = $empresa->getUltimoRegistroEmpresa();

$arrayEmpresa = $empresaDAO->Listar($empresa);

?>

<div style="background-image: linear-gradient(to left, rgba(220, 240, 255, 1), rgba(130,175,210,1));">
  <div class="container">

    <div class="jumbotron p-3 p-md-5">
      <div class="container p-0">
        <h5 class="display-4 display-md-2"><i class="fas fa-briefcase d-none d-md-inline"> </i>Queremos saber sobre suas ultimas experiências profissionais!</h1>

          <hr class="my-2 my-md-3">
          <p class="lead">Gerencie aqui tudo sobre as suas experiências profissionais.</p>
      </div>
    </div>

    <input type="hidden" id="txtUltimoRegistro" name="txtUltimoRegistro" value="<?= $ultimoRegistro ?>">
    <input type="hidden" id="txtCpf" name="txtCpf" value="<?= $candidato->getCpf() ?>">

    <section id="sectionCardsEmpresa">

      <?php foreach ($arrayEmpresa as $reg) : ?>

        <div class="row">
          <div class="col">

            <div class="card mb-1">
              <div class="card-header" id="candidatoEmpresa<?= $reg->getIdEmpresa(); ?>">
                <p id="tituloHeader<?= $reg->getIdEmpresa(); ?>" class="d-inline"><?= $reg->getNomeEmpresa(); ?></p>
                <button name="btnAlterar<?= $reg->getIdEmpresa(); ?>" id="btnAlterar<?= $reg->getIdEmpresa(); ?>" class="btn btn-outline-primary float-right d-inline" data-toggle="collapse" data-target="#collapseCandidatoEmpresa<?= $reg->getIdEmpresa(); ?>">
                  <i class="fas fa-pencil-alt"></i>
                </button>
              </div>

              <div id="collapseCandidatoEmpresa<?= $reg->getIdEmpresa(); ?>" class="collapse">

                <div class="card-body">
                  <div class="card-text">

                    <div class="form-row">
                      <div class="form-group col-md-5">
                        <label for="txtNomeEmpresa">Nome da empresa</label>
                        <input type="text" class="form-control" id="txtNomeEmpresa<?= $reg->getIdEmpresa(); ?>" name="txtNomeEmpresa" value="<?= $reg->getNomeEmpresa(); ?>" required>
                      </div>
                      <div class="form-group col-md-5">
                        <label for="txtCargo">Cargo</label>
                        <input type="text" class="form-control" id="txtCargo<?= $reg->getIdEmpresa(); ?>" name="txtCargo" value="<?= $reg->getCargo(); ?>">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="dtaInicio">Data início</label>
                        <input type="date" class="form-control" id="dtaInicio<?= $reg->getIdEmpresa(); ?>" name="dtaInicio" value="<?= $reg->getDataInicio(); ?>" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="dtaTermino">Data de saída</label>
                        <input type="date" class="form-control" id="dtaTermino<?= $reg->getIdEmpresa(); ?>" name="dtaTermino" value="<?= $reg->getDataSaida(); ?>" required>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="txtAtividades">Atividade</label>
                        <textarea class="form-control" id="txtAtividades<?= $reg->getIdEmpresa(); ?>" name="txtAtividades" rows="5" value="<?= $reg->getAtividades(); ?>" required><?= $reg->getAtividades(); ?></textarea>
                      </div>
                    </div>

                    <div class="form-row float-right mb-2">
                      <div class="col">
                        <button value="<?= $reg->getIdEmpresa(); ?>" name="btnExcluirEmpresa" id="btnExcluirEmpresa" class="btn btn-danger"><i class="far fa-trash-alt"></i> Apagar</button>
                        <button value="<?= $reg->getIdEmpresa(); ?>" name="btnAlterarSalvarEmpresa" id="btnAlterarSalvarEmpresa" class="btn btn-primary"><i class="far fa-save"></i> Salvar</button>
                      </div>
                    </div>


                  </div> <!-- CardText -->
                </div> <!-- CardBody -->
              </div>
            </div> <!-- Card -->
          </div>
        </div>

      <?php endforeach; ?>

      <div class="row">
        <div class="col">
          <div class="card mb-1">
            <div class="card-header" id="candidatoEmpresa<?= $ultimoRegistro ?>">
              <p class="d-inline">Insira aqui uma empresa em que trabalhou!</p>
              <button name="btnAlterar<?= $ultimoRegistro ?>" id="btnAlterar<?= $ultimoRegistro ?>" class="btn btn-outline-primary float-right d-inline" data-toggle="collapse" data-target="#collapseCandidatoEmpresa<?= $ultimoRegistro ?>">
                <i class="fas fa-plus"></i>
              </button>
            </div>
            <div id="collapseCandidatoEmpresa<?= $ultimoRegistro ?>" class="collapse">
              <div class="card-body">
                <div class="card-text">

                  <div class="form-row">
                    <div class="form-group col-md-5">
                      <label for="txtNomeEmpresa">Nome da empresa</label>
                      <input type="text" class="form-control" id="txtNomeEmpresa<?= $ultimoRegistro ?>" name="txtNomeEmpresa" placeholder="" required>
                    </div>
                    <div class="form-group col-md-5">
                      <label for="txtCargo">Cargo</label>
                      <input type="text" class="form-control" id="txtCargo<?= $ultimoRegistro ?>" name="txtCargo" placeholder="">
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="dtaInicio">Data início</label>
                      <input type="date" class="form-control" id="dtaInicio<?= $ultimoRegistro ?>" name="dtaInicio" placeholder="" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="dtaTermino">Data de saída</label>
                      <input type="date" class="form-control" id="dtaTermino<?= $ultimoRegistro ?>" name="dtaTermino" placeholder="" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="txtAtividades">Atividade</label>
                      <textarea class="form-control" id="txtAtividades<?= $ultimoRegistro ?>" name="txtAtividades" rows="5" value="<?= $ultimoRegistro ?>" required></textarea>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col">
                      <button value="<?= $ultimoRegistro ?>" name="btnAlterarSalvarEmpresa" id="btnAlterarSalvarEmpresa" class="btn btn-primary float-right">Inserir</button>
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
<?php include 'footer.php'; ?>