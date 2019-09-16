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
            <div class="col">
              <h3>Testes Online</h3>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="card">
                      <div class="card-header">
                        Crie um teste online personalizado!
                      </div>
                      <div class="card-body">
                        <div class="card-text">

                          <form method="POST" action="testeOnline_questao_inserir.php">
                            <div class="row">
                              <div class="col">
                                <label class="col-form-label">Nome do Teste Online</label>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-9">
                                  
                                  <input class="form-control" type="text" name="nomeTeste" id="nomeTeste" placeholder="" required autofocus>
                                  <input name="numTeste" type="hidden" value="1"/>

                              </div>

                              <div class="col-md-3 text-center">
                                <input type="submit" name="Criar" id="Criar" class="btn btn-primary" value="Criar"/>
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
              <h3>Testes Online Disponíveis</h3>
            </div>
          </div>

          <div class="accordion" id="accordionTesteOnline">
              
              <?php foreach($arrayTestesOnline as $reg): ?>

              <div class="card" id=cardTesteOnline>
                <div class="card-header" id="teste<?= $reg->getIdTesteOnline(); ?>">
                  <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?= $reg->getIdTesteOnline(); ?>" aria-expanded="true" aria-controls="collapse<?= $reg->getIdTesteOnline(); ?>">
                      <?= $reg->getIdTesteOnline(); ?> - <?= $reg->getNomeTesteOnline(); ?>
                    </button>
                  </h5>
                </div>

                <div id="collapse<?= $reg->getIdTesteOnline(); ?>" class="collapse" aria-labelledby="teste<?= $reg->getIdTesteOnline(); ?>" data-parent="#accordionTesteOnline">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-7">
                        <p>Teste online <?= $reg->getNomeTesteOnline(); ?>, contém <?= $reg->getQuantidadeQuestoes(); ?> questões.</p>
                      </div>
                      <div class="col-lg-5 text-center">
                        <a class="btn btn-primary" href="testeOnline_questao_listar.php?idTesteOnline=<?= $reg->getIdTesteOnline(); ?>&nomeTesteOnline=<?= $reg->getNomeTesteOnline(); ?>">Visualizar Questões</a>
                        <button class="btn btn-primary" id="btnExcluir" type="button" value="<?= $reg->getIdTesteOnline(); ?>">Excluir Teste Online</button>
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
