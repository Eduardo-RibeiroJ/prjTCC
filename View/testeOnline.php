<?php
session_start();

include_once "../Model/Conexao.php";
include_once "../Model/TesteOnline.php";
include_once "../Controller/TesteOnlineDAO.php";

$conn = new Conexao();
$testeOnline = new TesteOnline();
$testeOnlineDAO = new TesteOnlineDAO($conn);
$testeOnline->setCnpj($_SESSION['cnpj']);
$arrayTestesOnline = $testeOnlineDAO->Listar($testeOnline);

?>

<?php include_once 'headerRecrut.php'; ?>

<div class="container">
<input type="hidden" id="txtCnpj" name="txtCnpj" value="<?= $_SESSION['cnpj']; ?>">

  <div class="jumbotron p-3 p-md-5">
    <div class="container p-0">
      <h5 class="display-4 display-md-2"><i class="fas fa-tasks d-none d-md-inline"> </i>Crie um teste online personalizado!</h1>
      
      <hr class="my-2 my-md-4">
      <div class="form-row">
        <div class="form-group col-lg-10">
          <p class="lead">Também fique a vontade para utilizar os testes já criados.</p>
        </div>
      </div>

      <form method="GET" action="testeOnline_questao_inserir.php">
        <div class="form-row">
          <div class="form-group col-lg-10">
              <input class="form-control" type="text" name="nomeTeste" id="nomeTeste" placeholder="Insira um nome para criar..." required autofocus>
          </div>

          <div class="form-group col-lg-2 text-center">
            <input type="submit" name="btnCriar" id="btnCriar" class="btn btn-primary btn-mg" value="Criar"/>
          </div>
        </div>

      </form>
    </div>
  </div>

  <section>
    <div class="row">
      <div class="col">
        <h4>Testes Online Disponíveis</h4>
      </div>
    </div>

    <div class="accordion" id="accordionTesteOnline">
        
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

  </section>
</div>

<?php include 'footer.php'; ?>
