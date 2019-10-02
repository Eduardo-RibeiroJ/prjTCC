<?php

include_once "../Model/Conexao.php";
include_once "../Model/Candidato.php";
include_once "../Controller/CandidatoDAO.php";

if (isset($_POST['btnCadastrar'])) {

	if($_POST['txtSenha'] != $_POST['txtRepetirSenha']) {
		echo "<script>window.alert('As senhas não conferem!'); history.go(-1); </script>";
		die;
    }
    
	$conn = new Conexao();
    $candidato = new Candidato();
    $candidatoDAO = new CandidatoDAO($conn);

	$candidato->inserirUsuarioCandidato(
		$_POST['txtCpf'],
		$_POST['txtEmail'],
		$_POST['txtSenha']
	);

	$candidatoDAO->Inserir($candidato);
	echo "<script> window.location.replace('candidato_inserir.php'); </script>";
	
}

?>
  
  <?php include_once 'header.php'; ?>

            <header class="masthead text-white text-center" id="home">
               <div class="container">
                   <div class="row">
                
                        <form action="candidato_cadastrar.php" method="post">

                            <div class=form-row>
                                <div class="form-group col">
                                    <h2 class="display-3">Faça seu cadastro</h2>
                                </div>
                            </div>

                            <div class=form-row>
                                <div class="form-group col">
                                    <input type="text" id="txtCpf" name="txtCpf" class="form-control" placeholder="Insira seu CPF.." autofocus="" required>
                                </div>
                            </div>

                            <div class=form-row>
                                <div class="form-group col">
                                    <input type="email" id="txtEmail" name="txtEmail" class="form-control" placeholder="Insira seu e-mail..." required>
                                </div>
                            </div>

                            <div class=form-row>
                                <div class="form-group col">
                                    <input type="password" id="txtSenha" name="txtSenha" class="form-control" placeholder="Insira uma senha..." required>
                                </div>
                            </div>

                            <div class=form-row>
                                <div class="form-group col">
                                    <input type="password" id="txtRepetirSenha" name="txtRepetirSenha" class="form-control" placeholder="Repita a senha..." required>
                                </div>
                            </div>

                            <div class=form-row>
                                <div class="form-group col">
                                    <input type="submit" id="btnCadastrar" name="btnCadastrar" class="btn btn-warning btn-lg" value="Cadastrar!">
                                </div>
                            </div>

                        </form>         
                      
                   </div>
               </div>
          </header>
  
<?php include 'footer.php'; ?>
