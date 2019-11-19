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

    $conn = new Conexao();
    $candidato = new Candidato();
    $candidatoDAO = new CandidatoDAO($conn);

    // Elimina possivel mascara
    $cpf = preg_replace("/[^0-9]/", "", $_POST['txtCpf']);
    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

    if ($candidato->getValidaCPF($cpf) == false) {
        echo "<script>window.alert('CPF inválido!'); history.go(-1); </script>";
        die;
    } else if ($candidatoDAO->BuscarCpf($cpf, $_POST['txtEmail']) == true) {
        echo "<script>window.alert('CPF e/ou E-mail já cadastrado!'); history.go(-1); </script>";
        die;
    } else {

        $_SESSION['cpf'] =  $cpf;
        $_SESSION['email'] = $_POST['txtEmail'];
        $_SESSION['senha'] = $_POST['txtSenha'];
        header('Location: candidato_inserir.php');
    }
}

include_once 'header.php';

?>

<header class="masthead text-white text-center" id="home">

    <form class="form-signin mx-5 row" action="candidato_cadastrar.php" method="post">
        <div class="mx-md-5">
            <h1 class="h3 mb-3 font-weight-normal">Faça seu cadastro</h1>

            <input id="txtCpf" name="txtCpf" class="form-control mb-1" placeholder="Insira seu CPF.." autofocus="" required>
            <input type="email" id="txtEmail" name="txtEmail" class="form-control mb-1" placeholder="Insira seu e-mail..." required>
            <input type="password" id="txtSenha" name="txtSenha" class="form-control mb-1" placeholder="Insira uma senha..." required>
            <input type="password" id="txtRepetirSenha" name="txtRepetirSenha" class="form-control mb-3" placeholder="Repita a senha..." required>

            <input type="submit" id="btnCadastrar" name="btnCadastrar" class="btn btn-warning btn-lg" value="Avançar">
        </div>
    </form>

</header>

<script type="text/javascript">
    $("#txtCpf").mask("000.000.000-00");
</script>

<?php include 'footer.php'; ?>