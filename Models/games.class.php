<?php
	class Games
	{
		public function __construct(
            private int $idgame = 0,
         private string $nome = "",
		 private array $console = array()
         ){}
		
		public function getIdgame()
		{
			return $this->idgame;
		}
		
        public function getNome()
		{
			return $this->nome;
		}
		public function getConsole() : array
		{
			//var_dump($this->console);
			return $this->console;
		}
	}//fim classe
?>