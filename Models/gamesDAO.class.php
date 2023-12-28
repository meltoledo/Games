<?php
	class GamesDAO extends conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		 
		public function inserir_games($games)
		{
			$sql = "INSERT INTO game(nome, console_idconsole)VALUES(?,?)";
			
			try
			{
				$stm = $this->db->prepare($sql);
				//substituir os pontos de interrogação
				$stm->bindValue(1, $games->getNome());
				$stm->bindValue(2, $games->getConsole()[0]);
				$stm->execute();
				$this->db = null;

				return "inserido com sucesso";
			}
			catch(PDOException $e)
			{
				$this->db = null;
				return "Problema ao inserir geme";
			}
			
		}// fim inserir


		public function buscar_todos_games($games)
        {
            $sql = "SELECT * FROM game";

            try
            {
                $stm = $this->db->prepare($sql);
                $stm->execute();
                $this->db = null;

                return $stm->fetchAll(PDO::FETCH_OBJ);
            }
            catch(PDOException $e)
            {
                $this->db = null;
                return "Problema ao buscar games";
            }
        }
		public function buscar_games_por_console($games)
		{
			$sql = "SELECT g.idgame, g.nome, c.descricao 
			FROM  game g 
			INNER JOIN console c ON (c.idconsole=g.console_idconsole)
			WHERE c.idconsole = ?; ";
			try
			{
				$stm = $this->db->prepare($sql);
                $stm->bindValue(1, $games->getConsole()[0]->getIdconsole());
				$stm->execute();
				$this->db = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				$this->db = null;
				return "Problema ao buscar games por console";
			}
		}// fim buscar 
	}//fim classe
?>