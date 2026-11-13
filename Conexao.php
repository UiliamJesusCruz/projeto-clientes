<?php

// Dia 10 - Class de Conexao

class Conexao{

	private string $host;
	private string $banco;
	private string $usuario;
	private string $senha;

	public function conectar($phost,$pbanco,$pusuario,$psenha){

		$this->host = $phost;
		$this->banco = $pbanco;
		$this->usuario = $pusuario;
		$this->senha = $psenha;

		try{

		$pdo = new PDO(
			"mysql:host=$this->host;dbname=$this->banco;charset=utf8mb4",
			$this->usuario,
			$this->senha
		);

		$pdo->setAttribute(

			PDO::ATTR_ERRMODE,
			PDO::ERRMODE_EXCEPTION

		);

			//echo "Conexão realizada com sucesso.";

			return $pdo;

		}catch (PDOException $e) {

    			throw new RuntimeException(
		        	"Falha ao conectar ao banco de dados",
        			0,
        			$e
    			);
}


	}

}


?>