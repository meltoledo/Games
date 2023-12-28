<?php
	require_once "../models/conexao.class.php";
	require_once "../models/consoleDAO.class.php";
    require_once "../models/console.class.php";
	require_once "../models/gamesDAO.class.php";	
	require_once "../models/games.class.php";
	
	// usar quando nao tem arquivo wsdl
	//$opcao = array("uri"=>"http://localhost");
	//$server = new soapServer(null, $opcao);
	
	// usar quando  tem arquivo wsdl

	$server = new SoapServer("games.wsdl");

	class gamesSoap
	{
		private $autenticado = false;

		public function security($header)
		{
			if(isset($header->username)&& isset($header->password))
			{
				if($header->username == "Melissa" && $header->password == "123")
				{
					$this->autenticado = true;
				}
			}
		}
		public function buscar_console()
        {
            if($this->autenticado)
            {
                $consoleDAO = new consoleDAO();
                $retorno = $consoleDAO->buscar_todos_consoles();
                return json_encode($retorno);
            }
            else
            {
                return json_encode("Problema de autenticação");
            }
        }// fim buscar remedios

		public function buscar_game($games)
		{
				$games= new games(nome:$nome, console:array($console));
				$gamesDAO = new gamesDAO($games);
				$retorno = $gamesDAO->buscar_todos_games($games);
				return json_encode($retorno);
				//var_dump($retorno);
		}//fim buscar games console
		
	}//fim da classe
	
	// o soap nao vai funcionar sem esses dois codigos 
	$server->setObject(new gamesSoap());
	$server->handle();
	//$obj = new editoraSoap();
	//$ret= $obj->buscar_catalogo();
	//var_dump($ret);
?>