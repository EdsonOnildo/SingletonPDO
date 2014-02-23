<?php

# Classe responsável por todas as ligações com o Banco de Dados
class Banco {

	// Propriedades
	
	# Credenciais para conecxao com o Banco de Dados
	private $hostname = HOST;
	private $username = USER;
	private $password = PASS;
	private $database = BASE;
	
	# Tipo de Banco de Dados
	private $drive = DRIVE;
	
	# Armazena a conecxao com o Banco de Dados
	private static $conecxao = NULL;
	
	# Armazena a instancia da classe
	private static $instancia = NULL;
	
	# Armazena a ação junto ao Banco de Dados
	private static $dataset = NULL;
	
	// Metodos
	
	## Metodo Singleton para conecxao unica com o Banco de Dados ##
	
	# Metodo Construct onde é realizada a conecxao com o Banco de Dados
	private function __construct() {
		
		# Recupera as credenciais do conecxao		
		$hostname = $this->hostname;
		$username = $this->username;
		$password = $this->password;
		$database = $this->database;
		
		# Recupera o tipo de Banco de Dados a ser utilizado
		$drive = $this->drive;
		
		# Cria o DSN para conecxao
		$dsn = "$drive:host=$hostname;dbname=$database";
		
		try {
			
			# Realiza a conecxao usando a função nativa PDO
			$conecxao = new PDO($dsn, $username, $password);
			$conecxao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			# Passa a conecxao a propriedade "conecxao"
			self::$conecxao = $conecxao;
			
			# Se realizar a conecxao, exibe a mensagem
			echo "Conecxao realizada com sucesso";
			
		} catch (PDOException $e) {
			
			# Exibe erro em caso de falha
			echo "Falha ao conectar-se. <br />" . $e->getMessage();
			
		}
		
	} // __construct
	
	# Metodo utilizado para instanciar a classe
	public static function instancia() {
		
		if (!isset(self::$instancia) && is_null(self::$instancia)) {
			
			# Armazena a propria classe
			$classe = __CLASS__;
			
			# Atribue a propriedade "instancia" a CLASSE
			self::$instancia = new $classe;
			
		}
		
		return self::$instancia;
		
	}
	
	## Fim do Metodo Singleton ##

}