<?php

include_once "../Model/Conexao.php";
include_once "../Model/Questao.php";
include_once "../Controller/QuestaoDAO.php";

$conn = new Conexao();
$questao = new Questao();
$questaoDAO = new QuestaoDAO($conn);

$questao->inserirQuestao (
    $_POST['numQuestionario'],
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

echo true;

?>