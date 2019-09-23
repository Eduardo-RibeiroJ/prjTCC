<?php


?>

<?php include_once 'headerCand.php'; ?>

<div class="container">

    <input type="hidden" id="txtUltimoRegistro" name="txtUltimoRegistro" value="5">

  <section>


    <div class="row">
      <div class="col">
        <div class="accordion" id="accordionCandidatoFormacao">

            <div class="row">

              <div class="jumbotron col-12">
                <h1 class="display-10">Adicione sua formação!</h1>
                <p class="lead">Aqui você poderá adicionar todas as instituições pelas quais já passou.</p>
                <hr class="my-10">
                <p>Para adiciona-las basta clicar nesse botão sempre que precisar adicionar uma formação.</p>
                    <button name="btnAddCardFormacao" id="btnAddCardFormacao" class="btn btn-primary">Add Card</button>
              </div>
            </div>

        </div>
      </div>
    </div>

  </section>

</div>

       

<?php include 'footer.php'; ?>
