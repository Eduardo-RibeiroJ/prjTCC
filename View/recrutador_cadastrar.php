<?php
session_start();

include_once "../Model/Conexao.php";
include_once "../Model/Recrutador.php";
include_once "../Controller/RecrutadorDAO.php";

if (isset($_POST['btnCadastrar'])) {

	if ($_POST['txtSenha'] != $_POST['txtRepetirSenha']) {
		echo "<script>window.alert('As senhas não conferem!'); history.go(-1); </script>";
		die;
	}

	$recrutador = new Recrutador();

	if ($recrutador->validaCNPJ($_POST['txtCnpj']) == false) {
		echo "<script>window.alert('CNPJ inválido'); history.go(-1); </script>";
		die;
	} else {

		$_SESSION['cnpj'] = $_POST['txtCnpj'];
		$_SESSION['email'] = $_POST['txtEmail'];
		$_SESSION['senha'] = $_POST['txtSenha'];

		header('Location: recrutador_inserir.php');
	}
	
}

include_once 'header.php';

?>

<header class="masthead text-white text-center" id="home">
	<form class="form-signin mx-5 row" action="recrutador_cadastrar.php" method="post">
		<div class="mx-md-5">
			<h1 class="h3 mb-3 font-weight-normal">Faça seu cadastro</h1>

			<label for="txtCnpj" class="sr-only">CNPJ</label>
			<input id="txtCnpj" name="txtCnpj" class="form-control mb-1" placeholder="Insira seu CNPJ.." autofocus="" required>

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