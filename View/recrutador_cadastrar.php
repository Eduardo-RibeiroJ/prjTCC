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

	$conn = new Conexao();
	$recrutador = new Recrutador();
	$recrutadorDAO = new RecrutadorDAO($conn);

	// Elimina mascara
	$cnpj = preg_replace("/[^0-9]/", "", $_POST['txtCnpj']);
	$cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);

	if ($recrutador->getValidaCNPJ($cnpj) == false) {
		echo "<script>window.alert('CNPJ inválido'); history.go(-1); </script>";
		die;
	} else if ($recrutadorDAO->BuscarCnpj($cnpj, $_POST['txtEmail']) == true) {
		echo "<script>window.alert('CPF e/ou E-mail já cadastrado!'); history.go(-1); </script>";
		die;
	} else {

		$_SESSION['cnpj'] = $cnpj;
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
			<input type="text" id="txtCnpj" name="txtCnpj" class="form-control mb-1 cpf-mask" data-mask="00.000.000/0000-00" data-mask-selectonfocus="true" placeholder="Insira seu CNPJ.." autofocus="" required>

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