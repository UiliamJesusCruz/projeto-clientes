<?php

/*
Atenção: utilize isso apenas no ambiente de desenvolvimento. Não deixe a exibição de erros habilitada em um site público, pois ela pode revelar informações internas.
*/

ini_set('display_errors', '0');
error_reporting(E_ALL);

?>
<?php session_start(); ?>
<?php


if(isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === true){

	echo 'Logado como: ' . $_SESSION['usuario_id'];
	echo '<hr>';
	echo 'Bem-vindo à área de clientes.';

}else{

	http_response_code(403);
	echo 'Acesso negado';

}


?>
<?php require_once __DIR__ . '/menu.php'; ?>
