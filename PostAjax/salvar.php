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
	    $_POST['cnpj'],
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
			$_POST['cnpj'],
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

if ($_POST['acao'] == "Pergunta") {

	include_once "../Model/Pergunta.php";
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

if ($_POST['acao'] == "SalvarCandCompetencia") {

	include_once "../Model/CandidatoCompetencia.php";
	include_once "../Controller/CandidatoCompetenciaDAO.php";
	include_once "../Model/Competencia.php";
	include_once "../Controller/CompetenciaDAO.php";

	$candCompetencia = new CandidatoCompetencia();
	$candCompetenciaDAO = new CandidatoCompetenciaDAO($conn);

	$competencia = new Competencia();
	$competenciaDAO = new CompetenciaDAO($conn);

	$competencia->setNomeComp($_POST['competencia']);
	$idCompetencia = $competencia->idRegistro();

	$candCompetencia->inserirCompetencia(
    $_POST['cpf'],
		$idCompetencia,
		$_POST['competencia'],
		$_POST['nivel']
	);
	$candCompetenciaDAO->Inserir($candCompetencia);
	echo ($idCompetencia."-"); //Retornando a ID
}

if ($_POST['acao'] == "SalvarProcessoSeletivo") {

	session_start();

	include_once "../Model/ProcessoSeletivo.php";
	include_once "../Controller/ProcessoSeletivoDAO.php";
	include_once "../Model/Cargo.php";
	include_once "../Controller/CargoDAO.php";

	$processoDAO = new ProcessoSeletivoDAO($conn);
	$cargo = new Cargo($conn);
	$cargoDAO = new CargoDAO($conn);
	
	$processoSeletivo = unserialize($_SESSION['processo_etapa1']);
	
	$idProcesso = $processoSeletivo->getUltimoRegistroProcesso();
	$processoSeletivo->setIdProcesso($idProcesso);

	$cargo->setNomeCargo($processoSeletivo->getIdCargo());
	$idCargo = $cargo->idRegistro();
	$processoSeletivo->setIdCargo($idCargo);

	$processoDAO->Inserir($processoSeletivo);

	$_SESSION['processo_etapa1'] = serialize($processoSeletivo);

}

if ($_POST['acao'] == "SalvarProcessoCompetencia") {

	session_start();

	include_once "../Model/ProcessoSeletivo.php";
	include_once "../Controller/ProcessoSeletivoDAO.php";
	include_once "../Model/ProcessoCompetencia.php";
	include_once "../Controller/ProcessoCompetenciaDAO.php";
	include_once "../Model/Competencia.php";
	include_once "../Controller/CompetenciaDAO.php";

	$processoCompetencia = new ProcessoCompetencia();
	$processoCompetenciaDAO = new ProcessoCompetenciaDAO($conn);
	$competencia = new Competencia();
	$competenciaDAO = new CompetenciaDAO($conn);
	
	$idProcesso = unserialize($_SESSION['processo_etapa1'])->getIdProcesso();

	$competencia->setNomeComp($_POST['competencia']);

	$idCompetencia = $competencia->idRegistro();

	$processoCompetencia->inserirProcessoCompetencia(
		$idProcesso,
		$idCompetencia,
		$_POST['nivel']
	);

	$processoCompetenciaDAO->Inserir($processoCompetencia);
}

if ($_POST['acao'] == "SalvarProcessoTeste") {

	session_start();

	include_once "../Model/ProcessoSeletivo.php";
	include_once "../Controller/ProcessoSeletivoDAO.php";
	include_once "../Model/ProcessoTeste.php";
	include_once "../Controller/ProcessoTesteDAO.php";
	include_once "../Model/TesteOnline.php";
	include_once "../Controller/TesteOnlineDAO.php";
	include_once "../Model/Cargo.php";
	include_once "../Controller/CargoDAO.php";

	$processoTeste = new ProcessoTeste();
	$processoTesteDAO = new ProcessoTesteDAO($conn);
	$processo = new ProcessoSeletivo();
	$processoDAO = new ProcessoSeletivoDAO($conn);
	$testeOnline = new TesteOnline();
	$testeOnlineDAO = new TesteOnlineDAO($conn);

	$idProcesso = unserialize($_SESSION['processo_etapa1'])->getIdProcesso();
	
	$processo->setIdProcesso($idProcesso);
	$processoDAO->Listar($processo);

	$testeOnline->setIdTesteOnline($_POST['idTeste']);
	$testeOnline->setCnpj($_SESSION['cnpj']);
	$testeOnlineDAO->Listar($testeOnline);

	$processoTeste->inserirProcessoTeste(
		$processo,
		$testeOnline
	);

	$processoTesteDAO->Inserir($processoTeste);
}

if ($_POST['acao'] == "SalvarProcessoPergunta") {

	session_start();

	include_once "../Model/ProcessoSeletivo.php";
	include_once "../Controller/ProcessoSeletivoDAO.php";
	include_once "../Model/ProcessoPergunta.php";
	include_once "../Controller/ProcessoPerguntaDAO.php";
	include_once "../Model/Pergunta.php";
	include_once "../Controller/PerguntaDAO.php";
	include_once "../Model/Cargo.php";
	include_once "../Controller/CargoDAO.php";

	$processo = new ProcessoSeletivo();
	$processoDAO = new ProcessoSeletivoDAO($conn);
	$processoPergunta = new ProcessoPergunta();
	$processoPerguntaDAO = new ProcessoPerguntaDAO($conn);
	$pergunta = new Pergunta();
	$perguntaDAO = new PerguntaDAO($conn);
	
	$idProcesso = unserialize($_SESSION['processo_etapa1'])->getIdProcesso();

	$processo->setIdProcesso($idProcesso);
	$processoDAO->Listar($processo);

	$pergunta->setIdPergunta($_POST['idPergunta']);
	$pergunta->setCnpj($processo->getCnpj());
	$perguntaDAO->Listar($pergunta);

	$processoPergunta->inserirProcessoPergunta(
		$processo,
		$pergunta
	);

	$processoPerguntaDAO->Inserir($processoPergunta);
}

echo true;

?>