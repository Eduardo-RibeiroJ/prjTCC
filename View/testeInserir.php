<?php

include_once "../Model/Conexao.php";

$conn = new Conexao();

include_once "../Model/Candidato.php";
	include_once "../Controller/CandidatoDAO.php";

	$candidato = new Candidato();
	$candidatoDAO = new CandidatoDAO($conn);

	$candidato->inserirCandidato (
		"545454",
		"nome",
        "sobrenome",
        "M",
        "06/01/2005",
        "rsr@rsr",
        "123456",
        "Solteiro",
        "sdsd",
        "baisdsd",
		"tel1",
		"tel2",
        "sdsd",
        "sdsd",
        "sdsd"
	);

	$candidatoDAO->Inserir($candidato);

?>