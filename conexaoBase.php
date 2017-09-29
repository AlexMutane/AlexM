<?php
class conexao
{
	private $servidor = "localhost";
	private $usuario = "root";
	private $senha = "";
	private $banco = "graficos";
	protected $pdo = null;

	public function __construct(){
		try{
			$this->pdo = new PDO("mysql:host={$this->servidor}; dbname={$this->banco}", $this->usuario, $this->senha);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		}catch(PDOException $e){
			$e->Message();
		}
	}
	
	public function fechaConexao(){
		$this->pdo = null;
	}
}
$foo = new conexao;
?>