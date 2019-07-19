<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

    <style type="text/css">

    .w3-bar .w3-button {
    padding: 16px;
    }

    #b{
        height: 120px;
        padding: 80px 100px 80px 30px;
    }

    </style>

    <body>

        <!-- Navbar -->
        <!-- Navbar (sit on top) -->
        <div class="w3-top">
                <div class="w3-bar w3-white w3-card" id="myNavbar">
                <a href="#home" class="w3-bar-item w3-button w3-wide">LOGO</a>
                <!-- Right-sided navbar links -->
                <div class="w3-right w3-hide-small">
                    <a href="#Nos" class="w3-bar-item w3-button">Sobre Nós</a>
                    <a href="#Servicos" class="w3-bar-item w3-button"> Serviços</a>
                    <a href="#Contato" class="w3-bar-item w3-button">Contato</a>
                    <a href="#TrabConsosco" class="w3-bar-item w3-button">Trabalhe conosco</a>
                    <a href="#Login" class="w3-bar-item w3-button">Login</a>
                </div>

                <!-- Hide right-floated links on small screens and replace them with a menu icon -->
                <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
                    <i class="fa fa-bars"></i>
                </a>
                </div>
            </div>
            
            <!-- Sidebar on small screens when clicking the menu icon -->
            <nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
                <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
                <a href="#Nos" onclick="w3_close()" class="w3-bar-item w3-button">Sobre Nós</a>
                <a href="#Servicos" onclick="w3_close()" class="w3-bar-item w3-button">Serviços</a>
                <a href="#Contato" onclick="w3_close()" class="w3-bar-item w3-button">Contato</a>
                <a href="#TrabConsosco" onclick="w3_close()" class="w3-bar-item w3-button">Trabalhe conosco</a>
                <a href="#Login" onclick="w3_close()" class="w3-bar-item w3-button">Login</a>
            </nav>

    <div class="container-fluid">

        <div id="b" class="row">
            <!---Título-->
            <h2><strong>Questionário</strong></h2>
        </div>

        <div class="row">

            <div class="card" style="width: 136rem;">
                <form method="POST" action="AdicionarPergunta.php">
                  <div class="card-body">
                      <label class="col-sm-3 col-form-label">Nome do questionário</label>
                      <div class="col-sm-5">
                        <input name="NumeroQuestionario" type="hidden" value="55"/>
                        <input class="form-control" type="text" name="NomeQuestionario" id="NomeQuestionario" placeholder="inserir aqui">
                      </div>
                  </div>
                  <div class="card-body">
                      <input type="submit" name="Adicionar" id="Adicionar" class="btn btn-primary" value="Adicionar" />
                  </div>
                </form>

            </div>
        </div> 

</div> 

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="../JS/script.js"></script>

</body>
</html>