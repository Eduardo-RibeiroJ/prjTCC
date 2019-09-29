$(function(){

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

        var cardAlvo = $(this).closest('.card');

        $.post('../PostAjax/excluir.php', {
            acao: "excluirTesteOnline",
            idTesteOnline: $(this).val()

        }, function(sucesso) {

        if(sucesso == true) {

            cardAlvo.fadeOut(500,function(){ 
                cardAlvo.remove();
            }); 
            
        } else {
            alert('Erro: ' + sucesso);
        }
        });
        
    });

    $('#accordionQuestao').on('click', '#btnExcluir', function(e) {

        var cardAlvo = $(this).closest('.card');

        $.post('../PostAjax/excluir.php', {
            acao: "excluirQuestao",
            idTesteOnline: $('#idTesteOnline').html(),
            idQuestao: $(this).val()

        }, function(sucesso) {

        if(sucesso == true) {

            cardAlvo.fadeOut(500,function(){ 
                cardAlvo.remove();                 
            }); 
            
        } else {
            alert('Erro: ' + sucesso);
        }
        });
        
    });

    //************ SALVAR E ALTERAR DADOS PESSOAIS

    $('#accordionCandidatoDadosPessoais').on('click', '#btnAlterarSalvarDadosPessoais', function(e) {

        e.preventDefault();
        
        $.post('../PostAjax/alterar.php', {
            acao: "alterarCandidatoDadosPessoais",
            cpf: $('#cpf').val(),
            nome: $('#txtNome').val(),
            sobrenome: $('#txtSobrenome').val(),
            dataNasc: $('#txtDataNasc').val(),
            estadoCivil: $('#cbbEstadoCivil').val(),
            sexo: $('#cbbSexo').val()

        }, function(sucesso) {

            if(sucesso == true) {
                $("#btnAlterarDadosPessoais").click();
            } else {
                alert('Erro: ' + sucesso);
            }
        });
    });

    $('#accordionCandidatoDadosPessoais').on('click', '#btnAlterarSalvarEndereco', function (e) {

        e.preventDefault();

        $.post('../PostAjax/alterar.php', {
            acao: "alterarCandidatoEndereco",
            cpf: $('#cpf').val(),
            cep: $('#txtCEP').val(),
            endereco: $('#txtEndereco').val(),
            bairro: $('#txtBairro').val(),
            cidade: $('#txtCidade').val(),
            estado: $('#txtUF').val()

        }, function (sucesso) {

            if (sucesso == true) {
                $("#btnAlterarEndereco").click();
            } else {
                alert('Erro: ' + sucesso);
            }
        });

    });

    $('#accordionCandidatoDadosPessoais').on('click', '#btnAlterarSalvarContato', function (e) {

        e.preventDefault();

        $.post('../PostAjax/alterar.php', {
            acao: "alterarCandidatoContato",
            cpf: $('#cpf').val(),
            tel1: $('#txtTelefone').val(),
            tel2: $('#txtTelefone2').val(),
            linkedin: $('#txtlinkedin').val(),
            facebook: $('#txtFacebook').val(),
            sitePessoal: $('#txtSitePessoal').val()

        }, function (sucesso) {

            if (sucesso == true) {
                $("#btnAlterarContato").click();
            } else {
                alert('Erro: ' + sucesso);
            }
        });

    });

    //********** INSERIR, ALTERAR E APAGAR FORMAÇÃO

    $('#sectionCardsFormacao').on('click', '#btnAlterarSalvarFormacao', function (e) {

        e.preventDefault();
        var idFormacao = $(this).val();
        var button = $(this);
        var salvarAlterar;

        if($(this).html() == "Inserir")
            salvarAlterar = '../PostAjax/salvar.php';
        else
            salvarAlterar = '../PostAjax/alterar.php';

        if(button.html() == "Alterar") {
            button.html("Salvar");

        } else {

            $.post(salvarAlterar, {
                acao: "candidatoFormacao",
                cpf: $('#txtCpf').val(),
                idFormacao: idFormacao,
                curso: $('#txtNomeCurso' + idFormacao).val(),
                instituicao: $('#txtNomeInsti' + idFormacao).val(),
                dtaInicio: $('#dtaInicioInsti' + idFormacao).val(),
                dtaTerm: $('#dtaTermInsti' + idFormacao).val(),
                tipo: $('#cbbTipoCurso' + idFormacao).val(),
                situacao: $('#cbbSituacaoInsti' + idFormacao).val()

            }, function (sucesso) {

                if (sucesso == true) {
                    if(button.html() == "Salvar") {
                        $('#tituloHeader' + idFormacao).html($('#txtNomeCurso' + idFormacao).val());
                        $("#btnAlterar" + idFormacao).click();
                    }
                    else {
                        location.reload();
                    }
                } else {
                    alert('Erro: ' + sucesso);
                }
            });
        }
    });

    $('#sectionCardsFormacao').on('click', '#btnExcluirFormacao', function (e) {

        var cardAlvo = $(this).closest('.card');

        $.post('../PostAjax/excluir.php', {
            acao: "excluirFormacao",
            cpf: $('#txtCpf').val(),
            idFormacao: $(this).val()

        }, function(sucesso) {

        if(sucesso == true) {

            cardAlvo.fadeOut(500,function(){ 
                cardAlvo.remove();                 
            }); 
            
        } else {
            alert('Erro: ' + sucesso);
        }
        });
    });

    //********** INSERIR, ALTERAR E APAGAR CURSO

    $('#accordionCandidatoCurso').on('click', '#btnSalvarCurso', function (e) {

        e.preventDefault();
        var idCurso = $(this).val();

            $.post('../PostAjax/salvar.php', {
                acao: "salvarCandidatoCursoProfiss",
                cpf: $('#txtCpf').val(),
                idCurso: idCurso,
                cursoP: $('#txtNomeCursoP').val(),
                instituicaoP: $('#txtNomeInstiP').val(),
                conclusao: $('#dtaconclusao').val(),
                CargaHora: $('#cargaHora').val()

            }, function (sucesso) {

                if (sucesso == true) {
                    $("#btnSalvarCurso").html("Alterar");
                    $('#btnSalvarCurso').prop('id', 'btnAlterarSalvarCursoProfiss');
                    $('#btnSalvarCurso').prop('name', 'btnAlterarSalvarCursoProfiss');
                    $('#btnAddCardCurso').removeAttr('disabled');
                    $('#tituloHeader' + idCurso).html('Kasino Aee!!');
                } else {
                    alert('Erro: ' + sucesso);
                }

            });
    });


});
