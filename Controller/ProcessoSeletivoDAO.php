<?php

include_once "../Model/Conexao.php";

class ProcessoSeletivoDAO
{    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(ProcessoSeletivo $processo) 
    {
        $idProcesso = $processo->getIdProcesso();
        $cnpj = $processo->getCnpj();
        $idCargo = $processo->getIdCargo();
        $dataInicio = $processo->getDataInicio();
        $dataLimite = $processo->getDataLimiteCandidatar();
        $resumoVaga = $processo->getResumoVaga();
        $nivelCargo = $processo->getNivelCargo();
        $tipoContratacao = $processo->getTipoContratacao();
        $salario = $processo->getSalario();

        $query = "INSERT INTO tbProcessoSeletivo (idProcesso, cnpj, idCargo, dataInicio, dataLimiteCandidatar, resumoVaga, nivelCargo, tipoContratacao, salario) VALUES (?,?,?,?,?,?,?,?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'issssssss', $idProcesso, $cnpj, $idCargo, $dataInicio, $dataLimite, $resumoVaga, $nivelCargo, $tipoContratacao, $salario);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Alterar(ProcessoSeletivo $processo)    { 
        $idProcesso = $processo->getIdProcesso();
        $idCargo = $processo->getIdCargo();
        $dataInicio = $processo->getDataInicio();
        $dataLimite = $processo->getDataLimiteCandidatar();
        $resumoVaga = $processo->getResumoVaga();
        $nivelCargo = $processo->getNivelCargo();
        $tipoContratacao = $processo->getTipoContratacao();
        $salario = $processo->getSalario();

        $query = "UPDATE tbProcessoSeletivo SET idCargo=?, dataInicio=?, dataLimite=?, resumoVaga=?, nivelCargo=?, tipoContratacao=?, salario=? WHERE idProcesso = ?;";
 
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        } 
        
        mysqli_stmt_bind_param($stmt, 'sssssssi', $idCargo, $dataInicio, $dataLimite, $resumoVaga, $nivelCargo, $tipoContratacao, $salario, $idProcesso);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Apagar(ProcessoSeletivo $processo) {

        $idProcesso = $processo->getIdProcesso();

        $SQL = $this->db->getConection()->prepare("DELETE FROM tbProcessoSeletivo WHERE idProcesso = ?;");

        $SQL->bind_param("i", $idProcesso);
        $SQL->execute();
   
        return true;
    }

    public function Listar(ProcessoSeletivo $processo) {
        
        if ($processo->getIdProcesso() == NULL) {

            $query = $this->db->getConection()->query("SELECT * FROM tbProcessoSeletivo WHERE idProcesso ='".$processo->getIdProcesso()."' ORDER BY dataInicio asc;");
            $arrayQuery = array();

            while($reg = $query->fetch_array()) {

                $processo = new ProcessoSeletivo();
                $processo->inserirProcessoSeletivo(
                    
                    $reg['idProcesso'],
                    $reg['cnpj'],
                    $reg['idCargo'],
                    $reg['dataInicio'],
                    $reg['dataLimite'],
                    $reg['resumoVaga'],
                    $reg['nivelCargo'],
                    $reg['tipoContratacao'],
                    $reg['salario']

                );

                $arrayQuery[] = $processo;
            }

            return $arrayQuery;

        } else {

            $query = $this->db->getConection()->query("SELECT * FROM tbProcessoSeletivo WHERE idProcesso ='".$processo->getIdProcesso()."' AND idProcesso ='".$processo->getIdProcesso()."';");

            $reg = $query->fetch_array();
            $processo->inserirProcessoSeletivo(
                    
                    $reg['idProcesso'],
                    $reg['cnpj'],
                    $reg['idCargo'],
                    $reg['dataInicio'],
                    $reg['dataLimite'],
                    $reg['resumoVaga'],
                    $reg['nivelCargo'],
                    $reg['tipoContratacao'],
                    $reg['salario']
            );
            return $processo;
        }
    }
}

?>
