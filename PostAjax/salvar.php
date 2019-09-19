<?php

include_once "../Model/Conexao.php";

$conn = new Conexao();

if($_POST['acao'] == "salvarQuestao") {

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
	$questaoDAO->Inserir($questao);
}

if($_POST['acao'] == "salvarTesteOnline") {

	include_once "../Model/TesteOnline.php";
	include_once "../Controller/TesteOnlineDAO.php";

	$testeOnline = new TesteOnline();
	$testeOnlineDAO = new TesteOnlineDAO($conn);

	$testeOnline->inserirTesteOnline (
	    $_POST['numTeste'],
	    $_POST['nomeTeste']
	);

	$testeOnlineDAO->Inserir($testeOnline);
}

if($_POST['acao'] == "salvarCandidatoDadosPessoais") {

	include_once "../Model/Candidato.php";
	include_once "../Controller/CandidatoDAO.php";

	$candidato = new Candidato();
	$candidatoDAO = new CandidatoDAO($conn);

	$candidato->inserirCandidatoDadosPessoais (
		$_POST['cpf'],
		$_POST['nome'],
		$_POST['sobrenome'],
		$_POST['dataNasc'],
		$_POST['estadoCivil'],
		$_POST['sexo']
	);

	$candidatoDAO->Inserir($candidato);
}

echo true;

?>