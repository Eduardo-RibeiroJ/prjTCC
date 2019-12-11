<?php

session_start();

if (empty($_SESSION['logado']))
  include_once 'header.php';
else if ($_SESSION['logado'] == 1)
  include_once 'headerCand.php';
else if ($_SESSION['logado'] == 2)
  include_once 'headerRecrut.php';

?>

<!-- Masthead -->
<header class="masthead text-white text-left" id="home">
  <div class="overlay"></div>
  <div class="px-5 py-5">
    <div class="row">

      <div class="col-md-7 px-5">
        <h1 class="mb-2 borda_texto" style="color:#FFFFFF">Seja bem-vindo a Connection, o site que conecta as empresas com os melhores candidatos!</h1>
      </div>

      <div class="col-md-6 py-4 px-5">
        <a href="#sobre" class="btn btn-block btn-outline-dark btn-lg" style="background-color:#f9cf00" role="button" aria-pressed="true">Saiba Mais</a>
      </div>

    </div>
  </div>
</header>

<!-- Sobre nosso software -->

<section class="page-section" style="background-image: linear-gradient(to bottom, rgba(255, 255, 255, 1), rgba(211,211,220,1));" id="sobre">
  <div class="container">
    <div class="row">

      <div class="col-lg-12 text-center">
        <h1 class="section-heading" style="padding-bottom: 1em; font-weight: bold">Sistema Connection</h1>
      </div>
      <p class="text-center" style="font-size: 1.5em;">O sistema connection foi desenvolvido com o intuito de fornecer um auxílio para as empresas
        que possuem a necessidade de agilizar os processos inicias de seleção e recrutamento de candidatos. Com a connection será possível
        criamos um ambiente para gerenciar todos os processos seletivos, possibilitando criar testes onlines, perguntas dissertativas para
        conhecer melhor o candidatos, além de gerar um relátorio de todos os candidatos que estão participando da vaga. O nosso sistema será utilizado
        para dois fins, sendo eles, para empresas que buscam por um sistema de auxílio para as etapas inicias de recrutamento e por outro lado um sistema
        de vagas, em que por meio do nosso site os candidatos poderão cadastrar-se e utilizar de nossos serviços para a procura de vagas. Assim o criamos
        uma rede com candidatos a procura de vagas, além de empresas que buscam divulgar suas vagas com um sistema de apoio para a seleção e recrutamento.</p>

      <div class="espacamento">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>

          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="imagem/1.png" alt="...">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="imagem/2.png" alt="...">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="imagem/3.png" alt="...">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="imagem/4.png" alt="...">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="imagem/5.png" alt="...">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="imagem/6.png" alt="...">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
          </div>

          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
          </a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Icones -->
<section class="page-section text-center" id="funcionalidades">
  <div class="container">
    <div class="row">

      <div class="col-lg-4">
        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
          <div class="features-icons-icon">
            <img src="imagem/icon2.png" alt="..." width="100" height="100">
          </div>

          <h3>Filtro inteligente</h3>
          <p class="lead mb-0">Para a seleção dos candidatos nós desenvolvemos um algoritmo inteligente que filtra os candidatos que mais se adequem ao perfil da vaga. E a partir filtro
            listamos os candidatos por ordem de relevância.
          </p>

        </div>
      </div>

      <div class="col-lg-4">
        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
          <div class="features-icons-icon">
            <img src="imagem/icon1.png" alt="..." width="100" height="100">
          </div>

          <h3>Totalmente Responsivo</h3>
          <p class="lead mb-0">Pode ser acessado em qualquer dispositivo em qualquer lugar. Não se limite apenas ao uso de computador desktop, mas aproveite também para acessar
            nosso site em dispositivos móveis, como smartphone e tablets. O nosso site foi desenvolvido especialmente para todo tipo de tela.
          </p>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
          <div class="features-icons-icon">
            <img src="imagem/icon3.png" alt="..." width="100" height="100">
          </div>
          <h3>Encontre o candidato certo!</h3>
          <p class="lead mb-0">Aqui a seleçao e recrutamento são levados a sério, e buscamos refinar a busca por meio de diversos parametros que desenvolvemos, que ajudam a encontrar de
            forma mais acertiva o candidato que está procurando. Todos os candidatos são listados, com suas notas, compêtencias que correspondem a vaga e também o currículo com todas as
            informações que você precisa para escolher o melhor candidato.

          </p>
        </div>
      </div>

    </div>
  </div>
</section>


<section class="page-section" style="background: url(imagem/17209.jpg); background-size: cover;" id="cadastro">
  <div class="row container">
    <div class="jumbotron" style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.616), rgba(23,166,255,1));">
      <div class="col-sm-8 mx-auto">
        <h1>Entre agora mesmo!</h1>
        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
          labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
          nisi ut aliquip ex ea commodo consequat."</p>
        <p>
          <button class="btn btn-md" href="#" style="background-color:#f9cf00">Entrar como candidato</button>
          <button class="btn btn-md" href="#" style="background-color:#f9cf00">Entrar como empresa</button>
        </p>
      </div>
    </div>

  </div>
</section>

<?php include 'footer.php'; ?>