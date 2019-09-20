<?php
include_once "../Model/Conexao.php";
include_once "../Model/Candidato.php";
include_once "../Controller/CandidatoDAO.php";

$conn = new Conexao();
$candidato = new Candidato();
$candidatoDAO = new CandidatoDAO($conn);

$candidato->setCpf("545454");

$candidatoDAO->Listar($candidato);

?>

<?php include_once 'headerCand.php'; ?>

<div class="container">

  <section>

    <div class="container-small">
      <div class="row">
        <div class=col>
          <h4>Defina as instituições pela quais você já esteve e os cursos aos quais já realizou</h4>
        </div>
      </div>
     </div>

    <div class="row">
      <div class="col">
        <div class="accordion" id="accordionCandidatoCursosDiversos">
          <form method="POST" action="candidato_inserir.php">

            <div class="card">

              <div class="card-header" id="candidatoInstituicao" data-toggle="collapse" data-target="#collapsecandidInstituicao" aria-expanded="true" aria-controls="collapsecandidInstituicao">
                Instituição de ensino
                <button name="btnAlterarSalvarInstituicao" id="btnAlterarSalvarInstituicao" class="btn btn-primary float-right" data-toggle="collapse" data-target="#collapsecandidInstituicao" aria-expanded="true" aria-controls="collapsecandidInstituicao">Alterar</button>
              </div>

              <div id="collapsecandidInstituicao" class="collapse" aria-labelledby="candidatoInstituicao" data-parent="#accordionCandidatoCursosDiversos">

                <div class="card-body">
                  <div class="card-text">

                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="txtNomeCurso">Nome do curso</label>
                          <input type="text" class="form-control" id="txtTelefone" name="txtTelefone" placeholder="" required>
                        </div>

                        <div class="form-group col-md-4">
                          <label for="txNomeInsti">Nome da instituição</label>
                          <input type="text" class="form-control" id="txtTelefone2" name="txtTelefone2" placeholder="">
                        </div>

                        <div class="form-group col-md-4">
                          <label for="tipoCurso">Tipo do curso</label>
                          <select class="custom-select" id="cbbTipoCurso" name="cbbTipoCurso" required>
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
                          <input type="date" class="form-control" id="dtaInicioInsti" name="dtaInicioInsti" placeholder="" required>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="dtaTermInsti">Data término (previsão)</label>
                          <input type="date" class="form-control" id="dtaTermInsti" name="dtaTermInsti" placeholder="" required>
                        </div>

                       </div>

                         <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="cbbSituacaoInsti">Tipo do curso</label>
                              <select class="custom-select" id="cbbSituacaoInsti" name="cmbSituacaoInsti" required>
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
            </div>

            <div class="card">

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
            </div>

        </form>

       </div>
      </div>
     </div>

  </section>

    <button name="btnContinuar" id="btnContinuar" class="btn btn-primary float-right" data-toggle="collapse">Continuar</button>
</div>

       

<?php include 'footer.php'; ?>
