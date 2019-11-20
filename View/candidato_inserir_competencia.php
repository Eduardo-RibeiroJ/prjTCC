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

$arrayCompetencia = $competenciaDAO->Listar($competencia);

?>

<div style="background-image: linear-gradient(to bottom, rgba(220, 240, 255, 1), rgba(130,175,210,1));">

    <div class="container" id="containerCompetencias">

        <input type="hidden" id="txtCpf" name="txtCpf" value="<?= $candidato->getCpf() ?>">

        <div class="jumbotron p-3 p-md-5">
            <div class="container p-0">
                <h5 class="display-4 display-md-2"><i class="fas fa-lightbulb d-none d-md-inline"></i> Queremos saber sobre suas competências!</h1>

                    <hr class="my-2 my-md-4">
                    <p class="lead">Adicione uma nova competência sempre que quiser.</p>
            </div>

            <form autocomplete="off">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="txtNomeCompetencia" name="txtNomeCompetencia" placeholder="Digite uma competência..." required autofocus>
                        <div id="compList"></div>
                    </div>
                    <div class="form-group col-md-5">
                        <select class="custom-select" id="cbbNivelCompetencia" name="cbbNivelCompetencia" required>
                            <option value="Básico">Básico</option>
                            <option value="Intermediário">Intermediário</option>
                            <option value="Avançado">Avançado</option>
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <button class="btn btn-primary" id="btnInserirCompetencia" name="btnInserirCompetencia">Inserir</button>
                    </div>
                </div>
            </form>
        </div>

        <section id="sectionCandCompetencias">

            <div class="d-flex flex-wrap" id="divCandCompetencias">

                <?php foreach ($arrayCompetencia as $reg) : ?>

                    <div class="div-competencia flex-fill">
                        <p>
                            <h5 class="d-inline"><?= $reg->getCompetencia() ?></h5>
                            <button class="btn btn-outline-dark d-inline ml-4" id="btnExcluirCompetencia" value="<?= $reg->getIdCompetencia() ?>"><i class="fas fa-trash-alt"></i></button>
                        </p>
                        <p>
                            <select class="custom-select d-inline" id="cbbNivelCompetencia<?= $reg->getIdCompetencia() ?>" name="cbbNivelCompetencia" required>

                                <?php

                                    $alternativas = ['Básico', 'Intermediário', 'Avançado'];

                                    foreach ($alternativas as $value) {

                                        if ($value == $reg->getNivel())
                                            $selected = 'selected';
                                        else
                                            $selected = '';

                                        echo '<option value="' . $value . '" ' . $selected . '>' . $value . '</option>';
                                    }

                                    ?>

                            </select>
                        </p>
                    </div>

                <?php endforeach; ?>

            </div>

            <hr class="my-2 my-md-4">

            <div class="row">
                <div class="col">
                    <a href="candidato_perfil.php" class="btn btn-warning float-right">Visualizar Perfil</a>
                </div>
            </div>

        </section>
    </div>
</div>

<?php include 'footer.php'; ?>
<script>
    $(document).ready(function() {
        $('#txtNomeCompetencia').keyup(function() {
            var palavra = $(this).val();
            if (palavra != '') {
                $.post('../Controller/PesquisarCompetencia.php', {
                    palavra: palavra
                }, function(lista) {
                    $('#compList').fadeIn();
                    $('#compList').html(lista);

                });
            } else {
                $('#compList').html('');
            }
        });
    });

    $(document).on('click', '.li-pesquisa', function() {
        $('#txtNomeCompetencia').val($(this).text());
        $('#compList').html('');
    })
</script>