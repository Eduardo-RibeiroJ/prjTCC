<?php
include_once "../Model/Conexao.php";
include_once "../Model/TesteOnline.php";
include_once "../Controller/TesteOnlineDAO.php";

$conn = new Conexao();
$testeOnline = new TesteOnline();
$testeOnlineDAO = new TesteOnlineDAO($conn);
$arrayTestesOnline = $testeOnlineDAO->Listar($testeOnline);

?>

<?php include_once 'header.php'; ?>

      <div class="container">
        <section>

          <div class="row">
            <div class="col-lg-8">
              <div class="card">
                      <div class="card-header">
                        Crie um teste online personalizado!
                      </div>
                      <div class="card-body">
                        <div class="card-text">

                          <form method="GET" action="testeOnline_questao_inserir.php">
                            <div class="row">
                              <div class="col">
                                <label class="col-form-label">Nome do Teste Online</label>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-lg-10">
                                  
                                  <input class="form-control" type="text" name="nomeTeste" id="nomeTeste" placeholder="" required autofocus>

                              </div>

                              <div class="col-lg-2 text-center">
                                <input type="submit" name="btnCriar" id="btnCriar" class="btn btn-primary btn-lg" value="Criar"/>
                              </div>
                            </div>
                        </form>
                      </div>
                    </div>
                          
              </div>
            </div>
          </div>
        </section>

        <section>
          <div class="row">
            <div class="col">
              <h4>Testes Online Disponíveis</h4>
            </div>
          </div>

          <div class="accordion" id="accordionTesteOnline">
              
              <?php foreach($arrayTestesOnline as $reg): ?>

              <div class="card" id=cardTesteOnline>
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
                        <a class="btn btn-primary btn-lg" href="testeOnline_questao_listar.php?idTesteOnline=<?= $reg->getIdTesteOnline(); ?>&nomeTesteOnline=<?= $reg->getNomeTesteOnline(); ?>">Visualizar Questões</a>
                        <button class="btn btn-secondary" id="btnExcluir" type="button" value="<?= $reg->getIdTesteOnline(); ?>">Excluir Teste Online</button>
                      </div>
                    </div>
                    
                    
                  </div>
                </div>
              </div>

              <?php endforeach; ?>
              
            </div>

        </section>
      </div>

<?php include 'footer.php'; ?>
