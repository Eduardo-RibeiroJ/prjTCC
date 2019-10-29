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
        $tipoContratacao = $processo->getTipoContratacao();
        $salario = $processo->getSalario();

        $query = "INSERT INTO tbProcessoSeletivo (idProcesso, cnpj, idCargo, dataInicio, dataLimiteCandidatar, resumoVaga, tipoContratacao, salario) VALUES (?,?,?,?,?,?,?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'isissssi', $idProcesso, $cnpj, $idCargo, $dataInicio, $dataLimite, $resumoVaga, $tipoContratacao, $salario);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Alterar(ProcessoSeletivo $processo)    { 
        $idProcesso = $processo->getIdProcesso();
        $idCargo = $processo->getIdCargo();
        $dataInicio = $processo->getDataInicio();
        $dataLimite = $processo->getDataLimiteCandidatar();
        $resumoVaga = $processo->getResumoVaga();
        $tipoContratacao = $processo->getTipoContratacao();
        $salario = $processo->getSalario();

        $query = "UPDATE tbProcessoSeletivo SET idCargo=?, dataInicio=?, dataLimite=?, resumoVaga=?, tipoContratacao=?, salario=? WHERE idProcesso = ?;";
 
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        } 
        
        mysqli_stmt_bind_param($stmt, 'issssii', $idCargo, $dataInicio, $dataLimite, $resumoVaga, $tipoContratacao, $salario, $idProcesso);
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

        $conn = new Conexao();
        
        if ($processo->getIdProcesso() == NULL) {

            $query = $this->db->getConection()->query("SELECT * FROM tbProcessoSeletivo WHERE idProcesso ='".$processo->getIdProcesso()."' ORDER BY dataInicio asc;");
            $arrayQuery = array();

            while($reg = $query->fetch_array()) {

                $processo = new ProcessoSeletivo();
                $cargo = new Cargo();
                $cargoDAO = new CargoDAO($conn);

                $cargo->setIdCargo($reg['idCargo']);
                $cargoDAO->Listar($cargo);

                $processo->inserirProcessoSeletivo(
                    $reg['idProcesso'],
                    $reg['cnpj'],
                    $reg['idCargo'],
                    $reg['dataInicio'],
                    $reg['dataLimiteCandidatar'],
                    $reg['resumoVaga'],
                    $reg['tipoContratacao'],
                    $reg['salario']
                );
                $processo->setCargo($cargo);

                $arrayQuery[] = $processo;
            }

            return $arrayQuery;

        } else {

            $query = $this->db->getConection()->query("SELECT * FROM tbProcessoSeletivo WHERE idProcesso ='".$processo->getIdProcesso()."';");

            $reg = $query->fetch_array();

            $cargo = new Cargo();
            $cargoDAO = new CargoDAO($conn);

            $cargo->setIdCargo($reg['idCargo']);
            $cargoDAO->Listar($cargo);

            $processo->inserirProcessoSeletivo(
                    
                    $reg['idProcesso'],
                    $reg['cnpj'],
                    $reg['idCargo'],
                    $reg['dataInicio'],
                    $reg['dataLimiteCandidatar'],
                    $reg['resumoVaga'],
                    $reg['tipoContratacao'],
                    $reg['salario']
            );
            $processo->setCargo($cargo);

            return $processo;
        }
    }

    public function UltimoRegistroProcesso(ProcessoSeletivo $processo) {

        $db = new Conexao();
        $dados = mysqli_query($db->getConection(), "SELECT MAX(idProcesso) as idProcesso FROM tbProcessoSeletivo;");

        $linha = $dados->fetch_array(MYSQLI_ASSOC);
        return $linha["idProcesso"];
    }
}

?>
