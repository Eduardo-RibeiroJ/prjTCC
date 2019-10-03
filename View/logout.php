<?php
session_start();

echo $_SESSION['nomeCandidato'];
echo $_SESSION['cpf'];
echo $_SESSION['logado'];
/*session_start();
session_destroy();
echo "<script>location.href='login.php'</script>";*/
?>
