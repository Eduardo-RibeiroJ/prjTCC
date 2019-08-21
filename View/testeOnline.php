<?php
include_once "../Model/Conexao.php";
include_once "../Model/TesteOnline.php";
include_once "../Controller/TesteOnlineDAO.php";

$conn = new Conexao();
$testeOnline = new TesteOnline();
$testeOnlineDAO = new TesteOnlineDAO($conn);
$arrayTestesOnline = $testeOnlineDAO->Listar($testeOnline);

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/design.css">

</head>

  <body>

  <header>
        <!-- Navbar -->
        <!-- Navbar (sit on top) -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0F91CF;">
      <a class="navbar-brand" href="#"> 
          <img src="Imagens/Screenshot_1.png" width="150" height="50" class="d-inline-block align-top" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
      </button>
        
          <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(página atual)</span></a>
               </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Sobre Nós</a>
               </li>
              <!-- DropBox -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Serviços
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Soluções de Software</a>
                  <a class="dropdown-item" href="#">Suporte</a>
                  <a class="dropdown-item" href="#">Análise de processos</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Veja mais</a>
                </div>
               </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Trabalhe conosoco</a>
               </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contatos</a>
               </li>
             </ul>
           </div>      
      </nav>
    </header>


      <div class="container-fluid">
          <div class="row">
            <div id="titulo">
                <!---Título-->
                <h2><strong>Teste Online</strong></h2>
            </div>

            <div class="card" style="width: 136rem;">
                 <form method="POST" action="testeOnline_questao_inserir.php">
                  <div class="card-body">
                      <label class="col-sm-3 col-form-label">Nome do Teste Online</label>
                      <div class="col-sm-5">
                        <input class="form-control" type="text" name="nomeTeste" id="nomeTeste" placeholder="Digite o nome do teste..." required autofocus>
                        <input name="numTeste" type="hidden" value="1"/>
                      </div>
                   </div>
                    <div class="card-body">
                        <input type="submit" name="Adicionar" id="Adicionar" class="btn btn-primary" value="Adicionar" />
                    </div>
                 </form>  
            </div>
      </div>

        <h2>Testes Online Disponíveis</h2>
        <div class="row">
          <div class="col-8">
            <table id="tabelaTesteOnline" class="table table-striped">
              <tr>
                <th>ID do Teste Online</th>
                <th>Nome do Teste Online</th>
                <th>Quantidade de Questões</th>
                <th></th>
                <th></th>
                <th></th>
              </tr>

              <?php foreach($arrayTestesOnline as $reg): ?>

                <tr>
                  <td><?= $reg->getIdTesteOnline(); ?></td>
                  <td><?= $reg->getNomeTesteOnline(); ?></td>
                  <td><?= $reg->getQuantidadeQuestoes(); ?></td>
                  <td><button class="btnExcluir btn btn-primary" type="button" value="<?= $reg->getIdTesteOnline(); ?>">Excluir</button></td>
                  <td> <a class="btn btn-primary" href="testeOnline_questao_listar.php?idTesteOnline=<?= $reg->getIdTesteOnline(); ?>&nomeTesteOnline=<?= $reg->getNomeTesteOnline(); ?>">Visualizar Questões</a> </td>
                </tr>

              <?php endforeach; ?>

            </table>

          </div>
        </div>
      </div>

    <script type="text/javascript" language="javascript" src="../JS/jquery-3.2.1.js"></script>
    <!-- Script para o menu-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script src="../JS/script.js"></script>
    <script src="../JS/ajax.js"></script>
</body>
</html>