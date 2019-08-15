<?php
include_once "../Model/Conexao.php";
include_once "../Model/TesteOnline.php";
include_once "../Model/Questao.php";
include_once "../Controller/TesteOnlineDAO.php";
include_once "../Controller/QuestaoDAO.php";

$conn = new Conexao();
$questao = new Questao();
$questaoDAO = new QuestaoDAO($conn);

$fff = $_POST['NumeroQuestao'];
echo "<script>alert($fff)</script>";

$questao->inserirQuestao (
    $_POST['NumeroQuestionario'],
    $_POST['NumeroQuestao'],
    $_POST['Questao'],
    $_POST['A'],
    $_POST['B'],
    $_POST['C'],
    $_POST['D'],
    $_POST['Resposta'],
    $_POST['TempoQuestao']
);

$questaoDAO->Inserir($questao);

echo "<script>alert('Pergunta cadastrada!')</script>";

?>