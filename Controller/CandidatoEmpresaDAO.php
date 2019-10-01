<?php

include_once "../Model/Conexao.php";

class CandidatoEmpresaDAO
{    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(CandidatoEmpresa $empresa) 
    {
        $cpf = $empresa->getCpf();
        $idEmpresa = $empresa->getIdEmpresa();
        $nomeEmpresa = $empresa->getNomeEmpresa();
        $cargo = $empresa->getCargo();
        $dataInicio = $empresa->getDataInicio();
        $dataSaida = $empresa->getDataSaida();
        $atividades = $empresa->getAtividades();

        $query = "INSERT INTO tbCandidatoEmpresa (cpf, idEmpresa, nomeEmpresa, cargo, dataInicio, dataSaida, atividades) VALUES (?,?,?,?,?,?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'iisssss', $cpf, $idEmpresa, $nomeEmpresa, $cargo, $dataInicio, $dataSaida, $atividades);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Alterar(CandidatoEmpresa $empresa)    { 
        $cpf = $empresa->getCpf();
        $idEmpresa = $empresa->getIdEmpresa();
        $nomeEmpresa = $empresa->getNomeEmpresa();
        $cargo = $empresa->getCargo();
        $dataInicio = $empresa->getDataInicio();
        $dataSaida = $empresa->getDataSaida();
        $atividades = $empresa->getAtividades();

        $query = "UPDATE tbCandidatoEmpresa SET nomeEmpresa=?, cargo=?, dataInicio=?, dataSaida=?, atividades=? WHERE cpf = ? AND idEmpresa = ?;";
 
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        } 
        
        mysqli_stmt_bind_param($stmt, 'sssssii', $nomeEmpresa, $cargo, $dataInicio, $dataSaida, $atividades, $cpf, $idEmpresa);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Apagar(CandidatoEmpresa $empresa) {

        $cpf = $empresa->getCpf();
        $idEmpresa = $empresa->getidEmpresa();

        $SQL = $this->db->getConection()->prepare("DELETE FROM tbCandidatoEmpresa WHERE idEmpresa = ? AND cpf = ?;");

        $SQL->bind_param("ii", $idEmpresa, $cpf);
        $SQL->execute();

        return true;
    }

    public function Listar(CandidatoEmpresa $empresa) {
        
        if ($empresa->getIdEmpresa() == NULL) {

            $query = $this->db->getConection()->query("SELECT * FROM tbCandidatoEmpresa WHERE idEmpresa ='".$empresa->getIdEmpresa()."' ORDER BY dataSaida desc;");
            $arrayQuery = array();

            while($reg = $query->fetch_array()) {

                $empresa = new Empresa();
                $empresa->inserirEmpresa(
                    
                    $reg['cpf'],
                    $reg['idEmpresa'],
                    $reg['nomeEmpresa'],
                    $reg['cargo'],
                    $reg['dataInicio'],
                    $reg['dataSaida'],
                    $reg['atividades'],
                );

                $arrayQuery[] = $empresa;
            }

            return $arrayQuery;

        } else {

            $query = $this->db->getConection()->query("SELECT * FROM tbCandidatoEmpresa WHERE idEmpresa ='".$empresa->getidEmpresa()."' AND idEmpresa ='".$empresa->getidEmpresa()."';");

            $reg = $query->fetch_array();
            $empresa->inserirEmpresa(
                    
                    $reg['cpf'],
                    $reg['idEmpresa'],
                    $reg['nomeEmpresa'],
                    $reg['cargo'],
                    $reg['dataInicio'],
                    $reg['dataSaida'],
                    $reg['atividades'],
            );
            return $empresa;
        }
    }

        public function UltimoRegistroEmpresa(CandidatoEmpresa $empresa) 
    {
        $db = new Conexao();
        $dados = mysqli_query($db->getConection(), "SELECT MAX(idEmpresa) as idEmpresa FROM tbCandidatoEmpresa WHERE cpf = '".$empresa->getCpf()."';");

        $linha = $dados->fetch_array(MYSQLI_ASSOC);
        return $linha["idEmpresa"];
    }

}

?>
