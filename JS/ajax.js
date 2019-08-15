$(function(){
    // Executa assim que o botão de salvar for clicado
    $('#btnAdicionar').click(function(e){

        // Cancela o envio do formulário
        e.preventDefault();

        // Pega os valores dos inputs e coloca nas variáveis
        var numQuestionario = $('#numQuestionario').val();
        var numQuestao = $('#numQuestao').val();
        var questao = $('#questao').val();
        var a = $('#a').val();
        var b = $('#b').val();
        var c = $('#c').val();
        var d = $('#d').val();
        var resposta = $('#resposta').val();
        var tempo = $('#tempo').val();

        // Método post do Jquery
        $.post('../Model/salvar.php', {
            numQuestionario:numQuestionario,
            numQuestao:numQuestao,
            questao:questao,
            a:a,
            b:b,
            c:c,
            d:d,
            resposta:resposta,
            tempo:tempo

        }, function(sucesso){
            // Valida a resposta
        if(sucesso == true){
            // Limpa os inputs
            $('input, textarea').val('');
            alert('Mensagem enviada com sucesso.');
        }else {
            alert('Erro: ' + sucesso);
        }

        });
        
    });
});
