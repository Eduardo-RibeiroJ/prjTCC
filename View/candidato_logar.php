<?php

include_once "../Model/Conexao.php";
include_once "../Model/Candidato.php";
include_once "../Controller/CandidatoDAO.php";

?>
  
  <?php include_once 'header.php'; ?>

            <header class="masthead text-white text-center" id="home">
               <div class="container">
                   <div class="row">
                
                        <form action="candidato.php" method="post">

                            <div class=form-row>
                                <div class="form-group col">
                                    <h2 class="display-3">Entre com sua conta!</h2>
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
                                    <input type="submit" id="btnEntrar" name="btnEntrar" class="btn btn-warning btn-lg" value="Entrar">
                                </div>
                            </div>

                        </form>         
                      
                   </div>
               </div>
          </header>
  
<?php include 'footer.php'; ?>
