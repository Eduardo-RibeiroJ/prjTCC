<?php

include_once "../Model/Conexao.php";
include_once "../Model/Recrutador.php";
include_once "../Controller/RecrutadorDAO.php";

?>

<?php include_once 'header.php'; ?>

<header class="masthead text-white text-center" id="home">

    <form class="form-signin mx-5 row pb-4" action="recrutador.php" method="post">
        <div class="mx-md-5">
            <h1 class="h3 mb-3 font-weight-normal">Entre com sua conta!</h1>

            <label for="txtCpf" class="sr-only">CPF</label>
            <input id="txtCpf" name="txtCpf" class="form-control mb-1" placeholder="Insira seu CPF.." autofocus="" required>

            <label for="txtEmail" class="sr-only">Endereço de email</label>
            <input type="email" id="txtEmail" name="txtEmail" class="form-control mb-1" placeholder="Insira seu e-mail..." required>

            <label for="txtSenha" class="sr-only">Senha</label>
            <input type="password" id="txtSenha" name="txtSenha" class="form-control mb-1" placeholder="Insira uma senha..." required>

            <input type="submit" id="btnEntrar" name="btnEntrar" class="btn btn-warning btn-lg col-5" value="Entrar">
        </div>
    </form>
</header>

<?php include 'footer.php'; ?>