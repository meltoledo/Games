<?php
	class Console
	{
		public function __construct(
			private int $idconsole = 0,
         private string $descricao = "",
		 private $games = array()
         
         ){}
		
		public function getIdconsole()
		{
			return $this->idremedio;
		}

        public function getDescricao()
		{
			return $this->nome;
		}
		public function getGames()
		{
			return $this->games;
		}
      

	}//fim classe
?>