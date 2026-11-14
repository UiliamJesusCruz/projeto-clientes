<?php

require_once __DIR__ . '/vendor/autoload.php';
use App\Conexao;

$config = require __DIR__ . '/config.local.php';

$conexao = new Conexao();

$rpdo = $conexao->conectar(
    $config['host'],
    $config['dbname'],
    $config['username'],
    $config['password']
);


?>