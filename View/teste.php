<!DOCTYPE html>
<html lang="pt-br">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../JS/ajax.js"></script>
    <meta charset="UTF-8">
    <title>Adicionar Questao</title>
</head>
<body>
<form>
    <fieldset>
        <label for="numQuestionario">Número do Questionário:</label>
        <input type="number" name="numQuestionario" id="numQuestionario">

        <label for="numQuestao">Número da Questão:</label>
        <input type="number" name="numQuestao" id="numQuestao">

        <label for="questao">Questão:</label>
        <input type="text" name="questao" id="questao">

        <label for="tempo">Tempo de resposta</label>
        <input type="number" id="tempo" name="tempo" value="30">

        <label for="resposta">Resposta</label>
        <select id="resposta" name="resposta" tabindex="1">
            <option value="A" selected>A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>

        <label for="a">Alternativa A:</label>
        <input type="text" name="a" id="a">

        <label for="b">Alternativa B:</label>
        <input type="text" name="b" id="b">

        <label for="c">Alternativa C:</label>
        <input type="text" name="c" id="c">

        <label for="d">Alternativa D:</label>
        <input type="text" name="d" id="d">

    </fieldset>
    <button id="btnAdicionar">Adicionar</button>

</form>

<style>
body {
    font-family: Arial, sans-serif;
}
form {
    width: 100%;
    margin-top: 40px;
    display: flex;
    flex-direction: column;
    align-items: center;
}
form fieldset {
    width: 100%;
    max-width: 500px;
    border: 1px solid #CCC;
    padding: 10px 20px 20px 20px;
}
form fieldset legend {
    font-weight: bold;
}
form fieldset label {
    width: 100%;
}
form fieldset input {
    width: calc(100% - 22px);
    height: 40px;
    font-size: 12px;
    background-color: #FFF;
    border: 1px solid #CCC;
    margin-bottom: 10px;
    padding: 0 10px;
}
form fieldset textarea {
    width: calc(100% - 22px);
    height: 120px;
    font-size: 12px;
    background-color: #FFF;
    border: 1px solid #CCC;
    padding: 10px;
}
form button {
    height: 40px;
    background-color: green;
    color: #FFF;
    font-size: 14px;
    margin-top: 10px;
    padding: 0 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}
</style>
</body>
</html>