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

<div style="background-image: linear-gradient(to left, rgba(220, 240, 255, 1), rgba(130,175,210,1));">
  <div class="container">
    <input type="hidden" id="txtCnpj" name="txtCnpj" value="<?= $_SESSION['cnpj']; ?>">

    <div class="jumbotron p-3 p-md-5 bg-light">
      <div class="container p-0">
        <h5 class="display-4 display-md-2"><i class="fas fa-tasks d-none d-md-inline"> </i>Crie um teste online personalizado!</h1>
          <hr class="my-2 my-md-3">
          <div class="form-row">
            <div class="form-group col-lg-10">
              <p class="lead">Também fique a vontade para utilizar os testes já criados.</p>
            </div>
          </div>

          <form method="GET" action="testeOnline_questao_inserir.php">
            <div class="form-row">
              <div class="form-group col-lg-11">
                <input class="form-control" type="text" name="nomeTeste" id="nomeTeste" placeholder="Insira um nome para criar..." required autofocus>
              </div>

              <div class="form-group col-lg-1 text-right">
                <button ype="submit" name="btnCriar" id="btnCriar" class="btn btn-primary btn-mg"><i class="fas fa-plus"></i> Criar</button>
              </div>
            </div>

          </form>
      </div>
    </div>

    <section>

      <?php if($arrayTestesOnline) : ?>
        <div class="row mb-2">
          <div class="col">
            <h4>Testes Online Disponíveis</h4>
          </div>
        </div>

        <div class="accordion" id="accordionTesteOnline">

          <?php foreach ($arrayTestesOnline as $reg) : ?>

            <div class="card" id="cardTesteOnline">
              <div class="card-header" id="teste<?= $reg->getIdTesteOnline(); ?>" data-toggle="collapse" data-target="#collapse<?= $reg->getIdTesteOnline(); ?>" aria-expanded="true" aria-controls="collapse<?= $reg->getIdTesteOnline(); ?>" style="cursor: pointer">
                <?= $reg->getIdTesteOnline(); ?> - <?= $reg->getNomeTesteOnline(); ?>
              </div>

              <div id="collapse<?= $reg->getIdTesteOnline(); ?>" class="collapse" aria-labelledby="teste<?= $reg->getIdTesteOnline(); ?>" data-parent="#accordionTesteOnline">
                <div class="card-body">
                  <div class="row">

                    <div class="col-12 col-lg-7">
                      <h5 class="card-title">Teste online de <?= $reg->getNomeTesteOnline(); ?></h5>
                      <p>Contém <?= $reg->getQuantidadeQuestoes(); ?> questões.</p>
                    </div>

                    <div class="col-12 col-lg-5 text-right">
                      <button class="btn btn-danger" id="btnExcluir" type="button" value="<?= $reg->getIdTesteOnline(); ?>"><i class="far fa-trash-alt"></i> Excluir Teste Online</button>
                      <a class="btn btn-primary" href="testeOnline_questao_listar.php?idTesteOnline=<?= $reg->getIdTesteOnline(); ?>&nomeTesteOnline=<?= $reg->getNomeTesteOnline(); ?>"><i class="far fa-eye"></i> Visualizar Questões</a>
                    </div>

                  </div>
                </div>
              </div>

            </div>

          <?php endforeach; ?>

        </div>
      <?php else: ?>
        <div class="row">
          <div class="col">
            <h4>Você ainda não criou nenhum teste online!</h4>
          </div>
        </div>

      <?php endif; ?>

      <div class="row">
        <div class="col text-right mt-2">
          <a href="recrutador.php" class="btn btn-warning">Voltar</a>
        </div>
      </div>
      
      

    </section>
  </div>
</div>
<?php include 'footer.php'; ?>