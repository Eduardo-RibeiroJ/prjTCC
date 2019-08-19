$(function(){
    // Executa assim que o botão de salvar for clicado

    var numQuestao = 1;

    $('#formInserirQuestao').on('click', '#btnAdicionar', function(e) {

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

    $('#formAlterarQuestao').on('click', '#btnSalvar', function(e) {

        var numTesteOnline = $('#numTeste').html();
        // Cancela o envio do formulário
        e.preventDefault();

        // Método post do Jquery
        $.post('../Model/alterar.php', {
            acao: "alterarQuestao",
            numTeste: numTesteOnline, //<numTeste(variavel que vai enviar) || numTeste>(variavel daqui)
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
        if(sucesso == true) {

            window.location.replace('TesteOnline_questao_listar.php?idTesteOnline=' + numTesteOnline);
            
        } else {
            alert('Erro: ' + sucesso);
        }

        });
        
    });

    $('#tabelaTesteOnline').on('click', '.btnExcluir', function(e) {

        var $linhaAlvo = $(this).closest('tr');

        $.post('../Model/excluir.php', {
            acao: "excluirTesteOnline",
            idTesteOnline: $(this).val()

        }, function(sucesso) {

        if(sucesso == true) {

            $linhaAlvo.fadeOut(500,function(){ 
                $linhaAlvo.remove();                 
            }); 
            
        } else {
            alert('Erro: ' + sucesso);
        }
        });
        
    });

    $('#tabelaQuestao').on('click', '.btnExcluir', function(e) {

        var $linhaAlvo = $(this).closest('tr');

        $.post('../Model/excluir.php', {
            acao: "excluirQuestao",
            idTesteOnline: $('#idTesteOnline').html(),
            idQuestao: $(this).val()

        }, function(sucesso) {

        if(sucesso == true) {

            $linhaAlvo.fadeOut(500,function(){ 
                $linhaAlvo.remove();                 
            }); 
            
        } else {
            alert('Erro: ' + sucesso);
        }
        });
        
    });

});
