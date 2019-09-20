$(function(){
    // Executa assim que o botão de salvar for clicado

    

    $('#formInserirQuestao').on('click', '#btnAdicionar', function(e) {

        var numQuestao = $('#numQuestao').val();
        // Cancela o envio do formulário
        e.preventDefault();

        console.log($('#numQuestao').val());


        if($('#numQuestao').val() == "1") { //Salvará o questionário apenas na primeira inclusão de questão
            
            $.post('../PostAjax/salvar.php', {
            acao: "salvarTesteOnline",
            numTeste: $('#numTeste').html(),
            nomeTeste: $('#nomeTeste').html()
            });
        }

        // Método post do Jquery
        $.post('../PostAjax/salvar.php', {
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
            $('#numQuestao').val(numQuestao);

            $('#numQuestaoCard-Header').html('Questão ' + numQuestao);
            $('input[type=text], textarea').val('');
            $('input[type=number]').val(30);
            $('select').val("A");

            window.location.href = '#containerPrincipal';
            
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
        $.post('../PostAjax/alterar.php', {
            acao: "alterarQuestao",
            numTeste: numTesteOnline, //<numTeste(variavel que vai enviar) || numTeste>(variavel daqui)
            numQuestao: $('#numQuestao').val(),
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

    $('#accordionTesteOnline').on('click', '#btnExcluir', function(e) {

        console.log("rsrsrs");

        var $cardAlvo = $(this).closest('.card');

        $.post('../PostAjax/excluir.php', {
            acao: "excluirTesteOnline",
            idTesteOnline: $(this).val()

        }, function(sucesso) {

        if(sucesso == true) {

            $cardAlvo.fadeOut(500,function(){ 
                $cardAlvo.remove();
            }); 
            
        } else {
            alert('Erro: ' + sucesso);
        }
        });
        
    });

    $('#accordionQuestao').on('click', '#btnExcluir', function(e) {

        var $cardAlvo = $(this).closest('.card');

        $.post('../PostAjax/excluir.php', {
            acao: "excluirQuestao",
            idTesteOnline: $('#idTesteOnline').html(),
            idQuestao: $(this).val()

        }, function(sucesso) {

        if(sucesso == true) {

            $cardAlvo.fadeOut(500,function(){ 
                $cardAlvo.remove();                 
            }); 
            
        } else {
            alert('Erro: ' + sucesso);
        }
        });
        
    });

    $('#accordionCandidatoDadosPessoais').on('click', '#btnAlterarSalvarDadosPessoais', function(e) {

        e.preventDefault();
        
        if($("#btnAlterarSalvarDadosPessoais").html() == "Alterar") {

            $("#btnAlterarSalvarDadosPessoais").html("Salvar");

        } else {
        
            $.post('../PostAjax/salvar.php', {
                acao: "salvarCandidatoDadosPessoais",
                cpf: $('#cpf').val(),
                nome: $('#txtNome').val(),
                sobrenome: $('#txtSobrenome').val(),
                dataNasc: $('#txtDataNasc').val(),
                estadoCivil: $('#cbbEstadoCivil').val(),
                sexo: $('#cbbSexo').val()

            }, function(sucesso) {

            if(sucesso == true) {
                $("#btnAlterarSalvarDadosPessoais").html("Alterar");
            } else {
                alert('Erro: ' + sucesso);
            }
            });
        
        }
    });

    $('#accordionCandidatoDadosPessoais').on('click', '#btnAlterarSalvarEndereco', function (e) {

        e.preventDefault();

        if ($("#btnAlterarSalvarEndereco").html() == "Alterar") {

            $("#btnAlterarSalvarEndereco").html("Salvar");

        } else {

            $.post('../PostAjax/salvar.php', {
                acao: "salvarCandidatoEndereco",
                cep: $('#txtCEP').val(),
                endereco: $('#txtEndereco').val(),
                bairro: $('#txtBairro').val(),
                cidade: $('#txtCidade').val(),
                estado: $('#txtUF').val(),

            }, function (sucesso) {

                if (sucesso == true) {
                    $("#btnAlterarSalvarEndereco").html("Alterar");
                } else {
                    alert('Erro: ' + sucesso);
                }
            });

        }
    });

    $('#accordionCandidatoDadosPessoais').on('click', '#btnAlterarSalvarContato', function (e) {

        e.preventDefault();

        if ($("#btnAlterarSalvarContato").html() == "Alterar") {

            $("#btnAlterarSalvarContato").html("Salvar");

        } else {

            $.post('../PostAjax/salvar.php', {
                acao: "salvarCandidatoContato",
                telefone: $('#txtTelefone').val(),
                telefone2: $('#txtTelefone2').val(),
                linkedin: $('#txtlinkedin').val(),
                facebook: $('#txtFacebook').val(),
                sitePessoal: $('#txtSitePessoal').val(),

            }, function (sucesso) {

                if (sucesso == true) {
                    $("#btnAlterarSalvarContato").html("Alterar");
                } else {
                    alert('Erro: ' + sucesso);
                }
            });

        }
    });

    $('#accordionCandidatoCursosDiversos').on('click', '#btnAlterarSalvarInstituicao', function (e) {

        e.preventDefault();

        if ($("#btnAlterarSalvarInstituicao").html() == "Alterar") {

            $("#btnAlterarSalvarInstituicao").html("Salvar");

        } else {

            $.post('../PostAjax/salvar.php', {
                acao: "salvarCandidatoCursoInsti",
                curso: $('#txtNomeCurso').val(),
                instituicao: $('#txNomeInsti').val(),
                tipo: $('#cbbTipoCurso').val(),
                dtaInicio: $('#dtaInicioInsti').val(),
                dtaTerm: $('#dtaTermInsti').val(),
                situacao: $('#cbbSituacaoInsti').val()

            }, function (sucesso) {

                if (sucesso == true) {
                    $("#btnAlterarSalvarInstituicao").html("Alterar");
                } else {
                    alert('Erro: ' + sucesso);
                }
            });

        }
    });

    $('#accordionCandidatoCursosDiversos').on('click', '#btnAlterarSalvarCursoProfiss', function (e) {

        e.preventDefault();

        if ($("#btnAlterarSalvarCursoProfiss").html() == "Alterar") {

            $("#btnAlterarSalvarCursoProfiss").html("Salvar");

        } else {

            $.post('../PostAjax/salvar.php', {
                acao: "salvarCandidatoCursoProfiss",
                    cursoP: $('#txtNomeCursoP').val(),
                    instituicaoP: $('#txNomeInstiP').val(),
                    situacaoP: $('#cbbSituacaoInsti').val(),
                    conclusao: $('#dtaconclusao').val(),
                    CargaHora: $('#cargaHora').val(),

            }, function (sucesso) {

                if (sucesso == true) {
                    $("#btnAlterarSalvarCursoProfiss").html("Alterar");
                } else {
                    alert('Erro: ' + sucesso);
                }
            });

        }
    });


});
