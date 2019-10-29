<?php

include_once "../Model/Conexao.php";

class CargoDAO
{    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(Cargo $cargo) 
    {
        $idCargo = $cargo->getIdCargo();
        $nomeCargo = $cargo->getNomeCargo();

        $query = "INSERT INTO tbCargo (idCargo, nomeCargo) VALUES (?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'is', $idCargo, $nomeCargo);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Listar(Cargo $cargo) {
        
        if ($cargo->getIdCargo() == NULL) {

            $query = $this->db->getConection()->query("SELECT * FROM tbCargo WHERE idCargo ='".$cargo->getIdCargo()."' ORDER BY idCargo;");
            $arrayQuery = array();

            while($reg = $query->fetch_array()) {

                $cargo = new Questao();
                $cargo->inserirQuestao(
                    
                    $reg['idCargo'],
                    $reg['idQuestao']
                );

                $arrayQuery[] = $cargo;
            }

            return $arrayQuery;

        } else {

            $query = $this->db->getConection()->query("SELECT * FROM tbCargo WHERE idCargo ='".$cargo->getIdCargo()."'");

            $reg = $query->fetch_array();
            $cargo->inserirCargo(
                    $reg['idCargo'],
                    $reg['nomeCargo']
            );
        }
    }

    public function Registro(Cargo $cargo) {

        $db = new Conexao();

        if($cargo->getNomeCargo() != NULL) {

            $query = $db->getConection()->query("SELECT * FROM tbCargo WHERE nomeCargo ='".$cargo->getNomeCargo()."';");
            $linha = $query->fetch_array();

            if($linha) {
                return $linha["idCargo"];
            }
            else {
                $dados = $db->getConection()->query("SELECT MAX(idCargo) as idCargo FROM tbCargo;");
                $linha = $dados->fetch_array();
                $idCargo = intval($linha["idCargo"]) + 1;

                $cargoDAO = new CargoDAO($db);

                $cargo->setIdCargo($idCargo);
                $cargoDAO->Inserir($cargo);

                return intval($linha["idCargo"]) + 1;
            }
        }
    }
}

?>
