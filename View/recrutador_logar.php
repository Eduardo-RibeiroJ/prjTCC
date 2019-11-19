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

            <label for="txtCnpj" class="sr-only">Cnpj</label>
            <input id="txtCnpj" name="txtCnpj" class="form-control mb-1" placeholder="Insira seu CNPJ.." autofocus="" required>

            <label for="txtSenha" class="sr-only">Senha</label>
            <input type="password" id="txtSenha" name="txtSenha" class="form-control mb-1" placeholder="Insira uma senha..." required>

            <input type="submit" id="btnEntrarRecrutador" name="btnEntrarRecrutador" class="btn btn-warning btn-lg col-5" value="Entrar">
        </div>
    </form>
</header>

<script type="text/javascript">
    $("#txtCnpj").mask("00.000.000/0000-00");
</script>


<?php include 'footer.php'; ?>