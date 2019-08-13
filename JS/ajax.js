$(function(){
    // Executa assim que o botão de salvar for clicado
    $('#btnSalvar').click(function(e){
        
        // Cancela o envio do formulário
        e.preventDefault();

        // Pega os valores dos inputs e coloca nas variáveis


        var nomeQuestionario = $('#nomeQuestionario').val();
        var numeroQuestao = $('#numeroQuestao').val();
        var questao = $('#questao').val();
        var tempo = $('#tempo').val();
        var resposta = $('#resposta').val();
        var a = $('#a').val();
        var b = $('#b').val();
        var c = $('#c').val();
        var d = $('#d').val();

        // Método post do Jquery
        $.post('salvar.php', {

            nomeQuestionario:nomeQuestionario,
            numeroQuestao:numeroQuestao,
            questao:questao,
            tempo:tempo,
            resposta:resposta,
            a:a,
            b:b,
            c:c,
            d:d
        }, function(resposta){
            // Valida a resposta
            if(resposta == 1){
                // Limpa os inputs
                $('input, textarea').val('');
                alert('Mensagem enviada com sucesso.');
            }else {
                alert(resposta);
            }
        });
        
    });
});