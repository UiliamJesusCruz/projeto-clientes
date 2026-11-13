<?php session_start(); ?>
<?php
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
	header('Location: login.php');
	exit;
}
?>
<?php

/*
Atenção: utilize isso apenas no ambiente de desenvolvimento. Não deixe a exibição de erros habilitada em um site público, pois ela pode revelar informações internas.
*/

ini_set('display_errors', '0');
error_reporting(E_ALL);

?>
<?php

// Dados de Entrada

$email = $_POST['email'] ?? '';
$senhaDigitada = $_POST['senha'] ?? '';

// Validar

if (!is_string($email) || !is_string($senhaDigitada)) {
    http_response_code(400);
    exit('Dados inválidos.');
}

$email = trim($email);

if ($email === '' || $senhaDigitada === '') {
    exit('Informe o e-mail e a senha.');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit('Informe um e-mail válido.');
}

// Conectar ao banco

require_once __DIR__ . '/conexao-pdo.php';

// Consultar

$sql = "SELECT id, email, senha FROM usuarios WHERE email = :email";

$stmt = $rpdo->prepare($sql);

$stmt->execute(['email'=>$email]);

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar

if($usuario !== false && password_verify($senhaDigitada, $usuario['senha'])){


	session_regenerate_id(true);

	$_SESSION['usuario_id'] = $usuario['id'];
	$_SESSION['autenticado'] = true;

	echo 'Login Autorizado';
	echo '<br>';
	echo 'Bem-vindo ' . htmlspecialchars($usuario['email'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

}else{

	echo 'Email ou Senha inválida.';

}	

?>

<?php require_once __DIR__ . '/menu.php'; ?>