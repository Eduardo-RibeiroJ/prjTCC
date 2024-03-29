<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

include_once "../Model/Conexao.php";
include_once "../Model/ProcessoSeletivo.php";
include_once "../Controller/ProcessoSeletivoDAO.php";

$conn = new Conexao();
$processo = new ProcessoSeletivo();

$hoje = date("Y-m-d");

if (isset($_POST['btnAvancar'])) {

    $processo->inserirProcessoSeletivo(
        NULL, //Será inserido o ultimo id na etapa de salvar (Para não segurar o id por muito tempo)
        $_SESSION['cnpj'],
        $_POST['txtCargo'],
        $_POST['txtDataInicio'],
        $_POST['txtDataLimite'],
        $_POST['txtResumo'],
        $_POST['cbbContratacao'],
        $_POST['txtSalario']
    );

    $_SESSION['processo_etapa1'] = serialize($processo);

    header('Location: criar_processo_2.php');
}
?>

<?php include_once 'headerRecrut.php'; ?>

<section class="masthead" id="sectionProcesso1" style="background-image: linear-gradient(to left, rgba(188, 216, 238, 1), rgba(145,184,217,1));">
    <div class="container">

        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-header">
                        Etapa 1
                    </div>

                    <div class="card-body">
                        <div class="card-text">
                            <form method="POST" action="criar_processo_1.php" autocomplete="off">
                                <div class="form-row">
                                    <div class="form-group col-12 col-md-6">
                                        <label for="txtCargo">Cargo</label>
                                        <input type="text" class="form-control" id="txtCargo" name="txtCargo" required autofocus>
                                        <div id="compList"></div>

                                    </div>
                                </div>


                                <div class="form-row my-3">

                                    <div class="form-group col-md-12">
                                        <label for="txtResumo">Resumo da vaga</label>
                                        <textarea class="form-control" id="txtResumo" name="txtResumo" rows="6" placeholder="Insira aqui informações da vaga..." required></textarea>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="txtDataInicio">Data início</label>
                                        <input type="date" class="form-control" id="txtDataInicio" name="txtDataInicio" value="<?= $hoje ?>" readonly="true" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="txtDataLimite">Data limite para candidatar-se</label>
                                        <input type="date" class="form-control" id="txtDataLimite" name="txtDataLimite" value="" required>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6" id="div-chk">
                                        <label for="txtSalario" id="lblSal">Salário</label>
                                        <input type="text" class="form-control" id="txtSalario" name="txtSalario" placeholder="Ex: R$ 1500,00" required>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" value="chkAc" id="chkAc">
                                            <label class="form-check-label" for="chkAc">A combinar</label>
                                        </div>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="cbbContratacao">Tipo de contratação</label>
                                        <select class="custom-select" id="cbbContratacao" name="cbbContratacao" required>
                                            <option value="" selected>Selecione</option>
                                            <option value="CLT">CLT</option>
                                            <option value="Temporário">Temporário</option>
                                            <option value="Estágio">Estágio</option>
                                            <option value="Contrato">Contrato</option>
                                            <option value="Home Office">Home Office</option>
                                        </select>
                                    </div>

                                </div>

                                <hr class="my-2 my-md-4">

                                <div class="form-row">
                                    <div class="col text-right">
                                        <a href="recrutador.php" class="btn btn-warning btn-lg">Cancelar</i></a>
                                        <button type="submit" name="btnAvancar" id="btnAvancar" class="btn btn-primary btn-lg">Avançar <i class="fas fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<?php include 'footer.php'; ?>

<script>
    $(document).ready(function() {
        $('#txtCargo').keyup(function() {
            var palavra = $(this).val();
            if (palavra != '') {
                $.post('../Controller/PesquisarCargo.php', {
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
        $('#txtCargo').val($(this).text());
        $('#compList').html('');
    })
</script>