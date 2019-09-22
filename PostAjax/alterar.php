<?php

include_once "../Model/Conexao.php";

$conn = new Conexao();

if($_POST['acao'] == "alterarQuestao") {

	include_once "../Model/Questao.php";
	include_once "../Controller/QuestaoDAO.php";

	$questao = new Questao();
	$questaoDAO = new QuestaoDAO($conn);

	$questao->inserirQuestao (
	    $_POST['numTeste'],
	    $_POST['numQuestao'],
	    $_POST['questao'],
	    $_POST['a'],
	    $_POST['b'],
	    $_POST['c'],
	    $_POST['d'],
	    $_POST['resposta'],
	    $_POST['tempo']
	);

	$questaoDAO->Alterar($questao);
}

if($_POST['acao'] == "alterarTesteOnline") {

	include_once "../Model/TesteOnline.php";
	include_once "../Controller/TesteOnlineDAO.php";

	$testeOnline = new TesteOnline();
	$testeOnlineDAO = new TesteOnlineDAO($conn);

	$testeOnline->inserirTesteOnline (
	    $_POST['numTeste'],
	    $_POST['nomeTeste']
	);

	$testeOnlineDAO->Alterar($testeOnline);
}

if($_POST['acao'] == "alterarCandidatoDadosPessoais") {

	include_once "../Model/Candidato.php";
	include_once "../Controller/CandidatoDAO.php";

	$candidato = new Candidato();
	$candidatoDAO = new CandidatoDAO($conn);

	$candidato->setCpf($_POST['cpf']); //Listar para trazer todos os dados para a classe
	$candidatoDAO->Listar($candidato);

	$candidato->alterarCandidatoDadosPessoais (
		$_POST['cpf'],
		$_POST['nome'],
		$_POST['sobrenome'],
		$_POST['dataNasc'],
		$_POST['estadoCivil'],
		$_POST['sexo']
	);

	$candidatoDAO->Alterar($candidato);
}

if($_POST['acao'] == "alterarCandidatoEndereco") {

	include_once "../Model/Candidato.php";
	include_once "../Controller/CandidatoDAO.php";

	$candidato = new Candidato();
	$candidatoDAO = new CandidatoDAO($conn);

	$candidato->setCpf($_POST['cpf']); //Listar para trazer todos os dados para a classe
	$candidatoDAO->Listar($candidato);

	$candidato->alterarCandidatoEndereco (
		$_POST['cpf'],
		$_POST['cep'],
		$_POST['endereco'],
		$_POST['bairro'],
		$_POST['cidade'],
		$_POST['estado']
	);

	$candidatoDAO->Alterar($candidato);
}

if($_POST['acao'] == "alterarCandidatoContato") {

	include_once "../Model/Candidato.php";
	include_once "../Controller/CandidatoDAO.php";

	$candidato = new Candidato();
	$candidatoDAO = new CandidatoDAO($conn);

	$candidato->setCpf($_POST['cpf']); //Listar para trazer todos os dados para a classe
	$candidatoDAO->Listar($candidato);

	$candidato->alterarCandidatoContato (
		$_POST['cpf'],
		$_POST['tel1'],
		$_POST['tel2'],
		$_POST['linkedin'],
		$_POST['facebook'],
		$_POST['sitePessoal']
	);

	$candidatoDAO->Alterar($candidato);
}

echo true;

?>