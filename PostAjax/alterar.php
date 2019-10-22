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

if($_POST['acao'] == "candidatoFormacao") {

	include_once "../Model/CandidatoFormacao.php";
	include_once "../Controller/CandidatoFormacaoDAO.php";

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

	$formacaoDAO->Alterar($formacao);
}

if($_POST['acao'] == "CandidatoCurso") {

	include_once "../Model/CandidatoCurso.php";
	include_once "../Controller/CandidatoCursoDAO.php";

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

	$cursoDAO->Alterar($curso);
}

if($_POST['acao'] == "CandidatoEmpresa") {

	include_once "../Model/CandidatoEmpresa.php";
	include_once "../Controller/CandidatoEmpresaDAO.php";

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

	$empresaDAO->Alterar($empresa);
}

if ($_POST['acao'] == "Pergunta") {

	include_once "../Model/Pergunta.php";
	include_once "../Controller/PerguntaDAO.php";

	$pergunta = new Pergunta();
	$perguntaDAO = new PerguntaDAO($conn);

	$pergunta->inserirPergunta(
		$_POST['cnpj'],
		$_POST['idPergunta'],
		$_POST['pergunta']

	);

	$perguntaDAO->Alterar($pergunta);
}

if ($_POST['acao'] == "CandidatoObjetivo") {

	include_once "../Model/CandidatoObjetivo.php";
	include_once "../Controller/CandidatoObjetivoDAO.php";

	$objetivo = new CandidatoObjetivo();
	$objetivoDAO = new CandidatoObjetivoDAO($conn);

	$objetivo->inserirObjetivo(
		$_POST['cpf'],
		$_POST['idObjetivo'],
		$_POST['cargo'],
		$_POST['nivel'],
		$_POST['pretSal']
	);

	$objetivoDAO->Alterar($objetivo);
}

if ($_POST['acao'] == "Pergunta") {

	include_once "../Model/Pergunta.php";
	include_once "../Controller/PerguntaDAO.php";

	$pergunta = new Pergunta();
	$perguntaDAO = new PerguntaDAO($conn);

	$pergunta->inserirPergunta(
		$_POST['cnpj'],
		$_POST['idPergunta'],
		$_POST['pergunta']

	);

	$perguntaDAO->Alterar($pergunta);
}

echo true;

?>