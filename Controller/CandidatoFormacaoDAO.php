<?php

include_once "../Model/Conexao.php";

class CandidatoFormacaoDAO
{    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(CandidatoFormacao $formacao) 
    {
        $cpf = $formacao->getCpf();
        $idFormacao = $formacao->getIdFormacao();
        $nomeCurso = $formacao->getNomeCurso();
        $nomeInstituicao = $formacao->getNomeInstituicao();
        $dataInicio = $formacao->getDataInicio();
        $dataTermino = $formacao->getDataTermino();
        $tipo = $formacao->getTipo();
        $estado = $formacao->getEstado();

        $query = "INSERT INTO tbCandidatoFormacao (cpf, idFormacao, nomeCurso, nomeInstituicao, dataInicio, dataTermino, tipo, estado) VALUES (?,?,?,?,?,?,?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'sissssss', $cpf, $idFormacao, $nomeCurso, $nomeInstituicao, $dataInicio, $dataTermino, $tipo, $estado);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Alterar(CandidatoFormacao $formacao)    { 
        $cpf = $formacao->getCpf();
        $idFormacao = $formacao->getIdFormacao();
        $nomeCurso = $formacao->getNomeCurso();
        $nomeInstituicao = $formacao->getNomeInstituicao();
        $dataInicio = $formacao->getDataInicio();
        $dataTermino = $formacao->getDataTermino();
        $tipo = $formacao->getTipo();
        $estado = $formacao->getEstado();

        if ($tipo == 'Ensino Fundamental')
            $tipo = 'EF';
        else if ($tipo == 'Ensino Médio')
            $tipo = 'EM';
        else if ($tipo == 'Ensino Médio profissionalizante')
            $tipo = 'EMP';
        else if ($tipo == 'Ensino Técnico')
            $tipo = 'ET';
        if ($tipo == 'Graduação - Bacharelado')
            $tipo = 'GRB';
        else if ($tipo == 'Graduação - Tecnólogo')
            $tipo = 'GRT';
        else if ($tipo == 'Graduação - Licenciatura')
            $tipo = 'GRL';
        else if ($tipo == 'Graduação - Especialização')
            $tipo = 'GRE';
        if ($tipo == 'Graduação - MBA')
            $tipo = 'GRMBA';
        else if ($tipo == 'Graduação - Mestrado')
            $tipo = 'GRME';
        else if ($tipo == 'Graduação - Doutorado')
            $tipo = 'GRD';

        if ($estado == 'Interrompido')
            $estado = 'IN';
        else if ($estado == 'Em andamento')
            $estado = 'EA';
        else if ($estado == 'Finalizado')
            $estado = 'FI';


        $query = "UPDATE tbCandidatoFormacao SET nomeCurso=?, nomeInstituicao=?, dataInicio=?, dataTermino=?, tipo=?, estado=? WHERE cpf = ? AND idFormacao = ?;";
 
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        } 
        
        mysqli_stmt_bind_param($stmt, 'sssssssi', $nomeCurso, $nomeInstituicao, $dataInicio, $dataTermino, $tipo, $estado, $cpf, $idFormacao);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Apagar(CandidatoFormacao $formacao) {

        $cpf = $formacao->getCpf();
        $idFormacao = $formacao->getIdFormacao();

        $SQL = $this->db->getConection()->prepare("DELETE FROM tbCandidatoFormacao WHERE CPF = ? AND idFormacao = ?;");

        $SQL->bind_param("si", $cpf, $idFormacao);
        $SQL->execute();
   
        return true;
    }

    public function Listar(CandidatoFormacao $formacao) {
        
        if ($formacao->getIdFormacao() == NULL) {

            $query = $this->db->getConection()->query("SELECT * FROM tbCandidatoFormacao WHERE cpf ='".$formacao->getCpf()."' ORDER BY dataTermino desc;");
            $arrayQuery = array();

            while($reg = $query->fetch_array()) {

                if ($reg['estado'] == 'IN') {
                    $reg['estado'] = 'Interrompido';
                } else if ($reg['estado'] == 'EA') {
                    $reg['estado'] = 'Em andamento';
                } else if ($reg['estado'] == 'FI') {
                    $reg['estado'] = 'Finalizado';
                }

                if ($reg['tipo'] == 'EF') {
                    $reg['tipo'] = 'Ensino Fundamental';
                } else if ($reg['tipo'] == 'EM') {
                    $reg['tipo'] = 'Ensino Médio';
                } else if ($reg['tipo'] == 'EMP') {
                    $reg['tipo'] = 'Ensino Médio profissionalizante';
                } else if ($reg['tipo'] == 'ET') {
                    $reg['tipo'] = 'Ensino Técnico';
                } else if ($reg['tipo'] == 'GRB') {
                    $reg['tipo'] = 'Graduação - Bacharelado';
                } else if ($reg['tipo'] == 'GRT') {
                    $reg['tipo'] = 'Graduação - Tecnólogo';
                } else if ($reg['tipo'] == 'GRL') {
                    $reg['tipo'] = 'Graduação - Licenciatura';
                } else if ($reg['tipo'] == 'GRE') {
                    $reg['tipo'] = 'Graduação - Especialização';
                } else if ($reg['tipo'] == 'GRMBA') {
                    $reg['tipo'] = 'Graduação - MBA';
                } else if ($reg['tipo'] == 'GRME') {
                    $reg['tipo'] = 'Graduação - Mestrado';
                } else if ($reg['tipo'] == 'GRD') {
                    $reg['tipo'] = 'Graduação - Doutorado';
                }  

                $formacao = new CandidatoFormacao();
                $formacao->inserirFormacao(
                    
                    $reg['cpf'],
                    $reg['idFormacao'],
                    $reg['nomeCurso'],
                    $reg['nomeInstituicao'],
                    $reg['dataInicio'],
                    $reg['dataTermino'],
                    $reg['tipo'],
                    $reg['estado']
                );

                $arrayQuery[] = $formacao;
            }

            return $arrayQuery;

        } else {

            $query = $this->db->getConection()->query("SELECT * FROM tbCandidatoFormacao WHERE idFormacao ='".$formacao->getIdFormacao()."' AND idFormacao ='".$formacao->getIdFormacao()."';");

            $reg = $query->fetch_array();
            $formacao->inserirFormacao(
                    
                    $reg['cpf'],
                    $reg['idFormacao'],
                    $reg['nomeCurso'],
                    $reg['nomeInstituicao'],
                    $reg['dataInicio'],
                    $reg['dataTermino'],
                    $reg['tipo'],
                    $reg['estado']
            );
            return $formacao;
        }
    }

        public function UltimoRegistroFormacao(CandidatoFormacao $formacao) 
    {
        $db = new Conexao();
        $dados = mysqli_query($db->getConection(), "SELECT MAX(idFormacao) as idFormacao FROM tbCandidatoFormacao WHERE cpf = '".$formacao->getCpf()."';");

        $linha = $dados->fetch_array(MYSQLI_ASSOC);
        return $linha["idFormacao"];
    }

}
