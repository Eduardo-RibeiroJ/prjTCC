<?php

include_once "../Model/Conexao.php";

class CargoDAO
{    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(Questao $cargo) 
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

    public function Alterar(Questao $cargo)
    { 
        $idCargo = $cargo->getIdCargo();
        $nomeCargo = $cargo->getNomeCargo();

        $query = "UPDATE tbCargo SET nomeCargo=? WHERE idCargo = ?;";
 
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        } 
        
        mysqli_stmt_bind_param($stmt, 'si',$nomeCargo, $idCargo);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Apagar(Questao $cargo) {

        $idCargo = $cargo->getIdTesteOnline();
        $idQuestao = $cargo->getIdQuestao();

        $SQL = $this->db->getConection()->prepare("DELETE FROM tbCargo WHERE idCargo = ?;");

        $SQL->bind_param("ii", $idCargo, $idQuestao);
        $SQL->execute();
   
        return true;
    }

    public function Listar(Questao $cargo) {
        
        if ($cargo->getIdQuestao() == NULL) {

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
            $cargo->inserirQuestao(
                    
                    $reg['idCargo'],
                    $reg['idQuestao']
            );
        }
    }
}

?>
