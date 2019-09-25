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
                    CargaHora: $('#cargaHora').val()

            }, function (sucesso) {

                if (sucesso == true) {
                    $("#btnAlterarSalvarCursoProfiss").html("Alterar");
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
                                                        <button value="` + ultimoRegistro + `" name="btnSalvar" id="btnSalvar" class="btn btn-primary float-right d-inline" data-toggle="collapse" data-target="#collapseCandidatoFormacao` + ultimoRegistro + `" aria-expanded="true" aria-controls="collapseCandidatoFormacao` + ultimoRegistro + `">Salvar</button>
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

    
    $('#accordionCandidatoFormacao').on('click', '#btnSalvar', function (e) {

        e.preventDefault();
        var idFormacao = $(this).val();
        var nomeCurso = $('#txtNomeCurso' + idFormacao).val();

        $.post('../PostAjax/salvar.php', {
            acao: "salvarFormacao",
            cpf: $('#txtCpf').val(),
            idFormacao: idFormacao,
            curso: nomeCurso,
            instituicao: $('#txtNomeInsti' + idFormacao).val(),
            dtaInicio: $('#dtaInicioInsti' + idFormacao).val(),
            dtaTerm: $('#dtaTermInsti' + idFormacao).val(),
            tipo: $('#cbbTipoCurso' + idFormacao).val(),
            situacao: $('#cbbSituacaoInsti' + idFormacao).val()

            }, function (sucesso) {

                if (sucesso == true) {
                    $("#btnSalvar").html("Alterar");
                    $('#btnSalvar').prop('id', 'btnAlterarSalvar');
                    $('#btnSalvar').prop('name', 'btnAlterarSalvar');
                    $('#btnAddCardFormacao').removeAttr('disabled');
                    $('#tituloHeader'+idFormacao).html(nomeCurso);

                } else {
                    alert('Erro: ' + sucesso);
                }
            
        });        
        
    });



//// To fazendo, calma ai
    $('#accordionCandidatoCursos').on('click', '#btnAddCardCursos', function (e) {

        var ultimoRegistro = $('#txtUltimoRegistro').val();

        $('#accordionCandidatoCursos').append(`<div class="card">
                                                    <div class="card-header" id="candidatoCurso" data-toggle="collapse" data-target="#collapsecandidCurso" aria-expanded="true" aria-controls="collapsecandidCurso">
                                                        Cursos profissionalizantes
                                                        <button name="btnAlterarSalvarCursoProfiss" id="btnAlterarSalvarCursoProfiss" class="btn btn-primary float-right" data-toggle="collapse" data-target="#collapsecandidCurso" aria-expanded="true" aria-controls="collapsecandidCurso">Alterar</button>
                                                    </div>

                                                    <div id="collapsecandidCurso" class="collapse" aria-labelledby="candidatoCurso" data-parent="#accordionCandidatoCursosDiversos">

                                                        <div class="card-body">
                                                        <div class="card-text">

                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                <label for="txtNomeCursoP">Nome do curso</label>
                                                                <input type="text" class="form-control" id="txtTelefone" name="txtTelefone" placeholder="" required>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                <label for="txNomeInstiP">Nome da instituição</label>
                                                                <input type="text" class="form-control" id="txtTelefone2" name="txtTelefone2" placeholder="">
                                                                </div>
                                                            </div>

                                                            <div class="form-row">

                                                                <div class="form-group col-md-4">
                                                                    <label for="cbbSituacaoCursoP">Situação</label>
                                                                    <select class="custom-select" id="cbbSituacaoCurso" name="cbbSituacaoCurso" required>
                                                                        <option value="" selected>Selecione</option>
                                                                        <option value="IM">Interrrompido</option>
                                                                        <option value="EM">Em andamento</option>
                                                                        <option value="FI">Finalizado</option>
                                                                    </select>
                                                                    </div>

                                                                <div class="form-group col-md-4">
                                                                    <label for="dtaconclusao">Conclusão</label>
                                                                    <input type="date" class="form-control" id="dtaTermCurso" name="dtaTermCurso" placeholder="" required>
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

        $('#btnAddCardCursos').attr("disabled", true);

        ultimoRegistro = parseInt(ultimoRegistro);
        $('#txtUltimoRegistro').val(ultimoRegistro + 1);

    });


});
