$(function () {

    $('#formInserirQuestao').on('click', '#btnAdicionar', function (e) {

        var numQuestao = $('#numQuestao').val();
        // Cancela o envio do formulário
        e.preventDefault();

        console.log($('#numQuestao').val());


        if ($('#numQuestao').val() == "1") { //Salvará o questionário apenas na primeira inclusão de questão

            $.post('../PostAjax/salvar.php', {
                acao: "salvarTesteOnline",
                numTeste: $('#numTeste').html(),
                cnpj: $('#txtCnpj').val(),
                nomeTeste: $('#nomeTeste').html()
            });
        }

        // Método post do Jquery
        $.post('../PostAjax/salvar.php', {
            acao: "salvarQuestao",
            numTeste: $('#numTeste').html(), //<numTeste(variavel que vai enviar) || numTeste>(variavel daqui)
            cnpj: $('#txtCnpj').val(),
            numQuestao: numQuestao,
            questao: $('#questao').val(),
            a: $('#a').val(),
            b: $('#b').val(),
            c: $('#c').val(),
            d: $('#d').val(),
            resposta: $('#resposta').val(),
            tempo: $('#tempo').val()

        }, function (sucesso) { //RETORNO DO SALVAR
            // Valida a resposta
            if (sucesso == true) {

                numQuestao++;
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

    $('#formAlterarQuestao').on('click', '#btnSalvar', function (e) {

        var numTesteOnline = $('#numTeste').html();

        // Cancela o envio do formulário
        e.preventDefault();

        // Método post do Jquery
        $.post('../PostAjax/alterar.php', {
            acao: "alterarQuestao",
            numTeste: numTesteOnline, //<numTeste(variavel que vai enviar) || numTeste>(variavel daqui)
            cnpj: $('#txtCnpj').val(),
            numQuestao: $('#numQuestao').val(),
            questao: $('#questao').val(),
            a: $('#a').val(),
            b: $('#b').val(),
            c: $('#c').val(),
            d: $('#d').val(),
            resposta: $('#resposta').val(),
            tempo: $('#tempo').val()

        }, function (sucesso) { //RETORNO DO SALVAR
            // Valida a resposta
            if (sucesso == true) {

                window.location.replace('TesteOnline_questao_listar.php?idTesteOnline=' + numTesteOnline);

            } else {
                alert('Erro: ' + sucesso);
            }

        });

    });

    $('#accordionTesteOnline').on('click', '#btnExcluir', function (e) {

        var cardAlvo = $(this).closest('.card');

        $.post('../PostAjax/excluir.php', {
            acao: "excluirTesteOnline",
            idTesteOnline: $(this).val(),
            cnpj: $('#txtCnpj').val()

        }, function (sucesso) {

            if (sucesso == true) {

                cardAlvo.fadeOut(500, function () {
                    cardAlvo.remove();
                });

            } else {
                alert('Erro: ' + sucesso);
            }
        });

    });

    $('#accordionQuestao').on('click', '#btnExcluir', function (e) {

        var cardAlvo = $(this).closest('.card');

        $.post('../PostAjax/excluir.php', {
            acao: "excluirQuestao",
            idTesteOnline: $('#idTesteOnline').html(),
            cnpj: $('#txtCnpj').val(),
            idQuestao: $(this).val()

        }, function (sucesso) {

            if (sucesso == true) {

                cardAlvo.fadeOut(500, function () {
                    cardAlvo.remove();
                });
                window.location.reload();

            } else {
                alert('Erro: ' + sucesso);
            }
        });

    });

    //************ SALVAR E ALTERAR DADOS PESSOAIS

    $('#accordionCandidatoDadosPessoais').on('click', '#btnAlterarSalvarDadosPessoais', function (e) {

        e.preventDefault();

        $.post('../PostAjax/alterar.php', {
            acao: "alterarCandidatoDadosPessoais",
            cpf: $('#cpf').val(),
            nome: $('#txtNome').val(),
            sobrenome: $('#txtSobrenome').val(),
            dataNasc: $('#txtDataNasc').val(),
            estadoCivil: $('#cbbEstadoCivil').val(),
            sexo: $('#cbbSexo').val()

        }, function (sucesso) {

            if (sucesso == true) {
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

        if ($(this).html() == "Inserir")
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
                    if (button.html() == "Salvar") {
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

        }, function (sucesso) {

            if (sucesso == true) {

                cardAlvo.fadeOut(500, function () {
                    cardAlvo.remove();
                });

            } else {
                alert('Erro: ' + sucesso);
            }
        });
    });

    //********** INSERIR, ALTERAR E APAGAR CURSO

    $('#sectionCardsCurso').on('click', '#btnAlterarSalvarCurso', function (e) {

        e.preventDefault();
        var idCurso = $(this).val();
        var button = $(this);
        var salvarAlterar;

        if ($(this).html() == "Inserir")
            salvarAlterar = '../PostAjax/salvar.php';
        else
            salvarAlterar = '../PostAjax/alterar.php';

        if (button.html() == "Alterar") {
            button.html("Salvar");

        } else {

            $.post(salvarAlterar, {
                acao: "CandidatoCurso",
                cpf: $('#txtCpf').val(),
                idCurso: idCurso,
                curso: $('#txtNomeCurso' + idCurso).val(),
                instituicao: $('#txtNomeInsti' + idCurso).val(),
                anoConclusao: $('#Conclusao' + idCurso).val(),
                cargaHoraria: $('#CargaHoraria' + idCurso).val()

            }, function (sucesso) {

                if (sucesso == true) {
                    if (button.html() == "Salvar") {
                        $('#tituloHeader' + idCurso).html($('#txtNomeCurso' + idCurso).val());
                        $("#btnAlterar" + idCurso).click();
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

    $('#sectionCardsCurso').on('click', '#btnExcluirCurso', function (e) {

        var cardAlvo = $(this).closest('.card');

        $.post('../PostAjax/excluir.php', {
            acao: "excluirCurso",
            cpf: $('#txtCpf').val(),
            idCurso: $(this).val()

        }, function (sucesso) {

            if (sucesso == true) {

                cardAlvo.fadeOut(500, function () {
                    cardAlvo.remove();
                });

            } else {
                alert('Erro: ' + sucesso);
            }
        });
    });


    //********** INSERIR, ALTERAR E APAGAR EMPRESA

    $('#sectionCardsEmpresa').on('click', '#btnAlterarSalvarEmpresa', function (e) {

        e.preventDefault();
        var idEmpresa = $(this).val();
        var button = $(this);
        var salvarAlterar;

        if ($(this).html() == "Inserir")
            salvarAlterar = '../PostAjax/salvar.php';
        else
            salvarAlterar = '../PostAjax/alterar.php';

        if (button.html() == "Alterar") {
            button.html("Salvar");

        } else {

            $.post(salvarAlterar, {
                acao: "CandidatoEmpresa",
                cpf: $('#txtCpf').val(),
                idEmpresa: idEmpresa,
                nomeEmpresa: $('#txtNomeEmpresa' + idEmpresa).val(),
                cargo: $('#txtCargo' + idEmpresa).val(),
                dataInicio: $('#dtaInicio' + idEmpresa).val(),
                dataSaida: $('#dtaTermino' + idEmpresa).val(),
                atividades: $('#txtAtividades' + idEmpresa).val()

            }, function (sucesso) {

                if (sucesso == true) {
                    if (button.html() == "Salvar") {
                        $('#tituloHeader' + idEmpresa).html($('#txtNomeEmpresa' + idEmpresa).val());
                        $("#btnAlterar" + idEmpresa).click();
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

    $('#sectionCardsEmpresa').on('click', '#btnExcluirEmpresa', function (e) {

        var cardAlvo = $(this).closest('.card');

        $.post('../PostAjax/excluir.php', {
            acao: "excluirEmpresa",
            cpf: $('#txtCpf').val(),
            idEmpresa: $(this).val()

        }, function (sucesso) {

            if (sucesso == true) {

                cardAlvo.fadeOut(500, function () {
                    cardAlvo.remove();
                });

            } else {
                alert('Erro: ' + sucesso);
            }
        });
    });

    

    //********** INSERIR, ALTERAR E APAGAR PERGUNTA

    $('#containerPergunta').on('click', '#btnInserirPergunta', function (e) {

        e.preventDefault();
        var idPergunta = $('#txtUltimoRegistro').val();
        var pergunta = $('#txtPergunta').val();
        console.log($('#txtPergunta').val());

        $.post('../PostAjax/salvar.php', {
            acao: "Pergunta",
            cnpj: $('#txtCnpj').val(),
            idPergunta: idPergunta,
            pergunta: pergunta

        }, function (sucesso) {

            if (sucesso == true) {

                $('#sectionCardsPergunta').prepend(`
                                                    <div class="row">
                                                    <div class="col">

                                                        <div class="card">
                                                        <div class="card-header" id="SalvarPergunta`+idPergunta+`">
                                                            <p id="tituloHeader`+ idPergunta +`" class="d-inline">`+ pergunta +`</p>
                                                            <button name="btnAlterar`+ idPergunta +`" id="btnAlterar`+ idPergunta +`" class="btn btn-outline-primary float-right d-inline" data-toggle="collapse" data-target="#collapseRecrutadorPergunta`+ idPergunta +`">
                                                            <i class="fas fa-pencil-alt"></i>
                                                            </button>
                                                        </div>

                                                        <div id="collapseRecrutadorPergunta`+ idPergunta +`" class="collapse">

                                                            <div class="card-body">
                                                            <div class="card-text">
                                                                <div class="form-row">
                                                                <div class="form-group col-md-10">
                                                                    <label for="txtPergunta">Pergunta</label>
                                                                    <textarea type="text" class="form-control" rows="4" id="txtPergunta`+idPergunta+`" name="txtPergunta" value="`+idPergunta+`" required>`+ pergunta +`</textarea>
                                                                </div>
                                                                </div>

                                                                <div class="form-row">
                                                                <div class="col">
                                                                    <button value="`+ idPergunta + `" name="btnAlterarSalvarPergunta" id="btnAlterarSalvarPergunta" class="btn btn-primary">Salvar</button>
                                                                    <button value="`+ idPergunta + `" name="btnExcluirPergunta" id="btnExcluirPergunta" class="btn btn-secondary">Apagar</button>
                                                                </div>
                                                                </div>
                                                            </div> <!-- CardText -->
                                                            </div> <!-- CardBody -->
                                                        </div>
                                                        </div> <!-- Card -->
                                                    </div>
                                                    </div>`                  
                );

                $('#txtPergunta').val('');
                $('#txtPergunta').focus();
                $('#txtUltimoRegistro').val(parseInt(idPergunta) + 1);

            } else {
                alert('Erro: ' + sucesso);
            }
        });
    });

    $('#sectionCardsPergunta').on('click', '#btnAlterarSalvarPergunta', function (e) {

        var idPergunta = $(this).val();
        
        $.post('../PostAjax/alterar.php', {
            acao: "Pergunta",
            cnpj: $('#txtCnpj').val(),
            idPergunta: idPergunta,
            pergunta: $('#txtPergunta' + idPergunta).val()

        }, function (sucesso) {

            if (sucesso == true) {
                console.log('ALTEROU');
                console.log($('#txtPergunta' + idPergunta).val());
                $('#btnAlterar'+idPergunta).click();
                $('#tituloHeader' + idPergunta).html($('#txtPergunta' + idPergunta).val());

            } else {
                alert('Erro: ' + sucesso);
            }
        });
    });

    $('#sectionCardsPergunta').on('click', '#btnExcluirPergunta', function (e) {

        var cardAlvo = $(this).closest('.card');

        $.post('../PostAjax/excluir.php', {
            acao: "excluirPergunta",
            cnpj: $('#txtCnpj').val(),
            idPergunta: $(this).val()

        }, function (sucesso) {

            if (sucesso == true) {

                cardAlvo.fadeOut(500, function () {
                    cardAlvo.remove();
                });

            } else {
                alert('Erro: ' + sucesso);
            }
        });
    });


// ------------------------------------------------Objetivo-------------------------------------------------

    $('#sectionObjetivo').on('click', '#btnAlterarcandObjetivo', function (e) {

        e.preventDefault();

        $.post('../PostAjax/alterar.php', {
            acao: "CandidatoObjetivo",
            cpf: $('#txtCpf').val(), 
            idObjetivo: 1,
            cargo: $('#txtCargo').val(),
            nivel: $('#cbbNivel').val(),
            pretSal: $('#txtPretSal').val()

        }, function (sucesso) {

            if (sucesso == true) {
                window.location.replace('candidato_perfil.php');
            } else {
                alert('Erro: ' + sucesso);
            }
        });
    });



    //RECRUTADOR EDITAR
    $('#accordionRecrutadorDados').on('click', '#btnAlterarSalvarEnderecoRecrutador', function (e) {

        e.preventDefault();

        $.post('../PostAjax/alterar.php', {
            acao: "alterarRecrutadorEndereco",
            cnpj: $('#txtCnpj').val(),
            nomeEmpresa: $('#txtNomeEmpresa').val(),
            cep: $('#txtCEP').val(),
            estado: $('#txtEstado').val(),
            cidade: $('#txtCidade').val(),
            endereco: $('#txtEndereco').val(),
            bairro: $('#txtBairro').val()

        }, function (sucesso) {

            if (sucesso == true) {
                $("#btnAlterarEndereco").click();
            } else {
                alert('Erro: ' + sucesso);
            }
        });

    });

    $('#accordionRecrutadorDados').on('click', '#btnAlterarSalvarContatoRecrutador', function (e) {

        e.preventDefault();

        $.post('../PostAjax/alterar.php', {
            acao: "alterarRecrutadorContato",
            cnpj: $('#txtCnpj').val(),
            tel1: $('#txtTelefone1').val(),
            tel2: $('#txtTelefone2').val(),
            linkedin: $('#txtLinkedin').val(),
            facebook: $('#txtFacebook').val(),
            siteEmpresa: $('#txtSiteEmpresa').val()

        }, function (sucesso) {

            if (sucesso == true) {
                $("#btnAlterarContato").click();
            } else {
                alert('Erro: ' + sucesso);
            }
        });

    });




    //CANDIDATO PERFIL
    $('#sectionCandidatoPerfil').on('click', '#btnAlterarDadosPessoais', function (e) {

        e.preventDefault();
        var btn = $(this);

        window.location.href = "candidato_alterar.php";

        //$('#btnAlterarDadosPessoais').click();

    });

    //CANDIDATO COMPETENCIAS

    $('#containerCompetencias').on('click', '#btnInserirCompetencia', function (e) {

        e.preventDefault();
        var nomeCompetencia = $('#txtNomeCompetencia').val();
        var nivelCompetencia = $('#cbbNivelCompetencia').val();

        $.post('../PostAjax/salvar.php', {
            acao: "SalvarCandCompetencia",
            cpf: $('#txtCpf').val(),
            competencia: nomeCompetencia,
            nivel: nivelCompetencia

        }, function (sucesso) {

            if (sucesso.substring(sucesso.length - 1) == 1) {

                idCompetencia = sucesso.substring(0, sucesso.length - 2)

                $('#divCandCompetencias').prepend(`<div class="div-competencia flex-fill">
                                                    <p>
                                                        <h5 class="d-inline">`+ nomeCompetencia + `</h5>
                                                        <button class="btn btn-outline-dark d-inline ml-4" value="` + idCompetencia + `" id="btnExcluirCompetencia"><i class="fas fa-trash-alt"></i></button>
                                                    </p>
                                                    <p>
                                                    <select class="custom-select d-inline" id="cbbNivelCompetencia` + idCompetencia + `" name="cbbNivelCompetencia" required>
                                                        <option value="Básico">Básico</option>
                                                        <option value="Intermediário">Intermediário</option>
                                                        <option value="Avançado">Avançado</option>
                                                    </select>
                                                    </p>
                                                </div>`
                );


                $('#cbbNivelCompetencia' + idCompetencia).val(nivelCompetencia);
                $('#txtNomeCompetencia').val('');
                $('#cbbNivelCompetencia').val('Básico');

                $('#txtNomeCompetencia').focus();

            } else {
                alert('Erro: ' + sucesso);
            }
        });

    });

    $('#sectionCandCompetencias').on('click', '#btnExcluirCompetencia', function (e) {

        var cardAlvo = $(this).closest('.div-competencia');

        $.post('../PostAjax/excluir.php', {
            acao: "excluirCompetencia",
            cpf: $('#txtCpf').val(),
            idCompetencia: $(this).val()

        }, function (sucesso) {

            if (sucesso == true) {

                cardAlvo.fadeOut(500, function () {
                    cardAlvo.remove();
                });

            } else {
                alert('Erro: ' + sucesso);
            }
        });
    });

    $('#sectionCandCompetencias').on('change', 'select', function (e) {

        var nivel = $(this).val();

        //Retorna apenas os int (idCompetencia) que esta misturado em uma string
        var idCompetencia = $(this).attr('id').replace(/\D+/g, '');

        $.post('../PostAjax/alterar.php', {
            acao: "alterarCandCompetencia",
            cpf: $('#txtCpf').val(),
            idCompetencia: idCompetencia,
            nivel: nivel

        }, function (sucesso) {

            if (sucesso == true) {
                console.log('ALTEROU');

            } else {
                alert('Erro: ' + sucesso);
            }
        });
    });

    //ETAPAS DO PROCESSO SELETIVO

    $('#sectionProcesso1').on('change', '#chkAc', function (e) {

        var txtSal = $('#txtSalario');

        if(this.checked) {
            txtSal.val('A combinar');
            txtSal.attr('readonly', true);
        } else {
            txtSal.val('');
            txtSal.attr('readonly', false);

        }

    });

    $('#cardProcessoCompetencias').on('click', '#btnInserirCompetencia', function (e) {

        e.preventDefault();
        var nomeCompetencia = $('#txtNomeCompetencia').val();
        var nivelCompetencia = $('#cbbNivelCompetencia').val();
        var ultimoRegistro = $('#txtContador').val();


        $('#divProcessoCompetencias').prepend(`<div class="div-competencia flex-fill">
                                            <p>
                                                <h5 class="d-inline">`+ nomeCompetencia +`</h5>
                                                <button class="btn btn-outline-dark d-inline ml-4" value="` + ultimoRegistro +`" id="btnExcluirCompetencia"><i class="fas fa-trash-alt"></i></button>
                                            </p>
                                            <p>
                                            <select class="custom-select d-inline" id="cbbNivelCompetencia` + ultimoRegistro +`" name="cbbNivelCompetencia" required>
                                                <option value="Básico">Básico</option>
                                                <option value="Intermediário">Intermediário</option>
                                                <option value="Avançado">Avançado</option>
                                            </select>
                                            </p>
                                        </div>`
                                    );
            
                                            
        $('#cbbNivelCompetencia' + ultimoRegistro).val(nivelCompetencia);
        $('#txtContador').val(parseInt(ultimoRegistro) + 1);
        $('#txtNomeCompetencia').val('');
        $('#cbbNivelCompetencia').val('Básico');
        
        $('#txtNomeCompetencia').focus();

    });

    $('#cardProcessoCompetencias').on('click', '#btnExcluirCompetencia', function (e) {

        var cardAlvo = $(this).closest('.div-competencia');

        cardAlvo.fadeOut(500, function () {
            cardAlvo.remove();
        });

    });

    $('#sectionProcesso2').on('click', '#btnConcluir', function (e) {

        e.preventDefault();
        $(this).attr("disabled", true);

        //Inserir Processo Seletivo
        $.post('../PostAjax/salvar.php', {
        acao: "SalvarProcessoSeletivo"

        }, function (sucesso) {

            if (sucesso == true) {
                console.log('INSERIU PROCESSO');
                
            } else {
                alert('Erro: ' + sucesso);
            }
        }).done(function() {
            console.log('caiu no done do processo');
            addCompetencias();
        });

        function addCompetencias() {
            var contCompetencias = 0;

            $(".div-competencia").each(async function() {
                var div = $(this);
                await $.post('../PostAjax/salvar.php', {
                    acao: "SalvarProcessoCompetencia",
                    competencia: div.find('h5').html(),
                    nivel: div.find('select').val()
                    
                }, function (sucesso) {
                    
                    if (sucesso == true) {
                        console.log('INSERIU COMPETENCIA');
                    } else {
                        alert('Erro: ' + sucesso);
                    }
                });

                contCompetencias++;
                if(contCompetencias === $(".div-competencia").length) {
                    console.log('addTodasCOmpetencias');
                    addTestes();
                }
            });
            //Cai aqui se nao tiver nenhuma competencia adicionada
            if($(".div-competencia").length === 0) {
                console.log('addTodasCOmpetencias');
                addTestes();
            }
        }

        function addTestes() {
            var contTestes = 0;

            $(".chkTeste").each(async function() {
                
                var checkbox = $(this);
                if(checkbox.prop("checked")) {

                    await $.post('../PostAjax/salvar.php', {
                        acao: "SalvarProcessoTeste",
                        idTeste: checkbox.val()
            
                    }, function (sucesso) {
            
                        if (sucesso == true) {
                            console.log('INSERIU TESTE');
                        } else {
                            alert('Erro: ' + sucesso);
                        }
                    });
                }

                contTestes++;
                if(contTestes === $(".chkTeste").length) {
                    console.log('addTodas Testes');
                    addPerguntas();
                }        
            });
        }
        function addPerguntas() {
            var contPerguntas = 0;

            $(".chkPergunta").each(async function() {
                
                var checkbox = $(this);
                if(checkbox.prop("checked")) {

                    await $.post('../PostAjax/salvar.php', {
                        acao: "SalvarProcessoPergunta",
                        idPergunta: checkbox.val()
            
                    }, function (sucesso) {
            
                        if (sucesso == true) {
                            console.log('INSERIU PERGUNTA');
                        } else {
                            alert('Erro: ' + sucesso);
                        }
                    });
                }

                contPerguntas++;
                if(contPerguntas === $(".chkPergunta").length) {
                    console.log('addTodas Perguntas');
                    mudarPagina();
                }
            });
            if($(".chkPergunta").length === 0) {
                console.log('addTodas Perguntas');
                mudarPagina();
            }
        }
        function mudarPagina() {
            window.location.replace("criar_processo_concluir.php");
            console.log('Trocou paginaaaaa')
        }
    });

    //BOTAO COPIAR LINK

    $('#sectionProcessoConcluir').on('click', '#btnCopiar', function (e) {

        document.getElementById("txtLinkCopiar").select();
        document.execCommand('copy');

    });

});
