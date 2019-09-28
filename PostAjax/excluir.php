<?php

include_once "../Model/Conexao.php";

$conn = new Conexao();

if($_POST['acao'] == "excluirTesteOnline") {

	include_once "../Model/TesteOnline.php";
	include_once "../Controller/TesteOnlineDAO.php";

	$testeOnline = new TesteOnline();
	$testeOnlineDAO = new TesteOnlineDAO($conn);

	$testeOnline->setIdTesteOnline ($_POST['idTesteOnline']);

	$testeOnlineDAO->Apagar($testeOnline);
}

if($_POST['acao'] == "excluirQuestao") {

	include_once "../Model/Questao.php";
	include_once "../Controller/QuestaoDAO.php";

	$questao = new Questao();
	$questaoDAO = new QuestaoDAO($conn);

	$questao->setIdTesteOnline ($_POST['idTesteOnline']);
	$questao->setIdQuestao ($_POST['idQuestao']);

	$questaoDAO->Apagar($questao);
}

if($_POST['acao'] == "excluirFormacao") {

	include_once "../Model/CandidatoFormacao.php";
	include_once "../Controller/CandidatoFormacaoDAO.php";

	$formacao = new CandidatoFormacao();
	$formacaoDAO = new CandidatoFormacaoDAO($conn);

	$formacao->setCpf ($_POST['cpf']);
	$formacao->setIdFormacao ($_POST['idFormacao']);

	$formacaoDAO->Apagar($formacao);
}

echo true;

?>