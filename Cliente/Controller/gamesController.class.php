<?php

    class gamesController
    {
        public function cadastrar()
        {
            if($_POST)
            {
            $dados = array("oper"=>"inserir_games",
			 "nome"=>$_POST["nome"],
			 "console_idconsole"=>$_POST["console_idconsole"]);
			
			//iniciar
			$curl = curl_init("http://localhost/games/services/gamesRest.class.php");
			
			//sets
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $dados);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			
			$retorno = curl_exec($curl);
			
			curl_close($curl);
			
			$retorno = json_decode($retorno);
            echo $retorno;

            header("location:index.php?controle=gamesController&metodo=listar");
            }

            require_once "views/cadastrar_games.php";
        }

        public function listar()
        {
            $retorno = file_get_contents("http://localhost/games/services/gamesSoap.class.php?wsdl=buscar_game");
			
			$retorno = json_decode($retorno);
			var_dump($retorno);
            require_once "views/listar_games.php";
        }

        public function listar_games_console()
        {
            if($_POST)
			{
				$client = new soapClient("http://localhost/games/services/gamesSoap.class.php?wsdl");
				
				$aut_parm = new stdClass();
				$aut_parm->username = "Melissa";
				$aut_parm->password = "mell";
				
				$header_parm = new soapVar($aut_parm, SOAP_ENC_OBJECT);
				
						//new soapHeader(namespace, metodo da seguranca, header_parm, false);
				$header = new soapHeader("games", "security", $header_parm, false);
				
				$client->__setSoapHeaders(array($header));
				
				$retorno = $client->buscar_games_console($_POST["console"]);
				$retorno = json_decode($retorno);
				require_once "views/listar_games.php";
			}//fim do post
			
            $retorno = file_get_contents("http://localhost/games/services/gamesRest.class.php?oper=buscar_consoles");
			$retorno = json_decode($retorno);
			
			require_once "views/listar_consoles.php";
        }
    }

?>