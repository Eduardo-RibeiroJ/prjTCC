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
        <section class="page-section">
          <div class="row">
            <div class="col">
              <h2>Teste Online</h2>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="card">
                      <div class="card-header">
                        Inserir Teste Online
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
                            
                              <div class="col-md-9" style="padding-bottom:1rem">
                                  
                                  <input class="form-control" type="text" name="nomeTeste" id="nomeTeste" placeholder="Digite o nome do teste..." required autofocus>
                                  <input name="numTeste" type="hidden" value="1"/>

                              </div>

                              <div class="col-md-3 text-right">
                                <input type="submit" name="Adicionar" id="Adicionar" class="btn btn-primary" value="Adicionar"/>
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
                  <h2>Testes Online Disponíveis</h2>
                </div>
            </div>
              
              <div class="row">
                <div class="col">
                  <table id="tabelaTesteOnline" class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col" colspan="1">ID</th>
                        <th scope="col" >Teste</th>
                        <th scope="col" colspan="1" class="text-center">Questões</th>
                        <th scope="col" >Ações</th>
                      </tr>
                    </thead>

                    <tbody>

                      <?php foreach($arrayTestesOnline as $reg): ?>
                        <tr>
                          <td><?= $reg->getIdTesteOnline(); ?></td>
                          <td><?= $reg->getNomeTesteOnline(); ?></td>
                          <td class="text-center"><?= $reg->getQuantidadeQuestoes(); ?></td>
                          <td><button class="btnExcluir btn btn-primary" type="button" value="<?= $reg->getIdTesteOnline(); ?>">Excluir</button>
                          <a class="btn btn-primary" href="testeOnline_questao_listar.php?idTesteOnline=<?= $reg->getIdTesteOnline(); ?>&nomeTesteOnline=<?= $reg->getNomeTesteOnline(); ?>">Visualizar</a></td>
                          </tr>
                      <?php endforeach; ?>
                    </tbody>

                    
                  </table>
                </div>
              </div>

        </section>
      </div>

<?php include 'footer.php'; ?>
