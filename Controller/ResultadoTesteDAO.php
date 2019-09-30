<?php

include_once "../Model/Conexao.php";

class ResultadoTesteDAO
{    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(ResultadoTeste $resultado) 
    {
        $idProcesso = $resultado->getIdProcesso();
        $cpf = $resultado->getCpf();
        $idTesteOnline = $resultado->getIdTesteOnline();
        $resultado = $resultado->getResultado();

        $query = "INSERT INTO tbprocessocandteste (idProcesso, cpf, idTesteOnline, resultado) VALUES (?,?,?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'iiii', $idProcesso, $cpf, $idTesteOnline, $resultado);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Listar(ResultadoTeste $resultado) {
        
        if ($resultado->getIdFormacao() == NULL) {

            $query = $this->db->getConection()->query("SELECT * FROM tbprocessocandteste WHERE cpf ='".$resultado->getCpf()."' AND idProcesso ='".$resultado->getIdProcesso()."' AND idTesteOnline ='".$resultado->getIdTesteOnline()."' ORDER BY dataTermino desc;");
            $arrayQuery = array();

            while($reg = $query->fetch_array()) {

                $resultado = new ResultadoTeste();
                $resultado->inserirResultado(
                    
                    $reg['cpf'],
                    $reg['idProcesso'],
                    $reg['idTesteOnline'],
                    $reg['resultado'],

                );

                $arrayQuery[] = $resultado;
            }

            return $arrayQuery;

        } else {

            $query = $this->db->getConection()->query("SELECT * FROM tbprocessocandteste WHERE cpf ='".$resultado->getCpf()."' AND idProcesso ='".$resultado->getIdProcesso()."' AND idTesteOnline ='".$resultado->getIdTesteOnline()."';");

            $reg = $query->fetch_array();
            $resultado->inserirResultado(
                    
                    $reg['cpf'],
                    $reg['idProcesso'],
                    $reg['idTesteOnline'],
                    $reg['resultado'],
            );
            return $resultado;
        }
    }
}

?>
