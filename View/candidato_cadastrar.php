<?php
session_start();

include_once "../Model/Conexao.php";
include_once "../Model/Candidato.php";
include_once "../Controller/CandidatoDAO.php";

if (isset($_POST['btnCadastrar'])) {

    if ($_POST['txtSenha'] != $_POST['txtRepetirSenha']) {
        echo "<script>window.alert('As senhas não conferem!'); history.go(-1); </script>";
        die;
    }

    $_SESSION['cpf'] = $_POST['txtCpf'];
    $_SESSION['email'] = $_POST['txtEmail'];
    $_SESSION['senha'] = $_POST['txtSenha'];

    header('Location: candidato_inserir.php');
}

include_once 'header.php';

?>

<header class="masthead text-white text-center" id="home">
    <!--<div class="row">
        
                <form action="candidato_cadastrar.php" method="post">

                    <div class=form-row>
                        <div class="form-group col">
                            <h2 class="display-3">Faça seu cadastro</h2>
                        </div>
                    </div>

                    <div class=form-row>
                        <div class="form-group col">
                            <input type="text" id="txtCpf" name="txtCpf" class="form-control" placeholder="Insira seu CPF.." autofocus="" required>
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
                            <input type="password" id="txtRepetirSenha" name="txtRepetirSenha" class="form-control" placeholder="Repita a senha..." required>
                        </div>
                    </div>

                    <div class=form-row>
                        <div class="form-group col">
                            <input type="submit" id="btnCadastrar" name="btnCadastrar" class="btn btn-warning btn-lg" value="Cadastrar!">
                        </div>
                    </div>
                </form>  -->

    <form class="form-signin mx-5 row" action="candidato_cadastrar.php" method="post">
        <div class="mx-md-5">
            <h1 class="h3 mb-3 font-weight-normal">Faça seu cadastro</h1>

            <label for="txtCpf" class="sr-only">CPF</label>
            <input id="txtCpf" name="txtCpf" class="form-control mb-1" placeholder="Insira seu CPF.." autofocus="" required>

            <label for="txtEmail" class="sr-only">Endereço de email</label>
            <input type="email" id="txtEmail" name="txtEmail" class="form-control mb-1" placeholder="Insira seu e-mail..." required>

            <label for="txtSenha" class="sr-only">Senha</label>
            <input type="password" id="txtSenha" name="txtSenha" class="form-control mb-1" placeholder="Insira uma senha..." required>

            <label for="txtRepetirSenha" class="sr-only">Repetir Senha</label>
            <input type="password" id="txtRepetirSenha" name="txtRepetirSenha" class="form-control mb-3" placeholder="Repita a senha..." required>

            <input type="submit" id="btnCadastrar" name="btnCadastrar" class="btn btn-warning btn-lg" value="Avançar">
        </div>
    </form>
</header>

<?php include 'footer.php'; ?>