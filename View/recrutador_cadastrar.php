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
	$cnpj = strval(preg_replace("/[^0-9]/", "", $_POST['txtCNPJ']));

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

			<input type="text" id="txtCNPJ" name="txtCNPJ" class="form-control mb-1" placeholder="Insira seu CNPJ.." maxlength="14" autofocus="" required />
			<input type="email" id="txtEmail" name="txtEmail" class="form-control mb-1" placeholder="Insira seu e-mail..." required>
			<input type="password" id="txtSenha" name="txtSenha" class="form-control mb-1" placeholder="Insira uma senha..." required>
			<input type="password" id="txtRepetirSenha" name="txtRepetirSenha" class="form-control mb-3" placeholder="Repita a senha..." required>

			<input type="submit" id="btnCadastrar" name="btnCadastrar" class="btn btn-warning btn-lg" value="Avançar">
		</div>
	</form>

</header>

<script>
	jQuery(function($) {
		$("#txtCNPJ").mask("99.999.999/9999-99");
	});
</script>


<?php include 'footer.php'; ?>