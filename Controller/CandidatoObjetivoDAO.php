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

        mysqli_stmt_bind_param($stmt, 'iissi', $cpf, $idObjetivo, $cargo, $nivel, $pretSal);
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
        
        mysqli_stmt_bind_param($stmt, 'sssii', $cargo, $nivel, $pretSal, $cpf, $idObjetivo);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Listar(CandidatoObjetivo $objetivo) {
        
            $query = $this->db->getConection()->query("SELECT * FROM tbCandidatoObjetivo WHERE cpf ='" . $objetivo->getCpf() . "';");

            $reg = $query->fetch_array();
            $objetivo->inserirObjetivo(
                    
                    $reg['cpf'],
                    $reg['idObjetivo'],
                    $reg['cargo'],
                    $reg['nivel'],
                    $reg['pretSal']
            );
    
    }
}
