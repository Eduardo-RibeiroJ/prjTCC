<?php

include_once "../Model/Conexao.php";

class CandidatoCursoDAO
{    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(CandidatoCurso $curso) 
    {
        $cpf = $curso->getCpf();
        $idCurso = $curso->getIdCurso();
        $nomeCurso = $curso->getNomeCurso();
        $nomeInstituicao = $curso->getNomeInstituicao();
        $anoConclusao = $curso->getAnoConclusao();
        $cargaHoraria = $curso->getCargaHoraria();

        $query = "INSERT INTO tbCandidatocurso (cpf, idCurso, nomeCurso, nomeInstituicao, anoConclusao, cargaHoraria) VALUES (?,?,?,?,?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'iisssi', $cpf, $idCurso, $nomeCurso, $nomeInstituicao, $anoConclusao, $cargaHoraria);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Alterar(CandidatoCurso $curso)    { 
        $cpf = $curso->getCpf();
        $idCurso = $curso->getIdCurso();
        $nomeCurso = $curso->getNomeCurso();
        $nomeInstituicao = $curso->getNomeInstituicao();
        $anoConclusao = $curso->getAnoConclusao();
        $cargaHoraria = $curso->getCargaHoraria();

        $query = "UPDATE tbCandidatocurso SET nomeCurso=?, nomeInstituicao=?, anoConclusao=?, cargaHoraria=? WHERE cpf = ? AND idCurso = ?;";
 
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        } 
        
        mysqli_stmt_bind_param($stmt, 'sssssi', $nomeCurso, $nomeInstituicao, $anoConclusao, $cargaHoraria, $cpf, $idCurso);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function Apagar(CandidatoCurso $curso) {

        $cpf = $curso->getCpf();
        $idCurso = $curso->getIdCurso();

        $SQL = $this->db->getConection()->prepare("DELETE FROM tbCandidatoCurso WHERE idCurso = ? AND cpf = ?;");

        $SQL->bind_param("ii", $idCurso, $cpf);
        $SQL->execute();
   
        return true;
    }

    public function Listar(CandidatoCurso $curso) {
        
        if ($curso->getIdCurso() == NULL) {

            $query = $this->db->getConection()->query("SELECT * FROM tbCandidatoCurso WHERE cpf ='".$curso->getCpf()."' ORDER BY anoConclusao desc;");
            $arrayQuery = array();

            while($reg = $query->fetch_array()) {

                $curso = new CandidatoCurso();
                $curso->inserirCurso(
                    
                    $reg['cpf'],
                    $reg['idCurso'],
                    $reg['nomeCurso'],
                    $reg['nomeInstituicao'],
                    $reg['anoConclusao'],
                    $reg['cargaHoraria']
                );

                $arrayQuery[] = $curso;
            }

            return $arrayQuery;

        } else {

            $query = $this->db->getConection()->query("SELECT * FROM tbCandidatoCurso WHERE idCurso ='".$curso->getIdCurso()."' AND idCurso ='".$curso->getIdCurso()."';");

            $reg = $query->fetch_array();
            $curso->inserirCurso(
                    
                    $reg['cpf'],
                    $reg['idCurso'],
                    $reg['nomeCurso'],
                    $reg['nomeInstituicao'],
                    $reg['anoConclusao'],
                    $reg['cargaHoraria']
            );

            return $curso;
        }
    }

        public function UltimoRegistroCurso(CandidatoCurso $curso) 
    {
        $db = new Conexao();
        $dados = mysqli_query($db->getConection(), "SELECT MAX(idCurso) as idCurso FROM tbCandidatoCurso WHERE cpf = '".$curso->getIdCurso()."';");

        $linha = $dados->fetch_array(MYSQLI_ASSOC);
        return $linha["idCurso"];
    }

}

?>
