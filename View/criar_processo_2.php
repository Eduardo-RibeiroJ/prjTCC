<?php
session_start();

include_once "../Model/Conexao.php";
include_once "../Model/ProcessoSeletivo.php";
include_once "../Model/TesteOnline.php";
include_once "../Controller/TesteOnlineDAO.php";

$conn = new Conexao();

$testeOnline = new TesteOnline();
$testeOnlineDAO = new TesteOnlineDAO($conn);
$arrayTestesOnline = $testeOnlineDAO->Listar($testeOnline);

//var_dump(unserialize($_SESSION['processo_etapa1']));

?>

<?php include_once 'headerRecrut.php'; ?>

<section class="masthead" id="sectionProcesso1" style="background: url(imagem/90463.jpg); background-size: cover;">
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

                <div class="card mb-3">
                    <div class="card-header">
                        Testes Online
                    </div>

                    <div class="card-body" id="cardProcessoCompetencias">
                        <div class="card-text">
                            <h5 class="display-4 mb-4">Adicione testes online para os candidatos</h5>
                            
                            <div>
                                <?php foreach($arrayTestesOnline as $reg): ?>

                                <div class="card" id="cardTesteOnline">
                                    <div class="card-header" id="teste<?= $reg->getIdTesteOnline(); ?>" data-toggle="collapse" data-target="#collapse<?= $reg->getIdTesteOnline(); ?>" aria-expanded="true" aria-controls="collapse<?= $reg->getIdTesteOnline(); ?>">
                                        <?= $reg->getIdTesteOnline(); ?> - <?= $reg->getNomeTesteOnline(); ?>
                                    </div>

                                    <div id="collapse<?= $reg->getIdTesteOnline(); ?>" class="collapse" aria-labelledby="teste<?= $reg->getIdTesteOnline(); ?>" data-parent="#accordionTesteOnline">
                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col-lg-7">
                                                <h5 class="card-title">Teste online <?= $reg->getNomeTesteOnline(); ?></h5>
                                                <p>Contém <?= $reg->getQuantidadeQuestoes(); ?> questões.</p>
                                                </div>

                                                <div class="col-lg-5 text-center">
                                                <a class="btn btn-outline-dark btn-mg" href="testeOnline_questao_listar.php?idTesteOnline=<?= $reg->getIdTesteOnline(); ?>&nomeTesteOnline=<?= $reg->getNomeTesteOnline(); ?>">Visualizar Questões</a>
                                                <button class="btn btn-danger" id="btnExcluir" type="button" value="<?= $reg->getIdTesteOnline(); ?>">Excluir Teste Online</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            <?php endforeach; ?>
                            
                            </div>
                        </div>
                        
                    </div>

                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        Perguntas
                    </div>

                    <div class="card-body" id="cardProcessoCompetencias">
                        <div class="card-text">
                            <h5 class="display-4 mb-4">Adicione perguntas dissertativas para os candidatos</h5>
                            <form>
                                
                            </form>
                        </div>

                    </div>    
                </div>
            </div>

        </div>

    </div>
  </section>

<?php include 'footer.php'; ?>
