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

    public function ListarQuantComp(CandidatoCompetencia $candCompetencia, ProcessoCompetencia $processoCompetencia) {
        
        $query = $this->db->getConection()->query("SELECT cc.cpf, cc.idcompetencia, cc.competencia, cc.nivel as candNivel, pc.nivel as procNivel FROM tbcandidatocompetencia as cc inner join tbprocessocompetencia as pc ON cc.idCompetencia = pc.idCompetencia WHERE cc.idCompetencia = pc.idCompetencia AND cc.cpf = '".$candCompetencia->getCpf()."' AND pc.idProcesso = '".$processoCompetencia->getIdProcesso()."';");
        $contComp = 0;
        $pontosNivel = 0;
        
        while($reg = $query->fetch_array()) {

            if(($reg['procNivel'] == 'B') || ($reg['procNivel'] == 'I' AND $reg['candNivel'] == 'I') || ($reg['candNivel'] == 'A')){

                if($reg['candNivel'] == 'B')
                $pontosNivel += 1;
                else if($reg['candNivel'] == 'I')
                $pontosNivel += 2;
                else if($reg['candNivel'] == 'A')
                $pontosNivel += 3;

                $contComp++;

            }
        }
        
        $arrayQuery = array('quantComp' => $contComp, 'pontosNivel' => $pontosNivel, 'quantCompAbaixo' => mysqli_num_rows($query));
        
        return $arrayQuery;

    }
    
    public function ListarCompProc(CandidatoCompetencia $candCompetencia, ProcessoSeletivo $processo) {
        
        $query = $this->db->getConection()->query("SELECT cc.cpf, cc.idcompetencia, cc.competencia, cc.nivel as candNivel, pc.nivel as procNivel FROM tbcandidatocompetencia as cc inner join tbprocessocompetencia as pc ON cc.idCompetencia = pc.idCompetencia WHERE cc.idCompetencia = pc.idCompetencia AND cc.cpf = '".$candCompetencia->getCpf()."' AND pc.idProcesso = '".$processo->getIdProcesso()."';");
        $arrayQuery = array();
        
        while($reg = $query->fetch_array()) {

            $candCompetencia = new CandidatoCompetencia();

            if(($reg['procNivel'] == 'B') || ($reg['procNivel'] == 'I' AND $reg['candNivel'] == 'I') || ($reg['candNivel'] == 'A')){

                if($reg['procNivel'] == 'B')
                    $reg['procNivel'] = 'Básico';
                else if($reg['procNivel'] == 'I')
                    $reg['procNivel'] = 'Intermediário';
                else if($reg['procNivel'] == 'A')
                    $reg['procNivel'] = 'Avançado';

                $candCompetencia->InserirCompetencia(         
                    $reg['cpf'],
                    $reg['idcompetencia'],
                    $reg['competencia'],
                    $reg['procNivel']
                );
                $arrayQuery[] = $candCompetencia;
            }
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
