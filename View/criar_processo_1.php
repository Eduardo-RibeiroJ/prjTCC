<?php
session_start();

include_once "../Model/Conexao.php";
include_once "../Model/ProcessoSeletivo.php";
include_once "../Controller/ProcessoSeletivoDAO.php";

$conn = new Conexao();
$processo = new ProcessoSeletivo();

if (isset($_POST['btnAvancar'])) {

    $processo->inserirProcessoSeletivo(
        $processo->getUltimoRegistroProcesso(),
        $_SESSION['cnpj'],
        $_POST['txtCargo'],
        $_POST['txtDataInicio'],
        $_POST['txtDataLimite'],
        $_POST['txtResumo'],
        $_POST['cbbNivel'],
        $_POST['cbbContratacao'],
        $_POST['txtSalario']
  );

  $_SESSION['processo_etapa1'] = serialize($processo);

  header('Location: criar_processo_2.php');

}
?>

<?php include_once 'headerRecrut.php'; ?>

<section class="masthead" id="sectionProcesso1" style="background: url(imagem/90463.jpg); background-size: cover;">
    <div class="container">

        <div class="row">
            <div class="col">
        
                <div class="card">
                    <div class="card-header">
                        Etapa 1
                    </div>

                    <div class="card-body">
                        <div class="card-text">
                            <form method="POST" action="criar_processo_1.php">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="txtCargo">Cargo</label>
                                        <input type="text" class="form-control" id="txtCargo" name="txtCargo" required autofocus>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="cbbNivel">Nível</label>
                                        <select class="custom-select" id="cbbNivel" name="cbbNivel" required>
                                            <option value="" selected>Selecione</option>
                                            <option value="Júnior">Júnior</option>
                                            <option value="Pleno">Pleno</option>
                                            <option value="Sênior">Sênior</option>
                                        </select>
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
                                        <label for="txtDataInicio">Data para início do processo seletivo</label>
                                        <input type="date" class="form-control" id="txtDataInicio" name="txtDataInicio" value="" required>
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
                                    <div class="col text-center">
                                        <input type="submit" name="btnAvancar" id="btnAvancar" class="btn btn-warning btn-lg float-right" value="Avançar">
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
