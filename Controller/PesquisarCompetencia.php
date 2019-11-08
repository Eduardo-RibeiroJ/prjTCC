<?php

include_once "../Model/Conexao.php";

$db = new Conexao();

  if(isset($_POST['palavra'])) {
    
    $palavra = $_POST['palavra'];
    $output = '';

    $query = "SELECT nomeComp from tbCompetencia WHERE nomeComp LIKE '%".$palavra."%' LIMIT 5;";
    $result = $db->getConection()->query($query);

    if(mysqli_num_rows($result) > 0) {
      $output = '<ul class="lista-pesquisa list-unstyled">';
      while($row = mysqli_fetch_array($result)) {
        $output .= '<li>'.$row['nomeComp'].'</li>';
      }
      $output .='</ul>';
    }
  }

  echo $output;  

?>
