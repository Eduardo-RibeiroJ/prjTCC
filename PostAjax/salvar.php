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

if($_POST['acao'] == "candidatoFormacao") {

	include_once "../Model/CandidatoFormacao.php";
	include_once "../Controller/candidatoFormacaoDAO.php";

	$formacao = new CandidatoFormacao();
	$formacaoDAO = new CandidatoFormacaoDAO($conn);

	$formacao->inserirFormacao (
	    $_POST['cpf'],
	    $_POST['idFormacao'],
	    $_POST['curso'],
	    $_POST['instituicao'],
	    $_POST['dtaInicio'],
	    $_POST['dtaTerm'],
	    $_POST['tipo'],
	    $_POST['situacao']
	);

	$formacaoDAO->Inserir($formacao);
}

if($_POST['acao'] == "CandidatoCurso") {

	include_once "../Model/CandidatoCurso.php";
	include_once "../Controller/candidatoCursoDAO.php";

	$curso = new CandidatoCurso();
	$cursoDAO = new CandidatoCursoDAO($conn);

	$curso->inserirCurso (
	    $_POST['cpf'],
	    $_POST['idCurso'],
	    $_POST['curso'],
	    $_POST['instituicao'],
	    $_POST['anoConclusao'],
		$_POST['cargaHoraria']
	);

	$cursoDAO->Inserir($curso);
}

if($_POST['acao'] == "CandidatoEmpresa") {

	include_once "../Model/CandidatoEmpresa.php";
	include_once "../Controller/candidatoEmpresaDAO.php";

	$empresa = new CandidatoEmpresa();
	$empresaDAO = new CandidatoEmpresaDAO($conn);

	$empresa->inserirEmpresa (
	    $_POST['cpf'],
        $_POST['idEmpresa'],
        $_POST['nomeEmpresa'],
        $_POST['cargo'],
        $_POST['dataInicio'],
        $_POST['dataSaida'],
        $_POST['atividades']
	);

	$empresaDAO->Inserir($empresa);
}

if ($_POST['acao'] == "SalvarPergunta") {

	include_once "../Model/pergunta.php";
	include_once "../Controller/perguntaDAO.php";

	$pergunta = new Pergunta();
	$perguntaDAO = new PerguntaDAO($conn);

	$pergunta->inserirPergunta(

    $_POST['cnpj'],
		$_POST['idPergunta'],
		$_POST['pergunta']

	);

	$perguntaDAO->Inserir($pergunta);
}

echo true;

?>