<?php
include_once "../Model/Conexao.php";
include_once "../Model/TesteOnline.php";
include_once "../Model/Questao.php";
include_once "../Controller/TesteOnlineDAO.php";
include_once "../Controller/QuestaoDAO.php";

$conn = new Conexao();
$questao = new Questao();
$questaoDAO = new QuestaoDAO($conn);

$fff = $_post['NumeroQuestao'];
echo "<script>alert($fff)</script>";

$questao->inserirQuestao (
    $_post['NumeroQuestionario'],
    $_post['NumeroQuestao'],
    $_post['Questao'],
    $_post['A'],
    $_post['B'],
    $_post['C'],
    $_post['D'],
    $_post['Resposta'],
    $_post['TempoQuestao']
);

$questaoDAO->Inserir($questao);

echo "<script>alert('Pergunta cadastrada!')</script>";

?>