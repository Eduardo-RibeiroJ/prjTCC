<?php

include_once 'headerCand.php';

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

$competencia->setCpf($_SESSION['cpf']);
$candidato->setCpf($_SESSION['cpf']);

//$ultimoRegistro = $competencia->getUltimoRegistroCompetencia();

//$arrayCompetencia = $competenciaDAO->Listar($competencia);

?>

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

    <section id="sectionCandCompetencias">

    <div class="d-flex flex-wrap" id="divCandCompetencias">

    <?php //foreach($arrayCompetencias as $reg): ?>

        <div class="div-competencia flex-fill">
            <p>
                <h5 class="d-inline">Visual Studio</h5>
                <button class="btn btn-outline-dark d-inline ml-4" id="btnExcluirCompetencia"><i class="fas fa-trash-alt"></i></button>
            </p>
            <p>
            <select class="custom-select d-inline" id="cbbNivelCompetencia<?= $ultimoRegistro ?>" name="cbbNivelCompetencia" required>
                <option value="B">Básico</option>
                <option value="I">Intermediário</option>
                <option value="A">Avançado</option>
            </select>
            </p>
        </div>

        <div class="div-competencia flex-fill">
            <p>
                <h5 class="d-inline">Visual Studio</h5>
                <button class="btn btn-outline-dark d-inline ml-4" id="btnExcluirCompetencia"><i class="fas fa-trash-alt"></i></button>
            </p>
            <p>

                <select class="custom-select d-inline" id="cbbNivelCompetencia<?= $ultimoRegistro ?>" name="cbbNivelCompetencia" required>
                    <option value="" selected>Nível de conhecimento</option>
                    <option value="B">Básico</option>
                    <option value="I">Intermediário</option>
                    <option value="A">Avançado</option>
                </select>
            </p>
        </div>
        <div class="div-competencia flex-fill">
            <p>
                <h5 class="d-inline">Desenvolvimento de Sistemas</h5>
                <button class="btn btn-outline-dark d-inline ml-4" id="btnExcluirCompetencia"><i class="fas fa-trash-alt"></i></button>
            </p>
            <p>

                <select class="custom-select d-inline" id="cbbNivelCompetencia<?= $ultimoRegistro ?>" name="cbbNivelCompetencia" required>
                    <option value="" selected>Nível de conhecimento</option>
                    <option value="B">Básico</option>
                    <option value="I">Intermediário</option>
                    <option value="A">Avançado</option>
                </select>
            </p>
        </div>
        <div class="div-competencia">
            <p>
                <h5 class="d-inline">Adobe Photoshop</h5>
                <button class="btn btn-outline-dark d-inline ml-4" id="btnExcluirCompetencia"><i class="fas fa-trash-alt"></i></button>
            </p>
            <p>

                <select class="custom-select d-inline" id="cbbNivelCompetencia<?= $ultimoRegistro ?>" name="cbbNivelCompetencia" required>
                    <option value="" selected>Nível de conhecimento</option>
                    <option value="B">Básico</option>
                    <option value="I">Intermediário</option>
                    <option value="A">Avançado</option>
                </select>
            </p>
        </div>
        <div class="div-competencia">
            <p>
                <h5 class="d-inline">Excel Avançado</h5>
                <button class="btn btn-outline-dark d-inline ml-4" id="btnExcluirCompetencia"><i class="fas fa-trash-alt"></i></button>
            </p>
            <p>

                <select class="custom-select d-inline" id="cbbNivelCompetencia<?= $ultimoRegistro ?>" name="cbbNivelCompetencia" required>
                    <option value="" selected>Nível de conhecimento</option>
                    <option value="B">Básico</option>
                    <option value="I">Intermediário</option>
                    <option value="A">Avançado</option>
                </select>
            </p>
        </div>
        <div class="div-competencia">
            <p>
                <h5 class="d-inline">C#</h5>
                <button class="btn btn-outline-dark d-inline ml-4" id="btnExcluirCompetencia"><i class="fas fa-trash-alt"></i></button>
            </p>
            <p>

                <select class="custom-select d-inline" id="cbbNivelCompetencia<?= $ultimoRegistro ?>" name="cbbNivelCompetencia" required>
                    <option value="" selected>Nível de conhecimento</option>
                    <option value="B">Básico</option>
                    <option value="I">Intermediário</option>
                    <option value="A">Avançado</option>
                </select>
            </p>
        </div>
        <div class="div-competencia">
            <p>
                <h5 class="d-inline">Visual Studio</h5>
                <button class="btn btn-outline-dark d-inline ml-4" id="btnExcluirCompetencia"><i class="fas fa-trash-alt"></i></button>
            </p>
            <p>

                <select class="custom-select d-inline" id="cbbNivelCompetencia<?= $ultimoRegistro ?>" name="cbbNivelCompetencia" required>
                    <option value="" selected>Nível de conhecimento</option>
                    <option value="B">Básico</option>
                    <option value="I">Intermediário</option>
                    <option value="A">Avançado</option>
                </select>
            </p>
        </div>
        

        
    <?php //endforeach; ?>
    <hr class="my-2 my-md-4">
    </div>
        

    <?php //foreach($arrayCompetencias as $reg): ?>
    <?php //endforeach; ?>




  </section>
</div>

<?php include 'footer.php'; ?>
