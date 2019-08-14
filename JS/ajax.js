$(function(){
    // Executa assim que o botão de salvar for clicado
    $('#btnAdicionar').click(function(e){
        
        // Cancela o envio do formulário
        e.preventDefault();
        alert('rsdfsd');

        // Pega os valores dos inputs e coloca nas variáveis

        var numeroQuestionario = $('#numQuestionario').val();
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
        $.post("../Model/salvar.php", {

        	nomeQuestionario:nomeQuestionario,
            numeroQuestao:numeroQuestao,
            questao:questao,
            tempo:tempo,
            resposta:resposta,
            a:a,
            b:b,
            c:c,
            d:d

            /*nomeQuestionario: "dsdsds",
            numeroQuestao: "43",
            questao: "ffsfsf",
            tempo: "46",
            resposta: "B",
            a: "B",
            b: "B",
            c: "B",
            d: "B"*/
            
        }, function(resposta){
            // Valida a resposta
            if(resposta == "B"){
                // Limpa os inputs
                $('input, textarea').val('');
                alert('Mensagem enviada com sucesso.');
            }else {
                alert('Mensagem nao enviada com sucesso.');
                alert(nomeQuestionario);
                alert(resposta);
            }

        });        
    });
});