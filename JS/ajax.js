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

        console.log("rsrsrs");

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

    $('#accordionCandidatoDadosPessoais').on('click', '#btnAlterarSalvarDadosPessoais', function(e) {

        e.preventDefault();
        
        if($("#btnAlterarSalvarDadosPessoais").html() == "Alterar") {

            $("#btnAlterarSalvarDadosPessoais").html("Salvar");

        } else {
        
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
                    $("#btnAlterarSalvarContato").html("Alterar");
                } else {
                    alert('Erro: ' + sucesso);
                }
            });

        }
    });

    $('#sectionCardsFormacao').on('click', '#btnAlterarSalvarFormacao, #btnSalvarFormacao', function (e) {

        e.preventDefault();
        var idFormacao = $(this).val();
        var button = $(this);
        var salvarAlterar;

        if($(this).html() == "Inserir")
            salvarAlterar = '../PostAjax/salvar.php';
        else
            salvarAlterar = '../PostAjax/alterar.php';


        if (button.html() == "Alterar") {

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
                        button.html("Alterar");
                        $('#tituloHeader' + idFormacao).html($('#txtNomeCurso' + idFormacao).val());
                    }
                    else {
                        window.location.reload();
                    }
                } else {
                    alert('Erro: ' + sucesso);
                }
            });

        }
    });

    //TESTEEEEEEEEEEEEEEEE
    $('#accordionCandidatoFormacao').on('click', '#btnAddCardFormacao', function (e) {

        var ultimoRegistro = $('#txtUltimoRegistro').val();

        $('#accordionCandidatoFormacao').append(`<div class="card">
                                                    <div class="card-header" id="candidatoFormacao` + ultimoRegistro + `">
                                                        <p id="tituloHeader` + ultimoRegistro + `" class="d-inline">Formação</p>
                                                        <button value="` + ultimoRegistro + `" name="btnAlterarSalvarFormacao" id="btnAlterarSalvarFormacao" class="btn btn-primary float-right d-inline" data-toggle="collapse" data-target="#collapseCandidatoFormacao` + ultimoRegistro + `" aria-expanded="true" aria-controls="collapseCandidatoFormacao` + ultimoRegistro + `">Inserir</button>

                                                    </div>
                                                    <div id="collapseCandidatoFormacao` + ultimoRegistro + `" class="collapse show" aria-labelledby="candidatoFormacao` + ultimoRegistro + `" data-parent="#accordionCandidatoFormacao">
                                                        <div class="card-body">
                                                            <div class="card-text">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-4">
                                                                    <label for="txtNomeCurso">Nome do curso</label>
                                                                    <input type="text" class="form-control" id="txtNomeCurso` + ultimoRegistro + `" name="txtNomeCurso" placeholder="" required>
                                                                    </div>

                                                                    <div class="form-group col-md-4">
                                                                    <label for="txtNomeInsti">Nome da instituição</label>
                                                                    <input type="text" class="form-control" id="txtNomeInsti` + ultimoRegistro + `" name="txtNomeInsti" placeholder="">
                                                                    </div>

                                                                    <div class="form-group col-md-4">
                                                                    <label for="tipoCurso">Tipo do curso</label>
                                                                    <select class="custom-select" id="cbbTipoCurso` + ultimoRegistro + `" name="cbbTipoCurso" required>
                                                                        <option value="" selected>Selecione</option>
                                                                        <option value="F12">Formação escolar fundamental (1°Grau) e média (2°Grau)</option>
                                                                        <option value="EMP">Ensino Médio profisisonalizante</option>
                                                                        <option value="GR">Graduação</option>
                                                                        <option value="GRE">Graduação - especialização</option>
                                                                        <option value="GRMB">Graduação - MBA</option>
                                                                        <option value="GRME">Graduação - Mestrado</option>
                                                                        <option value="GRD">Graduação - Doutorado</option>
                                                                    </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-row">

                                                                    <div class="form-group col-md-3">
                                                                    <label for="dtaInicioInsti">Data início</label>
                                                                    <input type="date" class="form-control" id="dtaInicioInsti` + ultimoRegistro + `" name="dtaInicioInsti" placeholder="" required>
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                    <label for="dtaTermInsti">Data término (previsão)</label>
                                                                    <input type="date" class="form-control" id="dtaTermInsti` + ultimoRegistro + `" name="dtaTermInsti" placeholder="" required>
                                                                    </div>

                                                                </div>

                                                                    <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="cbbSituacaoInsti">Tipo do curso</label>
                                                                        <select class="custom-select" id="cbbSituacaoInsti` + ultimoRegistro + `" name="cmbSituacaoInsti" required>
                                                                            <option value="" selected>Selecione</option>
                                                                            <option value="IM">Interrrompido</option>
                                                                            <option value="EM">Em andamento</option>
                                                                            <option value="FI">Finalizado</option>
                                                                        </select>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`
        );

        $('#btnAddCardFormacao').attr("disabled", true);

        ultimoRegistro = parseInt(ultimoRegistro);
        $('#txtUltimoRegistro').val(ultimoRegistro + 1);
        
    });


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

    $('#accordionCandidatoCurso').on('click', '#btnAddCardCurso', function (e) {

        var ultimoRegistroCurso = $('#txtUltimoRegistroCurso').val();

        $('#accordionCandidatoCurso').append(`<div class="card">
                                                    <div class="card-header" id="candidatoCurso` + ultimoRegistroCurso + `">
                                                        <p id="tituloHeader` + ultimoRegistroCurso + `" class="d-inline">Curso Profissionalizante</p>
                                                        <button value="` + ultimoRegistroCurso + `" name="btnSalvarCurso" id="btnSalvarCurso" class="btn btn-primary float-right d-inline" data-toggle="collapse" data-target="#collapsecandidatoCurso` + ultimoRegistroCurso + `" aria-expanded="true" aria-controls="collapsecandidatoCurso` + ultimoRegistroCurso + `">Salvar</button>
                                                    </div >

                                                    <div id="collapsecandidatoCurso" class="collapse show" aria-labelledby="candidatoCurso" data-parent="#accordionCandidatoCurso">

                                                        <div class="card-body">
                                                        <div class="card-text">

                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                <label for="txtNomeCursoP">Nome do curso</label>
                                                                <input type="text" class="form-control" id="txtNomeCursoP" name="txtNomeCursoP" placeholder="" required>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                <label for="txtNomeInstiP">Nome da instituição</label>
                                                                <input type="text" class="form-control" id="txtNomeInstiP" name="txtNomeInstiP" placeholder="">
                                                                </div>
                                                            </div>

                                                            <div class="form-row">

                                                                <div class="form-group col-md-4">
                                                                    <label for="dtaconclusao">Conclusão</label>
                                                                    <input type="date" class="form-control" id="dtaconclusao" name="dtaconclusao" placeholder="" required>
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label for="cargaHora">Carga horária</label>
                                                                    <input type="text" class="form-control" id="cargaHora" name="cargaHora" placeholder="">
                                                                </div>

                                                                </div>

                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>`
        );

        $('#btnAddCardCurso').attr("disabled", true);

        ultimoRegistroCurso = parseInt(ultimoRegistroCurso);
        $('#txtUltimoRegistroCurso').val(ultimoRegistroCurso + 1);

    });


});
