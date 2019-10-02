<?php

include_once "../Model/Conexao.php";
include_once "../Model/CandidatoCompetencia.php";
include_once "../Controller/CandidatoCompetenciaDAO.php";

include_once "../Model/Candidato.php";
include_once "../Controller/CandidatoDAO.php";

$conn = new Conexao();

$competencia = new CandidatoCompetencia();
$competenciaDAO = new CandidatoCompetenciaDAO($conn);

$candidato = new Candidato();
$candidatoDAO = new CandidatoDAO($conn);

$competencia->setCpf('415');
$candidato->setCpf('415');

//$ultimoRegistro = $competencia->getUltimoRegistroCompetencia();

//$arrayCompetencia = $competenciaDAO->Listar($competencia);

?>

<?php include_once 'headerCand.php'; ?>

<div class="container">

    <input type="hidden" id="txtUltimoRegistro" name="txtUltimoRegistro" value="<?= $ultimoRegistro ?>">
    <input type="hidden" id="txtCpf" name="txtCpf" value="<?= $candidato->getCpf() ?>">

    <div class="jumbotron p-3 p-md-5">
        <div class="container p-0">
        <h5 class="display-4 display-md-2"><i class="fas fa-lightbulb d-none d-md-inline"></i> Queremos saber sobre suas competências!</h1>
        
        <hr class="my-2 my-md-4">
        <p class="lead">Adicione uma nova competência sempre que quiser.</p>
        </div>

        <form>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" id="txtNomeCompetencia<?= $ultimoRegistro ?>" name="txtNomeCompetencia" placeholder="Digite uma competência..." required>
            </div>
            <div class="form-group col-md-5">
                <select class="custom-select" id="cbbNivelCompetencia<?= $ultimoRegistro ?>" name="cbbNivelCompetencia" required>
                    <option value="" selected>Nível de conhecimento</option>
                    <option value="B">Básico</option>
                    <option value="I">Intermediário</option>
                    <option value="A">Avançado</option>
                </select>
            </div>
            <div class="form-group col-md-1">
                <input type="submit" class="btn btn-primary" id="btnInserirCompetencia<?= $ultimoRegistro ?>" name="btnInserirCompetencia" value="Inserir">
            </div>
        </div>
        </form>
    </div>

    <section id="sectionCompetencias">

    <div class="row d-flex justify-content-center">

    <?php //foreach($arrayCompetencias as $reg): ?>

        <div class="col-sm-6 div-competencia">
            <div class="row">
                <div class="col-sm-6">
                    Visual Studio
                </div>

                <div class="col-sm-5">
                    <select class="custom-select" id="cbbNivelCompetencia<?= $ultimoRegistro ?>" name="cbbNivelCompetencia" required>
                        <option value="" selected>Nível de conhecimento</option>
                        <option value="B">Básico</option>
                        <option value="I">Intermediário</option>
                        <option value="A">Avançado</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-outline-primary float-right" id="btnExcluirCompetencia"><i class="fas fa-trash-alt"></i></button>
                </div>
            </div>    
        </div>

        <div class="col-sm-6 div-competencia">
            <div class="row">
                <div class="col-sm-6">
                    Visual Studio
                </div>

                <div class="col-sm-5">
                    <select class="custom-select" id="cbbNivelCompetencia<?= $ultimoRegistro ?>" name="cbbNivelCompetencia" required>
                        <option value="" selected>Nível de conhecimento</option>
                        <option value="B">Básico</option>
                        <option value="I">Intermediário</option>
                        <option value="A">Avançado</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-outline-primary float-right" id="btnExcluirCompetencia"><i class="fas fa-trash-alt"></i></button>
                </div>
            </div>    
        </div>

        <div class="col-sm-6 div-competencia">
            <div class="row">
                <div class="col-sm-6">
                    Visual Studio
                </div>

                <div class="col-sm-5">
                    <select class="custom-select" id="cbbNivelCompetencia<?= $ultimoRegistro ?>" name="cbbNivelCompetencia" required>
                        <option value="" selected>Nível de conhecimento</option>
                        <option value="B">Básico</option>
                        <option value="I">Intermediário</option>
                        <option value="A">Avançado</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-outline-primary float-right" id="btnExcluirCompetencia"><i class="fas fa-trash-alt"></i></button>
                </div>
            </div>    
        </div>

        <div class="col-sm-6 div-competencia">
            <div class="row">
                <div class="col-sm-6">
                    Visual Studio
                </div>

                <div class="col-sm-5">
                    <select class="custom-select" id="cbbNivelCompetencia<?= $ultimoRegistro ?>" name="cbbNivelCompetencia" required>
                        <option value="" selected>Nível de conhecimento</option>
                        <option value="B">Básico</option>
                        <option value="I">Intermediário</option>
                        <option value="A">Avançado</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-outline-primary float-right" id="btnExcluirCompetencia"><i class="fas fa-trash-alt"></i></button>
                </div>
            </div>
        </div>

        <div class="col-sm-6 div-competencia">
            <div class="row">
                <div class="col-sm-6">
                    Visual Studio
                </div>

                <div class="col-sm-5">
                    <select class="custom-select" id="cbbNivelCompetencia<?= $ultimoRegistro ?>" name="cbbNivelCompetencia" required>
                        <option value="" selected>Nível de conhecimento</option>
                        <option value="B">Básico</option>
                        <option value="I">Intermediário</option>
                        <option value="A">Avançado</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-outline-primary float-right" id="btnExcluirCompetencia"><i class="fas fa-trash-alt"></i></button>
                </div>
            
            </div>    
        </div>

    <?php //endforeach; ?>
    <hr class="my-2 my-md-4">
    </div>
        

    <?php //foreach($arrayCompetencias as $reg): ?>
    <?php //endforeach; ?>




  </section>
</div>

<?php include 'footer.php'; ?>