<?php

include_once "../Model/Conexao.php";

class CandidatoCompetenciaDAO
{    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(CandidatoCompetencia $candCompetencia) 
    {
        $cpf = $candCompetencia->getCpf();
        $idCompetenciaCand = $candCompetencia->getIdCompetencia();
        $competenciaCand = $candCompetencia->getCompetencia();
        $nivel = $candCompetencia->getNivel();

        if($nivel == 'Básico')
            $nivel = 'B';
        else if($nivel == 'Intermediário')
            $nivel = 'I';
        else if($nivel == 'Avançado')
            $nivel = 'A';

        $query = "INSERT INTO tbCandidatoCompetencia (cpf, idCompetencia, competencia, nivel) VALUES (?,?,?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'siss', $cpf, $idCompetenciaCand, $competenciaCand, $nivel);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Alterar(CandidatoCompetencia $candCompetencia) 
    { 
        $cpf = $candCompetencia->getCpf();
        $idCompetenciaCand = $candCompetencia->getIdCompetencia();
        $nivel = $candCompetencia->getNivel();

        if($nivel == 'Básico')
            $nivel = 'B';
        else if($nivel == 'Intermediário')
            $nivel = 'I';
        else if($nivel == 'Avançado')
            $nivel = 'A';

        $query = "UPDATE tbCandidatoCompetencia SET nivel=? WHERE cpf = ? AND idCompetencia = ?;";
 
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        } 
        
        mysqli_stmt_bind_param($stmt, 'ssi', $nivel, $cpf, $idCompetenciaCand);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Apagar(CandidatoCompetencia $candCompetencia) {

        $cpf = $candCompetencia->getCpf();
        $idCompetenciaCand = $candCompetencia->getIdCompetencia();

        $SQL = $this->db->getConection()->prepare("DELETE FROM tbCandidatoCompetencia WHERE idCompetencia = ? AND cpf = ?;");

        $SQL->bind_param("is", $idCompetenciaCand, $cpf);
        $SQL->execute();

        return true;
    }

    public function Listar(CandidatoCompetencia $candCompetencia) {
        
        $query = $this->db->getConection()->query("SELECT * FROM tbCandidatoCompetencia WHERE cpf ='".$candCompetencia->getCpf()."' ORDER BY competencia asc;");
        $arrayQuery = array();

        while($reg = $query->fetch_array()) {

            $candCompetencia = new CandidatoCompetencia();

            if($reg['nivel'] == 'B')
                $reg['nivel'] = 'Básico';
            else if($reg['nivel'] == 'I')
                $reg['nivel'] = 'Intermediário';
            else if($reg['nivel'] == 'A')
                $reg['nivel'] = 'Avançado';
            
            $candCompetencia->InserirCompetencia(         
                $reg['cpf'],
                $reg['idCompetencia'],
                $reg['competencia'],
                $reg['nivel']
            );
            $arrayQuery[] = $candCompetencia;
        }

        return $arrayQuery;

    }


    public function UltimoRegistroComp(CandidatoCompetencia $candCompetencia) {

        $db = new Conexao();
        $dados = mysqli_query($db->getConection(), "SELECT MAX(idCompetencia) as idCompetencia FROM tbCandidatoCompetencia WHERE cpf = '".$candCompetencia->getCpf()."';");

        $linha = $dados->fetch_array(MYSQLI_ASSOC);
        return $linha["idCompetencia"];
    }

}

?>
