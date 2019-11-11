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
        $idCargo = $objetivo->getIdCargo();
        $nivel = $objetivo->getNivel();
        $pretSal = $objetivo->getPretSal();

        $query = "INSERT INTO tbCandidatoObjetivo (cpf, idObjetivo, idCargo, nivel, pretSal) VALUES (?,?,?,?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if ($stmt === FALSE) {
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'iiisi', $cpf, $idObjetivo, $idCargo, $nivel, $pretSal);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    public function Alterar(CandidatoObjetivo $objetivo)
    {
        $cpf = $objetivo->getCpf();
        $idObjetivo = $objetivo->getIdobjetivo();
        $idCargo = $objetivo->getIdCargo();
        $nivel = $objetivo->getNivel();
        $pretSal = $objetivo->getPretSal();

        if ($nivel == 'Trainee')
            $nivel = 'T';
        else if ($nivel == 'Estágio')
            $nivel = 'E';
        else if ($nivel == 'Junior')
            $nivel = 'J';
        else if ($nivel == 'Senior')
            $nivel = 'S';
        else if ($nivel == 'Pleno')
            $nivel = 'P';

        $query = "UPDATE tbCandidatoObjetivo SET nivel=?, pretSal=?, idCargo=? WHERE cpf = ? AND idObjetivo = ?;";

        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if ($stmt === FALSE) {
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'ssisi', $nivel, $pretSal, $idCargo, $cpf, $idObjetivo);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    public function Listar(CandidatoObjetivo $objetivo)
    {

        $conn = new Conexao();

        $query = $this->db->getConection()->query("SELECT * FROM tbCandidatoObjetivo WHERE cpf ='" . $objetivo->getCpf() . "';");
        $reg = $query->fetch_array();

        if ($reg['nivel'] == 'T') {
            $reg['nivel'] = 'Trainee';
        } else if ($reg['nivel'] == 'E') {
            $reg['nivel'] = 'Estágio';
        } else if ($reg['nivel'] == 'J') {
            $reg['nivel'] = 'Junior';
        } else if ($reg['nivel'] == 'S') {
            $reg['nivel'] = 'Senior';
        } else if ($reg['nivel'] == 'P') {
            $reg['nivel'] = 'Pleno';
        }

        $cargo = new Cargo();
        $cargoDAO = new CargoDAO($conn);

        $cargo->setIdCargo($reg['idCargo']);
        $cargoDAO->Listar($cargo);

        $objetivo->inserirObjetivo(

            $reg['cpf'],
            $reg['idObjetivo'],
            $reg['idCargo'],
            $reg['nivel'],
            $reg['pretSal']
        );

        $objetivo->setCargo($cargo);
        return $objetivo;
    }
}
