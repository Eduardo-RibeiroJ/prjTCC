<?php

include_once "../Model/Conexao.php";
include_once "../Model/Candidato.php";
include_once "../Controller/CandidatoDAO.php";

?>

<?php include_once 'header.php'; ?>

<header class="masthead text-white text-center" id="home">
    <!--<div class="container">
                   <div class="row">
                
                        <form action="candidato.php" method="post">

                            <div class=form-row>
                                <div class="form-group col">
                                    <h2 class="display-3">Entre com sua conta!</h2>
                                </div>
                            </div>

                            <div class=form-row>
                                <div class="form-group col">
                                    <input type="email" id="txtEmail" name="txtEmail" class="form-control" placeholder="Insira seu e-mail..." required>
                                </div>
                            </div>

                            <div class=form-row>
                                <div class="form-group col">
                                    <input type="password" id="txtSenha" name="txtSenha" class="form-control" placeholder="Insira uma senha..." required>
                                </div>
                            </div>

                            <div class=form-row>
                                <div class="form-group col">
                                    <input type="submit" id="btnEntrar" name="btnEntrar" class="btn btn-warning btn-lg" value="Entrar">
                                </div>
                            </div>

                        </form>         
                      
                   </div>
               </div>-->

    <form class="form-signin mx-5 row pb-5" action="candidato.php" method="post">
        <div class="mx-md-5">
            <h1 class="h3 mb-3 font-weight-normal">Entre com sua conta!</h1>

            <label for="txtEmail" class="sr-only">Endereço de email</label>
            <input type="email" id="txtEmail" name="txtEmail" class="form-control mb-1" placeholder="Insira seu e-mail..." required>

            <label for="txtSenha" class="sr-only">Senha</label>
            <input type="password" id="txtSenha" name="txtSenha" class="form-control mb-1" placeholder="Insira uma senha..." required>

            <input type="submit" id="btnEntrar" name="btnEntrar" class="btn btn-warning btn-lg col-5" value="Entrar">
        </div>
    </form>
</header>

</header>

<?php include 'footer.php'; ?>