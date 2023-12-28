<?php

    abstract class conexao
    {
        protected $db;
        public function __construct()
        {
        	$parametros = "mysql:host=localhost;dbname=game;charset=utf8mb4";
       		 try
				{       
            		$this->db = new PDO($parametros, "root", "");
				}

        		catch(PDOException $e)
       				{
            			return "Problema ao abrir a conexão com o BD";
        			}
		}
    }//fim classe

?>