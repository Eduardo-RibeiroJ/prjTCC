<?php

include_once "../Model/Conexao.php";

class CandidatoObjetivoDAO
{    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(CandidatoObjetivo $objetivo) 
    {
        $cpf = $objetivo->getCpf();
        $idObjetivo = $objetivo->getIdobjetivo();
        $cargo = $objetivo->getCargo();
        $nivel = $objetivo->getNivel();
        $pretSal = $objetivo->getPretSal();


        $query = "INSERT INTO tbCandidatoObjetivo (cpf, idObjetivo, cargo, nivel, pretSal) VALUES (?,?,?,?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'iissi', $cpf, $idobjetivo, $nomeobjetivo, $cargo, $nivel, $pretSal);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Alterar(CandidatoObjetivo $objetivo)    { 
        $cpf = $objetivo->getCpf();
        $idObjetivo = $objetivo->getIdobjetivo();
        $cargo = $objetivo->getCargo();
        $nivel = $objetivo->getNivel();
        $pretSal = $objetivo->getPretSal();

        $query = "UPDATE tbCandidatoObjetivo SET cargo=?, nivel=?, pretSal=? WHERE cpf = ? AND idObjetivo = ?;";
 
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        } 
        
        mysqli_stmt_bind_param($stmt, 'sssii', $cargo, $nivel, $pretSal, $cpf, $idobjetivo);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Apagar(CandidatoObjetivo $objetivo) {

        $idobjetivo = $objetivo->getidobjetivo();

        $SQL = $this->db->getConection()->prepare("DELETE FROM tbCandidatoObjetivo WHERE idObjetivo = ? AND Cpf = ?;");

        $SQL->bind_param("ii", $idObjetivo, $Cpf);
        $SQL->execute();

        return true;
    }

    public function Listar(CandidatoObjetivo $objetivo) {
        
        if ($objetivo->getIdQuestao() == NULL) {

            $query = $this->db->getConection()->query("SELECT * FROM tbCandidatoObjetivo WHERE idObjetivo ='".$objetivo->getIdObjetivo()."' ORDER BY idobjetivo;");
            $arrayQuery = array();

            while($reg = $query->fetch_array()) {

                $objetivo = new objetivo();
                $objetivo->inserirobjetivo(
                    
                    $reg['cpf'],
                    $reg['idobjetivo'],
                    $reg['cargo'],
                    $reg['nivel'],
                    $reg['pretSal']
               );

                $arrayQuery[] = $objetivo;
            }

            return $arrayQuery;

        } else {

            $query = $this->db->getConection()->query("SELECT * FROM tbCandidatoObjetivo WHERE idobjetivo ='".$objetivo->getIdObjetivo()."' AND idCpf ='".$objetivo->getCpf()."';");

            $reg = $query->fetch_array();
            $objetivo->inserirObjetivo(
                    
                    $reg['cpf'],
                    $reg['idobjetivo'],
                    $reg['cargo'],
                    $reg['nivel'],
                    $reg['pretSal']
            );
        }
    }
}

?>
