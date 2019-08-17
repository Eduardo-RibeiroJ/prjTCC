$(function(){
    // Executa assim que o botão de salvar for clicado

    var numQuestao = 1;

    $('#btnAdicionar').click(function(e) {

        // Cancela o envio do formulário
        e.preventDefault();


        if($('#numQuestao').html() == "Questão 1") { //Salvará o questionário apenas na primeira inclusão de questão
            $.post('../Model/salvar.php', {
            acao: "salvarTesteOnline",
            numTeste: $('#numTeste').html(),
            nomeTeste: $('#nomeTeste').html()
            });
        }

        // Método post do Jquery
        $.post('../Model/salvar.php', {
            acao: "salvarQuestao",
            numTeste: $('#numTeste').html(), //<numTeste(variavel que vai enviar) || numTeste>(variavel daqui)
            numQuestao: numQuestao,
            questao: $('#questao').val(),
            a: $('#a').val(),
            b: $('#b').val(),
            c: $('#c').val(),
            d: $('#d').val(),
            resposta: $('#resposta').val(),
            tempo: $('#tempo').val()

        }, function(sucesso) { //RETORNO DO SALVAR
            // Valida a resposta
        if(sucesso == true){

            numQuestao ++;

            $('#numQuestao').html('Questão ' + numQuestao);
            $('input[type=text], textarea').val('');
            $('input[type=number]').val(30);
            $('select').val("A");
            
        } else {
            alert('Erro: ' + sucesso);
        }

        });
        
    });

    $('.table tbody').on('click', '.btnExcluir', function(e) {
        // Método post do Jquery
        $.post('../Model/excluir.php', {
            acao: "excluirQuestao",
            idTesteOnline: $('#idTesteOnline').html(),
            idQuestao: $(this).val()

        }, function(sucesso) {

        if(sucesso == true) {

            $(this).find('tr').remove();
            
        } else {
            alert('Erro: ' + sucesso);
        }
        });
        
    });


});
