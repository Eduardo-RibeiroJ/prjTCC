$(function(){
    // Executa assim que o botão de salvar for clicado
    $('#btnAdicionar').click(function(e){

        // Cancela o envio do formulário
        e.preventDefault();

        // Método post do Jquery
        $.post('../Model/salvar.php', {
            numQuestionario: $('#numQuestionario').val(), //<numQuestionario(variavel que vai enviar) || numQuestionario>(variavel daqui)
            numQuestao: $('#numQuestao').val(),
            questao: $('#questao').val(),
            a: $('#a').val(),
            b: $('#b').val(),
            c: $('#c').val(),
            d: $('#d').val(),
            resposta: $('#resposta').val(),
            tempo: $('#tempo').val()

        }, function(sucesso){ //RETORNO DO SALVAR
            // Valida a resposta
        if(sucesso == true){
            // Limpa os inputs
            $('input, textarea').val('');
            var cont = $('#numQuestao').val() + 1;
            $('#numQuestao').val(cont);
            alert('Mensagem enviada com sucesso.');

        }else {
            alert('Erro: ' + sucesso);
        }

        });
        
    });
});
