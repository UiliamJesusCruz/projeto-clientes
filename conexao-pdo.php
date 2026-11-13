<?php

require_once __DIR__ . '/Conexao.php';

$config = require __DIR__ . '/config.local.php';

$conexao = new Conexao();

$rpdo = $conexao->conectar(
    $config['host'],
    $config['dbname'],
    $config['username'],
    $config['password']
);


?>