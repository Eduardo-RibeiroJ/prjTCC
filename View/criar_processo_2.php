<?php
session_start();

include_once "../Model/Conexao.php";
include_once "../Model/ProcessoSeletivo.php";

include_once "../Model/TesteOnline.php";
include_once "../Controller/TesteOnlineDAO.php";

include_once "../Model/Pergunta.php";
include_once "../Controller/PerguntaDAO.php";

$conn = new Conexao();

$testeOnline = new TesteOnline();
$testeOnlineDAO = new TesteOnlineDAO($conn);
$arrayTestesOnline = $testeOnlineDAO->Listar($testeOnline);

$pergunta = new Pergunta();
$perguntaDAO = new PerguntaDAO($conn);

$pergunta->setCnpj($_SESSION['cnpj']);

$arrayPergunta = $perguntaDAO->Listar($pergunta);

$dados = unserialize($_SESSION['processo_etapa1']);

var_dump($dados->getIdProcesso());

//var_dump(unserialize($_SESSION['processo_etapa1']));

?>

<?php include_once 'headerRecrut.php'; ?>

<section class="masthead" id="sectionProcesso2" style="background: url(imagem/90463.jpg); background-size: cover;">
    <div class="container">

        <div class="row">
            <div class="col">
        
                <div class="card mb-3">
                    <div class="card-header">
                        Competências
                    </div>

                    <div class="card-body" id="cardProcessoCompetencias">
                        <div class="card-text">
                            <h5 class="display-4 mb-4">Adicione as competências necessárias do processo seletivo</h5>
                            <form>
                                <input type="hidden" id="txtContador" name="txtContador" value="1">
                                <input type="hidden" id="txtIdProcesso" name="txtIdProcesso" value="<?=$dados->getIdProcesso()?>">

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" id="txtNomeCompetencia" name="txtNomeCompetencia" placeholder="Digite uma competência..." required autofocus>
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


                        <div class="d-flex flex-wrap" id="divProcessoCompetencias">

                        </div>

                    </div>    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">

                <div class="card mb-3">
                    <div class="card-header">
                        Testes Online
                    </div>

                    <div class="card-body" id="cardTestesOnline">
                        <div class="card-text">
                            <h5 class="display-4 mb-4">Adicione testes online para os candidatos</h5>
                            
                            <div>
                                <?php foreach($arrayTestesOnline as $reg): ?>

                                <div class="row">
                                    <div class="col">
                                        <div class="div-add">
                                            <div class="form-check mt-2">
                                                <input class="form-check-input lead" type="checkbox" value="<?= $reg->getIdTesteOnline(); ?>" id="chkTeste<?= $reg->getIdTesteOnline(); ?>" name="chkTeste<?= $reg->getIdTesteOnline(); ?>">
                                                <label class="form-check-label lead ml-2" for="chkTeste<?= $reg->getIdTesteOnline(); ?>"><?= $reg->getNomeTesteOnline(); ?></label>
                                                <p class="ml-2">Contém <?= $reg->getQuantidadeQuestoes(); ?> questões.</p>
                                            </div>                                    
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                            
                            </div>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">

                <div class="card mb-3">
                    <div class="card-header">
                        Perguntas
                    </div>

                    <div class="card-body" id="cardPerguntas">
                        <div class="card-text">
                            <h5 class="display-4 mb-4">Adicione perguntas dissertativas para os candidatos</h5>
                            <div>

                                <?php if($arrayPergunta): ?>
                                
                                    <?php foreach($arrayPergunta as $reg): ?>

                                    <div class="row">
                                        <div class="col">
                                            <div class="div-add div-add-pergunta py-3">
                                                <div class="form-check">
                                                    <input class="form-check-input lead" type="checkbox" value="<?= $reg->getIdPergunta(); ?>" id="chkTeste<?= $reg->getIdPergunta(); ?>" name="chkTeste<?= $reg->getIdPergunta(); ?>">
                                                    <label class="form-check-label lead ml-2" for="chkTeste<?= $reg->getIdPergunta(); ?>"><?= $reg->getPergunta(); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php endforeach; ?>

                                <?php else: ?>
                                    <p>
                                        <strong>Nenhuma pergunta cadastrada.</strong>
                                    </p>
                                <?php endif; ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            <div class="form-row">
                                <div class="col text-right">
                                    <a href="criar_processo_1.php" name="btnVoltar" id="btnVoltar" class="btn btn-warning btn-lg">Voltar</a>
                                    <button name="btnConcluir" id="btnConcluir" class="btn btn-warning btn-lg"><i class="fas fa-plus mr-1"></i> Concluir</button>
                                </div>
                            </div>

                        </div>
                    
                    </div>
                </div>
                        
            </div>

        </div>

    </div>
</section>

<?php include 'footer.php'; ?>
