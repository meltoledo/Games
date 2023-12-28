<?php
	class ConsoleDAO extends conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public function buscar_todos_consoles()
		{
			$sql = "SELECT * FROM console";
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
				return "Problema ao buscar todos os consoles";
			}
		}// fim buscar todos livros
		
		
		
	}//fim classe
?>