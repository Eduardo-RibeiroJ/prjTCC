<?php include_once 'header.php'; ?>
<!-- html-->
	<!-- body -->
			<!-- main -->

<?php
include_once "../Model/Conexao.php";
include_once "../Model/TesteOnline.php";
include_once "../Controller/TesteOnlineDAO.php";

$conn = new Conexao();
$testeOnline = new TesteOnline();
$testeOnlineDAO = new TesteOnlineDAO($conn);
$arrayTestesOnline = $testeOnlineDAO->Listar($testeOnline);

?>
    <div class="container-fluid">
        <section>                
                <div class="row">
                    <div id="titulo">
                        <!---Título-->
                        <h2><strong>Teste Online</strong></h2>
                    </div>

                        <div class="card" style="width: 136rem;">
                            <form method="POST" action="testeOnline_questao_inserir.php">
                            <div class="card-body">
                                <label class="col-sm-3 col-form-label">Nome do Teste Online</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="nomeTeste" id="nomeTeste" placeholder="Digite o nome do teste..." required autofocus>
                                    <input name="numTeste" type="hidden" value="1"/>
                                </div>
                            </div>
                            <div class="card-body">
                                <input type="submit" name="Adicionar" id="Adicionar" class="btn btn-primary" value="Adicionar" />
                            </div>
                            </form>  
                         </div>
                 </div>
         </section>

         <section>
            <div id="titulo">
                <h2><strong>Testes Online Disponíveis</strong></h2>
            </div>

            <div class="row">
            <div class="col-8">
                <table id="tabelaTesteOnline" class="table table-striped">
                <tr>
                    <th>ID do Teste Online</th>
                    <th>Nome do Teste Online</th>
                    <th>Quantidade de Questões</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>

                <?php foreach($arrayTestesOnline as $reg): ?>

                    <tr>
                    <td><?= $reg->getIdTesteOnline(); ?></td>
                    <td><?= $reg->getNomeTesteOnline(); ?></td>
                    <td><?= $reg->getQuantidadeQuestoes(); ?></td>
                    <td><button class="btnExcluir btn btn-primary" type="button" value="<?= $reg->getIdTesteOnline(); ?>">Excluir</button></td>
                    <td> <a class="btn btn-primary" href="testeOnline_questao_listar.php?idTesteOnline=<?= $reg->getIdTesteOnline(); ?>&nomeTesteOnline=<?= $reg->getNomeTesteOnline(); ?>">Visualizar Questões</a> </td>
                    </tr>

                <?php endforeach; ?>
                </table>
            </div>
            </div>
        </section>
     </div>

				<!-- inner -->
			<!-- main -->
		<!-- wrapper -->
	<!-- body -->
<!-- html-->
<?php include 'footer.php'; ?>