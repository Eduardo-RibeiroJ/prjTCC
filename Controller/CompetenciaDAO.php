<?php

include_once "../Model/Conexao.php";

class CompetenciaDAO
{    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(Competencia $competencia)
    {
        $idCompetencia = $competencia->getIdComp();
        $nomeCompetencia = $competencia->getNomeComp();

        $query = "INSERT INTO tbCompetencia (idCompetencia, nomeComp) VALUES (?,?);";
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'is', $idCompetencia, $nomeCompetencia);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    public function Registro(Competencia $competencia) {

        $db = new Conexao();

        if($competencia->getNomeComp() != NULL) {

            $query = $db->getConection()->query("SELECT * FROM tbCompetencia WHERE nomeComp ='".$competencia->getNomeComp()."';");
            $linha = $query->fetch_array();

            if($linha) {
                return $linha["idCompetencia"];
            }
            else {
                $dados = $db->getConection()->query("SELECT MAX(idCompetencia) as idCompetencia FROM tbCompetencia;");
                $linha = $dados->fetch_array();
                $idCompetencia = intval($linha["idCompetencia"]) + 1;

                $competenciaDAO = new CompetenciaDAO($db);

                $competencia->setIdComp($idCompetencia);
                $competenciaDAO->Inserir($competencia);

                return intval($linha["idCompetencia"]) + 1;
            }
        }
        
        // if ($competencia->getIdCompetencia() == NULL) {

        //     $query = $this->db->getConection()->query("SELECT * FROM tbCompetencia WHERE idCompetencia ='".$competencia->getIdCompetencia()."' ORDER BY idCompetencia;");
        //     $arrayQuery = array();

        //     while($reg = $query->fetch_array()) {

        //         $competencia = new Competencia();
        //         $competencia->inserirCompetencia(
                    
        //             $reg['idCompetencia'],
        //             $reg['idCompetencia']
        //         );

        //         $arrayQuery[] = $competencia;
        //     }

        //     return $arrayQuery;

        // } else {

        //     $query = $this->db->getConection()->query("SELECT * FROM tbCompetencia WHERE idCompetencia ='".$competencia->getIdCompetencia()."'");

        //     $reg = $query->fetch_array();
        //     $competencia->inserirCompetencia(
                    
        //             $reg['idCompetencia'],
        //             $reg['idCompetencia']
        //     );
        // }
    }

    public function Listar(Competencia $competencia) {
        
        if ($competencia->getIdComp() == NULL) {

            // $query = $this->db->getConection()->query("SELECT * FROM tbProcessoSeletivo WHERE idProcesso ='".$processo->getIdProcesso()."' ORDER BY dataInicio asc;");
            // $arrayQuery = array();

            // while($reg = $query->fetch_array()) {

            //     $processo = new ProcessoSeletivo();
            //     $processo->inserirProcessoSeletivo(
                    
            //         $reg['idProcesso'],
            //         $reg['cnpj'],
            //         $reg['idCargo'],
            //         $reg['dataInicio'],
            //         $reg['dataLimiteCandidatar'],
            //         $reg['resumoVaga'],
            //         $reg['nivelCargo'],
            //         $reg['tipoContratacao'],
            //         $reg['salario']

            //     );

            //     $arrayQuery[] = $processo;
            // }

            // return $arrayQuery;

        } else {

            $query = $this->db->getConection()->query("SELECT * FROM tbCompetencia WHERE idCompetencia ='".$competencia->getIdComp()."';");

            $reg = $query->fetch_array();
            $competencia->inserirCompetencia(
                    $reg['idCompetencia'],
                    $reg['nomeComp']
            );

            return $competencia;
        }
    }
}

?>
