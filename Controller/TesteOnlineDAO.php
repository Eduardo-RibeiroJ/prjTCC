<?php

include_once "../Model/Conexao.php";

class TesteOnlineDAO
{
    
    public function __construct(Conexao $db)
    {
        $this->db = $db;
    }

    public function Inserir(TesteOnline $testeOnline) 
    {
        $idTesteOnline = $testeOnline->getIdTesteOnline();
        $nomeTesteOnline = $testeOnline->getNomeTesteOnline();

        $query = "INSERT INTO tbTesteOnline (idTesteOnline, nomeTesteOnline) VALUES (?,?);"; 
        $stmt = mysqli_prepare($this->db->getConection(), $query);

        if($stmt === FALSE){
            die(mysqli_error($this->db->getConection()));
        }

        mysqli_stmt_bind_param($stmt, 'is', $idTesteOnline, $nomeTesteOnline);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }

    public function UltimoRegistro() 
    {
        $db = new Conexao();
        $dados = mysqli_query($db->getConection(), "SELECT MAX(idTesteOnline) as idTesteOnline FROM tbTesteOnline;");
        $linha = $dados->fetch_array(MYSQLI_ASSOC);
        
        return $linha["idTesteOnline"];
    }

}

?>
