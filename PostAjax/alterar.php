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

echo true;

?>