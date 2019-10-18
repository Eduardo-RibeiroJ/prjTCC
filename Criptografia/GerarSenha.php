<?php 
include "Bcrypt.php";

$senha_login = "123456";
$senha       = "123456";

echo $senha;

echo '<hr>';

echo md5($senha);

echo '<hr>';
echo Bcrypt::hash($senha);

$senha_banco =  Bcrypt::hash($senha); 

echo '<hr>';

if(Bcrypt::check($senha_login, $senha_banco)){

	echo  'correta';

}else{

	echo  'errada';
}
 
