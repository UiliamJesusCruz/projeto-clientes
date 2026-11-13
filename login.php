<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Projeto Clientes</title>
</head>
<body>

    <h1>Área de Login</h1>

    <form action="login-pdo.php" method="POST">

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

        <br><br>

        <button type="submit">Entrar</button>

    </form>

<?php require_once __DIR__ . '/menu.php'; ?>

</body>
</html>