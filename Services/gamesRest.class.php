<?php
 require_once "../models/conexao.class.php";
 require_once "../models/games.class.php";
 require_once "../models/gamesDAO.class.php";
 require_once "../models/console.class.php";
 require_once "../models/consoleDAO.class.php";

    class gamesRest
    {
        public function buscar_games_console($console)
		{
				$games= new games(console:$console);
				$gamesDAO = new gamesDAO($games);
				$retorno = $gamesDAO->buscar_games_por_console($games);
				return json_encode($retorno);
				//var_dump($retorno);
		}//fim buscar games console
        
       public function cadastrar_games($nome, $console)
        {
            $games = new games(nome:$nome, console:$console);
            $gamesDAO =new GamesDAO($games);
            $retorno = $gamesDAO->inserir_games($games);
            return json_encode($retorno);
        }// fim cadastrar games
        
    }// fim class

    $obj = new gamesRest;
    if($_GET)
        {
            if(isset($_GET["oper"]))
            {
                $metodo = $_GET["oper"];
            }
            if($metodo =="cadastrar_games")
            {
                $ret = $obj->$metodo($_GET["nome"], array($_GET["console"])); 
            }
        }// fim get
 
   if($_POST)
    {
        if(isset($_POST["oper"]))
        {
            $metodo = $_POST["oper"];
        }
        if($metodo =="buscar_games_console")
        {
            $ret = $obj->$metodo(array($_POST["console"])); 
            //var_dump($ret);
        }
        
    }// fim post
   
        exit($ret);
?>